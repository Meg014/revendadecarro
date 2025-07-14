<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Cookie\Cookie;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;



/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $connection = ConnectionManager::get('default');
        $user = $this->Auth->user();
        // debug($user);
        $users = $this->Users
            ->find()
            ->select(
                [
                    'Users.id',
                    'Users.name',
                    'Users.email',
                    'Users.username',
                    'Users.last_login',
                    'Users.role_id',
                    'Users.active',
                    'roles' => 'A.description',


                ]
            )->join(
                [
                    'A' => [
                        'table' => 'roles',
                        'type' => 'INNER',
                        'conditions' => 'A.id = Users.role_id'
                    ]
                ]
            )
            ->order(
                [
                    'Users.id' => 'ASC'
                ]
            );

        $this->paginate = [
            'limit' => 5,
        ];

        $users = $this->paginate($users)->toArray();



        // CADASTRAR
        if (isset($_POST['btncadastrar'])) {

            $role_id  = $this->request->getData('role_id');
            $nome     = $this->request->getData('nome');
            $email    = $this->request->getData('email');
            $username = $this->request->getData('username');
            $senha    = $this->request->getData('senha');

            if (!empty($role_id) && !empty($nome) && !empty($email) && !empty($username) && !empty($senha)) {

                // Verificar se já existe usuário com mesmo nome, email ou username
                $usuario_existente = $this->Users->find()
                    ->where([
                        'OR' => [
                            'Users.name' => $nome,
                            'Users.email' => $email,
                            'Users.username' => $username
                        ]
                    ])
                    ->first();

                if ($usuario_existente) {
                    $this->Flash->error(__('Usuário já cadastrado!'));
                } else {
                    $novo_usuario = $this->Users->newEntity([
                        'name'     => $nome,
                        'email'    => $email,
                        'username' => $username,
                        'password' => $senha,
                        'status'   => '1',
                        'role_id'  => $role_id
                    ]);

                    if ($this->Users->save($novo_usuario)) {
                        $this->Flash->success(__('Usuário cadastrado com sucesso!'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Ocorreu um erro ao tentar cadastrar o usuário!'));
                    }
                }
            } else {
                $this->Flash->error(__('Preencha todos os campos!'));
            }
        }
        




        // EDITAR
        if ($this->request->is('post') && $this->request->getData('btnedit')) {
            $id = $this->request->getData('id');
            $nome = $this->request->getData('nome');

            $user = $this->Users->get($id);

            $user->name = $nome;

            if (!empty($this->request->getData('senha'))) {
                $user->password = (new DefaultPasswordHasher)->hash($this->request->getData('senha'));
            }

            if ($user->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao salvar.'));
            }
        }




        // DESATIVAR
        if ($this->request->is('post') && $this->request->getData('btndesativar')) {
            $id = $this->request->getData('id_desativar');
            $usuario = $this->Users->get($id);
            $usuario->active = 0;

            if ($this->Users->save($usuario)) {
                $this->Flash->success(__('Usuário desativado com sucesso.'));
            } else {
                $this->Flash->error(__('Erro ao desativar usuário.'));
            }

            return $this->redirect(['action' => 'index']);
        }

        // ATIVAR
        if ($this->request->is('post') && $this->request->getData('btnativar')) {
            $id = $this->request->getData('id_ativar');
            $usuario = $this->Users->get($id);
            $usuario->active = 1;

            if ($this->Users->save($usuario)) {
                $this->Flash->success(__('Usuário ativado com sucesso.'));
            } else {
                $this->Flash->error(__('Erro ao ativar usuário.'));
            }

            return $this->redirect(['action' => 'index']);
        }




        $getRoles = $connection->execute(
            "SELECT * FROM roles;"
        )->fetchAll('assoc');


        $this->set(compact('users', 'user', 'getRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'SessionsLogins'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                if (!empty($this->request->getData('remember_me'))) {
                    $cookie = [
                        'id' => $user['id'],
                        'token' => bin2hex(random_bytes(32)),
                    ];

                    // Cookie válido por 30 dias
                    $rememberMeCookie = new Cookie(
                        'RememberMe',                         // name
                        json_encode($cookie),                // value
                        new \DateTime('+30 days'),           // expires (DateTime)
                        '/',                                  // path
                        null,                                 // domain
                        false,                                // secure
                        true                                  // httpOnly
                    );

                    $this->response = $this->response->withCookie($rememberMeCookie);
                }


                // Atualiza last_login
                $this->Users->updateAll(
                    ['last_login' => date('Y-m-d H:i:s')],
                    ['id' => $user['id']]
                );

                // Salva na tabela sessions_logins
                $loginLog = $this->Users->SessionsLogins->newEmptyEntity();
                $loginLog->user_id = $user['id'];
                $loginLog->ip_address = $this->request->clientIp();
                $loginLog->login_time = date('Y-m-d H:i:s');
                $this->Users->SessionsLogins->save($loginLog);

                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error('Usuário ou senha inválidos');
        }
    }

    public function logout()
    {
        $expiredTime = (new \DateTime())->modify('-1 hour');

        $cookie = new Cookie(
            'RememberMe',     // name
            '',               // value
            $expiredTime,     // expires as DateTime
            '/',              // path
            null,             // domain
            false,            // secure
            true              // httpOnly
        );

        $this->response = $this->response->withExpiredCookie($cookie);

        return $this->redirect($this->Auth->logout());
    }
}

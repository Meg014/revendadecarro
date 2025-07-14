<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Lojas Controller
 *
 * @property \App\Model\Table\LojasTable $Lojas
 * @method \App\Model\Entity\Loja[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LojasController extends AppController
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
        $lojas = $this->Lojas
            ->find()
            ->select(
                [
                    'Lojas.id',
                    'Lojas.nome',
                    'user' => 'A.name',
                    'user_id' => 'A.id',

                ]
            )->join(
                [
                    'A' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => 'A.id = Lojas.user_id'
                    ]
                ]
            )
            ->order(
                [
                    'Lojas.id' => 'ASC'
                ]
            );

        $this->paginate = [
            'limit' => 5,
        ];

        $lojas = $this->paginate($lojas)->toArray();


        // CADASTRAR
        if ($this->request->is('post') && $this->request->getData('btncadastrar')) {

            // Captura os dados do formulário
            $data = [
                'nome' => $this->request->getData('nome'),
                'user_id' => $this->request->getData('user_id'),
            ];

            // Cria nova entidade com os dados recebidos
            $new = $this->Lojas->newEntity($data);

            // Validação adicional: garantir que a marca seja válida (não vazia)
            if (empty($data['user_id']) || !is_numeric($data['user_id'])) {
                $this->Flash->info(__('Por favor, selecione uma marca válida.'));
            } elseif ($new->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Lojas->save($new)) {
                $this->Flash->success(__('Novo registro cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar cadastrar.'));
            }
        }


        // EDITAR
        if ($this->request->is('post') && $this->request->getData('btnedit')) {

            $id = $this->request->getData('id');
            $nome = $this->request->getData('nome');
            $user_id = $this->request->getData('user_id');

            $edit = $this->Lojas->get($id);
            $edit->nome = $nome;
            $edit->user_id = $user_id;

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Lojas->save($edit)) {
                $this->Flash->success(__('Editado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar editar.'));
            }
        }

        // EDITAR


        // EXCLUIR
        if ($this->request->is('post') && $this->request->getData('btnexcluir')) {

            $id_excluir = $this->request->getData('id_excluir');

            // excluir
            $excluir = $this->Lojas->get($id_excluir);
            if ($this->Lojas->delete($excluir)) {
                $this->Flash->success(__('Excluido com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar excluir.'));
            }
        }
        // EXCLUIR



        $this->set(compact('lojas', 'user'));
    }

    /**
     * View method
     *
     * @param string|null $id Loja id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loja = $this->Lojas->get($id, [
            'contain' => ['Users', 'Exposicoes'],
        ]);

        $this->set(compact('loja'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loja = $this->Lojas->newEmptyEntity();
        if ($this->request->is('post')) {
            $loja = $this->Lojas->patchEntity($loja, $this->request->getData());
            if ($this->Lojas->save($loja)) {
                $this->Flash->success(__('The loja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loja could not be saved. Please, try again.'));
        }
        $users = $this->Lojas->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('loja', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loja id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loja = $this->Lojas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loja = $this->Lojas->patchEntity($loja, $this->request->getData());
            if ($this->Lojas->save($loja)) {
                $this->Flash->success(__('The loja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loja could not be saved. Please, try again.'));
        }
        $users = $this->Lojas->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('loja', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loja id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loja = $this->Lojas->get($id);
        if ($this->Lojas->delete($loja)) {
            $this->Flash->success(__('The loja has been deleted.'));
        } else {
            $this->Flash->error(__('The loja could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

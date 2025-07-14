<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Exposicoes Controller
 *
 * @property \App\Model\Table\ExposicoesTable $Exposicoes
 * @method \App\Model\Entity\Exposico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExposicoesController extends AppController
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
        $exposicoes = $this->Exposicoes
            ->find()
            ->select(
                [
                    'Exposicoes.id',
                    'Exposicoes.loja_id',
                    'Exposicoes.nome',
                    'Exposicoes.endereco',
                    'Exposicoes.cidade',
                    'Exposicoes.estado',
                    'Exposicoes.cep',
                    'Exposicoes.telefone',
                    'loja' => 'A.nome',
                    'user_id' => 'A.user_id',
                    'user' => 'B.name',


                ]
            )->join(
                [
                    'A' => [
                        'table' => 'lojas',
                        'type' => 'INNER',
                        'conditions' => 'A.id = Exposicoes.loja_id'
                    ],
                    'B' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => 'B.id = A.user_id'
                    ]
                ]
            )
            ->order(
                [
                    'exposicoes.id' => 'ASC'
                ]
            );

        $this->paginate = [
            'limit' => 5,
        ];

        $exposicoes = $this->paginate($exposicoes)->toArray();


        // CADASTRAR
        if ($this->request->is('post') && $this->request->getData('btncadastrar')) {

            // Captura os dados do formulário
            $data = [
                'loja_id' => $this->request->getData('loja_id'),
                'nome' => $this->request->getData('nome'),
                'endereco' => $this->request->getData('endereco'),
                'cep' => $this->request->getData('cep'),
                'telefone' => $this->request->getData('telefone'),
                'estado' => $this->request->getData('estado'),
                'cidade' => $this->request->getData('cidade'),
            ];

            // Cria nova entidade com os dados recebidos
            $new = $this->Exposicoes->newEntity($data);

            // Validação adicional: garantir que a marca seja válida (não vazia)
            if (empty($data['loja_id']) || !is_numeric($data['loja_id'])) {
                $this->Flash->info(__('Por favor, selecione uma loja válida.'));
            } elseif ($new->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Exposicoes->save($new)) {
                $this->Flash->success(__('Novo registro cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar cadastrar.'));
            }
        }




        // EDITAR
        if ($this->request->is('post') && $this->request->getData('btnedit')) {

            $id = $this->request->getData('id');
            $loja_id = $this->request->getData('loja_id');
            $nome = $this->request->getData('nome');
            $endereco = $this->request->getData('endereco');
            $cep = $this->request->getData('cep');
            $telefone = $this->request->getData('telefone');
            $estado = $this->request->getData('estado');
            $cidade = $this->request->getData('cidade');

            $edit = $this->Exposicoes->get($id);
            $edit->loja_id = $loja_id;
            $edit->nome = $nome;
            $edit->endereco = $endereco;
            $edit->cep = $cep;
            $edit->telefone = $telefone;
            $edit->estado = $estado;
            $edit->cidade = $cidade;

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Exposicoes->save($edit)) {
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
            $excluir = $this->Exposicoes->get($id_excluir);
            if ($this->Exposicoes->delete($excluir)) {
                $this->Flash->success(__('Excluido com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar excluir.'));
            }
        }
        // EXCLUIR


        $getLojas = $connection->execute(
            "SELECT * FROM lojas WHERE user_id = :user_id",
            ['user_id' => $user['id']]
        )->fetchAll('assoc');


        $this->set(compact('exposicoes', 'getLojas'));
    }

    /**
     * View method
     *
     * @param string|null $id Exposico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exposico = $this->Exposicoes->get($id, [
            'contain' => ['exposicoes'],
        ]);

        $this->set(compact('exposico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exposico = $this->Exposicoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $exposico = $this->Exposicoes->patchEntity($exposico, $this->request->getData());
            if ($this->Exposicoes->save($exposico)) {
                $this->Flash->success(__('The exposico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exposico could not be saved. Please, try again.'));
        }
        $exposicoes = $this->Exposicoes->exposicoes->find('list', ['limit' => 200])->all();
        $this->set(compact('exposico', 'exposicoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exposico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exposico = $this->Exposicoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exposico = $this->Exposicoes->patchEntity($exposico, $this->request->getData());
            if ($this->Exposicoes->save($exposico)) {
                $this->Flash->success(__('The exposico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exposico could not be saved. Please, try again.'));
        }
        $exposicoes = $this->Exposicoes->exposicoes->find('list', ['limit' => 200])->all();
        $this->set(compact('exposico', 'exposicoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exposico id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exposico = $this->Exposicoes->get($id);
        if ($this->Exposicoes->delete($exposico)) {
            $this->Flash->success(__('The exposico has been deleted.'));
        } else {
            $this->Flash->error(__('The exposico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;


/**
 * Modelos Controller
 *
 * @property \App\Model\Table\ModelosTable $Modelos
 * @method \App\Model\Entity\Modelo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModelosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');


        $modelos = $this->Modelos
            ->find()
            ->select(
                [
                    'Modelos.id',
                    'Modelos.nome',
                    'marca' => 'A.nome',
                    'marca_id' => 'A.id',

                ]
            )->join(
                [
                    'A' => [
                        'table' => 'marcas',
                        'type' => 'INNER',
                        'conditions' => 'A.id = Modelos.marca_id'
                    ]
                ]
            )
            ->order(
                [
                    'Modelos.id' => 'ASC'
                ]
            );

        $this->paginate = [
            'limit' => 5,
        ];

        $modelos = $this->paginate($modelos)->toArray();


        // CADASTRAR
        if ($this->request->is('post') && $this->request->getData('btncadastrar')) {

            // Captura os dados do formulário
            $data = [
                'nome' => $this->request->getData('nome'),
                'marca_id' => $this->request->getData('marca_id'),
            ];

            // Cria nova entidade com os dados recebidos
            $new = $this->Modelos->newEntity($data);

            // Validação adicional: garantir que a marca seja válida (não vazia)
            if (empty($data['marca_id']) || !is_numeric($data['marca_id'])) {
                $this->Flash->info(__('Por favor, selecione uma marca válida.'));
            } elseif ($new->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Modelos->save($new)) {
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
            $marca_id = $this->request->getData('marca_id');

            $edit = $this->Modelos->get($id);
            $edit->nome = $nome;
            $edit->marca_id = $marca_id;

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Modelos->save($edit)) {
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
            $excluir = $this->Modelos->get($id_excluir);
            if ($this->Modelos->delete($excluir)) {
                $this->Flash->success(__('Excluido com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar excluir.'));
            }
        }
        // EXCLUIR


        $getMarcas = $connection->execute(
            "SELECT * FROM marcas;"
        )->fetchAll('assoc');

        $this->set(compact('modelos', 'getMarcas'));
    }

    /**
     * View method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => ['Marcas', 'Carros'],
        ]);

        $this->set(compact('modelo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modelo = $this->Modelos->newEmptyEntity();
        if ($this->request->is('post')) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('The modelo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modelo could not be saved. Please, try again.'));
        }
        $marcas = $this->Modelos->Marcas->find('list', ['limit' => 200])->all();
        $this->set(compact('modelo', 'marcas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('The modelo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modelo could not be saved. Please, try again.'));
        }
        $marcas = $this->Modelos->Marcas->find('list', ['limit' => 200])->all();
        $this->set(compact('modelo', 'marcas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modelo = $this->Modelos->get($id);
        if ($this->Modelos->delete($modelo)) {
            $this->Flash->success(__('The modelo has been deleted.'));
        } else {
            $this->Flash->error(__('The modelo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

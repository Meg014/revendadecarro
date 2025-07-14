<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;


/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 * @method \App\Model\Entity\Categoria[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');

        $categorias = $this->Categorias
            ->find()
            ->select([
                'Categorias.id',
                'Categorias.nome',

            ]);

        $this->paginate = [
            'limit' => 5,
        ];

        $categorias = $this->paginate($categorias)->toArray();



        // CADASTRAR
        if ($this->request->is('post') && $this->request->getData('btncadastrar')) {

            // Captura os dados do formulário
            $data = ['nome' => $this->request->getData('nome')];

            // Cria nova entidade com os dados recebidos
            $new = $this->Categorias->newEntity($data);

            if ($new->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Categorias->save($new)) {
                $this->Flash->success(__('Novo registro cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar cadastrar.'));
            }
        }
        // CADASTRAR



        // EDITAR
        if ($this->request->is('post') && $this->request->getData('btnedit')) {

            $nome_edit = $this->request->getData('nome_edit');
            $id = $this->request->getData('id');

            // editar
            $edit = $this->Categorias->get($id);
            $edit->nome = $nome_edit;

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Categorias->save($edit)) {
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
            $excluir = $this->Categorias->get($id_excluir);
            if ($this->Categorias->delete($excluir)) {
                $this->Flash->success(__('Excluido com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar excluir.'));
            }
        }
        // EXCLUIR



        $this->set(compact('categorias'));
    }


    /**
     * View method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => ['Carros'],
        ]);

        $this->set(compact('categoria'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoria = $this->Categorias->newEmptyEntity();
        if ($this->request->is('post')) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
        }
        $this->set(compact('categoria'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
        }
        $this->set(compact('categoria'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('The categoria has been deleted.'));
        } else {
            $this->Flash->error(__('The categoria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Condicoes Controller
 *
 * @property \App\Model\Table\CondicoesTable $Condicoes
 * @method \App\Model\Entity\Condico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CondicoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $condicoes = $this->Condicoes
            ->find()
            ->select([
                'Condicoes.id',
                'Condicoes.nome',

            ]);

        $this->paginate = [
            'limit' => 5,
        ];

        $condicoes = $this->paginate($condicoes)->toArray();


        // CADASTRAR
        if ($this->request->is('post') && $this->request->getData('btncadastrar')) {

            // Captura os dados do formulário
            $data = ['nome' => $this->request->getData('nome')];

            // Cria nova entidade com os dados recebidos
            $new = $this->Condicoes->newEntity($data);

            if ($new->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Condicoes->save($new)) {
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
            $edit = $this->Condicoes->get($id);
            $edit->nome = $nome_edit;

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Condicoes->save($edit)) {
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
            $excluir = $this->Condicoes->get($id_excluir);
            if ($this->Condicoes->delete($excluir)) {
                $this->Flash->success(__('Excluido com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar excluir.'));
            }
        }
        // EXCLUIR

        $this->set(compact('condicoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Condico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $condico = $this->Condicoes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('condico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $condico = $this->Condicoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $condico = $this->Condicoes->patchEntity($condico, $this->request->getData());
            if ($this->Condicoes->save($condico)) {
                $this->Flash->success(__('The condico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condico could not be saved. Please, try again.'));
        }
        $this->set(compact('condico'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Condico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $condico = $this->Condicoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $condico = $this->Condicoes->patchEntity($condico, $this->request->getData());
            if ($this->Condicoes->save($condico)) {
                $this->Flash->success(__('The condico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condico could not be saved. Please, try again.'));
        }
        $this->set(compact('condico'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Condico id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $condico = $this->Condicoes->get($id);
        if ($this->Condicoes->delete($condico)) {
            $this->Flash->success(__('The condico has been deleted.'));
        } else {
            $this->Flash->error(__('The condico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Combustiveis Controller
 *
 * @property \App\Model\Table\CombustiveisTable $Combustiveis
 * @method \App\Model\Entity\Combustivei[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CombustiveisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
         $combustiveis = $this->Combustiveis
            ->find()
            ->select([
                'Combustiveis.id',
                'Combustiveis.nome',

            ]);

        $this->paginate = [
            'limit' => 5,
        ];

        $combustiveis = $this->paginate($combustiveis)->toArray();


        // CADASTRAR
        if ($this->request->is('post') && $this->request->getData('btncadastrar')) {

            // Captura os dados do formulário
            $data = ['nome' => $this->request->getData('nome')];

            // Cria nova entidade com os dados recebidos
            $new = $this->Combustiveis->newEntity($data);

            if ($new->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Combustiveis->save($new)) {
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
            $edit = $this->Combustiveis->get($id);
            $edit->nome = $nome_edit;

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Combustiveis->save($edit)) {
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
            $excluir = $this->Combustiveis->get($id_excluir);
            if ($this->Combustiveis->delete($excluir)) {
                $this->Flash->success(__('Excluido com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar excluir.'));
            }
        }
        // EXCLUIR

        $this->set(compact('combustiveis'));
    }

    /**
     * View method
     *
     * @param string|null $id Combustivei id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $combustivei = $this->Combustiveis->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('combustivei'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $combustivei = $this->Combustiveis->newEmptyEntity();
        if ($this->request->is('post')) {
            $combustivei = $this->Combustiveis->patchEntity($combustivei, $this->request->getData());
            if ($this->Combustiveis->save($combustivei)) {
                $this->Flash->success(__('The combustivei has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The combustivei could not be saved. Please, try again.'));
        }
        $this->set(compact('combustivei'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Combustivei id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $combustivei = $this->Combustiveis->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $combustivei = $this->Combustiveis->patchEntity($combustivei, $this->request->getData());
            if ($this->Combustiveis->save($combustivei)) {
                $this->Flash->success(__('The combustivei has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The combustivei could not be saved. Please, try again.'));
        }
        $this->set(compact('combustivei'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Combustivei id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $combustivei = $this->Combustiveis->get($id);
        if ($this->Combustiveis->delete($combustivei)) {
            $this->Flash->success(__('The combustivei has been deleted.'));
        } else {
            $this->Flash->error(__('The combustivei could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

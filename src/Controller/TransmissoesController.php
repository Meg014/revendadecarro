<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Transmissoes Controller
 *
 * @property \App\Model\Table\TransmissoesTable $Transmissoes
 * @method \App\Model\Entity\Transmisso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransmissoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
          $transmissoes = $this->Transmissoes
            ->find()
            ->select([
                'Transmissoes.id',
                'Transmissoes.nome',

            ]);

        $this->paginate = [
            'limit' => 5,
        ];

        $transmissoes = $this->paginate($transmissoes)->toArray();


        // CADASTRAR
        if ($this->request->is('post') && $this->request->getData('btncadastrar')) {

            // Captura os dados do formulário
            $data = ['nome' => $this->request->getData('nome')];

            // Cria nova entidade com os dados recebidos
            $new = $this->Transmissoes->newEntity($data);

            if ($new->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Transmissoes->save($new)) {
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
            $edit = $this->Transmissoes->get($id);
            $edit->nome = $nome_edit;

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Transmissoes->save($edit)) {
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
            $excluir = $this->Transmissoes->get($id_excluir);
            if ($this->Transmissoes->delete($excluir)) {
                $this->Flash->success(__('Excluido com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar excluir.'));
            }
        }
        // EXCLUIR

        $this->set(compact('transmissoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Transmisso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transmisso = $this->Transmissoes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('transmisso'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transmisso = $this->Transmissoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $transmisso = $this->Transmissoes->patchEntity($transmisso, $this->request->getData());
            if ($this->Transmissoes->save($transmisso)) {
                $this->Flash->success(__('The transmisso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transmisso could not be saved. Please, try again.'));
        }
        $this->set(compact('transmisso'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transmisso id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transmisso = $this->Transmissoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transmisso = $this->Transmissoes->patchEntity($transmisso, $this->request->getData());
            if ($this->Transmissoes->save($transmisso)) {
                $this->Flash->success(__('The transmisso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transmisso could not be saved. Please, try again.'));
        }
        $this->set(compact('transmisso'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transmisso id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transmisso = $this->Transmissoes->get($id);
        if ($this->Transmissoes->delete($transmisso)) {
            $this->Flash->success(__('The transmisso has been deleted.'));
        } else {
            $this->Flash->error(__('The transmisso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

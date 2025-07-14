<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Exception\PersistenceFailedException;
use Cake\ORM\TableRegistry;


/**
 * Carros Controller
 *
 * @property \App\Model\Table\CarrosTable $Carros
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarrosController extends AppController
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

        $carros = $this->Carros
            ->find()
            ->select([
                'Carros.id',
                'Carros.nome',
                'Carros.ano',
                'Carros.quilometragem',
                'Carros.cor_exterior',
                'Carros.cor_interior',
                'Carros.portas',
                'Carros.motor',
                'Carros.torque',
                'Carros.potencia',
                'Carros.velocidade_maxima',
                'Carros.tracao',
                'Carros.capacidade_reboque',
                'Carros.placa',
                'Carros.codigo_estoque',
                'Carros.preco',
                'Carros.preco_promocional',
                'Carros.descricao',
                'Carros.extras',
                'Carros.observacoes',
                'Carros.status',
                'Carros.destaque',
                'Carros.created',

                'nomeEnd' => 'A.nome',
                'endereco' => 'A.endereco',
                'cidade' => 'A.cidade',
                'estado' => 'A.estado',
                'cep' => 'A.cep',
                'telefone' => 'A.telefone',

                'loja' => 'AA.nome',

                'marcas' => 'B.nome',
                'modelos' => 'C.nome',
                'combustiveis' => 'D.nome',
                'transmissoes' => 'E.nome',
                'condicoes' => 'F.nome',
                'categorias' => 'G.nome',
            ])
            ->where(['Carros.user_id' => $user['id']])
            ->join([
                'A' => [
                    'table' => 'exposicoes',
                    'type' => 'INNER',
                    'conditions' => 'A.id = Carros.exposicao_id'
                ],
                'AA' => [
                    'table' => 'lojas',
                    'type' => 'INNER',
                    'conditions' => 'AA.id = A.loja_id'
                ],
                'B' => [
                    'table' => 'marcas',
                    'type' => 'INNER',
                    'conditions' => 'B.id = Carros.marca_id'
                ],
                'C' => [
                    'table' => 'modelos',
                    'type' => 'INNER',
                    'conditions' => 'C.id = Carros.modelo_id'
                ],
                'D' => [
                    'table' => 'combustiveis',
                    'type' => 'INNER',
                    'conditions' => 'D.id = Carros.combustivel_id'
                ],
                'E' => [
                    'table' => 'transmissoes',
                    'type' => 'INNER',
                    'conditions' => 'E.id = Carros.transmissao_id'
                ],
                'F' => [
                    'table' => 'condicoes',
                    'type' => 'INNER',
                    'conditions' => 'F.id = Carros.condicao_id'
                ],
                'G' => [
                    'table' => 'categorias',
                    'type' => 'INNER',
                    'conditions' => 'G.id = Carros.categoria_id'
                ],
            ])
            ->contain([
                'Features' => function ($q) {
                    return $q->select(['Features.nome'])->distinct();
                },
                'CarroImagens' => function ($q) {
                    return $q->select(['CarroImagens.id', 'CarroImagens.carro_id', 'CarroImagens.titulo', 'CarroImagens.caminho']);
                },
                'CarroImagemPrincipal' => function ($q) {
                    return $q->select(['CarroImagemPrincipal.carro_id', 'CarroImagemPrincipal.caminho']);
                }
            ]);

        $this->paginate = [
            'limit' => 5,
        ];

        $carros = $this->paginate($carros)->toArray();


        // desativar
        if ($this->request->is('post') && $this->request->getData('btndesativar')) {

            $id_desativar = $this->request->getData('id_desativar');

            $edit = $this->Carros->get($id_desativar);
            $edit->status = '0';

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Carros->save($edit)) {
                $this->Flash->success(__('Desativado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar desativar.'));
            }
        }
        // desativar

        // ativar
        if ($this->request->is('post') && $this->request->getData('btnativar')) {

            $id_ativar = $this->request->getData('id_ativar');

            $edit = $this->Carros->get($id_ativar);
            $edit->status = '1';

            if ($edit->getErrors()) {
                $this->Flash->error(__('Erro de validação.'));
            } elseif ($this->Carros->save($edit)) {
                $this->Flash->success(__('Ativado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro ao tentar ativar.'));
            }
        }
        // ativar


        $getShowroom = $connection->execute(
            "SELECT exposicoes. * FROM exposicoes
                    INNER JOIN lojas ON exposicoes.loja_id = lojas.id
                    WHERE lojas.user_id = :user_id",
            ['user_id' => $user['id']]
        )->fetchAll('assoc');

        $getFeatures = $connection->execute(
            "SELECT * FROM features;"
        )->fetchAll('assoc');




        $this->set(compact('carros', 'getShowroom', 'getFeatures',));
    }

    public function fotos($id = null)
    {
        $user = $this->Auth->user();

        $carros = $this->Carros->find()
            ->where([
                'Carros.user_id' => $user['id'],
                'Carros.id' => $id
            ])
            ->contain([
                'CarroImagens' => function ($q) {
                    return $q->select(['id', 'carro_id', 'titulo', 'caminho']);
                }
            ])
            ->first();

        if (!$carros) {
            $this->Flash->error('Carro não encontrado.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('carros'));
    }



    /**
     * View method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        if (!$id) {
            $this->Flash->error('ID do carro não informado.');
            return $this->redirect(['action' => 'index']);
        }

        $carro = $this->Carros->find()
            ->where(['Carros.id' => $id, 'Carros.status' => 1])
            ->contain([
                'Features' => function ($q) {
                    return $q->select(['Features.nome'])->distinct();
                },
                'CarroImagens' => function ($q) {
                    return $q->select(['id', 'carro_id', 'titulo', 'caminho']);
                },
                'CarroImagemPrincipal' => function ($q) {
                    return $q->select(['carro_id', 'caminho']);
                },
                'Marcas',
                'Modelos',
                'Combustiveis',
                'Transmissoes',
                'Condicoes',
                'Categorias',
                'Exposicoes.Lojas',

                'Users'
            ])
            ->first();

        if (!$carro) {
            $this->Flash->error('Carro não encontrado.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('carro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        /** @var \Cake\Database\Connection $connection */
        $connection = ConnectionManager::get('default');

        // Verifica se usuário está autenticado
        $user = $this->Auth->user();

        if ($this->request->is('post') && $this->request->getData('btncadastrar')) {
            $data = $this->request->getData();

            // Conversões
            $data['user_id'] = $user['id'];
            $data['ano'] = (int)$data['ano'];
            $data['preco'] = (float) str_replace(['.', ','], ['', '.'], $data['preco']);

            $data['preco_promocional'] = !empty($data['preco_promocional'])
                ? (float) str_replace(['.', ','], ['', '.'], $data['preco_promocional'])
                : null;
            $data['destaque'] = isset($data['destaque']) ? 1 : 0;
            $data['status'] = isset($data['status']) ? 1 : 0;

            $carro = $this->Carros->newEntity($data);

            // SALVAR o carro ANTES de usar o ID
            if ($this->Carros->save($carro)) {
                $carroId = $carro->id;

                // Salvar features
                if (!empty($data['features'])) {
                    foreach ($data['features'] as $featureId) {
                        $connection->newQuery()
                            ->insert(['carro_id', 'feature_id'])
                            ->into('carros_features')
                            ->values([
                                'carro_id' => $carroId,
                                'feature_id' => $featureId
                            ])
                            ->execute();
                    }
                }

                // Upload imagem
                $arquivo = $this->request->getData('imagem_principal');
                if ($arquivo && $arquivo->getClientFilename()) {
                    $extensao = pathinfo($arquivo->getClientFilename(), PATHINFO_EXTENSION);
                    $permitidas = [
                        'jpg',
                        'jpeg',
                        'png',
                        'gif',
                        'webp',
                        'bmp',
                        'tiff',
                        'svg',
                        'ico',
                        'jfif',
                        'pjpeg',
                        'pjp',
                        'avif'
                    ];

                    if (in_array(strtolower($extensao), $permitidas)) {
                        $nomeArquivo = uniqid() . '.' . $extensao;
                        $caminho = 'uploads/carros/principal/' . $nomeArquivo;
                        $tempPath = WWW_ROOT . 'uploads/temp/' . $nomeArquivo;
                        $arquivo->moveTo($tempPath);

                        // Redimensiona e salva no destino final
                        $this->redimensionarImagem($tempPath, WWW_ROOT . $caminho);

                        // Remove temporário
                        @unlink($tempPath);


                        $connection->newQuery()
                            ->insert(['carro_id', 'caminho', 'created'])
                            ->into('carro_imagem_principal')
                            ->values([
                                'carro_id' => $carroId,
                                'caminho' => $caminho,
                                'created' => date('Y-m-d H:i:s')
                            ])
                            ->execute();
                    }
                }

                $this->Flash->success('Carro cadastrado com sucesso! Agora adicione as imagens.');
                return $this->redirect(['action' => 'imagens', $carroId]);
            } else {
                // Exibir erros caso o carro não seja salvo
                $this->Flash->error('Erro ao salvar o carro.');
                // debug($carro->getErrors());
            }
        }


        // Carrega dados para os selects
        $getShowroom = $connection->execute(
            "SELECT exposicoes. * FROM exposicoes
                    INNER JOIN lojas ON exposicoes.loja_id = lojas.id
                    WHERE lojas.user_id = :user_id",
            ['user_id' => $user['id']]
        )->fetchAll('assoc');;

        $getFeatures = $connection->execute("SELECT * FROM features")->fetchAll('assoc');
        $getMarcas = $connection->execute("SELECT * FROM marcas")->fetchAll('assoc');
        $getModelos = $connection->execute("SELECT * FROM modelos")->fetchAll('assoc');
        $getCategorias = $connection->execute("SELECT * FROM categorias")->fetchAll('assoc');
        $getCondicoes = $connection->execute("SELECT * FROM condicoes")->fetchAll('assoc');
        $getTransmissoes = $connection->execute("SELECT * FROM transmissoes")->fetchAll('assoc');
        $getCombustiveis = $connection->execute("SELECT * FROM combustiveis")->fetchAll('assoc');

        $this->set(compact(
            'getShowroom',
            'getFeatures',
            'getMarcas',
            'getModelos',
            'getCategorias',
            'getCondicoes',
            'getTransmissoes',
            'getCombustiveis'
        ));
    }

    public function imagens($carroId = null)
    {
        $this->loadModel('CarroImagens');

        if ($this->request->is('post')) {
            $files = $this->request->getData('imagens');

            if (!empty($files) && is_array($files)) {
                foreach ($files as $file) {
                    if ($file->getClientFilename()) {
                        $extensao = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
                        $permitidas = [
                            'jpg',
                            'jpeg',
                            'png',
                            'gif',
                            'webp',
                            'bmp',
                            'tiff',
                            'svg',
                            'ico',
                            'jfif',
                            'pjpeg',
                            'pjp',
                            'avif'
                        ];

                        if (!in_array(strtolower($extensao), $permitidas)) {
                            continue;
                        }

                        $nomeArquivo = uniqid() . '.' . $extensao;
                        $caminho = 'uploads/carros/galeria/' . $nomeArquivo;

                        // Cria pasta se não existir
                        $path = WWW_ROOT . 'uploads/carros/galeria/';
                        if (!file_exists($path)) {
                            mkdir($path, 0755, true);
                        }

                        // Move arquivo
                        $file->moveTo($path . $nomeArquivo);

                        // Salva no banco
                        $imagem = $this->CarroImagens->newEntity([
                            'carro_id' => $carroId,
                            'titulo' => $file->getClientFilename(),
                            'caminho' => $caminho,
                            'created' => date('Y-m-d H:i:s')
                        ]);

                        $this->CarroImagens->save($imagem);
                    }
                }

                $this->Flash->success('Carro cadastrado com sucesso!');
                return $this->redirect(['controller' => 'Carros', 'action' => 'index']);
            }
        }

        $this->set(compact('carroId'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $carro = $this->Carros->get($id, [
            'contain' => ['Features'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carro = $this->Carros->patchEntity($carro, $this->request->getData());
            if ($this->Carros->save($carro)) {
                $this->Flash->success(__('The carro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carro could not be saved. Please, try again.'));
        }
        $exposicoes = $this->Carros->Exposicoes->find('list', ['limit' => 200])->all();
        $users = $this->Carros->Users->find('list', ['limit' => 200])->all();
        $marcas = $this->Carros->Marcas->find('list', ['limit' => 200])->all();
        $modelos = $this->Carros->Modelos->find('list', ['limit' => 200])->all();
        $combustiveis = $this->Carros->Combustiveis->find('list', ['limit' => 200])->all();
        $transmissoes = $this->Carros->Transmissoes->find('list', ['limit' => 200])->all();
        $condicoes = $this->Carros->Condicoes->find('list', ['limit' => 200])->all();
        $categorias = $this->Carros->Categorias->find('list', ['limit' => 200])->all();
        $features = $this->Carros->Features->find('list', ['limit' => 200])->all();
        $this->set(compact('carro', 'exposicoes', 'users', 'marcas', 'modelos', 'combustiveis', 'transmissoes', 'condicoes', 'categorias', 'features'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carro = $this->Carros->get($id);
        if ($this->Carros->delete($carro)) {
            $this->Flash->success(__('The carro has been deleted.'));
        } else {
            $this->Flash->error(__('The carro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function home()
    {
        $this->viewBuilder()->setLayout('user');

        $connection = ConnectionManager::get('default');

        $anos = range(date('Y'), 1990);
        $this->set(compact('anos'));

        $cidade = $this->request->getQuery('cidade');
        $estado = $this->request->getQuery('estado');

        // Query base do carrossel (todos os carros ativos)
        $carrosQuery = $this->Carros
            ->find()
            ->where(['Carros.status' => 1])
            ->order(['Carros.created' => 'DESC'])
            ->contain(['CarroImagemPrincipal', 'Exposicoes']);

        // Query base dos destaques (últimos 3 com destaque = 1)
        $destaquesQuery = $this->Carros
            ->find()
            ->where([
                'Carros.status' => 1,
                'Carros.destaque' => 1
            ])
            ->order(['Carros.created' => 'DESC'])
            ->limit(3)
            ->contain(['CarroImagemPrincipal', 'Exposicoes']);

        // Filtrando por localização aproximada (se existir)
        if (!empty($cidade)) {
            $carrosQuery->matching('Exposicoes', function ($q) use ($cidade) {
                return $q->where(['Exposicoes.cidade LIKE' => '%' . $cidade . '%']);
            });

            $destaquesQuery->matching('Exposicoes', function ($q) use ($cidade) {
                return $q->where(['Exposicoes.cidade LIKE' => '%' . $cidade . '%']);
            });
        }

        if (!empty($estado)) {
            $carrosQuery->matching('Exposicoes', function ($q) use ($estado) {
                return $q->where(['Exposicoes.estado LIKE' => '%' . $estado . '%']);
            });

            $destaquesQuery->matching('Exposicoes', function ($q) use ($estado) {
                return $q->where(['Exposicoes.estado LIKE' => '%' . $estado . '%']);
            });
        }

        $carros = $carrosQuery->toArray();
        $destaques = $destaquesQuery->toArray();

        $getMarcas = $connection->execute("SELECT * FROM marcas")->fetchAll('assoc');
        $getModelos = $connection->execute("SELECT * FROM modelos")->fetchAll('assoc');

        $this->set(compact('carros', 'destaques', 'getMarcas', 'getModelos'));
    }


    public function search()
    {
        $this->viewBuilder()->setLayout('user');

        $query = $this->request->getQuery();
        $conditions = ['Carros.status' => 1];

        // Filtros
        if (!empty($query['marca'])) {
            $conditions['Carros.marca_id'] = $query['marca'];
        }

        if (!empty($query['modelo'])) {
            $conditions['Carros.modelo_id'] = $query['modelo'];
        }

        if (!empty($query['ano_inicial'])) {
            $conditions['Carros.ano >='] = $query['ano_inicial'];
        }

        if (!empty($query['ano_final'])) {
            $conditions['Carros.ano <='] = $query['ano_final'];
        }

        if (!empty($query['preco_min'])) {
            $conditions['Carros.preco >='] = (float)$query['preco_min'];
        }

        if (!empty($query['preco_max'])) {
            $conditions['Carros.preco <='] = (float)$query['preco_max'];
        }

        // Query base
        $consulta = $this->Carros
            ->find()
            ->where($conditions)
            ->order(['Carros.created' => 'DESC'])
            ->contain(['CarroImagemPrincipal']);

        // Paginação
        $this->paginate = [
            'limit' => 5
        ];

        $carros = $this->paginate($consulta);

        $this->set(compact('carros'));
    }



    public function getModelosByMarca()
    {
        $this->request->allowMethod(['get']);

        $this->autoRender = false;

        $marcaId = $this->request->getQuery('marca_id');
        if (!$marcaId) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([]));
        }

        $this->loadModel('Modelos');

        $modelos = $this->Modelos
            ->find('list', [
                'keyField' => 'id',
                'valueField' => 'nome',
            ])
            ->where(['marca_id' => $marcaId])
            ->orderAsc('nome')
            ->toArray();

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($modelos));
    }


    public function detalhes($id = null)
    {
        $this->viewBuilder()->setLayout('user');

        if (!$id) {
            $this->Flash->error('ID do carro não informado.');
            return $this->redirect(['action' => 'index']);
        }

        $carro = $this->Carros->find()
            ->where(['Carros.id' => $id, 'Carros.status' => 1])
            ->contain([
                'Features' => function ($q) {
                    return $q->select(['Features.nome'])->distinct();
                },
                'CarroImagens' => function ($q) {
                    return $q->select(['id', 'carro_id', 'titulo', 'caminho']);
                },
                'CarroImagemPrincipal' => function ($q) {
                    return $q->select(['carro_id', 'caminho']);
                },
                'Marcas',
                'Modelos',
                'Combustiveis',
                'Transmissoes',
                'Condicoes',
                'Categorias',
                'Exposicoes.Lojas',

                'Users'
            ])
            ->first();

        if (!$carro) {
            $this->Flash->error('Carro não encontrado.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('carro'));
    }

    public function destaques()
    {
        $this->viewBuilder()->setLayout('user');

        $this->paginate = [
            'limit' => 5,
            'order' => ['Carros.created' => 'DESC']
        ];

        $carros = $this->paginate($this->Carros->find()
            ->where([
                'Carros.status' => 1,
                'Carros.destaque' => 1
            ])
            ->contain(['CarroImagemPrincipal']));

        $this->set(compact('carros'));
    }

    public function redimensionarImagem($origem, $destino, $larguraMax = 1280, $qualidade = 80)
    {
        $info = getimagesize($origem);
        if (!$info) {
            return false;
        }

        list($larguraOriginal, $alturaOriginal) = $info;

        // Se imagem já é menor que o limite, só copia
        if ($larguraOriginal <= $larguraMax) {
            copy($origem, $destino);
            return true;
        }

        $proporcao = $larguraMax / $larguraOriginal;
        $novaLargura = $larguraMax;
        $novaAltura = intval($alturaOriginal * $proporcao);

        $novaImagem = imagecreatetruecolor($novaLargura, $novaAltura);

        switch ($info['mime']) {
            case 'image/jpeg':
                $imagemOriginal = imagecreatefromjpeg($origem);
                break;
            case 'image/png':
                $imagemOriginal = imagecreatefrompng($origem);
                imagealphablending($novaImagem, false);
                imagesavealpha($novaImagem, true);
                break;
            case 'image/webp':
                $imagemOriginal = imagecreatefromwebp($origem);
                break;
            default:
                return false;
        }

        imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $novaLargura, $novaAltura, $larguraOriginal, $alturaOriginal);

        switch ($info['mime']) {
            case 'image/jpeg':
                imagejpeg($novaImagem, $destino, $qualidade);
                break;
            case 'image/png':
                imagepng($novaImagem, $destino, 9);
                break;
            case 'image/webp':
                imagewebp($novaImagem, $destino, $qualidade);
                break;
        }

        imagedestroy($novaImagem);
        imagedestroy($imagemOriginal);

        return true;
    }
}

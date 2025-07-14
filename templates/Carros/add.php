<div class="page-wrapper">

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Adicionar Carro
                    </h2>
                </div>

            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-info" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-car">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
                </svg>
            </div>
            <div>
                <h4 class="alert-title">Cadastrar Carro</h4>
                <div class="text-secondary">Aqui você pode gerenciar o cadastro de seus carros.</div>
            </div>
        </div>
    </div>




    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <div class="col-12">
                    <div class="card">
                        <?= $this->Form->create(null, ['type' => 'file']) ?>


                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs justify-content-end" data-bs-toggle="tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-geral-2" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab" tabindex="0">Geral</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-caracteristicas-2" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Características</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-descricao-2" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-2">Descrição</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">


                                <div class="tab-pane active show" id="tabs-geral-2" role="tabpanel">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Showroom</label>
                                                <select name="exposicao_id" id="exposicao_id" class="form-select" required>
                                                    <option value="">Selecione</option>
                                                    <?php foreach ($getShowroom as $getShowroo): ?>
                                                        <option
                                                            value="<?= $getShowroo['id'] ?>"
                                                            data-estado="<?= htmlspecialchars($getShowroo['estado']) ?>"
                                                            data-cidade="<?= htmlspecialchars($getShowroo['cidade']) ?>">
                                                            <?= $getShowroo['nome'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Estado</label>
                                                <input type="text" class="form-control" id="estadoInput" value="" disabled>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Cidade</label>
                                                <input type="text" class="form-control" id="cidadeInput" value="" disabled>
                                            </div>




                                        </div>


                                        <div class="row">

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label required">Ano modelo</label>
                                                <input name="ano" type="number" class="form-control" placeholder="Ano modelo" required>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Estoque #</label>
                                                <input name="codigo_estoque" type="text" class="form-control" placeholder="Estoque #">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Placa</label>
                                                <input name="placa" type="text" class="form-control" placeholder="Placa">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Marca</label>
                                                <select name="marca_id" class="form-select">
                                                    <option value="">Selecione</option>
                                                    <?php foreach ($getMarcas as $getMarca): ?>
                                                        <option value="<?= $getMarca['id'] ?>"><?= $getMarca['nome'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Modelo</label>
                                                <select name="modelo_id" class="form-select">
                                                    <option value="">Selecione</option>
                                                    <?php foreach ($getModelos as $getModelo): ?>
                                                        <option value="<?= $getModelo['id'] ?>"><?= $getModelo['nome'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Categoria</label>
                                                <select name="categoria_id" class="form-select">
                                                    <option value="">Selecione</option>
                                                    <?php foreach ($getCategorias as $getCategoria): ?>
                                                        <option value="<?= $getCategoria['id'] ?>"><?= $getCategoria['nome'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Condição</label>
                                                <select name="condicao_id" class="form-select">
                                                    <option value="">Selecione</option>
                                                    <?php foreach ($getCondicoes as $getCondicoe): ?>
                                                        <option value="<?= $getCondicoe['id'] ?>"><?= $getCondicoe['nome'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Odômetro</label>
                                                <div class="input-group">
                                                    <input name="quilometragem" type="number" class="form-control" placeholder="Odômetro">
                                                    <span class="input-group-text">km</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Tração</label>
                                                <input name="tracao" type="text" class="form-control" placeholder="Tração">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Cor Interior</label>
                                                <input name="cor_interior" type="text" class="form-control" placeholder="Cor Interior">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Cor Exterior</label>
                                                <input name="cor_exterior" type="text" class="form-control" placeholder="Cor Exterior">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Motor</label>
                                                <input name="motor" type="text" class="form-control" placeholder="Motor">
                                            </div>


                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Portas</label>
                                                <input name="portas" type="text" class="form-control" placeholder="Portas">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Transmissão</label>
                                                <select name="transmissao_id" class="form-select">
                                                    <option value="">Selecione</option>
                                                    <?php foreach ($getTransmissoes as $getTransmissoe): ?>
                                                        <option value="<?= $getTransmissoe['id'] ?>"><?= $getTransmissoe['nome'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Tipo de combustível</label>
                                                <select name="combustivel_id" class="form-select">
                                                    <option value="">Selecione</option>
                                                    <?php foreach ($getCombustiveis as $getCombustivei): ?>
                                                        <option value="<?= $getCombustivei['id'] ?>"><?= $getCombustivei['nome'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Cavalos</label>
                                                <input name="potencia" type="text" class="form-control" placeholder="Cavalos">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Torque</label>
                                                <input name="torque" type="text" class="form-control" placeholder="Torque">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Capacidade de reboque</label>
                                                <input name="capacidade_reboque" type="text" class="form-control" placeholder="Capacidade de reboque">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Velocidade Máxima</label>
                                                <div class="input-group">
                                                    <input name="velocidade_maxima" type="text" class="form-control" placeholder="Velocidade Máxima">
                                                    <span class="input-group-text">km/h</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label required">Preço</label>
                                                <input name="preco" type="text" class="form-control" placeholder="$ Preço de listagem">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Preço de venda</label>
                                                <input name="preco_promocional" type="text" class="form-control" placeholder="$ Preço de venda">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Carro em destaque</label>
                                                <div class="form-check mt-4">
                                                    <input name="destaque" class="form-check-input" type="checkbox" id="destaque">
                                                    <label class="form-check-label" for="destaque">Destaque</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="col-form-label">Carro ativo</label>
                                                <div class="form-check mt-4">
                                                    <input name="status" class="form-check-input" type="checkbox" id="ativo">
                                                    <label class="form-check-label" for="ativo">Ativo</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <label class="col-form-label">Imagem principal</label>
                                                <input type="file" name="imagem_principal" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tabs-caracteristicas-2" role="tabpanel">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Características do carro</label>

                                        <!-- Marcar / Desmarcar todos -->
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll">Selecionar / Desmarcar tudo</label>
                                        </div>

                                        <br>

                                        <!-- Checkboxes em colunas -->
                                        <div class="mb-3">
                                            <div class="row">
                                                <?php
                                                $chunks = array_chunk($getFeatures, ceil(count($getFeatures) / 4));
                                                foreach ($chunks as $coluna):
                                                ?>
                                                    <div class="col-md-3">
                                                        <?php foreach ($coluna as $feature): ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input car-feature" type="checkbox" id="feature_<?= $feature['id'] ?>" name="features[]" value="<?= $feature['id'] ?>">
                                                                <label class="form-check-label" for="feature_<?= $feature['id'] ?>">
                                                                    <?= htmlspecialchars($feature['nome']) ?>
                                                                </label>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane" id="tabs-descricao-2" role="tabpanel">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="col-form-label">Nome do carro</label>
                                                <input name="nome" type="text" class="form-control">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3 mb-0">
                                                    <label class="form-label">Descrição</label>
                                                    <textarea name="descricao" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 mb-0">
                                                    <label class="form-label">Extra</label>
                                                    <textarea name="extras" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 mb-0">
                                                    <label class="form-label">Observação</label>
                                                    <textarea name="observacoes" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="card-footer text-end">
                            <button type="submit" name="btncadastrar" value="1" class="btn btn-primary">Cadastrar</button>
                        </div>

                        <?= $this->Form->end() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.getElementById('exposicao_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const estado = selectedOption.getAttribute('data-estado');
        const cidade = selectedOption.getAttribute('data-cidade');

        document.getElementById('estadoInput').value = estado || '';
        document.getElementById('cidadeInput').value = cidade || '';
    });
</script>

<!-- Script para selecionar / desmarcar tudo -->
<script>
    document.getElementById('checkAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.car-feature');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>
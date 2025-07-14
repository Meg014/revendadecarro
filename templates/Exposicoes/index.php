<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Exposico> $exposicoes
 */
?>

<div class="page-wrapper">

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Showrooms
                    </h2>
                </div>



                <div class="col-auto ms-auto d-print-none">
                    <?php if (empty($getLojas)): ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            <strong>⚠️ Atenção:</strong> Você precisa cadastrar uma <strong>loja</strong> antes de adicionar um showroom.
                        </div>
                    <?php elseif (empty($exposicoes)): ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-text-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M19 10h-14" />
                                <path d="M5 6h14" />
                                <path d="M14 14h-9" />
                                <path d="M5 18h6" />
                                <path d="M18 15v6" />
                                <path d="M15 18h6" />
                            </svg>
                            Adicionar
                        </button>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-info" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                </svg>
            </div>
            <div>
                <h4 class="alert-title">Todos locais cadastrados</h4>
                <div class="text-secondary">Aqui você pode gerenciar os locais de sua concessionária.</div>
            </div>
        </div>
    </div>




    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <div class="col-12">
                    <div class="card">

                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">

                                <div class="ms-auto text-secondary">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Concessionária</th>
                                        <th>Nome</th>
                                        <th>Endereço</th>
                                        <th>Cidade</th>
                                        <th>Estado</th>
                                        <th>CEP</th>
                                        <th>Telefone</th>
                                        <th class="w-1">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($exposicoes as $exposicoe) : ?>
                                        <tr>
                                            <td> <?= $exposicoe['id'] ?></td>
                                            <td class="text-secondary">
                                                <?= $exposicoe['loja'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $exposicoe['nome'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $exposicoe['endereco'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $exposicoe['cidade'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $exposicoe['estado'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $exposicoe['cep'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $exposicoe['telefone'] ?>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">

                                                    <a type="button" title="Editar" class="btn" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $exposicoe['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                    </a>

                                                    <div class="modal modal-blur fade" id="modal-edit<?= $exposicoe['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">

                                                                <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Editar </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">

                                                                    <?= $this->Form->hidden('id', ['value' => $exposicoe['id']]) ?>


                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Concessionária</label>
                                                                                <select name="loja_id" class="form-select" required>
                                                                                    <option value="">Selecione uma loja</option>
                                                                                    <?php foreach ($getLojas as $getLoja): ?>
                                                                                        <option value="<?= $getLoja['id'] ?>" <?= $getLoja['id'] == $exposicoe['loja_id'] ? 'selected' : '' ?>>
                                                                                            <?= $getLoja['nome'] ?>
                                                                                        </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Nome</label>
                                                                                <input name="nome" type="text" class="form-control" value="<?= h($exposicoe['nome']) ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Endereço</label>
                                                                                <input name="endereco" type="text" class="form-control" value="<?= h($exposicoe['endereco']) ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">CEP</label>
                                                                                <input name="cep" type="text" class="form-control" value="<?= h($exposicoe['cep']) ?>">

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Telefone</label>
                                                                                <input type="text" name="telefone" class="form-control" data-mask="(00) 0000-0000" data-mask-visible="true" placeholder="(00) 0000-0000" autocomplete="off" value="<?= h($exposicoe['telefone']) ?>">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Estado</label>
                                                                                <select id="estado-<?= $exposicoe['id'] ?>" name="estado" class="form-select" required data-estado="<?= h($exposicoe['estado']) ?>"></select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Cidade</label>
                                                                                <select id="cidade-<?= $exposicoe['id'] ?>" name="cidade" class="form-select" required data-cidade="<?= h($exposicoe['cidade']) ?>"></select>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                                                        Cancelar
                                                                    </a>
                                                                    <button type="submit" name="btnedit" value="1" class="btn btn-primary ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                            <path d="M5 12l5 5l10 -10" />
                                                                        </svg>
                                                                        Salvar
                                                                    </button>
                                                                </div>

                                                                <?= $this->Form->end() ?>
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <a type="button" title="Excluir" class="btn" data-bs-toggle="modal" data-bs-target="#modal-delete<?= $exposicoe['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                    </a>
                                                    <div class="modal modal-blur fade" id="modal-delete<?= $exposicoe['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                            <?= $this->Form->create() ?>
                                                            <div class="modal-content">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                <div class="modal-status bg-danger"></div>
                                                                <div class="modal-body text-center py-4">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                                        <path d="M12 9v4" />
                                                                        <path d="M12 17h.01" />
                                                                    </svg>
                                                                    <h3>Deseja excluir</h3>
                                                                    <input type="hidden" name="id_excluir" value="<?= $exposicoe['id'] ?>">
                                                                    <div class="text-secondary">Certeza que deseja excluir <?= $exposicoe['nome'] ?>?</div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <div class="w-100">
                                                                        <div class="row">
                                                                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                                                                    Cancelar
                                                                                </a></div>
                                                                            <div class="col">
                                                                                <button type="submit" name="btnexcluir" value="1" class="btn btn-danger w-100">
                                                                                    Excluir
                                                                                </button>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <?= $this->Form->end() ?>

                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- paginação -->
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-secondary">
                                <?= $this->Paginator->counter('pages', [
                                    'format' => 'Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total'
                                ]) ?>
                            </p>

                            <div class="paginator">
                                <ul class="pagination m-0 ms-auto">

                                    <?= $this->Paginator->prev(__('<<')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('>>')) ?>
                                </ul>
                            </div>

                        </div>

                        <!-- paginação -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal modal-blur fade" id="modal-new" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>

            <div class="modal-header">
                <h5 class="modal-title">Novo Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Concessionária</label>
                            <select name="loja_id" class="form-select" required>
                                <option value="">Selecione uma loja</option>
                                <?php foreach ($getLojas as $getLoja): ?>
                                    <option value="<?= $getLoja['id'] ?>"><?= $getLoja['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Endereço</label>
                            <input type="text" class="form-control" name="endereco">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">CEP</label>
                            <input type="text" class="form-control" name="cep">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input name="telefone" type="text" class="form-control" data-mask="(00) 0000-0000" data-mask-visible="true" placeholder="(00) 0000-0000" autocomplete="off">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select id="estado" name="estado" class="form-select" required></select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Cidade</label>
                            <select id="cidade" name="cidade" class="form-select" required></select>
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancelar
                </a>
                <button type="submit" name="btncadastrar" value="1" class="btn btn-primary ms-auto">
                    Salvar
                </button>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const estadoSelect = document.getElementById("estado");
        const cidadeSelect = document.getElementById("cidade");

        // Buscar estados
        fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome")
            .then(res => res.json())
            .then(estados => {
                estados.forEach(estado => {
                    let option = document.createElement("option");
                    option.value = estado.sigla;
                    option.text = estado.nome;
                    estadoSelect.appendChild(option);
                });
            });

        // Buscar cidades ao selecionar estado
        estadoSelect.addEventListener("change", function() {
            let uf = this.value;
            cidadeSelect.innerHTML = '<option value="">Carregando cidades...</option>';

            fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`)
                .then(res => res.json())
                .then(cidades => {
                    cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                    cidades.forEach(cidade => {
                        let option = document.createElement("option");
                        option.value = cidade.nome;
                        option.text = cidade.nome;
                        cidadeSelect.appendChild(option);
                    });
                });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Seleciona todos os selects de estado e cidade
        const estadoSelects = document.querySelectorAll("select[name='estado']");
        const cidadeSelects = document.querySelectorAll("select[name='cidade']");

        // Buscar estados para todos os selects
        fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome")
            .then(res => res.json())
            .then(estados => {
                estadoSelects.forEach((estadoSelect) => {
                    const estadoAtual = estadoSelect.dataset.estado;
                    estadoSelect.innerHTML = '<option value="">Selecione um estado</option>';

                    estados.forEach(estado => {
                        const option = document.createElement("option");
                        option.value = estado.sigla;
                        option.text = estado.nome;
                        if (estado.sigla === estadoAtual) option.selected = true;
                        estadoSelect.appendChild(option);
                    });

                    // Dispara o evento 'change' para carregar as cidades
                    estadoSelect.dispatchEvent(new Event('change'));
                });
            });

        estadoSelects.forEach((estadoSelect, index) => {
            estadoSelect.addEventListener("change", function() {
                const cidadeSelect = cidadeSelects[index];
                const cidadeAtual = cidadeSelect.dataset.cidade;
                const uf = this.value;

                fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`)
                    .then(res => res.json())
                    .then(cidades => {
                        cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                        cidades.forEach(cidade => {
                            const option = document.createElement("option");
                            option.value = cidade.nome;
                            option.text = cidade.nome;
                            if (cidade.nome === cidadeAtual) option.selected = true;
                            cidadeSelect.appendChild(option);
                        });
                    });
            });
        });
    });
</script>
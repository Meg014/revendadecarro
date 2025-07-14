<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Condico> $condicoes
 */
?>
<div class="page-wrapper">

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Condições
                    </h2>
                </div>



                <div class="col-auto ms-auto d-print-none">
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
                </div>
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
                                        <th>Nome</th>
                                        <th class="w-1">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($condicoes as $condicoe) : ?>
                                        <tr>
                                            <td><?= $condicoe['id'] ?></td>
                                            <td class="text-secondary">
                                                <?= $condicoe['nome'] ?>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">

                                                    <a type="button" title="Editar" class="btn" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $condicoe['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                    </a>
                                                    <div class="modal modal-blur fade" id="modal-edit<?= $condicoe['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">

                                                                <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Editar </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <?= $this->Form->control('nome_edit', [
                                                                            'label' => 'Nome',
                                                                            'value' => $condicoe['nome'],
                                                                            'class' => 'form-control',
                                                                            'placeholder' => 'Digite o nome',
                                                                            'required' => true
                                                                        ]) ?>

                                                                        <?= $this->Form->hidden('id', ['value' => $condicoe['id']]) ?>
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


                                                    <a type="button" title="Excluir" class="btn" data-bs-toggle="modal" data-bs-target="#modal-delete<?= $condicoe['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                    </a>
                                                    <div class="modal modal-blur fade" id="modal-delete<?= $condicoe['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                    <input type="hidden" name="id_excluir" value="<?= $condicoe['id'] ?>">
                                                                    <div class="text-secondary">Certeza que deseja excluir <?= $condicoe['nome'] ?>?</div>
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
                <div class="mb-3">
                    <?= $this->Form->control('nome', [
                        'label' => 'Nome',
                        'placeholder' => 'Digite o nome',
                        'class' => 'form-control',
                        'required' => true
                    ]) ?>
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
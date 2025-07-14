<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\user> $users
 */
?>

<div class="page-wrapper">

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Concessionárias
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

    <br>

    <div class="alert alert-success" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-warehouse">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 21v-13l9 -4l9 4v13" />
                    <path d="M13 13h4v8h-10v-6h6" />
                    <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3" />
                </svg>
            </div>
            <div>
                <h4 class="alert-title">Todas concessionárias cadastradas</h4>
                <div class="text-secondary">Aqui você pode gerenciar o cadastro de suas concessionária.</div>
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
                                        <th>E-mail</th>
                                        <th>Username</th>
                                        <th>Permissão</th>
                                        <th>Ativo</th>
                                        <th>Ultimo Login</th>
                                        <th class="w-1">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>

                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td class="text-secondary">
                                                <?= $user['name'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $user['email'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $user['username'] ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= h($user['roles']) ?> </td>
                                            <td class="text-secondary">
                                                <?= $user['active'] ? 'Ativo' : 'Desativado' ?>
                                            </td>

                                            <td class="text-secondary">
                                                <?= $user['last_login'] ?>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">

                                                    <a type="button" title="Editar" class="btn" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $user['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                    </a>
                                                    <div class="modal modal-blur fade" id="modal-edit<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">

                                                                <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Editar Usuário</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="row">

                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <?= $this->Form->control('user_name_fake', [
                                                                                    'label' => 'Responsável',
                                                                                    'value' => $user['name'],
                                                                                    'class' => 'form-control',
                                                                                    'disabled' => true
                                                                                ]) ?>
                                                                                <?= $this->Form->hidden('user_id', ['value' => $user['id']]) ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <?= $this->Form->control('nome', [
                                                                                    'label' => 'Nome',
                                                                                    'value' => $user['nome'],
                                                                                    'class' => 'form-control',
                                                                                    'required' => true
                                                                                ]) ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <?= $this->Form->control('senha', [
                                                                                    'label' => 'Nova senha (opcional)',
                                                                                    'type' => 'password',
                                                                                    'class' => 'form-control',
                                                                                    'required' => false
                                                                                ]) ?>
                                                                            </div>
                                                                        </div>

                                                                        <?= $this->Form->hidden('id', ['value' => $user['id']]) ?>

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


                                            <td>
                                                <?php if ($user['active'] == 1) : ?>
                                                    <!-- Botão de desativar -->
                                                    <a type="button" title="Desativar" class="btn" data-bs-toggle="modal" data-bs-target="#modal-desativar<?= $user['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-x">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                            <path d="M10 12l4 4m0 -4l-4 4" />
                                                        </svg>
                                                    </a>

                                                    <div class="modal modal-blur fade" id="modal-desativar<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                            <?= $this->Form->create() ?>
                                                            <div class="modal-content">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                <div class="modal-status bg-danger"></div>
                                                                <div class="modal-body text-center py-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                                        <path d="M12 9v4" />
                                                                        <path d="M12 17h.01" />
                                                                    </svg>
                                                                    <h3>Deseja Desativar?</h3>
                                                                    <input type="hidden" name="id_desativar" value="<?= $user['id'] ?>">
                                                                    <div class="text-secondary">Certeza que deseja desativar o usuário <?= h($user['nome']) ?>?</div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="w-100">
                                                                        <div class="row">
                                                                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">Cancelar</a></div>
                                                                            <div class="col">
                                                                                <button type="submit" name="btndesativar" value="1" class="btn btn-danger w-100">Desativar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?= $this->Form->end() ?>
                                                        </div>
                                                    </div>

                                                <?php else : ?>
                                                    <!-- Botão de ativar -->
                                                    <a type="button" title="Ativar" class="btn" data-bs-toggle="modal" data-bs-target="#modal-ativar<?= $user['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-copy-check">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path stroke="none" d="M0 0h24v24H0z" />
                                                            <path d="M7 9.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                                            <path d="M4.012 16.737a2 2 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                                            <path d="M11 14l2 2l4 -4" />
                                                        </svg>
                                                    </a>
                                                    <div class="modal modal-blur fade" id="modal-ativar<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                            <?= $this->Form->create() ?>
                                                            <div class="modal-content">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                <div class="modal-status bg-success"></div>
                                                                <div class="modal-body text-center py-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-success icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                                        <path d="M12 9v4" />
                                                                        <path d="M12 17h.01" />
                                                                    </svg>
                                                                    <h3>Deseja Ativar?</h3>
                                                                    <input type="hidden" name="id_ativar" value="<?= $user['id'] ?>">
                                                                    <div class="text-secondary">Certeza que deseja ativar o usuário <?= h($user['nome']) ?>?</div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="w-100">
                                                                        <div class="row">
                                                                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">Cancelar</a></div>
                                                                            <div class="col">
                                                                                <button type="submit" name="btnativar" value="1" class="btn btn-success w-100">Ativar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?= $this->Form->end() ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </td>

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

                            <label class="form-label">Permissão</label>

                            <select name="role_id" class="form-select" required>
                                <option value="">Selecione</option>
                                <?php foreach ($getRoles as $getRole): ?>
                                    <option value="<?= $getRole['id'] ?>"><?= $getRole['description'] ?></option>
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
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input name="senha" type="password" class="form-control">
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
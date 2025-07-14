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
                    <?php if (empty($getShowroom)): ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            <strong>⚠️ Atenção:</strong> Você precisa cadastrar um <strong>showroom</strong> antes de adicionar carros.
                        </div>


                    <?php else: ?>
                        <a href="<?= $this->Url->build(['controller' => 'Carros', 'action' => 'add']) ?>" class="btn btn-primary">
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
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="alert alert-info" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M13 5h8" />
                    <path d="M13 9h5" />
                    <path d="M13 15h8" />
                    <path d="M13 19h5" />
                    <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                    <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                </svg>
            </div>
            <div>
                <h4 class="alert-title">Todos carros listados</h4>
                <div class="text-secondary">Aqui você pode gerenciar os carros de sua concessionária.</div>
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
                            <table class="table table-vcenter card-table table-hover">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th colspan="6">Descrição</th>
                                        <th>Criado em</th>
                                        <th>Status</th>
                                        <th>Destaque</th>
                                        <th class="w-1">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($carros as $carro) : ?>
                                        <tr>
                                            <td style=" vertical-align: middle;">
                                                <?php if (!empty($carro->carro_imagem_principal) && !empty($carro->carro_imagem_principal->caminho)) : ?>
                                                    <img src="<?= $this->Url->build('/' . h($carro->carro_imagem_principal->caminho)) ?>" alt="Foto" width="100" style="border-radius: 8px;">
                                                <?php else : ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                                                        stroke="#bbb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        style="border-radius: 8px;">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M15 8h.01" />
                                                        <path d="M13 21h-7a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7" />
                                                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3" />
                                                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0" />
                                                        <path d="M22 22l-5 -5" />
                                                        <path d="M17 22l5 -5" />
                                                    </svg>
                                                <?php endif; ?>
                                            </td>





                                            <td class="text-secondary" colspan="6">
                                                <strong> <?= $carro['nome'] ?> <?= $carro['id'] ?></strong><br>
                                                <?= $carro['endereco'] ?> , <?= $carro['cidade'] ?> - <?= $carro['estado'] ?><br>
                                                CEP: <?= $carro['cep'] ?> - Tel: <?= $carro['telefone'] ?><br>

                                            </td>
                                            <td class="text-secondary">
                                                Criado em: <?= $carro['created']->i18nFormat('dd/MM/yyyy') ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $carro['status'] == 1 ? 'Ativado' : 'Desativado' ?>
                                            </td>
                                            <td class="text-secondary">
                                                <?= $carro['destaque'] == 1 ? 'Sim' : 'Não' ?>
                                            </td>



                                            <td class="text-secondary">
                                                <div class="btn-list flex-nowrap gap-2">

                                                    <a href="<?= $this->Url->build(['action' => 'view', $carro['id']]) ?>"  title="Visualizar"
                                                        class="btn btn-info p-0 d-flex align-items-center justify-content-center"
                                                        style="width: 40px; height: 40px; border-radius: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24"
                                                            fill="none" stroke="white" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            style="width: 1.3rem; height: 1.3rem;">
                                                            <path d="M3 5a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-10z" />
                                                            <path d="M7 20h10" />
                                                            <path d="M9 16v4" />
                                                            <path d="M15 16v4" />
                                                        </svg>
                                                    </a>

                                                    <a href="<?= $this->Url->build(['action' => 'Fotos', $carro['id']]) ?>"
                                                        title="Fotos"
                                                        class="btn btn-warning p-0 d-flex align-items-center justify-content-center"
                                                        style="width: 40px; height: 40px; border-radius: 10px; background-color: #fd7e14; border: none;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24"
                                                            fill="none" stroke="white" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            style="width: 1.3rem; height: 1.3rem;">
                                                            <path d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                                            <path d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                                                            <path d="M17 7h.01" />
                                                            <path d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644" />
                                                            <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644" />
                                                        </svg>
                                                    </a>


                                                    <a href="<?= $this->Url->build(['action' => 'edit', $carro['id']]) ?>" title="Editar"
                                                        class="btn btn-success p-0 d-flex align-items-center justify-content-center"
                                                        style="width: 40px; height: 40px; border-radius: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24"
                                                            fill="none" stroke="white" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            style="width: 1.3rem; height: 1.3rem;">
                                                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                            <path d="M13.5 6.5l4 4" />
                                                            <path d="M16 19h6" />
                                                        </svg>
                                                    </a>


                                                    <?php if ($carro['status'] == 1) : ?>
                                                        <!-- Botão de desativar -->
                                                        <a type="button" title="Desativar"
                                                            class="btn btn-danger p-0 d-flex align-items-center justify-content-center"
                                                            style="width: 40px; height: 40px; border-radius: 10px;"
                                                            data-bs-toggle="modal" data-bs-target="#modal-delete<?= $carro['id'] ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24"
                                                                fill="none" stroke="white" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                style="width: 1.3rem; height: 1.3rem;">
                                                                <path d="M4 7h16" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                <path d="M10 12l4 4m0 -4l-4 4" />
                                                            </svg>
                                                        </a>

                                                        <div class="modal modal-blur fade" id="modal-delete<?= $carro['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                        <h3>Deseja Desativar</h3>
                                                                        <input type="hidden" name="id_desativar" value="<?= $carro['id'] ?>">
                                                                        <div class="text-secondary">Certeza que deseja desativar o carro <?= $carro['nome'] ?>?</div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <div class="w-100">
                                                                            <div class="row">
                                                                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                                                                        Cancelar
                                                                                    </a></div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="btndesativar" value="1" class="btn btn-danger w-100">
                                                                                        Desativar
                                                                                    </button>

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
                                                        <a type="button" title="Ativar"
                                                            class="btn btn-success p-0 d-flex align-items-center justify-content-center"
                                                            style="width: 40px; height: 40px; border-radius: 10px;"
                                                            data-bs-toggle="modal" data-bs-target="#modal-ativar<?= $carro['id'] ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                style="width: 1.3rem; height: 1.3rem;">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M7 12l5 5l10 -10" />
                                                                <path d="M2 12l5 5m5 -5l5 -5" />
                                                            </svg>
                                                        </a>
                                                        <div class="modal modal-blur fade" id="modal-ativar<?= $carro['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                                <?= $this->Form->create() ?>
                                                                <div class="modal-content">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    <div class="modal-status bg-success"></div>
                                                                    <div class="modal-body text-center py-4">
                                                                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-success icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                            <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                                            <path d="M12 9v4" />
                                                                            <path d="M12 17h.01" />
                                                                        </svg>
                                                                        <h3>Deseja Ativar</h3>
                                                                        <input type="hidden" name="id_ativar" value="<?= $carro['id'] ?>">
                                                                        <div class="text-secondary">Certeza que deseja ativar o carro <?= $carro['nome'] ?>?</div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <div class="w-100">
                                                                            <div class="row">
                                                                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                                                                        Cancelar
                                                                                    </a></div>
                                                                                <div class="col">
                                                                                    <button type="submit" name="btnativar" value="1" class="btn btn-success w-100">
                                                                                        Ativar
                                                                                    </button>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <?= $this->Form->end() ?>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>









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
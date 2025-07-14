<style>
    .object-fit-cover {
        object-fit: cover;
    }

    .card-veiculo {
        border-radius: 6px;
        transition: box-shadow 0.2s ease;
        min-height: 120px;
    }

    .carro-imagem {
        width: 160px;
        height: 100px;
        overflow: hidden;
        border-radius: 4px;
        flex-shrink: 0;
    }

    .carro-imagem img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .titulo-carro {
        margin-bottom: 4px;
        font-size: 16px;
        font-weight: 600;
        color: #1a1a1a;
    }

    .descricao-carro {
        font-size: 13px;
        color: #666;
        max-width: 700px;
        margin-bottom: 6px;
    }

    .info-list i {
        color: #666;
    }

    .preco-promocional-badge {
        position: absolute;
        background-color: rgb(0, 177, 24);
        color: white;
        padding: 4px 10px;
        font-weight: bold;
        font-size: 0.85rem;
        border-radius: 4px;
        z-index: 10;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.3);
    }

    .preco-antigo {
        color: red;
        text-decoration: line-through;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .ribbon-destaque {
        width: 160px;
        height: 32px;
        background: #4CAF50;
        color: white;
        text-align: center;
        font-weight: bold;
        font-size: 13px;
        position: absolute;
        top: 17px;
        right: -45px;
        transform: rotate(45deg);
        z-index: 1;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);

        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 10px;
    }


    /* Triângulos para "dobra" atrás do card */
    .ribbon-destaque::before,
    .ribbon-destaque::after {
        content: "";
        position: absolute;
        border-style: solid;
        border-color: #388E3C transparent transparent transparent;
        top: 100%;
        z-index: -1;
    }

    .ribbon-destaque::before {
        left: 0;
        border-width: 10px 0 0 10px;
    }

    .ribbon-destaque::after {
        right: 0;
        border-width: 10px 10px 0 0;
    }
</style>


<div class="page-wrapper">
    <br>
    <div class="alert alert-info" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-search">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5" />
                    <path d="M16.5 17.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" />
                    <path d="M18.5 19.5l2.5 2.5" />
                </svg>
            </div>
            <div>
                <h4 class="alert-title">Resultado da busca de veículos</h4>
                <div class="text-secondary">Aqui você pode gerenciar todos os veículos de acordo com seus filtros.</div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">


                <?php if (empty($carros)): ?>
                    <p>Nenhum carro encontrado com os filtros selecionados.</p>
                <?php else: ?>
                    <div class="row row-cards">
                        <?php foreach ($carros as $carro): ?>
                            <div class="col-9 mb-3">
                                <div class="card card-veiculo shadow-sm d-flex flex-row align-items-center p-2 position-relative" style="overflow: hidden;">
                                    <?php if (!empty($carro['destaque'])): ?>
                                        <div class="ribbon-destaque">Destaque</div>
                                    <?php endif; ?>


                                    <!-- Imagem -->
                                    <div class="carro-imagem position-relative">
                                        <?php if (!empty($carro['preco_promocional']) && $carro['preco_promocional'] > 0): ?>
                                            <div class="preco-promocional-badge">
                                                R$ <?= rtrim(rtrim(number_format($carro['preco_promocional'], 2, ',', '.'), '0'), ',') ?> BRL
                                            </div>
                                        <?php endif; ?>


                                        <img src="<?= $this->Url->build('/' . h($carro['carro_imagem_principal']['caminho'] ?? 'img/erro.svg')) ?>" alt="Imagem do carro" class="img-fluid object-fit-cover">
                                    </div>


                                    <!-- Conteúdo -->
                                    <div class="ps-3 flex-fill">
                                        <h5 class="titulo-carro"><?= h($carro['ano']) . ' ' . strtoupper(h($carro['nome'])) ?></h5>
                                        <hr style="margin:  10px 0 10px 0">
                                        <p class="descricao-carro"><?= h($carro['descricao'] ?? 'Excelente custo-benefício.') ?></p>
                                        <hr style="margin:  10px 0 10px 0">
                                        <ul class="info-list list-inline text-muted small mb-0 mt-2">
                                            <li class="list-inline-item me-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-speedtest">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M5.636 19.364a9 9 0 1 1 12.728 0" />
                                                    <path d="M16 9l-4 4" />
                                                </svg>
                                                <?= h($carro['quilometragem']) ?>km
                                            </li>
                                            <li class="list-inline-item me-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                    <path d="M16 3v4" />
                                                    <path d="M8 3v4" />
                                                    <path d="M4 11h16" />
                                                    <path d="M7 14h.013" />
                                                    <path d="M10.01 14h.005" />
                                                    <path d="M13.01 14h.005" />
                                                    <path d="M16.015 14h.005" />
                                                    <path d="M13.015 17h.005" />
                                                    <path d="M7.01 17h.005" />
                                                    <path d="M10.01 17h.005" />
                                                </svg>
                                                </i>
                                                <?= h(date('d-m-Y', strtotime($carro['data_fabricacao'] ?? $carro['ano'] . '-01-01'))) ?>
                                            </li>
                                            <?php if (!empty($carro['preco_promocional']) && $carro['preco_promocional'] > 0): ?>
                                                <li class="list-inline-item preco-antigo">
                                                    R$ <?= rtrim(rtrim(number_format($carro['preco'], 2, ',', '.'), '0'), ',') ?> BRL
                                                </li>
                                            <?php else: ?>
                                                <li class="list-inline-item text-success fw-bold">
                                                    R$ <?= rtrim(rtrim(number_format($carro['preco'], 2, ',', '.'), '0'), ',') ?> BRL
                                                </li>
                                            <?php endif; ?>
                                            

                                        </ul>
                                        <div class="text-end mt-2">
                                            <a href="<?= $this->Url->build(['controller' => 'Carros', 'action' => 'detalhes', $carro['id']]) ?>" class="btn btn-outline-primary btn-sm">
                                                Ver mais
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>



            </div>
        </div>
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
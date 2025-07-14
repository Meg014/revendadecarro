<style>
    .card-carousel,
    .card-detalhes {
        height: 100%;
        min-height: 420px;
    }

    .carousel-inner img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }

    .carousel-container {
        height: 360px;
        overflow: hidden;
        border-radius: 6px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
    }

    .card-detalhes .table td {
        padding: 4px 8px;
        font-size: 14px;
    }

    .card-detalhes .list-unstyled li {
        font-size: 13px;
    }

    .preco-original {
        color: #e53935;
        text-decoration: line-through;
        font-weight: bold;
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .preco-promocional {
        color: #43a047;
        font-weight: bold;
        font-size: 1.5rem;
    }
</style>


<?php
$this->assign('title', h($carro->nome));
?>

<div class="container my-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div id="carroCarousel" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        <?php foreach ($carro->carro_imagens as $index => $imagem): ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <img src="<?= $this->Url->build('/' . $imagem->caminho) ?>" class="d-block w-100" alt="Imagem <?= $index + 1 ?>">
                            </div>
                        <?php endforeach; ?>

                        <?php if (empty($carro->carro_imagens)): ?>
                            <div class="carousel-item active">
                                <img src="<?= $this->Url->build('/img/erro.svg') ?>" class="d-block w-100" alt="Imagem padrão">
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Botões de navegação -->
                    <?php if (count($carro->carro_imagens) > 1): ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carroCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carroCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?= h($carro->nome) ?></h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white card-detalhes p-3" style="background-color: #5C6166;">
                <div class="d-flex justify-content-between mb-2">
                    <small>
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
                        <?= $carro->ano ?>
                    </small>

                    <small>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-speedtest">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5.636 19.364a9 9 0 1 1 12.728 0" />
                            <path d="M16 9l-4 4" />
                        </svg>
                        <?= $carro->quilometragem ?> km
                    </small>
                    <small>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
                        </svg>
                        <?= h($carro->motor) ?>
                    </small>
                </div>
                <hr style="margin:  10px 0 10px 0">

                <h5 class="text-center"><?= h($carro->ano . ' ' . $carro->nome) ?></h5>
                <p class="text-center">#<?= h($carro->placa) ?></p>

                <table class="table table-vcenter card-table table-hover text-white table-sm mb-0">
                    <tr>
                        <td>Tipo de combustível</td>
                        <td><?= h($carro->combustivei->nome ?? '-') ?></td>
                    </tr>
                    <tr>
                        <td>Cavalos</td>
                        <td><?= h($carro->potencia) ?></td>
                    </tr>
                    <tr>
                        <td>Transmissão</td>
                        <td><?= h($carro->transmisso->nome ?? '-') ?></td>
                    </tr>
                    <tr>
                        <td>Velocidade Máxima</td>
                        <td><?= h($carro->velocidade_maxima) ?></td>
                    </tr>
                    <tr>
                        <td>Trem de direção</td>
                        <td><?= h($carro->tracao) ?></td>
                    </tr>
                    <tr>
                        <td>Torque</td>
                        <td><?= h($carro->torque) ?></td>
                    </tr>
                    <tr>
                        <td>Cor Interior</td>
                        <td><?= h($carro->cor_interior) ?></td>
                    </tr>
                    <tr>
                        <td>Cor Exterior</td>
                        <td><?= h($carro->cor_exterior) ?></td>
                    </tr>
                    <tr>
                        <td>Portas</td>
                        <td><?= h($carro->portas) ?></td>
                    </tr>
                    <tr>
                        <td>Condição</td>
                        <td><?= h($carro->condico->nome ?? '-') ?></td>
                    </tr>
                </table>

                <?php if (isset($carro->preco_promocional) && (float)$carro->preco_promocional > 0): ?>
                    <div class="text-end mt-3">
                        <span class="preco-original">R$ <?= number_format($carro->preco, 0, ',', '.') ?></span>
                        <span class="preco-promocional">R$ <?= number_format($carro->preco_promocional, 0, ',', '.') ?> BRL</span>
                    </div>
                <?php else: ?>
                    <h4 class="text-end mt-3 text-success">R$ <?= number_format($carro->preco, 0, ',', '.') ?> BRL</h4>
                <?php endif; ?>

            </div>
        </div>

    </div>

    <!-- Abas: Visão geral / Descrição / Contato -->
    <ul class="nav nav-tabs mt-4" id="tabCarro" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#visao" type="button" role="tab">Visão Geral</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#descricao" type="button" role="tab">Descrição</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#contato" type="button" role="tab">Contato</button>
        </li>
    </ul>

    <div class="tab-content p-4 border rounded-bottom bg-white">
        <div class="tab-pane fade show active" id="visao" role="tabpanel">
            <div class="row">
                <?php foreach (array_chunk($carro->features, ceil(count($carro->features) / 3)) as $col): ?>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <?php foreach ($col as $feature): ?>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                    <?= h($feature->nome) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="tab-pane fade" id="descricao" role="tabpanel">
            <p><?= nl2br(h($carro->descricao)) ?></p>
        </div>

        <div class="tab-pane fade" id="contato" role="tabpanel">
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="mb-2">
                            <label class="form-label">Seu nome</label>
                            <input type="text" class="form-control" placeholder="Seu nome">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Seu e-mail</label>
                            <input type="email" class="form-control" placeholder="email@email.com">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Sua mensagem</label>
                            <textarea class="form-control" rows="4" placeholder="Digite aqui..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="fw-bold"><?= h($carro->exposico->loja->nome ?? 'Loja não informada') ?></h3>
                            <hr style="margin:  10px 0 10px 0">
                            <?php if (!empty($carro->exposico->endereco) || !empty($carro->exposico->cidade) || !empty($carro->exposico->estado)) : ?>
                                <p class="mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-location">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                    </svg>
                                    <?= h($carro->exposico->endereco ?? '') ?><?= !empty($carro->exposico->endereco) ? ',' : '' ?>
                                    <?= h($carro->exposico->cidade ?? '') ?>
                                    <?= !empty($carro->exposico->estado) ? '- ' . h($carro->exposico->estado) : '' ?>
                                </p>
                            <?php endif; ?>
                            <hr style="margin:  10px 0 10px 0">
                            <?php if (!empty($carro->exposico->telefone)) : ?>
                                <p class="mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-phone">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                    </svg> <?= h($carro->exposico->telefone) ?></p>
                            <?php endif; ?>
                            <hr style="margin:  10px 0 10px 0">
                            <?php if (!empty($carro->user->email)) : ?>
                                <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                        <path d="M3 7l9 6l9 -6" />
                                    </svg> <?= h($carro->user->email) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
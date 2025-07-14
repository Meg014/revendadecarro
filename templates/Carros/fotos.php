<style>
    .image-card {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer;
    }

    .image-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: 0.4s ease;
        display: block;
        border-radius: 8px;
    }

    .image-card:hover img {
        filter: brightness(60%);
        transform: scale(1.02);
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s ease;
        background-color: rgba(0, 0, 0, 0.3);
    }

    .image-card:hover .image-overlay {
        opacity: 1;
    }

    .image-overlay i {
        font-size: 2rem;
        color: white;
    }

    .card-body {
        padding: 8px;
        background-color: #f1f1f1;
        text-align: center;
        font-weight: 500;
    }

    .modal-close-btn {
        position: absolute;
        top: 8px;
        right: 12px;
        background: transparent;
        border: none;
        font-size: 1.5rem;
        color: #fff;
        z-index: 10;
    }

    .modal-content {
        position: relative;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="page-wrapper">
    <br>
    <div class="alert alert-info" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-photo">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 8h.01" />
                    <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                </svg>
            </div>
            <div>
                <h4 class="alert-title">Visualizando fotos</h4>
                <div class="text-secondary">Aqui você pode gerenciar sua galeria de imagens de listagem.</div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card p-3">
                        <div class="row g-3">
                            <?php if (!empty($carros->carro_imagens)) : ?>
                                <?php foreach ($carros->carro_imagens as $imagem) : ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="card card-sm shadow-sm">
                                            <div class="image-card" data-bs-toggle="modal" data-bs-target="#zoomModal<?= $imagem->id ?>">
                                                <img src="<?= $this->Url->build('/' . h($imagem->caminho)) ?>" alt="Foto">
                                                <div class="image-overlay">
                                                    <i class="fas fa-search-plus"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-secondary"><?= h($imagem->titulo) ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="zoomModal<?= $imagem->id ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Fechar">
                                                    <i class="fas fa-times" style="color: #bdbdbd;"></i>
                                                </button>
                                                <div class="modal-body p-0">
                                                    <img src="<?= $this->Url->build('/' . h($imagem->caminho)) ?>" alt="Zoom Foto" class="img-fluid w-100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="empty text-center">
                                    <div class="empty-img">
                                        <?= $this->Html->image('erro.svg', ['alt' => 'x', 'height' => '128']) ?>
                                    </div>
                                    <p class="empty-title">Sem resultados encontrados</p>
                                    <p class="empty-subtitle text-secondary">
                                        Sem imagens cadastradas, cadastre as imagens para poder visualizar
                                    </p>
                                    <div class="empty-action">
                                        <a href="<?= $this->Url->build(['controller' => 'Carros', 'action' => 'imagens', $carros->id]) ?>" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-library-plus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                                <path d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                                                <path d="M11 10h6" />
                                                <path d="M14 7v6" />
                                            </svg>
                                            Cadastrar
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
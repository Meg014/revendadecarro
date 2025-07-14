<script>
    function usarMinhaLocalizacao() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
                    .then(response => response.json())
                    .then(data => {
                        const cidade = data.address.city || data.address.town || data.address.village;
                        const estado = data.address.state;

                        const params = new URLSearchParams(window.location.search);
                        params.set('cidade', cidade);
                        params.set('estado', estado);
                        window.location.search = params.toString();
                    });
            });
        } else {
            alert("Seu navegador não suporta geolocalização.");
        }
    }
</script>




<style>
    #range-connect {
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .car-card {
        position: relative;
        overflow: hidden;
        border-radius: 6px;
    }


    .car-info {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.75);
        /* fundo escuro translúcido */
        color: white;
        padding: 10px 15px;
    }



    .car-details {
        margin: 0;
        font-size: 14px;
        color: #cccccc;
    }

    .car-price {
        float: right;
        color: #facc15;
        /* amarelo dourado */
        font-weight: bold;
        font-size: 16px;
    }

    .car-img {
        object-fit: cover;
        height: 100%;
        border-radius: 6px;
    }

    .car-info-overlay {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 15px;
        background: rgba(0, 0, 0, 0.75);
        color: white;
    }

    .car-title {
        margin: 0;
        font-size: 18px;
        color: #0ca2f2;
    }

    .carousel-item {
        height: 463px;
    }

    .carousel-item img {
        height: 100%;
        object-fit: cover;
    }

    .price {
        background-color: #80c79a;
        color: white;
        text-align: center;
        padding: 10px;
        font-weight: bold;
        border-top: 1px solid #eee;
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

    .preco-original {
        color: #e53935;
        /* vermelho */
        text-decoration: line-through;
        margin-right: 8px;
        font-weight: bold;
    }

    .preco-promocional {
        color: #43a047;
        /* verde */
        font-weight: bold;
    }
</style>
<div class="page-wrapper">
    <br>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-stamp card-stamp-lg">
                            <div class="card-stamp-icon bg-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin-2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7" />
                                    <path d="M9 4v13" />
                                    <path d="M15 7v5" />
                                    <path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" />
                                    <path d="M19 18v.01" />
                                </svg>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="h1">Veículos Próximos </h3>
                                    <div class="markdown text-secondary fs-3">
                                        Use sua localização atual para exibir veículos proximos a você
                                    </div>
                                    <div class="mt-3">
                                        <button onclick="usarMinhaLocalizacao()" class="btn btn-primary mb-3">
                                            Usar minha localização real
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <div id="carousel-indicators" class="carousel slide pointer-event" data-bs-ride="carousel">
                                <!-- Botões indicadores -->
                                <div class="carousel-indicators">
                                    <?php foreach ($carros as $index => $carro) : ?>
                                        <button type="button"
                                            data-bs-target="#carousel-indicators"
                                            data-bs-slide-to="<?= $index ?>"
                                            class="<?= $index === 0 ? 'active' : '' ?>"
                                            <?= $index === 0 ? 'aria-current="true"' : '' ?>>
                                        </button>
                                    <?php endforeach; ?>

                                </div>

                                <!-- Slides -->
                                <div class="carousel-inner">
                                    <?php foreach ($carros as $index => $carro) : ?>
                                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?> position-relative">
                                            <img src="<?= $this->Url->build('/' . h($carro['carro_imagem_principal']['caminho'] ?? 'img/erro.svg')) ?>" class="d-block w-100 car-img" alt="Imagem do carro">
                                            <div class="car-info-overlay">
                                                <h5 class="car-title"><?= h($carro['nome']) ?></h5>
                                                <p class="car-details"><?= h($carro['quilometragem']) ?> km - Motor: <?= h($carro['motor']) ?></p>
                                                <span class="car-price">R$ <?= number_format($carro['preco'], 0, ',', '.') ?> BRL</span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Busca de veículos</h3>
                        </div>
                        <form method="GET" action="<?= $this->Url->build(['controller' => 'Carros', 'action' => 'search']) ?>">

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Marca</label>
                                            <select name="marca" id="marca" class="form-select">
                                                <option value="">Selecione uma marca</option>
                                                <?php foreach ($getMarcas as $getMarca): ?>
                                                    <option value="<?= $getMarca['id'] ?>"><?= $getMarca['nome'] ?></option>
                                                <?php endforeach; ?>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Modelo</label>
                                            <select name="modelo" id="modelo" class="form-select">
                                                <option value="">Selecione um modelo</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ano Inicial</label>
                                            <select name="ano_inicial" class="form-select">
                                                <option value="">Ano inicial</option>
                                                <?php foreach ($anos as $ano): ?>
                                                    <option value="<?= $ano ?>"><?= $ano ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ano Final</label>
                                            <select name="ano_final" class="form-select">
                                                <option value="">Ano final</option>
                                                <?php foreach ($anos as $ano): ?>
                                                    <option value="<?= $ano ?>"><?= $ano ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Faixa de preço</label>
                                            <div class="form-range mb-2" id="range-connect"></div>
                                            <div class="d-flex justify-content-between">
                                                <span id="min-price">R$97.500</span>
                                                <span id="max-price">R$153.000</span>
                                            </div>

                                            <input type="hidden" name="preco_min" id="preco-min">
                                            <input type="hidden" name="preco_max" id="preco-max">

                                        </div>
                                    </div>

                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-secondary w-100">ENCONTRAR</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">



                <div class="page-wrapper">

                    <div class="page-header d-print-none" aria-label="Page header">
                        <div class="container-xl">
                            <div class="row g-2 align-items-center">
                                <div class="col">
                                    <h2 class="page-title">Destaques</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="container-xl">
                            <div class="row row-cards">

                                <?php foreach ($destaques as $carro) : ?>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card card-md position-relative" style="overflow: hidden;">
                                            <div class="ribbon-destaque">Destaque</div>
                                            <div class="card-body">
                                                <div class="text-uppercase text-secondary font-weight-medium text-center"><?= h($carro['nome']) ?></div>
                                                <div class="display-5 fw-bold my-3">
                                                    <img src="<?= $this->Url->build('/' . h($carro['carro_imagem_principal']['caminho'] ?? 'img/erro.svg')) ?>" class="d-block w-100 car-img" alt="Imagem do carro">
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-v card-table">
                                                        <tr>
                                                            <td>Ano modelo:</td>
                                                            <td><?= h($carro['ano']) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quilometragem:</td>
                                                            <td><?= h($carro['quilometragem']) ?> km</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Motor:</td>
                                                            <td><?= h($carro['motor']) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="price">
                                                                <div class="mt-3">
                                                                    <?php if (!empty($carro['preco_promocional']) && $carro['preco_promocional'] > 0): ?>
                                                                        <div>
                                                                            <span class="preco-original">R$ <?= number_format($carro['preco'], 0, ',', '.') ?></span>
                                                                            <span class="preco-promocional">R$ <?= number_format($carro['preco_promocional'], 0, ',', '.') ?></span>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <span class="preco-promocional">R$ <?= number_format($carro['preco'], 0, ',', '.') ?></span>
                                                                    <?php endif; ?>


                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="text-center mt-4">
                                                    <a href="<?= $this->Url->build(['controller' => 'Carros', 'action' => 'detalhes', $carro['id']]) ?>" class="btn btn-secondary w-100">Detalhes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>




                                <div class="empty-action text-center">
                                    <a href="<?= $this->Url->build(['controller' => 'Carros', 'action' => 'destaques']) ?>" class="btn btn-secondary">Ver todos Destaques</a>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

</div>


<link href="https://cdn.jsdelivr.net/npm/nouislider@15.6.0/dist/nouislider.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/nouislider@15.6.0/dist/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const slider = document.getElementById('range-connect');

        if (window.noUiSlider) {
            noUiSlider.create(slider, {
                start: [97000, 153000],
                connect: true,
                step: 1000,
                range: {
                    min: 7500,
                    max: 250000
                },
                format: wNumb({
                    decimals: 0,
                    thousand: '.',
                    prefix: 'R$ '
                })
            });

            const minPriceEl = document.getElementById('min-price');
            const maxPriceEl = document.getElementById('max-price');

            slider.noUiSlider.on('update', function(values, handle) {
                document.getElementById('preco-min').value = values[0].replace(/\D/g, '');
                document.getElementById('preco-max').value = values[1].replace(/\D/g, '');
                document.getElementById('min-price').innerText = values[0];
                document.getElementById('max-price').innerText = values[1];
            });


        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const marcaSelect = document.getElementById('marca');
        const modeloSelect = document.getElementById('modelo');

        marcaSelect.addEventListener('change', function() {
            const marcaId = this.value;

            modeloSelect.innerHTML = '<option value="">Carregando...</option>';

            if (marcaId) {
                fetch('<?= $this->Url->build(['controller' => 'Carros', 'action' => 'getModelosByMarca']) ?>?marca_id=' + marcaId)
                    .then(response => response.json())
                    .then(data => {
                        modeloSelect.innerHTML = '<option value="">Selecione um modelo</option>';
                        for (const [id, nome] of Object.entries(data)) {
                            const opt = document.createElement('option');
                            opt.value = id;
                            opt.text = nome;
                            modeloSelect.appendChild(opt);
                        }
                    });
            } else {
                modeloSelect.innerHTML = '<option value="">Selecione uma marca primeiro</option>';
            }
        });
    });
</script>
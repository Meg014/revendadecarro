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
</style>
<div class="page-wrapper">
    <br>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <div id="carousel-indicators" class="carousel slide pointer-event" data-bs-ride="carousel">
                                <!-- Botões indicadores -->
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="0" class=""></button>
                                    <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="1" class=""></button>
                                    <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="2" class=""></button>
                                    <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="3" class=""></button>
                                    <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="4" class="active" aria-current="true"></button>
                                </div>

                                <!-- Slides -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active position-relative">
                                        <?= $this->Html->image('bg.svg', ['class' => 'd-block w-100 car-img']) ?>
                                        <div class="car-info-overlay">
                                            <h5 class="car-title">2012 Toyota Avensis Wagon</h5>
                                            <p class="car-details">152000km Motor: 4-Cylinder 1.8 WT-i</p>
                                            <span class="car-price">R$25.000 BRL</span>
                                        </div>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <?= $this->Html->image('erro.svg', ['class' => 'd-block w-100 car-img']) ?>
                                        <div class="car-info-overlay">
                                            <h5 class="car-title">2006 Ford Galaxy 2.0 TDCi</h5>
                                            <p class="car-details">224320km Motor: 4.2L I4</p>
                                            <span class="car-price">R$7.500 BRL</span>
                                        </div>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <?= $this->Html->image('logo.png', ['class' => 'd-block w-100 car-img']) ?>
                                        <div class="car-info-overlay">
                                            <h5 class="car-title">Modelo Genérico</h5>
                                            <p class="car-details">Km e motor</p>
                                            <span class="car-price">R$00.000 BRL</span>
                                        </div>
                                    </div>
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
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Marca</label>
                                        <select name="marca" class="form-select" required>
                                            <option value="">Selecione uma marca</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Modelo</label>
                                        <select name="modelo" class="form-select" required>
                                            <option value="">Selecione um modelo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ano Inicial</label>
                                        <select name="ano_inicial" class="form-select">
                                            <option value="">Selecione o ano</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ano Final</label>
                                        <select name="ano_final" class="form-select">
                                            <option value="">Selecione o ano</option>
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



                                    </div>
                                </div>

                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-secondary w-100">ENCONTRAR</button>
                            </div>

                        </div>
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

                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-md">
                                        <div class="ribbon ribbon-top ribbon-bookmark bg-green">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-3">
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                            </svg>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-uppercase text-secondary font-weight-medium  text-center">Nome do Carro</div>
                                            <div class="display-5 fw-bold my-3">
                                                <?= $this->Html->image('bg.svg', ['class' => 'd-block w-100 car-img']) ?>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-v  card-table">
                                                    <tr>
                                                        <td>Ano modelo:</td>
                                                        <td>2010</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Quilometragem:</td>
                                                        <td>18230km</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Motor:</td>
                                                        <td>2.5L 4L</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="price">
                                                            <div class="mt-3">
                                                                <span class="badge bg-green-lt"> R$12.000 BRL</span>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center mt-4">
                                                <a href="#" class="btn btn-secondary w-100">Detalhes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-md">
                                        <div class="ribbon ribbon-top ribbon-bookmark bg-green">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-3">
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                            </svg>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-uppercase text-secondary font-weight-medium  text-center">Nome do Carro</div>
                                            <div class="display-5 fw-bold my-3">
                                                <?= $this->Html->image('bg.svg', ['class' => 'd-block w-100 car-img']) ?>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-v  card-table">
                                                    <tr>
                                                        <td>Ano modelo:</td>
                                                        <td>2010</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Quilometragem:</td>
                                                        <td>18230km</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Motor:</td>
                                                        <td>2.5L 4L</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="price">
                                                            <div class="mt-3">
                                                                <span class="badge bg-green-lt"> R$12.000 BRL</span>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center mt-4">
                                                <a href="#" class="btn btn-secondary w-100">Detalhes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-md">
                                        <div class="ribbon ribbon-top ribbon-bookmark bg-green">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-3">
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                            </svg>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-uppercase text-secondary font-weight-medium  text-center">Nome do Carro</div>
                                            <div class="display-5 fw-bold my-3">
                                                <?= $this->Html->image('bg.svg', ['class' => 'd-block w-100 car-img']) ?>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-v  card-table">
                                                    <tr>
                                                        <td>Ano modelo:</td>
                                                        <td>2010</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Quilometragem:</td>
                                                        <td>18230km</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Motor:</td>
                                                        <td>2.5L 4L</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="price">
                                                            <div class="mt-3">
                                                                <span class="badge bg-green-lt"> R$12.000 BRL</span>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center mt-4">
                                                <a href="#" class="btn btn-secondary w-100">Detalhes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="empty-action text-center">
                                    <a href="./." class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-autofit-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M20 12v-6a2 2 0 0 0 -2 -2h-12a2 2 0 0 0 -2 2v8" />
                                            <path d="M4 18h17" />
                                            <path d="M18 15l3 3l-3 3" />
                                        </svg>
                                        Ver todos Destaques
                                    </a>
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
                if (handle === 0) {
                    minPriceEl.innerText = values[0];
                } else {
                    maxPriceEl.innerText = values[1];
                }
            });
        }
    });
</script>
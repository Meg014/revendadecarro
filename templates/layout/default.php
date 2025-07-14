<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Revenda de Carro';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revenda de Carro - admin</title>

    <?= $this->Html->meta('icon') ?>

    <!-- General CSS Files
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"> -->

    <!-- CSS Libraries -->
    <?= $this->Html->css(['tabler.min.css?1692870487']) ?>
    <?= $this->Html->css(['tabler-flags.min.css?1692870487']) ?>
    <?= $this->Html->css(['tabler-payments.min.css?1692870487']) ?>
    <?= $this->Html->css(['tabler-vendors.min.css?1692870487']) ?>
    <?= $this->Html->css(['demo.min.css?1692870487']) ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Template CSS -->
    <?= $this->Html->css(['style.css']) ?>
    <?= $this->Html->css(['components.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

</head>

<body>

    <div class="page">
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="<?= $this->Url->build(['controller' => 'Carros', 'action' => 'dashboard']) ?>">
                        <?php echo $this->Html->image('logo.png', ['alt' => 'Revenda de Carro', 'style' => 'height: 32px; width: 110px']); ?>

                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">

                    <div class="d-none d-md-flex">
                        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
                            data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                            </svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
                            data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </a>

                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div><?= h($authUser['name'] ?? 'Usuário') ?></div>
                                <div class="mt-1 small text-secondary">Bem vindo</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <!-- <a href="./profile.html" class="dropdown-item">Perfil</a> -->
                            <?= $this->Form->postLink(
                                'Sair',
                                ['controller' => 'Users', 'action' => 'logout'],
                                ['class' => 'dropdown-item', 'confirm' => 'Deseja realmente sair?']
                            ) ?>
                            <div class="dropdown-divider"></div>
                            <a href="./settings.html" class="dropdown-item">Último Login: <?= h($authUser['last_login'] ?? 'Primeiro Acesso') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <ul class="navbar-nav">


                            <?php if (!empty($authUser) && $authUser['role_id'] == 1): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                <path d="M9 12h6" />
                                                <path d="M9 16h6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Inventário
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <a href="<?= $this->Url->build(['controller' => 'Categorias', 'action' => 'index']) ?>" class="dropdown-item">
                                                    Categorias
                                                </a>

                                                <a href="<?= $this->Url->build(['controller' => 'Marcas', 'action' => 'index']) ?>" class="dropdown-item">
                                                    Marcas
                                                </a>
                                                <a href="<?= $this->Url->build(['controller' => 'Modelos', 'action' => 'index']) ?>" class="dropdown-item">
                                                    Modelos
                                                </a>
                                                <a href="<?= $this->Url->build(['controller' => 'Features', 'action' => 'index']) ?>" class="dropdown-item">
                                                    Características
                                                </a>
                                                <a href="<?= $this->Url->build(['controller' => 'Condicoes', 'action' => 'index']) ?>" class="dropdown-item">
                                                    Condições
                                                </a>
                                                <a href="<?= $this->Url->build(['controller' => 'Transmissoes', 'action' => 'index']) ?>" class="dropdown-item">
                                                    Transmissões
                                                </a>
                                                <a href="<?= $this->Url->build(['controller' => 'Combustiveis', 'action' => 'index']) ?>" class="dropdown-item">
                                                    Tipo de Combustível
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <li class="nav-item ">
                                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Lojas', 'action' => 'index']) ?>">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-warehouse">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 21v-13l9 -4l9 4v13" />
                                            <path d="M13 13h4v8h-10v-6h6" />
                                            <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Concessionária
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Exposicoes', 'action' => 'index']) ?>">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Showrooms
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Carros', 'action' => 'index']) ?>">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M13 5h8" />
                                            <path d="M13 9h5" />
                                            <path d="M13 15h8" />
                                            <path d="M13 19h5" />
                                            <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                            <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Carros
                                    </span>
                                </a>
                            </li>

                            <?php if (!empty($authUser) && $authUser['role_id'] == 1): ?>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Usuários
                                        </span>
                                    </a>
                                </li>
                            <?php endif; ?>








                        </ul>

                    </div>
                </div>
            </div>
        </header>

        <main class="main">
            <div class="container">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>

    </div>

    <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-lg-auto ms-lg-auto">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                        <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                        <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                        <li class="list-inline-item">
                            <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                                Sponsor
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            Copyright &copy; 2025.
                            Maria Eduarda G. Barbosa
                        </li>
                        <li class="list-inline-item">
                            <a class="link-secondary" rel="noopener">
                                v1.0.0-beta
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

<!-- Libs JS -->
<?= $this->Html->script(['libs/apexcharts/dist/apexcharts.min.js?1692870487']) ?>
<?= $this->Html->script(['libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487']) ?>
<?= $this->Html->script(['libs/jsvectormap/dist/maps/world.js?1692870487']) ?>
<?= $this->Html->script(['libs/jsvectormap/dist/maps/world-merc.js?1692870487']) ?>

<!-- Tabler Core -->
<?= $this->Html->script(['tabler.min.js?1692870487']) ?>
<?= $this->Html->script(['demo.min.js?1692870487']) ?>
<?= $this->Html->script(['demo-theme.min.js?1692870487']) ?>


</html>
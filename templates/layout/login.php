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
    <title>Revenda de Carro</title>

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

<body  class=" d-flex flex-column">

   <div class="page page-center">
        
        <main class="main">
            <div class="container">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>

    </div>

   

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
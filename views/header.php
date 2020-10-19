<?php
    $selected = 'INICIO';
    if (isset($_GET['controller'])) {
        switch ($_GET['controller']) {
            case 'About':
                $selected = 'ACERCA DE';
                break;
            case 'Donantes':
                $selected = 'DONANTES';
                break;
            case 'Usuario':
                $selected = 'REGISTRO';
                break;
            default:
                break;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/jeringa.svg">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/root.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/register.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/donantes.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/about.css">
    <title>Donantes covid-19</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar__logo">
                <a href="<?=BASE_DIR?>" class="navbar__tittle">
                <img src="<?=BASE_DIR?>assets/images/jeringa.svg" alt="jeringa" class="navbar__logo-img">
                    <p class="navbar__logo-tittle">U-Safe</p>
                </a>

                <div class="navbar__h1">
                    <?php echo $selected; ?>
                </div>
            </div>

            <div class="hamburger">
                <div class="hamburger__line"></div>
                <div class="hamburger__line"></div>
                <div class="hamburger__line"></div>
            </div>

            <ul class="navbar__links">
                <li class="navbar__link">
                    <a href="<?=BASE_DIR?>" class="navbar__a <?=($selected == 'INICIO')? 'navbar__a--selected': ''?>">Inicio</a>
                </li>
                <li class="navbar__link">
                    <a href="<?=BASE_DIR?>Donantes/list" class="navbar__a <?=($selected == 'DONANTES')? 'navbar__a--selected': ''?>">Donantes</a>
                </li>
                <li class="navbar__link">
                    <a href="<?=BASE_DIR?>Usuario/register" class="navbar__a <?=($selected == 'REGISTRO')? 'navbar__a--selected': ''?>">Registrar</a>
                </li>
                <li class="navbar__link">
                    <a href="<?=BASE_DIR?>About/showAbout" class="navbar__a <?=($selected == 'ACERCA DE')? 'navbar__a--selected': ''?>">Acerca de</a>
                </li>
            </ul>
        </nav>
    </header>
<script type="text/javascript" src="<?=BASE_DIR;?>js/main.js"></script>

<?php
    $selected = 'home';
    if (isset($_GET['Controller'])) {
        switch ($_GET['Controller']) {
            case 'About':
                $selected = 'About';
                break;
            case 'Donantes':
                $selected = 'Donantes';
                break;
            case 'Usuarios':
                $selected = 'Usuarios';
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
    <!-- <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/style.css"> -->
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/root.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/footer.css">
    <title>Donantes covid-19</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar__logo">
                <a href="home.php" class="navbar__a">
                <img src="<?=BASE_DIR?>assets/images/jeringa.svg" alt="jeringa" class="navbar__logo-img">
                    INICIO
                </a>
            </div>

            <div class="navbar__navegation">
                <ul class="navbar__links">
                    <li class="navbar__link">
                        <a href="<?=BASE_DIR?>" class="navbar__a <?=($selected == 'Home')? 'navbar__a--selected': ''?>">Inicio</a>
                    </li>
                    <li class="navbar__link">
                        <a href="<?=BASE_DIR?>Donantes/showList" class="navbar__a <?=($selected == 'Donantes')? 'navbar__a--selected': ''?>">Donantes</a>
                    </li>
                    <li class="navbar__link">
                        <a href="<?=BASE_DIR?>Usuario/register" class="navbar__a <?=($selected == 'Usuario')? 'navbar__a--selected': ''?>">Registrar</a>
                    </li>
                    <li class="navbar__link">
                        <a href="<?=BASE_DIR?>About/showAbout" class="navbar__a <?=($selected == 'About')? 'navbar__a--selected': ''?>">Acerca de</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
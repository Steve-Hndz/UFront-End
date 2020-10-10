<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/style.css"> -->
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/root.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/home.css">
    <title>TPI -render con OOP-</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar__logo">
                <a href="home.php" class="navbar__a">
                    INICIO PAGINA
                </a>
            </div>

            <div class="navbar__navegation">
                <ul class="navbar__links">
                    <li class="navbar__link">
                        <a href="home.php" class="navbar__a navbar__a--selected">Inicio</a>
                    </li>
                    <li class="navbar__link">
                        <a href="about.php" class="navbar__a">Donantes</a>
                    </li>
                    <li class="navbar__link">
                        <a href="contact.php" class="navbar__a">Registrar</a>
                    </li>
                    <li class="navbar__link">
                        <a href="contact.php" class="navbar__a">Acerca de</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
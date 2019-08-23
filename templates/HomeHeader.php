<!DOCTYPE HTML>
<html lang="pl-PL">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Szachy - Blog</title>

    <meta http-equiv="Content-Security-Policy" content="default-src 'self' kit.fontawesome.com kit-free.fontawesome.com;">
    <meta name="theme-color" content="#4285f4">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
    <script src="https://kit.fontawesome.com/2bba5952a0.js"></script>
    <link rel="stylesheet" href="styles/bulma.css"/>
    <link rel="stylesheet" href="styles/style.css"/>
    <link rel="stylesheet" href="styles/mobile.css"/>
    <script src="js/Utility.js"></script>
</head>
<body class="has-spaced-navbar-fixed-top has-background-primary">
<header>
    <nav class="navbar is-spaced is-light is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item navbar-logo" href="?task=home&action=index">
            <i class="fas fa-chess fa-3x"></i>
        </a>
        <a role="button" class="navbar-mobile navbar-burger burger" aria-label="menu" aria-expanded="false"
           data-target="navbar-admin">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbar-admin" class="navbar-menu">
        <div class="navbar-start">
            <?php if(isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin'){
                echo'             
                <a class="navbar-item" href="?task=admin&action=index">
                    Panel Admina
                </a>';
            } ?>

            <a class="navbar-item" href="?task=home&action=index">
                Artykuły
            </a>
            <a class="navbar-item" href="?task=gallery&action=index">
                Galeria
            </a>
            <a class="navbar-item" href="?task=canvas&action=index">
                Canvas
            </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php
                    if (isset($_SESSION['logged']) && $_SESSION['logged']) {
                        echo '
                        <a class="button is-primary" href="?task=security&action=logout&csrf_token='. $_SESSION['csrf_token'].'">
                            <strong>Wyloguj się</strong>
                        </a>
                        <a class="button is-rounded is-info" href="?task=user&action=index&id='.$this->removeMaliciousCode($_SESSION['id']).'&csrf_token='.$this->removeMaliciousCode($_SESSION['csrf_token']).'">
                            <i class="fas fa-user"></i>
                        </a>
                        ';
                    } else {
                        echo '
                        <a class="button is-primary" href="?task=security&action=register">
                            <strong>Zarejestruj się</strong>
                        </a>
                        <a class="button is-light" href="?task=security&action=login">
                            Zaloguj się
                        </a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </nav>
</header>

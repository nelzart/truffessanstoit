<?php 

function pageActiveClass($page) {
    if($page == basename($_SERVER['PHP_SELF'])) {
        return 'active1';
    }
    else {
        return '';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titlepage ." "?>Association Truffes sans toît </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header>
            <nav class="hide-on-med-and-down">
                <div>
                    <a href="index.php" class="brand-logo left "><img class="logo" src="img/logo/logoN.png">
                    <img class="logoTypo" src="img/logo/logotypo.png"></a>
                    
                    <ul id="nav-menu" class="right">
                        <li><a href="./index.php" class="<?= pageActiveClass('index.php'); ?>">Accueil</a></li>
                        <li><a href="adoption.php" class="<?= pageActiveClass('adoption.php'); ?>">Adoptions</a></li>
                        <li><a href="aide.php" class="<?= pageActiveClass('aide.php'); ?>">Nous Aider</a></li>
                        <li><a href="contact.php" class="<?= pageActiveClass('contact.php'); ?>">Nous contacter</a></li>
                        <div class="sandwich">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </ul>
                </div>
            </nav>
            <div class="show-on-small show-on-medium hide-on-med-and-up">
                <div class="logomobile">
                    <a href="index.php" class="logomobile brand-logo left">
                    <img class="logoTypo show-on-small show-on-medium hide-on-med-and-up" src="img/logo/logotypo.png"></a>
                </div>
            </div>
            
            
            <i id="burger" class="hide-on-med-and-up show-on-small show-on-medium" onclick="burger()">
                <div class="sandwich">
                    <div class="pulse"></div>
                    <div class="pulse"></div>
                    <div class="pulse"></div>
                </div>
            </i>
                <i id="quit" class="material-icons pulse" onclick="quit()">clear</i>
                <div id="links" style="position:fixed">
                    <a href="./index.php" class="<?= pageActiveClass('index.php'); ?>">Accueil</a>
                    <a href="adoption.php">Adoptions</a>
                    <a href="aide.php">Nous Aider</a>
                    <a href="contact.php">Nous Contacter</a>

                </div>
                                 

        </header>

        <main>
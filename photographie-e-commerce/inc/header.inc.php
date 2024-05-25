<?php

require_once "functions.inc.php";



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Imperial+Script&family=Marck+Script&family=Meow+Script&family=Nova+Script&family=Rouge+Script&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?=RACINE_SITE ?>./assets/css/style.css">
    <title><?=$title ?></title>
</head>

<body>

    <header>
        <nav class="navbar fixed-top">

            <img src="./assets/img/Transparent-Photography-Logo-copy.png" alt="logo">
                <ul>
                    <li>
                        <a href="index.php"><span>EYE </span> PHOTOGRAPHIE</a>
                    </li>
                    
                    <li>
                        <!-- <a href="#" class="btn"  data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"> -->
                        <a href="#" class="btn"  data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false">
                        <h5 class=" mb-0">Menu</h5>
                        </a>

                        <div style="min-height: 120px;">
                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                <div class="card card-body" style="width: 250px;">
                                    <a href="<?=RACINE_SITE ?>index.php" class="menuL fs-6 text-center">Accueil</a>
                                    <a href="<?=RACINE_SITE ?>galerie.php" class="menuL fs-6 ">Photographie de Mariage</a>
                                    <a href="<?=RACINE_SITE ?>" class="menuL fs-6 ">Photographie d'occasion</a>
                                    <a href="<?=RACINE_SITE ?>projetperso.php" class="menuL fs-6 text-center">Partager ma passion</a>
                                    <a href="<?=RACINE_SITE ?>galerie.php" class="menuL fs-6 text-center">Galerie</a>
                                    <a href="<?=RACINE_SITE ?>contact.php" class="menuL fs-6 text-center">Contact</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

        </nav>

        <!-- <div class="title-img">
            <h1 class="d-flex justify-content-center text-white ">LE JOUR IMPORTANT</h1>
        </div> -->

        <div class="pinkImg ">
            <img src="./assets/img/pink-flowers.png" alt="pinkFlower">
        </div>
    </header>
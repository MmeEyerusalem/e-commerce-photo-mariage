<?php

require_once "functions.inc.php";


logOut();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content=""> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Imperial+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Marck+Script&family=Meow+Script&family=Nova+Script&family=Rouge+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Imperial+Script&family=Marck+Script&family=Meow+Script&family=Nova+Script&family=Rouge+Script&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= RACINE_SITE ?>./assets/css/style.css">
    <title><?= $title ?></title>
</head>

<body id="galerieB">
    <nav class="navbar navbar-expand-lg fixed-top navtrans">

        <img src="<?= RACINE_SITE ?>./assets/img/Transparent-Photography-Logo-copy.png" class="logoImg" alt="logo">
        <ul>
            <li>
                <a href="<?= RACINE_SITE ?>index.php"><span>EYE </span> PHOTOGRAPHIE</a>
            </li>

            <div class="dropdown  ">
                <a class=" " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person"></i>
                </a>
                <div class="dropdown-menu text-center">

                    <?php 
                        // debug($_SESSION);
                    if (empty($_SESSION['user'])) { ?>

                        <li> <a class="dropDown fs-6" href="<?= RACINE_SITE ?>register.php">Inscription</a></li>
                        <li> <a class="dropDown fs-6" href="<?= RACINE_SITE ?>authentification.php">Connection</a></li>
                    <?php } else { ?>

                        <?php if ($_SESSION['user']['role'] == 'Role_Admin') { ?>

                            <li> <a class="dropDown fs-6" href="<?= RACINE_SITE ?>admin/dashboard.php?dashboard_php">Page Admin</a></li>

                        <?php } ?>

                        <li> <a class="dropDown fs-6" href="?stop=deconnexion">Déconnexion</a></li>
                    <?php } ?>


                </div>
            </div>

            <li>
                <a href="#" class="btn" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false">
                    <h5 class=" mb-0">Menu</h5>
                </a>

                <div style="min-height: 120px;">
                    <div class="collapse collapse-horizontal" id="collapseWidthExample">
                        <div class="card card-body" style="width: 250px;">
                            <a href="<?= RACINE_SITE ?>index.php" class="menuL fs-6 text-center">Accueil</a>
                            <a href="<?= RACINE_SITE ?>galerie.php" class="menuL fs-6 ">Photographie de Mariage</a>
                            <a href="<?= RACINE_SITE ?>occasions.php" class="menuL fs-6 text-center">Autres occasions</a>
                            <a href="<?= RACINE_SITE ?>projetperso.php" class="menuL fs-6 text-center">Partager ma passion</a>
                            <a href="<?= RACINE_SITE ?>aproposdemoi.php" class="menuL fs-6 text-center">A propos de moi</a>
                            <a href="<?= RACINE_SITE ?>contact.php" class="menuL fs-6 text-center">Contact</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
<?php
require_once "../inc/functions.inc.php";

if(!isset($_SESSION['user'])) {

    header("location:".RACINE_SITE."authentification.php");
    
}else{
    if($_SESSION['user']['role'] == 'ROLE_USER'){

        header("location:".RACINE_SITE."index.php");
    }
}
// debug($_SESSION['User']);


$title = "dashboard";
require_once "../inc/headerwithout.inc.php";
?>







<main class= "mt-0 p-5 bg-secondary">

        <?php
            if (isset($_GET['dashboard_php'])):
        ?>

            <div class="w-50 p-5 m-auto">
                <h2 class="text-white mt-5">Bonjour <?= $_SESSION['user']['nom'] ?> </h2>
                <p class="text-white">Bienvenue! Page admin!</p>
            </div>

        <?php endif; ?>

        <article class= "container mt-2">
            <div class="row ">
                <div class="col-3 mt-5 pt-3 list-group d-flex justify-content-end">
                    <a href="?dashboard_php" class="list-group-item list-group-item-action">Backoffice</a>
                    <a href="?photos_php" class="list-group-item list-group-item-action">Photos</a>
                    <a href="?categories_php" class="list-group-item list-group-item-action">Catagories</a>
                    <a href="?clients_php" class="list-group-item list-group-item-action">Clients</a>
                    
                </div>
            </div>
        </article> 

        <div class="col-sm-12">
        <?php
            if (!empty($_GET)) { 
                if (isset($_GET['photos_php'])) {
                    require_once "photos.php";

                } else if (isset($_GET['categories_php'])) {
                    require_once "categories.php";

                } else if (isset($_GET['clients_php'])) {
                    require_once "clients.php";

                } else {
                    require_once "dashboard.php";
                }
            }

            ?>
            
        </div>


</main>




<?php
require_once "../inc/footer.inc.php";
?>
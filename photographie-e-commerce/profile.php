<?php

require_once "inc/functions.inc.php";


if (empty($_SESSION['user'])) {

    header("location:".RACINE_SITE."authentification.php");

}else if($_SESSION['user']['role'] == 'ROLE_ADMIN') {

    header("location:".RACINE_SITE."admin/dashboard.php?dashboard_php");
}

$title = "Profil";
require_once "inc/headerwithout.inc.php";
?>


<main>
<h2 class="text-center">Bonjour <?=$_SESSION['user']['nom']?></h2>

    <?php
    // Execute the SQL query to check if the client has a photo
    // $pdo = connexionBdd();
    // $sql = "SELECT c.* 
    //         FROM client c 
    //         JOIN client_id ci ON c.id_client = ci.id_client 
    //         WHERE ci.photo_id IS NOT NULL AND c.id_client = ".$_SESSION['user']['id_client'];
    // $request = $pdo->prepare($sql);
    // $request->execute();
    // $client_has_photo = $request->rowCount() > 0;

    // if ($client_has_photo) {
    ?>
        <!-- <div>
            <p>Votre galerie privée</p>
            <a href="galierieprivare.php"><button type="submit" class="btn btn-outline-secondary rounded-5">Click </button></a>
        </div> -->
        <?php
    // } else {
    //     echo "Vous n'avez pas de galerie privée.";
    // }
    ?>

</main>






<?php
require_once "inc/footer.inc.php";

?>
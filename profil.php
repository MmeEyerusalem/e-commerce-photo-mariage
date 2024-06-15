<?php

require_once "inc/functions.inc.php";


if (empty($_SESSION['user'])) {

    header("location:".RACINE_SITE."authentification.php");

}else if($_SESSION['user']['role'] == 'Role_Admin') {

    header("location:".RACINE_SITE."admin/dashboard.php?dashboard_php");
}else{

}
$id_client_image = $_GET['id_client_image'] ?? null;

$pdo = connexionBdd();
$sql = "SELECT * FROM client_images WHERE id_client_image = :id_client_image";
$request = $pdo->prepare($sql);
$request->bindValue(':id_client_image', $id_client_image, PDO::PARAM_INT);
$request->execute();

$clientID = $request->fetch(PDO::FETCH_ASSOC);

// $clientID = $_SESSION['user']['id'];


$title = "Profil";
require_once "inc/header.inc.php";
?>

<main class="mt-5 p-5">
    <h2 class="text-center text-white p-5">Bonjour <?=$_SESSION['user']['nom']?></h2>
   
    <?php if ($clientID){ ?>
    <span class="text-white"> Cliquez ici si vous avez une galerie.</span>
    <a href="galerieprivate.php?action=update&id_client_image=<?= $clientID['id_client_image'] ?>">Votre galerie privée.</a>
    <?php} else{ ?>
        <p> Vous n'avez pas galerie privée. </p>
    <?php }  ?>

</main>





<?php
require_once "inc/footer.inc.php";

?>




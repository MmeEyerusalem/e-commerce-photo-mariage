<?php
    require_once "inc/functions.inc.php";

$pdo = connexionBdd();
$sql = "SELECT ci.*, p.photo FROM client_images ci 
        JOIN photos p ON ci.photo_id = p.id_photo 
        ORDER BY ci.id_client_image";
$request = $pdo->prepare($sql);
$request->execute();



$title = "Galerie";
require_once "inc/headerwithout.inc.php";

?>

<main class="container mt-2 mb-2">
    <h1>Bienvenue dans votre galerie privée</h1>
    <article class="p-2 m-2">
        <?php
        $galerieprives = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($galerieprives as $galerieprive) {
            // Assuming the 'photo' field contains the path to the image
            $imagePath = $galerieprive['photo'];
        ?>
            <div class="p-2">
                <img src="<?= $imagePath ?>" alt="Client Image" >
            </div>
        <?php
        }
        ?>
    </article>
    <div>
        <a href="#" class="btn btn-primary">Téléchargement</a>
    </div>
</main>





<?php
    require_once "inc/footer.inc.php";
?>
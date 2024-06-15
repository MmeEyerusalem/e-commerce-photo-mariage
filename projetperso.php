<?php
    require_once "inc/functions.inc.php";


    
    $pdo =  connexionBdd();
    $sql= ("SELECT* FROM art_galerie ORDER BY id_art_galerie ");
    $request = $pdo->prepare($sql);
    $request->execute();
    $galerieprives = $request->fetchAll(PDO::FETCH_ASSOC);


    if (isset($_GET['id_art_galerie']) == ':id_art_galerie') {

    
    }


    //  Suppresion de l'article
    // if (isset($_GET['action']) && isset($_GET['id_art_galerie'])) {
    //     if (!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_art_galerie'])) {
    
    //         $id_art_galerie = $_GET['id_art_galerie'];
    //         if(deleteArtGalerie($id_art_galerie)){
    //         $message = '<div class="alert alert-success">L\'photo '. $_GET['id_art_galerie'] . ' a bien été supprimé</div>';
    //         } else {
    //         $message = '<div class="alert alert-danger">Erreur de suppression pour l\'photo'. $_GET['id_art_galerie']. '</div>';
    //         }
    //     }
    // }


    
    $title = "Partager ma passion";

    require_once "inc/header.inc.php";
    
?>

<main class="container mt-4 mb-2 pt-3">
    <h1>Photographie EYE</h1>
    <article class="p-2 m-2">
        <div class="text-white">
            <h2>Présentation projet artistique par EYE</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia amet, commodi fugiat ex illo ab cupiditate eveniet, qui distinctio vel asperiores est maxime perspiciatis? Quasi expedita tenetur eius labore veniam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, cumque deserunt. Eveniet a rerum vero molestiae soluta laudantium in ratione accusantium distinctio? Ut, ratione doloremque! Fuga dolorem corrupti reiciendis animi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora recusandae atque quo cumque eveniet praesentium deserunt sequi voluptates, esse quasi. Enim, odio voluptatum. Aperiam repellendus tempora fugit distinctio pariatur sit.</p>
        </div>    
    </article>
    <article class="p-2 m-2">
        <?php foreach ($galerieprives as $artphoto) { ?>
            <div class="p-2">
                <img src="<?= $artphoto['photo'] ?>" alt="Art Image">
            </div>
        <?php } ?>
    </article>
</main>


        <!-- <h2 class="text-white pt-4">Ajouter art photo</h2>
        <form action="#" method="POST" enctype="multipart/form-data" class="mb-5 alert alert-success">

            <div class="mb-3">
                <label for="photo">Photo de artistique</label>
                <input type="file" name="photo" id="photo" placeholder="URL de l'image" class="form-control">
            </div>

            <input type="submit" value="Ajouter art photo" class="btn btn-outline-light">

        </form>


    


<?php
    require_once "inc/footer.inc.php";
?>
<?php
    require_once "inc/functions.inc.php";


    $pdo =  connexionBdd();
    $sql= ("SELECT* FROM art_galerie ORDER BY id_art_galerie ");
    $request = $pdo->prepare($sql);
    $request->execute();

    if (isset($_GET['id_art_galerie']) == ':id_art_galerie') {

    header("location:" . RACINE_SITE . "index.php");
    }
    
        
    // Ajout art photo
    if (!empty($_POST)) { // vérification que le formulaire n'est pas vide
        $_POST['photo'] = htmlspecialchars($_POST['photo']);

        
        /* préparation de la requête d'insertion */
        $insertion = $pdo->prepare("INSERT INTO art_galerie  (photo) VALUES  (:photo) ");

        // /* je fais correspondre les marqueurs avec ce qui se trouve dans mon formulaire */
        
        $insertion->execute(array(
            ':photo' => $_POST['photo']
        ));
    }

    //  Suppresion de l'article

    if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_article'])) {
        $delete = $pdo->prepare("DELETE FROM art_galerie WHERE id_art_galerie = :id_art_galerie");
        $delete->execute(array(
            ':id_art_galerie' => $_GET['id_art_galerie'],
        ));

        if ($delete->rowCount() == 0) {
            $contenu .= '<div class="alert alert-danger">Erreur de suppression pour l\'photo' . $_GET['id_art_galerie'] . '</div>';
        } else {
            $contenu .= '<div class="alert alert-success">L\'photo '. $_GET['id_art_galerie'] . ' a bien été supprimé</div>';
        } 
    }
    
    $title = "Partager ma passion";
    require_once "inc/headerwithout.inc.php";

?>

<main class="container mt-4 mb-2 pt-3">
<h1>Photographie EYE</h1>
<article class="p-2 m-2">
    <div class="text-white">
        <h2>Presentation projet artistique par EYE</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia amet, commodi fugiat ex illo ab cupiditate eveniet, qui distinctio vel asperiores est maxime perspiciatis? Quasi expedita tenetur eius labore veniam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, cumque deserunt. Eveniet a rerum vero molestiae soluta laudantium in ratione accusantium distinctio? Ut, ratione doloremque! Fuga dolorem corrupti reiciendis animi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora recusandae atque quo cumque eveniet praesentium deserunt sequi voluptates, esse quasi. Enim, odio voluptatum. Aperiam repellendus tempora fugit distinctio pariatur sit.</p>
    </div>    
        <?php
        $artphotos = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($artphotos as $artphoto) {
            //  le champ « photo » contient le chemin d'accès à l'image
            $imagePath = $artphoto['photo'];
        ?>
            <div class="p-2">
                <img src="<?= $imagePath ?>" alt="Art Image" width="25%" >
            </div>
        <?php  if (connexionBdd() && roleAdmin()) {
            echo '<a href="projetperso.php?action=suppression&id_art_galerie=' . $artphoto['id_art_galerie'] . '" class="btn btn-danger" onclick="return(confirm(\'Êtes-vous sûr de vouloir supprimer cet article?\'))">Supprimer l\'article</a>';
            }
            ?>
        <?php
        }
        ?>

        <?php if (connexionBdd() && roleAdmin()) { ?>

        <h2>Ajouter art photo</h2>
        <form action="#" method="POST" class="mb-5 alert alert-success">

            <div class="mb-3">
                <label for="photo">Photo de artistique</label>
                <input type="text" name="photo" id="photo" placeholder="URL de l'image" class="form-control">
            </div>

            <input type="submit" value="Ajouter art photo" class="btn btn-outline-light">

        </form>
        <?php } ?>

    </article>

</main>



<?php
    require_once "inc/footer.inc.php";
?>
<?php
require_once "../inc/functions.inc.php";

if(!isset($_SESSION['user'])) {
    header("location:".RACINE_SITE."authentification.php");
}else{
    if($_SESSION['user']['role'] == 'Role_User'){
        header("location:".RACINE_SITE."index.php");
    }
}

if (!empty($_POST)) {
    // debug($_POST);
    $photo = $_FILES['photo']['name'];
    $image = '../assets/img/'. $photo;
    // Le fichier téléchargé est stocké dans un emplacement temporaire.
    //La fonction move_uploaded_file() est appelée pour déplacer le fichier de l'emplacement temporaire vers un nouvel emplacement spécifié par la variable $image
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $image)) {
        // Si le fichier est déplacé avec succès, cette ligne met à jour le tableau $_POST avec le nouvel emplacement du fichier.
        $_POST['photo'] = $image;  
    } else {
        copy($_FILES['image']['tmp_name'], '../assets/img/' . $image);
    }
    $_POST['titre1'] = htmlspecialchars($_POST['titre1']);
    $_POST['titre2'] = htmlspecialchars($_POST['titre2']);
    

    $pdo = connexionBdd();
    $sql = "INSERT INTO galerie(photo, titre1, titre2 ) VALUES (:photo, :titre1, :titre2)"; 

    $request= $pdo->prepare($sql);
    $request->execute(array(

        ':photo' => $_POST['photo'],
        ':titre1' => $_POST['titre1'],
        ':titre2' => $_POST['titre2'],
    ));
}



$title = "Photos";
require_once "../inc/header.inc.php";
?>

<main class="bg-secondary m-2 p-2 rounded">

    <form action="" method="post" enctype="multipart/form-data" class="w-50 mx-auto p-4 mb-4 text-white">
        
        <?php debug($_POST);  ?>

        <div class="m-3 p-2 border border-light">
            <label for="photo">Choisissez une photo</label>
            <input type="file" name="photo" id="photo" value="" class="border border-light ">
            <br>
        </div>

        <div class="m-3 p-2 border border-light">

            <label for="titre1">Titre1 mettez 16 fois le trait de soulignement sur le clavier.</label>
            <br>
            <input type="text" name="titre1" id="titre1" value="" class="border border-light p-1 m-1">
        </div>

        <div class="m-3 p-2 border border-light">

            <label for="titre2">Titre2 Le nom de nom marié Ex. Mme & M Pascale</label>
            <br>
            <input type="text" name="titre2" id="titre2" value="" class="border border-light p-1 m-1">
        </div>

            <input type="submit" name="ajouter" class="btn btn-secondary p-1 m-1" value="Upload Photo">
            <!-- <input type="submit" name="delete" class="btn btn-secondary p-1 m-1" value="Delete Photo"> -->
    
    </form>

</main>

<?php
require_once "../inc/footer.inc.php";
?>
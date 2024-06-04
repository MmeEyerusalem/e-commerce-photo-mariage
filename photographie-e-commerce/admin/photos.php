<?php
require_once "../inc/functions.inc.php";

if(!isset($_SESSION['user'])) {
    header("location:".RACINE_SITE."authentification.php");
}else{
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        header("location:".RACINE_SITE."index.php");
    }
}


if (isset($_POST['add_photo'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the uploaded file is an image.
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    // Check if the file already exists.
    if (file_exists($target_file)) {
        die("Sorry, file already exists.");
    }

    // Check if the file format is supported.
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

     // Add title and date upload
     $photoname = $_POST['ajouter'];
     $uploadedate = date("Y-m-d H:i:s"); // current date and time
     // Move the uploaded file to the target directory.
     if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Insert data into the photos table
        $pdo->query("INSERT INTO galerie (photo, titre1, titre2) 
                      VALUES ('$photo','$titre1', '$titre2', '$target_file', '".$_FILES["photo"]["name"]."', '$uploadedate')");
        echo "Le ficher est bien récuper.";
    } else {
        echo "Error téléchargement.";
    }

}


$title = "Ajouter annonce";
require_once "../inc/headerwithout.inc.php";
?>

<main class="bg-secondary m-2 p-2 rounded">

<form action="" method="post" enctype="multipart/form-data" class="w-50 mx-auto p-4 mb-4 text-white">
    <?php debug($_POST);  ?>
    <!-- <div class="m-3 p-2 border border-light">
    <label for="photo">Choisissez une photo</label>
    <input type="file" name="photo" id="photo" value="" class="border border-light ">
    <br>
    </div> -->
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
    <input type="submit" name="delete" class="btn btn-secondary p-1 m-1" value="Delete Photo">
   
</form>

</main>

<?php
require_once "../inc/footer.inc.php";
?>
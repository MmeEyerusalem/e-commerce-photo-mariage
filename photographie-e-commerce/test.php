<?php
require_once "inc/functions.inc.php";
$pdo = connexionBdd();

$message = "";


$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$civilite = isset($_POST['civilite']) ? $_POST['civilite'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : null;
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : null;
$code_postal = isset($_POST['code_postal']) ? $_POST['code_postal'] : null;
$ville = isset($_POST['ville']) ? $_POST['ville'] : null;
$pays = isset($_POST['pays']) ? $_POST['pays'] : null;


if (!empty($_POST)) {

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || preg_match('/[0-9]+/',($_POST['prenom']))) {
        $message = "Le prénom n\'est pas valide.";
    }

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2  || preg_match('/[0-9]+/',($_POST['nom']))) {
        $message = "Le nom n\'est pas valide.";
    }
    if (!isset($_POST['civilite']) || $_POST['civilite'] !='femme' && $_POST['civilite'] != 'homme'){
        $message = "La civilité n\'est pas valide.";
    }

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
        $message = "Votre email n\'est pas valide.";
    }

    if (!isset($_POST['password']) || strlen($_POST['password']) < 5 || strlen($_POST['password']) > 15 ){
        $message = "Le mot de passe n\'est pas valide.";
    }

    if (!isset($_POST['confirmPassword']) !== ($_POST['password'])){
        $message = "Le mot de passe et la confirmation doivent être identique.";
    }

    if(!isset($_POST['telephone']) || !preg_match('#^[0-9]+$#',($_POST['telephone'])) ){
        $message = "Le Téléphone n\'est pas valide.";
    }

    if(!isset($_POST['adresse']) ||  strlen($_POST['adresse']) < 5 ||  strlen($_POST['adresse']) > 20 ){
        $message = "L'adresse n\'est pas valide.";
    }

    if(!isset($_POST['code_postal']) ||  strlen($_POST['code_postal']) < 5 || !preg_match('#^[0-9]+$#',($_POST['code_postal'])) ){
        $message = "Le code postal n\'est pas valide.";
    }

    if(!isset($_POST['ville']) ||strlen($_POST['ville']) < 3 || strlen($_POST['ville']) > 20) {
        $message = "La ville n\'est pas valide.";
    }

    if(!isset($_POST['pays']) ||strlen($_POST['pays']) < 3 || strlen($_POST['pays']) > 20) {
        $message = "Le pays n\'est pas valide.";
    }

    if(empty($message)){
        
        $client = $pdo->prepare("SELECT * FROM clients WHERE EMAIL = :email");
        $client->execute(array(
            ':email' => $_POST['email']
        ));
        if($client->rowCount() > 0){
            $message = "L\'email déjà exist.";
        }else{
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            inscrireClients($prenom, $nom, $civilite, $email, $password, $telephone, $adresse, $code_postal, $ville, $pays);
            
            $message = "Vous êtes bien inscrit, vous pouvez vous connectez !";
        }
    }   
    

}


$title = "Inscription";

require_once "inc/headerwithout.inc.php";

?>



<section class="mt-5 p-5">
    <form action="" method="post" class="w-50 mx-auto p-3 text-white rounded-5 formV border p-5 col-sm-12 col-md-8">
            <?php
              echo $message;
            ?>  
        <div class="p-3 inputs col-sm-12">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control rounded-pill input-custom" id="prenom" name="prenom">
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control rounded-pill input-custom" id="nom" name="nom">
        </div>

        <div class="p-3 civilite col-sm-12">
            <label for="choice" class="form-label">Civilite</label>
            <select name="civilite" id="civilite" class="form-select rounded-pill input-custom">
            <option value="choisir" selected>--- Choisir une option ---</option>
            <option value="femme">Femme</option>
            <option value="homme">Homme</option>
            </select>
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control rounded-pill input-custom" id="email" name="email">
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control rounded-pill input-custom" id="password" name="password">    
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="confirmPassword" class="form-label">Confirmer mot de passe</label>
            <input type="password" class="form-control rounded-pill input-custom" id="confirmPassword" name="confirmPassword">
            <input type="checkbox" onclick="myFunction()"> Show password
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="number" class="form-control rounded-pill input-custom" id="telephone" name="telephone"
            maxlength="10">
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control rounded-pill input-custom" id="adresse" name="adresse">
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="code_postal" class="form-label">Code postal</label>
            <input type="number" class="form-control rounded-pill input-custom" id="code_postal" name="code_postal">
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control rounded-pill input-custom" id="ville" name="ville">
        </div>

        <div class="p-3 inputs col-sm-12">
            <label for="pays" class="form-label">Pays</label>
            <input type="text" class="form-control rounded-pill input-custom" id="pays" name="pays">
        </div>

        <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Registre</button>
        <p class="text-center mt-5">Vous avez déjà un compte ! <a href="<?=RACINE_SITE ?>authentification.php" class="text-danger text-white fw-bold">Connectez-vous &#9754;</a></p>

    </form>
  </section>

  <?php
    require_once "inc/footer.inc.php";
  ?>



<?php

require_once "../inc/functions.inc.php";

if(!isset($_SESSION['user'])) {

    header("location:".RACINE_SITE."authentification.php");
}else{
    if($_SESSION['user']['role'] == 'ROLE_USER'){

        header("location:".RACINE_SITE."index.php");
    }
}

if (isset($_GET['stop']) && isset($_GET['id_photo'])) {
    if (!empty($_GET['stop']) && $_GET['stop'] == 'delete' && !empty($_GET['id_photo'])) {

        $idCategory = $_GET['id_photo'];
        $category = deleteFilm($idCategory);
    }
}


$films = allFilms();
// debug($films);

$title = "Films";
require_once "../inc/header.inc.php";
?>




<section class="mt-5 p-5">
    <form action="" method="post" class="w-50 mx-auto p-3 text-white rounded-5 border p-5 col-sm-12 col-md-8">
            <?php
              echo $message;
            ?>  
        <div class="p-3 col-sm-12">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control rounded-pill input-custom" id="prenom" name="prenom">
        </div>

        <div class="p-3 col-sm-12">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control rounded-pill input-custom" id="nom" name="nom">
        </div>

        <div class="p-3 col-sm-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control rounded-pill input-custom" id="email" name="email">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Envoyer</button>
        <p class="text-center mt-5">Vous avez déjà un compte ! <a href="<?=RACINE_SITE ?>authentification.php" class="text-danger text-white fw-bold">Connectez-vous &#9754;</a></p>

    </form>
  </section>

  
<main class="">
    <div><h1>Votre Histoire Capturée par la Lumière</h1></div>
    <section class="container">
        <?php 
        while($galeries = $request->fetch(PDO::FETCH_ASSOC)){
            // Fetch the next gallery item for the right side
            $galeriesRight = $request->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="row mainGalerie">
                <div class="col-6 pt-4" data-aos="zoom-in-left">
                    <a href="<?=RACINE_SITE ?>authentification.php"> 
                        <img src=<?=$galeries['photo']?> class="galerieImg1" alt="left-side-photo">
                    </a>
                    <div data-aos="fade-down-right">
                        <p><?= $galeries['titre1'] ?></p>
                        <pre>
                            <span class="text-white"><?= $galeries['titre2'] ?></span>
                        </pre>
                    </div>
                </div>
                <?php if($galeriesRight): // Check if there is a next item for the right side ?>
                <div class="col-6 mb-3" data-aos="zoom-in-right">
                    <a href="<?=RACINE_SITE ?>authentification.php">
                        <img src=<?=$galeriesRight['photo']?> class="galerieImg2" alt="right-side-photo">
                    </a>
                    <div data-aos="fade-down-right">
                        <p><?= $galeriesRight['titre1'] ?></p>
                        <pre>
                            <span class="text-white"><?= $galeriesRight['titre2'] ?></span>
                        </pre>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php
        }
        ?>
    </section>
</main>

<main class="">
    <div><h1>Votre Histoire Capturée par la Lumière</h1></div>
    <section class="container">
        <?php 
        // Fetch all gallery items into an array
        $galleriesArray = $request->fetchAll(PDO::FETCH_ASSOC);
        
        // Use array_chunk to pair the galleries in groups of two
        $pairedGalleries = array_chunk($galleriesArray, 2);

        // Iterate over the array with foreach
        foreach($pairedGalleries as $pair){
            $galeriesLeft = $pair[0]; // The left gallery item
            $galeriesRight = $pair[1] ?? null; // The right gallery item or null if not present
        ?>
            <div class="row mainGalerie">
                <div class="col-6 pt-4" data-aos="zoom-in-left">
                    <a href="<?=RACINE_SITE ?>authentification.php"> 
                        <img src=<?=$galeriesLeft['photo']?> class="galerieImg1" alt="left-side-photo">
                    </a>
                    <div data-aos="fade-down-right">
                        <p><?= $galeriesLeft['titre1'] ?></p>
                        <pre>
                            <span class="text-white"><?= $galeriesLeft['titre2'] ?></span>
                        </pre>
                    </div>
                </div>
                <?php if($galeriesRight): // Check if there is a right gallery item ?>
                <div class="col-6 mb-3" data-aos="zoom-in-right">
                    <a href="<?=RACINE_SITE ?>authentification.php">
                        <img src=<?=$galeriesRight['photo']?> class="galerieImg2" alt="right-side-photo">
                    </a>
                    <div data-aos="fade-down-right">
                        <p><?= $galeriesRight['titre1'] ?></p>
                        <pre>
                            <span class="text-white"><?= $galeriesRight['titre2'] ?></span>
                        </pre>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php
        }
        ?>
    </section>
</main>


<main class="">
    <div><h1>Votre Histoire Capturée par la Lumière</h1></div>
    <section class="container">
        <?php 
        while($galeries = $request->fetch(PDO::FETCH_ASSOC)){
            // Fetch the next gallery item for the right side
            $galeriesRight = $request->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="row mainGalerie">
                <div class="col-6 pt-4" data-aos="zoom-in-left">
                    <a href="<?=RACINE_SITE ?>authentification.php"> 
                        <img src=<?=$galeries['photo']?> class="galerieImg1" alt="left-side-photo">
                    </a>
                    <div data-aos="fade-down-right">
                        <p><?= $galeries['titre1'] ?></p>
                        <pre>
                            <span class="text-white"><?= $galeries['titre2'] ?></span>
                        </pre>
                    </div>
                </div>
                <?php if($galeriesRight): // Check if there is a next item for the right side ?>
                <div class="col-6 mb-3" data-aos="zoom-in-right">
                    <a href="<?=RACINE_SITE ?>authentification.php">
                        <img src=<?=$galeriesRight['photo']?> class="galerieImg2" alt="right-side-photo">
                    </a>
                    <div data-aos="fade-down-right">
                        <p><?= $galeriesRight['titre1'] ?></p>
                        <pre>
                            <span class="text-white"><?= $galeriesRight['titre2'] ?></span>
                        </pre>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php
        }
        ?>
    </section>
</main>



<main class="">
    <div><h1>Votre Histoire Capturée par la Lumière</h1></div>
    <section class=" container ">
        <div class="row mainGalerie">
            <div class="col-6 pt-4" data-aos="zoom-in-left">
               <a href="<?=RACINE_SITE ?>authentification.php"> <img src="./assets/img/wedding-15.jpg" class="galerieImg1" alt="wedding-15"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
            <div class="col-6 mb-3" data-aos="zoom-in-right">
              <a href="<?=RACINE_SITE ?>authentification.php"><img src="./assets/img/wedding-13.jpg" class="galerieImg2" alt="wedding-13"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M Pascale</span>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <section class=" container ">
        <div class="row mainGalerie">
            <div class="col-6 pt-4" data-aos="zoom-in-left">
               <a href="<?=RACINE_SITE ?>authentification.php"> <img src="./assets/img/wedding-16.jpg" class="galerieImg3"  alt="wedding-16"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>

            <div class="col-6 mb-3" data-aos="zoom-in-right">
              <a href="<?=RACINE_SITE ?>authentification.php"><img src="./assets/img/wedding-17.jpg" class="galerieImg4" alt="wedding-17"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <section class=" container ">
        <div class="row mainGalerie">
            <div class="col-6 pt-4" data-aos="zoom-in-left">
               <a href="<?=RACINE_SITE ?>authentification.php"> <img src="./assets/img/wedding-7.jpg" class="galerieImg5" alt="wedding-7"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
            <div class="col-6 mb-3" data-aos="zoom-in-right">
                <a href="<?=RACINE_SITE ?>authentification.php"><img src="./assets/img/beach-wedding.jpg" class="galerieImg6" alt="beach-wedding"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <section class=" container ">
        <div class="row mainGalerie">
            <div class="col-6 pt-4" data-aos="zoom-in-left">
               <a href="<?=RACINE_SITE ?>authentification.php"> <img src="./assets/img/wedding-3.jpg" class="galerieImg7" alt="wedding-3"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
            <div class="col-6 mb-3" data-aos="zoom-in-right">
               <a href="<?=RACINE_SITE ?>authentification.php"><img src="./assets/img/wedding-2.jpg" class="galerieImg8" alt="wedding-2"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <section class=" container ">
        <div class="row mainGalerie">
            <div class="col-6 pt-4" data-aos="zoom-in-left">
               <a href="<?=RACINE_SITE ?>authentification.php"> <img src="./assets/img/wedding-18.jpg" class="galerieImg9" alt="wedding-18"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
            <div class="col-6 mb-3" data-aos="zoom-in-right">
               <a href="<?=RACINE_SITE ?>authentification.php"><img src="./assets/img/wedding-8.jpg"class="galerieImg10" alt="wedding-8"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <section class=" container ">
        <div class="row mainGalerie">
            <div class="col-6 pt-4" data-aos="zoom-in-left">
               <a href="<?=RACINE_SITE ?>authentification.php"> <img src="./assets/img/wedding-21.jpg" class="galerieImg11" alt="wedding-21"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
            <div class="col-6 mb-3" data-aos="zoom-in-right">
                <a href="<?=RACINE_SITE ?>authentification.php"><img src="./assets/img/wedding-11.jpg" class="galerieImg12" alt="wedding-11"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <section class=" container ">
        <div class="row mainGalerie">
            <div class="col-6 pt-4" data-aos="zoom-in-left">
               <a href="<?=RACINE_SITE ?>authentification.php"> <img src="./assets/img/wedding-20.jpg" class="galerieImg13"alt="wedding-20"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
            <div class="col-6 mb-3" data-aos="zoom-in-right">
              <a href="<?=RACINE_SITE ?>authentification.php"><img src="./assets/img/wedding-5.jpg" class="galerieImg14" alt="wedding-5"></a>
                <div data-aos="fade-down-right">
                <p> &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
                    <pre>
                        <span class="text-white">Mme & M George</span>
                    </pre>
                </div>
            </div>
        </div>
    </section>
</main>

-------------------code from page authentification-------------------------

if($client) {

if(password_verify($password, $client['password'])){
  debug("Password verified!");
  $_SESSION['user'] = $client;
          
    header("location:". RACINE_SITE ."profil.php");
    // exi²t;  // pour execute redirection

    }else {
          $message = "Le mot de passe incorrecte";
    }
}else{
$message = "Email or password incorrect";
}


-------------------------code from page galerie prive--------------------------

require_once "inc/functions.inc.php";


$pdo =  connexionBdd();
$sql= ("SELECT* FROM client_images ORDER BY id_client_image "); //pour afficher le nouvelle affiche commence 1eme line DESC.
$request = $pdo->prepare($sql);
$request->execute();

if (isset($_GET['id_client_image']) == ':id_client_image') {

header("location:" . RACINE_SITE . "galerieprive.php");
}




<main class="container mt-2 mb-2">
    <h1>Welcome to your gallery private</h1>
    <article class=" p-2 m-2">
        <?php
        $galerieprives = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($galerieprives as $galerieprive) {
        ?>
        <div class="p-2">
            <img src="<?= $galerieprive['photo_id'] ?>" alt="..." >
        </div>
        <?php
        }
        ?>
    </article>
    <div>
        <a href="#" class=" btn btn-primary">Téléchargement</a>
    </div>
</main>
<?php
require_once "inc/functions.inc.php";
session_start();


$message = "";


if(!empty($_POST)) {
    var_dump($_POST);

    $verif = true;

    foreach ($_POST as $value) {

        if (empty($value) ) {

            $verif = false;
        }
    }

    if(!$verif) {
        debug($_POST);


        $message = "Tous les champs sont obligatoires!";

    }else{

          debug($_POST);
        
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        debug("Email: $email, Password: $password");  // j'ai ajouter debug car je face de problem de connecxion, il recuper le email et de passord mais il dérige pas sur la page admin ni user
  
        $client = checkClient($email, $password);

        debug("Client data:" . print_r($client, true)); //debug de problem connexion
        

  }
}






$title = "authentification";

require_once "inc/headerwithout.inc.php";

?>


<section class="mt-5 p-5">

      <h3 class=" text-white p-3">Prêt à découvrir vos photos ?</h3>
        
    <form action="" method="post" class="w-50 mx-auto p-3 text-white rounded-5 border p-5 col-sm-12 col-md-8">
      <?php
        echo $message;
      ?>  
      <div class="p-3 col-sm-12">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control rounded-pill input-custom" id="email" name="email">
      </div>

      <div class="p-3 col-sm-12">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="password" name="password">
        <input type="checkbox" onclick="myFunction()"> Show password
      </div>

      <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Connecter</button>
      <p class="text-center mt-5">Vous n'avez pas un compte ! <a href="<?=RACINE_SITE ?>register.php" class="text-danger text-white fw-bold">Inscrivez-vous ici</a></p>

    </form>
  </section>








<?php
    require_once "inc/footer.inc.php";
?>
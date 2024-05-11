<?php
require_once "inc/functions.inc.php";


$message = "";


if ( !empty($_POST)) {
    debug($_POST);

    $verif = true;

    foreach ($_POST as $value) {

        if (empty($value) ) {

            $verif = false;
        }
    }

    if (!$verif) {
        debug($_POST);


        $message = "Tous les champs sont obligatoires!";

    }else {

        debug($_POST);

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $client = checkClient($email, $password);
        if ($client) {

            if(password_verify($password, $client['password'])){

                $_SESSION['user'] = $client;
                
                header("location:".RACINE_SITE."profil.php");

            }else {
                $message = "Les identifiants sont incorrectes";
            }
        }else {
            $message = "Les identifiants sont incorrectes";
        }
      }
}




$title = "authentification";

require_once "inc/headerwithout.inc.php";

?>


<section class="mt-5 p-5">

      <h3 class=" text-white p-3">Prêt à découvrir vos photos ?</h3>
        
    <form action="" method="post" class="w-50 mx-auto p-3 text-white rounded-5 border p-5 col-sm-12 col-md-8">
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
<?php
require_once "inc/functions.inc.php";


if (!empty($_SESSION['user'])) {

    header("location:".RACINE_SITE."profil.php");
}

echo "<br>";

$message = "";

if (!empty($_POST)) {
    // debug($_POST);

    $verif = true;

    foreach($_POST as $value) {

        if (empty($value)) {

        $verif = false;
        }
    }

    if (!$verif) {
        debug($_POST);

        $message = "Tous les champs sont obligatoires!";

    } else {

        // debug($_POST);

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


        if ( strlen($prenom) < 2 || preg_match('/[0-9]+/', $prenom) ) {

            $message = "Le prénom n\'est pas valide.";
        }

        if ( strlen($nom) < 2 || preg_match('/[0-9]+/', $nom) ) {

            $message = "Le nom n\'est pas valide.";
        }

        if ( $civilite != 'femme' && $civilite != 'homme' ) {

            $message = "La civilité n\'est pas valide.";
        }

        if ( strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {

            $message = "Votre email n\'est pas valide.";
        }

        if ( strlen($password) < 5 || strlen($password) > 15 ) {

            $message = "Le mot de passe n\'est pas valide.";
        }
        
        if ( $password !== $confirmPassword)

            $message = "Le mot de passe et la confirmation doivent être identique.";
        }

        if ( !preg_match('#^[0-9]+$#', $telephone) ) {

            $message = "Le Téléphone n\'est pas valide.";
        }

        if ( strlen($adresse) < 5 || strlen($adresse) > 30  ) {

            $message = "L'adresse n\'est pas valide.";
        }

        if ( !preg_match('#^[0-9]+$#', $code_postal) ) {

            $message = "Le code postal n\'est pas valide.";
        }

        if ( strlen($ville) > 20 ) {

            $message = "La ville n\'est pas valide.";
        }

        if ( strlen($pays) < 5 || strlen($pays) > 20 ) {

            $message = "Le pays n\'est pas valide.";
        }

        if (empty($message)) {

            $checkEmail = checkEmailClient($email);
            $checkTelephone = checkTelephoneClient($telephone); 


            if ($checkEmail || $checkTelephone) {
            $message = 'Vous avez déjà un compte!';

            } else if ($password !== $confirmPassword) {

            $message = 'Mot de passe invalide.';

            } else {

                $password = password_hash($password, PASSWORD_DEFAULT);

                inscrireClients($prenom, $nom, $civilite, $email, $password, $telephone, $adresse, $code_postal, $ville, $pays);
                $message = 'Vous être bien inscrire. Vous pouvez connectez en cliquant sur le petit bonhomme!';

        }

    } 
}else {
    // debug($_POST);
    echo 'Non SUBMIT';
}






$title = "Inscription";

require_once "inc/headerwithout.inc.php";

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

        <div class="p-3 civilite col-sm-12">
            <label for="choice" class="form-label">Civilite</label>
            <select name="civilite" id="civilite" class="form-select rounded-pill input-custom">
            <option value="choisir" selected>--- Choisir une option ---</option>
            <option value="femme">Femme</option>
            <option value="homme">Homme</option>
            </select>
        </div>

        <div class="p-3 col-sm-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control rounded-pill input-custom" id="email" name="email">
        </div>

        <div class="p-3 col-sm-12">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control rounded-pill input-custom" id="password" name="password">
        </div>

        <div class="p-3 col-sm-12">
            <label for="confirmPassword" class="form-label">Confirmer mot de passe</label>
            <input type="password" class="form-control rounded-pill input-custom" id="confirmPassword" name="confirmPassword">
            <input type="checkbox" onclick="myFunction()"> Show password
        </div>

        <div class="p-3 col-sm-12">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="number" class="form-control rounded-pill input-custom" id="telephone" name="telephone"
            maxlength="10">
        </div>

        <div class="p-3 col-sm-12">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control rounded-pill input-custom" id="adresse" name="adresse">
        </div>

        <div class="p-3 col-sm-12">
            <label for="code_postal" class="form-label">Code postal</label>
            <input type="number" class="form-control rounded-pill input-custom" id="code_postal" name="code_postal">
        </div>

        <div class="p-3 col-sm-12">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control rounded-pill input-custom" id="ville" name="ville">
        </div>

        <div class="p-3 col-sm-12">
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
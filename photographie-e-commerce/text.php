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
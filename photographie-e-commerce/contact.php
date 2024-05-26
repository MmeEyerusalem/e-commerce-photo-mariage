<?php
require_once "inc/functions.inc.php";


if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "votre@email";
    $email_subject = "Le sujet de votre email";
 
    function died($error) {
        // your error code can go here
        echo 
"Nous sommes désolés, mais des erreurs ont été détectées dans le" .
" formulaire que vous avez envoyé. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }
 
 
    // si la validation des données attendues existe
     if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['commentaire'])) {
        died(
'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
' problème.');
    }
 
    
    $nom = $_POST['nom']; // required
    $prenom = $_POST['prenom']; // required
    $email = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $commentaire = $_POST['commentaire']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email)) {
      $error_message .= 
'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
    }
   
      // Prend les caractères alphanumériques + le point et le tiret 6
      $string_exp = "/^[A-Za-z0-9 .'-]+$/";
   
    if(!preg_match($string_exp,$nom)) {
      $error_message .= 
'Le nom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(!preg_match($string_exp,$prenom)) {
      $error_message .= 
'Le prénom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($commentaire) < 2) {
      $error_message .= 
'Le commentaire que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
 
    $email_message = "Détail.\n\n";
    $email_message .= "Nom: ".$nom."\n";
    $email_message .= "Prenom: ".$prenom."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Telephone: ".$telephone."\n";
    $email_message .= "Commentaire: ".$commentaire."\n";
 
    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
}



$title = "Contact";

require_once "inc/headerwithout.inc.php";

?>
<section class="container contact-section rounded-3 ">

  <form class="text-dark mt-5" name="contact_form" method="post" action="">
    <table width="500">
        <tr>
        <td class="p-3">
          <label for="nom">Nom</label>
        </td>
        <td class="p-3">
          <input  type="text" name="nom" maxlength="50" size="30" value="<?php if (isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']);?>">
        </td>
        </tr>
        <tr>
        <td class="p-3">
          <label for="prenom">Prénom</label>
        </td>
        <td class="p-3">
          <input  type="text" name="prenom" maxlength="50" size="30" value="<?php if(isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']);?>">
        </td>
        </tr>
        <tr>
        <td class="p-3">
          <label for="email">Email Addresse</label>
        </td>
        <td class="p-3">
          <input  type="text" name="email" maxlength="80" size="30" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
        </td>
        </tr>
        <tr>
        <td class="p-3">
          <label for="telephone">Téléphone</label>
        </td>
        <td class="p-3">
          <input  type="text" name="telephone" maxlength="30" size="30" value="<?php if (isset($_POST['telephone'])) echo htmlspecialchars($_POST['telephone']);?>">
        </td>
        </tr>
        <tr>
        <td class="p-3">
          <label for="commentaire">Votre message</label>
        </td>
        <td class="p-3">
          <textarea  name="commentaire" cols="28" rows="10"><?php if (isset($_POST['commentaire'])) echo htmlspecialchars($_POST['commentaire']);?></textarea>
        </td>
        </tr>
        <tr>
        <td colspan="2" style="text-align:center">
        <button type="submit" value=" Envoyer " class="btn btn-outline-dark rounded-start ms-4 bouton mb-4">Envoyer</button>
        </td>
        </tr>
    </table>
  </form>

    <div class="px-5">
        <img class="rounded-pill mt-5" src="assets/img/wedding-22.jpg" alt="" width="50%" hieght="100%">
        <h3 class="p-3">A vous écoute</h3>
        <h5> Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam accusantium unde molestias excepturi, </h5>
    </div>

</section>





<?php
  require_once "inc/footer.inc.php";
?>
<?php
session_start();

define("RACINE_SITE", "/eyerusalem-projet-e-commerce/photographie-e-commerce/");


//////////////////creation connection///////////////////////

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "photo_mariage");

function connexionBdd() {
    $pdo = new PDO('mysql:host=localhost;dbname=photo_mariage;charset=utf8', 'root', '');
    // variable Data Source Name
    $dsn = "mysql:host=" .DBHOST.";dbname=".DBNAME.";charset=utf8";

    try {
        
        $pdo = new PDO($dsn, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    }
    catch(PDOException $e) {
        // La méthode getMessage() renvoie le message d'erreur sous forme de chaîne.
    die($e->getMessage());

    }

    return $pdo;
}

// connexionBdd();

////////////////////////////function to create debug //////////////////////////////////////////////////////

function debug($vari){
    echo '<pre class="alert alert-warning">';
    var_dump($vari);
    echo '</pre>';
}

//////////////////// Fonction d'alert ////////////////////////////////////////

function alert(string $contenu, string $class) {

    return "<div class='alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5' role='alert'>
        $contenu

            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

        </div>";


}


////////////////////////creation function d'inscription////////////////////////////

function inscrireClients(
    string $prenom,
    string $nom,
    string $civilite,
    string $email,
    string $password,
    string $telephone,
    string $adresse,
    string $code_postal,
    string $ville,
    string $pays
): void{
    // pdo représente une connexion à une base de données
    $pdo = connexionBdd();
    $sql = "INSERT INTO clients 
            (prenom, nom, civilite, email, password, telephone, adresse, code_postal, ville, pays)
            VALUES (:prenom, :nom, :civilite, :email, :password, :telephone, :adresse, :code_postal, :ville, :pays )";
    $request = $pdo->prepare($sql);
    $request->execute(
        array(
        ':prenom'=> $prenom, 
        ':nom' => $nom, 
        ':civilite' => $civilite, 
        ':email'=> $email, 
        ':password' => $password, 
        ':telephone' => $telephone, 
        ':adresse' => $adresse,
        ':code_postal' => $code_postal, 
        ':ville' => $ville,
        ':pays' => $pays
        ));
}

////////////////////////////////////Fonction for logOut  /////////////////////////////////////////////////////
function logOut()
{

    if (isset($_GET['stop']) && !empty($_GET['stop']) && $_GET['stop'] == 'deconnexion') {
        unset($_SESSION['user']);
        header("location:" . RACINE_SITE . "index.php");
    }
}   

//////////////////////////Fonction pour récupérer tout les utilisateurs////////////////////////////////////
function allClients(): array
{
    $pdo = connexionBdd();
    $sql = "SELECT* FROM clients";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;
}

////////////////////////////////Function for categorie create table /////////////////////////////////////////////////:

function createTableCategories()
{

    $pdo = connexionBdd();

    $sql = "CREATE TABLE IF NOT EXISTS categories (
            id_category INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(50) NOT NULL)";

    $request = $pdo->exec($sql);

}

// createTableCategories();


  ////////////////// Fonction pour vérifier si le client est existe dans la BDD ///////////////////////////////

//   function checkClient(string $email) :mixed 
//   {
//     $pdo = connexionBdd();
//     $sql = "SELECT * FROM clients WHERE email = :email";
//     $request = $pdo->prepare($sql);
//     $request->execute( array(
//         ':email' => $email,
//         ':password' => $password

//     ));

//     $resultat = $request->fetch();
//     return $resultat;
// }

//////////////////////////Fonction pour vérifier le role admin ///////////////////////////////

// function roleAdmin() {
//     if (connexionBdd() && $_SESSION['user']['role'] == 'Role_Admin') { // je vérifie que l'utilisateur est connecté et que son statut correspond à 1 dans la BDD
//         return true; // si c'est le cas, il est administrateur
//     }else {
//         return false; // sinon, c'est un utilisateur lambda ou la personne n'est pas connectée.
//     }
// }

//////////////////////Fonction pour vérifier si un email existe dand la BDD/////////////

function checkEmailClient(string $email){
    $pdo = connexionBdd();
    $sql = "SELECT * FROM clients WHERE email = :email";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':email' => $email
    ));

    $resultat = $request->fetch();
    return $resultat;
}
    ////////////////// Fonction pour vérifier si un telephone existe dans la BDD ///////////////////////////////

    function checkTelephoneClient(string $telephone) {
        $pdo = connexionBdd();
        $sql = "SELECT * FROM clients WHERE telephone = :telephone";
        $request = $pdo->prepare($sql);
        $request->execute( array(
            ':telephone' => $telephone

        ));

        $resultat = $request->fetch();
        return $resultat;
    }

/////////////////Fonction  pour ajoute photo//////////////////////////////////////
function addPhoto(int $galerie_id,  string $photo, string $photo_name, string $upload_date ): void{

    $pdo = connexionBdd();
    $sql = "INSERT INTO photos (galerie_id, photo, photo_name, upload_date)";
    $request = $pdo->prepare($sql);
    $request->execute(
         array(
            ':galerie_id'=> $galerie_id,
            ':photo'=> $photo,
            ':photo_name'=> $photo_name,
            ':upload_date'=> $upload_date
         )
         );
}


/////////////////Fonction  pour update photo//////////////////////////////////////

function updatePhoto(int $id, int $galerie_id,  string $photo, string $photo_name, string $upload_date ): void{
    $pdo = connexionBdd();
    $sql = "UPDATE photos SET 
        id_photo = :id, 
        galerie_id  = :galerie_id,
        photo = :photo,
        photo_name = :photo_name,
        upload_date = :upload_date
        WHERE id_photo = :id";
        $request =$pdo->prepare($sql);
        $request->execute(
            array(
                'id' => $id,
                'galerie_id' => $galerie_id,
                'photo' => $photo,
                'photo_name' => $photo_name,
                'upload_date' => $upload_date,
            )
            );
}

/////////////////Fonction  pour delete photo//////////////////////////////////////

function deletePhoto(int $id):void {
    $pdo = connexionBdd();
    $sql = "DELETE FROM photos WHERE id_photo = :id";
    $request = $pdo->prepare($sql);
    $request->execute([':id' => $id]);
}

/////////////////Fonction  pour delete client//////////////////////////////////////

function deleteClient(int $id):void {
    $pdo = connexionBdd();
    $sql = "DELETE FROM clients WHERE id_client = :id";
    $request = $pdo->prepare($sql);
    $request->execute([':id' => $id]);
}

/////////////////Fonction  pour delete photo de art_galerie//////////////////////////////////////

function deleteArtGalerie(int $id): bool {
    $pdo = connexionBdd();
    $sql = "DELETE FROM art_galerie WHERE id_art_galerie = :id";
    $request = $pdo->prepare($sql);
    $request->execute([':id' => $id]);
    return $request->rowCount() > 0; // Check if the deletion was successful
}

?>
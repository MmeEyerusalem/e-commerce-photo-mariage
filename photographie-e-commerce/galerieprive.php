<?php
    require_once "inc/functions.inc.php";

// $pdo = connexionBdd();
// $sql = "SELECT ci.*, p.photo FROM client_images ci 
//         JOIN photos p ON ci.photo_id = p.id_photo 
//         ORDER BY ci.id_client_image";
// $request = $pdo->prepare($sql);
// $request->execute();





// Check if client ID is set in session variable

// if (isset($_SESSION['client_id'])) {

//     $client_id = $_SESSION['client_id'];


//     // Retrieve client's photos

//     $pdo = connexionBdd();

//     $sql = "SELECT ci.*, p.photo 

//             FROM client_images ci 

//             JOIN photos p ON ci.photo_id = p.id_photo 

//             WHERE ci.id_client = :id_client 

//             ORDER BY ci.id_client_image";

//     $request = $pdo->prepare($sql);

//     $request->execute(array(

//         ':id_client' => $client_id,

//     ));


// }

$title = "Galerie";
require_once "inc/headerwithout.inc.php";

?>




<main class="container mt-2 mb-2">
    <h1>Bienvenue dans votre galerie privée</h1>

    <?php
    if (isset($_SESSION['client_id'])) {

        $client_id = $_SESSION['client_id'];
        $pdo = connexionBdd();
    
        $sql = "SELECT ci.*, p.photo 
    
            FROM client_images ci 
    
            JOIN photos p ON ci.photo_id = p.id_photo 
    
            WHERE ci.id_client = :id_client 
    
            ORDER BY ci.id_client_image";
    
    $request = $pdo->prepare($sql);
    
    $request->execute(array(
    
        ':id_client' => $client_id,
    
    ));



    
    ?>
    <article class="p-2 m-2">
        <?php
        $galerieprives = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($galerieprives as $galerieprive) {
            // Assuming the 'photo' field contains the path to the image
            $imagePath = $galerieprive['photo'];
        ?>
            <div class="p-2">
                <img src="<?= $imagePath ?>" alt="Client Image" >
            </div>
        <?php
        }
        ?>
    </article>
    <?php
    } else {
        echo "Vous n'avez pas accés à cette galerie.";
    }
    ?>
    <div>
        <a href="#" class="btn btn-primary">Téléchargement</a>
    </div>
</main>





<?php
    require_once "inc/footer.inc.php";
?>
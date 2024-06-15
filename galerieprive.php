<?php
    require_once "inc/functions.inc.php";

        // pdo (PHP Data Objects) représente une connexion à une base de données
        $pdo = connexionBdd();
        //Cette requête SQL récupère les données de deux tables : client_images (alias ci) et photos (alias p). Il sélectionne toutes les colonnes de ci et la colonne photo de p.
        $sql = "SELECT ci.*, p.photo FROM client_images ci   
                -- Lorsque nous joignons plusieurs tables, nous pouvons donner un alias à chaque table pour éviter toute ambiguïté et rendre la requête plus lisible.
                -- La requête joint ces tables en fonction du champ photo_id et le jeu de résultats est trié par id_client_image.
                JOIN photos p ON ci.photo_id = p.id_photo 
                ORDER BY ci.id_client_image";
        $request = $pdo->prepare($sql);
        $request->execute();
            // Cette ligne exécute l'instruction préparée. Il lie la valeur de $_SESSION['user']['id'] à l'espace réservé :client_id dans la requête. Cette valeur est utilisée pour filtrer les résultats en fonction de l’ID de l’utilisateur.
        
        // Enfin, la méthode fetchAll() récupère toutes les lignes de la requête exécutée et les stocke dans la variable $galerieprives sous forme de tableau associatif.
        $galerieprives = $request->fetchAll(PDO::FETCH_ASSOC);





$title = "Galerie privée";
require_once "inc/header.inc.php";

?>



<main class="container mt-2 mb-2">
    <h1>Bienvenue dans votre galerie privée</h1>
    <article class="p-2 m-2">
        <!-- Ce code utilise une boucle foreach pour parcourir le tableau $galerieprives, qui contient les résultats d'une requête de base de données qui récupère les images client. -->
        <?php foreach ($galerieprives as $galerieprive) {?>
            <div class="p-2">
                <img src="<?= $galerieprive['photo']?>" alt="Client Image" > 
            </div>
        <?php }?>
    </article>
    <div><!---le lien pour telechargement wetransfer -->
        <a href="#" class="btn btn-primary">Téléchargement</a>
    </div>
</main>




<?php
    require_once "inc/footer.inc.php";
?>
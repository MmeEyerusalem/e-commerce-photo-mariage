<?php
    require_once "inc/functions.inc.php";


    $pdo =  connexionBdd();
    $sql= ("SELECT* FROM galerie ORDER BY id_galerie "); //pour afficher le nouvelle affiche commence 1eme line DESC.
    $request = $pdo->prepare($sql);
    $request->execute();

    if (isset($_GET['id_galerie']) == ':id_galerie') {

    header("location:" . RACINE_SITE . "index2.php");
    }


$title = "Galerie";
require_once "inc/headerwithout.inc.php";

?>

<main class="">
    <div><h1>Votre Histoire Capturée par la Lumière</h1></div>
    <section class="container">
        <?php 
        // Fetch all gallery items into an array
        $galeriesArray = $request->fetchAll(PDO::FETCH_ASSOC);

        $pairedGalleries = array_chunk($galeriesArray, 2);

        foreach($pairedGalleries as $pair){
            $galeriesLeft = $pair[0]; 
            $galeriesRight = $pair[1] ?? null; 
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
                <?php if($galeriesRight): ?>
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




<?php
    require_once "inc/footer.inc.php";
?>
<?php
require_once "inc/functions.inc.php";



$title = "Accueil";
require_once "inc/header.inc.php";
?>



    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12-center col-ms-12 pr-1 img1">
                <img src="./assets/img/misha-earle.jpg" alt="misha-earle">
            </div>
            <div class="col-lg-6 col-md-12 col-ms-12 pl-0 img1Text ">
                <h2>Photographie de Mariage</h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eiussint saepe ipsa eos voluptate delectus.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus.<br>

                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus.
                    <br>"Je te promets de t'aimer et de te chérir!"
                </p>

            </div>
        </div>
    </section>

    <section>
        <div class="img2">
            <img src="./assets/img/wedding-1.jpg" alt="wedding1">
        </div>
        
            <div class="img2Text pt-0 pb-4">
                <h2>Photographie de Mariage</h2>
                <p class="mt-2">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus.<br>

                    "Je te promets de t'aimer et de te chérir!"<br>

                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus.
                </p>
            </div>
    </section>

    <article class="pt-1 px-3 mx-5">
        <div class="row">
            <div class="col-md-4 col-sm-6 px-5 pt-2">
                <img src="./assets/img/beach-wedding.jpg" alt="beachWedding">
                <h3 class="pt-2 fs-4">Photographie de Mariage</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus.</p>
                <div class="text-center">
                  <a href="<?=RACINE_SITE ?>galerie.php"> <button type="button" class="btn btn-outline-warning fw-bold col-6">Galerie</button></a> 
                </div>
            </div>

            <div class="col-md-4 col-sm-6 px-5 pt-2">
                <img src="./assets/img/E&M-wedding.jpg" alt="e&mWedding">
                <h3 class="pt-2 fs-4">Autres occasions</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus.</p>
                <div class="text-center">
                <a href="<?=RACINE_SITE ?>occasions.php"><button type="button" class=" btn btn-outline-warning fw-bold col-6">En savoir plus</button></a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 px-5 pt-2">
                <img src="./assets/img/architecture.jpg" alt="architecture">
                <h3 class="pt-2 fs-4">Partager ma passion</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus.</p>
                <div class="text-center">
                <a href="<?=RACINE_SITE ?>projetperso.php"><button type="button" class="btn btn-outline-warning fw-bold col-6 mx-auto">Découvrir</button></a>
                </div>
            </div>
        </div>
    </article>

    <section class=" container  mt-5 mb-0 petit-section">
        <div class="row">
            <div class="col-12 col-md-3 mb-3 mb-md-0 red-flower1">
                <img src="./assets/img/red-flowers.jpg" alt="redFlowers">
            </div>
             
            <div class="col-12 col-md-6 mx-auto mt-5 mt-md-0 text-center text-md-left textPromo">
                <!-- <h3 class="fs-4">Plus les details? Ou un devie? Contactez nous! </h3> -->
                <h3 class="fs-4">Les promotions du mois! </h3>
                <div class="text-center">
                    <button type="button" class="btn btn-outline-warning fs-5 fw-bold mt-3">Click ici &#9754;</button>
                </div>
            </div>

            <div class="col-12 col-md-3 red-flower2">
                <img src="./assets/img/red-flowers.jpg" alt="redFlowers">
            </div>
        </div>
    </section>

    <div class="col-6 lastPara ">
        <h2> Ma signature visuelle </h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci debitis qui quis tempore
                    necessitatibus deleniti aperiam dolore exercitationem iure explicabo, quia laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus. deleniti aperiam dolore exercitationem iure explicabo, quia
                    laudantium quasi, eius
                    sint saepe ipsa eos voluptate delectus.Lorem ipsum dolor.
        </p>
    </div>

<?php
    require_once "inc/footer.inc.php";
?>
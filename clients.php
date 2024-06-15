<?php

require_once"../inc/functions.inc.php";


if(!isset($_SESSION['user'])) {

    header("location:".RACINE_SITE."authentification.php");
}else{
    if($_SESSION['user']['role'] == 'Role_User'){

        header("location:".RACINE_SITE."index.php");
    }
}
if (isset($_GET['action']) && isset($_GET['id_client'])) {
    if (!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_client'])) {

        $id_client = $_GET['id_client'];
        $client = deleteClient($id_client);
    }
}


$clients = allClients();
// debug($films);


$title = "Clients";
require_once "../inc/header.inc.php";

?>


<div class="d-flex flex-column m-auto mt-2 table-responsive">
    <h2 class="text-center fw-bolder mb-2 text-white">Listes des clients</h2>
    <table class="table table-dark table-bordered mt-5">
        <thead>
            <tr class="fw-bolder">
                <td>ID</td>
                <td>Prenom</td>
                <td>Nom</td>
                <td>Civilite</td>
                <td>Email</td>
                <td>Téléphone</td>
                <td>Adresse</td>
                <td>Code_Postal</dr>
                <td>Ville</dr>
                <td>Pays</td>
                <td>Rôle</td>
                <td>Supprimer</td>
                <td>Les rôles</td>
            </tr>
        </thead>

        <tbody>

            <?php
            $clients = allClients();

            foreach ($clients as $client) {

                ?>
                <tr>
                    <td>
                        <?= $client['id_client'] ?>
                    </td>
                    <td>
                        <?= ucfirst($client['prenom']) ?>
                    </td>
                    <td>
                        <?= ucfirst($client['nom']) ?>
                    </td>
                    <td>
                        <?= $client['civilite'] ?>
                    </td>
                    <td>
                        <?= $client['email'] ?>
                    </td>
                    <td>
                        <?= $client['telephone'] ?>
                    </td>
                    <td>
                        <?= $client['adresse'] ?>
                    </td>
                    <td>
                        <?= $client['code_postal'] ?>
                    </td>
                    <td>
                        <?= ucfirst($client['ville']) ?>
                    </td>
                    <td>
                        <?= ucfirst($client['pays']) ?>
                    </td>
                    <td>
                        <?= $client['role'] ?>
                    </td>
                    <td class="text-center">
                        <a href="dashboard.php?clients_php&action=delete&id_client=<?=$client['id_client']?>">
                        <i class="bi bi-trash3-fill fs-4"></i></a>
                    </td>
                    <!-- <td class="text-center">
                        <a href="dashboard.php?clients_php&action=update&id_client=<?=$client['id_client']?>" class="btn btn-danger"><?= ($client['role']) == 'Role_Admin' ? 'Rôle user' : 'Rôle admin' ?> </a>
                    </td> -->
                </tr>
                <?php
                    }
                ?>
        </tbody>
         </table>
</div>

<?php
require_once "../inc/footer.inc.php";
?>
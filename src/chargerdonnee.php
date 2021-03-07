<?php
include('includes/dbfunctions.php');
$lastid = $_GET['lastid'];
$requetenewclient = "SELECT * FROM ely_client WHERE cli_statut = 'ACTIF' AND ely_client.cli_id >".$lastid." limit 5";
$resultat = mysqli_query($connection, $requetenewclient);
    if(mysqli_num_rows($resultat) > 0) {
        $donnees   =   mysqli_fetch_all($resultat,MYSQLI_ASSOC);
        echo json_encode($donnees);
    }

?>

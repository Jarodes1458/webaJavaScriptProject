<?php
include('includes/dbfunctions.php');
$lastid = $_GET['lastid'];
$requetenewclient = myConnection()->prepare( "SELECT * FROM ely_client WHERE cli_statut = 'ACTIF' AND ely_client.cli_id >".$lastid."   limit 5");
$requetenewclient->execute();
    if($requetenewclient->rowCount() > 0) {
        $donnees   =   $requetenewclient->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($donnees);
    }
?>

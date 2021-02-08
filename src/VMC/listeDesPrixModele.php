<?php

if ($_SERVER['SERVER_NAME'] == "esig-sandbox.ch"){
    function myConnection() {
        static $dbc = null;
        if ($dbc == null) {
            try {
                // Sur MAMP (MacOS), l'espace entre mysql: et host= est indispensable...!?!
                $dbc = new PDO('mysql:dbname=hhva_team2020_5;host=hhva.myd.infomaniak.com', 'hhva_team2020_5', 'LBtKn32jx8');
            } catch (PDOException $e) {
                header("Location:error?message=".$e->getMessage());
            }
        }
        return $dbc;
    }
}else{
    function myConnection() {
        static $dbc = null;
        if ($dbc == null) {
            try {
                $dbc = new PDO('mysql:dbname=hhva_team2020_5;host=localhost', 'root', '');
            } catch (PDOException $e) {
                header("Location:error?message=".$e->getMessage());
            }
        }
        return $dbc;
    }
}

function getAllCoiffeur(){
    try {
        $request = myConnection()->prepare("SELECT * FROM ely_coiffeur where coi_statut = 'ACTIF'");
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error?message=".$e->getMessage());
    }
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function addService($type, $nom, $prix, $time, $description){
    try{
        $request = myConnection()->prepare
        ("INSERT INTO ely_service (ser_nom, ser_type, ser_prix, ser_description, ser_temps_estimation)
        VALUES(:ser_nom,:ser_type,:ser_prix,:ser_description,:ser_temps_estimation)");
        $request->bindParam(':ser_nom', $nom, PDO::PARAM_STR);
        $request->bindParam(':ser_type', $type, PDO::PARAM_STR);
        $request->bindParam(':ser_prix', $prix, PDO::PARAM_INT);
        $request->bindParam(':ser_description', $description, PDO::PARAM_STR);
        $request->bindParam(':ser_temps_estimation', $time, PDO::PARAM_INT);
        $request->execute();
    }catch (PDOException $e) {
        header("Location:error?message=".$e->getMessage());
    }
}

function addService_Coiffeur($idCoiffeur, $idService){
    try{
        $request = myConnection()->prepare("INSERT INTO service_coiffeur (coi_id, ser_id)
        VALUES(:coi_id,:ser_id)");
        $request->bindParam(':coi_id', $idCoiffeur, PDO::PARAM_INT);
        $request->bindParam(':ser_id', $idService, PDO::PARAM_INT);
        $request->execute();
    }catch (PDOException $e) {
        header("Location:error?message=".$e->getMessage());
    }
}

function getLastService(){
    try {
        $request = myConnection()->prepare("SELECT max(ser_id) as maximum FROM ely_service");
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error?message=".$e->getMessage());
    }
    return $request->fetch(PDO::FETCH_ASSOC);
}

function updateService($idService, $type, $nom, $prix, $duree, $description)
{
    $request = myConnection()->prepare("UPDATE ely_service SET ser_nom = :ser_nom, ser_type = :ser_type, ser_prix = :ser_prix, ser_description = :ser_description, ser_temps_estimation = :ser_temps_estimation 
    WHERE ser_id = :ser_id");
    $request->bindParam(':ser_nom', $nom, PDO::PARAM_STR);
    $request->bindParam(':ser_type', $type, PDO::PARAM_STR);
    $request->bindParam(':ser_prix', $prix, PDO::PARAM_INT);
    $request->bindParam(':ser_description', $description, PDO::PARAM_STR);
    $request->bindParam(':ser_temps_estimation', $duree, PDO::PARAM_INT);
    $request->bindParam(':ser_id', $idService, PDO::PARAM_INT);
    $request->execute();
}

function canCoiffeurDoThisService($idcoi,$idser)
{
    try {
        $request = myConnection()->prepare
        ("SELECT * FROM ely_coiffeur inner join service_coiffeur on
         ely_coiffeur.coi_id = service_coiffeur.coi_id 
         where ely_coiffeur.coi_id = :idcoi and service_coiffeur.ser_id = :idser");
        $request->bindParam(':idcoi', $idcoi, PDO::PARAM_INT);
        $request->bindParam(':idser', $idser, PDO::PARAM_INT);

        $request->execute();
    } catch (PDOException $e) {
        header("Location:error?message=".$e->getMessage());
    }
    return $request;
}

function deleteService_Coiffeur($idCoiffeur, $idService){
    try{
        $request = myConnection()->prepare("DELETE FROM service_coiffeur where coi_id = :idcoi and ser_id = :idser");
        $request->bindParam(':idcoi', $idCoiffeur, PDO::PARAM_INT);
        $request->bindParam(':idser', $idService, PDO::PARAM_INT);
        $request->execute();
    }catch (PDOException $e) {
        header("Location:error?message=".$e->getMessage());
    }
}
function supprimerService($idService){
    $request = myConnection()->prepare("UPDATE ely_service SET ser_statut = 'INACTIF' WHERE ser_id = :ser_id");
    $request->bindParam(':ser_id', $idService, PDO::PARAM_INT);
    $request->execute();
}

function modificationPossible(){
    if (isset($_SESSION["COI_POSTE"])){
        if ($_SESSION["COI_POSTE"] == "Patronne"){
            return true;
        }
        else{
            return false;
        }
    }else{
        return false;
    }
}

function getAllCoupePrestation($typePrestation)
{
    try {
        $request = myConnection()->prepare("SELECT * FROM ely_service WHERE ser_type = :typePrestation and ser_statut = 'ACTIF'");
        $request->bindParam(':typePrestation', $typePrestation, PDO::PARAM_STR);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error?message=".$e->getMessage());
    }
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getOneService($idser)
{
    try {
        $request = myConnection()->prepare("SELECT * FROM ely_service where ser_id = :id");
        $request->bindParam(':id', $idser, PDO::PARAM_INT);
        $request->execute();
    } catch (PDOException $e) {
        header("Location:error?message=".$e->getMessage());
    }
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getAllServiceCategorieExceptOne2($categorie)
{
    $categorieListe = getAllServiceCategorie();
    $pos = array_search($categorie, $categorieListe);
    unset($categorieListe[$pos]);
    return $categorieListe;
}


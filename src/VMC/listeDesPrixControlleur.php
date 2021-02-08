<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */
  $title = "Elysée - liste des prix";
include ("listeDesPrixModele.php");

    $modificationPossible = modificationPossible();

  /**
   * *Création d'un service
   */

  if ($modificationPossible){
    //Création du service
    if (!empty($_POST["inputType"]) and !empty($_POST["inputNom"]) and !empty($_POST["inputPrix"]) and !empty($_POST["inputTime"])){
      addService($_POST["inputType"], $_POST["inputNom"], $_POST["inputPrix"], $_POST["inputTime"], $_POST["inputDescription"]);

      foreach(getAllCoiffeur() as $coiffeur){
        if (!empty($_POST[$coiffeur["COI_ID"]])){
          addService_Coiffeur($_POST[$coiffeur["COI_ID"]], getLastService()["maximum"]);
        }
      }
      
    header('Location: listeDesPrixControlleur');
    }

    if (isset($_POST["change"]) && $modificationPossible){
      updateService($_GET['idmodif'], $_POST["inputTypeM"], $_POST["inputNomM"], $_POST["inputPrixM"], $_POST["inputTimeM"], $_POST["inputDescriptionM"]);
      
      foreach(getAllCoiffeur() as $coiffeur){

      if(!empty($_POST[$coiffeur["COI_ID"]]))
      {
        if(canCoiffeurDoThisService($coiffeur["COI_ID"], $_GET['idmodif'])->rowcount() == 0)
        {
        addService_Coiffeur($coiffeur["COI_ID"], $_GET['idmodif']);
        }
      }
      if(empty($_POST[$coiffeur["COI_ID"]])){
        if(canCoiffeurDoThisService($coiffeur["COI_ID"], $_GET['idmodif'])->rowcount() == 1)
        {
          deleteService_Coiffeur( $coiffeur["COI_ID"], $_GET['idmodif']);
        }
    
      }}
      header('Location: listeDesPrixControlleur');
    }

    if (isset($_GET["id"])){
      supprimerService($_GET["id"]);
      header('Location: listeDesPrixControlleur');
    }
  }


include('listeDesPrixheader.php');
include("listeDesPrixVue.php");







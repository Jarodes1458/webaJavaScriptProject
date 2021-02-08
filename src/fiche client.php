<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */


  $title = "Elysée - liste des clients";
  include('includes/header.php'); 



if (isset($_SESSION["COI_POSTE"])){

  if ($_SESSION["COI_POSTE"] == 'Coiffeur'){
    $modificationAutorisation = true;
    $modificationAutorisationSupérieur = false;
  }
  elseif ($_SESSION["COI_POSTE"] == 'Patronne' OR $_SESSION["COI_POSTE"] == 'Coiffeur superieur'){
    $modificationAutorisation = true;
    $modificationAutorisationSupérieur = true;
  }
else{
  $modificationAutorisation = false;
  $modificationAutorisationSupérieur = false;
}

  $client = getClient($_GET["id"]);

  if (isset($_GET["modifie"]) AND $modificationAutorisation){
    $modifie = true;

    $listeDesTypesDePrestation = array("Coupe", "Beaute des cheveux", "Soin", "Autre");

  }else{
    $modifie = false;
  }

  /*Modification du client*/
  if (isset($_POST["modificationClient"])){
    
    $description = trim(htmlspecialchars($_POST["descriptionClient"]));
    
    if ($modificationAutorisationSupérieur){

      $nom = trim(htmlspecialchars($_POST["nomClient"]));
      $prenom = trim(htmlspecialchars($_POST["prenomClient"]));
      $tel = trim(htmlspecialchars($_POST["telClient"]));
      $email = trim(htmlspecialchars($_POST["emailClient"]));
      editClient($nom, $prenom, $email, $tel, $description, $client["CLI_ID"]);
      $client = getClient($_GET["id"]);
      
    }elseif ($modificationAutorisation){

      editClientCommentaire($description, $client["CLI_ID"]);
      $client = getClient($_GET["id"]);
    }
  }



  /*Modification du rendez-vous*/
  if (isset($_POST["modificationRendezVous"])){
    $rdvId = $_GET["rdv"];
    $infordv = getClientInformationRdv($rdvId)->fetchAll();
    $prix = trim(htmlspecialchars($_POST["prixRendezvous"]));
    for($compteur = 0 ;$compteur < 3 ; $compteur++)
    {
      if(!empty($_POST['inputPrestation'.$compteur]))
      {
        if($infordv[$compteur]['SER_ID'] != trim(htmlspecialchars($_POST["inputPrestation".$compteur])))
        {
        deleteAServiceAboutARdv(trim(htmlspecialchars($infordv[$compteur]['SER_ID'])),$rdvId);

        insertAServiceAboutARdv(trim(htmlspecialchars($_POST["inputPrestation".$compteur])),$rdvId);
        }
      }
    }

    $description = trim(htmlspecialchars($_POST["descriptionRendezVous"]));
    

    if ($modificationAutorisationSupérieur){
      $coiffeur = trim(htmlspecialchars($_POST["inputCoiffeur"]));
      
      editRendezvous($rdvId, $coiffeur, $description, $prix);
    }elseif ($modificationAutorisation){
      editRendezvousPourCoiffeur($rdvId, $description, $prix);
    }
  }
  



  /*Suppression du rendz-vous*/
  if (isset($_POST["SupprimerClient"]) AND $modificationAutorisationSupérieur){
    deleteRDV($_POST["rdvID"]);
  }

  //Autorisation pour le coiffeur 
  $listeDesIDDesClient = array();
  if (isset($_SESSION["COI_ID"])){
    foreach(getAllClientPourCoiffeur($_SESSION["COI_ID"]) as $rdv){
      $listeDesIDDesClient[] = $rdv["cli_id"];
    }
  }



  if (in_array($_GET["id"], $listeDesIDDesClient) OR $modificationAutorisationSupérieur){
?>
<body style="background-color: white;" >
<br><br>
  <div class="container">
    <form method="POST" action="fiche client?&id=<?=$client["CLI_ID"]?>&modifie=true">
    <div class="row" style="padding-top: 8%; background-color: white; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
      <div class="offset-1 col-6">
      <p class="font-weight-bold" style="font-size: 110%; ">Nom:</p>
        <?php if ($modifie AND $modificationAutorisationSupérieur){?>
          <input type="text" class="form-control border border-dark col-8" id="nomClient" name="nomClient" value="<?=$client["CLI_NOM"]?>">
        <?php } else{ ?>
          <p style="font-size: 85%; margin-top: -1%;"><?=$client["CLI_NOM"]?></p>
        <?php } ?>
      </div>
      <div class="col-4">
        <p class="font-weight-bold" style="font-size: 110%; ">Prenom:</p>
        <?php if ($modifie AND $modificationAutorisationSupérieur){?>
          <input type="text" class="form-control border border-dark col-8" id="prenomClient" name="prenomClient" value="<?=$client["CLI_PRENOM"]?>">
        <?php } else{ ?>
          <p style="font-size: 85%; margin-top: -1%;"><?=$client["CLI_PRENOM"]?></p>
        <?php } ?>
      </div>
      <br><br><br>
      <div class="offset-1 col-6">
      <?php if ($modificationAutorisationSupérieur){ ?>
        <p class="font-weight-bold" style="font-size: 110%; ">Téléphone:</p>
          <?php if ($modifie){?>
            <input type="text" class="form-control border border-dark col-8" id="telClient" name="telClient" value="<?=$client["CLI_TEL"]?>">
          <?php } else{ ?>
            <p style="font-size: 85%; margin-top: -1%;"><?=$client["CLI_TEL"]?></p>
          <?php } }?>
      </div>
      <div class="col-4">
      <?php if ($modificationAutorisationSupérieur){ ?>
      <p class="font-weight-bold" style="font-size: 110%; ">Email:</p>
        <?php if ($modifie){?>
          <input type="text" class="form-control border border-dark col-8" id="emailClient" name="emailClient" value="<?=$client["CLI_EMAIL"]?>">
        <?php } else{ ?>
          <p style="font-size: 85%; margin-top: -1%;"><?=$client["CLI_EMAIL"]?></p>
        <?php } } ?>
      </div>

      <div class="offset-1 col-10" style="padding-bottom: 2%;">
        <p class="font-weight-bold" style="font-size: 110%; margin-top: 5%;">Commentaire:</p>
        <textarea class="form-control border border-dark" name="descriptionClient" id="" cols="30" rows="7" <?php if (!$modifie) { ?> disabled <?php } ?> style="resize: none;"><?=$client["CLI_DESCRIPTION"]?></textarea>
      </div>

      <?php if ($modificationAutorisation AND $modifie){ ?>
        <a href="fiche client?id=<?=$client["CLI_ID"]?>"class="btn btn-light border border-dark marginauto" style="margin-bottom: 2%;">Quitter le mode modification</a>
        <button name="modificationClient" type="submit"class="btn btn-light border border-dark marginauto" style="margin-bottom: 2%;">Enregister</button>
      <?php } else{ ?>
        <a href="fiche client?id=<?=$client["CLI_ID"]?>&modifie=true"class="btn btn-light border border-dark marginauto" style="margin-bottom: 2%;">Modifier le client</a>
      <?php } ?>
      </form>
      <div class="offset-1 col-10 borderTopPerso"></div>
      </div>
      
      <div class="row bg-white" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding-top: 2%; padding-bottom: 3%;">
        <p class="font-weight-bold offset-1 col-5" style="font-size: 110%; margin-bottom: 3%;">Rendez-vous:</p>
        <?php
        if ($modificationAutorisationSupérieur AND $modifie){ ?> 

          <a href="priserdv1.php" class="btn btn-light border border-dark marginauto float-right col-3" style="margin-right: 10%; margin-top: -0.5%;">
          Ajouter un rendez-vous</a>
        <?php } ?>
        <div class="col-10 offset-1">
          <div id="accordion">
          <?php foreach(getRdvClient($client["CLI_ID"]) as $rdv){

                if(getClientInformationRdv($rdv["RDV_ID"])->rowcount() <= 1)
                {
                  $infomationRendezvous = getClientInformationRdv($rdv["RDV_ID"])->fetch();
                  $informationQuiNeChangePasDansFetchAll = $infomationRendezvous;
                  $plusieurs = false;
                }
                else
                {
                  $infomationRendezvous = getClientInformationRdv($rdv["RDV_ID"])->fetchAll();
                  $informationQuiNeChangePasDansFetchAll = $infomationRendezvous[0];
                  $plusieurs = true;
                }

                ?>
            <div class="card">

            <?php 
            if($plusieurs)
            {?>
              <div class="card-header" id="heading-<?=$informationQuiNeChangePasDansFetchAll['RDV_ID']?><?php
              foreach($infomationRendezvous as $infomationRendezvous2)
              { ?>
                  <h5 class="mb-0">
                  <?php 
                  $prix = $infomationRendezvous2['RDV_PRIX'];
                
              }?>

                  <button style="padding-top: 3%; margin-top: -1%;" class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?=$infomationRendezvous[0]['RDV_ID']?>" aria-expanded="true" aria-controls="collapse-<?=$infomationRendezvous2['RDV_ID']?>">
                  <?php 
                    foreach($infomationRendezvous as $infomationRendezvous2)
                    { ?>
                    
                    
                    <span class="font-weight-bold" style="font-size: 140%;"><?= $infomationRendezvous2["SER_NOM"] . '&emsp;'?></span>
                    
                <?php 
              }
            }
            else
            {
              ?>
              <div class="card-header" id="heading-<?=$infomationRendezvous['RDV_ID']?>">
                  <h5 class="mb-0">
                  <?php 
                  $prix = $infomationRendezvous['RDV_PRIX'];
                  ?>
                  <button style="padding-top: 3%; margin-top: -1%;" class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?=$infomationRendezvous['RDV_ID']?>" aria-expanded="true" aria-controls="collapse-<?=$infomationRendezvous['RDV_ID']?>">  
                  <p class="font-weight-bold" style="font-size: 140%;"><?=$infomationRendezvous["SER_NOM"]?></p>
              <?php
            }
            
            ?>
                      <p> </p>
                      <p class="font-weight-bold" style="font-size: 140%;"> <span><?= transformeDateUSEU($informationQuiNeChangePasDansFetchAll["PER_DATE"])  . '</span><br>de <span class="couleurRouge">' . $informationQuiNeChangePasDansFetchAll['PER_HEURE_MIN_DEBUT'] . ' </span> à <span class="couleurRouge"> ' . $informationQuiNeChangePasDansFetchAll['PER_HEURE_MIN_FIN'] ?></span> </p>
                    </button>
                    <?php if ($modifie AND $modificationAutorisationSupérieur){ ?>
                      <button onclick="donneesSupprimerRendezVous('<?=$informationQuiNeChangePasDansFetchAll['RDV_ID']?>')" data-toggle="modal" data-target="#SupprimerUnRendezVous"  class="btn btn-light border border-dark marginauto float-right" style="margin-bottom: 2%;">Supprimer</button>
                    <?php } ?>
                    <?php isset($prix)? $prixfinal = $prix : $prixfinal = $infomationRendezvous["RDV_PRIX"]; ?>
                    <p class="float-right" style="padding-top: 2%;"> Prix: <?= $prixfinal. ' CHF'; ?> &emsp;</p>
                  </h5>
                </div>

                <div id="collapse-<?=$informationQuiNeChangePasDansFetchAll['RDV_ID']?>" class="collapse" aria-labelledby="heading-<?=$informationQuiNeChangePasDansFetchAll['RDV_ID']?>" data-parent="#accordion">
                  <div class="card-body">
                    <form method="POST" action="fiche client?&id=<?=$client["CLI_ID"]?>&modifie=true&rdv=<?=$informationQuiNeChangePasDansFetchAll["RDV_ID"]?>">
                      <div class="row" style="font-size: 80%;">
                      <?php if(!$modifie){ ?>
                        <div class="col-6">
                            <p class="font-weight-bold" style="font-size: 110%; ">Coiffeur:</p>
                            <p style="font-size: 85%; margin-top: -3%;"><?=$informationQuiNeChangePasDansFetchAll["COI_NOM"] . ' ' . $informationQuiNeChangePasDansFetchAll["COI_PRENOM"]?><p>
                        </div>
                        <div class="col-6">
                          <p class="font-weight-bold" style="font-size: 110%; ">Temps de la prestation:</p>
                          <?php
                          if($plusieurs)
                          {
                            $temps = 0;
                            foreach($infomationRendezvous as $infomationRendezvous2)
                            { 
                              $temps += $infomationRendezvous2["SER_TEMPS_ESTIMATION"];
                              ?>
                            <?php 
                            }
                          }
                          else{
                            $temps = $infomationRendezvous["SER_TEMPS_ESTIMATION"];
                          }
                          
                          ?>
                            <p style="font-size: 85%; margin-top: -3%;"><?=$temps . " Minutes"?><p>
                        </div>
                        <?php } else{
                          if ($modificationAutorisationSupérieur){ ?>
                            <div class="col-6">
                              <p class="font-weight-bold">Coiffeur:</p>
                              <div class="form-group">
                              <select id="inputCoiffeur" name="inputCoiffeur" class="form-control">
                                    <?php foreach(getAllCoiffeur() as $coiffeur): 
                                      if ($coiffeur["COI_ID"] == $infomationRendezvous["COI_ID"]){ ?>
                                        <option value="<?=$coiffeur["COI_ID"]?>" selected name="<?=$coiffeur["COI_ID"]?>"><?=$coiffeur["COI_NOM"] . " ". $coiffeur["COI_PRENOM"]?></option>
                                      <?php } else{ ?>
                                        <option value="<?=$coiffeur["COI_ID"]?>" name="<?=$coiffeur["COI_ID"]?>"><?=$coiffeur["COI_NOM"] . " ". $coiffeur["COI_PRENOM"]?></option>
                                      <?php }?>
                                    <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          <?php } else{ ?>
                            <div class="col-6">
                              <p class="font-weight-bold" style="font-size: 110%; ">Coiffeur:</p>
                              <p style="font-size: 85%;"><?=$infomationRendezvous["COI_NOM"] . ' ' . $infomationRendezvous["COI_PRENOM"]?><p>
                            </div>
                          <?php } ?>
                          <div class="col-6 text-center">
                            <p class="font-weight-bold">Prix:</p>
                            <input type="number" class="form-control border col-12" id="prixRendezvous" name="prixRendezvous" value="<?=$prixfinal?>">
                          </div>
                          <div class="col-12">
                            <p class="font-weight-bold">Type de prestation:</p>
                            <div class="form-group">
                            <?php
                          if($plusieurs)
                          {
                            $compteur = 0;
                            foreach($infomationRendezvous as $infomationRendezvous2)
                            { 
                              ?><select id="inputPrestation" name="inputPrestation<?= $compteur?>" class="form-control col-5"><?php
                              foreach(getAllCoupePrestation2() as $prestation): ?>
                          
                                        <?php if ($prestation["SER_ID"] == $infomationRendezvous2["SER_ID"]){ ?>
                                          <option value="<?=$prestation["SER_ID"]?>" selected name="<?=$prestation["SER_NOM"].$compteur?>"><?=$prestation["SER_NOM"]?></option>
                                        <?php } else{  ?>
                                          <option value="<?=$prestation["SER_ID"]?>" name="<?=$prestation["SER_NOM"].$compteur ?>"><?=$prestation["SER_NOM"] ?></option>
                                      <?php } endforeach; 

                            $compteur++;?>
                            </select>
                            <br>
                            <?php
                            } ?>
                            </div>
                            <?php

                          }
                          else{                      
                          ?>
                          <select id="inputPrestation" name="inputPrestation" class="form-control col-6">
                          <?php foreach(getAllCoupePrestation2() as $prestation): ?>
                          
                                    <?php if ($prestation["SER_NOM"] == $infomationRendezvous["SER_NOM"]){ ?>
                                      <option value="<?=$prestation["SER_ID"]?>" selected name="<?=$infomationRendezvous["SER_NOM"]?>"><?=$infomationRendezvous["SER_NOM"]?></option>
                                    <?php } else{  ?>
                                      <option value="<?=$prestation["SER_ID"]?>" name="<?=$prestation["SER_NOM"] ?>"><?=$prestation["SER_NOM"] ?></option>
                                  <?php } endforeach; ?>
                              </select>
                            </div>
                          </div>
                          <?php } ?></div><?php } ?>
                        <p class="font-weight-bold">&ensp; Description:</p>
                        <textarea class="form-control border "  name="descriptionRendezVous" id="descriptionRendezVous" cols="30" rows="7"  <?php if (!$modifie) { ?> disabled <?php } ?> style="resize: none; margin-left: 2%; margin-right: 2%;"><?=$informationQuiNeChangePasDansFetchAll["RDV_DESCRIPTION"]?></textarea>
                      </div>
                      <?php if($modifie){ ?> <button name="modificationRendezVous" type="submit"class="btn btn-light border border-dark float-right" style="margin: 1%;">Enregister</button> <?php } ?>
                    </form>
                  </div>
                </div>
              <?php }?>  
            </div>
            <a href="listedesclients" ><button style="margin-top: 5%" type="button" name="comeback" class="btn btn-secondary border border-dark" >Retour</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</div></div></div>
<?php 
  }
  ?>




<div class="modal fade bd-example-modal-lg" data-backdrop="false" id="SupprimerUnRendezVous" tabindex="-1" role="dialog" aria-labelledby="SupprimerUnRendezVous" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="SupprimerUnRendezVous">Supprimer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="fiche client?&id=<?=$client["CLI_ID"]?>&modifie=true">
            Êtes-vous sur de supprimer se rendez-vous ? <br>
        </div>
        <div class="modal-footer">
          <input id="rdvID" name="rdvID" type="text" value="" hidden="true">
          <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
          <button type="submit" name="SupprimerClient" class="btn btn-primary">Supprimer</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php }else{ ?>
<script>
  window.location.href = "index";
</script>

<?php } ?>
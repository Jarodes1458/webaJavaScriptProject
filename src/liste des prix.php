<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */


  $title = "Elysée - liste des prix";
  include('includes/header.php'); 

  if (isset($_SESSION["COI_POSTE"])){
    if ($_SESSION["COI_POSTE"] == "Patronne"){
      $modificationPossible = true;
    }
    else{
      $modificationPossible = false;
    }
  }else{
    $modificationPossible = false;
  }

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
      
      echo '<script type="text/javascript">';
      echo  'window.location(liste des prix);<\script>';
      echo '</script>'; //header('Location: liste des prix');
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

      echo '<script type="text/javascript">';
      echo  'window.location(liste des prix);<\script>';
      echo '</script>'; //header('Location: liste des prix');
    }

    if (isset($_GET["id"])){
      supprimerService($_GET["id"]);
      echo '<script type="text/javascript">';
      echo  'window.location(liste des prix);<\script>';
      echo '</script>'; //header('Location: liste des prix');

    }
  }

?>
<br>
<body style="background-color: #fed136">
<?php if(!isset($_GET['modif'])){
?>
<div>
  <div class="container bg-white border border-dark rounded">
    <div class="row">
      <div class="col-9" style="margin:auto;">
        <div class="row">
          <div class="col" style="margin: auto;">
            <br>
            <h2>Tarif et prestations</h2>
            <h5>Les prix peuvent variés selon la longueur de cheveux</h5>
          </div>
        </div>


        <!-- Coupe de cheveux -->
        <div class="row">
          <div class="col offset-1" style="margin: auto;">
            <br><hr><br>
            <h2>Coupe</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-10" style="margin: auto;">
          <form action="liste des prix?modif=true">
            <?php
            foreach(getAllCoupePrestation("coupe") as $prestation):
              echo $prestation["SER_NOM"] . "&ensp;";
            if ($modificationPossible){?>
              <a role="button" href="liste des prix?modif=true&idser=<?= $prestation['SER_ID'] ?>"><i class="far fa-edit colorIcon"></i></a>
              
              <a class="far fa-trash-alt" href="liste des prix?id=<?=$prestation['SER_ID']?>" style="color: #55595c;"></a>
            <?php }
              echo "<br>";
            endforeach?>
          </div>
          </form>
          <div class="col-2">
            <?php
              foreach(getAllCoupePrestation("coupe") as $prestation):
                echo $prestation["SER_PRIX"] . " CHF";
                echo "<br>";
              endforeach?>
            </div>
          </div>        

          <!-- Beauté des cheveux -->
          <div class="row">
            <div class="col" style="margin: auto;">
            <br><hr><br>
              <h2>Beauté</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-10" style="margin: auto;">
              <?php
              foreach(getAllCoupePrestation("Beaute des cheveux") as $prestation):
                echo $prestation["SER_NOM"] . "&ensp;";
                if ($modificationPossible){?>
                  <a role="button" href="liste des prix?modif=true&idser=<?= $prestation['SER_ID'] ?>"><i class="far fa-edit colorIcon"></i></a>
                  
                  <a class="far fa-trash-alt" href="liste des prix?id=<?=$prestation['SER_ID']?>" style="color: #55595c;"></a>
                <?php }
                  echo "<br>";
                endforeach?>
            </div>
            <div class="col-2">
              <?php
                foreach(getAllCoupePrestation("Beaute des cheveux") as $prestation):
                  echo $prestation["SER_PRIX"] . " CHF";
                  echo "<br>";
                endforeach?>
            </div>
          </div>


          <!-- Soins des cheveux -->
          <div class="row">
            <div class="col-12" style="margin: auto;">
            <br><hr><br>
              <h2>Soin</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-10" style="margin: auto;">
              <?php
              foreach(getAllCoupePrestation("Soin") as $prestation):
                echo $prestation["SER_NOM"] . "&ensp;";
                if ($modificationPossible){?>
                  <a role="button" href="liste des prix?modif=true&idser=<?= $prestation['SER_ID'] ?>"><i class="far fa-edit colorIcon"></i></a>
                  
                  <a class="far fa-trash-alt" href="liste des prix?id=<?=$prestation['SER_ID']?>" style="color: #55595c;"></a>
                <?php }
                  echo "<br>";
                endforeach?>
            </div>
            <div class="col-2">
              <?php
                foreach(getAllCoupePrestation("Soin") as $prestation):
                  echo $prestation["SER_PRIX"] . " CHF";
                  echo "<br>";
                endforeach?>
            </div>
          </div>

          <!-- Extension -->
          <div class="row">
            <div class="col-12" style="margin: auto;">
            <br><hr><br>
              <h2>Extension Greath Lenghts</h2>
              Selon la longueur des cheveux
            </div>  
          </div>
      <br>
  


  
    <?php if ($modificationPossible){  /** ! Ajouter un service */?>

              <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target="#AjouterService">
                Ajouter un service
              </button>

              <div class="modal fade bd-example-modal-lg" data-backdrop="false" id="AjouterService" tabindex="-1" role="dialog" aria-labelledby="AjouterService" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="AjouterService">Ajouter un service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <br>
                    <form method="POST" action="liste des prix">
                      <div class="row">
                        <div class="col-lg-6 col-md-12">
                          <h5>Type: </h5>
                          <div class="form-group">
                            <select id="inputType" name="inputType" class="form-control">
                              <option selected>Coupe</option>
                              <option>Beaute des cheveux</option>
                              <option>Soin</option>
                              <option>Autre</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                          <h5>Nom du service: </h5>
                          <div class="form-group">
                            <input type="text" class="form-control" id="inputNom" name="inputNom" placeholder="Meche" required>
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-lg-6 col-md-12">
                          <h5>Prix: </h5>
                          <div class="form-group">
                            <input type="number" class="form-control" id="inputPrix" name="inputPrix" placeholder="100 CHF" required>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                          <h5>Durée (en minute):</h5>
                          <div class="form-group">
                            <input type="number" class="form-control" id="inputTime" name="inputTime" placeholder="Minutes" required>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <h5>Description: </h5>
                          <div class="form-group">
                            <textarea class="form-control"rows="5" name="inputDescription" id="inputDescription" style="resize: none;" placeholder="Description"></textarea>
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-12">
                          <h5>Sélectionné le/les coiffeurs qui ont la peuvent éffectuer cette prestation: </h5>
                            <?php foreach(getAllCoiffeur() as $coiffeur){ ?>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="<?=$coiffeur["COI_ID"]?>" name="<?=$coiffeur["COI_ID"]?>" value="<?=$coiffeur["COI_ID"]?>">
                                <label for="<?=$coiffeur["COI_ID"]?>"><?=$coiffeur["COI_NOM"] . " " . $coiffeur["COI_PRENOM"]?></label>
                              </div>
                            <?php } ?>
                        </div>
                      </div>
                  <br>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregister</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <br>
  </div>

</body>

<br><br>

<?php }elseif ($modificationPossible && isset($_GET['modif'])) {
  $patronne = true;
  if($patronne){ 
    $service = getOneService($_GET['idser']);
    
    ?>
<div class="container"">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModifierService">Modifier <span id="nomDuService"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <br>
          <form method="POST" action="liste des prix?idmodif=<?= $service['SER_ID'] ?>">
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <h5>Type: </h5>
                <div class="form-group">
                  <select id="inputTypeM" name="inputTypeM" class="form-control">
                    <option selected value="<?= $service['SER_TYPE'] ?>" id="ancienneCategorieArticle"><?=$service['SER_TYPE']?></option>
                    <?php foreach(getAllServiceCategorieExceptOne($service['SER_TYPE']) as $donneesCategorie): ?>
                      <option name="<?= $donneesCategorie ?>"><?= $donneesCategorie ?></option>

                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <h5>Nom du service: </h5>
                <div class="form-group">
                  <input type="text" class="form-control" id="inputNomM" name="inputNomM" value="<?= $service['SER_NOM'] ?>" placeholder="<?= $service['SER_NOM'] ?>" required>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-lg-6 col-md-12">
                <h5>Prix: </h5>
                <div class="form-group">
                  <input type="number" class="form-control" id="inputPrixM" name="inputPrixM" value="<?= $service['SER_PRIX'] ?>" placeholder="<?= $service['SER_PRIX'] ?>" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <h5>Durée (en minute): </h5>
                <div class="form-group">
                  <input type="number" class="form-control" id="inputTimeM" name="inputTimeM" value="<?= $service['SER_TEMPS_ESTIMATION'] ?>" placeholder="<?= $service['SER_TEMPS_ESTIMATION'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <h5>Description: </h5>
                <div class="form-group">
                  <textarea class="form-control"rows="5" name="inputDescriptionM" id="inputDescriptionM" style="resize: none;" placeholder="<?= $service['SER_DESCRIPTION'] ?>"><?= $service['SER_DESCRIPTION'] ?></textarea>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-12">
                <h5>Sélectionner le/les coiffeurs pouvant effectuer cette prestation: </h5>
                <?php foreach(getAllCoiffeur() as $coiffeur){ 

                    $variable = canCoiffeurDoThisService($coiffeur['COI_ID'], $_GET['idser'])->rowcount();
                    if ($variable  == 1){ ?>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" checked id="<?=$coiffeur["COI_ID"]?>" name="<?=$coiffeur["COI_ID"]?>" value="<?=$coiffeur["COI_ID"]?>">
                        <label for="<?=$coiffeur["COI_ID"]?>"><?=$coiffeur["COI_NOM"] . " " . $coiffeur["COI_PRENOM"]?></label>
                      </div>
                    <?php }else{ ?>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="<?=$coiffeur["COI_ID"]?>" name="<?=$coiffeur["COI_ID"]?>" value="<?=$coiffeur["COI_ID"]?>">
                        <label for="<?=$coiffeur["COI_ID"]?>"><?=$coiffeur["COI_NOM"] . " " . $coiffeur["COI_PRENOM"]?></label>
                      </div>
                    <?php } 
                  
                    }?>

              </div>
            </div>
        <br>
        <div class="modal-footer">
          <a href="liste des prix"><button type="button" name="comeback" class="btn btn-secondary border border-dark" >Fermer</button></a>
          <button type="submit" name="change" class="btn btn-primary">Enregister</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div id ="right" >

</div></div>
</body>



<?php }else{
  ?> <meta http-equiv="refresh" content="0;URL=liste des prix"> <?php
}

}include('includes/footer.php'); ?>







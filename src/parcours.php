
<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */
  $title = "Elysée - Parcours";
  include('includes/header.php');

  if
   (isset($_SESSION["COI_POSTE"])){
    if ($_SESSION["COI_POSTE"] == "Patronne" OR $_SESSION["COI_POSTE"] == "Coiffeur superieur"){
      $modificationPossible = true;
    }
    else{
      $modificationPossible = false;
    }
  }else{
    $modificationPossible = false;
  }


  $coiffeur = isset($_GET["coiffeur"])? getPremierCoiffeur($_GET["coiffeur"]): getPremierCoiffeurID();
  $coiffeurID = $coiffeur["COI_ID"];

  //Pour le coiffeur d'après ou avant
  $coiffeurSuivantID = getPremierCoiffeurID()["COI_ID"];
  $compteur = 0; //une variable permettant le fonctionement de l'algo
  foreach (getAllCoiffeur() as $coiffeur){
    if ($compteur == 1){
      $coiffeurSuivantID = $coiffeur["COI_ID"];
      $compteur = 0;
    }
    if ($coiffeurID == $coiffeur["COI_ID"]){
      $compteur = 1;
    }
  }
 
  $coiffeurAvantID = getDernierCoiffeurID()["COI_ID"];
  $compteur = 0; //une variable permettant le fonctionement de l'algo
  foreach (getAllCoiffeurDesc() as $coiffeur){
    if ($compteur == 1){
      $coiffeurAvantID = $coiffeur["COI_ID"];
      $compteur = 0;
    }
    if ($coiffeurID == $coiffeur["COI_ID"]){
      $compteur = 1;
    }
  }

  if ($modificationPossible){
    if (isset($_POST["Ajouter"])){
      $possibiliteexist=getNbParagraphe($coiffeurID)->rowCount();
      $ordre = $possibiliteexist + 1;
      insertParagraphe($coiffeurID, $_POST["inputTitre"], $_POST["inputDescription"], $ordre);
      echo '<script type="text/javascript">';
      echo  'window.location(parcours?modifie=true&coiffeur='.$coiffeurID.');<\script>';
      echo '</script>'; //header('Location: parcours?modifie=true&coiffeur=' . $coiffeurID);
    }

    /*
    if (isset($_POST["modifier"])){
      if ($_POST["mOrdre"] > 0 && $_POST["mOrdre"] <= getNbParagraphe($coiffeurID)->rowCount()){
      $paragrapheAdeplacer = getParagrapheOrdre($_POST["mOrdre"]);
      $paragrapheCliquer = getParagraphe($_POST["mID"]);
      updateParagrapheOrdre($paragrapheAdeplacer["DES_ID"], $paragrapheCliquer["DES_ORDRE"]);
      updateParagraphe($_POST["mID"], $_POST["mTitre2"], $_POST["mDescription"], $_POST["mOrdre"]);
      echo '<script type="text/javascript">';
      echo  'window.location(parcours?modifie=true&coiffeur='.$coiffeurID.');<\script>';
      echo '</script>';
      }
    }
    */

    if (isset($_POST["Supprimer"])){
      $ordreDuParagrapheSupprimer = getParagraphe($_POST["sID"])["DES_ORDRE"];
      $ordre = $ordreDuParagrapheSupprimer;
      foreach(getParagraphePlusGrandQueXOrdre($coiffeurID, $ordreDuParagrapheSupprimer) as $paragrapheAdeplacer){
        updateParagrapheOrdre($paragrapheAdeplacer["DES_ID"], $ordre);
        $ordre = $ordre + 1;
      }
      deleteParagraphe($_POST["sID"]);
      echo '<script type="text/javascript">';
      echo  'window.location(parcours?modifie=true&coiffeur='.$coiffeurID.');<\script>';
    }

    if (isset($_POST["AjouterDiplome"])){
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
      if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){
        $infosfichier = pathinfo($_FILES['monfichier']['name']); //path info renvois une array donc on stock l'extension dans exension_upload
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        $name = $_POST["nomDiplome"];
        $file = '' .time(). '-' .$name. '.' .$extension_upload;
  
          if (in_array($extension_upload, $extensions_autorisees)){ //On verifie que le fichier fait partis des extensions autorisés
            // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['monfichier']['tmp_name'], 'Ressources/Diplome/' . $file);

            insertDiplome($coiffeurID, $_POST["nomDiplome"], $_POST["dateDiplome"], 'Ressources/Diplome/' . $file);

          }else{
            ?><script>window.alert("L'extension utilisé n'est pas autorisée, les types d'extensions autorisées sont: 'jpg', 'jpeg', 'gif', 'png'");</script><?php
          }
      }else{
        ?><script>window.alert("Une erreur s'est produite");</script><?php
      }
    }

    if (isset($_POST["SupprimerDiplome"])){
      deleteDiplome($_POST["sDiplomeID"]);
      echo '<script type="text/javascript">';
      echo  'window.location(parcours?modifie=true&coiffeur='.$coiffeurID.');<\script>';
      echo '</script>';
    }

    if (isset($_POST["modifierParagraphe"])){

      //Création d'une liste avec tous les différents id des paragraphes
      $listeDesIdParagraphe = array();
      foreach(getAllParagraheCoiffeur($coiffeurID) as $paragraphe):
        $listeDesIdParagraphe[] = $paragraphe["DES_ID"];
      endforeach;
      
      foreach($listeDesIdParagraphe as $id){
        updateParagrapheSansOrdre($id, $_POST["titreParcours-" . $id],  $_POST["texteParcours-" . $id]);
      }

    }

    if (isset($_GET["idParcours-Down"])){
      //Nous augmenton son ordre de 1
      $idDuParagrapheCliquer = $_GET["idParcours-Down"];
      $ordreDuParagrapheCliquer = getParagraphe($idDuParagrapheCliquer)["DES_ORDRE"];

      if ($ordreDuParagrapheCliquer >= 1 AND $ordreDuParagrapheCliquer <= getNbParagraphe($coiffeurID)->rowCount()){
      $idDuParagrapheADeplacerEnHaut = getParagrapheOrdreAvecID($coiffeurID, $ordreDuParagrapheCliquer + 1)["DES_ID"];

        if ($ordreDuParagrapheCliquer + 1 >= 2 AND $ordreDuParagrapheCliquer + 1 <= getNbParagraphe($coiffeurID)->rowCount()){
        updateParagrapheOrdre($idDuParagrapheCliquer, $ordreDuParagrapheCliquer + 1);
        updateParagrapheOrdre($idDuParagrapheADeplacerEnHaut, $ordreDuParagrapheCliquer);
        echo '<script type="text/javascript">';
        echo  'window.location(parcours?modifie=true&coiffeur='.$coiffeurID.');<\script>';
        echo '</script>';
        }
      }
    }

    if (isset($_GET["idParcours-Up"])){
      //Nous diminuons son ordre de 1
      $idDuParagrapheCliquer = $_GET["idParcours-Up"];
      $ordreDuParagrapheCliquer = getParagraphe($idDuParagrapheCliquer)["DES_ORDRE"];

      if ($ordreDuParagrapheCliquer >= 1 AND $ordreDuParagrapheCliquer <= getNbParagraphe($coiffeurID)->rowCount()){
        $idDuParagrapheADeplacerEnBas = getParagrapheOrdreAvecID($coiffeurID, $ordreDuParagrapheCliquer - 1)["DES_ID"];
        if ($ordreDuParagrapheCliquer - 1 >= 1 AND $ordreDuParagrapheCliquer - 1 <= getNbParagraphe($coiffeurID)->rowCount()){
        updateParagrapheOrdre($idDuParagrapheCliquer, $ordreDuParagrapheCliquer -1);
        updateParagrapheOrdre($idDuParagrapheADeplacerEnBas, $ordreDuParagrapheCliquer);
        echo '<script type="text/javascript">';
        echo  'window.location(parcours?modifie=true&coiffeur='.$coiffeurID.');<\script>';
        echo '</script>';
        }
      }
    }
  }

  if(isset($_GET['modifie'])&& isset($_GET['modifphoto']))
  {
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['photocoiffeur']) AND $_FILES['photocoiffeur']['error'] == 0){
          $coiffeur = getOneCoiffeurID($_GET['coiffeur']);
          $infosfichier = pathinfo($_FILES['photocoiffeur']['name']); //path info renvois une array donc on stock l'extension dans exension_upload
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
          $name = $coiffeur['COI_NOM'];
          $file = '' .time(). '-' .$name. '.' .$extension_upload;
    
            if (in_array($extension_upload, $extensions_autorisees)){ //On verifie que le fichier fait partis des extensions autorisés
              // On peut valider le fichier et le stocker définitivement
              move_uploaded_file($_FILES['photocoiffeur']['tmp_name'], 'Ressources/Photo de profil/' . $file);
              modifierPhotoCoiffeur($coiffeur['COI_ID'], 'Ressources/Photo de profil/' .$file);
              
            }else{
              ?><script>window.alert("L'extension utilisé n'est pas autorisée, les types d'extensions autorisées sont: 'jpg', 'jpeg', 'gif', 'png'");</script><?php
            }
        }

  }

  $coiffeur = isset($_GET["coiffeur"])? getPremierCoiffeur($_GET["coiffeur"]): getPremierCoiffeurID();
  $coiffeurID = $coiffeur["COI_ID"];

?>


<body style="background-color: #fed136;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12" style="background-color: #303030">
        <br>
          <div class="row" style="margin-bottom: 3%; margin-top: 1%;">
            <a href="parcours?coiffeur=<?=$coiffeurSuivantID?>" class="fas fa-chevron-right middleRight"></a>
            <a href="parcours?coiffeur=<?=$coiffeurAvantID?>" class="fas fa-chevron-left middleLeft"></a>
            <div class="col-lg-3 col-sm-12 photoCoiffeurParcours" style="height: 550px; margin-left: 3%; background-image: url(<?="'" . $coiffeur["COI_PHOTO"] . "'"?>);
             background-position: center; background-repeat: no-repeat; background-size: cover;">
            
            <?php if (isset($_GET["modifie"]) && $modificationPossible){ //Vision du coiffeur
              
              /**
               * ! CHANGEMENT PHOTO ICI POUR COIFFEUR
               */
              ?>
              <form method="POST" action="parcours?coiffeur=<?=$coiffeurID?>&modifie=true&modifphoto=true" enctype="multipart/form-data">
            <input type="file" name="photocoiffeur" style="opacity: 0.4;">
            <button type="submit" class="btn btn-primary text-center" style="opacity:0.4;">Changer</button>
            <?php } ?>
            </div>

            <div class="col-lg-8 col-sm-12 descriptionParcours">
            <br>
            <h3 class="text-white"><?=$coiffeur["COI_PRENOM"] . " " . $coiffeur["COI_NOM"]?></h3>
            
              <?php foreach(getAllParagraheCoiffeur($coiffeur["COI_ID"]) as $paragrapheCoiffeur):?>
                <?php if (isset($_GET["modifie"]) && $modificationPossible){ //Vision du coiffeur?>
                  <div class="row">
                    <div class="col-4">
                      <input style="background-color: #303030;" type="text" class="form-control text-white border border-warning" id="titreParcours-<?=$paragrapheCoiffeur["DES_ID"]?>" name="titreParcours-<?=$paragrapheCoiffeur["DES_ID"]?>" value="<?=$paragrapheCoiffeur["DES_TITRE"]?>">
                    </div>
                    <div class="col-6">
                    <div style="float: left;">
                        <?php if ($paragrapheCoiffeur["DES_ORDRE"] == 1){?>
                          <a href="parcours?coiffeur=<?=$coiffeurID?>&modifie=true&idParcours-Down=<?=$paragrapheCoiffeur["DES_ID"]?>" class="fas fa-arrow-down text-white arrowUpAndDown"></a>
                        <?php }elseif ($paragrapheCoiffeur["DES_ORDRE"] == getNbParagraphe($coiffeurID)->rowCount()){ ?>
                          <a href="parcours?coiffeur=<?=$coiffeurID?>&modifie=true&idParcours-Up=<?=$paragrapheCoiffeur["DES_ID"]?>" class="fas fa-arrow-up text-white arrowUpAndDown"></a>
                        <?php }else {?>
                          <a href="parcours?coiffeur=<?=$coiffeurID?>&modifie=true&idParcours-Up=<?=$paragrapheCoiffeur["DES_ID"]?>" class="fas fa-arrow-up text-white arrowUpAndDown"></a>
                          <a href="parcours?coiffeur=<?=$coiffeurID?>&modifie=true&idParcours-Down=<?=$paragrapheCoiffeur["DES_ID"]?>" class="fas fa-arrow-down text-white arrowUpAndDown"></a>
                        <?php } ?>
                        <a onclick="donneesSupprimerParagraphe('<?=$paragrapheCoiffeur['DES_TITRE']?>', '<?=$paragrapheCoiffeur['DES_ID']?>') <?php $idParagraphe = $paragrapheCoiffeur['DES_ID']?>" class="far fa-trash-alt text-white" data-toggle="modal" data-target="#SupprimerParagraphe"></a>
                    </div>
                  </div>
                  </div>
                  <div class="row" style="margin-top: 1%; margin-bottom: 2%; ">
                    <div class="col-12">
                      <textarea name="texteParcours-<?=$paragrapheCoiffeur["DES_ID"]?>" id="texteParcours-<?=$paragrapheCoiffeur["DES_ID"]?>"class="form-control text-white overflow-hidden border border-warning" rows="1" style="resize: none; background-color: #303030;"><?=$paragrapheCoiffeur['DES_TEXTE']?></textarea>
                      <script src='dist/autosize.js'></script>
                      <script>
                        autosize(document.querySelectorAll('textarea'));
                      </script>
                    </div>
                  </div>
                <?php } else{ //vision du visteur?>
                  <h4 class="text-white"><?=$paragrapheCoiffeur["DES_TITRE"]?></h4>
                  <textarea class="form-control text-white overflow-hidden" rows="1" disabled="true" style="resize: none; background-color: #303030; margin-left: -22px; margin-top: -20px;"><?=$paragrapheCoiffeur['DES_TEXTE']?></textarea>
                  <script src='dist/autosize.js'></script>
                  <script>
                    autosize(document.querySelectorAll('textarea'));
                  </script>
                <?php } 
              endforeach;?>  
                
                <?php if (getNbParagraphe($coiffeurID)->rowCount()>= 1 && isset($_GET["modifie"]) && $modificationPossible){ ?>
                  <button type="submit" name="modifierParagraphe" class="btn btn-light border border-dark float-right">Modifier</button>
                <?php } ?>
          
            </form>              


              <?php if (isset($_GET["modifie"]) && $modificationPossible){ ?>
                <span data-toggle="modal" data-target="#AjouterParagraphe" class="text-danger" style="font-size: 80%;"><i class="far fa-plus-square"></i> Ajouter un paragraphe</span>
              <?php } ?>
            
            </div>
          </div>
        </div> 
                
        <?php if ($modificationPossible){ ?>
          <div class="row" style="margin: auto; margin-top: 3%;">
            <?php if (!isset($_GET["modifie"])){ ?>
              <div class="col-3">
                <a href="parcours?modifie=true&coiffeur=<?=$coiffeurID?>">
                  <button class="btn btn-light border border-dark" style="width: 300px; margin-left: -50%;">Modifier</button>
                </a>
              </div>
            <?php } else{?>
              <div class="col-3">
                <a href="parcours?coiffeur=<?=$coiffeurID?>">
                  <button class="btn btn-light border border-dark" style="width: 300px; margin-left: -50%;">Partir du mode "Modification"</button>
                </a>
              </div>
            <?php }?>
            <div class="col-3 offset-3">
              <button data-toggle="modal" data-target="#AjouterDiplome" class="btn btn-light border border-dark" style="width: 300px; margin-left: 50%;">Ajouter un diplome</button>
            </div>
          </div>
        <?php } ?>

        <?php if (getNBDiplome($coiffeurID)->rowCount() >= 1){ ?>
          <div class="col-lg-10 col-sm-12 border border-dark rounded radiusCorner" style="margin: auto; margin-top: 3%; background-color: #303030;">
            <br>
            <h2 class="text-center text-white" >Diplôme</h2>
            <br>
            <div class="row">
              <?php foreach(getAllDiplomeCoiffeur($coiffeurID) as $diplome): ?>
                <div class="col-lg-4 col-sm-6 col-xs-6" style="margin-bottom: 3%;">
                  <div onclick="ouvertureDiplome('<?=$diplome['DIP_PHOTO']?>', '<?=$diplome['DIP_NOM']?>')" id="myImg" data-toggle="modal" data-target="#myModal" class="border border-dark text-center">
                    <img src="<?=$diplome["DIP_PHOTO"]?>" alt="<?=$diplome["DIP_NOM"]?>" class="imageDiplome" >
                  </div>
                  <?php if (isset($_GET["modifie"]) && $modificationPossible){ ?>
                    <i onclick="donneesSupprimerDiplome('<?=$diplome['DIP_NOM']?>', '<?=$diplome['DIP_ID']?>')" class="far fa-trash-alt bottomright text-white" data-toggle="modal" data-target="#SupprimerDiplome"></i>
                  <?php } ?>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
</body>



<br>
<?php include('includes/footer.php');?>

<!-- The Modal -->
<div id="myModal" data-backdrop="false" class="modal">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <img class="modal-content" id="img01">
  <div id="captionModal" class="text-center text-white"></div>
  <br>
</div>



<div class="modal fade bd-example-modal-lg" data-backdrop="false" id="AjouterParagraphe" tabindex="-1" role="dialog" aria-labelledby="AjouterParagraphe" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AjouterParagraphe">Ajouter un paragraphe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="parcours?coiffeur=<?=$coiffeurID?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <h5>Nom du paragraphe: </h5>
                <div class="form-group">
                  <input type="text" class="form-control" id="inputTitre" name="inputTitre">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-12">
                <h5>Description: </h5>
                <div class="form-group">
                  <textarea class="form-control"rows="10" name="inputDescription" id="inputDescriptionM" style="resize: none;" placeholder="Description"></textarea>
                </div>
              </div>
            </div>
        <br>
        
        <div class="modal-footer">
          <input id="service_id" name="service_id" type="text" value="" hidden="true">
          <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
          <button type="submit" name="Ajouter" class="btn btn-primary">Ajouter</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" data-backdrop="false" id="ModifierParagraphe" tabindex="-1" role="dialog" aria-labelledby="ModifierParagraphe" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModifierParagraphe">Modifier <span id="mTitre"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="parcours?coiffeur=<?=$coiffeurID?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <h5>Nom du paragraphe: </h5>
                <div class="form-group">
                  <input type="text" class="form-control" id="mTitre2" name="mTitre2">
                </div>
              </div>
            
            <div class="col-lg-6 col-md-6">
                <h5>Ordre: </h5>
                <div class="form-group">
                  <select id="mOrdre" name="mOrdre" class="form-control" required>
                    <?php for($c = 1; $c<=$nbOrdre; $c++): ?>
                      <option name="c"><?=$c?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h5>Description: </h5>
                <div class="form-group">
                  <textarea class="form-control"rows="10" name="mDescription" id="mDescription" style="resize: none;"></textarea>
                </div>
              </div>
            </div>
        <br>
        
        <div class="modal-footer">
          <input id="mID" name="mID" type="text" value="" hidden="true">
          <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
          <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" data-backdrop="false" id="SupprimerParagraphe" tabindex="-1" role="dialog" aria-labelledby="SupprimerParagraphe" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModifierParagraphe">Supprimer <span id="sTitre"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="parcours?coiffeur=<?=$coiffeurID?>">
            Êtes-vous sur de supprimer ?
        </div>
        <div class="modal-footer">
          <input id="sID" name="sID" type="text" value="" hidden="true">
          <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
          <button type="submit" name="Supprimer" class="btn btn-primary">Supprimer</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" data-backdrop="false" id="AjouterDiplome" tabindex="-1" role="dialog" aria-labelledby="AjouterDiplome" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModifierParagraphe">Ajouter un diplôme <span id="mTitre"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="parcours?coiffeur=<?=$coiffeurID?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <h5>Nom du diplôme: </h5>
                <div class="form-group">
                  <input type="text" class="form-control" id="nomDiplome" name="nomDiplome" required>
                </div>
              </div>
            
            <div class="col-lg-6 col-md-6">
                <h5>Date: </h5>
                <div class="form-group">
                  <input type="date" class="form-control" id="dateDiplome" name="dateDiplome" required>
                </div>
              </div>
            </div>
            <br>
            <div class="col-12">
              <div class="custom-file">
                <input type="file" name="monfichier" /><br />
              </div>
            </div>
        <br>    
        <div class="modal-footer">
          <input id="mID" name="mID" type="text" value="" hidden="true">
          <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
          <button type="submit" name="AjouterDiplome" class="btn btn-primary">Ajouter</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" data-backdrop="false" id="SupprimerDiplome" tabindex="-1" role="dialog" aria-labelledby="SupprimerDiplome" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModifierParagraphe">Supprimer <span id="sDiplomeTitre"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="parcours?coiffeur=<?=$coiffeurID?>">
            Etes vous sur de supprimer ?
        </div>
        <div class="modal-footer">
          <input id="sDiplomeID" name="sDiplomeID" type="text" value="" hidden="true">
          <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
          <button type="submit" name="SupprimerDiplome" class="btn btn-primary">Supprimer</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

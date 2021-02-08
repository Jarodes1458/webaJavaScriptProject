<?php 
/** 
 * * Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */

$title = "Elysée - Boutique";
include('includes/header.php');

if (isset($_SESSION["COI_POSTE"])){
  if ($_SESSION["COI_POSTE"] == "Patronne" OR $_SESSION["COI_POSTE"] == "Coiffeur superieur" ){
    $modificationPossible = true;
  }
  else{
    $modificationPossible = false;
  }
}else{
  $modificationPossible = false;
}

if($modificationPossible){
  if(isset($_GET['idSupp']))
  {
    if(!empty(getOneArticleID($_GET['idSupp'])))
    {
      suppressionLogiqueArticle($_GET['idSupp']);
        ?> <meta http-equiv="refresh" content="0;URL=boutique"> <?php

    }
    }

  if(isset($_POST['add']))
  {
    if(!empty($_POST['inputCategorieAdd']) && !empty($_POST['inputNomAdd']) && !empty($_POST['inputPrixAdd']) &&
      !empty($_POST['inputQteAdd']) && !empty($_POST['inputMarqueAdd']) && !empty($_POST['inputDescriptionAdd']))
      {
        $listeCate = getAllArticleCategorie();
        foreach($listeCate as $cle => $valeur)
        {
          if($_POST['inputCategorieAdd'] == $valeur)
          {
            $existe = 'oui';
          }
        }
        if(isset($existe)){
        addProduit($_POST['inputNomAdd'], $_POST['inputPrixAdd'], $_POST['inputMarqueAdd'], $_POST['inputQteAdd'], $_POST['inputDescriptionAdd'], $_POST['inputCategorieAdd']);
        $set = 'set';
        }
      

      /* Ajouter des images*/
      for($c = 1; $c <=5; $c++):
        if (!empty($_FILES['monfichierAjouter-' . $c]) AND $_FILES['monfichierAjouter-' . $c]['error'] == 0 && isset($set)){
          $infosfichier = pathinfo($_FILES['monfichierAjouter-' . $c]['name']); //path info renvois une array donc on stock l'extension dans exension_upload
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
          $name = $_POST['inputNomAdd'];
          $file = '' .time(). '-' .$name. '-' . $c . '.' .$extension_upload;
  
            if (in_array($extension_upload, $extensions_autorisees)){ //On verifie que le fichier fait partis des extensions autorisés
              // On peut valider le fichier et le stocker définitivement
              move_uploaded_file($_FILES['monfichierAjouter-' . $c]['tmp_name'], 'Ressources/Boutique/' . $file);
  
              
              ajouterImageArticle(getLastArticle()["maximum"],'Ressources/Boutique/' . $file);
              
              //A faire
            }
        }
      endfor;
  }
  } 

  if(isset($_POST['change']))
  {
    if(!empty(getOneArticleID($_GET['id'])))
    {
      $article = getOneArticleID($_GET['id']);
      if(!empty($article)){
      
      $id = $article['ART_ID'];
      if(isset($_POST['inputNom']))
      {
        $nom = $_POST['inputNom'];
      }
      else
      {
        $nom = $article['ART_NOM'];
      }
      
      if(!empty($_POST['inputPrix']))
      {
        $prix = $_POST['inputPrix'];
      }
      else
      {
        $prix = $article['ART_PRIX'];
      }

      if(!empty($_POST['inputMarque']))
      {
        $marque = $_POST['inputMarque'];
      }
      else
      {
        $marque = $article['ART_MARQUE'];
      }

      if(!empty($_POST['inputQte']))
      {
        $qte = $_POST['inputQte'];
      }
      else
      {
        $qte = $article['ART_QTE_STOCK'];
      }

      if(!empty($_POST['inputDescription']))
      {
        $descrip = $_POST['inputDescription'];
      }
      else
      {
        $descrip = $article['ART_DESCRIPTION'];
      }

      if(!empty($_POST['inputCategorie']))
      {
        $categorie = $_POST['inputCategorie'];
      }
      else
      {
        $categorie = $article['ART_CATEGORIE'];
      }
      
      $compteur = 1;
      foreach(getAllImgArticle($article['ART_ID']) as $photo):
        if (!empty($_FILES['monfichier-' . $photo["IMG_ID"]]) AND $_FILES['monfichier-' . $photo["IMG_ID"]]['error'] == 0){
          $infosfichier = pathinfo($_FILES['monfichier-' . $photo["IMG_ID"]]['name']); //path info renvois une array donc on stock l'extension dans exension_upload
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
          $name = $_POST['inputNom'];
          $file = '' .time(). '-' .$name. '-' . $compteur . '.' .$extension_upload;

            if (in_array($extension_upload, $extensions_autorisees)){ //On verifie que le fichier fait partis des extensions autorisés
              // On peut valider le fichier et le stocker définitivement
              move_uploaded_file($_FILES['monfichier-' . $photo["IMG_ID"]]['tmp_name'], 'Ressources/Boutique/' . $file);

              modifierImageArticle($id, $photo["IMG_ID"],'Ressources/Boutique/' . $file);
            }else{
              ?><script>window.alert("L'extension utilisé n'est pas autorisée, les types d'extensions autorisées sont: 'jpg', 'jpeg', 'gif', 'png'");</script><?php
            }
            $compteur++;
        }
      endforeach;


      for($i = 0; $i < 10; $i++){}
      if (!empty($_FILES['monfichierAjouter']) AND $_FILES['monfichierAjouter']['error'] == 0){
        $infosfichier = pathinfo($_FILES['monfichierAjouter']['name']); //path info renvois une array donc on stock l'extension dans exension_upload
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        $name = $_POST['inputNom'];
        $file = '' .time(). '-' .$name. '-' . $compteur . '.' .$extension_upload;

          if (in_array($extension_upload, $extensions_autorisees)){ //On verifie que le fichier fait partis des extensions autorisés
            // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['monfichierAjouter']['tmp_name'], 'Ressources/Boutique/' . $file);

            
            ajouterImageArticle($id,'Ressources/Boutique/' . $file);
            
            //A faire
          }else{
            ?><script>window.alert("L'extension utilisé n'est pas autorisée, les types d'extensions autorisées sont: 'jpg', 'jpeg', 'gif', 'png'");</script><?php
          }
          $compteur++;
      }

      $listeCate = getAllArticleCategorie();
      foreach($listeCate as $cle => $valeur)
      {
        if($_POST['inputCategorie'] == $valeur)
        {
          $existe = 'oui';
        }
      }
      if(isset($existe)){
      modifierUnArticle($id,$nom,$prix,$marque,$qte,$descrip,$categorie);
      }
    }
    }

  }
}
if(!isset($_POST['btnmodif'])){

?>
  

<html>

<body style="background-color: #fed136;">
  
<div class="container-fluid" style="padding-left: 5%; padding-right: 5%">

<div class="jumbotron" style="background-color: #fed136;margin-bottom:-2%">
<h1 class="display-5 text-center" style="font-size: 170%">Bienvenue dans la boutique du Salon de Coiffure Elysée</h2>
  <p class="lead text-center" style="font-size: 110%">Tous les produits présentés ci-dessous sont uniquement disponible dans notre salon!</p>
  <hr class="my-6">
</div>
  <div class="row" style="padding-top: 1%; margin-bottom: 2%; margin-left:0.01%">
    <form id="form1" class="example" action="boutique">
      <input type="text" placeholder="Search.." name="search">
      <?php if(isset($_GET['filter'])){ ?> <input type="text" hidden="true" name="filter" value="<?= $_GET['filter'] ?>"><?php } ?>
      <button type="submit" class="btn-outline"><i class="fa fa-search"></i></button>

      <span class="transparant">_</span>
      <button type="button" class="btn-outline" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-filter" aria-hidden="true"></i>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php foreach(getAllArticleCategorie() as $donnees){ ?>
        <a href="boutique?search=<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>&filter=<?= $donnees?>" 
        class="dropdown-item" type="button"><?= $donnees?>
        </a>
      <?php } ?> 
      <?php if($modificationPossible){ ?>
        <a href="boutique?Inactif=set" 
        class="dropdown-item couleurRouge" type="button">Inactif
        </a>
      <?php } ?>
      </div>
    </form>

    <form action="boutique">
      <span class="transparant">_-</span>
        <button class=" btn-outline" role="button" name="reset" ><i class="fa fa-eraser" aria-hidden="true"></i></button>
          <?php if($modificationPossible){ ?>
          <span class="transparant">_</span>
        <button type="button" class="btn-customLightBlue" data-toggle="modal" data-target="#AjouterProduit" role="button" name="modif" value="ptnModif">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </button>
        <?php } ?>
    </form>
 </div>


        <div class="row">
        <?php 
        if(!isset($_GET['search']) && !isset($_GET['Inactif'])){
        foreach(getAllArticleActif() as $donnees){ ?>
            <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 1%;">
              <?php include('affichageAllArt.php'); ?>
            </div>

        <?php }} ?>
        
        

        
        <?php
        if(!empty($_GET['search']) && empty($_GET['filter'])){  ?>
        <?php foreach(getAllArticleActifSearch($_GET['search']) as $donnees){
          $_SESSION['search'] = $_GET['search'];?>
          <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 1%;">
            <?php include('affichageAllArt.php'); ?>
          </div>
          <?php }} ?><?php
        
        if(isset($_GET['filter']) && empty(['search'])){
        foreach(getAllArticleWhereCategorieIs($_GET['filter']) as $donnees){ ?>       
          
          <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 1%;">
            <?php include('affichageAllArt.php'); ?>
          </div>

          <?php }} ?> <?php



          if(isset($_GET['filter']) && !empty(['search']))
          {
            foreach(getAllArticleWhereCategorieAndNameAre($_GET['filter'],$_GET['search']) as $donnees){ ?>           
              <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 1%;">
                <?php include('affichageAllArt.php'); ?>
              </div>

              <?php }} ?>
        </div>

      
      <div class="row">
      <?php
      if(isset($_GET['Inactif']))
          {
            foreach(getAllArticleInactif() as $donnees) { ?>
              <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 1%;">
                <?php include('affichageAllArt.php'); ?>
              </div>

              <?php }} ?>
                </div>
            <?php }
      /*
      <!-- -----------------------------AJOUTER PRODUIT---------------------------------------------------------- --->
      */ ?>
      </div>  


      
      <form id="ajout" action="boutique" method="post" enctype="multipart/form-data">
      <div class="modal fade bd-example-modal-lg" data-backdrop="false" id="AjouterProduit" tabindex="-1" role="dialog" aria-labelledby="AjouterProduit" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AjouterProduit"><span id="nomDeLarticle"></span> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <br>
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <h6>Catégorie : </h6>
                  <div class="form-group">
                    
                  <select id="" name="inputCategorieAdd" class="form-control">
                      <?php foreach(getAllArticleCategorie() as $donneesCategorie): ?>
                        
                        <option name="<?= $donneesCategorie ?>"required><?= $donneesCategorie ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-lg-6 col-md-12">
                  <h6>Nom : </h6>
                  <div class="form-group">
                    <input type="text" class="form-control" id="" name="inputNomAdd"required>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-3 col-md-12">
                  <h6>Prix : </h6>
                  <div class="form-group">
                    <input type="number" class="form-control" id="" name="inputPrixAdd" placeholder=""required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-12">
                  <h6>Quantité : </h6>
                  <div class="form-group">
                    <input type="number" class="form-control" id="" name="inputQteAdd" placeholder=""required>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <h6>Marque : </h6>
                  <div class="form-group">
                    <input type="text" class="form-control" id="" name="inputMarqueAdd" placeholder="" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <h6>Description : </h6>
                  <div class="form-group">
                    <textarea class="form-control"rows="5" name="inputDescriptionAdd" id="" style="resize: none;" required></textarea>
                  </div>
                </div>
              </div>

              <p class="font-weight-bold">Ajouter image</p>
              <div class="col-12" style="margin-top: 2%;">
                <div class="custom-file">
                  <!--<input type="file" name="monfichier2" /><br />-->
                  <input type="file" id="customFile" name="monfichierAjouter-1" onclick="createNewInputFile()" required />
                </div>
                <div id="newElementId"></div> 
                
              </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
            <button type="submit" name="add" class="btn btn-primary">Enregister</button>
          </div>
          </form>
        </div>
      </div>
      </div>
      </div>
      </div>

</body>
</html>






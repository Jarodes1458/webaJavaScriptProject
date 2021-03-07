<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */

  $title = "Elysée - Liste des coiffeurs";
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

  if(isset($_GET['id']) && $modificationPossible)
  {
    $coiffeurAModif = getOneCoiffeurID($_GET['id']);
    $message = 'Modification du coiffeur : <br> '. $coiffeurAModif['COI_NOM'] . " " . $coiffeurAModif['COI_PRENOM'];
  }
  else{
    $message = 'Liste des coiffeurs du salon ';
  }
?>
<br>
<div class="container margin-auto text-center">

<br>
<h1 class="text-center"><?= $message ?></h1>

<?php

if(isset($_GET['idmodif']) && isset($_POST['change'])){
if($modificationPossible)
  {
      modifierUnCoiffeurForPatronne($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['num'],$_POST['poste'],$_GET['idmodif']);
    echo  '<meta http-equiv="refresh" content="0;url=listecoiffeur?msg=true"/>';
  }
}


if(isset($_GET['suppr']) && $modificationPossible)
{
  Suppresiondefinitivecoiffeur($_GET['id']);
  echo  '<meta http-equiv="refresh" content="0;url=listecoiffeur?msg=true"/>';
}

if(isset($_GET['msg'])){
  ?> <span class="text-center couleurVerte">Information modifiées</span> <?php 
}

if(!isset($_GET['modif']) && isset($_SESSION['COI_MAIL'])){

?>


<body style="background-color: white;">
<br>
  <div class="container-fluid" style="margin:auto"> 
  <table id="dtBasicExample" class="table table-striped table-responsive-sm" style="font-size: 60%;">
      <thead class="thead-dark">
        <tr>
          <th scope="th-sm"><h4 class="text-white">Nom</h4></th>
          <th scope="th-sm"><h4 class="text-white">Prénom</h4></th>
          <th scope="th-sm"><h4 class="text-white">Email</h4></th>
          <th scope="th-sm"><h4 class="text-white">téléphone</h4></th>
          <?php 
          if($modificationPossible){?>
            <th scope="th-sm"><h4 class="text-white">Action</h4></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php 
            foreach(getAllCoiffeur() as $coiffeur){ ?>
            <tr>
            <td><?= $coiffeur['COI_NOM'] ?></td>
              <td><?= $coiffeur['COI_PRENOM'] ?></td>
              <td><?= $coiffeur['COI_MAIL'] ?></td>
              <td><?= $coiffeur['COI_NUMTEL'] ?></td>
              <?php if($modificationPossible){?>
                <td>
                  <a class="fa fa-calendar" href="DefinirCoiffeurHoraires?Calendar=true&id=<?= $coiffeur['COI_ID'] ?>"></a>
                  <a class="far fa-edit" href="listecoiffeur?modif=true&id=<?= $coiffeur['COI_ID'] ?>"></a>
                  <a class="fa fa-trash" href="listecoiffeur?suppr=true&id=<?= $coiffeur['COI_ID'] ?>"></a>
                </td>
              <?php } ?>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>


//https://www.w3schools.com/howto/howto_js_filter_table.asp
//https://morioh.com/p/51dbc30377fc
//https://codepen.io/chriscoyier/pen/tIuBL




    <script>
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
      });
  </script>


<script>


</script>





  <?php if ($modificationPossible){ ?>
      <div class="row" style="margin-left: 1%;">
        <a  href="CreerCoiffeur"  class="btn btn-light border border-dark" style="margin-right:2%" >Ajouter un coiffeur</a> 
        <a  href="listecoiffeurSupprimer"class="btn btn-light border border-dark" >Afficher la liste des coiffeurs supprimé</a> 
      </div>
  <?php } ?>
  <div class="row" style="margin-left:1%;margin-top:3%;margin-bottom:10%">
      <a href="ModifierInfo.php" class="btn btn-light border border-dark">Modifier mes Informations personnelles</a>
      </div>
  </body>

<?php } 




elseif (isset($_GET['modif']) && isset($_SESSION['COI_MAIL']) || $modificationPossible){ ?>
<div class="container-fluid">
<form action="listecoiffeur?idmodif=<?= $_GET['id']?>" method="post">
<?php $coiffeur = getOneCoiffeurID( $_GET['id']); ?>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModifierService">Modifier <span id="nomDuService"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <br>
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <h5>Nom du coiffeur: </h5>
                <div class="form-group">
                  <input type="text" class="form-control" name="nom" value="<?= $coiffeur['COI_NOM'] ?>" placeholder="<?= $coiffeur['COI_NOM'] ?>">
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <h5>Prénom du coiffeur: </h5>
                <div class="form-group">
                  <input type="text" class="form-control" name="prenom" value="<?= $coiffeur['COI_PRENOM'] ?>" placeholder="<?= $coiffeur['COI_PRENOM']?>">
                </div>
              </div>
            </div>


            <div class="row">
            <div class="col-lg-6 col-md-12">
                <h5> E-mail :</h5>
                <div class="form-group">
                  <input type="email" class="form-control" name="mail" value="<?= $coiffeur['COI_MAIL'] ?>" placeholder="<?= $coiffeur['COI_MAIL'] ?>">
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <h5> Numéro téléphone :</h5>
                <div class="form-group">
                  <input type="number" class="form-control" name="num" value="<?= $coiffeur['COI_NUMTEL'] ?>" placeholder="<?= $coiffeur['COI_NUMTEL'] ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <?php if($modificationPossible){ ?>
              <div class="col-lg-6 offset-3 col-md-6" style="margin-bottom: 2%;">
                <h5>Poste :</h5>
                <select id="poste" name="poste" class="form-control">
                    <option value="<?= $coiffeur['COI_POSTE'] ?>"><?= $coiffeur['COI_POSTE'] ?></option>
                    <?php foreach(getAllPosteCoiffeurExceptOne($coiffeur['COI_POSTE'])as $cle => $valeur){?>
                    <option value="<?= $valeur ?>"><?= $valeur ?></option>
                    <?php } ?>
                  </select>
              </div>
                    <?php } ?>
            </div>
            </div>
            <div class="modal-footer">
              <a href="listecoiffeur"><button type="button" name="comeback" class="btn btn-secondary border border-dark" >Retour</button></a>
            </div>
            <button type="submit" name="change" class="btn btn-primary" style="margin-right:82%">Enregister</button>
            </div>
            </div>
        </form>
</div>
        
<?php }else{ ?>
<script>
  window.location.href = "index";
</script>
<?php } ?>

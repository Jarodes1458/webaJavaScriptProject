<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */

  $title = "Elysée - Liste des coiffeurs";
  include('includes/header.php'); 
  if(isset($_GET['idmodif']) && isset($_POST['change'])){
    if(getOneCoiffeurID($_GET['idmodif'])['COI_MAIL'] == $_SESSION['COI_MAIL'])
    {
        $coiffeurAModif = getOneCoiffeurID($_GET['idmodif']);
        if(!empty($_POST['Lastmdp'])){
        if(sha1($_POST['Lastmdp']) == $coiffeurAModif['COI_MDP']){
          $mdp = sha1($_POST['mdp']);
        }
        else{
          $mdp = $coiffeurAModif['COI_MDP'];
          $error="<div class=\"alert alert-danger\" role=\"alert\">
                        Mot de passe Incorrect!
                    </div>"; 
          $mauvaismdp = 'set';
        }
      }
      if(empty($_POST['Lastmdp']))
      {
      $mdp = $coiffeurAModif['COI_MDP'];
      }
      if(!isset($mauvaismdp)){
      modifierUnCoiffeurForCoiffeur($_POST['nom'],$_POST['prenom'],strtolower($_POST['mail']),$mdp,$_POST['num'],$_GET['idmodif']);
      echo  '<meta http-equiv="refresh" content="0;url=listecoiffeur?msg=true"/>';
    }
    }
}
  ?>
  <div class="container-fluid" >
    <form action="ModifierInfo?idmodif=<?= $_SESSION['COI_ID']?>" method="post"  style="width:100%;margin:auto;margin-top:7%" >
    <?php 
    $coiffeur= getOneCoiffeurID($_SESSION['COI_ID']);
    ?>
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content" >
                <div class="modal-header">
                <h5 class="modal-title" id="ModifierService">Modifier Mes Informations Personnelles <span id="nomDuService"></h5>
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
                        <div class="col-lg-6 col-md-12">
                            <h5> Ancien mot de passe :</h5>
                            <div class="form-group">
                            <input type="password" class="form-control" name="Lastmdp" value="" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5> Mot de passe :</h5>
                            <div class="form-group">
                            <input type="password" class="form-control" name="mdp" value="" placeholder="Mot de passe">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <a href="listecoiffeur"><button type="button" name="comeback" class="btn btn-secondary border border-dark" >Retour</button></a>
                </div>
                <button type="submit" name="change" class="btn btn-primary">Enregister</button>
                <?php
        if(isset($error)){
            echo $error;
        }
        ?>
                </div>
               
            </div>
           
        </div>
    </form>
 
</div>
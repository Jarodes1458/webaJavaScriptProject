<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */
  $title = "Elysée - Liste des coiffeurs";
  include('includes/header.php'); 

  if(isset($_POST['AjouterCoiffeur']) AND isset($_SESSION['COI_POSTE']))
    {
        
        if(!empty($_POST['Mdp1'])){
        if(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
        $Coi_MailAndTel_Exist = getAllCoiffeurWhereMailAndTel($_POST['mail'],$_POST['num'])->rowCount();
        if($Coi_MailAndTel_Exist >=1){
            $error="<div class=\"alert alert-danger\" role=\"alert\">
                              Ce mail ou ce numéro de téléphone existe déjà veuillez recommencer
                          </div>"; 
        }
        else{
            if(sha1($_POST['Mdp1']) == sha1($_POST['Mdp2'])){
                $mdp = sha1($_POST['Mdp1']);
              }
              else{
                $error="<div class=\"alert alert-danger\" role=\"alert\">
                              les deux mot de passe ne correspondent pas !
                          </div>"; 
                $MdpDontCorrespond = 'set';
              }
              if(!isset($MdpDontCorrespond)){
                AjouterunCoiffeur($_POST['nom'],$_POST['prenom'],strtolower($_POST['mail']),$mdp,$_POST['num'],$_POST['poste']);
                echo  '<meta http-equiv="refresh" content="0;url=listecoiffeur?"/>';
              }
        }
       }
       else{
        $error="<div class=\"alert alert-danger\" role=\"alert\">
        Ceci n'est pas un mail Valide !
       </div>"; 
       }
      }
     
  }
  if(isset($_SESSION['COI_POSTE'])){
      if($_SESSION['COI_POSTE']=='Patronne'){
        ?>
<div class="container-fluid">
    <form action="CreerCoiffeur?<?=$_SESSION['COI_POSTE']?>" method="post"  style="width:100%;margin:auto;margin-top:7%" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="AjouterCoiffeur">Ajouter un Coiffeur <span id="">
                </h5>
                </div>
                <div class="modal-body text-center">
                <br>
                    <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <h5>Nom du coiffeur: </h5>
                        <div class="form-group">
                        <input type="text" class="form-control" name="nom" value="" placeholder="Obligatoire" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h5>Prénom du coiffeur: </h5>
                        <div class="form-group">
                        <input type="text" class="form-control" name="prenom" value="" placeholder="Obligatoire" >
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <h5> E-mail :</h5>
                            <div class="form-group">
                            <input type="email" class="form-control" name="mail" value="" placeholder="Obligatoire" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5> Numéro téléphone :</h5>
                            <div class="form-group">
                            <input type="text" class="form-control" name="num" value="" placeholder="Obligatoire" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <h5> Mot de passe :</h5>
                            <div class="form-group">
                            <input type="password" class="form-control" name="Mdp1" value="" placeholder="Mot de passe" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5> Confirmation :</h5>
                            <div class="form-group">
                            <input type="password" class="form-control" name="Mdp2" value="" placeholder="Mot de passe" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
              <?php if(isset($_SESSION['COI_POSTE'])){ ?>
              <div class="col-lg-6 offset-3 col-md-6" style="margin-bottom: 2%;">
                <h5>Poste :</h5>
                <select id="poste" name="poste" class="form-control">
                    <?php foreach(getAllPosteCoiffeur() as $cle => $valeur){?>
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
                <button type="submit" name="AjouterCoiffeur" class="btn btn-primary" style="margin-bottom: 10px">Enregister</button>
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

<?php
     }
 }
?>
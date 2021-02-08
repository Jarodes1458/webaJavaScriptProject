<?php 

/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */

$title = "Elysée - Informations Personnelles";
include('includes/header.php');


if(isset($_SESSION['COI_MAIL'])){
    $coiffeur = getOneCoiffeur($_SESSION['COI_MAIL']);
}
?>
<br><br>

<div class="container">
    <h1 class="text-center">Information de : <?=$coiffeur['COI_NOM'] . ' ' . $coiffeur['COI_PRENOM'] ?> </h1>


<br><br>
<div class="container border border-dark text-center">
<div class="row">
    <div class="col-6">
        <p> Nom </p>
        <input type="text">
    </div>
    <div class="col-6">
        <p> Prénom </p>
        <input type="text">
    </div>
</div>
<br>
<div class="row">
    <div class="col-6">
        <p> Téléphone </p>
        <input type="text">
    </div>
    <div class="col-6">
        <p> E-mail </p>
        <p class="bg-light"><?= $coiffeur['COI_MAIL']?></p>
    </div>
</div>
<br>
<div class="row">
    <div class="col-4">
  <a class="btn btn-customLightBlue" data-toggle="collapse" href="#ModifierMDP" role="button" aria-expanded="false" aria-controls="ModifierMDP">Modifier le mot de passe</a>
    </div>
    <div class="col-4">
    <button class="btn btn-customLightBlue" type="button" data-toggle="collapse" data-target=".collapse" aria-expanded="false" aria-controls="ModifierMAIL ModifierMAIL">Modifier les deux</button>
    </div>
    <div class="col-4">
    <button class="btn btn-customLightBlue" type="button" data-toggle="collapse" data-target="#ModifierMAIL" aria-expanded="false" aria-controls="ModifierMAIL">Modifier email</button>
    </div>
    <br>
<div class="row">
  <div class="col"><br>
    <div class="collapse multi-collapse offset-1" id="ModifierMDP">
      <div class="card card-body">
      <div class="row">
                
                <div class="col-lg-12 col-md-12">
                  <h6>Ancien mot de passe </h6>

                    <input type="password" class="form-control" id="inputNom" name="inputNom">

                </div>
                <div class="col-lg-12 col-md-12">
                  <h6>Nouveau mot de passe </h6>

                    <input type="password" class="form-control" id="inputMarque" name="inputMarque" placeholder="">

                </div>
              
                <div class="col-lg-12">
                  <h6>Confirmer mot de passe</h6>
                  <input type="password" class="form-control" id="inputMarque" name="inputMarque" placeholder="">

              </div>
              </div>
          <br>
            <button type="submit" name="change" class="btn btn-primary">Enregister</button>
          </form>
      </div>
    </div>
  </div>
  <div class="col"><br>
    <div class="collapse multi-collapse" id="ModifierMAIL">
      <div class="card card-body"><br>
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
      </div>
    </div>
  </div>
</div>
</div>
<br>
</div>
</div>

</div>
      <div class="modal fade bd-example-modal-lg" data-backdrop="false" id="ModifierMAIL" tabindex="-1" role="dialog" aria-labelledby="ModifierMAIL" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModifierMAIL">Modifier <span id="ancienMail"></span> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <br>
              <div class="row">
                
                <div class="col-lg-8 offset-2 col-md-12">
                  <h6>Mot de passe: </h6>
                  <div class="form-group">
                    <input type="password" class="form-control" id="inputNom" name="inputNom">
                  </div>
                </div>

                <div class="col-lg-8 offset-2 col-md-12">
                  <h6>Nouvelle e-mail : </h6>
                  <div class="form-group">
                    <input type="text" class="form-control" id="inputMarque" name="inputMarque" placeholder="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-8 offset-2">
                  <h6>Confirmer la nouvelle adresse : </h6>
                  <div class="form-group">
                  <input type="text" class="form-control" id="inputMarque" name="inputMarque" placeholder="">
                  </div>
                </div>
              </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
            <button type="submit" name="change" class="btn btn-primary">Enregister</button>
          </div>
          </form>
        </div>
      </div>
      </div>
    </div>
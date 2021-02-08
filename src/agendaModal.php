<?php
$title = "Elysée - Boutique";
include('includes/header.php');



?>
<style>
.modal-backdrop {
       display: none !important;
}
</style>


<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 200px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

</style>
</head>
<body>
<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>
<button data-toggle="modal" data-target="#AjouterUnClient" class="btn btn-light border border-dark float-right" >Ajouter un client</button> 





<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close"></span>
    <div class="row" style="margin: -3.1%; height: 200px;" >
        <div class="col-6" style="background-color: #707070;" data-toggle="modal" data-target="#AjouterUnClient">
            <h5 style="position: absolute; top: 40%;padding-left:20%; color: white;">Nouveau Client</h5>
        </div>
        <div class="col-6 bg-LightGray" data-toggle="modal" data-target="#ClientExistant">
            <h5 style="position: absolute; top: 40%;padding-left:20%;">Client existant</h5>
        </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="modal fade bd-example-modal" data-backdrop="false" id="AjouterUnClient" tabindex="-1" role="dialog" aria-labelledby="AjouterUnClient" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title font-weight-bold" id="AjouterUnClient">Ajouter un client</p>
            </div>
            <div class="modal-body">
                <form method="POST" action="liste des clients">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <p class="font-weight-bold" style="font-size: 70%;">Nom: </p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nomClient" name="nomClient" placeholder="obligatoire" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <p class="font-weight-bold" style="font-size: 70%;">Prenom: </p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="prenomClient" name="prenomClient" placeholder="obligatoire" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <p class="font-weight-bold" style="font-size: 70%;">Téléphone: </p>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="telClient" name="telClient" placeholder="obligatoire" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <p class="font-weight-bold" style="font-size: 70%;">Adresse mail: </p>
                            <div class="form-group">
                                <input type="mail" class="form-control" id="mailClient" name="mailClient" >
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="AjouterClient" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>




<div class="container-fluid">
  <div class="modal fade bd-example-modal" data-backdrop="false" id="ClientExistant" tabindex="-1" role="dialog" aria-labelledby="ClientExistant" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title font-weight-bold" id="ClientExistant">Client existant</p>
            </div>
            <div class="modal-body">
                <form method="POST" action="creerRdvParUnCoiffeur.php">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <p class="font-weight-bold" style="font-size: 70%;">Téléphone: </p>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="telClientExistant" name="telClientExistant" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <p class="font-weight-bold" style="font-size: 70%;">Adresse mail: </p>
                            <div class="form-group">
                                <input type="mail" class="form-control" id="mailClientExistant" name="mailClientExistant" placeholder="">
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="confirmerClient" class="btn btn-primary">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>


<div class="container-fluid">
  <div class="modal fade bd-example-modal modalTransparent" data-backdrop="false" id="ClientExistant" tabindex="-1" role="dialog" aria-labelledby="ClientExistant" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title font-weight-bold" id="ClientExistant">Client exisant</p>
            </div>
            <div class="row border-top border-dark text-center">
                    <h5 class="text-center" style="padding-top:1%; padding-left:5%; text-align: center">Si vous avez déjà pris un rendez-vous en ligne entrez une des deux informations : </h5>
                    <div class="col-lg-5 offset-1 col-md-12" style="padding-top:1%;padding-left:3%; padding-right:3%;">
                        <h5>Adresse mail :</h5>
                        <div class="form-group">
                            <input type="mail" class="form-control" id="mailClientDejaExistant" name="mailClient" >
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12" style="padding-top:1%;padding-left:3%; padding-right:3%;">
                        <h5>Numéro de téléphone :</h5>
                        <div class="form-group">
                            <input type="number" class="form-control" id="telClientDejaExistant" name="mailClient" >
                        </div>
                    </div>
                </div>
                <div class="row border-top border-dark">
                    <div class="modal-footer offset-4">
                        <a href="priserdv1" type="button" class="btn btn-secondary border border-dark">Retour</a>
                        <button type="submit" name="AjouterClient" class="btn btn-primary">Prendre rendez-vous</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var modal = document.getElementById("myModal");// Get the modal
    var btn = document.getElementById("myBtn");// Get the button that opens the modal
    var span = document.getElementsByClassName("close")[0];// Get the <span> element that closes the modal
    btn.onclick = function() {// When the user clicks the button, open the modal 
    modal.style.display = "block";
    }
    span.onclick = function() {// When the user clicks on <span> (x), close the modal
    modal.style.display = "none";
    }
    window.onclick = function(event) {// When the user clicks anywhere outside of the modal, close it
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
</script>
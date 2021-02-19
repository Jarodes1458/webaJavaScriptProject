<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */


  $title = "Elysée - liste des clients";
  include('includes/header.php'); 
  if (isset($_SESSION["COI_POSTE"])){
    if ($_SESSION["COI_POSTE"] == "Patronne" OR $_SESSION["COI_POSTE"] == "Coiffeur superieur"){
      $modificationPossible = true;
    }
    else{
      $modificationPossible = false;
    }
  }else{
    $modificationPossible = false;
  }


  if ($modificationPossible){
    if (isset($_POST["AjouterClient"]) AND isset($_POST["nomClient"]) AND isset($_POST["prenomClient"]) AND isset($_POST["telClient"])){
      if (getNbClientEmail($_POST["mailClient"]) == 0 AND getNbClientTel($_POST["telClient"]) == 0){
        if ($_POST["mailClient"] == ""){
          $mail = null;
        }else{
          $mail = $_POST["mailClient"];
        }
        addClient($_POST["nomClient"], $_POST["prenomClient"], $_POST["telClient"], $mail);
      } 
      echo "<br>";
      echo "<div class='text-center font-weight-bold'>Le numéro de téléphone ou l'adresse email à déja été utilisé</div>";
    }



    if (isset($_POST["SupprimerClient"]) AND isset($_POST["clientID"])){
      deleteClient($_POST["clientID"]);
    }
  }

  if (isset($_SESSION["COI_POSTE"])){
?>

<body style="background-color: white;">
<div class="container">
<h2  style="text-align: center;margin-top:50px">Liste des Clients du Salon</h2>
</div>
  <div class="container" style="padding:3%;max-width:68%">
  <?php if ($modificationPossible){ ?><button data-toggle="modal" data-target="#AjouterUnClient" class="btn btn-light border border-dark float-right" >Ajouter un client</button> <?php } ?>
    <input type="text" id="input" onkeyup="recherche_client()" placeholder="Entrer le nom du client ..">
    <table id="dtBasicExample" class="table table-striped table-responsive-sm" style="font-size: 60%;">
      <thead class="thead-dark">
        <tr>
          <th scope="th-sm">Nom</th>
          <th scope="th-sm">Prenom</th>
          <?php if ($modificationPossible){ ?>
            <th scope="th-sm">Téléphone</th>
            <th scope="th-sm">Email</th>
          <?php } ?>
          <th scope="th-sm">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if ($modificationPossible){
            foreach(getAllClient() as $client){ ?>
            <tr>
              <td><?=$client["CLI_NOM"]?></td>
              <td><?=$client["CLI_PRENOM"]?></td>
              <td><?=$client["CLI_TEL"]?></td>
              <td><?=$client["CLI_EMAIL"]?></td>
                <td>
                  <a href="fiche client?id=<?=$client["CLI_ID"]?>" class="far fa-address-card" style="cursor: grab;text-decoration:none"></a>
                  &ensp;
                  <a style="cursor: grab;" onclick="donneesSupprimerClient('<?=$client['CLI_NOM']?>', '<?=$client['CLI_PRENOM']?>', '<?=$client['CLI_ID']?>')" data-toggle="modal" data-target="#SupprimerClient" class="fa fa-trash"></a>
                </td>
            </tr>
        <?php } }else{ 
          foreach(getAllClientPourCoiffeur($_SESSION["COI_ID"]) as $client){ ?>
          <tr>
              <td><?=$client["cli_nom"]?></td>
              <td><?=$client["cli_prenom"]?></td>
                <td>
                  <a href="fiche client?id=<?=$client["cli_id"]?>" class="far fa-address-card"></a>
                </td>
            </tr>
        <?php } } ?>
      </tbody>
    </table>
  </div>

  <script type="text/javascript">

  function recherche_client() {
    var input,table,line,tr,cellule,td,colone;
    function prepare_data(chains){
        return chains.toString().trim();
        }
    input = prepare_data(document.getElementById("input").innerText.toLowerCase());
    table = document.getElementById("dtBasicExample");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      line = tr[i];
      td = line.getElementsByTagName("td");
      for (j = 0; j < td.length; j++) {
          colone = td[j];
          cellule = colone.textContent.toLowerCase();
          if (cellule.indexOf(input) > -1) {
              var afficherligne = true;
          }
      }
      if(afficherligne){
          line.style.display = 'block';
      }else{
          line.style.display = 'none';
      }
    }
  }
  </script>

</body>

  <div class="container-fluid">
  <div class="modal fade bd-example-modal" data-backdrop="false" id="AjouterUnClient" tabindex="-1" role="dialog" aria-labelledby="AjouterUnClient" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AjouterUnClient">Ajouter un client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="modal-body">
          <form method="POST" action="listedesclients">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <h5>Nom: </h5>
                <div class="form-group">
                  <input type="text" class="form-control" id="nomClient" name="nomClient" placeholder="obligatoire" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <h5>Prenom: </h5>
                <div class="form-group">
                  <input type="text" class="form-control" id="prenomClient" name="prenomClient" placeholder="obligatoire" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <h5>Téléphone: </h5>
                <div class="form-group">
                  <input type="tel" class="form-control" id="telClient" name="telClient" placeholder="obligatoire" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <h5>Adresse mail: </h5>
                <div class="form-group">
                  <input type="mail" class="form-control" id="mailClient" name="mailClient" >
                </div>
              </div>
            <br>
          <br>
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
</div>


<div class="modal fade bd-example-modal-lg" data-backdrop="false" id="SupprimerClient" tabindex="-1" role="dialog" aria-labelledby="SupprimerClient" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="SupprimerClient">Supprimer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="listedesclients">
            Etes vous sur de supprimer le client ? <br>
            <span id="sCliNom"></span> <span id="sCliPrenom"></span>
        </div>
        <div class="modal-footer">
          <input id="clientID" name="clientID" type="text" value="" hidden="true">
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


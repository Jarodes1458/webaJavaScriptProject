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
  <div id="divTable" class="container divTable"  style="padding:3%;max-width:68%">
  <?php if ($modificationPossible){ ?><button data-toggle="modal" data-target="#AjouterUnClient" class="btn btn-light border border-dark float-right" >Ajouter un client</button> <?php } ?>
    <input type="text" id="input"  placeholder="Entrer le nom du client ..">
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
      <tbody id="tbody">
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
/*
http://www.mattmorgante.com/technology/ajax-pagination
https://stackoverflow.com/questions/31920360/dynamic-pagination-in-jquery
https://phppot.com/php/ajax-pagination-with-tabular-records-using-php-and-jquery/
https://www.studentstutorial.com/ajax/pagination#
https://www.sitepoint.com/pagination-jquery-ajax-php/

  <script type="text/javascript">
      document.getElementById("input").addEventListener("input", recherche_client);
      function prepare_data(chains){
          var data = chains.replace(/^\s+|\s+$/gm,'');
          return data.toUpperCase();
      }
      function recherche_client() {
          var input,table,line,tr,clear_data,CountTr;
          input = document.getElementById("input");
          clear_data = prepare_data(input.value);
          table = document.getElementById("dtBasicExample");
          tr = table.getElementsByTagName("tr");
          CountTr = 0 ;
          for (i = 0; i < tr.length; i++){
              line = tr[i];
              var td1 = line.getElementsByTagName("td")[0];
              var td2 = line.getElementsByTagName("td")[1];
              var td3 = line.getElementsByTagName("td")[2];
              var td4 = line.getElementsByTagName("td")[3];
              if(td1 || td2 || td3 || td4) {
                  var textvalue1 = td1.textContent;
                  var textvalue2 = td2.textContent;
                  var textvalue3 = td3.textContent;
                  var textvalue4 = td4.textContent;
                  if (textvalue1.toUpperCase().indexOf(clear_data) > -1 || textvalue2.toUpperCase().indexOf(clear_data) >-1 || textvalue3.toUpperCase().indexOf(clear_data) >-1 || textvalue4.toUpperCase().indexOf(clear_data) >-1) {
                      line.style.display = '';
                  } else {
                      line.style.display = 'none';
                      CountTr++;
                  }
              }
          }
          var divTab = document.getElementById("divTable");
          if (CountTr > tr.length){
              var messageErrorTag= document.createElement("p");
              messageErrorTag.setAttribute("id","error");
              var messageErrorText = document.createTextNode("Aucun résultat Trouvé");
              if(document.getElementById("error") == undefined)
              {
              divTab.appendChild(messageErrorTag);
              messageErrorTag.appendChild(messageErrorText);
              messageErrorTag.style.color="red";
              }
          }else{
              document.getElementById("error").remove();
          }
      }
  </script>*/

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


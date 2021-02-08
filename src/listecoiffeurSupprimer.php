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
?>



<?php
if(isset($_GET['suppr']) && $modificationPossible)
{
  changementLogiqueCoiffeur($_GET['id']);
  echo  '<meta http-equiv="refresh" content="0;url=listecoiffeurSupprimer?msg=true"/>';
}
if($modificationPossible){

?>
<body style="background-color: white;">
<div class="container tableaucoiDelete" style="padding:40px">

<div class="container-fluid" style="margin-top:5%;margin-bottom:5%">
  <h1 style="text-align: center">Coiffeur inactif</h1>
</div>

<div class="container-fluid  TableauCoiffeur">
<table id="dtBasicExample" class="table table-striped table-responsive-sm" style="font-size: 60%;">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><h4 class="text-white">Nom</h4></th>
      <th scope="col"><h4 class="text-white">Prénom</h4></th>
      <th scope="col"><h4 class="text-white">Email</h4></th>
      <th scope="col"><h4 class="text-white">Numero téléphone</h4></th>
      <th scope="th-sm"><h4 class="text-white">Action</h4></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach(getAllCoiffeurInactif() as $coiffeur){ ?>
            <tr>
              <td><?= $coiffeur['COI_NOM'] ?></td>
              <td><?= $coiffeur['COI_PRENOM'] ?></td>
              <td><?= $coiffeur['COI_MAIL'] ?></td>
              <td><?= $coiffeur['COI_NUMTEL'] ?></td>
              <?php if($modificationPossible){?>
                <td>
                  <a class="far fa-plus-square" href="listecoiffeurSupprimer?suppr=true&id=<?= $coiffeur['COI_ID'] ?>"></a>
                </td>
              <?php } ?>
            </tr>
        <?php } ?>
      </tbody>
    </table>
    <div class="row">
      <a href="listecoiffeur"class="btn btn-light border border-dark" style="margin-left: 2%;">Afficher la liste des coiffeurs</a> 
  </div>
  </div>

 

    <script>
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
  </script>
  <?php }else{ ?>
    <script>
      window.location.href = "index";
    </script>
  <?php } ?>
  </div>

</body>

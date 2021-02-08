<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */

$jourseminsert = array("Dimanche", "Samedi", "Vendredi", "Jeudi", "Mercredi", "Mardi", "Lundi");
$joursemupdate = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$joursem = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");


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

  if(isset($_POST['UdapteHoraire']) AND isset($_GET['Coi_id']) AND $_GET['ModifierHoraire']){
    if($modificationPossible)
      {
        $compteur1 = 0;
        $coid=$_GET['Coi_id'];
        foreach($joursemupdate as $jour){

    
        $MHeureDM = !empty($_POST['MHeureDM'.$compteur1])? $_POST['MHeureDM'.$compteur1] : null;
        $MHeureFM = !empty($_POST['MHeureFM'.$compteur1])? $_POST['MHeureFM'.$compteur1] : null;
        $MHeureDA = !empty($_POST['MHeureDA'.$compteur1])? $_POST['MHeureDA'.$compteur1] : null;
        $MHeureFA = !empty($_POST['MHeureFA'.$compteur1])? $_POST['MHeureFA'.$compteur1] : null;
        
        //echo getMinuteAvecUneHeure($MHeureDM);

        if(validateDate($MHeureDM, 'H:i')){ # true
          $temps = heureToMinute2($MHeureDM);
            while($temps%15 != 0){
              $temps += 1;
            }
          $MHeureDM = convertToHoursMins($temps,'%02d:%02d:00');
        }
        if(validateDate($MHeureDA, 'H:i')){ # true
          $temps = heureToMinute2($MHeureDA);
            while($temps%15 != 0){
              $temps += 1;
            }
          $MHeureDA = convertToHoursMins($temps,'%02d:%02d:00');
        }

        if (isset($_POST['Mretirer'.$compteur1])){
          $MHeureDM = null;
          $MHeureFM = null;
        }
        if (isset($_POST['Aretirer'.$compteur1])){
          $MHeureDA = null;
          $MHeureFA = null;
        }
        //echo $jour . ": " . $MHeureDM . " - " . $MHeureFM;
        
        UpdateHoraire($coid,$jour,$MHeureDM,$MHeureFM,$MHeureDA,$MHeureFA);
        $compteur1 ++;
        }
        echo  '<meta http-equiv="refresh" content="0;url=listecoiffeur"/>';
      }
  }

  if(isset($_POST['InsertHoraire']) AND isset($_GET['Coi_id']) AND $_GET['InsertHoraire']){
    if($modificationPossible)
      {
        $compteur2 = 0;
        $coid=$_GET['Coi_id'];
        foreach($joursem as $jour){

          $IHeureDM = !empty($_POST['IHeureDM'.$compteur2])? $_POST['IHeureDM'.$compteur2] : null;
          $IHeureFM = !empty($_POST['IHeureFM'.$compteur2])? $_POST['IHeureFM'.$compteur2] : null;
          $IHeureDA = !empty($_POST['IHeureDA'.$compteur2])? $_POST['IHeureDA'.$compteur2] : null;
          $IHeureFA = !empty($_POST['IHeureFA'.$compteur2])? $_POST['IHeureFA'.$compteur2] : null;

          if(validateDate($IHeureDM, 'H:i:s')){ # true
            $temps = heureToMinute2($IHeureDM);
              while($temps%15 != 0){
                $temps += 1;
              }
            $IHeureDM = convertToHoursMins($temps,'%02d:%02d:00');
          }
          if(validateDate($IHeureDA, 'H:i:s')){ # true
            $temps = heureToMinute2($IHeureDA);
              while($temps%15 != 0){
                $temps += 1;
              }
            $IHeureDA = convertToHoursMins($temps,'%02d:%02d:00');
          }

          InsererHoraire($coid,$jour,$IHeureDM,$IHeureFM,$IHeureDA,$IHeureFA);
          $compteur2 ++;
        }
        echo  '<meta http-equiv="refresh" content="0;url=listecoiffeur"/>';
      }
  }

  if(isset($_GET['Calendar'])){
    if($modificationPossible)
      {
?>

<div class="FormulaireHoraire"  style="width:100%;margin-top:3%">
<?php 
$coiffeur = getOneCoiffeurID( $_GET['id']);
$coiffeurHoraire=GetAllHoraireWhereCoiId($coiffeur['COI_ID'])->fetchAll();
$coiffeurHoraireexist=GetAllHoraireWhereCoiId($coiffeur['COI_ID'])->rowCount();
 $compteur = 0;
 if($coiffeurHoraireexist >=1){ ?>
<form action="DefinirCoiffeurHoraires?Coi_id=<?= $_GET['id']?>&ModifierHoraire=true" method="post">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="">Attribuer les Horaires Au Coiffeur <?= $coiffeur['COI_NOM']?> <span id=""></h5>
        </div>
        <div class="modal-body text-center" >
        <h6>Si vous ne sélectionnez pas un quart d'heure, le système adaptera l'horaire à la quinzaine du dessus(ex: 08:13 --> 08:15) </h6>

        <?php
        foreach($coiffeurHoraire as $HoraireCoiffeur){?>
            <h2 class="text-center" style="margin-top: 5%"><?=$HoraireCoiffeur['tra_jour']?></h2>
          <br>
            <div class="row">
              <div class="col-5">
                <h5>Choisir Heure Debut Matin : </h5>
                <div class="form-group">
                <input type="time" id="appt" name="MHeureDM<?=$compteur?>" min="8:00" max="21:00" value=<?=$HoraireCoiffeur['tra_heureDebutMatin']?> required>
                </div>
              </div>
              <div class="col" style="padding-top: 8%;">
                <input class="form-check-label" style="margin-bottom:-10%;" type="checkbox" id="Mretirer<?=$compteur?>" name="Mretirer<?=$compteur?>" value="true">
                <p class="text-center" style="font-size:75%; margin-top: -10%;"><label for="Mretirer<?=$compteur?>">Retirer</label></p>
              </div>
              <div class="col-5">
                <h5>Choisir Heure Fin Matin : </h5>
                <div class="form-group">
                <input type="time" id="appt" name="MHeureFM<?=$compteur?>"  min="8:00" max="21:00"  value=<?=$HoraireCoiffeur['tra_heureFinMatin']?> required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-5">
                <h5>Choisir Heure Debut Après Midi :  </h5>
                <div class="form-group">
                <input type="time" id="appt" name="MHeureDA<?=$compteur?>"  min="8:00" max="21:00"  value=<?=$HoraireCoiffeur['tra_heureDebutAprem']?> required>
                </div>
              </div>
              <div class="col" style="padding-top: 8%;">
                <input class="form-check-label" style="margin-bottom:-10%;" type="checkbox" id="Aretirer<?=$compteur?>" name="Aretirer<?=$compteur?>" value="true">
                <p class="text-center" style="font-size:75%; margin-top: -10%;"><label for="Aretirer<?=$compteur?>">Retirer</label></p>
              </div>
              <div class="col-5">
                <h5>Choisir Heure Fin Après Midi : </h5>
                <div class="form-group">
                <input type="time" id="appt" name="MHeureFA<?=$compteur?>"  min="8:00" max="21:00"  value=<?=$HoraireCoiffeur['tra_heureFinAprem']?>  required>
                </div>
              </div>
            </div>
            
        <?php $compteur++; } ?>
        <div class="modal-footer">
        <a href="listecoiffeur"><button type="button" name="comeback" class="btn btn-secondary border border-dark" >Retour</button></a>
      </div>
      <button type="submit" name="UdapteHoraire" class="btn btn-primary" style="margin-right:82%">Enregister</button>
        </form>
      <?php
        }
        else{ ?>
          <form action="DefinirCoiffeurHoraires?Coi_id=<?= $_GET['id']?>&InsertHoraire=true" method="post">
      <?php $coiffeur = getOneCoiffeurID( $_GET['id']);
      ?>
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="">Attribuer les Horaires Au Coiffeur <?= $coiffeur['COI_NOM']?> <span id=""></h5>

              </div>
              <div class="modal-body text-center" >
          <?php
          $compteur = 0;
           foreach($joursemupdate as $jour){?>
            <h2 class="text-center" style="margin-top: 5%"><?=$jour?></h2>
          <br>
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <h5>Choisir Heure Debut Matin : </h5>
                <div class="form-group">
                <input type="time" id="appt" name="IHeureDM<?=$compteur?>"  min="8:00" max="21:00" >
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <h5>Choisir Heure Fin Matin : </h5>
                <div class="form-group">
                <input type="time" id="appt" name="IHeureFM<?=$compteur?>"   min="8:00" max="21:00" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <h5>Choisir Heure Debut Après Midi :  </h5>
                <div class="form-group">
                <input type="time" id="appt" name="IHeureDA<?=$compteur?>"   min="8:00" max="21:00" >
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <h5>Choisir Heure Fin Après Midi : </h5>
                <div class="form-group">
                <input type="time" id="appt" name="iHeureFA<?=$compteur?>"   min="8:00" max="21:00"  >
                </div>
              </div>
            </div>
            <?php $compteur++;} ?>
            <div class="modal-footer">
            <a href="listecoiffeur"><button type="button" name="comeback" class="btn btn-secondary border border-dark" >Retour</button></a>
          </div>
          <button type="submit" name="InsertHoraire" class="btn btn-primary" style="margin-right:82%">Enregister</button>
          <?php
          }?>
        </div>
            </div>
            </div>
        </form>
</div>
<?php }
          }?>

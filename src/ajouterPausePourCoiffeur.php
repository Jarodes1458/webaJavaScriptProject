<?php

$title = "Elysée - Ajout d'une pause";
include('includes/header.php');



$compteur = 0;

if(isset($_SESSION['COI_ID']))
{
$joursem = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");

//Pour les permissions de modification
if (isset($_SESSION["COI_POSTE"])){
    if ($_SESSION["COI_POSTE"] == "Patronne" or $_SESSION["COI_POSTE"] == "Coiffeur superieur"){
      $modificationPossible = true;
    }
    elseif (isset($_GET["coiffeur"])){
        if($_SESSION["COI_ID"] == $_GET["coiffeur"]){
            $modificationPossible = true;
        }
        else{
            $modificationPossible = false;
        }
    }
    else{
      $modificationPossible = false;
    }
  }else{
    $modificationPossible = false;
  }


if (isset($_GET["coiffeur"]) && isset($_SESSION["COI_POSTE"])){
    if ($modificationPossible){
        $coiffeurId = $_GET["coiffeur"];
    } else{
        $coiffeurId = $_SESSION["COI_ID"];
    }



    if(!isset($_SESSION['semaine']) || isset($_GET['reset'])){
        $_SESSION["semaine"]=0;
    }

    if (isset($_SESSION['semaine']))
    {
        if(isset($_GET['Semainepro']) ){
            $_SESSION["semaine"]= $_SESSION["semaine"]+7;
        }
        if( isset($_GET['Semaineavant'])){
            $_SESSION["semaine"]= $_SESSION["semaine"]-7;
        }
    }


    //trouver le jour de la semaine d'aujourd'hui
    $dateDuJourSemaine = mktime(0,0,0,date("m"),date("d")+$_SESSION["semaine"],date("Y"));
    $frdate= date ("d/m/Y", $dateDuJourSemaine);
    $frdatePourInsert= date ("Y-m-d", $dateDuJourSemaine);

    $joursem2 = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    // extraction des jour, mois, an de la date
    list($jour, $mois, $annee) = explode('/', $frdate);
    // calcul du timestamp
    $timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
    // affichage du jour de la semaine
    $aujourdHui = $joursem2[date("w",$timestamp)];


    //Crée une liste avec la date et le jour de la semaine
    $dateJourNumero = ["Lundi" => 1,"Mardi" => 2, "Mercredi" => 3, "Jeudi" => 4, "Vendredi" => 5, "Samedi" => 6, "Dimanche" => 7];
    $dateJourNumero2 = [0 => "Lundi", 1 =>"Mardi", 2 => "Mercredi", 3  => "Jeudi", 4 => "Vendredi", 5 => "Samedi", 6 => "Dimanche"];
    $dateJour = array();

    $dateJourPourInsert = array();

    foreach($joursem as $jour):
        if ($jour == $aujourdHui){
            $dateJour[$jour] = $frdate;
            $dateJourPourInsert[$jour] = $frdatePourInsert;
            //echo $jour . " - " . $frdate . "<br>";
        } else{
            $difference = $dateJourNumero[$jour] - $dateJourNumero[$aujourdHui];
            $dateDuJourSemaine = mktime(0,0,0,date("m"),date("d")+$difference+$_SESSION["semaine"],date("Y"));
            $dateJour[$jour] = date ("d/m/Y", $dateDuJourSemaine);
            $dateJourPourInsert[$jour] = date ("Y-m-d", $dateDuJourSemaine);
            //echo $jour . " x " . $difference . "<br>";
        }
    endforeach;

    $periodeLibre = true;
    $periodeValide = true;
    echo "<h2 style='margin-top : 3%; margin-bottom: -1%;' class='text-center'>Ajouter une ou plusieurs pause(s)</h2>";
    if(isset($_POST['addBreak'])){
        for($i = $compteur; $i < 7; $i++)
        {
            $trancheHoraireJour = getTranchesHoraires($coiffeurId, $dateJourNumero2[$i]);
            if(!empty($_POST['breakHD'.$i]) && !empty($_POST['breakHF'.$i]) && !empty($_POST['breakDescrip'.$i]))
            {
                if(
                heureEnMinute($_POST['breakHD'.$i]) >= heureEnMinute($trancheHoraireJour['tra_heureDebutMatin'])
                && heureEnMinute($_POST['breakHD'.$i]) <= heureEnMinute($trancheHoraireJour['tra_heureFinMatin'])
                || heureEnMinute($_POST['breakHD'.$i]) >= heureEnMinute($trancheHoraireJour['tra_heureDebutAprem'])
                && heureEnMinute($_POST['breakHD'.$i]) <= heureEnMinute($trancheHoraireJour['tra_heureFinAprem']))
                {
                $heureDebut = $_POST['breakHD'.$i];
                
                if($_POST['breakHF'.$i] > $heureDebut || $_POST['breakHF'.$i] >= $trancheHoraireJour['tra_heureDebutAprem'] && $_POST['breakHF'.$i] <= $trancheHoraireJour['tra_heureFinAprem'])
                {   
                    $heureFin = $_POST['breakHF'.$i];             
                    $description = $_POST['breakDescrip'.$i];
                    if(getAPeriode($heureDebut,$heureFin,$dateJourPourInsert[$trancheHoraireJour['tra_jour']],$coiffeurId)->rowCount() > 0)
                    {
                        echo "<br><h5 class='text-center couleurRouge' style='margin-bottom:-1%;'>La période est déjà occupée.</h5>";
                        $periodeLibre = false;
                        break;
                    }
                    foreach(getRdvCoiffeurAgenda($dateJourPourInsert[$trancheHoraireJour['tra_jour']], $coiffeurId) as $donnees)
                    {
                        if($heureDebut > $donnees['PER_HEURE_MIN_DEBUT'] && $heureDebut < $donnees['PER_HEURE_MIN_FIN']
                        || $heureFin > $donnees['PER_HEURE_MIN_DEBUT']  && $heureFin < $donnees['PER_HEURE_MIN_FIN'])
                        {
                            if(heureEnMinute($heureDebut) > heureEnMinute($donnees['PER_HEURE_MIN_DEBUT']) && heureEnMinute($heureDebut) < heureEnMinute($donnees['PER_HEURE_MIN_FIN'])
                            || heureEnMinute($heureFin) > heureEnMinute($donnees['PER_HEURE_MIN_DEBUT']) && heureEnMinute($heureFin) <= heureEnMinute($donnees['PER_HEURE_MIN_FIN']))
                            {
                                echo "<br><h5 class='text-center couleurRouge' style='margin-bottom:-1%;'>La période est déjà occupée par un rendez-vous.</h5>";
                                $periodeLibre = false;
                                break;
                            }
                        }
                    }
                    foreach(getPauseAgendaCoiffeur($dateJourPourInsert[$trancheHoraireJour['tra_jour']], $coiffeurId) as $donnees)
                    {
                        if($heureDebut >= $donnees['PER_HEURE_MIN_DEBUT'] && $heureDebut <= $donnees['PER_HEURE_MIN_FIN']
                        || $heureFin >= $donnees['PER_HEURE_MIN_DEBUT'] && $heureFin <= $donnees['PER_HEURE_MIN_FIN'])
                        {
                            if(heureEnMinute($heureDebut) >= heureEnMinute($donnees['PER_HEURE_MIN_DEBUT']) && heureEnMinute($heureDebut) <= heureEnMinute($donnees['PER_HEURE_MIN_FIN'])
                            || heureEnMinute($heureFin) >= heureEnMinute($donnees['PER_HEURE_MIN_DEBUT']) && heureEnMinute($heureFin) <= heureEnMinute($donnees['PER_HEURE_MIN_FIN']))
                            {
                                echo "<br><h5 class='text-center couleurRouge' style='margin-bottom:-1%;'>La période est déjà occupée par une pause.</h5>";
                                $periodeLibre = false;
                                break;
                            }
                        }
                    }
                        if($heureDebut >= $heureFin)
                        {
                            echo "<br><h5 class='text-center couleurRouge' style='margin-bottom:-1%;'>L'heure de la fin de la pause doit être supérieur à celle du début.</h5>";
                            $periodeValide = false;
                        }

                        if($periodeLibre && $periodeValide)
                        {
                        insertionPeriode($dateJourPourInsert[$trancheHoraireJour['tra_jour']],$heureDebut, $heureFin);
                        $perid = getLastPeriod()['maximum'];
                        insertionPausePeriode($perid, $coiffeurId,$description);
                        ?><script>window.location.href ="agenda.php?coiffeur=<?=$coiffeurId?>"</script> <?php
                        }
                    }else{
                        echo "<br><h5 class='text-center couleurRouge' style='margin-bottom:-1%;'>l'heure de fin n'est pas valide.</h5>";
                    }
                }else{
                    echo "<br><h5 class='text-center couleurRouge' style='margin-bottom:-1%;'>l'heure du début n'est pas valide.</h5>";
                }
            }
        }
    }

    }
    ?>
    <body class="bg-light">    
    <div class="modal-dialog modal-lg" role="document">
    <form action="ajouterPausePourCoiffeur?coiffeur=<?=$coiffeurId?>" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Choisir la/les date(s) et les/l'heure(s) pour la/les pause(s) :<span id="">
                    <p class="text-center" style="margin-top: 2%; font-size: 120%;"><?="Coiffeur: " . getCoiffeurId($coiffeurId)["COI_NOM"] . " " . getCoiffeurId($coiffeurId)["COI_PRENOM"]?></p>
                </h5>
            </div>
            <div class="text-center" style="margin-top: 3%;">
                <a   href="ajouterPausePourCoiffeur?Semaineavant=true"  class="far fa-arrow-alt-circle-left" style="padding-right:4%;font-size:125%; text-decoration: none; "></a>
                <a   href="ajouterPausePourCoiffeur?reset=true&coiffeur=<?= $coiffeurId ?>"style="padding-right:4%;font-size:125%; text-decoration: none; ">Retour semaine de départ</a>
                <a   href="ajouterPausePourCoiffeur?Semainepro=true"  class="far fa-arrow-alt-circle-right" style="font-size:125%; text-decoration: none; "></a>
            </div>
            <div class="modal-body text-center">
            <?php
            foreach($dateJour as $jour => $dateDuJour)
            {
                if(isset(getTranchesHoraires($coiffeurId, $jour)['tra_heureDebutMatin']) || isset(getTranchesHoraires($coiffeurId, $jour)['tra_heureDebutAprem'])){
                ?>
                <div class="col text-center">
                    <h3 class="text-center"><?=$jour?>  <?=$dateDuJour?></h3>
                </div>
                <?php if(isset(getTranchesHoraires($coiffeurId, $jour)['tra_heureDebutMatin'])){ ?>
                <div class="row" style="margin-top : 4%;">
                    <div class="col-lg-6 col-md-12">
                        <h5> Heure début horaire matin : <span class="couleurRouge"><?=getTranchesHoraires($coiffeurId, $jour)['tra_heureDebutMatin'] ?></span></h5>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h5> Heure fin horaire matin : <span class="couleurRouge"><?=getTranchesHoraires($coiffeurId, $jour)['tra_heureFinMatin'] ?></span></h5>
                    </div>
                </div>
                <?php } 
                if(isset(getTranchesHoraires($coiffeurId, $jour)['tra_heureDebutAprem'])){ ?>
                <div class="row" style="margin-top : 1%;">
                    <div class="col-lg-6 col-md-12">
                        <h5> Heure debut horaire après-midi : <span class="couleurRouge"><?=getTranchesHoraires($coiffeurId, $jour)['tra_heureDebutAprem'] ?></span></h5>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h5> Heure din horaire après-midi : <span class="couleurRouge"><?=getTranchesHoraires($coiffeurId, $jour)['tra_heureFinAprem'] ?></span></h5>
                    </div>
                </div>
                <?php } ?>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <h5> Heure Debut Pause<span class="couleurRouge">*</span> : </h5>
                        <div class="form-group">
                            <input type="time" id="appt" name="breakHD<?= $compteur ?>" min="<?=getTranchesHoraires($coiffeurId, $jour)['tra_heureDebutMatin']?>" max="<?=getTranchesHoraires($coiffeurId, $jour)['tra_heureFinAprem']?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h5> Heure Fin Pause<span class="couleurRouge">*</span> : </h5>
                        <div class="form-group">
                            <input type="time" id="appt" name="breakHF<?= $compteur ?>" min="<?=getTranchesHoraires($coiffeurId, $jour)['tra_heureDebutMatin']?>" max="<?=getTranchesHoraires($coiffeurId, $jour)['tra_heureFinAprem']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5> Description de la pause<span class="couleurRouge">*</span> : </h5>
                        <div class="form-group">
                            <textarea name="breakDescrip<?= $compteur ?>" style="font-size:70%;" placeholder="obligatoire" id="" cols="50" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <hr style="border-top : 1px solid black">
            <?php }$compteur++;}
            ?>
                <div class="modal-footer">
                    <a href="agenda.php?coiffeur=<?=$coiffeurId?>">
                        <button type="button" name="comeback" class="btn btn-secondary border border-dark">Retour</button>
                    </a>
                    <button type="submit" name="addBreak" class="btn btn-primary" style="margin-left:5%">Enregister</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>

    <?php include('includes/footer.php');
    }
?>
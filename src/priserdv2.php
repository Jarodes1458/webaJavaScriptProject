<?php
$title = "Elysée - Prise de rendez-vous";
include('includes/header.php');

//Liste jour de la semaine dans l'ordre
$joursem = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");

if(isset($_SESSION["coi"]["COI_ID"]))
{
$coiffeurId = $_SESSION["coi"]["COI_ID"];
}
else
{
    ?> <meta http-equiv="refresh" content="0; url=priserdv1"> <?php
}



$minuteEntreRendezVous = 15;
$jourAfficherMax = 84;
$tempsDePrestation = 0;

if(!isset($_SESSION['semainePriserdv2'])){

    $_SESSION["semainePriserdv2"]=0;
}

if (isset($_SESSION['semainePriserdv2']))
{
    if(isset($_GET['Semainepro']) )
    {
        if($_SESSION['semainePriserdv2'] < $jourAfficherMax)
        {
        $_SESSION["semainePriserdv2"]= $_SESSION["semainePriserdv2"]+7;
        }
        ?><meta http-equiv="refresh" content="0; url=priserdv2"><?php
    }
    if( isset($_GET['Semaineavant']))
    {
        if($_SESSION['semainePriserdv2'] > 0)
        {
        $_SESSION["semainePriserdv2"]= $_SESSION["semainePriserdv2"]-7;
        }
        ?><meta http-equiv="refresh" content="0; url=priserdv2"><?php
    }
}

//Avoir le temps total des prestatitions choisis
for($i = 0; $i <= 2; $i++){
    if(isset($_SESSION['ser'.$i])&& $_SESSION['ser'.$i] <> 'invalide')
    {

        $tempsDePrestation = $_SESSION['ser'.$i]["SER_TEMPS_ESTIMATION"] + $tempsDePrestation;
    }
}


//trouver le jour de la semaine d'aujourd'hui
$dateDuJourSemaine = mktime(0,0,0,date("m"),date("d")+$_SESSION["semainePriserdv2"],date("Y"));
$frdate= date ("d/m/Y", $dateDuJourSemaine);
$joursem2 = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
// extraction des jour, mois, an de la date
list($jour, $mois, $annee) = explode('/', $frdate);
// calcul du timestamp
$timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
// affichage du jour de la semaine
$aujourdHui = $joursem2[date("w",$timestamp)];


//Crée une liste avec la date et le jour de la semaine
$dateJourNumero = ["Lundi" => 1,"Mardi" => 2, "Mercredi" => 3, "Jeudi" => 4, "Vendredi" => 5, "Samedi" => 6, "Dimanche" => 7];
$dateJour = array();
foreach($joursem as $jour):
    if ($jour == $aujourdHui){
        $dateJour[$jour] = $frdate;
        //echo $jour . " - " . $frdate . "<br>";
    } else{
        $difference = $dateJourNumero[$jour] - $dateJourNumero[$aujourdHui];
        $dateDuJourSemaine = mktime(0,0,0,date("m"),date("d")+$difference+$_SESSION["semainePriserdv2"],date("Y"));
        $dateJour[$jour] = date ("d/m/Y", $dateDuJourSemaine);
        //echo $jour . " x " . $difference . "<br>";
    }
endforeach;

?>
<style type="text/css"> 
a:link 
{ 
 text-decoration:none; 
} 
</style>


<body style="background-color: #fed136;">
    <div class="container bg-white border  border-dark" style="margin-bottom: 2%;margin-top:2%">
        <h1 class="text-center" style="padding-top:4%;">Date & Heure</h1>
        <p class="text-center">Coiffeur: <span class="font-weight-bold" id="coiffeurChoisis"><?=$_SESSION["coi"]["COI_NOM"] . " " . $_SESSION["coi"]["COI_PRENOM"]?></span></p>
        <p class="text-center" style="margin-top: -1%;">Les horaires affichés ci-dessous sont pour: <?php
            $duree = 0;
            $texte = "";
            $compteur = 0;
            for($i = 0; $i <= 2; $i++){
                if(isset($_SESSION['ser'.$i])&& $_SESSION['ser'.$i] <> 'invalide')
                {   
                    if ($compteur == 0){
                        $texte = $_SESSION['ser'.$i]['SER_NOM'];
                        $compteur = 1;
                    }elseif($compteur == 1){
                        $texte = $texte . ', ' .$_SESSION['ser'.$i]['SER_NOM'];
                        $compteur = 2;
                    }
                    else{
                        $texte = $texte . ' et ' . $_SESSION['ser'.$i]['SER_NOM']; 
                    }
                    //echo  "<span class='font-weight-bold'>" . $_SESSION['ser'.$i]['SER_NOM'] . ", </span>";
                    $duree =  $_SESSION['ser'.$i]['SER_TEMPS_ESTIMATION'] + $duree;
                }
            }
            echo "<span class='font-weight-bold' id='prestationChoisis'>" . $texte . "</span>";
        ?></p>
        <p class="text-center" style="margin-top: -1%;">La prestation durera: <?=convertToHoursMins($duree, '%2dh%02dm')?></p>
        <div class="row" style="margin-bottom: -3%">
            <div class="col-2" style="margin-left: 2%;">
                        <a href="priserdv1" type="button" class="btn btn-secondary border border-dark">Retour</a>
            </div>
            <div class="offset-7 col-2 p-3 text-center" style="margin-left: 62%;">
                <?php if ($_SESSION["semainePriserdv2"] < $jourAfficherMax){ //limite la prise de rendez-vous de 1 mois ?>
                    <a   href="priserdv2?Semainepro=true"  class="far fa-arrow-alt-circle-right" style="font-size:125%; text-decoration: none; float: right;"></a>
                <?php } ?>
                <?php if ($_SESSION["semainePriserdv2"] > 0){ //permet de ne pas prendre de rendez-vous dans le passé?>
                    <a   href="priserdv2?Semaineavant=true"  class="far fa-arrow-alt-circle-left" style="font-size:125%; text-decoration: none; float: right;"></a>
                <?php } ?>
            </div>
        </div>
        <div class="row seven-cols border border-dark rounded" style="padding-top: 1%;margin: 2%;" >
            <?php foreach($joursem as $jour){ ?>
                <div class="col-md-1">
                    <div class="bg-dark text-white">
                        <p class="text-center"><?=$jour?></p>
                        <p class="text-center" style="font-size: 60%; margin-top: -15%;"><?=$dateJour[$jour]?></p>
                    </div>
                    <?php foreach(getAllTranchesHoraires($coiffeurId) as $tranche){ 
                        if ($tranche["tra_jour"] == $jour){
                            $débutPause = 99999;
                            $FinPause = -99999;
                            if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"] !== null && getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"] !== null){
                                $débutMinuteJournée = heureEnMinute($tranche["tra_heureDebutMatin"]);
                                $FinMinuteJournée = heureEnMinute($tranche["tra_heureFinMatin"]);
                            }
                            if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"] !== null && getTranchesHoraires($coiffeurId, $jour)["tra_heureFinAprem"] !== null){
                                if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"] == null OR getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"] == null){
                                    $débutMinuteJournée = heureEnMinute($tranche["tra_heureDebutAprem"]);
                                }else{
                                    $débutPause = heureEnMinute($tranche["tra_heureFinMatin"]);
                                    $FinPause = heureEnMinute($tranche["tra_heureDebutAprem"]);
                                }
                                $FinMinuteJournée = heureEnMinute($tranche["tra_heureFinAprem"]);
                            }
                            if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"] == null OR getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"] == null){
                                if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"] == null OR getTranchesHoraires($coiffeurId, $jour)["tra_heureFinAprem"] == null){
                                    $débutMinuteJournée = "noWork";
                                }
                            }
                            //echo mktime(convertToHoursMins(480, '%2d'), obtenirDesMinutesEnHeureMinute(480),0, getHour(transformeDateEUUS($dateJour[$jour]))[1], getHour(transformeDateEUUS($dateJour[$jour]))[2], getHour($dateJour[$jour])[0]);
                            
                            if ($débutMinuteJournée !== "noWork"){
                                $tempsTravailJournée = ($FinMinuteJournée - $débutMinuteJournée); 
                                $saveDebutJournée = $débutMinuteJournée;
                                $prestationDébutEnMinuteListe = array();
                                $prestationFinEnMinuteListe = array();

                                
                                if (getRdvCoiffeurAgendaRowCount(transformeDateEUUS($dateJour[$jour]), $coiffeurId) >= 1){
                                    foreach(getRdvCoiffeurAgenda(transformeDateEUUS($dateJour[$jour]), $coiffeurId) as $rdv){
                                        $prestationDébutEnMinuteListe[] = heureEnMinute($rdv["PER_HEURE_MIN_DEBUT"]);
                                        $prestationFinEnMinuteListe[] = heureEnMinute($rdv["PER_HEURE_MIN_FIN"]);
                                    }
                                    $compteur = 0;
                                }

                                if (getPauseAgendaCoiffeurRowCount(transformeDateEUUS($dateJour[$jour]), $coiffeurId) >= 1){
                                    foreach(getPauseAgendaCoiffeur(transformeDateEUUS($dateJour[$jour]), $coiffeurId) as $rdv){
                                        $prestationDébutEnMinuteListe[] = heureEnMinute($rdv["PER_HEURE_MIN_DEBUT"]);
                                        $prestationFinEnMinuteListe[] = heureEnMinute($rdv["PER_HEURE_MIN_FIN"]);
                                    }
                                    $compteur = 0;
                                }
                                
                            /*Ajouter un if si il y a pas de rendez-vous, afficher les disponibilité*/
                            while($débutMinuteJournée < $FinMinuteJournée){ 

                                if (getRdvCoiffeurAgendaRowCount(transformeDateEUUS($dateJour[$jour]), $coiffeurId) >= 1 OR getPauseAgendaCoiffeurRowCount(transformeDateEUUS($dateJour[$jour]), $coiffeurId) >= 1){

                                    if ($débutMinuteJournée >= $prestationFinEnMinuteListe[$compteur]){
                                        $compteur++;
                                    }

                                    if ($compteur > (count($prestationDébutEnMinuteListe) - 1)){
                                        $compteur = (count($prestationDébutEnMinuteListe) - 1);
                                    }
                                    
                                    if ($prestationDébutEnMinuteListe[$compteur] <= $débutMinuteJournée AND $débutMinuteJournée < $prestationFinEnMinuteListe[$compteur]){ ?>
                                        <!--<div class="rounded" style="border: 1px solid #989898; margin-bottom: 4%;">
                                            <p class="text-center" style="margin-bottom: -2%;"><strike><i class="far fa-times-circle"></i><?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?></strike></p>
                                        </div> Ancienne affichage-->
                                    <?php }elseif ($débutMinuteJournée > ($prestationDébutEnMinuteListe[$compteur] - $tempsDePrestation) AND $prestationFinEnMinuteListe[$compteur] > $débutMinuteJournée){?>
                        
                                    <?php }elseif ($débutMinuteJournée > ($FinMinuteJournée - $tempsDePrestation)){?>
                                        
                                    <?php }elseif($débutMinuteJournée > ($débutPause - $tempsDePrestation) AND $débutMinuteJournée < $FinPause){?>
                                        
                                    <?php }elseif(mktime(convertToHoursMins($débutMinuteJournée, '%2d'), obtenirDesMinutesEnHeureMinute($débutMinuteJournée),0,getHour(transformeDateEUUS($dateJour[$jour]))[1],getHour(transformeDateEUUS($dateJour[$jour]))[2],getHour(transformeDateEUUS($dateJour[$jour]))[0]) < time()+10800){?>
                                        <!-- <div class="rounded" style="border: 1px solid #989898; margin-bottom: 4%;">
                                            <p class="text-center" style="margin-bottom: -2%;"><strike><i class="far fa-times-circle"></i><?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?></strike></p>
                                        </div> -->
                                    <?php }else{ ?>
                                        <div class="rounded" style="border: 1px solid #989898; margin-bottom: 4%;" id="date=<?=$dateJour[$jour]?>&heure=<?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?>">
                                            <a href="priserdv3?date=<?=$dateJour[$jour]?>&heure=<?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?>" ><p class="text-center" style="margin-bottom: -2%;"><i id="classIconRemove" class="far fa-circle"></i><?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?></p></a>
                                        </div>
                                    <?php }
                                    
                                    
                                }else{ 
                                        if ($débutMinuteJournée > ($FinMinuteJournée - $tempsDePrestation)){?>
                                        
                                        <?php }elseif($débutMinuteJournée > ($débutPause - $tempsDePrestation) AND $débutMinuteJournée < $FinPause){?>
                                            
                                        <?php }elseif(mktime(convertToHoursMins($débutMinuteJournée, '%2d'), obtenirDesMinutesEnHeureMinute($débutMinuteJournée),0,getHour(transformeDateEUUS($dateJour[$jour]))[1],getHour(transformeDateEUUS($dateJour[$jour]))[2],getHour(transformeDateEUUS($dateJour[$jour]))[0]) < time()+10800){?>
                                            <!-- <div class="rounded" style="border: 1px solid #989898; margin-bottom: 4%;">
                                                <p class="text-center" style="margin-bottom: -2%;"><strike><i class="far fa-times-circle"></i><?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?></strike></p>
                                            </div> -->
                                        <?php }else{ ?>
                                        <div class="rounded" style="border: 1px solid #989898; margin-bottom: 4%;" id="date=<?=$dateJour[$jour]?>&heure=<?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?>">
                                            <a href="priserdv3?date=<?=$dateJour[$jour]?>&heure=<?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?>" ><p class="text-center" style="margin-bottom: -2%;"><i id="classIconRemove" class="far fa-circle"></i><?=convertToHoursMins($débutMinuteJournée, '%02dh%02d')?></p></a>
                                        </div>
                                <?php }} 
                                
                                $débutMinuteJournée = $débutMinuteJournée + $minuteEntreRendezVous;
                            }} ?> 
                    <?php }} ?>
            </div>
            <?php } ?>
        </div>
    </div>
</body>


<?php
$title = "Elysée - Valider le rendez-vous";
include('includes/header.php'); 


if(!isset($_SESSION['coi']) || $_SESSION['coi'] == 'invalide')
{
    ?> <meta http-equiv="refresh" content="0; url=priserdv1"> <?php
}

for($i = 0; $i <= 2; $i++)
{
    if(isset($_SESSION['ser'.$i]))
    {
        if($_SESSION['ser'.$i] == 'invalide')
        {
            ?> <meta http-equiv="refresh" content="0; url=priserdv1"> <?php
        }
        
    }
};

//trouver le jour du rendez-vous qui servira a récupéré les horaires
$frdate= $_GET["date"];
$joursem2 = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
// extraction des jour, mois, an de la date
list($jour, $mois, $annee) = explode('/', $frdate);
// calcul du timestamp
$timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
// affichage du jour de la semaine
$jourRdv = $joursem2[date("w",$timestamp)];
//////////


//Calcul du prix, temps et crée une liste avec les ids des services
$duree = 0;
$prix = 0;
$serviceIdListe = array();
for($i = 0; $i <= 2; $i++){
    if(isset($_SESSION['ser'.$i])&& $_SESSION['ser'.$i] <> 'invalide')
    {
        $duree =  $_SESSION['ser'.$i]['SER_TEMPS_ESTIMATION'] + $duree;
        $prix = $prix + $_SESSION['ser'.$i]['SER_PRIX'];
        $serviceIdListe[] = $_SESSION['ser' . $i]['SER_ID'];
    }
}


//Verification des disponibilités
$heure = timeToTime($_GET["heure"]);
$date = transformeDateEUUS($_GET["date"]);
$heureFinPrestation = convertToHoursMins(heureToMinute($_GET["heure"]) + heureToMinute(convertToHoursMins($duree, '%02dh%02d')));

//Création de liste et on ajoute les heures début et fin des rendez-vous ou des pauses
$listeDesPrestationPauseDebut = array();
$listeDesPrestationPauseFin = array();
foreach(getRdvCoiffeurAgenda($date,$_SESSION["coi"]["COI_ID"]) as $rdv){
    $listeDesPrestationPauseDebut[] = $rdv["PER_HEURE_MIN_DEBUT"];
    $listeDesPrestationPauseFin[] = $rdv["PER_HEURE_MIN_FIN"];

}
foreach(getPauseAgendaCoiffeur($date,$_SESSION["coi"]["COI_ID"]) as $pause){
    $listeDesPrestationPauseDebut[] = $rdv["PER_HEURE_MIN_DEBUT"];
    $listeDesPrestationPauseFin[] = $rdv["PER_HEURE_MIN_FIN"];
}

//On trouve l'heure de début et l'heure de fin
$débutPause = "aucune";
$FinPause = "aucune";
if (getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureDebutMatin"] !== null && getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureFinMatin"] !== null){
    $débutJournée = getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureDebutMatin"];
    $FinJournée = getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureFinMatin"];
}
if (getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureDebutAprem"] !== null && getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureFinAprem"] !== null){
    if (getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureDebutMatin"] == null OR getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureFinMatin"] == null){
        $débutJournée = getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureDebutAprem"];
    }else{
        $débutPause = getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureFinMatin"];
        $FinPause = getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureDebutAprem"];
    }
    $FinJournée = getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureFinAprem"];
}
if (getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureDebutMatin"] == null OR getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureFinMatin"] == null){
    if (getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureDebutAprem"] == null OR getTranchesHoraires($_SESSION["coi"]["COI_ID"], $jourRdv)["tra_heureFinAprem"] == null){
        $débutJournée = "noWork";
    }
}
//echo "<br>" . $débutJournée . "<br>" . $débutPause . "<br>" . $FinPause . "<br>" . $FinJournée;


//var_dump($listeDesPrestationPauseDebut);
//var_dump($listeDesPrestationPauseFin);

$horairePossible = true;
for($compteur = 0; $compteur<count($listeDesPrestationPauseDebut); $compteur++){
    //echo $listeDesPrestationPauseDebut[$compteur] . " Fin" . $listeDesPrestationPauseFin[$compteur]; 
    if ($heure >= $listeDesPrestationPauseDebut[$compteur] and $heure < $listeDesPrestationPauseFin[$compteur]){
        $horairePossible = false;
    }
    if ($heureFinPrestation >= $listeDesPrestationPauseDebut[$compteur] and $heureFinPrestation < $listeDesPrestationPauseFin[$compteur]){
        $horairePossible = false;
    }
}

if ($heure < $débutJournée or $heure >= $FinJournée){
    $horairePossible = false;

}
if ($heureFinPrestation < $débutJournée or $heureFinPrestation > $FinJournée){
    $horairePossible = false;
}
if ($débutPause <> "aucune" or $FinPause <> "aucune"){
    if ($heure >= $débutPause AND $heure < $FinPause){
        $horairePossible = false;
    }
    if ($heureFinPrestation > $débutPause AND $heureFinPrestation < $FinPause){
        $horairePossible = false;
    }
}





//Après avoir cliqué sur POST
if ($horairePossible){
    if(isset($_POST["validerPriserdv"])){
        if (empty($_POST["nomClient"]) AND empty($_POST["prenomClient"]) AND empty($_POST["telClient"])
        AND empty($_POST["mailClientDejaExistant"]) AND empty($_POST["telClientDejaExistant"])){
            // echo '<script type="text/javascript">window.location.href(priserdv3?date='. $_GET["date"].'&heure=' . $_GET["heure"] . ');<\script>';
            // echo "asd";
            ?>
            <meta http-equiv="refresh" content="0; url=priserdv3?date=<?= $_GET["date"].'&heure=' . $_GET["heure"]?>">


        <?php }
        if (!empty($_POST["nomClient"]) AND !empty($_POST["prenomClient"]) AND !empty($_POST["telClient"])){

        
        //echo $_POST["nomClient"] . " " . $_POST["prenomClient"] . " " . $_POST["telClient"] . " " . $_POST["mailClient"];
        
        
        if ($_POST["mailClient"] == ""){ //l'email na pas été rentré
            if (getGetClientTelRowCount($_POST["telClient"]) == 1){
                //Le client existe déja, nous inserons le rendez-vous
                $idClient = getClientTel($_POST["telClient"])["CLI_ID"];
            }
            else{
                //crée le client
                addClient($_POST["nomClient"], $_POST["prenomClient"], $_POST["telClient"], null);
                $idClient = getLastClient()["maximum"];
            }
            insertionPeriode(transformeDateEUUS($_GET["date"]), timeToTime($_GET["heure"]), $heureFinPrestation);
            insertRendezvous($_SESSION["coi"]["COI_ID"], $idClient, $prix);
            insertRdvPeriode(getLastRendezVous()["maximum"], getLastPeriod()["maximum"]);
            foreach($serviceIdListe as $idService){
                insertRdvService($idService, getLastRendezVous()["maximum"]);
            }
            $afficherRendezVous = true;
        }
        else{
            //echo $_POST["nomClient"] . " " . $_POST["prenomClient"] . " " . $_POST["telClient"] . " " . $_POST["mailClient"];
            if (getGetClientTelEmailRowCount($_POST["telClient"], $_POST["mailClient"]) == 1){
                //1 Client ok insertion
                $idClient = getGetClientTelEmail($_POST["telClient"], $_POST["mailClient"])["CLI_ID"];
                insertionPeriode(transformeDateEUUS($_GET["date"]), timeToTime($_GET["heure"]), $heureFinPrestation);
                insertRendezvous($_SESSION["coi"]["COI_ID"], $idClient, $prix);
                insertRdvPeriode(getLastRendezVous()["maximum"], getLastPeriod()["maximum"]);
                foreach($serviceIdListe as $idService){
                    insertRdvService($idService, getLastRendezVous()["maximum"]);
                }
                $afficherRendezVous = true;

            }
            elseif(getGetClientTelEmailRowCount($_POST["telClient"], $_POST["mailClient"]) > 1 ){
                //email et numero de téléphone avec des clients différents
                //echo "faire afficher 2 un choix entre les deux clients";
                $choisirClient = true;
                $choisirClient_clientTelId = getGetClientTel($_POST["telClient"])["CLI_ID"]; 
                $choisirClient_clientEmailId = getGetClientEmail($_POST["mailClient"])["CLI_ID"];
            }
            else{
                addClient($_POST["nomClient"], $_POST["prenomClient"], $_POST["telClient"], $_POST["mailClient"]);
                //insertionPeriode(transformeDateEUUS($_GET["date"]), timeToTime($_GET["heure"]), $heureFinPrestation);
                insertionPeriode(transformeDateEUUS($_GET["date"]), timeToTime($_GET["heure"]), $heureFinPrestation);
                // echo "date: " . transformeDateEUUS($_GET["date"]) . " HeureD: " .  timeToTime($_GET["heure"]) . " HeureFin: " . $heureFinPrestation;
                // echo getLastPeriod()["maximum"];
                // echo "coi id: " . $_SESSION["coi"]["COI_ID"] . " idLastClient: " . getLastClient()["maximum"] . " prix: " . $prix;
                insertRendezvous($_SESSION["coi"]["COI_ID"], getLastClient()["maximum"], $prix);
                insertRdvPeriode(getLastRendezVous()["maximum"], getLastPeriod()["maximum"]);
                foreach($serviceIdListe as $idService){
                    insertRdvService($idService, getLastRendezVous()["maximum"]);
                }
                $afficherRendezVous = true;
            }
        }
    }elseif (!empty($_POST["mailClientDejaExistant"]) OR !empty($_POST["telClientDejaExistant"])){
        $mail = trim(htmlspecialchars($_POST["mailClientDejaExistant"]));
        $numero = trim(htmlspecialchars($_POST["telClientDejaExistant"]));

        if (getGetClientTelEmailRowCount($numero, $mail) > 1){
            //2 information différent
            $choisirClient = true;
            $choisirClient_clientTelId = getGetClientTel($numero)["CLI_ID"]; 
            $choisirClient_clientEmailId = getGetClientEmail($mail)["CLI_ID"];
        }elseif(getGetClientTelRowCount($numero) == 1){
            $idClient = getGetClientTel($numero)["CLI_ID"];
            insertionPeriode(transformeDateEUUS($_GET["date"]), timeToTime($_GET["heure"]), $heureFinPrestation);
            insertRendezvous($_SESSION["coi"]["COI_ID"], $idClient, $prix);
            insertRdvPeriode(getLastRendezVous()["maximum"], getLastPeriod()["maximum"]);
            foreach($serviceIdListe as $idService){
                insertRdvService($idService, getLastRendezVous()["maximum"]);
            }
            $afficherRendezVous = true;
        }elseif(getNbClientEmail($mail) == 1){
            $idClient = getGetClientEmail($mail)["CLI_ID"];
            insertionPeriode(transformeDateEUUS($_GET["date"]), timeToTime($_GET["heure"]), $heureFinPrestation);
            insertRendezvous($_SESSION["coi"]["COI_ID"], $idClient, $prix);
            insertRdvPeriode(getLastRendezVous()["maximum"], getLastPeriod()["maximum"]);
            foreach($serviceIdListe as $idService){
                insertRdvService($idService, getLastRendezVous()["maximum"]);
            }
            $afficherRendezVous = true;
        }else{?>

            <body style="background-color: #fed136;;">
                <div class="container border border-dark" style="background-color: white; margin-top: 2%;margin-bottom: 27%;">
                    <!--<h1 class="text-center" style="margin-top:5%;">Rendez-vous</h1>-->
                    <h3 class="text-center" style="margin-top:5%; ">Le mail et/ou le numéro de téléphone rentré sont incorrecte</h3>
                    <a href="priserdv3?date=<?=$_GET["date"]?>&heure=<?=$_GET["heure"]?>">    
                        <p class=" text-center">
                            Cliquer ici
                        </p>
                    </a>
                </div>
            </body>
            <?php
            }
        }else{
            echo '<script type="text/javascript">window.location(priserdv3?date='. $_GET["date"].'&heure=' . $_GET["heure"] . ');<\script>';
        }
    }elseif(isset($_GET["id"])){
        $idClient = getClient($_GET["id"])["CLI_ID"];
        insertionPeriode(transformeDateEUUS($_GET["date"]), timeToTime($_GET["heure"]), $heureFinPrestation);
        insertRendezvous($_SESSION["coi"]["COI_ID"], $idClient, $prix);
        insertRdvPeriode(getLastRendezVous()["maximum"], getLastPeriod()["maximum"]);
        foreach($serviceIdListe as $idService){
            insertRdvService($idService, getLastRendezVous()["maximum"]);
        }
        $afficherRendezVous = true;
    }
    

}else{?>

<body style="background-color: #fed136;">
    <div class="container border border-dark" style="background-color: white; margin-top: 4%; margin-bottom: 27%;">
        <!--<h1 class="text-center" style="margin-top:5%;">Rendez-vous</h1>-->
        <h2 class="text-center" style="margin-top:5%; ">La date que vous avez choisis à déja été sélectionné</h2>
        <a href="priserdv1">
            <p class=" text-center">
            Cliquer ici pour prendre rendez-vous
            </p>
        </a>
    </div>
</body>
<?php
} ?>


<?php if (isset($afficherRendezVous)){ ?>

    <body style="background-color: #fed136;;">
        <div class="container border border-dark" style="background-color: white; margin-top: 2%; margin-bottom: 27%;">
            <!--<h1 class="text-center" style="margin-top:5%;">Rendez-vous</h1>-->
            <h2 class="text-center" style="margin-top:5%; ">Votre rendez-vous à bien été enregistré</h2>
                <p class=" text-center">
                    <?php
                    setlocale(LC_TIME, 'french');
                    $date = transformeDateEUUS($_GET["date"]);
                    echo 'Au nom de ' . getClient($idClient)['CLI_NOM'] . ' ' . getClient($idClient)['CLI_PRENOM'];
                    echo ' pour le ' . strftime('%A %d %B', strtotime($date)) . " à " . $_GET["heure"];
                    echo '<br>';
                    echo $_SESSION["coi"]['COI_NOM'] . ' ' . $_SESSION["coi"]['COI_PRENOM'] . " est le coiffeur qui s'occupera de la prestation";
                    ?>
                </p>
            </div>
        </div>
    </body>
<?php } if (isset($choisirClient)){?>

<body style="background-color:white;">
    <div class="container border border-dark" style="background-color: lightgray; margin-top: 2%;margin-bottom: 27%;">
        <!--<h1 class="text-center" style="margin-top:5%;">Rendez-vous</h1>-->
        <h3 class="text-center" style="margin-top:5%; ">Veuillez choisir au nom de qui voulez-vous prendre le rendez-vous</h3>
        <h5 class="text-center" style="margin-top:1%; ">Le numéro de téléphone et le mail correspond à deux clients différents</h5>
            <div class="row" style="margin: 7%;">
            
                <div class="col marginauto text-center">
                    <!-- Tel Client -->
                    <a href="priserdv4?date=<?=$_GET["date"]?>&heure=<?=$_GET["heure"]?>&id=<?=$choisirClient_clientTelId?>" class="btn btn-secondary border border-dark"><?=getClient($choisirClient_clientTelId)["CLI_NOM"] . " " . getClient($choisirClient_clientTelId)["CLI_PRENOM"]?></a>
                </div>
                <div class="col marginauto text-center">
                    <!-- Mail client -->
                    <a href="priserdv4?date=<?=$_GET["date"]?>&heure=<?=$_GET["heure"]?>&id=<?=$choisirClient_clientEmailId?>" class="btn btn-secondary border border-dark"><?=getClient($choisirClient_clientEmailId)["CLI_NOM"] . " " . getClient($choisirClient_clientEmailId)["CLI_PRENOM"]?></a>
                </div>
            </div>
        <div class="row" style="margin-top: -2%; margin-bottom: 2%;">
            <div class="col text-center">
                <a href="priserdv1" type="button" class="btn btn-secondary border border-dark">Retour</a>
            </div>
        </div>
    </div>
</body>
            
<?php } ?>


<div style="position:fixed; bottom: 0;">
<?php include('includes/footer.php');?>
</div>



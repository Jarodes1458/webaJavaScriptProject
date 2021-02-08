<?php
$title = "Elysée - Agenda";
include('includes/header.php');



if (isset($_SESSION["COI_POSTE"])){

    $pxHeure = 80; //Parametre

    //Liste jour de la semaine dans l'ordre
    $joursem = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");


    //Pour récuperer l'id du coiffeur que l'on a sélectionné 
    if (isset($_GET["coiffeur"])){
        $coiffeurId = $_GET["coiffeur"];
    }else{
        $coiffeurId = $_SESSION["COI_ID"];
    }

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


    //Pour choisir la semaine
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
    // code pris sur le site: https://forum.pcastuces.com/php__trouver_jour_semaine_selon_date-f2s14273.htm#:~:text=%24timestamp%20%3D%20mktime%20()%3B,mois%2C%20jour%2C%20ann%C3%A9e).
    $dateDuJourSemaine = mktime(0,0,0,date("m"),date("d")+$_SESSION["semaine"],date("Y"));
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
            $dateDuJourSemaine = mktime(0,0,0,date("m"),date("d")+$difference+$_SESSION["semaine"],date("Y"));
            $dateJour[$jour] = date ("d/m/Y", $dateDuJourSemaine);
            //echo $jour . " x " . $difference . "<br>";
        }
    endforeach;

    ?>

    <body class="bg-white">
        <br>
        <div class="container-fluid">
            <p class="text-center text-dark" style="font-size: 140%;">Agenda du coiffeur <?=getCoiffeurId($coiffeurId)["COI_NOM"] . " " . getCoiffeurId($coiffeurId)["COI_PRENOM"]?></p>
            <div class="row">
                <div class="col-5" style="margin: auto; text-align:center; font-size: 65%; margin-bottom: 1%;">
                    <a   href="agenda?Semaineavant=true&coiffeur=<?=$coiffeurId?>"  class="d-inline far fa-arrow-alt-circle-left" style="padding-right:4%;font-size:125%; text-decoration: none; "></a>
                    <a   href="agenda?reset=true&coiffeur=<?=$coiffeurId?>"  style="padding-right:4%;font-size:125%; text-decoration: none; ">Retour semaine de départ</a>
                    <a   href="agenda?Semainepro=true&coiffeur=<?=$coiffeurId?>"  class="far fa-arrow-alt-circle-right" style="font-size:125%; text-decoration: none; "></a>
                </div>
            </div>

            <?php if ($modificationPossible){?>
                <div class="row w-100" style="margin:auto; text-align:center; margin-bottom:1%;">
                    <div class="marginauto col-12">
                        <a href="ajouterPausePourCoiffeur?coiffeur=<?=$coiffeurId?>" class="col-2 btn border border-dark rounded bg-light text-center" style="background-color: #99d6ff; margin-right: 1%">Ajouter une pause</a>
                        <a href="priserdv1?coiffeur=<?=$coiffeurId?>" class="col-2 btn border border-dark rounded text-center  bg-light" style="background-color: #ff8080; margin-left: 1%">Ajouter un rendez-vous</a>
                    </div>
                </div>
            <?php } ?>
                
            <div class="row" id="nomCoiffeur" style="width: 80%; margin:auto; text-align: center;">
                <?php foreach(getAllCoiffeur() as $coiffeur):?>
                    <a href="agenda?coiffeur=<?=$coiffeur["COI_ID"]?>"   class="border border-dark rounded text-center text-white" style="text-decoration: none; background-color: #787878; margin:auto; width: <?=100/getAllCoiffeurRowCount()?>%">
                    <?=$coiffeur["COI_NOM"] . " " . $coiffeur["COI_PRENOM"]?></a>
                <?php endforeach;?>
            </div>




            <div class="row seven-cols border border-dark rounded" style="padding-top: 1%;margin: 2%; background-color: Silver; padding-bottom: 1%;" >
                <?php foreach($joursem as $jour){ 

                    if (getTranchesHorairesRowCount($coiffeurId, $jour) >= 1 ){ ?>
                        <div class="col-md-1">
                            <h2 class="text-center border border-dark" style="background-color: #787878; color: white;"><?=$jour?><p class="lead"><?=$dateJour[$jour]?></p></h2>
                            <?php if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"] !== null && getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"] !== null){
                                $tempsTravailMatin = diff_time(getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"],getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"] ); 
                                $tempsAvantTravailMatin = diff_time(getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"], '08:00:00');?>
                                <div class="matin">
                                    <p class="text-center border border-dark" style="margin-bottom: -3%; margin-top: <?=getHourTime($tempsAvantTravailMatin)*$pxHeure?>px;"><?=timeHourMinute(getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"])?></p>
                                    <div onclick="donneesRendezExistant('<?=$dateJour[$jour]?>')" class="border-left border-top border-right border-dark" style="background-color: #d9d9d9; position: relative; height: <?=getHourTime($tempsTravailMatin)*$pxHeure?>px;">
                                        <?php foreach(getRdvCoiffeurAgenda(transformeDateEUUS($dateJour[$jour]), $coiffeurId) as $prestation){
                                                if ($prestation["PER_HEURE_MIN_DEBUT"] >= getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"] &&
                                                $prestation["PER_HEURE_MIN_DEBUT"] <= getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"]){ 
                                                    $tempsPrestation = diff_time($prestation["PER_HEURE_MIN_FIN"], $prestation["PER_HEURE_MIN_DEBUT"]);
                                                    $tailleAvantRDV = diff_time($prestation["PER_HEURE_MIN_DEBUT"], getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"]);?>
                                                    <?php if ($modificationPossible) { ?><a href="SupprimerRdv?idrdv=<?=$prestation['RDV_ID']?>"> <?php } ?>
                                                        <div class="border-bottom border-dark" style="background-color: rgba(255,233,199,1); position: absolute; top: <?=getHourTime($tailleAvantRDV)*$pxHeure?>px; height: <?=getHourTime($tempsPrestation)*$pxHeure?>px; width: 100%;">
                                                            <p style="margin-bottom: -3%; margin-top: 1%;font-size: 65%; text-align:center;"><?=$prestation["CLI_NOM"] . " " . $prestation["CLI_PRENOM"]?><p style="font-size: 55%; text-align: center;"><?=timeHourMinute($prestation["PER_HEURE_MIN_DEBUT"]). ' - ' . timeHourMinute($prestation["PER_HEURE_MIN_FIN"])?></p></p>
                                                        </div>
                                                    <?php if ($modificationPossible) { ?></a> <?php } ?>
                                                <?php 
                                                }
                                            }
                                            foreach(getPauseAgendaCoiffeur(transformeDateEUUS($dateJour[$jour]), $coiffeurId) as $pause){
                                                //Verification pour eviter les doubles affichages de pause
                                                if (getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"] >= $pause["PER_HEURE_MIN_DEBUT"] AND  getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"] >= $pause["PER_HEURE_MIN_FIN"]){
                                                    $tempsDePause = diff_time($pause["PER_HEURE_MIN_FIN"], $pause["PER_HEURE_MIN_DEBUT"]);
                                                    $tailleAvantPause = diff_time($pause["PER_HEURE_MIN_DEBUT"], getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"]);
                                                    ?>
                                                <?php if ($modificationPossible) { ?><a href="supprimerPause.php?idpause=<?= $pause['PER_ID'] ?>" id="<?=timeHourMinute($pause['PER_HEURE_MIN_DEBUT']).' '.timeHourMinute($pause['PER_HEURE_MIN_FIN']).' '.$dateJour[$jour]?>"> <?php } ?>
                                                    <div class="border-bottom border-dark" style="background-color: rgba(196,228,253,1); position: absolute; top: <?=getHourTime($tailleAvantPause)*$pxHeure?>px; height: <?=getHourTime($tempsDePause)*$pxHeure?>px; width: 100%;">
                                                        <p style="margin-bottom: -3%; margin-top: 1%;font-size: 65%; text-align:center;"><?=couperMots($pause["PAU_DESCRIPTION"],15)?><p style="font-size: 55%; text-align: center;"><?=timeHourMinute($pause["PER_HEURE_MIN_DEBUT"]). ' - ' . timeHourMinute($pause["PER_HEURE_MIN_FIN"])?></p></p>
                                                    </div>
                                                <?php if ($modificationPossible) { ?></a> <?php } ?>
                                        <?php }} ?>
                                    </div> 
                                    <p class="text-center border border-dark" style="margin-bottom: -3%;"><?=timeHourMinute(getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"])?></p>
                                </div>   
                            <?php } ?>

                            <?php if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutMatin"] !== null && getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"] !== null &&
                            getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"] !== null && getTranchesHoraires($coiffeurId, $jour)["tra_heureFinAprem"] !== null ){
                                $tempsPause = diff_time(getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"],getTranchesHoraires($coiffeurId, $jour)["tra_heureFinMatin"] ); ?>
                            <div class="midi">
                                <div style="height: <?=getHourTime($tempsPause)*$pxHeure?>px;"></div>
                            </div>
                            <?php } ?>

                            <?php if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"] !== null && getTranchesHoraires($coiffeurId, $jour)["tra_heureFinAprem"] !== null ){
                                $tempsTravailAprem = diff_time(getTranchesHoraires($coiffeurId, $jour)["tra_heureFinAprem"],getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"] );?>
                                <div class="aprem">
                                <p class="text-center border border-dark" style="margin-bottom: -3%;"><?=timeHourMinute(getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"])?></p>
                            <div onclick="donneesRendezExistant('<?=$dateJour[$jour]?>')" class="border-left border-top border-right border-dark" style="background-color: #d9d9d9; position: relative; height: <?=getHourTime($tempsTravailAprem)*$pxHeure?>px;">
                                        <?php foreach(getRdvCoiffeurAgenda(transformeDateEUUS($dateJour[$jour]), $coiffeurId) as $prestation){
                                                if ($prestation["PER_HEURE_MIN_DEBUT"] >= getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"] &&
                                                $prestation["PER_HEURE_MIN_DEBUT"] <= getTranchesHoraires($coiffeurId, $jour)["tra_heureFinAprem"]){ 
                                                    $tempsPrestation = diff_time($prestation["PER_HEURE_MIN_FIN"], $prestation["PER_HEURE_MIN_DEBUT"]);
                                                    $tailleAvantRDV = diff_time($prestation["PER_HEURE_MIN_DEBUT"], getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"]);?>
                                                    <?php if ($modificationPossible) { ?><a href="SupprimerRdv?idrdv=<?=$prestation['RDV_ID']?>"> <?php } ?>
                                                        <div class="border-bottom border-dark" style="background-color: rgba(255,233,199,1); position: absolute; top: <?=getHourTime($tailleAvantRDV)*$pxHeure?>px; height: <?=getHourTime($tempsPrestation)*$pxHeure?>px; width: 100%;">
                                                            <p style="margin-bottom: -3%; margin-top: 1%;font-size: 65%; text-align:center;"><?=$prestation["CLI_NOM"] . " " . $prestation["CLI_PRENOM"]?><p style="font-size: 55%; text-align: center;"><?=timeHourMinute($prestation["PER_HEURE_MIN_DEBUT"]). ' - ' . timeHourMinute($prestation["PER_HEURE_MIN_FIN"])?></p></p>
                                                        </div>
                                                    <?php if ($modificationPossible) { ?></a> <?php } ?>
                                                <?php 
                                                }
                                            }
                                            foreach(getPauseAgendaCoiffeur(transformeDateEUUS($dateJour[$jour]), $coiffeurId) as $pause){
                                                //Verification pour eviter les doubles affichages de pause
                                                if (getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"] <= $pause["PER_HEURE_MIN_DEBUT"] AND  getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"] <= $pause["PER_HEURE_MIN_FIN"]){
                                                    $tempsDePause = diff_time($pause["PER_HEURE_MIN_FIN"], $pause["PER_HEURE_MIN_DEBUT"]);
                                                    $tailleAvantPause = diff_time($pause["PER_HEURE_MIN_DEBUT"], getTranchesHoraires($coiffeurId, $jour)["tra_heureDebutAprem"]);
                                                    ?>
                                                <?php if ($modificationPossible) { ?><a href="supprimerPause.php?idpause=<?= $pause['PER_ID'] ?>" id="<?=timeHourMinute($pause['PER_HEURE_MIN_DEBUT']).' '.timeHourMinute($pause['PER_HEURE_MIN_FIN']).' '.$dateJour[$jour]?>"> <?php } ?>
                                                    <div style="border-bottom: 1px solid black; background-color: rgba(196,228,253,1); position: absolute; top: <?=getHourTime($tailleAvantPause)*$pxHeure?>px; height: <?=getHourTime($tempsDePause)*$pxHeure?>px; width: 100%;">
                                                        <p style="margin-bottom: -3%; margin-top: 1%;font-size: 65%; text-align:center;"><?=couperMots($pause["PAU_DESCRIPTION"],15)?><p style="font-size: 55%; text-align: center;"><?=timeHourMinute($pause["PER_HEURE_MIN_DEBUT"]). ' - ' . timeHourMinute($pause["PER_HEURE_MIN_FIN"])?></p></p>
                                                    </div>
                                                <?php if ($modificationPossible) { ?></a> <?php } ?>
                                        <?php }} ?>
                                    </div> 
                                    <p class="text-center border border-dark" style="margin-bottom: -3%;"><?=timeHourMinute(getTranchesHoraires($coiffeurId, $jour)["tra_heureFinAprem"])?></p>
                                </div>
                            <?php } ?>
                        </div>
                <?php }else{ ?>
                    <div class="col-md-1">
                        <h2 class="text-center border border-dark" style="background-color: #787878; color: white;"><?=$jour?><p class="lead"><?=$dateJour[$jour]?></p></h2>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </body>


    <div class="modal fade bd-example-modal" style="background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);" data-backdrop="false" id="">
        <div class="modal-dialog modal-lg " role="document">
            <div>
                <div class="row" style="height: 200px;">
                    <div class="col-6 " tabindex="-1"  style="background-color: gray; border-right: 4px solid black;" data-toggle="modal" data-target="#AjouterUnClient">
                    <a href="ajouterPausePourCoiffeur.php">test</a>
                        <h5 style="position: absolute; top: 45%;padding-left:15%; color: white;">Créer un rendez-vous</h5>
                    </div>
                    <div class="col-6" style="background-color: lightgray;">
                    <a href="ajouterPausePourCoiffeur.php">test</a>
                        <h5 style="position: absolute; top: 45%;padding-left:20%;">Ajouter une pause</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="choisirClient" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="padding-left : 33%;" id="exampleModalLabel">Ajouter :</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="border-top: 0.3px ridge black; padding-top: 4%;">
            <a href="priserdv1?coiffeur=<?=$coiffeurId?>" type="button" class="btn btn-danger" style="color:white; margin-left:2%;">Un rendez-vous</a>
            <a href="ajouterPausePourCoiffeur" type="button" class="btn btn-info" style="color:white; margin-left:3%;">Une pause</a>
        </div>
        <div class="text-center" style="border-top: 0.3px ridge black; padding-top: 2%;">
            <a type="button" class="btn btn-success" style="color:white;" data-dismiss="modal">Fermer</a>
        </div>
        </div>
    </div>
    </div>


    <div class="container-fluid">
    <div class="modal fade bd-example-modal" style="background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);" data-backdrop="false" id="AjouterUnClient" tabindex="-1" role="dialog" aria-labelledby="AjouterUnClient" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title font-weight-bold" id="AjouterUnClient">Ajouter un client</p>
                </div>
                <div class="modal-body">
                    <form method="POST" action="liste des clients">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <p class="font-weight-bold" style="font-size: 65%;">Nom: </p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nomClient" name="nomClient" placeholder="obligatoire" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <p class="font-weight-bold" style="font-size: 65%;">Prenom: </p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="prenomClient" name="prenomClient" placeholder="obligatoire" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <p class="font-weight-bold" style="font-size: 65%;">Téléphone: </p>
                                <div class="form-group">
                                    <input type="tel" class="form-control" id="telClient" name="telClient" placeholder="obligatoire" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <p class="font-weight-bold" style="font-size: 65%;">Adresse mail: </p>
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
    <div class="modal fade bd-example-modal" style="background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);" data-backdrop="false" id="ClientExistant" tabindex="-1" role="dialog" aria-labelledby="ClientExistant" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title font-weight-bold" id="ClientExistant">Client existant</p>
                </div>
                <div class="modal-body">
                    <h2  style="text-align: center;margin-top:55px">Liste des Clients du Salon</h2>
                    </div>
                    <div style="padding:5%">                        
                        <table id="dtBasicExample" class="table table-striped table-responsive-sm" style="font-size: 55%;">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="th-sm">Nom</th>
                            <th scope="th-sm">Prenom</th>
                            <th scope="th-sm">Choisir un client</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach(getAllClientPourCoiffeur($coiffeurId) as $client){ ?>
                            <tr>
                                <td><?=$client["cli_nom"]?></td>
                                <td><?=$client["cli_prenom"]?></td>
                                    <td>
                                    <a href="creerRdvParUnCoiffeur?id=<?=$client["cli_id"]?>" class="far fa-address-card"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                    <script> //datatable
                        $(document).ready(function () {
                        $('#dtBasicExample').DataTable();
                        $('.dataTables_length').addClass('bs-select');
                    });

                    
                    </script>
                    <form method="POST" action="creerRdvParUnCoiffeur.php">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <p class="font-weight-bold" style="font-size: 65%;">Téléphone: </p>
                                <div class="form-group">
                                    <input type="tel" class="form-control" id="telClientExistant" name="telClientExistant" placeholder="0787777777">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <p class="font-weight-bold" style="font-size: 65%;">Adresse mail: </p>
                                <div class="form-group">
                                    <input type="mail" class="form-control" id="mailClientExistant" name="mailClientExistant" placeholder="blabla@gmail.com">
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <input type="text" class="form-control" id="dateExistant" name="dateExistant" value="" hidden="true">
                            <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
                            <button type="submit" name="confirmerClient" class="btn btn-primary">Confirmer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php }else{ ?>
<script>
  window.location.href = "index";
</script>
<?php } ?>
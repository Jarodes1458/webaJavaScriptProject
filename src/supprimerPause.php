<?php
$title = "Elysée - Boutique";
include('includes/header.php');

//Liste jour de la semaine dans l'ordre
$joursem = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");





if(isset($_GET['idpause']))
{
    $_SESSION['idpause'] = $_GET['idpause'];
    $_SESSION['coiffeurId'] = getInfomationPause($_GET["idpause"])["COI_ID"];
    $infoPause = getAPauseFromACoiffeur($_SESSION['coiffeurId'], $_GET['idpause']);

    if ($_SESSION["COI_POSTE"] == "Patronne" or $_SESSION["COI_POSTE"] == "Coiffeur superieur" or $_SESSION["coiffeurId"] == $_SESSION["COI_ID"]){




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
    ?>

    <body style="background-color:white;">
        <div class="container border border-dark" style="background-color: white; margin-top: 4%; margin-bottom: 25%;">
            <!--<h1 class="text-center" style="margin-top:5%;">Rendez-vous</h1>-->
            <h3 class="text-center" style=" margin-top: 2%; margin-bottom :2%">Informations de la <span class="font-weight-bold">pause</span> que vous voulez supprimer :</h3>
            <div class="row text-center border-top border-dark" style="margin-top: 2%;" >
                <div class="col-6" style="color:black">
                    <span class="font-weight-bold">Coiffeur :<br>
                    </span> <?= $infoPause['COI_NOM'] . ' ' . $infoPause['COI_PRENOM'] ?>
                </div>
                <div class="col-6">
                <p style="color:black">
                    <span class="font-weight-bold">Date et heure de la pause :</span><br><?= $infoPause['PER_DATE']?> <br><?= $infoPause['PER_HEURE_MIN_DEBUT']?> à <?= $infoPause['PER_HEURE_MIN_FIN']?>
                </p> 
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12 text-center" style="color:black">
                    <span class="font-weight-bold">La raison de la pause :</span> <br> <?= $infoPause['PAU_DESCRIPTION']?>
                </div>
            </div>
            <div class="row text-center border-top border-dark" style="margin-top: 2%;">
            <div class="col-6"  style="color:black; margin-top: 2%; margin-bottom :2%">
            <a href="agenda?coiffeur=<?=$infoPause["COI_ID"]?>"  class="btn  btn-primary border border-dark">Retour</a>
            </div>
                <div class="col-6 text-center" style="color:black; margin-top: 2%; margin-bottom :2%">
                    <form action="suppressionLogiqueDunePause" method="POST">
                        <button role="button" class="btn btn-primary border border-dark">Supprimer la pause</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php 
}else{
    echo '<script>window.location.href = "agenda.php";</script>';
}}else
{
    echo '<script>window.location.href = "agenda.php";</script>';
}
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
}


if(isset($_POST["nomClient"]) AND isset($_POST["prenomClient"]) AND isset($_POST["telClient"])){
    if (isset($_POST["mailClient"])){
        //echo $_POST["nomClient"] . " " . $_POST["prenomClient"] . " " . $_POST["telClient"] . " " . $_POST["mailClient"];
        if (getGetClientTelEmailRowCount($_POST["telClient"], $_POST["mailClient"]) == 1){
            //1 Client ok insertion
        }
        elseif(getGetClientTelEmailRowCount($_POST["telClient"], $_POST["mailClient"]) > 1){
            //email et numero de téléphone avec des clients différents
        }
        else{
            addClient($_POST["nomClient"], $_POST["prenomClient"], $_POST["telClient"], $_POST["mailClient"]);

        }
    }else{ //l'email na pas été rentré
        if (getGetClientTelRowCount($_POST["telClient"]) == 1){
            //1 client ok pour insertion rdv
        }elseif (getGetClientTelRowCount($_POST["telClient"]) > 1){
            //Problème car 2 client on le meme numéro
        }
        else{
            //crée le client
            addClient($_POST["nomClient"], $_POST["prenomClient"], $_POST["telClient"], null);
        }
    }
}
//Pour la l'affichage de la date en toute lettre

//echo strftime('%A %d %B', strtotime($date));
?>




<body style="background-color: #fed136;;">

        <div class="container border border-dark" style="background-color: white; margin-top: 2%;">
            <h1 class="text-center" style="margin-top:5%;">Valider le rendez-vous</h1>

            <div class="row"  style="margin-top:2%; color:black">
                <div class="col-5 offset-1 "><span class="font-weight-bold">Services que vous avez pris :</span>
                <?php
                $nbSer =1;
                $duree = 0;
                $prix = 0;
                for($i = 0; $i <= 2; $i++){
                    if(isset($_SESSION['ser'.$i])&& $_SESSION['ser'.$i] <> 'invalide')
                    {
                        echo  '<br>' ;
                        echo  $nbSer .  " : ".$_SESSION['ser'.$i]['SER_NOM'];
                        $duree =  $_SESSION['ser'.$i]['SER_TEMPS_ESTIMATION'] + $duree;
                        $prix = $prix + $_SESSION['ser'.$i]['SER_PRIX'];
                        $nbSer ++;
                    }
                }
                ?>
                <p><span class="font-weight-bold">Prix minimum: </span><?=$prix . " CHF"?></p>
                <p style="margin-top: -3%;"><span class="font-weight-bold">Durée de la prestation: </span><?=convertToHoursMins($duree, '%2dh%02dm')?></p>

                </div>
                <div class="col-5">
                <p class="font-weight-bold">Date de la prestation: </p>
                <p style="margin-top: -3%;">
                    <?php
                    setlocale(LC_TIME, 'french');
                    $date = transformeDateEUUS($_GET["date"]);
                    echo strftime('%A %d %B', strtotime($date)) . " à " . $_GET["heure"];?>
                </p>
                </div>
            </div>
        <div class="modal-body">
            <form method="POST" action="priserdv4?date=<?=$_GET["date"]?>&heure=<?=$_GET["heure"]?>">
            <div class="row">   
                <div class="col-lg-6 col-md-6">
                    <h5>Nom<span class="couleurRouge">*</span> : </h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nomClient" name="nomClient" placeholder="obligatoire">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h5>Prenom<span class="couleurRouge">*</span> : </h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prenomClient" name="prenomClient" placeholder="obligatoire">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h5>Téléphone<span class="couleurRouge">*</span> : </h5>
                    <div class="form-group">
                        <input type="tel" class="form-control" id="telClient" name="telClient" placeholder="obligatoire">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h5>Adresse mail :</h5>
                    <div class="form-group">
                        <input type="mail" class="form-control" id="mailClient" name="mailClient" >
                    </div>
                </div>
                <br>
            </div>
            <br>
        </div>
        
        <div class="row border-top border-dark text-center">
            <p class="text-center font-weight-bold" style="padding-top:1%; padding-left:5%; text-align: center">Si vous avez déjà pris un rendez-vous en ligne entrez une des deux informations : </p>
            <div class="col-lg-5 offset-1 col-md-12" style="padding-top:1%;padding-left:3%; padding-right:3%;">
                <h5>Adresse mail :</h5>
                <div class="form-group">
                    <input type="mail" class="form-control" id="mailClientDejaExistant" name="mailClientDejaExistant" >
                </div>
            </div>
            <div class="col-lg-5 col-md-12" style="padding-top:1%;padding-left:3%; padding-right:3%;">
                <h5>Numéro de téléphone :</h5>
                <div class="form-group">
                    <input type="text" class="form-control" id="telClientDejaExistant" name="telClientDejaExistant" >
                </div>
            </div>
        </div>
        
        <?php if(isset($_SESSION['COI_MAIL'])){ ?>
        <div class=" border-top border-dark text-center" style="padding:5%">                        
            <table id="dtBasicExample" class="table table-striped table-responsive-sm" style="font-size: 60%;">
            <thead class="thead-dark">
                <tr>
                <th scope="th-sm">Nom</th>
                <th scope="th-sm">Prenom</th>
                <?php if ($_SESSION["COI_POSTE"] == "Patronne" or $_SESSION["COI_POSTE"] == "Coiffeur superieur"){?>
                    <th scope="th-sm">Numéro</th>
                    <th scope="th-sm">Mail</th>
                <?php } ?>
                <th scope="th-sm">Choisir un client</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_SESSION["COI_POSTE"] == "Patronne" or $_SESSION["COI_POSTE"] == "Coiffeur superieur"){
                    foreach(getAllClient() as $client){ ?>
                        <tr>
                            <td><?=$client["CLI_NOM"]?></td>
                            <td><?=$client["CLI_PRENOM"]?></td>
                            <td><?=$client["CLI_TEL"]?></td>
                            <td><?=$client["CLI_EMAIL"]?></td>
                            <td>
                                <a href="priserdv4?id=<?=$client["CLI_ID"]?>&date=<?=$_GET["date"]?>&heure=<?=$_GET["heure"]?>" class="far fa-circle text-decoration-none"></a>
                            </td>
                            </tr>
                    <?php } 
                }else{
                    foreach(getAllClientPourCoiffeur($_SESSION['coi']['COI_ID']) as $client){ ?>
                        <tr>
                            <td><?=$client["cli_nom"]?></td>
                            <td><?=$client["cli_prenom"]?></td>
                            <td>
                                <a href="priserdv4?id=<?=$client["cli_id"]?>&date=<?=$_GET["date"]?>&heure=<?=$_GET["heure"]?>" class="far fa-circle text-decoration-none"></a>
                            </td>
                            </tr>
                    <?php } 
                    
                }?>
            </tbody>
            </table>
        <script>
            $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
        </script>
        <?php } ?>
            <div class="row border-top border-dark w-75" style="margin-left:0%; margin: auto;">
                <div class="modal-footer marginauto">
                    <a href="priserdv2" type="button" class="btn btn-secondary border border-dark">Retour</a>
                    <button type="submit" name="validerPriserdv" class="btn btn-primary">Prendre rendez-vous</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

<?php include('includes/footer.php');?>
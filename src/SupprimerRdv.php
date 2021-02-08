<?php
$title = "Elysée - Boutique";
include('includes/header.php');
if (isset($_SESSION["COI_ID"])){
    if(isset($_GET['idrdv'])){
        if (rdvExiste($_GET["idrdv"]) > 0){
        $idCoiffeur = getRdv($_GET["idrdv"])["COI_ID"];

        if ($_SESSION["COI_POSTE"] == "Patronne" or $_SESSION["COI_POSTE"] == "Coiffeur superieur" or $_SESSION["COI_POSTE"] == $idCoiffeur){
    
    

$cliDonne=getAllCliRdvWhereRdvid($_GET['idrdv'])->fetch();

if(isset($_POST['DeleteRdv'])){
        deleteRdvClientelyrdv($_GET['idrdv']);
        deleteRdvClientelyperiode(getOnerdv_periode($_GET['idrdv'])[0]);
        deleteRdvClientelyrdvperiode($_GET['idrdv']);
        deleteRdvClientelyrdvservice($_GET['idrdv']);
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Salon de coiffure Elysee"<SalondecoiffureElyesse5@gmail.com>'."\n";
        $header.='Content-Type:text/html; charset="utf-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        $message = '
        <html>
        <head>
        <title>Annulation du rendez-vous du </title>
           <meta charset="utf-8" />
          <link href="css/bootstrap.min.css" rel="stylesheet">
          <link href="css/style.css" rel="stylesheet"> 
         </head>
         <body style="background-color:#fed136;max-height:1000px">
             <div class="container-fluid text-center">
               <div class="row">
                <h1 style="text-align:center;color:black">Salon de Coiffure L\'Elysee</h1>
                <img style="max-height:500px;width:100%" src="http://www.esig-sandbox.ch/team2020_5/Ressources/ImageSalon/imgAccueil3.jpg">      
               </div>
               <div  class="jumbotron jb-milieu-mail text-center" >
                   <div class="row" style="text-align:center"> 
                     <h1 class="display-4">Bonjour <b>'.$cliDonne['CLI_NOM'].' '.$cliDonne['CLI_PRENOM'].'</b> </h1></br>
                     <p class="lead" style="font-size:25px">Votre Rendez vous du '.$cliDonne['PER_DATE'].' pour '.$cliDonne['PER_HEURE_MIN_DEBUT'].'a été supprimer nous sommes désolé pour cet incident
                     .</p></br>
                     <p style="font-size:6;font-weight:bold">Ceci est un email automatique merci de ne pas y répondre</p>
                   </div>
               </div>
             </div>
         </body>
        </html>';
       mail($cliDonne['CLI_EMAIL'], "Récupération de mot de passe - Salon de L'Elysee",$message,$header); ?>
        <script>
            window.location.href = "agenda?coiffeur=<?=$idCoiffeur?>";
        </script>
        <?php
}


    $cliDonne=getAllCliRdvWhereRdvid($_GET['idrdv'])->fetch();

?>
<body class="bg-white">
  <div class="text-center" style="margin:2%">
   <h2>Voici les informations du rendez-vous du  <?=$cliDonne['PER_DATE']?></h3>
  </div>
    <div class="container blocmiddle text-center" style="border: 1px solid black; padding: 2%">
      <div class="row " style="padding: 2%">
            <div class="col-6">
                <h3>Nom du Coiffeur:</h3>
                <p><?=$cliDonne['COI_PRENOM'].' '.$cliDonne['COI_NOM']?></p>
            </div>
            <div class="col-6">
                <h3>Nom du client: </h3>
                <p><?=$cliDonne['CLI_PRENOM'].' '.$cliDonne['CLI_NOM']?></p>
            </div>
       </div>
       <div class="row " style="padding: 2%">
            <div class="col-6">
                <h3>Heure debut de la prestation:</h3>
                <p><?=$cliDonne['PER_HEURE_MIN_DEBUT']?></p>
            </div>
            <div class="col-6">
                <h3>Heure fin de la prestation:</h3>
                <p><?=$cliDonne['PER_HEURE_MIN_FIN']?></p>
            </div>
       </div>
       <div class="row " style="padding: 2%">
            <div class="col-6">
                <h3>type de service : </h3>
                <?php 
                $prix = 0;
                foreach(getAllRdvService($_GET["idrdv"]) as $service){
                    $prix = $prix + $service["SER_PRIX"];?>
                    <p><?=$service["SER_NOM"]?></p>
                <?php }?>
            </div>
            <div class="col-6">
                <h3>prix du  service : </h3>
                <p><?=$prix?> CHF</p>
            </div>
       </div>
       <div class="row " style="padding: 2%">
       <div class="col-6">
            <a href="agenda?coiffeur=<?=$cliDonne["COI_ID"]?>" class="btn btn-primary" style="color: white">Retour</a>         
        </div>
            <div class="col-6">
            <form action="" method="post">
            <button  type="submit" name="DeleteRdv" class="btn btn-primary">Supprimer le rendez-vous</button>    
            </form>        
        </div>
        
       </div>
    </div>
</body>
<?php
 }}}}
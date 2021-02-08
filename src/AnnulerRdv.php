<?php
$title = "Elysée - Prendre rendez-vous";
include('includes/header.php');
 if(isset($_POST['idRdv'])){
        $cliDonne=getAllCliInfoWhereRdvid($_POST['idRdv']);
        deleteRdvClientelyrdv($_POST['idRdv']);
        deleteRdvClientelyperiode(getOnerdv_periode($_POST['idRdv'])[0]);
        deleteRdvClientelyrdvperiode($_POST['idRdv']);
        deleteRdvClientelyrdvservice($_POST['idRdv']);
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
                     <p class="lead" style="font-size:25px">Votre Rendez vous du '.$cliDonne['PER_DATE'].' pour '.$cliDonne['PER_HEURE_MIN_DEBUT'].' a bien été annulé </p></br>
                     <p style="font-size:6;font-weight:bold">Ceci est un email automatique merci de ne pas y répondre</p>
                   </div>
               </div>
             </div>
         </body>
        </html>';
       mail($cliDonne['CLI_EMAIL'], "Récupération de mot de passe - Salon de L'Elysee",$message,$header);
       echo "<meta http-equiv=\"refresh\" content=\"0;url=VoirRendezvousForm?Afficherrdv=true\"/>";
 }

?>
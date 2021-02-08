<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */
require 'includes/dbfunctions.php';
session_start();

if(isset($_GET['section'])){
   $section=htmlspecialchars($_GET['section']);
}
else{
   $section="";
}

if(isset($_POST['formRecup'],$_POST['mailRecup']))
{
   $mail=htmlspecialchars((trim($_POST['mailRecup'])));
    if(!empty($_POST['mailRecup'])){
        if(filter_var($mail,FILTER_VALIDATE_EMAIL))
        {
            $mailexist = (getCoiffeurid_nameWhereMail($mail))->rowCount();
            $coiffeurlambda=getCoiffeurid_nameWhereMail($mail)->fetch();
            $nomCoiffeur=$coiffeurlambda['COI_NOM'];
            if($mailexist == 1)
            {
                $recup_code="";
                for ($i=0; $i <=8 ; $i++) 
                { 
                  $recup_code .= mt_rand(0,9);
                }
                $_SESSION['recup_code']= $recup_code;
                $_SESSION['mailRecup']=$mail;

                $mail_recup_exist=getCoiffeuRecupidWhereMail($mail)->rowCount();
                /*Voir si le coiffeur a dejà fais une récupération de mot de passe dans ce caxs update*/
                if ($mail_recup_exist == 1) 
                {
                    UpdateCoiffeurRecupMdp($recup_code,$mail);
                }
                /*Sinon insérer le mail avec le code */
                else
                {
                    InsertCoiffeurRecupMdp($recup_code,$mail);;
                }
                $header="MIME-Version: 1.0\r\n";
                $header.='From:"Salon de coiffure Elysee"<manuelprofessionnel5@gmail.com>'."\n";
                $header.='Content-Type:text/html; charset="utf-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';
                $message = '
                <html>
                <head>
                <title>Récupération de mot de passe</title>
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
                             <h1 class="display-4">Bonjour <b>'.$nomCoiffeur.'</b>,</h1></br>
                             <p class="lead" style="font-size:25px">Voici votre code de récupération de mot de passe : <b>'.$recup_code.'</b></p></br>
                             <p style="font-size:6;font-weight:bold">Ceci est un email automatique merci de ne pas y répondre</p>
                           </div>
                       </div>
                     </div>
                 </body>
                </html>';
                mail($mail, "Récupération de mot de passe - Salon de L'Elysee",$message,$header);
             header("Location:RecupérerMotdePasse?section=JZFTFZTgtfzt45484FDZDghDR548TFZTR484TFmlk566BHB");
            }

            else
            {
                $error="<div class=\"alert alert-danger\" role=\"alert\">
                Cette adresse n'existe pas veuillez recommencer ! 
              </div>"; 
            }
        }
        else{
            $error="<div class=\"alert alert-danger\" role=\"alert\">
           Votre mot de passe n'est pas valide !
         </div>"; 
        }
    }
    else{
        $error="<div class=\"alert alert-danger\" role=\"alert\">
       Veuillez entrez votre adresse mail
    </div>"; 
    }
}

/****/
if(isset($_POST['verif_submit'],$_POST['verif_code'])) 
{
   if(!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req= getAllCoiffeuridWhereMailAndcode($_SESSION['mailRecup'],$verif_code)->rowCount();
      if($verif_req == 1) 
      {
         updatecoiffeurRecupmdpstatut($_SESSION['mailRecup']);
         $_SESSION["securite"] = true;
         header('Location:RecupérerMotdePasse?section=ZRDTRDnjni26548UHB4865hvGFDZ86468GHCFDes4897489');
      } else {
         $error = " <div class=\"alert alert-danger\" role=\"alert\">Code invalide</div>";
      }
   } else {
      $error = "<div class=\"alert alert-danger\" role=\"alert\">Veuillez entrer votre code de confirmation</div>";
   }
}
if(isset($_POST['change_submit'])) 
{
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
      $Req_verif_confirme = verifierSiRecuperateurConfirme($_SESSION['mailRecup'])->fetch();
      $verif_confirme = $Req_verif_confirme['confirme'];
      if($verif_confirme == 1) {
         $mdp = htmlspecialchars(trim($_POST['change_mdp']));
         $mdpc = htmlspecialchars(trim($_POST['change_mdpc']));
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
               $mdp = sha1($mdp);
               UpdateCoiffeurMdp($mdp,$_SESSION['mailRecup']);
               DeleteCoi_WhoRecup($_SESSION['mailRecup']);
               unset($_SESSION["securite"]);
               header('Location:login');
               
            } else {
               $error = "<div class=\"alert alert-danger\" role=\"alert\">Vos mots de passes ne correspondent pas</div>";
            }
         } else {
            $error = "<div class=\"alert alert-danger\" role=\"alert\">Veuillez remplir tous les champs</div>";
         }
      } else {
         $error = "<div class=\"alert alert-danger\" role=\"alert\">Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail</div>";
      }
   } else {
      $error = "<div class=\"alert alert-danger\" role=\"alert\">Veuillez remplir tous les champs</div>";
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <meta name="HandheldFriendly" content="true">
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
    <title>Document</title>
</head>
<body class="login" style="background-color: #fed136;">
    <?php if($section == 'JZFTFZTgtfzt45484FDZDghDR548TFZTR484TFmlk566BHB') { ?>
        <br/>
        <form method="post" class="box">
            <h1>Code de Vérification</h1>
           <input type="text" placeholder="Code de vérification" name="verif_code"/>
           <input type="submit" value="Valider" name="verif_submit"/>
           <p style="color:white">Un code de vérification vous a été envoyé par mail</p>
           <?php
           if(isset($error))
           {
            echo $error;
           }
           ?>
        </form>
    <?php } elseif($section == 'ZRDTRDnjni26548UHB4865hvGFDZ86468GHCFDes4897489' AND isset($_SESSION["securite"])) { ?>
        <form method="post" class="box">
            <h1>Nouveau mot de passe </h1>
           <input type="password" placeholder="Nouveau mot de passe" name="change_mdp"/>
           <input type="password" placeholder="Confirmation du mot de passe" name="change_mdpc"/>
           <input type="submit" value="Valider" name="change_submit"/>
           <?php
           if(isset($error))
           {
            echo $error;
           }
           ?>
        </form>
    <?php } else { ?>
        <form method="post" class="box">
            <h1>Recupérer mot de passe </h1>
           <input type="email" placeholder="Votre adresse mail" name="mailRecup"/>
           <input type="submit" value="Valider" name="formRecup"/>
           <?php
           if(isset($error))
           {
            echo $error;
           }
           ?>
        </form>
    <?php } ?>
</body>
</html>
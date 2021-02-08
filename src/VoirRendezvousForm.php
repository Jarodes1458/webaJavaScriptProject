<?php 
$title = "Elysée - Prendre rendez-vous";
include('includes/header.php');
$frdate= date ("Y-m-d");
$frdate1jrafter = date ("Y-m-d",strtotime('+ 1 day'));

if(!isset($_GET['Afficherrdv']))
{
    unset($_SESSION['telephone']);
}

if(isset($_POST['voiRdv']) or isset($_GET['Afficherrdv']) AND  ($_GET['Afficherrdv']) == true){
    if(!empty($_POST['telephone']) OR isset($_SESSION['telephone'])){
        if(!empty($_POST['telephone']))
        {
        $_SESSION['telephone'] = $_POST['telephone'];
        $telephone=trim(strip_tags($_POST['telephone']));
        }
        else
        {
        $telephone=trim(strip_tags($_SESSION['telephone']));
        }
        $Clientexist = getAllRendezVousClient($telephone)->rowCount();
        if($Clientexist >= 1){
            $ClientRdvDonnne = getAllRendezVousClient($telephone)->fetchAll();
            $ClientDonnne = getAllRendezVousClient($telephone)->fetch();
            ?>
            <body style="background-color: #fed136;">    
            <div class="container bg-white" style="padding-top:2%;padding-bottom:2%;margin-top:2%;margin-bottom:2%"> 
            <div class="container " style="margin-bottom:2%" >
            <h5 class="text-center text-uppercase" style="font-size: 90%">Voici la liste de vos rendez-vous : <strong><?=$ClientDonnne['cli_prenom'].' '.$ClientDonnne['cli_nom'] ?></strong> </h5>
            </div>
            <table id="dtBasicExample" class="table table-striped table-responsive-sm" style="font-size: 70%;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="th-sm" style="width: 25%"><h4 class="text-white">Date</h4></th>
                    <th scope="th-sm"><h4 class="text-white">Description </h4></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      foreach($ClientRdvDonnne as $rdv){ 
                          $donneRdv = getClientInformationRdvVoirRDV($rdv["rdv_id"]);
                          $serviceListe = "";
                          $compteur = 0;
                            foreach(getInformationServiceDUnRdv($rdv["rdv_id"]) as $service){
                                if ($compteur == 0){
                                    $serviceListe = $service["SER_NOM"];
                                    $compteur = 1;
                                }else{
                                    $serviceListe = $serviceListe . ' et ' . $service["SER_NOM"]; 
                                }
                            }
                          ?>
                      <tr> 
                        <td><?= $rdv['per_date']?></td>
                        <td>
                            <?php 
                            if($rdv['per_date'] < $frdate){   
                        
                        echo 'Cette prestation concerne le/les service:    '. $serviceListe . "." .
                        '<br> Coût: ' .$rdv['rdv_prix'].' CHF';
                            }
                            elseif( $frdate1jrafter <= $rdv['per_date'] ){
                                $id=$rdv['rdv_id'];
                                echo 'Cette prestation concerne le/les service:    '. $serviceListe . "." .
                                '<br> Coût: ' .$rdv['rdv_prix'].' CHF'.
                                '</br> Votre rendez-vous débute à <strong><span style="color:green">'.$rdv['per_heure_min_debut']. '</span></strong> et  finit à <strong><span style="color:green">' . $rdv['per_heure_min_fin'] . 
                                ' Tâcher d\'être à l\'heure s\'il vous plaît. Merci.</span></strong>
                                ';?><a onclick="donneesAnnulerRdv('<?=$id?>')" href="#SupprimerRdv" style="color:red;cursor:default" data-toggle="modal" data-target="#SupprimerRdv" > Annuler Rendez-vous</a>
                                <?php        
                            }
                            else{                 
                                echo 'Cette prestation concerne le/les service:    '. $serviceListe . "." .
                                '<br> Coût: ' .$rdv['rdv_prix'].' CHF'.
                                '</br> Votre rendez-vous commence à <strong><span style="color:green">'.$rdv['per_heure_min_debut'].'</span></strong> et s est finit à <strong><span style="color:green">' . $rdv['per_heure_min_fin'] . 
                                ' Tacher d\'etre à l\'heure svp.Merci.</span></strong>';
                            }
                        ?>
                        </td>
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
              <a href="index"><button type="button" name="comeback" class="btn btn-secondary border border-dark" >Retour</button></a>
            </div>
              <script>
              $(document).ready(function () {
              $('#dtBasicExample').DataTable();
              $('.dataTables_length').addClass('bs-select');
                });
            </script>
            </body>
            <div class="modal fade bd-example-modal-lg" data-backdrop="false" id="SupprimerRdv" tabindex="-1" role="dialog" aria-labelledby="SupprimerRdv" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="SupprimerRdv">Supprimer</h5>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="AnnulerRdv.php">
                        Etes vous sur de supprimer ce rendez vous  ? <br>
                    </div>
                    <div class="modal-footer">
                    <input id="idRdv" name="idRdv" type="text" value=""  hidden="true">
                    <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal">Fermer</button>
                    <button type="submit" name="SupprimerRdv" class="btn btn-primary">Supprimer</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            <?php
            
        }
        else{
            echo "<meta http-equiv=\"refresh\" content=\"0;url=VoirRendezvousForm\"/>"; 
        }
    }
    else{
        echo "<meta http-equiv=\"refresh\" content=\"0;url=VoirRendezvousForm\"/>"; 
    }
}
else{
?>

<body  style="background-color: #fed136;">
    <form action="VoirRendezvousForm?Afficherrdv=true" method="post"  style="width:100%;margin:auto;margin-top:7%" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="ModifierService">Veuillez entrez votre numero de telephonne</h5>
                </button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                            <input type="text" class="form-control" name="telephone" value="" placeholder="0779416433">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <a href="index"><button type="button" name="comeback" class="btn btn-secondary border border-dark" >Retour</button></a>
                </div>
                <button type="submit" name="voiRdv" class="btn btn-primary" style="margin-bottom: 5%">Soumettre</button>
                </div>
               
            </div>
    </form>
 
</body>

<?php }?>
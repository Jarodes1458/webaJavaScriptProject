<?php
$title = "Elysée - Prendre rendez-vous";
include('includes/header.php');

if(isset($_GET["coiffeur"])){
    $_SESSION['coi'] = getCoiffeurId($_GET["coiffeur"]);
}

if(isset($_GET["reset"])){
    unset( $_SESSION['coi']);
    for($n = 0; $n <= 2; $n++){
        if(isset($_SESSION['ser'.$n])&& $_SESSION['ser'.$n] <> 'invalide')
        {   
            unset( $_SESSION['ser'.$n]);
        }
    }
    unset($_SESSION['serviceSelected']);
}

if(isset($_GET['retirer']))
{
    $_SESSION['compteur'] -= 1;
    unset($_SESSION['ser'.$_SESSION['compteur']]);
    unset($_SESSION['serviceSelected'][$_SESSION['compteur']]);
}

if(!isset($_POST['btnAjout']) && !isset($_POST['btnDelete']) && !isset($_SESSION['compteur']))
{
    $_SESSION['compteur'] = 1;
}

if($_SESSION['compteur'] < 1 || $_SESSION['compteur'] > 3)
{
    $_SESSION['compteur'] = 1;
}

if(isset($_POST['btnAjout']) && $_SESSION['compteur'] <= 2)
{
$_SESSION['compteur'] += 1;
}


// Bugfix de l'affichage qui se faisait après avoir actualisé une fois de plus
$valide = true;
if(isset($_GET['coi']))
{ 
  if(!empty(getOneCoiffeurID($_GET['coi'])))
  {
    for($j=0;$j<=2;$j++)
    {
        if(isset($_SESSION['ser'.$j]))
        {
            if(canCoiffeurDoThisService($_GET['coi'],$_SESSION['ser'.$j]['SER_ID'])->rowcount() == 0)
            {
                $valide = false;
            }
        }
    }
    if($valide)
    {
        $_SESSION['coi'] = getOneCoiffeurID($_GET['coi']);
    }
    else{
        $_SESSION['coi'] = 'invalide';
    }
  }
  else
  {
    $_SESSION['coi'] = 'invalide';
  }
}


if(!isset($_SESSION['serviceSelected']))
{
$_SESSION['serviceSelected'] = [];
}


for($i = 0; $i <= 2; $i++)
{
    if(isset($_GET['ser'.$i]))
    {
        if(!empty(getOneService($_GET['ser'.$i])))
        {
            if(isset($_SESSION['coi']))
            {
                if(!empty(canCoiffeurDoThisService($_SESSION['coi']['COI_ID'],$_GET['ser'.$i])->fetch()))
                {
                    $_SESSION['ser'.$i] = getOneService($_GET['ser'.$i]);
                    
                    $_SESSION['serviceSelected'][$i] = $_GET['ser'.$i];
                }
                else
                {
                    $_SESSION['ser'.$i] = 'invalide';
                }
            }
            else
            {
                $_SESSION['ser'.$i] = getOneService($_GET['ser'.$i]);

                $_SESSION['serviceSelected'][$i] = $_GET['ser'.$i];
            }
        }
        else
        {
            $_SESSION['ser'.$i] = 'invalide';
        }
    } 
}

if(sizeof($_SESSION['serviceSelected']) > 1)
{
    echo sizeof($_SESSION['serviceSelected']);
    $arrayCoiffeur = [];
    $arrayIDServiceSelected = [];
    $compteur = 0;

    if(sizeof($_SESSION['serviceSelected']) == 2)
    {
        foreach($_SESSION['serviceSelected'] as $key => $value)
        {
            $arrayIDServiceSelected[$compteur] = $value;
            $compteur += 1;
        }
        $listCoiffeurs = getEveryCoiffeursThatCanDoOneOfThose2Services($arrayIDServiceSelected[0],$arrayIDServiceSelected[1]);
        foreach($listCoiffeurs as $donneesCoiffeur)
        {
            if(!isset($arrayCoiffeur[$donneesCoiffeur['COI_ID']]))
            {
                $arrayCoiffeur[$donneesCoiffeur['COI_ID']] = 1;
            }
            else
            {
                $arrayCoiffeur[$donneesCoiffeur['COI_ID']] += 1;
            }
        }
        $arrayCoiffeur['nbService'] = 2;
    }
    if(sizeof($_SESSION['serviceSelected']) == 3)
    {
        foreach($_SESSION['serviceSelected'] as $key => $value)
        {
            $arrayIDServiceSelected[$compteur] = $value;
            $compteur += 1;
        }
        $listCoiffeurs = getEveryCoiffeursThatCanDoOneOfThose3Services($arrayIDServiceSelected[0],$arrayIDServiceSelected[1],$arrayIDServiceSelected[2]);
        foreach($listCoiffeurs as $donneesCoiffeur)
        {
            if(!isset($arrayCoiffeur[$donneesCoiffeur['COI_ID']]))
            {
                $arrayCoiffeur[$donneesCoiffeur['COI_ID']] = 1;
            }
            else
            {
                $arrayCoiffeur[$donneesCoiffeur['COI_ID']] += 1;
            }
        }
        $arrayCoiffeur['nbService'] = 3;
    }
}


if(isset($_SESSION['serviceSelected']))
{
    if(sizeof($_SESSION['serviceSelected']) == 1)
    {
        if(isset($_SESSION['serviceSelected'][0]))
        {
        $serviceSelectable = getAllServiceExceptOne($_SESSION['serviceSelected'][0]);
        }
        if(isset($_SESSION['serviceSelected'][1]))
        {
        $serviceSelectable = getAllServiceExceptOne($_SESSION['serviceSelected'][1]);
        }
        if(isset($_SESSION['serviceSelected'][2]))
        {
        $serviceSelectable = getAllServiceExceptOne($_SESSION['serviceSelected'][2]);
        }
    }
    elseif(sizeof($_SESSION['serviceSelected']) == 2)
    {
        $serviceSelectable = getAllServiceExceptTwo($arrayIDServiceSelected[0],$arrayIDServiceSelected[1]);
    }
    elseif(sizeof($_SESSION['serviceSelected']) == 3)
    { 
        $serviceSelectable = getAllServiceExceptThree($arrayIDServiceSelected[0],$arrayIDServiceSelected[1],$arrayIDServiceSelected[2]);
    }
    else
    {
        $serviceSelectable = getAllService();
    }
}
else
{
    $serviceSelectable = getAllService();
}

?>


<div class="container border border-dark bg-light" style="margin-top: 7%;"><br>
<h1 class="text-center" style="margin-bottom: 3%;"> Prendre rendez-vous</h1>
<?php
    $duree = 0;
    $prix = 0;
    for($e = 0; $e <= 2; $e++){
        if(isset($_SESSION['ser'.$e])&& $_SESSION['ser'.$e] <> 'invalide')
        {   
            $duree =  $_SESSION['ser'.$e]['SER_TEMPS_ESTIMATION'] + $duree;
            $prix = $prix + $_SESSION['ser'.$e]['SER_PRIX'];

        }
    }

    if ($prix !== 0){ ?>
        <p class="text-center" style="margin-top: -1%; margin-bottom: 2%;">Le prix minimum de la prestation sera de: <?=$prix . " CHF"?></p>
    <?php } 
    if ($duree !== 0){ ?>
        <p class="text-center" style="margin-top: -1%; margin-bottom: 2%;">La durée de la prestation durera: <?=convertToHoursMins($duree, '%2dh%02dm')?></p>
    <?php } 

    if ($duree !== 0 OR $prix !==0){ ?>
        <hr>
<?php } ?>
    


    <div class="row text-center" style="margin-bottom:2%;">
        <div class="col-3 marginauto">
            <p  style="margin-bottom:-1%;" >Choisissez le coiffeur</p>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle border border-dark " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="selectionCoiffeur">
                  <?php 
                    if(isset($_SESSION['coi']))
                    { 
                        if(isset($_SESSION['coi']['COI_NOM']))
                        {
                        echo $_SESSION['coi']['COI_NOM'] . ' ' . $_SESSION['coi']['COI_PRENOM'];
                        }
                        else
                        {
                            echo $_SESSION['coi'];
                        }
                    }
                    else
                    {
                        echo 'Coiffeur';
                    }
                      ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php 
                    if (!isset($_SESSION['ser0']) && !isset($_SESSION['ser1']) && !isset($_SESSION['ser2']) )
                    {?>
                        <?php foreach(getAllCoiffeur() as $coiffeur): 
                            ?>
                            <a class="dropdown-item" href="priserdv1?coi=<?=$coiffeur['COI_ID']?>" name="coiffeur<?=$coiffeur['COI_ID']?>"required>
                            <?= $coiffeur['COI_NOM']?>
                            </a>
                        <?php endforeach;
                    }
                    elseif(isset($arrayCoiffeur))
                    { 
                    foreach($arrayCoiffeur as $idCoi => $nbDeFoisIlApparait): 
                        if($idCoi != 'nbService' && $nbDeFoisIlApparait == $arrayCoiffeur['nbService'])
                        {
                            $coiffeur = getOneCoiffeurID($idCoi);
                            ?>
                            <a class="dropdown-item" href="priserdv1?coi=<?=$coiffeur['COI_ID']?>" name="coiffeur<?=$coiffeur['COI_ID']?>"required>
                            <?= $coiffeur['COI_NOM']?>
                            </a>
                            <?php   
                        }
                    endforeach; 
                    }
                    else
                    {
                        foreach(getCoiffeurService($_SESSION['ser0']['SER_ID']) as $coiffeur): ?>
                            <a class="dropdown-item" href="priserdv1?coi=<?=$coiffeur['COI_ID']?>" name="coiffeur<?=$coiffeur['COI_ID']?>"required>
                            <?= $coiffeur['COI_NOM']?>
                            </a>
                        <?php
                        endforeach;   
                    }
                    ?>
                </div>
            </div>            

        </div>
        <div class="col-3 marginauto">
            <p  style="margin-bottom:-1%;" >Choisissez le service</p>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle border border-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="prestation1">
                <?php
                if(isset($_SESSION['ser0']))
                {
                    if(isset($_SESSION['ser0']['SER_NOM']))
                    {
                        echo $_SESSION['ser0']['SER_NOM']; 
                    }
                    else
                    {
                        echo $_SESSION['ser0'];
                    }
                } 
                else
                {
                    echo 'Service';
                }
                ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php if (isset($_SESSION['coi']))
                        {
                            if(isset($_SESSION['coi']['COI_ID']) && !empty(getAllServiceSelonCoiffeur($_SESSION['coi']['COI_ID'])))
                            {
                                foreach(getAllServiceSelonCoiffeur($_SESSION['coi']['COI_ID']) as $service): ?>
                                    <a class="dropdown-item" href="priserdv1?ser0=<?=$service['SER_ID']?>" name="ser1=<?=$service['SER_ID']?>"required>
                                    <?= $service['SER_NOM']. " <span style='font-size: 80%;'>(" . convertToHoursMins($service["SER_TEMPS_ESTIMATION"], '%2dh%02dm') . " - " . $service["SER_PRIX"] . " CHF)" . "</span>" ?>
                                    </a>
                            <?php endforeach; 
                            }
                        }
                        else
                        {
                        foreach($serviceSelectable as $service){ ?>
                            <a class="dropdown-item" href="priserdv1?ser0=<?=$service['SER_ID']?>" name="ser1=<?=$service['SER_ID']?>" required>
                            <?= $service['SER_NOM']. " <span style='font-size: 80%;'>(" . convertToHoursMins($service["SER_TEMPS_ESTIMATION"], '%2dh%02dm') . " - " . $service["SER_PRIX"] . " CHF)" . "</span>" ?>
                            </a>
                        <?php }
                        } ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if(isset($_SESSION['compteur'])){

    for($i = 1; $i < $_SESSION['compteur']; $i++){ ?>
    <div class="row text-center" style="margin-bottom:2%;">
        <div style="margin-left: 64%;">
            <p  style="margin-bottom:-1%;" >Choisissez le service</p>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle border border-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="prestation<?=$i+1?>">
                  <?php 
                    if(isset($_SESSION['ser'.$i]))
                    {
                        if(isset($_SESSION['ser'.$i]['SER_NOM']))
                        {
                            echo $_SESSION['ser'.$i]['SER_NOM']; 
                        }
                        else
                        {
                            echo $_SESSION['ser'.$i];
                        }
                    }
                    else
                    {
                        echo 'Service';
                    }
                  ?>
                </button>
                <div class="dropdown-menu" style="z-index: 1;" aria-labelledby="dropdownMenuButton">
                    <?php if (isset($_SESSION['coi'])){
                            if(isset($_SESSION['coi']['COI_ID']) && !empty(getAllServiceSelonCoiffeur($_SESSION['coi']['COI_ID'])))
                            {
                                foreach(getAllServiceSelonCoiffeur($_SESSION['coi']['COI_ID']) as $service): ?>
                                    <a class="dropdown-item" href="priserdv1?ser<?= $i ?>=<?=$service['SER_ID']?>" name="ser<?=$i+1 . "=" . $service['SER_ID']?>" required>
                                    <?= $service['SER_NOM']. " <span style='font-size: 80%;'>(" . convertToHoursMins($service["SER_TEMPS_ESTIMATION"], '%2dh%02dm') . " - " . $service["SER_PRIX"] . " CHF)" . "</span>" ?>
                                    </a>
                            <?php endforeach; 
                            }
                        }
                        else
                        {
                        foreach($serviceSelectable as $service)
                                { ?>
                                <a class="dropdown-item" style="z-index: 1;" href="priserdv1?ser<?= $i ?>=<?=$service['SER_ID']?>" name="ser<?=$i+1 . "=" . $service['SER_ID']?>" required>
                                <?= $service['SER_NOM']. " <span style='font-size: 80%;'>(" . convertToHoursMins($service["SER_TEMPS_ESTIMATION"], '%2dh%02dm') . " - " . $service["SER_PRIX"] . " CHF)" . "</span>" ?>
                                </a>
                        <?php   }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } }?> 

    <form action="priserdv1" method="post">
    <div class="row ">
            <div type="submit" class="col-3  p-1" style="margin-left: 5%;margin-top:2%; margin-bottom: 2%;"> <button class="btn btn-primary" name="btnAjout"> Ajouter un service (max 3)</button> </div>
            <?php if($_SESSION['compteur'] > 1){ ?>
            <div type="submit" class="col-1 p-2" style="margin-left: -4%;margin-top:2%; margin-bottom: 2%;"><a href="priserdv1?retirer=true"><i style="margin-top: 10%; padding-right:100%;" class="far fa-trash-alt"></i></a></div>
            <?php } ?>
        </form>
        
        <?php if (isset($_SESSION["ser0"]) OR isset($_SESSION["coi"])){ ?>
        <a href="priserdv1?reset=true" class="btn btn-primary col-2 marginauto" style="margin-right: 22%;" id ="remettreAZero">Remettre à zero</a>

        <?php }if (isset($_SESSION["ser0"]) AND isset($_SESSION["coi"])){ ?>
            <form action="priserdv2" method="post" class="col-2">
                <div type="submit" class="col-12 p-4" style="margin-top:2%; margin-bottom: 2%;"> <button class="btn btn-primary" name="btnSubmit"> Valider</button> </div>
            </form>
        <?php } ?>
    </div>
</div>




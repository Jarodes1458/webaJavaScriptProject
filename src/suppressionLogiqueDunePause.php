<?php 

session_start();
include('includes/dbfunctions.php');

if(isset($_SESSION['coiffeurId']) && isset($_SESSION['idpause']))
{
    deletePauseFromACoiffeur($_SESSION['coiffeurId'], $_SESSION['idpause']);
    deleteRdvClientelyperiode($_SESSION['idpause']);
    $idCoiffeur = $_SESSION['coiffeurId'];
    unset($_SESSION['coiffeurId']);
    unset($_SESSION['idpause']);
}
?>
<script>
    window.location.href = "agenda?coiffeur=<?=$idCoiffeur?>";
</script>
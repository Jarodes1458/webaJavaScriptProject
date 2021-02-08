<?php
/** 
 ** Salon de coiffure Eylsée - Victor, Jarod et Maxime
 */
  $title = "Oups!";
  include('includes/header.php');
?>

            <div class="input-group custom-search-form">
                <h2>Sorry...</h2>
                <p><?= $_GET['message']; ?></p>
            </div>
            <div class="input-group custom-search-form">
              <br>
              <a href="index">Retour à l'accueil.</a>
            </div>


<?php include('includes/footer.php'); ?>

<?php

  require 'model/fonctionsUtils.php';
  $connexion = fonctionsUtils::activeCnx();

  if($connexion != null)
  {
    echo "<p>Connexion à la base de donnée réussie</p>";

    ?>
      <a href="#">Aller sur le site</a>
    <?php
  }
  else
  {
    echo "<p> ! Connexion à la base de donnée échouée ! </p>";
  }


?>

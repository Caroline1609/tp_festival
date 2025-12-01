<?php
//votre formulaire  ici!
  require 'header.php';
  include './vues/formulaire.php';
  require "./src/dao/RestaurantRepository.php"; // Inclure le fichier du repository
  $repo = new CandidateRepository(); //Créer une instance du repository

var_export($repo->infoTable());
  ?>
  <body>
    



</body>
</html>
<?php
//votre formulaire  ici!
  require 'header.php';
  include './vues/formulaire.php';
  require "./src/dao/CandidateRepository.php"; // Inclure le fichier du repository

  $repo = new CandidateRepository(); //Créer une instance du repository

  
  ?>
  <body>
    
<?php
$password = "mot_de_passe_utilisateur123";
$hashedPassword = encryptPassword($password);
// Stockez $hashedPassword dans votre base de données

// Plus tard, pour vérifier :
if (verifyPassword($password, $hashedPassword)) {
    echo "Le mot de passe est correct !";
} else {
    echo "Mot de passe invalide.";
}

?>
</body>
</html>
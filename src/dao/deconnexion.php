<?php
// Détruire la session
session_destroy();

// Redirection vers la page d'accueil
header("Location: index.php");
exit();
?>
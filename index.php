<?php
// 1. Démarrer la session
session_start();

require "./vendor/autoload.php";

require "./src/controllers/ctrl_accueil.php";
require "./src/controllers/ctrl_inscription.php";
require "./src/controllers/ctrl_login.php";
require "./src/controllers/ctrl_deconnexion.php";
//  use src\dao\CandidateRepository;
//  use src\dao\DepartmentRepository;

// $candidateRepository = new src\dao\CandidateRepository(); 
// $departmentRepository = new src\dao\DepartmentRepository(); 

// Définir la page à afficher
$allowedPages = ['home', 'inscription', 'connexion', 'deconnexion'];
$page = $_GET["page"] ?? 'home';
$page = in_array($page, $allowedPages) ? $page : 'home';

// Définir le titre de la page
$titles = [
    'home' => 'Accueil - Foire aux Vins',
    'inscription' => 'Inscription - Foire aux Vins',
    'connexion' => 'Connexion - Foire aux Vins',
    'deconnexion' => 'Déconnexion - Foire aux Vins'
];
$title = $titles[$page] ?? 'Foire aux Vins';

// Inclure le header
include "./header.php";

// Afficher le contenu selon la page et passer les dépendances
switch ($page) {
    case 'inscription':
        // On passe les deux repositories nécessaires au contrôleur d'inscription
        ctrlInscription();
        break;
    
    case 'connexion':
        ctrlLogin();
        break;
    
    case 'deconnexion':
        ctrlDeconnexion();
        break;

    default: // home
        ctrlAccueil();
        break;
}

// Inclure le footer
include "./footer.php";
?>
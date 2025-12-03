<?php
// Contrôleur principal
require_once "./src/dao/DbConnection.php";
require_once "./src/dao/DepartmentRepository.php";
require_once "./src/dao/CandidateRepository.php";

// Démarrer la session pour les messages
session_start();

// Définir la page à afficher
$allowedPages = ['home', 'inscription', 'connexion', 'deconnexion'];
$page = isset($_GET["page"]) && in_array($_GET["page"], $allowedPages) ? $_GET["page"] : 'home';

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

// Afficher le contenu selon la page
switch ($page) {
    case 'inscription':
        include "./src/views/inscription.php";
        break;
    
    case 'connexion':
        include "./src/views/connexion.php";
        break;
    
    case 'deconnexion':
        include "./src/views/deconnexion.php";
        break;

    default:
        include "./src/views/home.php";
        break;
}

// Inclure le footer
include "./footer.php";
?>
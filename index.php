<?php
// Contrôleur principal
require_once "./src/dao/DbConnection.php";
require_once "./src/dao/DepartmentRepository.php";
require_once "./src/dao/CandidateRepository.php";
require "./src/controllers/ctrl_accueil.php";
require "./src/controllers/ctrl_inscription.php";
require "./src/controllers/ctrl_login.php";
require "./src/controllers/ctrl_deconnexion.php";
require "./vendor/autoload.php";
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

// Charger les données pour la page d'accueil
$data = [];
if ($page === 'home') {
    $objCandidat = new CandidateRepository();
    $data = $objCandidat->searchAll();
}

// Inclure le header
include "./header.php";

// Afficher le contenu selon la page
switch ($page) {
    case 'inscription':
        ctrlInscription();
        break;
    
    case 'connexion':
        ctrlLogin();
        break;
    
    case 'deconnexion':
        ctrlDeconnexion();
        break;

    default:
        ctrlAccueil();
        break;
}

// Inclure le footer
include "./footer.php";
?>
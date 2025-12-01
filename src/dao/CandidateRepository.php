<?php
require_once __DIR__ . '/Dbconnexion.php';

class CandidateRepository
{
    private PDO $pdo; // Instance de PDO pour la connexion à la base de données
    private string $table = "candidats"; // Nom de la table

    public function __construct() // Constructeur
    {
        $this->pdo = Dbconnexion::getInstance(); // Récupère l'instance de PDO
    }

}
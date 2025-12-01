<?php
final class  Dbconnexion
{

    private static ?PDO $connexion = null; // Instance de la connexion PDO, initialisée à null
    private static $host; // Hôte de la base de données
    private static $base; // Nom de la base de données
    private static $user; // Utilisateur de la base de données  
    private static $pass; // Mot de passe de la base de données
    private static $port; // Port de la base de données

    private function __construct() {} // Constructeur privé pour empêcher l'instanciation directe de la classe

    private static function setConfig() // Définit la configuration de la base de données
    {
        $config = require __DIR__.'/Config.php'; // Inclut le fichier de configuration et récupère les paramètres de la base de données

        self::$host = $config['host']; // Récupère l'hôte de la base de données depuis le fichier de configuration
        self::$base = $config['base'];// Récupère le nom de la base de données depuis le fichier de configuration
        self::$user = $config['user']; // Récupère l'utilisateur de la base de données depuis le fichier de configuration
        self::$pass = $config['pass']; // Récupère le mot de passe de la base de données depuis le fichier de configuration
        self::$port = $config['port'] ?? 3306; // Récupère le port de la base de données depuis le fichier de configuration, ou utilise 3306 par défaut
    }

    public static function getInstance(): PDO // Renvoie une instance de la connexion PDO
    {
        if (self::$connexion == null) { //  Si la connexion n'a pas encore été établie
            self::setConfig(); // Appelle la méthode pour définir la configuration de la base de données
            try { // Tente de créer une nouvelle connexion PDO
                self::$connexion = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$base . ";port=" . self::$port . ";charset=utf8", self::$user, self::$pass, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]); // Définit le mode de récupération par défaut sur FETCH_ASSOC
            } catch (Exception $e) { // En cas d'erreur lors de la connexion
                die("database connexion échouée:" . $e->getMessage()); // Affiche un message d'erreur et termine le script
            }
        }
        return self::$connexion; // Renvoie l'instance de la connexion PDO
    }
}

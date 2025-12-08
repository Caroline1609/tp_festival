<?php

function ctrlDeconnexion()
{
    // Détruire toutes les variables de session
    $_SESSION = array();
    
    // Détruire le cookie de session si il existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Détruire la session
    session_destroy();
    
    // Redémarrer une nouvelle session pour le message
    session_start();
    $_SESSION['success_message'] = "Vous avez été déconnecté avec succès. À bientôt !";
    
    // Redirection vers la page d'accueil
    header("Location: index.php");
    exit();
}

?>
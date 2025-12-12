<?php

use src\dao\CandidateRepository;

// Le contrôleur reçoit le Repository en argument
function ctrlLogin()
{
    // Initialisation du repository
    $objCandidat = new CandidateRepository();
    
    // Variables pour la vue
    $errors = [];
    $success = false;

    // Traitement du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Récupération des données
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validation des champs obligatoires
        if (empty($email) || empty($password)) {
            $errors[] = "Tous les champs sont obligatoires.";
        }

        // Validation de l'email
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email n'est pas valide.";
        }

        if (empty($errors)) {
            try {
                $user = $objCandidat->findByEmail($email);
                
                if ($user && password_verify($password, $user['pass_user'])) {
                    // Connexion réussie
                    $_SESSION['user_id'] = $user['id_user'];
                    $_SESSION['user_firstname'] = $user['firstname_user'];
                    $_SESSION['user_lastname'] = $user['lastname_user'];
                    $_SESSION['user_email'] = $user['mail_user'];
                    $_SESSION['success_message'] = "Connexion réussie ! Bienvenue " . htmlspecialchars($user['firstname_user']) . " !";
                    
                    // Redirection vers la page de compte
                    header("Location: compte.php");
                    exit();
                } else {
                    $errors[] = "Email ou mot de passe incorrect.";
                }
            } catch (Exception $e) {
                $errors[] = "Une erreur est survenue lors de la connexion.";
                error_log($e->getMessage());
            }
        }
    }

    // Affichage de la vue
    require "./src/views/connexion.php";
}

?>
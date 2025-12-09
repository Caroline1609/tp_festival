<?php

function ctrlInscription()
{
    // Initialisation des repositories
    $objCandidat = new CandidateRepository();
    $objDept = new DepartmentRepository();
    $tabData = $objDept->searchAll();
    
    // Variables pour la vue
    $errors = [];
    $success = false;

    // Traitement du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Récupération des données
        $lastname = trim($_POST['lastname'] ?? '');
        $firstname = trim($_POST['firstname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $confirmPassword = trim($_POST['confirmPassword'] ?? '');
        $department = trim($_POST['department'] ?? '');
        $age = trim($_POST['age'] ?? '');

        // Validation des champs obligatoires
        if (empty($lastname) || empty($firstname) || empty($email) || empty($password) || empty($confirmPassword) || empty($department) || empty($age)) {
            $errors[] = "Tous les champs sont obligatoires.";
        }

        // Validation de l'email
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email n'est pas valide.";
        }

        // ✅ VÉRIFICATION SI L'EMAIL EXISTE DÉJÀ
        if (!empty($email) && $objCandidat->emailExists($email)) {
            $errors[] = "Cette adresse email est déjà utilisée.";
        }

        // Validation du mot de passe
        if (!empty($password) && strlen($password) < 8) { // Le mot de passe doit contenir au moins 8 caractères
            $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
        }

        // Vérification de la correspondance des mots de passe
        if (!empty($password) && !empty($confirmPassword) && $password !== $confirmPassword) { // Les mots de passe ne correspondent pas
            $errors[] = "Les mots de passe ne correspondent pas.";
        }

        // Validation de l'âge
        if (!empty($age) && (!is_numeric($age) || $age < 18)) { // L'âge minimum est de 18 ans
            $errors[] = "Vous devez avoir au moins 18 ans pour vous inscrire.";
        }

        // Validation du département
        if (!empty($department) && !is_numeric($department)) {
            $errors[] = "Veuillez sélectionner un département valide.";
        }

        if (empty($errors)) {
            try {
                $result = $objCandidat->insert($lastname, $firstname, $email, $password, $department, $age); // Insertion du candidat
                
                if ($result) {
                    $success = true;
                    $_SESSION['success_message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                    
                    // Redirection vers la page de connexion
                    header("Location: index.php?page=connexion");
                    exit();
                } else {
                    $errors[] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
                }
            } catch (Exception $e) {
                $errors[] = "Une erreur est survenue lors de l'inscription.";
                // Pour le débogage (à retirer en production)
                error_log($e->getMessage());
            }
        }
    }

    // Affichage de la vue
    require "./src/views/inscription.php";
}

?>
<?php


// Traitement du formulaire d'inscription
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lastname = trim($_POST['lastname'] ?? '');
    $firstname = trim($_POST['firstname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $department = $_POST['department'] ?? '';
    
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, ['options' => ['min_range' => 18, 'max_range' => 120]]);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email n'est pas valide.";
    }

    
    if (!filter_var($department, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
        $errors[] = "Veuillez sélectionner un département valide.";

        $department = null; 
    }


    $db = DbConnection::getInstance();
    
    $checkQuery = "SELECT COUNT(*) FROM candidats WHERE mail_user = :email";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->execute(['email' => $email]);
    
    if ($checkStmt->fetchColumn() > 0) {
        $errors[] = "Cet email est déjà utilisé.";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $insertQuery = "INSERT INTO candidats (lastname_user, firstname_user, mail_user, pass_user, departement_user, age_user, archive_user) 
                            VALUES (:lastname, :firstname, :email, :password, :department, :age, 0)";
        $insertStmt = $db->prepare($insertQuery);
        
        // Exécution avec les valeurs validées
        $insertStmt->execute([
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email,
            'password' => $hashedPassword,
            'department' => $department,
            'age' => $age               
        ]);
        
        $success = true;
        $_SESSION['success_message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    }

    }

?>
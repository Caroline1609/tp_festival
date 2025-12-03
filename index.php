<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    // Contrôleur principal
    require "./src/dao/DbConnection.php";
    require "./src/dao/DepartmentRepository.php";

    $allowedPages = ['home', 'inscription']; // Liste des pages autorisées
    $page = isset($_GET["page"]) && in_array($_GET["page"], $allowedPages) ? $_GET["page"] : 'home';

    switch ($page) {
        case 'inscription':
            include "./src/views/inscription.php";
            break;

        default:
            include "./src/views/home.php";
            break;
    }
?>
</body>
</html>

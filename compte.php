<?php
session_start();

if (empty($_SESSION['user_id'])) {
    header('Location: index.php?page=connexion');
    exit;
}

include "./header.php";
?>

<div class="container py-5">
    <div class="card">
        <div class="card-body text-center">
            <h2 class="card-title">Mon compte</h2>
            <p class="card-text">Bonjour <?php echo htmlspecialchars($_SESSION['user_firstname'] ?? ''); ?> <?php echo htmlspecialchars($_SESSION['user_lastname'] ?? ''); ?></p>
            <p class="card-text">Email : <?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?></p>
            <a href="index.php?page=deconnexion" class="btn btn-primary">Se déconnecter</a>
        </div>
    </div>
</div>

<?php include "./footer.php"; ?>

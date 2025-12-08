<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?? "Inscription Candidat Foire aux Vins"; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>
</head>
<body>
 <header>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <i class="fas fa-wine-bottle"></i>
        Foire aux Vins
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?php echo (!isset($_GET['page']) || $_GET['page'] === 'home') ? 'active' : ''; ?>" href="index.php">
              <i class="fas fa-home"></i> Accueil
            </a>
          </li>
          <?php if (!isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] === 'inscription') ? 'active' : ''; ?>" href="index.php?page=inscription">
              <i class="fas fa-user-plus"></i> Inscription
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] === 'connexion') ? 'active' : ''; ?>" href="index.php?page=connexion">
              <i class="fas fa-sign-in-alt"></i> Connexion
            </a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['user_firstname']); ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=deconnexion">
              <i class="fas fa-sign-out-alt"></i> Déconnexion
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <?php if (isset($_SESSION['success_message'])): ?>
    <div class="container mt-3">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($_SESSION['success_message']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    <?php unset($_SESSION['success_message']); ?>
  <?php endif; ?>
</header>
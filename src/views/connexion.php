<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="index.php?page=connexion" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   placeholder="votre.email@exemple.fr" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> Mot de passe
                            </label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   placeholder="••••••••" required>
                        </div>
                        
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt"></i> Se connecter
                            </button>
                        </div>
                        
                        <div class="text-center">
                            <p class="mb-0">Pas encore inscrit ? 
                                <a href="index.php?page=inscription" class="text-decoration-none fw-bold" style="color: var(--secondary-color);">
                                    Créer un compte
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
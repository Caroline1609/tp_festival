

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">Inscription</h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ($success): ?>
                        <div class="alert alert-success">
                            Inscription réussie ! <a href="index.php?page=connexion">Se connecter</a>
                        </div>
                    <?php else: ?>
                        <form action="../controllers/register.php" method="post">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Nom :</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" 
                                        value="<?php echo htmlspecialchars($_POST['lastname'] ?? ''); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Prénom :</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" 
                                        value="<?php echo htmlspecialchars($_POST['firstname'] ?? ''); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe :</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="form-text">Minimum 8 caractères</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirmation du mot de passe :</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="department" class="form-label">Département :</label>
                                <select class="form-select" id="department" name="department" required>
                                    <option value="" selected disabled>Choisissez un département</option>
                                    <?php
                                        $objDept = new DepartmentRepository();
                                        $tabData = $objDept->searchAll();
                                        foreach ($tabData as $dept) {
                                            $selected = (isset($_POST['department']) && $_POST['department'] == $dept["id_dep"]) ? 'selected' : '';
                                            echo "<option value='" . htmlspecialchars($dept["id_dep"]) . "' $selected>" . htmlspecialchars($dept["Name"]) . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="age" class="form-label">Votre âge :</label>
                                <input type="number" class="form-control" id="age" name="age" step="1" min="18" max="120" 
                                        value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>" required>
                                <div class="form-text">Vous devez avoir plus de 18 ans pour participer au jeu concours.</div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">Inscription</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="" >
                            <div class="mb-3">
                                <label for="username" class="form-label">Nom du candidat :</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email du candidat :</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe :</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirmation du mot de passe :</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Département :</label>
                                <select class="form-select" id="department" name="department" required>
                                    <option selected disabled>Choisissez un département</option>
                                    <?php
                                        $objDept = new DepartmentRepository();
                                        $tabData = $objDept->searchAll();
                                        for ($i=0 ; $i<count($tabData) ; $i++) {
                                            echo "<option value='" . $tabData[$i]["id_dept"] . "'>" . $tabData[$i]["Name"] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Votre âge : *</label>
                                <input type="number" class="form-control" id="age" name="age" step="1" min="18" max="120" required>
                                <div id="summary" class="form-text">Vous devez avoir plus de 18 ans pour participer au jeu concours.</div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-wine-glass-alt"></i> Bienvenue à la Foire aux Vins 2025
                    </h3>
                </div>
                <div class="card-body">
                    <p class="lead">Découvrez notre sélection exceptionnelle de vins et participez à notre grand concours !</p>
                    <p>Inscrivez-vous dès maintenant pour tenter de gagner des prix incroyables.</p>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['user_id'])): ?>
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-success">
                <i class="fas fa-user-check"></i> Connecté en tant que <strong><?php echo htmlspecialchars($_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname']); ?></strong>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-users"></i> Liste des candidats inscrits
                    </h4>
                </div>
                <div class="card-body p-0">
                    <?php
                    $data = $data ?? [];

                    if (empty($data)) {
                        echo "<div class='p-4 text-center text-muted'><i class='fas fa-info-circle'></i> Aucun candidat inscrit pour le moment.</div>";
                    } else {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-hover mb-0'>";
                        echo "<thead><tr>";
                        echo "<th><i class='fas fa-hashtag'></i> ID</th>";
                        echo "<th><i class='fas fa-user'></i> Nom</th>";
                        echo "<th><i class='fas fa-user'></i> Prénom</th>";
                        echo "<th><i class='fas fa-envelope'></i> Email</th>";
                        echo "<th><i class='fas fa-map-marker-alt'></i> Département</th>";
                        echo "<th><i class='fas fa-birthday-cake'></i> Âge</th>";
                        echo "</tr></thead><tbody>";

                        foreach ($data as $row) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id_user']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['lastname_user']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['firstname_user']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['mail_user']) . "</td>";
                            echo "<td><span class='badge' style='background: linear-gradient(135deg, #8B0000 0%, #DC143C 100%);'>" . htmlspecialchars($row['departement_user']) . "</span></td>";
                            echo "<td>" . htmlspecialchars($row['age_user']) . " ans</td>";
                            echo "</tr>";
                        }
                        echo "</tbody></table>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
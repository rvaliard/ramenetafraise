<?php
header('Content-Type: text/html; charset=UTF-8');
// Simple session management for demo purposes
session_start();

// Sample data for announcements
$annonces = [
    [
        'id' => 1,
        'titre' => 'Verger de pommiers et poiriers à entretenir',
        'lieu' => 'Angers, Maine-et-Loire',
        'proprietaire' => 'Marie',
        'age' => 78,
        'date' => '2 jours',
        'description' => 'J\'ai un beau verger de 15 arbres fruitiers qui nécessite de l\'aide pour la taille et la récolte. En échange, vous repartez avec des fruits frais !',
        'fruits' => ['Pommes', 'Poires', 'Prunes'],
        'taches' => ['Taille', 'Récolte', 'Désherbage'],
        'urgent' => false
    ],
    [
        'id' => 2,
        'titre' => 'Aide urgente pour récolte de cerises',
        'lieu' => 'Tours, Indre-et-Loire',
        'proprietaire' => 'Jean',
        'age' => 82,
        'date' => '1 jour',
        'description' => 'Mes cerisiers croulent sous les fruits ! J\'ai besoin d\'aide rapide pour la récolte avant que les oiseaux ne s\'en chargent.',
        'fruits' => ['Cerises', 'Groseilles'],
        'taches' => ['Récolte urgente'],
        'urgent' => true
    ],
    [
        'id' => 3,
        'titre' => 'Entretien régulier d\'un petit verger familial',
        'lieu' => 'Le Mans, Sarthe',
        'proprietaire' => 'Colette',
        'age' => 71,
        'date' => '3 jours',
        'description' => 'Recherche une personne fiable pour m\'aider régulièrement avec mon verger. Ambiance familiale garantie avec goûter maison !',
        'fruits' => ['Pommes', 'Noix', 'Coings'],
        'taches' => ['Entretien régulier', 'Taille', 'Ramassage'],
        'urgent' => false
    ],
    [
        'id' => 4,
        'titre' => 'Grand verger bio cherche main d\'œuvre',
        'lieu' => 'Laval, Mayenne',
        'proprietaire' => 'Pierre',
        'age' => 65,
        'date' => '1 semaine',
        'description' => 'Verger bio de 2 hectares avec de nombreuses variétés anciennes. Recherche aide pour l\'entretien et la récolte. Parfait pour apprendre !',
        'fruits' => ['Pommes anciennes', 'Poires', 'Châtaignes', 'Noisettes'],
        'taches' => ['Taille', 'Récolte', 'Élagage', 'Compostage'],
        'urgent' => false
    ],
    [
        'id' => 5,
        'titre' => 'Petit verger urbain à partager',
        'lieu' => 'Nantes, Loire-Atlantique',
        'proprietaire' => 'Sylvie',
        'age' => 58,
        'date' => '5 jours',
        'description' => 'Petit verger en ville avec quelques arbres fruitiers. Idéal pour débuter et apprendre les bases du jardinage en ville.',
        'fruits' => ['Pommes', 'Prunes', 'Figues'],
        'taches' => ['Arrosage', 'Récolte', 'Taille légère'],
        'urgent' => false
    ],
    [
        'id' => 6,
        'titre' => 'Verger traditionnel avec animaux',
        'lieu' => 'Cholet, Maine-et-Loire',
        'proprietaire' => 'Robert',
        'age' => 74,
        'date' => '1 semaine',
        'description' => 'Venez découvrir la vie à la campagne ! Verger avec poules et moutons. Recherche aide pour la récolte et l\'entretien général.',
        'fruits' => ['Pommes', 'Poires', 'Prunes', 'Œufs frais'],
        'taches' => ['Récolte', 'Soins aux animaux', 'Ramassage'],
        'urgent' => false
    ]
];

// Filter functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$location_filter = isset($_GET['location']) ? $_GET['location'] : '';
$urgent_only = isset($_GET['urgent']) ? $_GET['urgent'] : false;

if ($search || $location_filter || $urgent_only) {
    $annonces = array_filter($annonces, function($annonce) use ($search, $location_filter, $urgent_only) {
        $match_search = empty($search) || 
                       stripos($annonce['titre'], $search) !== false || 
                       stripos($annonce['description'], $search) !== false;
        
        $match_location = empty($location_filter) || 
                         stripos($annonce['lieu'], $location_filter) !== false;
        
        $match_urgent = !$urgent_only || $annonce['urgent'];
        
        return $match_search && $match_location && $match_urgent;
    });
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonces disponibles - RameneTaFraise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-leaf text-success me-2"></i>
                <strong>RameneTaFraise</strong>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#comment-ca-marche">Comment ça marche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="annonces.php">Voir les annonces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="abonnements.php">Abonnements</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success text-white px-4" href="publier.php">
                            <i class="fas fa-plus me-2"></i>Publier une annonce
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-5 fw-bold mb-3">Annonces disponibles</h1>
                    <p class="lead text-muted">
                        Découvrez les vergers près de chez vous qui ont besoin d'aide. Une belle façon de créer du lien et de manger sainement !
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="py-4 bg-white border-bottom">
        <div class="container">
            <form method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="search" class="form-label">Rechercher</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           placeholder="Mots-clés..." value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-3">
                    <label for="location" class="form-label">Localisation</label>
                    <select class="form-select" id="location" name="location">
                        <option value="">Toutes les régions</option>
                        <option value="Maine-et-Loire" <?php echo $location_filter == 'Maine-et-Loire' ? 'selected' : ''; ?>>Maine-et-Loire</option>
                        <option value="Indre-et-Loire" <?php echo $location_filter == 'Indre-et-Loire' ? 'selected' : ''; ?>>Indre-et-Loire</option>
                        <option value="Sarthe" <?php echo $location_filter == 'Sarthe' ? 'selected' : ''; ?>>Sarthe</option>
                        <option value="Mayenne" <?php echo $location_filter == 'Mayenne' ? 'selected' : ''; ?>>Mayenne</option>
                        <option value="Loire-Atlantique" <?php echo $location_filter == 'Loire-Atlantique' ? 'selected' : ''; ?>>Loire-Atlantique</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="urgent" name="urgent" value="1" 
                               <?php echo $urgent_only ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="urgent">
                            Urgent uniquement
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-search me-2"></i>Filtrer
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Announcements Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <?php if (empty($annonces)): ?>
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-search text-muted" style="font-size: 4rem;"></i>
                        <h3 class="mt-3 text-muted">Aucune annonce trouvée</h3>
                        <p class="text-muted">Essayez de modifier vos critères de recherche.</p>
                        <a href="annonces.php" class="btn btn-outline-success">Voir toutes les annonces</a>
                    </div>
                <?php else: ?>
                    <?php foreach ($annonces as $annonce): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title"><?php echo htmlspecialchars($annonce['titre']); ?></h5>
                                        <?php if ($annonce['urgent']): ?>
                                            <span class="badge bg-danger">Urgent</span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt me-1"></i><?php echo htmlspecialchars($annonce['lieu']); ?><br>
                                            <i class="fas fa-user me-1"></i><?php echo htmlspecialchars($annonce['proprietaire']); ?>, <?php echo $annonce['age']; ?> ans<br>
                                            <i class="fas fa-clock me-1"></i>Il y a <?php echo htmlspecialchars($annonce['date']); ?>
                                        </small>
                                    </div>
                                    
                                    <p class="card-text text-muted">
                                        <?php echo htmlspecialchars($annonce['description']); ?>
                                    </p>
                                    
                                    <div class="mb-3">
                                        <strong class="text-warning">Fruits disponibles</strong><br>
                                        <?php foreach ($annonce['fruits'] as $fruit): ?>
                                            <span class="badge bg-light text-dark me-1"><?php echo htmlspecialchars($fruit); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <strong class="text-info">Tâches à réaliser</strong><br>
                                        <?php foreach ($annonce['taches'] as $tache): ?>
                                            <span class="badge <?php echo $annonce['urgent'] && strpos($tache, 'urgent') !== false ? 'bg-danger' : 'bg-secondary'; ?> me-1">
                                                <?php echo htmlspecialchars($tache); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                    
                                    <a href="contact.php?id=<?php echo $annonce['id']; ?>" class="btn btn-success w-100">
                                        <i class="fas fa-phone me-2"></i>Contacter <?php echo htmlspecialchars($annonce['proprietaire']); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <!-- Load More Button (for future pagination) -->
            <?php if (count($annonces) >= 6): ?>
                <div class="text-center mt-5">
                    <button class="btn btn-outline-success btn-lg" onclick="loadMore()">
                        <i class="fas fa-plus me-2"></i>Charger plus d'annonces
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">Vous avez un verger ?</h3>
            <p class="lead text-muted mb-4">
                Rejoignez notre communauté et trouvez de l'aide pour votre verger tout en créant des liens intergénérationnels.
            </p>
            <a href="publier.php" class="btn btn-success btn-lg">
                <i class="fas fa-leaf me-2"></i>Publier une annonce gratuitement
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-leaf text-success me-2"></i>
                        <strong class="h5">RameneTaFraise</strong>
                    </div>
                    <p class="text-muted">
                        Créons des liens intergénérationnels autour du partage et de la nature.
                    </p>
                </div>
                
                <div class="col-lg-2">
                    <h6 class="text-warning">Navigation</h6>
                    <ul class="list-unstyled">
                        <li><a href="index.php#comment-ca-marche" class="text-muted text-decoration-none">Comment ça marche</a></li>
                        <li><a href="annonces.php" class="text-muted text-decoration-none">Voir les annonces</a></li>
                        <li><a href="abonnements.php" class="text-muted text-decoration-none">Abonnements</a></li>
                        <li><a href="publier.php" class="text-muted text-decoration-none">Publier une annonce</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h6 class="text-warning">Aide & Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="mentionslegales.php" class="text-muted text-decoration-none">Mentions légales</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h6 class="text-warning">Contact</h6>
                    <ul class="list-unstyled text-muted">
                        <li><i class="fas fa-envelope me-2"></i>contact@RameneTaFraise.fr</li>
                        <li><i class="fas fa-phone me-2"></i>09 55 78 90 34</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Villeneuve-d'Ascq, France</li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="text-center text-muted">
                <p>&copy; 2025 RameneTaFraise. Une initiative pour rapprocher les générations autour du jardinage.</p>
            </div>
        </div>
    </footer>

    <!-- Chat Button -->
    <div class="chat-button">
        <button class="btn btn-warning rounded-circle shadow" data-bs-toggle="tooltip" title="Besoin d'aide ?">
            <i class="fas fa-comments"></i>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Load more functionality (demo)
        function loadMore() {
            const button = event.target;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Chargement...';
            button.disabled = true;
            
            // Simulate loading
            setTimeout(() => {
                alert('Fonctionnalité de pagination à implémenter selon vos besoins !');
                button.innerHTML = '<i class="fas fa-plus me-2"></i>Charger plus d\'annonces';
                button.disabled = false;
            }, 1000);
        }

        // Auto-submit form on urgent checkbox change
        document.getElementById('urgent').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
</body>
</html>
<?php
header('Content-Type: text/html; charset=UTF-8');
// Simple session management for demo purposes
session_start();

// Sample announcement data (in a real app, this would come from database)
$annonces = [
    1 => [
        'titre' => 'Verger de pommiers et poiriers à entretenir',
        'lieu' => 'Angers, Maine-et-Loire',
        'proprietaire' => 'Marie',
        'age' => 78,
        'description' => 'J\'ai un beau verger de 15 arbres fruitiers qui nécessite de l\'aide pour la taille et la récolte. En échange, vous repartez avec des fruits frais !',
        'fruits' => ['Pommes', 'Poires', 'Prunes'],
        'taches' => ['Taille', 'Récolte', 'Désherbage'],
        'email' => 'marie.verger@example.com',
        'telephone' => '02 41 XX XX XX'
    ],
    2 => [
        'titre' => 'Aide urgente pour récolte de cerises',
        'lieu' => 'Tours, Indre-et-Loire',
        'proprietaire' => 'Jean',
        'age' => 82,
        'description' => 'Mes cerisiers croulent sous les fruits ! J\'ai besoin d\'aide rapide pour la récolte avant que les oiseaux ne s\'en chargent.',
        'fruits' => ['Cerises', 'Groseilles'],
        'taches' => ['Récolte urgente'],
        'email' => 'jean.martin@example.com',
        'telephone' => '02 47 XX XX XX'
    ],
    3 => [
        'titre' => 'Entretien régulier d\'un petit verger familial',
        'lieu' => 'Le Mans, Sarthe',
        'proprietaire' => 'Colette',
        'age' => 71,
        'description' => 'Recherche une personne fiable pour m\'aider régulièrement avec mon verger. Ambiance familiale garantie avec goûter maison !',
        'fruits' => ['Pommes', 'Noix', 'Coings'],
        'taches' => ['Entretien régulier', 'Taille', 'Ramassage'],
        'email' => 'colette.jardin@example.com',
        'telephone' => '02 43 XX XX XX'
    ]
];

$annonce_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$annonce = isset($annonces[$annonce_id]) ? $annonces[$annonce_id] : null;

$success_message = '';
$error_message = '';

// Handle contact form submission
if ($_POST && $annonce) {
    $required_fields = ['nom', 'email', 'telephone', 'message'];
    $missing_fields = [];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }
    
    if (empty($missing_fields)) {
        // In a real application, you would send an email or save to database
        $success_message = "Votre message a été envoyé avec succès à " . htmlspecialchars($annonce['proprietaire']) . " !";
        $_POST = []; // Clear form
    } else {
        $error_message = "Veuillez remplir tous les champs obligatoires.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacter <?php echo htmlspecialchars($annonce['proprietaire']); ?> - RameneTaFraise</title>
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
                        <a class="nav-link" href="index.php#comment-ca-marche">Comment ça marche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="annonces.php">Voir les annonces</a>
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
    <section class="bg-light py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="annonces.php" class="text-decoration-none">Annonces</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
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
                        <li><a href="publier.php" class="text-muted text-decoration-none">Publier une annonce</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Témoignages</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h6 class="text-warning">Aide & Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted text-decoration-none">Guide d'utilisation</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Sécurité</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Questions fréquentes</a></li>
                        <li><a href="#" class="text-muted text-decoration-none">Conditions d'utilisation</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h6 class="text-warning">Contact</h6>
                    <ul class="list-unstyled text-muted">
                        <li><i class="fas fa-envelope me-2"></i>contact@RameneTaFraise.fr</li>
                        <li><i class="fas fa-phone me-2"></i>09 xx xx xx xx</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Pays de la Loire, France</li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="text-center text-muted">
                <p>&copy; 2024 RameneTaFraise. Une initiative pour rapprocher les générations autour du jardinage.</p>
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

        // Form submission handling
        document.getElementById('contactForm')?.addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Envoi en cours...';
            submitBtn.disabled = true;
        });

        // Character counter for message
        const messageTextarea = document.getElementById('message');
        if (messageTextarea) {
            messageTextarea.addEventListener('input', function() {
                const length = this.value.length;
                const minLength = 50;
                
                if (length < minLength) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        }

        // Auto-fill suggestions
        const suggestions = {
            'debutant': 'Je suis débutant(e) mais très motivé(e) pour apprendre !',
            'amateur': 'J\'ai quelques notions de jardinage et j\'aimerais approfondir mes connaissances.',
            'experimente': 'J\'ai de l\'expérience en jardinage et je serais ravi(e) de partager mes connaissances.',
            'professionnel': 'Je suis professionnel du jardinage et peux apporter une expertise technique.'
        };

        document.getElementById('experience')?.addEventListener('change', function() {
            const messageField = document.getElementById('message');
            if (messageField.value === '' && suggestions[this.value]) {
                messageField.value = suggestions[this.value] + '\n\n';
                messageField.focus();
                messageField.setSelectionRange(messageField.value.length, messageField.value.length);
            }
        });
    </script>
</body>
</html>
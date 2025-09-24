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

if (!$annonce) {
    header('Location: annonces.php');
    exit;
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

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Announcement Details -->
                <div class="col-lg-5 mb-5">
                    <div class="card border-0 shadow-lg sticky-top" style="top: 2rem;">
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold mb-3"><?php echo htmlspecialchars($annonce['titre']); ?></h4>
                            
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt me-2"></i><?php echo htmlspecialchars($annonce['lieu']); ?><br>
                                    <i class="fas fa-user me-2"></i><?php echo htmlspecialchars($annonce['proprietaire']); ?>, <?php echo $annonce['age']; ?> ans
                                </small>
                            </div>
                            
                            <p class="card-text text-muted mb-4">
                                <?php echo htmlspecialchars($annonce['description']); ?>
                            </p>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold text-warning">
                                    <i class="fas fa-apple-alt me-2"></i>Fruits disponibles
                                </h6>
                                <?php foreach ($annonce['fruits'] as $fruit): ?>
                                    <span class="badge bg-light text-dark me-1"><?php echo htmlspecialchars($fruit); ?></span>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="mb-4">
                                <h6 class="fw-bold text-info">
                                    <i class="fas fa-tasks me-2"></i>Tâches à réaliser
                                </h6>
                                <?php foreach ($annonce['taches'] as $tache): ?>
                                    <span class="badge bg-secondary me-1"><?php echo htmlspecialchars($tache); ?></span>
                                <?php endforeach; ?>
                            </div>
                            
                            <!-- Direct Contact Info -->
                            <div class="border-top pt-3">
                                <h6 class="fw-bold text-success mb-3">Contact direct</h6>
                                <div class="d-grid gap-2">
                                    <a href="tel:<?php echo htmlspecialchars($annonce['telephone']); ?>" class="btn btn-outline-success">
                                        <i class="fas fa-phone me-2"></i><?php echo htmlspecialchars($annonce['telephone']); ?>
                                    </a>
                                    <a href="mailto:<?php echo htmlspecialchars($annonce['email']); ?>" class="btn btn-outline-info">
                                        <i class="fas fa-envelope me-2"></i>Envoyer un email
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <h3 class="fw-bold mb-2">Contactez <?php echo htmlspecialchars($annonce['proprietaire']); ?></h3>
                            <p class="text-muted mb-4">
                                Présentez-vous et expliquez votre intérêt pour cette annonce. 
                                <?php echo htmlspecialchars($annonce['proprietaire']); ?> recevra votre message et pourra vous répondre directement.
                            </p>
                            
                            <?php if ($success_message): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <?php echo $success_message; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                
                                <div class="text-center mt-4">
                                    <h5 class="text-success">Message envoyé !</h5>
                                    <p class="text-muted">Vous devriez recevoir une réponse sous 24-48h.</p>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                                        <a href="annonces.php" class="btn btn-outline-success">
                                            <i class="fas fa-arrow-left me-2"></i>Voir d'autres annonces
                                        </a>
                                        <a href="tel:<?php echo htmlspecialchars($annonce['telephone']); ?>" class="btn btn-success">
                                            <i class="fas fa-phone me-2"></i>Appeler maintenant
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php if ($error_message): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <?php echo $error_message; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                <?php endif; ?>
                                
                                <form method="POST" id="contactForm">
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label for="nom" class="form-label">Votre nom *</label>
                                            <input type="text" class="form-control" id="nom" name="nom" 
                                                   value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="age" class="form-label">Votre âge</label>
                                            <input type="number" class="form-control" id="age" name="age" 
                                                   min="16" max="120" value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Votre email *</label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telephone" class="form-label">Votre téléphone *</label>
                                            <input type="tel" class="form-control" id="telephone" name="telephone" 
                                                   value="<?php echo htmlspecialchars($_POST['telephone'] ?? ''); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="disponibilite" class="form-label">Vos disponibilités</label>
                                        <select class="form-select" id="disponibilite" name="disponibilite">
                                            <option value="">Sélectionnez...</option>
                                            <option value="weekend" <?php echo (($_POST['disponibilite'] ?? '') == 'weekend') ? 'selected' : ''; ?>>Weekends</option>
                                            <option value="semaine" <?php echo (($_POST['disponibilite'] ?? '') == 'semaine') ? 'selected' : ''; ?>>En semaine</option>
                                            <option value="flexible" <?php echo (($_POST['disponibilite'] ?? '') == 'flexible') ? 'selected' : ''; ?>>Flexible</option>
                                            <option value="urgent" <?php echo (($_POST['disponibilite'] ?? '') == 'urgent') ? 'selected' : ''; ?>>Disponible rapidement</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="experience" class="form-label">Votre expérience</label>
                                        <select class="form-select" id="experience" name="experience">
                                            <option value="">Sélectionnez...</option>
                                            <option value="debutant" <?php echo (($_POST['experience'] ?? '') == 'debutant') ? 'selected' : ''; ?>>Débutant(e)</option>
                                            <option value="amateur" <?php echo (($_POST['experience'] ?? '') == 'amateur') ? 'selected' : ''; ?>>Amateur</option>
                                            <option value="experimente" <?php echo (($_POST['experience'] ?? '') == 'experimente') ? 'selected' : ''; ?>>Expérimenté(e)</option>
                                            <option value="professionnel" <?php echo (($_POST['experience'] ?? '') == 'professionnel') ? 'selected' : ''; ?>>Professionnel</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="message" class="form-label">Votre message *</label>
                                        <textarea class="form-control" id="message" name="message" rows="6" 
                                                  placeholder="Présentez-vous, expliquez votre motivation et vos disponibilités. Soyez authentique !" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                                        <div class="form-text">
                                            Conseil : Parlez de votre motivation, votre expérience (même minime), et ce que vous espérez apprendre ou partager.
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="copie_email" name="copie_email" checked>
                                            <label class="form-check-label" for="copie_email">
                                                Recevoir une copie de ce message par email
                                            </label>
                                        </div>
                                        
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                            <label class="form-check-label" for="newsletter">
                                                M'abonner aux conseils jardinage de RameneTaFraise
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                                        <a href="annonces.php" class="btn btn-outline-secondary">
                                            <i class="fas fa-arrow-left me-2"></i>Retour aux annonces
                                        </a>
                                        <button type="submit" class="btn btn-success btn-lg" id="submitBtn">
                                            <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                                        </button>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <?php if (!$success_message): ?>
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h4 class="text-center fw-bold mb-4">
                        <i class="fas fa-lightbulb text-warning me-2"></i>Conseils pour un premier contact réussi
                    </h4>
                    
                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-smile text-success" style="font-size: 2rem;"></i>
                            </div>
                            <h6 class="fw-bold">Soyez authentique</h6>
                            <p class="text-muted small">
                                Présentez-vous sincèrement, même si vous êtes débutant. L'envie d'apprendre compte plus que l'expérience.
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-calendar-check text-info" style="font-size: 2rem;"></i>
                            </div>
                            <h6 class="fw-bold">Précisez vos disponibilités</h6>
                            <p class="text-muted small">
                                Indiquez clairement quand vous êtes disponible et pour combien de temps.
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-heart text-danger" style="font-size: 2rem;"></i>
                            </div>
                            <h6 class="fw-bold">Exprimez votre motivation</h6>
                            <p class="text-muted small">
                                Expliquez pourquoi cette annonce vous intéresse et ce que vous espérez en retirer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Related Announcements -->
    <section class="py-5">
        <div class="container">
            <h4 class="text-center fw-bold mb-5">Autres annonces qui pourraient vous intéresser</h4>
            
            <div class="row g-4">
                <?php
                // Show other announcements (excluding current one)
                $other_annonces = array_filter($annonces, function($key) use ($annonce_id) {
                    return $key != $annonce_id;
                }, ARRAY_FILTER_USE_KEY);
                
                $count = 0;
                foreach ($other_annonces as $id => $other): 
                    if ($count >= 2) break; // Show only 2 other announcements
                    $count++;
                ?>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo htmlspecialchars($other['titre']); ?></h6>
                                <div class="mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i><?php echo htmlspecialchars($other['lieu']); ?><br>
                                        <i class="fas fa-user me-1"></i><?php echo htmlspecialchars($other['proprietaire']); ?>, <?php echo $other['age']; ?> ans
                                    </small>
                                </div>
                                <p class="card-text text-muted small">
                                    <?php echo htmlspecialchars(substr($other['description'], 0, 100)); ?>...
                                </p>
                                <div class="mb-3">
                                    <?php foreach (array_slice($other['fruits'], 0, 3) as $fruit): ?>
                                        <span class="badge bg-light text-dark me-1 small"><?php echo htmlspecialchars($fruit); ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <a href="contact.php?id=<?php echo $id; ?>" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-phone me-1"></i>Contacter <?php echo htmlspecialchars($other['proprietaire']); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-4">
                <a href="annonces.php" class="btn btn-outline-success">
                    <i class="fas fa-search me-2"></i>Voir toutes les annonces
                </a>
            </div>
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
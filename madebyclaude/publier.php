<?php
// Simple session management for demo purposes
session_start();

$success_message = '';
$error_message = '';

// Handle form submission
if ($_POST) {
    // Basic validation
    $required_fields = ['nom', 'age', 'email', 'telephone', 'ville', 'titre', 'description'];
    $missing_fields = [];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }
    
    if (empty($missing_fields)) {
        // In a real application, you would save to database
        $success_message = "Votre annonce a été publiée avec succès ! Elle sera visible après modération.";
        
        // Clear form data
        $_POST = [];
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
    <title>Publier une annonce - VergerPartage</title>
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
                <strong>VergerPartage</strong>
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
                        <a class="nav-link active fw-bold" href="publier.php">Publier une annonce</a>
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
                    <h1 class="display-5 fw-bold mb-3">Publier une annonce</h1>
                    <p class="lead text-muted">
                        Partagez votre verger avec la communauté et trouvez de l'aide tout en créant des liens intergénérationnels.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if ($success_message): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <?php echo $success_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($error_message): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <?php echo $error_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <form method="POST" id="annonceForm">
                                <!-- Personal Information -->
                                <div class="mb-5">
                                    <h4 class="fw-bold text-success mb-4">
                                        <i class="fas fa-user me-2"></i>Vos informations personnelles
                                    </h4>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="nom" class="form-label">Nom complet *</label>
                                            <input type="text" class="form-control" id="nom" name="nom" 
                                                   value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="age" class="form-label">Âge *</label>
                                            <input type="number" class="form-control" id="age" name="age" 
                                                   min="18" max="120" value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email *</label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telephone" class="form-label">Téléphone *</label>
                                            <input type="tel" class="form-control" id="telephone" name="telephone" 
                                                   value="<?php echo htmlspecialchars($_POST['telephone'] ?? ''); ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="mb-5">
                                    <h4 class="fw-bold text-success mb-4">
                                        <i class="fas fa-map-marker-alt me-2"></i>Localisation de votre verger
                                    </h4>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="ville" class="form-label">Ville *</label>
                                            <input type="text" class="form-control" id="ville" name="ville" 
                                                   value="<?php echo htmlspecialchars($_POST['ville'] ?? ''); ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="departement" class="form-label">Département</label>
                                            <select class="form-select" id="departement" name="departement">
                                                <option value="">Sélectionnez...</option>
                                                <option value="Maine-et-Loire" <?php echo (($_POST['departement'] ?? '') == 'Maine-et-Loire') ? 'selected' : ''; ?>>Maine-et-Loire (49)</option>
                                                <option value="Indre-et-Loire" <?php echo (($_POST['departement'] ?? '') == 'Indre-et-Loire') ? 'selected' : ''; ?>>Indre-et-Loire (37)</option>
                                                <option value="Sarthe" <?php echo (($_POST['departement'] ?? '') == 'Sarthe') ? 'selected' : ''; ?>>Sarthe (72)</option>
                                                <option value="Mayenne" <?php echo (($_POST['departement'] ?? '') == 'Mayenne') ? 'selected' : ''; ?>>Mayenne (53)</option>
                                                <option value="Loire-Atlantique" <?php echo (($_POST['departement'] ?? '') == 'Loire-Atlantique') ? 'selected' : ''; ?>>Loire-Atlantique (44)</option>
                                                <option value="Vendée" <?php echo (($_POST['departement'] ?? '') == 'Vendée') ? 'selected' : ''; ?>>Vendée (85)</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="adresse" class="form-label">Adresse approximative</label>
                                            <input type="text" class="form-control" id="adresse" name="adresse" 
                                                   placeholder="Ex: Quartier des Jardins (pas d'adresse exacte nécessaire)"
                                                   value="<?php echo htmlspecialchars($_POST['adresse'] ?? ''); ?>">
                                            <div class="form-text">Donnez une indication générale pour rassurer sans dévoiler votre adresse exacte.</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Announcement Details -->
                                <div class="mb-5">
                                    <h4 class="fw-bold text-success mb-4">
                                        <i class="fas fa-tree me-2"></i>Détails de votre annonce
                                    </h4>
                                    
                                    <div class="mb-3">
                                        <label for="titre" class="form-label">Titre de l'annonce *</label>
                                        <input type="text" class="form-control" id="titre" name="titre" 
                                               placeholder="Ex: Aide pour récolte de pommes dans verger familial"
                                               value="<?php echo htmlspecialchars($_POST['titre'] ?? ''); ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description détaillée *</label>
                                        <textarea class="form-control" id="description" name="description" rows="5" 
                                                  placeholder="Décrivez votre verger, le type d'aide recherché, l'ambiance, ce que vous proposez en échange..." required><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>
                                    </div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="taille_verger" class="form-label">Taille du verger</label>
                                            <select class="form-select" id="taille_verger" name="taille_verger">
                                                <option value="">Sélectionnez...</option>
                                                <option value="petit" <?php echo (($_POST['taille_verger'] ?? '') == 'petit') ? 'selected' : ''; ?>>Petit (1-10 arbres)</option>
                                                <option value="moyen" <?php echo (($_POST['taille_verger'] ?? '') == 'moyen') ? 'selected' : ''; ?>>Moyen (10-50 arbres)</option>
                                                <option value="grand" <?php echo (($_POST['taille_verger'] ?? '') == 'grand') ? 'selected' : ''; ?>>Grand (50+ arbres)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="urgence" class="form-label">Niveau d'urgence</label>
                                            <select class="form-select" id="urgence" name="urgence">
                                                <option value="normal" <?php echo (($_POST['urgence'] ?? '') == 'normal') ? 'selected' : ''; ?>>Normal</option>
                                                <option value="urgent" <?php echo (($_POST['urgence'] ?? '') == 'urgent') ? 'selected' : ''; ?>>Urgent (dans la semaine)</option>
                                                <option value="tres_urgent" <?php echo (($_POST['urgence'] ?? '') == 'tres_urgent') ? 'selected' : ''; ?>>Très urgent (dans les 2-3 jours)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fruits and Tasks -->
                                <div class="mb-5">
                                    <h4 class="fw-bold text-success mb-4">
                                        <i class="fas fa-apple-alt me-2"></i>Fruits et tâches
                                    </h4>
                                    
                                    <div class="mb-4">
                                        <label class="form-label">Fruits disponibles dans votre verger</label>
                                        <div class="row g-2">
                                            <?php 
                                            $fruits = ['Pommes', 'Poires', 'Prunes', 'Cerises', 'Noix', 'Châtaignes', 'Figues', 'Coings', 'Groseilles', 'Cassis'];
                                            foreach ($fruits as $fruit): 
                                            ?>
                                                <div class="col-md-4 col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="fruit_<?php echo strtolower($fruit); ?>" 
                                                               name="fruits[]" value="<?php echo $fruit; ?>"
                                                               <?php echo (isset($_POST['fruits']) && in_array($fruit, $_POST['fruits'])) ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="fruit_<?php echo strtolower($fruit); ?>">
                                                            <?php echo $fruit; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Tâches pour lesquelles vous cherchez de l'aide</label>
                                        <div class="row g-2">
                                            <?php 
                                            $taches = ['Taille', 'Récolte', 'Désherbage', 'Élagage', 'Ramassage', 'Arrosage', 'Compostage', 'Soins aux animaux'];
                                            foreach ($taches as $tache): 
                                            ?>
                                                <div class="col-md-4 col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="tache_<?php echo strtolower(str_replace(' ', '_', $tache)); ?>" 
                                                               name="taches[]" value="<?php echo $tache; ?>"
                                                               <?php echo (isset($_POST['taches']) && in_array($tache, $_POST['taches'])) ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="tache_<?php echo strtolower(str_replace(' ', '_', $tache)); ?>">
                                                            <?php echo $tache; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Exchange -->
                                <div class="mb-5">
                                    <h4 class="fw-bold text-success mb-4">
                                        <i class="fas fa-handshake me-2"></i>Ce que vous proposez en échange
                                    </h4>
                                    
                                    <div class="mb-3">
                                        <label for="echange" class="form-label">Décrivez ce que vous proposez</label>
                                        <textarea class="form-control" id="echange" name="echange" rows="3" 
                                                  placeholder="Ex: Partage de la récolte, repas fait maison, apprentissage des techniques de jardinage..."><?php echo htmlspecialchars($_POST['echange'] ?? ''); ?></textarea>
                                    </div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="partage_recolte" name="avantages[]" value="Partage de la récolte"
                                                       <?php echo (isset($_POST['avantages']) && in_array('Partage de la récolte', $_POST['avantages'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="partage_recolte">
                                                    Partage de la récolte
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="repas_maison" name="avantages[]" value="Repas fait maison"
                                                       <?php echo (isset($_POST['avantages']) && in_array('Repas fait maison', $_POST['avantages'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="repas_maison">
                                                    Repas fait maison
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="apprentissage" name="avantages[]" value="Apprentissage du jardinage"
                                                       <?php echo (isset($_POST['avantages']) && in_array('Apprentissage du jardinage', $_POST['avantages'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="apprentissage">
                                                    Apprentissage du jardinage
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="moment_convivial" name="avantages[]" value="Moment convivial"
                                                       <?php echo (isset($_POST['avantages']) && in_array('Moment convivial', $_POST['avantages'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="moment_convivial">
                                                    Moment convivial
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Availability -->
                                <div class="mb-5">
                                    <h4 class="fw-bold text-success mb-4">
                                        <i class="fas fa-calendar me-2"></i>Disponibilités
                                    </h4>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="disponibilite" class="form-label">Quand avez-vous besoin d'aide ?</label>
                                            <select class="form-select" id="disponibilite" name="disponibilite">
                                                <option value="">Sélectionnez...</option>
                                                <option value="weekend" <?php echo (($_POST['disponibilite'] ?? '') == 'weekend') ? 'selected' : ''; ?>>Weekends</option>
                                                <option value="semaine" <?php echo (($_POST['disponibilite'] ?? '') == 'semaine') ? 'selected' : ''; ?>>En semaine</option>
                                                <option value="flexible" <?php echo (($_POST['disponibilite'] ?? '') == 'flexible') ? 'selected' : ''; ?>>Flexible</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="duree" class="form-label">Durée estimée</label>
                                            <select class="form-select" id="duree" name="duree">
                                                <option value="">Sélectionnez...</option>
                                                <option value="2-4h" <?php echo (($_POST['duree'] ?? '') == '2-4h') ? 'selected' : ''; ?>>2-4 heures</option>
                                                <option value="demi-journee" <?php echo (($_POST['duree'] ?? '') == 'demi-journee') ? 'selected' : ''; ?>>Demi-journée</option>
                                                <option value="journee" <?php echo (($_POST['duree'] ?? '') == 'journee') ? 'selected' : ''; ?>>Journée complète</option>
                                                <option value="plusieurs-jours" <?php echo (($_POST['duree'] ?? '') == 'plusieurs-jours') ? 'selected' : ''; ?>>Plusieurs jours</option>
                                                <option value="regulier" <?php echo (($_POST['duree'] ?? '') == 'regulier') ? 'selected' : ''; ?>>Aide régulière</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <label for="details_disponibilite" class="form-label">Précisions sur vos disponibilités</label>
                                        <textarea class="form-control" id="details_disponibilite" name="details_disponibilite" rows="2" 
                                                  placeholder="Ex: Préférence pour les matins, disponible tous les samedis..."><?php echo htmlspecialchars($_POST['details_disponibilite'] ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <!-- Additional Information -->
                                <div class="mb-5">
                                    <h4 class="fw-bold text-success mb-4">
                                        <i class="fas fa-info-circle me-2"></i>Informations complémentaires
                                    </h4>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="debutants_acceptes" name="preferences[]" value="Débutants acceptés"
                                                       <?php echo (isset($_POST['preferences']) && in_array('Débutants acceptés', $_POST['preferences'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="debutants_acceptes">
                                                    Débutants acceptés
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="enfants_bienvenus" name="preferences[]" value="Enfants bienvenus"
                                                       <?php echo (isset($_POST['preferences']) && in_array('Enfants bienvenus', $_POST['preferences'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="enfants_bienvenus">
                                                    Enfants bienvenus
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="bio" name="preferences[]" value="Verger bio"
                                                       <?php echo (isset($_POST['preferences']) && in_array('Verger bio', $_POST['preferences'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="bio">
                                                    Verger bio
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="animaux" name="preferences[]" value="Présence d'animaux"
                                                       <?php echo (isset($_POST['preferences']) && in_array('Présence d\'animaux', $_POST['preferences'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="animaux">
                                                    Présence d'animaux
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <label for="infos_supplementaires" class="form-label">Informations supplémentaires</label>
                                        <textarea class="form-control" id="infos_supplementaires" name="infos_supplementaires" rows="3" 
                                                  placeholder="Toute autre information utile pour les personnes intéressées..."><?php echo htmlspecialchars($_POST['infos_supplementaires'] ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="conditions" name="conditions" required>
                                        <label class="form-check-label" for="conditions">
                                            J'accepte les <a href="#" class="text-success">conditions d'utilisation</a> et la <a href="#" class="text-success">politique de confidentialité</a> *
                                        </label>
                                    </div>
                                    
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                        <label class="form-check-label" for="newsletter">
                                            Je souhaite recevoir des conseils jardinage et les actualités de VergerPartage
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-outline-secondary btn-lg me-md-2" onclick="window.history.back()">
                                        <i class="fas fa-arrow-left me-2"></i>Retour
                                    </button>
                                    <button type="submit" class="btn btn-success btn-lg" id="submitBtn">
                                        <i class="fas fa-paper-plane me-2"></i>Publier mon annonce
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <div class="mb-3">
                        <i class="fas fa-shield-alt text-success" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Sécurisé</h5>
                    <p class="text-muted">Vos données sont protégées et votre adresse exacte n'est jamais divulguée.</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="mb-3">
                        <i class="fas fa-gift text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Gratuit</h5>
                    <p class="text-muted">La publication d'annonces est entièrement gratuite, toujours.</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="mb-3">
                        <i class="fas fa-users text-info" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Communauté</h5>
                    <p class="text-muted">Rejoignez une communauté bienveillante de passionnés de jardinage.</p>
                </div>
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
                        <strong class="h5">VergerPartage</strong>
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
                        <li><i class="fas fa-envelope me-2"></i>contact@vergerpartage.fr</li>
                        <li><i class="fas fa-phone me-2"></i>09 xx xx xx xx</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Pays de la Loire, France</li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="text-center text-muted">
                <p>&copy; 2024 VergerPartage. Une initiative pour rapprocher les générations autour du jardinage.</p>
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
        document.getElementById('annonceForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Publication en cours...';
            submitBtn.disabled = true;
            
            // Form will submit normally, this just shows loading state
        });

        // Auto-save form data to localStorage (optional)
        function saveFormData() {
            const formData = new FormData(document.getElementById('annonceForm'));
            const data = {};
            for (let [key, value] of formData.entries()) {
                if (data[key]) {
                    if (Array.isArray(data[key])) {
                        data[key].push(value);
                    } else {
                        data[key] = [data[key], value];
                    }
                } else {
                    data[key] = value;
                }
            }
            localStorage.setItem('verger_form_draft', JSON.stringify(data));
        }

        // Save form data on input changes
        document.querySelectorAll('input, textarea, select').forEach(element => {
            element.addEventListener('change', saveFormData);
        });

        // Form validation
        document.getElementById('annonceForm').addEventListener('submit', function(e) {
            const requiredFields = ['nom', 'age', 'email', 'telephone', 'ville', 'titre', 'description'];
            let hasErrors = false;

            requiredFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    hasErrors = true;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (hasErrors) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires.');
                document.getElementById('submitBtn').innerHTML = '<i class="fas fa-paper-plane me-2"></i>Publier mon annonce';
                document.getElementById('submitBtn').disabled = false;
            }
        });
    </script>
</body>
</html>
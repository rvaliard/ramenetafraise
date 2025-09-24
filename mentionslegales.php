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
                    <li class="breadcrumb-item"><a href="mentionslegales.php" class="text-decoration-none">Mentions légales</a></li>
                </ol>
            </nav>
        </div>
    </section>


    <!-- Text Section -->
    <<div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Mentions légales</h2>
            <p class="lead text-muted">
                Bienvenue sur la première version (v1) de RamèneTaFraise.com !
                RamèneTaFraise est une entreprièse fondée le 23 septembre 2025.
                Toutes les règles d’utilisation du site sont écrasées par le présent document.
            </p>
        <h2 class="display-5 fw-bold">1. Éditeur du site</h2>
            <p class="lead text-muted">
                Entreprise RamèneTaFraise
                N° SIRET :
                Adresse du siège social : Av. Paul Langevin, 59655 Villeneuve-d'Ascq
                Email : RamèneTaFraise@gmail.com
                Responsable de projet : Alexis
                Directeurs de la publication : Robin
            </p>
        <h2 class="display-5 fw-bold">2. Hébergeur</h2>
            <p class="lead text-muted">
                Le site est hébergé par :
                Adresse :
                Téléphone : 
                Site :
            </p>
        <h2 class="display-5 fw-bold">3. Propriété intellectuelle</h2>
            <h3 class="display-5 fw-bold">1- Photos/Vidéo/illustrations/logo :</h2>
                <p class="lead text-muted">
                    Les médias utilisés par notre site sont le plus souvent protégés. Leur usage nous est autorisée exclusivement, par une autorisation écrite de leur propriétaire.
                    Certains médias utilisés sont également sous licence creative commons.
                    Nous vous rappelons que vous disposez d’un droit d’accès, de modification, de rectification et de suppression des données qui vous concernent (art. 34 de la loi « Informatique et Libertés » du 6 janvier 1978). Il est possible à tout moment de ne plus céder ses droits à l’image, sur simple demande écrite. » 
                    Les images présentent dans les annonces sont soumises à la responsabilité morale et civile de leur auteur.
                    La sélection, l’agencement et la présentation des contenus visuels présents sur ce site constituent une œuvre originale protégée par le droit d’auteur. Toute reproduction intégrale ou partielle de cette composition, sans autorisation préalable, est interdite.
                </p>

            <h3 class="display-5 fw-bold">2- Contenus textuels :</h2>
                <p class="lead text-muted">
                    Tout contenu textuel écrit sur RamèneTaFraise est propriété de RamèneTaFraise sauf indication contraire.
                    Les annonces des membres ne répondent pas à cette règle et sont donc sous la responsabilité de leur(s) rédacteur(s).
                </p> 
        <h2 class="display-5 fw-bold">4. Responsabilités civiles</h2>
            <p class="lead text-muted">
                RamèneTaFraise est un site français hébergé dans l’Union Européenne, conformément à la majorité numérique française, toute personne âgée de moins de 15 ans sera sous la responsabilité de ses parents ou tuteurs légaux.
                Les annonces seront postées en suivant ces règles de publication :

                RamèneTaFraise est la propriété d’une équipe d’origine, de sexe, d’ethnie, d’âge, d’orientation sexuelle, de lieu de résidence, de croyance et d’orientation socio-politique différente. Nous ne tolérerons aucune atteinte à la liberté et aux droits humains fondamentaux sur le site ainsi que sur les groupes affiliés
                Le présent site est soumis au droit français et, le cas échéant, aux règlements de l’Union européenne applicables en France. Tout litige relatif à l’utilisation du site est soumis à la compétence exclusive des juridictions françaises.
            </p>
        <h2 class="display-5 fw-bold">5. Données personnelles</h2>
            <p class="lead text-muted">
                Toutes les données personnelles recueillies sur le site sont traitées avec la plus stricte confidentialité. 
                Elles sont susceptibles d'être revendues à des tiers selon ces conditions :
                Conformément à la loi n° 78-17 du 6 janvier 1978 et au RGPD, l’utilisateur peut à tout moment accéder aux informations personnelles le concernant détenues par RamèneTaFraise, demander leur modification ou leur suppression. 
                Vous disposez donc d’un droit d’accès, de modification et de suppression de vos données. Ainsi, selon les articles 36, 39 et 40 de la loi Informatique et Libertés, l’utilisateur peut demander que soient rectifiées, complétées, clarifiées, mises à jour ou effacées les informations le concernant qui sont inexactes, incomplètes, équivoques, périmées ou dont la collecte ou l’utilisation, la communication ou la conservation sont interdites.
            </p> 
        <h2 class="display-5 fw-bold">6. Erreurs dans les publications</h2>
            <p class="lead text-muted">
                L’éditeur du site met tout en œuvre pour assurer l’exactitude et la mise à jour de l’ensemble des informations fournies sur son site.
                Il ne peut cependant pas garantir que les informations contenues sur le site soient complètes, précises, exactes, exhaustives et dépourvues de toute erreur. En cas de signalement d’erreur, nous nous engageons à procéder à la correction de cette dernière dans les plus brefs délais.

                Notre site décline toute responsabilité en cas de dysfonctionnement, erreur ou indisponibilité résultant de l’utilisation d’outils numériques ou de services tiers.
            </p>
        <h2 class="display-5 fw-bold">7. Modifications</h2>
            <p class="lead text-muted">
                En accédant et en naviguant sur ce site, l’utilisateur est informé de ses droits et obligations et accepte pleinement de se conformer aux présentes conditions d’utilisations du site. 
                L’éditeur du site se réserve la possibilité de modifier ces conditions. 
                Il appartient à l’utilisateur de vérifier périodiquement le contenu des documents concernés. 
                L’éditeur se réserve la possibilité de supprimer ou de modifier RamèneTaFraise.
            </p> 
        <h2 class="display-5 fw-bold">8. Annexe</h2>
            <p class="lead text-muted">
                Pour toute demande ou interrogation, nous vous prierons de contacter un membre de la modération du site ou des divers groupes affiliés afin de traiter votre requête dans la plus stricte intimité et dans les délais les plus courts. 
                Veuillez contacter un administrateur sur discord ou par le mail suivant : RameneTaFraise@gmail.com
            </p> 
        <p class="lead text-muted">
            Dernière mise à jour de la page le 23/09/2025 à 22:55 (UTC+2)
        </p>
    </div>

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
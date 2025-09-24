<?php
// Simple session management for demo purposes
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions légales - RameneTaFraise</title>
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
    <section class="bg-light py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mentions légales</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Legal Notice Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <!-- Main Title -->
                    <div class="text-center mb-5">
                        <h1 class="display-4 fw-bold text-success mb-4">Mentions légales</h1>
                        <div class="alert alert-info border-0 shadow-sm">
                            <p class="lead mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                Bienvenue sur la première version (v1) de RamèneTaFraise.com !<br>
                                RamèneTaFraise est une entreprise fondée le 23 septembre 2025.<br>
                                Toutes les règles d'utilisation du site sont écrasées par le présent document.
                            </p>
                        </div>
                    </div>

                    <!-- Legal Sections -->
                    <div class="legal-content">
                        <!-- Section 1 -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold text-secondary mb-3">
                                <span class="badge bg-success me-2">1</span>
                                Éditeur du site
                            </h2>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <strong>Entreprise :</strong> RamèneTaFraise<br>
                                            <strong>N° SIRET :</strong> <em>À compléter</em><br>
                                            <strong>Email :</strong> <a href="mailto:RamèneTaFraise@gmail.com">RamèneTaFraise@gmail.com</a>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Adresse du siège social :</strong><br>
                                            Av. Paul Langevin<br>
                                            59655 Villeneuve-d'Ascq<br><br>
                                            <strong>Responsable de projet :</strong> Alexis<br>
                                            <strong>Directeur de la publication :</strong> Robin
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2 -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold text-secondary mb-3">
                                <span class="badge bg-success me-2">2</span>
                                Hébergeur
                            </h2>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="alert alert-warning border-0">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <strong>Informations à compléter :</strong><br>
                                        Le site est hébergé par : <em>[Nom de l'hébergeur]</em><br>
                                        Adresse : <em>[Adresse complète]</em><br>
                                        Téléphone : <em>[Numéro de téléphone]</em><br>
                                        Site web : <em>[URL du site]</em>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 3 -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold text-secondary mb-3">
                                <span class="badge bg-success me-2">3</span>
                                Propriété intellectuelle
                            </h2>
                            
                            <!-- Subsection 3.1 -->
                            <div class="mb-4">
                                <h3 class="h5 fw-bold text-info mb-3">
                                    <i class="fas fa-image me-2"></i>
                                    Photos/Vidéos/Illustrations/Logo
                                </h3>
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body p-4">
                                        <p>Les médias utilisés par notre site sont le plus souvent protégés. Leur usage nous est autorisé exclusivement, par une autorisation écrite de leur propriétaire. Certains médias utilisés sont également sous licence Creative Commons.</p>
                                        
                                        <p>Nous vous rappelons que vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent (art. 34 de la loi « Informatique et Libertés » du 6 janvier 1978). Il est possible à tout moment de ne plus céder ses droits à l'image, sur simple demande écrite.</p>
                                        
                                        <div class="alert alert-warning border-0 mt-3">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            Les images présentes dans les annonces sont soumises à la responsabilité morale et civile de leur auteur.
                                        </div>
                                        
                                        <p class="mb-0">La sélection, l'agencement et la présentation des contenus visuels présents sur ce site constituent une œuvre originale protégée par le droit d'auteur. Toute reproduction intégrale ou partielle de cette composition, sans autorisation préalable, est interdite.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Subsection 3.2 -->
                            <div class="mb-4">
                                <h3 class="h5 fw-bold text-info mb-3">
                                    <i class="fas fa-file-text me-2"></i>
                                    Contenus textuels
                                </h3>
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body p-4">
                                        <p class="mb-0">Tout contenu textuel écrit sur RamèneTaFraise est propriété de RamèneTaFraise sauf indication contraire. Les annonces des membres ne répondent pas à cette règle et sont donc sous la responsabilité de leur(s) rédacteur(s).</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 4 -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold text-secondary mb-3">
                                <span class="badge bg-success me-2">4</span>
                                Responsabilités civiles
                            </h2>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <p>RamèneTaFraise est un site français hébergé dans l'Union Européenne. Conformément à la majorité numérique française, toute personne âgée de moins de 15 ans sera sous la responsabilité de ses parents ou tuteurs légaux.</p>
                                    
                                    <div class="alert alert-success border-0">
                                        <i class="fas fa-heart me-2"></i>
                                        <strong>Notre engagement :</strong> RamèneTaFraise est la propriété d'une équipe d'origine, de sexe, d'ethnie, d'âge, d'orientation sexuelle, de lieu de résidence, de croyance et d'orientation socio-politique différente. Nous ne tolérerons aucune atteinte à la liberté et aux droits humains fondamentaux sur le site ainsi que sur les groupes affiliés.
                                    </div>
                                    
                                    <p class="mb-0">Le présent site est soumis au droit français et, le cas échéant, aux règlements de l'Union européenne applicables en France. Tout litige relatif à l'utilisation du site est soumis à la compétence exclusive des juridictions françaises.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Section 5 -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold text-secondary mb-3">
                                <span class="badge bg-success me-2">5</span>
                                Données personnelles
                            </h2>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <p>Toutes les données personnelles recueillies sur le site sont traitées avec la plus stricte confidentialité. Elles sont susceptibles d'être revendues à des tiers selon ces conditions :</p>
                                    
                                    <div class="alert alert-info border-0">
                                        <i class="fas fa-shield-alt me-2"></i>
                                        <strong>Vos droits RGPD :</strong> Conformément à la loi n° 78-17 du 6 janvier 1978 et au RGPD, l'utilisateur peut à tout moment accéder aux informations personnelles le concernant détenues par RamèneTaFraise, demander leur modification ou leur suppression.
                                    </div>
                                    
                                    <p class="mb-0">Vous disposez donc d'un droit d'accès, de modification et de suppression de vos données. Ainsi, selon les articles 36, 39 et 40 de la loi Informatique et Libertés, l'utilisateur peut demander que soient rectifiées, complétées, clarifiées, mises à jour ou effacées les informations le concernant qui sont inexactes, incomplètes, équivoques, périmées ou dont la collecte ou l'utilisation, la communication ou la conservation sont interdites.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Section 6 -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold text-secondary mb-3">
                                <span class="badge bg-success me-2">6</span>
                                Erreurs dans les publications
                            </h2>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <p>L'éditeur du site met tout en œuvre pour assurer l'exactitude et la mise à jour de l'ensemble des informations fournies sur son site. Il ne peut cependant pas garantir que les informations contenues sur le site soient complètes, précises, exactes, exhaustives et dépourvues de toute erreur. En cas de signalement d'erreur, nous nous engageons à procéder à la correction de cette dernière dans les plus brefs délais.</p>
                                    
                                    <p class="mb-0">Notre site décline toute responsabilité en cas de dysfonctionnement, erreur ou indisponibilité résultant de l'utilisation d'outils numériques ou de services tiers.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Section 7 -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold text-secondary mb-3">
                                <span class="badge bg-success me-2">7</span>
                                Modifications
                            </h2>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <p>En accédant et en naviguant sur ce site, l'utilisateur est informé de ses droits et obligations et accepte pleinement de se conformer aux présentes conditions d'utilisation du site.</p>
                                    
                                    <p>L'éditeur du site se réserve la possibilité de modifier ces conditions. Il appartient à l'utilisateur de vérifier périodiquement le contenu des documents concernés.</p>
                                    
                                    <p class="mb-0">L'éditeur se réserve la possibilité de supprimer ou de modifier RamèneTaFraise.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Section 8 -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold text-secondary mb-3">
                                <span class="badge bg-success me-2">8</span>
                                Annexe
                            </h2>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <p>Pour toute demande ou interrogation, nous vous prierons de contacter un membre de la modération du site ou des divers groupes affiliés afin de traiter votre requête dans la plus stricte intimité et dans les délais les plus courts.</p>
                                    
                                    <div class="row g-3 mt-3">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center p-3 bg-light rounded">
                                                <i class="fas fa-envelope text-success me-3"></i>
                                                <div>
                                                    <strong>Email</strong><br>
                                                    <a href="mailto:RamèneTaFraise@gmail.com">RamèneTaFraise@gmail.com</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center p-3 bg-light rounded">
                                                <i class="fab fa-discord text-primary me-3"></i>
                                                <div>
                                                    <strong>Discord</strong><br>
                                                    Contacter un administrateur
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Last Update -->
                        <div class="text-center mt-5">
                            <div class="alert alert-secondary border-0 d-inline-block">
                                <i class="fas fa-clock me-2"></i>
                                <strong>Dernière mise à jour de la page :</strong> 23/09/2025 à 22:55 (UTC+2)
                            </div>
                        </div>
                    </div>
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
    </script>
</body>
</html>
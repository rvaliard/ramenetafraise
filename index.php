<?php
header('Content-Type: text/html; charset=UTF-8');
// Simple session management for demo purposes
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RameneTaFraise - Des vergers qui rapprochent les générations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
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
                        <a class="btn btn-success text-white px-4" href="publier.php">
                            <i class="fas fa-plus me-2"></i>Publier une annonce
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Des <span class="text-success">vergers</span> qui rapprochent les générations
                    </h1>
                    <p class="lead text-muted mb-4">
                        Connectons les propriétaires de vergers qui ont besoin d'aide avec des jeunes passionnés par une alimentation saine et solidaire.
                    </p>
                    
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <a href="publier.php" class="btn btn-success btn-lg">
                            <i class="fas fa-leaf me-2"></i>J'ai un verger à partager
                        </a>
                        <a href="annonces.php" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-heart me-2"></i>Je veux aider
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="h3 fw-bold text-success">150+</div>
                            <small class="text-muted">Vergers partagés</small>
                        </div>
                        <div class="col-4">
                            <div class="h3 fw-bold text-warning">300+</div>
                            <small class="text-muted">Connexions réalisées</small>
                        </div>
                        <div class="col-4">
                            <div class="h3 fw-bold text-info">5<i class="fas fa-star ms-1"></i></div>
                            <small class="text-muted">Satisfaction</small>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1560493676-04071c5f467b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Verger avec fruits" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works Section -->
    <section id="comment-ca-marche" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Comment ça marche ?</h2>
                <p class="lead text-muted">
                    Un système simple et humain pour créer des liens intergénérationnels autour du jardinage et du partage.
                </p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="step-icon bg-success text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-tree"></i>
                                <span class="step-number">1</span>
                            </div>
                            <h5 class="fw-bold">Vous avez un verger ?</h5>
                            <p class="text-muted">
                                Publiez une annonce décrivant votre verger, vos besoins d'aide et ce que vous proposez en échange.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="step-icon bg-warning text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-users"></i>
                                <span class="step-number">2</span>
                            </div>
                            <h5 class="fw-bold">Connexion</h5>
                            <p class="text-muted">
                                Des jeunes motivés dans votre région consultent votre annonce et vous contactent directement.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="step-icon bg-info text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-handshake"></i>
                                <span class="step-number">3</span>
                            </div>
                            <h5 class="fw-bold">Entraide</h5>
                            <p class="text-muted">
                                Organisez ensemble l'entretien du verger : taille, récolte, désherbage... selon vos besoins.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="step-icon bg-danger text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-apple-alt"></i>
                                <span class="step-number">4</span>
                            </div>
                            <h5 class="fw-bold">Partage des fruits</h5>
                            <p class="text-muted">
                                En échange de l'aide, partagez une partie de votre récolte. Tout le monde y gagne !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Announcements -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Annonces disponibles</h2>
                <p class="lead text-muted">
                    Découvrez les vergers près de chez vous qui ont besoin d'aide. Une belle façon de créer du lien et de manger sainement !
                </p>
            </div>
            
            <div class="row g-4">
                <!-- Sample announcements -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Verger de pommiers et poiriers à entretenir</h5>
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>Angers, Maine-et-Loire<br>
                                    <i class="fas fa-user me-1"></i>Marie, 78 ans<br>
                                    <i class="fas fa-clock me-1"></i>Il y a 2 jours
                                </small>
                            </div>
                            <p class="card-text text-muted">
                                J'ai un beau verger de 15 arbres fruitiers qui nécessite de l'aide pour la taille et la récolte. En échange, vous repartez avec des fruits frais !
                            </p>
                            
                            <div class="mb-3">
                                <strong class="text-warning">Fruits disponibles</strong><br>
                                <span class="badge bg-light text-dark me-1">Pommes</span>
                                <span class="badge bg-light text-dark me-1">Poires</span>
                                <span class="badge bg-light text-dark">Prunes</span>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-info">Tâches à réaliser</strong><br>
                                <span class="badge bg-secondary me-1">Taille</span>
                                <span class="badge bg-secondary me-1">Récolte</span>
                                <span class="badge bg-secondary">Désherbage</span>
                            </div>
                            
                            <a href="#" class="btn btn-success w-100">
                                <i class="fas fa-phone me-2"></i>Contacter Marie
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title">Aide urgente pour récolte de cerises</h5>
                                <span class="badge bg-danger">Urgent</span>
                            </div>
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>Tours, Indre-et-Loire<br>
                                    <i class="fas fa-user me-1"></i>Jean, 82 ans<br>
                                    <i class="fas fa-clock me-1"></i>Il y a 1 jour
                                </small>
                            </div>
                            <p class="card-text text-muted">
                                Mes cerisiers croulent sous les fruits ! J'ai besoin d'aide rapide pour la récolte avant que les oiseaux ne s'en chargent.
                            </p>
                            
                            <div class="mb-3">
                                <strong class="text-warning">Fruits disponibles</strong><br>
                                <span class="badge bg-light text-dark me-1">Cerises</span>
                                <span class="badge bg-light text-dark">Groseilles</span>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-info">Tâches à réaliser</strong><br>
                                <span class="badge bg-danger">Récolte urgente</span>
                            </div>
                            
                            <a href="#" class="btn btn-success w-100">
                                <i class="fas fa-phone me-2"></i>Contacter Jean
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Entretien régulier d'un petit verger familial</h5>
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>Le Mans, Sarthe<br>
                                    <i class="fas fa-user me-1"></i>Colette, 71 ans<br>
                                    <i class="fas fa-clock me-1"></i>Il y a 3 jours
                                </small>
                            </div>
                            <p class="card-text text-muted">
                                Recherche une personne fiable pour m'aider régulièrement avec mon verger. Ambiance familiale garantie avec goûter maison !
                            </p>
                            
                            <div class="mb-3">
                                <strong class="text-warning">Fruits disponibles</strong><br>
                                <span class="badge bg-light text-dark me-1">Pommes</span>
                                <span class="badge bg-light text-dark me-1">Noix</span>
                                <span class="badge bg-light text-dark">Coings</span>
                            </div>
                            
                            <div class="mb-3">
                                <strong class="text-info">Tâches à réaliser</strong><br>
                                <span class="badge bg-secondary me-1">Entretien régulier</span>
                                <span class="badge bg-secondary me-1">Taille</span>
                                <span class="badge bg-secondary">Ramassage</span>
                            </div>
                            
                            <a href="#" class="btn btn-success w-100">
                                <i class="fas fa-phone me-2"></i>Contacter Colette
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="annonces.php" class="btn btn-outline-success btn-lg">
                    Voir toutes les annonces
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
                        <li><a href="#comment-ca-marche" class="text-muted text-decoration-none">Comment ça marche</a></li>
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
    </script>
</body>
</html>
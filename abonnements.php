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
    <title>Abonnements - Ramène ta Fraise</title>
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
                    <h1 class="display-5 fw-bold mb-3">Abonnements disponibles</h1>
                    <p class="lead text-muted">
                        Découvrez les vergers près de chez vous qui ont besoin d'aide. Une belle façon de créer du lien et de manger sainement !
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Abonnement -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="fas fa-seedling fa-3x text-success"></i>
                            </div>
                            <h3 class="card-title fw-bold mb-3">Abonnement Premium</h3>
                            <p class="text-muted mb-4">Accédez à toutes les fonctionnalités du site sans limite, ainsi qu’à des ressources exclusives pour les passionnés de jardinage.</p>
                            <ul class="list-unstyled text-start mb-4">
                                <li><i class="fas fa-check text-success me-2"></i> Accès illimité à toutes les fonctionnalités</li>
                                <li><i class="fas fa-book text-success me-2"></i> Livres numériques exclusifs</li>
                                <li><i class="fas fa-video text-success me-2"></i> Vidéos de formation sur le jardinage</li>
                            </ul>
                            <h2 class="fw-bold mb-4">4,99 €/mois</h2>
                            <a href="#" class="btn btn-success btn-lg w-100">S'abonner maintenant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

     <!-- Footer -->
    <footer class="bg-light text-dark py-5">
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
</body>
</html>
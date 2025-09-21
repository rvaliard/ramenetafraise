<?php
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
        'date' => '5 
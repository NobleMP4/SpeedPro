<?php 


use monApp\core\tpl;
use monApp\core\session;

// Obtenir l'année courante
$dateAnnee = date('Y');

// Récupérer l'ID de l'utilisateur connecté
$userId = 'Non connecté';
if (isset($_SESSION['user'])) {
    $userObject = $_SESSION['user'];
    // Accéder à la propriété id_user via la réflexion si nécessaire
    $reflection = new ReflectionClass($userObject);
    $property = $reflection->getProperty('id_user');
    $property->setAccessible(true);
    $userId = $property->getValue($userObject);
}

// Assigner les variables au template
tpl::assign('dateAnnee', $dateAnnee);
tpl::assign('userId', $userId);

// Afficher la vue
tpl::view("footer");
?>
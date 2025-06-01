<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\core\session;
use monApp\models\carburant;

// Récupération de l'utilisateur connecté
$userSession = session::get('user');
if (!$userSession) {
    header('Location: ?p=login');
    exit;
}

// Définition des permissions selon le rôle
$canAdd = true; // Tout le monde peut ajouter
$canDelete = in_array($userSession['role'], [1, 2]); // Admin et Gérant peuvent supprimer

// Gestion des actions POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    switch ($action) {
        case 'addCarburant':
            // Vérification des permissions pour l'ajout
            if (!$canAdd) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }
            
            if (isset($_POST['nomCarburant'])) {
                $carburant = new carburant();
                $carburant->setNom_carburant($_POST['nomCarburant']);
                if ($carburant->save()) {
                    $_SESSION['success'] = 'add';
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit;
                }
            }
            break;

        case 'deleteCarburant':
            // Vérification des permissions pour la suppression
            if (!$canDelete) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }
            
            if (isset($_POST['id_carburant'])) {
                $carburant = carburant::find($_POST['id_carburant']);
                if ($carburant && $carburant->delete()) {
                    $_SESSION['success'] = 'delete';
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit;
                }
            }
            break;
    }
}

// Récupération des carburants pour l'affichage
$carburants = carburant::tous();

// Passage des données à la vue
tpl::assign('carburants', $carburants);
tpl::assign('page_title', 'Gestion des carburants');
tpl::assign('canAdd', $canAdd);
tpl::assign('canDelete', $canDelete);

// Passage du message de succès à la vue s'il existe
if (isset($_SESSION['success'])) {
    tpl::assign('success', $_SESSION['success']);
    unset($_SESSION['success']); // On supprime le message après l'avoir passé à la vue
}

// Affichage de la vue
tpl::view("carburants");

?>
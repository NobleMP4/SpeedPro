<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\core\session;
use monApp\models\options;

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
        case 'addOption':
            // Vérification des permissions pour l'ajout
            if (!$canAdd) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }
            
            if (isset($_POST['nomOption'])) {
                $option = new options();
                $option->setNom_option($_POST['nomOption']);
                if ($option->save()) {
                    $_SESSION['success'] = 'add';
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit;
                }
            }
            break;

        case 'deleteOption':
            // Vérification des permissions pour la suppression
            if (!$canDelete) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }
            
            if (isset($_POST['id_option'])) {
                $option = options::find($_POST['id_option']);
                if ($option && $option->delete()) {
                    $_SESSION['success'] = 'delete';
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit;
                }
            }
            break;
    }
}

// Récupération des options pour l'affichage
$options = options::tous();

// Passage des données à la vue
tpl::assign('options', $options);
tpl::assign('page_title', 'Gestion des options');
tpl::assign('canAdd', $canAdd);
tpl::assign('canDelete', $canDelete);

// Passage du message de succès à la vue s'il existe
if (isset($_SESSION['success'])) {
    tpl::assign('success', $_SESSION['success']);
    unset($_SESSION['success']); // On supprime le message après l'avoir passé à la vue
}

// Affichage de la vue
tpl::view("options");

?>
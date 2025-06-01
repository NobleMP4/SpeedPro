<?php

use monApp\core\tpl;
use monApp\core\session;
use monApp\models\clients;

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
        case 'addClient':
            // Vérification des permissions pour l'ajout
            if (!$canAdd) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }

            $errors = [];
            
            // Validation des champs requis
            $required_fields = [
                'nom_client_1' => 'Le nom du contact principal',
                'prenom_client_1' => 'Le prénom du contact principal',
                'email_client_1' => 'L\'email du contact principal',
                'telephone_client_1' => 'Le téléphone du contact principal',
                'rue' => 'L\'adresse',
                'code_postal' => 'Le code postal',
                'ville' => 'La ville',
                'pays' => 'Le pays'
            ];

            foreach ($required_fields as $field => $label) {
                if (empty($_POST[$field])) {
                    $errors[] = $label . " est requis.";
                }
            }

            // Validation du format email
            if (!empty($_POST['email_client_1']) && !filter_var($_POST['email_client_1'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email du contact principal n'est pas valide.";
            }
            if (!empty($_POST['email_client_2']) && !filter_var($_POST['email_client_2'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email du second contact n'est pas valide.";
            }

            // Validation du format téléphone (10 chiffres)
            $phone_pattern = '/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/';
            if (!empty($_POST['telephone_client_1']) && !preg_match($phone_pattern, $_POST['telephone_client_1'])) {
                $errors[] = "Le numéro de téléphone du contact principal n'est pas valide.";
            }
            if (!empty($_POST['telephone_client_2']) && !preg_match($phone_pattern, $_POST['telephone_client_2'])) {
                $errors[] = "Le numéro de téléphone du second contact n'est pas valide.";
            }

            // Si pas d'erreurs, procéder à l'ajout
            if (empty($errors)) {
                $client = new clients();
                
                // Contact principal
                $client->setNom_client_1($_POST['nom_client_1'])
                      ->setPrenom_client_1($_POST['prenom_client_1'])
                      ->setEmail_client_1($_POST['email_client_1'])
                      ->setTelephone_client_1($_POST['telephone_client_1']);
                
                // Contact secondaire (optionnel)
                if (!empty($_POST['nom_client_2']) && !empty($_POST['prenom_client_2'])) {
                    $client->setNom_client_2($_POST['nom_client_2'])
                          ->setPrenom_client_2($_POST['prenom_client_2'])
                          ->setEmail_client_2($_POST['email_client_2'])
                          ->setTelephone_client_2($_POST['telephone_client_2']);
                }
                
                // Adresse
                $client->setRue($_POST['rue'])
                      ->setCode_postal($_POST['code_postal'])
                      ->setVille($_POST['ville'])
                      ->setPays($_POST['pays']);
                
                if ($client->save()) {
                    $_SESSION['success'] = 'add';
                    header('Location: ?p=client&id=' . $client->getId_client());
                    exit;
                } else {
                    $errors[] = "Une erreur est survenue lors de l'enregistrement.";
                }
            }

            if (!empty($errors)) {
                tpl::assign('errors', $errors);
            }
            break;

        case 'deleteClient':
            // Vérification des permissions pour la suppression
            if (!$canDelete) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }

            if (isset($_POST['id_client'])) {
                $client = clients::find($_POST['id_client']);
                if ($client && $client->delete()) {
                    $_SESSION['success'] = 'delete';
                    header('Location: ?p=clients');
                } else {
                    $_SESSION['error'] = 'delete';
                    header('Location: ?p=clients');
                }
                exit;
            }
            break;
    }
}

// Récupération des clients pour l'affichage
$clients = clients::tous();

// Debug des données récupérées
error_log("Nombre de clients récupérés : " . count($clients));
foreach ($clients as $client) {
    error_log("Client ID: " . $client->getId_client());
    error_log("Nom: " . $client->getNom_client_1());
    error_log("Prénom: " . $client->getPrenom_client_1());
    error_log("Email: " . $client->getEmail_client_1());
    error_log("Téléphone: " . $client->getTelephone_client_1());
}

// Passage des données à la vue
tpl::assign('clients', $clients);
tpl::assign('page_title', 'Gestion des clients');
tpl::assign('canAdd', $canAdd);
tpl::assign('canDelete', $canDelete);

// Passage du message de succès à la vue s'il existe
if (isset($_SESSION['success'])) {
    tpl::assign('success', $_SESSION['success']);
    unset($_SESSION['success']);
}

// Affichage de la vue
tpl::view("clients");

?>
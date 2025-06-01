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
$canEdit = true; // Tout le monde peut modifier

// Récupération de l'ID du client depuis l'URL
$id_client = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_client > 0) {
    // Récupération du client
    $client = clients::find($id_client);
    
    if ($client) {
        // Traitement de la modification du client
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
            // Vérification des permissions pour la modification
            if (!$canEdit) {
                header('Location: ?p=client&id=' . $id_client);
                exit;
            }

            // Mise à jour des données du client
            $client->setNom_client_1($_POST['nom_client_1'])
                  ->setPrenom_client_1($_POST['prenom_client_1'])
                  ->setEmail_client_1($_POST['email_client_1'])
                  ->setTelephone_client_1($_POST['telephone_client_1'])
                  ->setRue($_POST['rue'])
                  ->setCode_postal($_POST['code_postal'])
                  ->setVille($_POST['ville'])
                  ->setPays($_POST['pays']);

            // Gestion du second contact
            if (!empty($_POST['nom_client_2']) && !empty($_POST['prenom_client_2'])) {
                $client->setNom_client_2($_POST['nom_client_2'])
                      ->setPrenom_client_2($_POST['prenom_client_2'])
                      ->setEmail_client_2($_POST['email_client_2'])
                      ->setTelephone_client_2($_POST['telephone_client_2']);
            } else {
                $client->setNom_client_2(null)
                      ->setPrenom_client_2(null)
                      ->setEmail_client_2(null)
                      ->setTelephone_client_2(null);
            }

            // Sauvegarde des modifications
            if ($client->save()) {
                $_SESSION['success'] = 'Le client a été modifié avec succès.';
            } else {
                $_SESSION['error'] = 'Une erreur est survenue lors de la modification du client.';
            }

            // Redirection pour éviter la soumission multiple du formulaire
            header('Location: ?p=client&id=' . $id_client);
            exit;
        }

        // Passage des données à la vue
        tpl::assign('client', $client);
        tpl::assign('page_title', 'Détails du client');
        tpl::assign('canEdit', $canEdit);
        
        // Affichage de la vue
        tpl::view("client");
    } else {
        // Redirection si le client n'existe pas
        header('Location: ?p=clients');
        exit;
    }
} else {
    // Redirection si pas d'ID
    header('Location: ?p=clients');
    exit;
}

?>
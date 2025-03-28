<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\models\clients;

// Récupérer tous les clients
$clients = clients::tous();

// Passer les données à la vue
tpl::assign('clients', $clients);

// Gérer l'action de création
if(isset($_GET['action']) && $_GET['action'] === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    // Log des données reçues
    error_log('Données POST reçues : ' . print_r($_POST, true));
    
    $client = new clients();
    $client->setNom_client_1($_POST['nom_client_1']);
    $client->setPrenom_client_1($_POST['prenom_client_1']);
    $client->setNom_client_2($_POST['nom_client_2'] ?: null);
    $client->setPrenom_client_2($_POST['prenom_client_2'] ?: null);
    $client->setTelephone_client_1($_POST['telephone_client_1']);
    $client->setTelephone_client_2($_POST['telephone_client_2'] ?: null);
    $client->setEmail_client_1($_POST['email_client_1']);
    $client->setEmail_client_2($_POST['email_client_2'] ?: null);
    $client->setRue($_POST['adresse']);
    $client->setCode_postal($_POST['code_postal']);
    $client->setVille($_POST['ville']);
    $client->setPays($_POST['pays']);
    
    // Log de l'objet client avant sauvegarde
    error_log('Objet client avant save : ' . print_r($client, true));
    
    $result = $client->save();
    
    // Log du résultat de la sauvegarde
    error_log('Résultat de la sauvegarde : ' . print_r($result, true));
    
    if($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la création du client']);
    }
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    // S'assurer que la réponse sera en JSON
    header('Content-Type: application/json');

    try {
        // Log des données reçues
        error_log('Données POST reçues : ' . print_r($_POST, true));

        // Vérifier que tous les champs requis sont présents
        $required_fields = ['nom_client_1', 'prenom_client_1', 'email_client_1', 
                          'telephone_client_1', 'rue', 'code_postal', 'ville', 'pays'];
        
        $missing_fields = array_filter($required_fields, function($field) {
            return !isset($_POST[$field]) || empty($_POST[$field]);
        });

        if (!empty($missing_fields)) {
            error_log('Champs manquants : ' . print_r($missing_fields, true));
            echo json_encode([
                'success' => false,
                'message' => 'Veuillez remplir tous les champs obligatoires : ' . implode(', ', $missing_fields)
            ]);
            exit;
        }

        // Créer un nouveau client
        $client = new clients();
        
        // Définir les propriétés obligatoires
        $client->setNom_client_1(htmlspecialchars($_POST['nom_client_1']));
        $client->setPrenom_client_1(htmlspecialchars($_POST['prenom_client_1']));
        $client->setEmail_client_1(htmlspecialchars($_POST['email_client_1']));
        $client->setTelephone_client_1(htmlspecialchars($_POST['telephone_client_1']));
        $client->setRue(htmlspecialchars($_POST['rue']));
        $client->setCode_postal(htmlspecialchars($_POST['code_postal']));
        $client->setVille(htmlspecialchars($_POST['ville']));
        $client->setPays(htmlspecialchars($_POST['pays']));

        // Définir les propriétés optionnelles
        if (!empty($_POST['nom_client_2'])) {
            $client->setNom_client_2(htmlspecialchars($_POST['nom_client_2']));
        }
        if (!empty($_POST['prenom_client_2'])) {
            $client->setPrenom_client_2(htmlspecialchars($_POST['prenom_client_2']));
        }
        if (!empty($_POST['email_client_2'])) {
            $client->setEmail_client_2(htmlspecialchars($_POST['email_client_2']));
        }
        if (!empty($_POST['telephone_client_2'])) {
            $client->setTelephone_client_2(htmlspecialchars($_POST['telephone_client_2']));
        }

        // Log de l'objet client avant sauvegarde
        error_log('Objet client avant save : ' . print_r($client, true));

        // Sauvegarder le client dans la base de données
        $result = $client->save();

        // Log du résultat de la sauvegarde
        error_log('Résultat de la sauvegarde : ' . ($result ? 'succès' : 'échec'));

        if ($result) {
            echo json_encode([
                'success' => true,
                'message' => 'Client ajouté avec succès'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Erreur lors de la sauvegarde du client'
            ]);
        }
    } catch (Exception $e) {
        error_log('Exception lors de la création du client : ' . $e->getMessage());
        echo json_encode([
            'success' => false,
            'message' => 'Erreur lors de la création du client: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Afficher la vue
tpl::view("listeclients");

?>
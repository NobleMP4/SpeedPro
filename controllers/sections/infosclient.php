<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\models\clients;
use monApp\models\vehicules;

// Récupérer l'ID du client depuis l'URL
$id_client = isset($_GET['id']) ? intval($_GET['id']) : null;

if($id_client) {
    // Récupérer les informations du client
    $client = clients::byId($id_client);
    
    if($client) {
        // Requête pour les véhicules du client
        $sql = "SELECT v.*, ma.nom_marque, mo.nom_modele, g.nom_generation, c.nom_carburant,
                (SELECT i.url_image FROM images i 
                JOIN images_vehicules iv ON i.id_image = iv.id_image 
                WHERE iv.id_vehicule = v.id_vehicule LIMIT 1) as url_image,
                (SELECT i.alt_image FROM images i 
                JOIN images_vehicules iv ON i.id_image = iv.id_image 
                WHERE iv.id_vehicule = v.id_vehicule LIMIT 1) as alt_image
                FROM vehicules v
                LEFT JOIN modeles mo ON v.id_modele = mo.id_modele
                LEFT JOIN marques ma ON mo.id_marque = ma.id_marque
                LEFT JOIN carburant c ON v.id_carburant = c.id_carburant
                LEFT JOIN generation g ON v.id_generation = g.id_generation
                WHERE v.id_client = :id_client";
        
        $vehicules = app::$db->prepare($sql, ['id_client' => $id_client], "monApp\\models\\vehicules");

        // Passer les données à la vue
        tpl::assign('client', $client);
        tpl::assign('vehicules', $vehicules ?: []);
    } else {
        header('Location: ?p=listeclients');
        exit;
    }
} else {
    header('Location: ?p=listeclients');
    exit;
}

tpl::view("infosclient");

?>
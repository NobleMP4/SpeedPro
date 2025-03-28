<?php

use monApp\core\tpl;
use monApp\models\vehicules;
use monApp\models\clients;

// Récupérer l'ID du véhicule depuis l'URL
$id_vehicule = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_vehicule) {
    // Récupérer les informations du véhicule
    $vehicule = vehicules::byId($id_vehicule);
    
    if ($vehicule) {
        // Récupérer les images du véhicule
        $images = $vehicule->getImages();
        
        // Récupérer les options du véhicule
        $options = $vehicule->getOptions();
        
        // Récupérer la liste des clients pour le formulaire de vente
        $liste_clients = clients::tous();
        
        // Si le véhicule est vendu, récupérer les informations du client
        if ($vehicule->getStatut_vehicule() == 'Vendu' && $vehicule->getId_client()) {
            $client = clients::byId($vehicule->getId_client());
            tpl::assign('client', $client);
        }
        
        // Passer les données à la vue
        tpl::assign('vehicule', $vehicule);
        tpl::assign('images', $images);
        tpl::assign('options', $options);
        tpl::assign('liste_clients', $liste_clients);
    }
}

tpl::view("vehiculeseul");
?> 
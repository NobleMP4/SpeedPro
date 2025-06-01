<?php

use monApp\core\tpl;
use monApp\models\vehicules;
use monApp\models\options;
use monApp\models\marques;
use monApp\models\modeles;
use monApp\models\generation;
use monApp\models\carburant;
use monApp\models\clients;
use monApp\core\app;

// Récupération des véhicules vendus avec leurs clients
$sql = "SELECT v.*, c.nom_client_1, c.prenom_client_1, c.nom_client_2, c.prenom_client_2 
        FROM vehicules v 
        LEFT JOIN clients c ON v.id_client = c.id_client 
        WHERE v.statut_vehicule = 'Vendu'
        ORDER BY v.date_creation_vehicule DESC";

$vehicules = app::$db->query($sql, "monApp\\models\\vehicules");

// Récupération des données pour les filtres
$marques = marques::tous();
$modeles = modeles::tous();
$carburants = carburant::tous();

// Récupération des générations
$sql = "SELECT g.id_generation, g.nom_generation, 
               mg.id_modele as modele_id,
               m.nom_modele, m.id_marque as marque_id, 
               ma.nom_marque
        FROM generation g 
        INNER JOIN modeles_generations mg ON g.id_generation = mg.id_generation
        INNER JOIN modeles m ON mg.id_modele = m.id_modele
        INNER JOIN marques ma ON m.id_marque = ma.id_marque
        ORDER BY ma.nom_marque, m.nom_modele, g.nom_generation";
$generations = app::$db->query($sql, "monApp\\models\\generation");

// Passage des données à la vue
tpl::assign('vehicules', $vehicules);
tpl::assign('marques', $marques);
tpl::assign('modeles', $modeles);
tpl::assign('generations', $generations);
tpl::assign('carburants', $carburants);

tpl::view("vente");

?>
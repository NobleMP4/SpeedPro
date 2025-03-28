<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\models\vehicules;

// Requête pour récupérer les véhicules vendus
$sql = "SELECT 
        v.*, ma.nom_marque, mo.nom_modele, g.nom_generation, c.nom_carburant,
        cl.nom_client_1, cl.prenom_client_1,
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
    LEFT JOIN clients cl ON v.id_client = cl.id_client
    WHERE v.statut_vehicule = 'Vendu'
    ORDER BY v.id_vehicule DESC";

$vehicules = app::$db->query($sql, "monApp\\models\\vehicules");

// Passer les données à la vue
tpl::assign('vehicules', $vehicules);

tpl::view("listevente");

?>
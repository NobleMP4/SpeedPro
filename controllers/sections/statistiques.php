<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\models\vehicules;
use monApp\models\marques;

// Récupérer les statistiques de base
$sql = "SELECT 
    (SELECT COUNT(*) FROM vehicules WHERE statut_vehicule = 'Disponible') as disponibles,
    (SELECT COUNT(*) FROM vehicules WHERE statut_vehicule = 'Vendu') as vendus,
    (SELECT COUNT(*) FROM vehicules) as total,
    (SELECT COUNT(*) FROM marques) as nb_marques";

$stats = app::$db->query($sql, "stdClass")[0];

// Récupérer les statistiques par marque
$sql = "SELECT m.nom_marque, COUNT(DISTINCT v.id_vehicule) as nombre 
        FROM marques m 
        LEFT JOIN modeles mo ON m.id_marque = mo.id_marque
        LEFT JOIN vehicules v ON mo.id_modele = v.id_modele 
        GROUP BY m.id_marque, m.nom_marque";

$stats_marques = app::$db->query($sql, "stdClass");

// Passer les données à la vue
tpl::assign('stats', $stats);
tpl::assign('stats_marques', $stats_marques);

tpl::view("statistiques");

?>
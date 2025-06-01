<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\models\vehicules;
use monApp\models\clients;
use monApp\models\user;
use monApp\models\marques;

// Récupération des statistiques générales
$stats = [
    'total_vehicules' => count(vehicules::tous()),
    'total_clients' => count(clients::tous()),
    'total_utilisateurs' => count(user::tous())
];

// Récupération des statistiques par marque directement depuis la base de données
$sql = "SELECT m.nom_marque, COUNT(v.id_vehicule) as total 
        FROM marques m 
        LEFT JOIN modeles mo ON m.id_marque = mo.id_marque 
        LEFT JOIN vehicules v ON mo.id_modele = v.id_modele 
        GROUP BY m.id_marque, m.nom_marque 
        ORDER BY total DESC";

$stats_marques = app::$db->query($sql, "stdClass");

// Passage des données à la vue
tpl::assign('stats', $stats);
tpl::assign('stats_marques', $stats_marques);
tpl::view("stats");

?>
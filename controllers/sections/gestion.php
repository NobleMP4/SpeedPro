<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\models\marques;
use monApp\models\modeles;
use monApp\models\options;
use monApp\models\generation;
use monApp\models\carburant;

// Vérifier d'abord s'il y a une requête AJAX
if (isset($_GET['action']) && $_GET['action'] === 'getModeles') {
    $id_marque = isset($_GET['marque']) ? $_GET['marque'] : null;
    
    if ($id_marque) {
        $sql = "SELECT id_modele, nom_modele 
                FROM modeles 
                WHERE id_marque = ?
                ORDER BY nom_modele";
        
        $modeles = app::$db->prepare($sql, [$id_marque], "stdClass");
        
        // Retourner les résultats en JSON
        header('Content-Type: application/json');
        echo json_encode($modeles ?: []);
        exit;
    }
}

// Si ce n'est pas une requête AJAX, continuer avec le chargement normal de la page
$marques = marques::tous();
$options = options::tous();
$carburants = carburant::tous();

// Récupération des modèles groupés par marque
$sql = "SELECT 
            ma.id_marque,
            ma.nom_marque,
            GROUP_CONCAT(
                CONCAT(m.id_modele, ':', m.nom_modele)
            ) as modeles
        FROM marques ma
        LEFT JOIN modeles m ON ma.id_marque = m.id_marque
        GROUP BY ma.id_marque, ma.nom_marque
        ORDER BY ma.nom_marque";
$modeles_by_marque = app::$db->query($sql, "stdClass");

// Récupération des générations groupées par modèle
$sql = "SELECT 
            m.id_modele,
            m.nom_modele,
            ma.nom_marque,
            GROUP_CONCAT(
                CONCAT(g.id_generation, ':', g.nom_generation)
            ) as generations
        FROM modeles m 
        LEFT JOIN marques ma ON m.id_marque = ma.id_marque
        LEFT JOIN modeles_generations mg ON m.id_modele = mg.id_modele
        LEFT JOIN generation g ON mg.id_generation = g.id_generation
        GROUP BY m.id_modele, m.nom_modele, ma.nom_marque
        ORDER BY ma.nom_marque, m.nom_modele";
$generations_by_model = app::$db->query($sql, "stdClass");

// Assignation des données au template
tpl::assign('marques', $marques);
tpl::assign('modeles_by_marque', $modeles_by_marque);
tpl::assign('options', $options);
tpl::assign('carburants', $carburants);
tpl::assign('generations_by_model', $generations_by_model);

// Affichage de la vue
tpl::view("gestion");

?>
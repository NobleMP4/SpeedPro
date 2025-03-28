<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\core\tools;
use monApp\models\vehicules;
use monApp\models\marques;
use monApp\models\modeles;
use monApp\models\carburant;
use monApp\models\options;
use monApp\models\images;
use monApp\models\generation;

// Gestion des actions AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['action'])) {
    if (isset($_GET['action'])) {
        header('Content-Type: application/json');
        
        switch ($_GET['action']) {
            case 'addMarque':
                if (isset($_POST['nom_marque']) && !empty($_POST['nom_marque'])) {
                    try {
                        $marque = new marques();
                        $marque->setNom_marque($_POST['nom_marque']);
                        
                        if ($marque->save()) {
                            echo json_encode(['success' => true]);
                        } else {
                            echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout de la marque']);
                        }
                    } catch (Exception $e) {
                        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Nom de la marque manquant']);
                }
                exit;
                
            case 'addModele':
                if (empty($_POST['marque_modele'])) {
                    echo json_encode(['success' => false, 'message' => 'Veuillez sélectionner une marque']);
                    exit;
                }
                if (empty($_POST['nom_modele'])) {
                    echo json_encode(['success' => false, 'message' => 'Veuillez entrer un nom de modèle']);
                    exit;
                }

                try {
                    $modele = new modeles();
                    $modele->setId_marque($_POST['marque_modele']);
                    $modele->setNom_modele($_POST['nom_modele']);
                    
                    if ($id_modele = $modele->save()) {
                        // Si des générations sont sélectionnées
                        if(isset($_POST['generations']) && is_array($_POST['generations'])) {
                            foreach($_POST['generations'] as $id_generation) {
                                $modele->addGeneration($id_generation);
                            }
                        }
                        echo json_encode(['success' => true]);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout du modèle']);
                    }
                } catch (Exception $e) {
                    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                }
                exit;
                
            case 'addCarburant':
                if (empty($_POST['nom_carburant'])) {
                    echo json_encode(['success' => false, 'message' => 'Veuillez entrer un nom de carburant']);
                    exit;
                }

                try {
                    $carburant = new carburant();
                    $carburant->setNom_carburant($_POST['nom_carburant']);
                    
                    if ($carburant->save()) {
                        echo json_encode(['success' => true]);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout du carburant']);
                    }
                } catch (Exception $e) {
                    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                }
                exit;
                
            case 'addOption':
                if (isset($_POST['nom_option']) && !empty($_POST['nom_option'])) {
                    try {
                        $option = new options();
                        $option->setNom_option($_POST['nom_option']);
                        
                        if ($option->save()) {
                            // Récupérer l'ID de l'option nouvellement créée
                            $id_option = $option->getId_option();
                            
                            // Si un véhicule est spécifié, créer la relation
                            if (isset($_POST['id_vehicule']) && !empty($_POST['id_vehicule'])) {
                                $sql = "INSERT INTO vehicules_options (id_vehicule, id_option) VALUES (?, ?)";
                                app::$db->exec($sql, [intval($_POST['id_vehicule']), $id_option]);
                            }
                            
                            echo json_encode(['success' => true]);
                        } else {
                            echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout de l\'option']);
                        }
                    } catch (Exception $e) {
                        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Nom de l\'option manquant']);
                }
                exit;
            
            case 'getModeles':
                try {
                    if (!isset($_GET['id_marque'])) {
                        echo json_encode(['error' => 'id_marque non fourni']);
                        exit;
                    }
                    
                    $sql = "SELECT * FROM modeles WHERE id_marque = ?";
                    $modeles = app::$db->query($sql, "monApp\\models\\modeles", [$_GET['id_marque']]);
                    
                    $result = [];
                    foreach ($modeles as $modele) {
                        $result[] = [
                            'id_modele' => $modele->getId_modele(),
                            'nom_modele' => $modele->getNom_modele()
                        ];
                    }
                    
                    echo json_encode($result);
                } catch (Exception $e) {
                    echo json_encode(['error' => $e->getMessage()]);
                }
                exit;
                
            case 'getGenerations':
                try {
                    if (!isset($_GET['id_modele'])) {
                        echo json_encode(['error' => 'id_modele non fourni']);
                        exit;
                    }
                    
                    $sql = "SELECT g.* FROM generation g 
                            INNER JOIN modeles_generations mg ON g.id_generation = mg.id_generation 
                            WHERE mg.id_modele = ?";
                    $generations = app::$db->query($sql, "monApp\\models\\generation", [$_GET['id_modele']]);
                    
                    $result = [];
                    foreach ($generations as $generation) {
                        $result[] = [
                            'id_generation' => $generation->getId_generation(),
                            'nom_generation' => $generation->getNom_generation()
                        ];
                    }
                    
                    echo json_encode($result);
                } catch (Exception $e) {
                    echo json_encode(['error' => $e->getMessage()]);
                }
                exit;
        }
    }
}

// Traitement du formulaire d'ajout de véhicule
if(isset($_GET['action']) && $_GET['action'] == 'add') {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Débuter une transaction
            app::$db->beginTransaction();
            
            // 1. Créer le véhicule
            $vehicule = new vehicules();
            $vehicule->setAnnee_vehicule(intval($_POST['annee']));
            $vehicule->setPrix_vehicule(floatval($_POST['prix']));
            $vehicule->setDescription_vehicule($_POST['description']);
            $vehicule->setKilometrage_vehicule(intval($_POST['kilometrage']));
            $vehicule->setBoite_vitesse_vehicule($_POST['boite']);
            $vehicule->setPuissance_vehicule(intval($_POST['puissance']));
            $vehicule->setImmatriculation_vehicule($_POST['immatriculation']);
            $vehicule->setStatut_vehicule('Disponible');
            $vehicule->setId_modele(intval($_POST['modele']));
            $vehicule->setId_carburant(intval($_POST['carburant']));
            
            if(isset($_POST['generation']) && !empty($_POST['generation'])) {
                $vehicule->setId_generation(intval($_POST['generation']));
            }

            // Sauvegarder le véhicule
            $id_vehicule = $vehicule->save();
            
            if(!$id_vehicule) {
                throw new \Exception('Erreur lors de l\'enregistrement du véhicule');
            }

            // 2. Traiter les options
            if(isset($_POST['options']) && is_array($_POST['options'])) {
                foreach($_POST['options'] as $option_id) {
                    $sql = "INSERT INTO vehicules_options (id_vehicule, id_option) VALUES (?, ?)";
                    app::$db->exec($sql, [$id_vehicule, intval($option_id)]);
                }
            }

            // 3. Traiter les images
            if(isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
                foreach($_FILES['images']['name'] as $key => $name) {
                    if($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                        // Upload de l'image
                        $fileInfo = tools::handleImageUpload([
                            'name' => $_FILES['images']['name'][$key],
                            'type' => $_FILES['images']['type'][$key],
                            'tmp_name' => $_FILES['images']['tmp_name'][$key],
                            'error' => $_FILES['images']['error'][$key],
                            'size' => $_FILES['images']['size'][$key]
                        ]);

                        // Créer l'entrée dans la table images
                        $image = new images();
                        $image->setNom_image($fileInfo['original_name']);
                        $image->setAlt_image(pathinfo($fileInfo['original_name'], PATHINFO_FILENAME));
                        $image->setUrl_image($fileInfo['new_name']);
                        $image->setSlug_image(strtolower(str_replace(' ', '-', pathinfo($fileInfo['original_name'], PATHINFO_FILENAME))));
                        
                        $id_image = $image->save();
                        
                        if(!$id_image) {
                            throw new \Exception('Erreur lors de l\'enregistrement de l\'image');
                        }
                        
                        // Créer la liaison dans images_vehicules
                        $sql = "INSERT INTO images_vehicules (id_vehicule, id_image) VALUES (?, ?)";
                        if(!app::$db->exec($sql, [$id_vehicule, $id_image])) {
                            throw new \Exception('Erreur lors de la liaison image-véhicule');
                        }
                    }
                }
            }

            // Si tout s'est bien passé, valider la transaction
            app::$db->commit();

            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
            exit;

        } catch (\Exception $e) {
            // En cas d'erreur, annuler toutes les modifications
            app::$db->rollBack();
            
            error_log('Error in vehicle addition: ' . $e->getMessage());
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            exit;
        }
    }
}

// Récupération des données
$sql = "SELECT * FROM vehicules WHERE statut_vehicule = 'Disponible'";
$vehicules = app::$db->query($sql, "monApp\\models\\vehicules");

foreach($vehicules as $vehicule) {
    if($vehicule->getId_generation()) {
        $generation = generation::byId($vehicule->getId_generation());
        $vehicule->setGeneration($generation);
    }
}

// Récupération des données pour les filtres et le formulaire
$marques = marques::tous();
$modeles = modeles::tous();
$carburants = carburant::tous();
$options = options::tous();
$generations = generation::tous();

$sql = "SELECT DISTINCT annee_vehicule as annee 
        FROM vehicules 
        WHERE statut_vehicule = 'Disponible' 
        ORDER BY annee_vehicule DESC";
$annees = app::$db->query($sql, "stdClass");

// Ajout d'une variable pour contrôler l'affichage du formulaire
$showAddForm = isset($_GET['showForm']) && $_GET['showForm'] === 'true';
tpl::assign('showAddForm', $showAddForm);

// Assignation des données à la vue
tpl::assign('vehicules', $vehicules);
tpl::assign('marques', $marques);
tpl::assign('modeles', $modeles);
tpl::assign('carburants', $carburants);
tpl::assign('options', $options);
tpl::assign('annees', $annees);
tpl::assign('generations', $generations);

tpl::view("vehicules");

?>
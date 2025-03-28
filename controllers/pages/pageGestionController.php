<?php 

namespace monApp\controllers\pages;

use monApp\models\marques;
use monApp\models\options;
use monApp\models\carburant;
use monApp\models\modeles;
use monApp\models\generation;
use monApp\core\app;

class pageGestionController {
    public function index() {
        // Gestion de la requête AJAX pour récupérer les modèles d'une marque
        if(isset($_GET['action']) && $_GET['action'] == 'getModeles' && isset($_GET['marque'])) {
            try {
                $id_marque = $_GET['marque'];
                $modeles = modeles::getByMarque($id_marque);
                
                if($modeles) {
                    $result = array_map(function($modele) {
                        return [
                            'id_modele' => $modele->getId_modele(),
                            'nom_modele' => $modele->getNom_modele()
                        ];
                    }, $modeles);
                    echo json_encode($result);
                } else {
                    echo json_encode([]);
                }
                exit;
            } catch (\Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
                exit;
            }
        }

        // Gestion de l'ajout de marque
        if(isset($_POST['action']) && $_POST['action'] == 'addMarque') {
            if(isset($_POST['nom_marque']) && !empty($_POST['nom_marque'])) {
                try {
                    $marque = new marques();
                    $marque->setNom_marque($_POST['nom_marque']);
                    $id = $marque->save(); // Utilisation de la méthode save() existante
                    
                    if($id) {
                        echo json_encode(['success' => true, 'id' => $id]);
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'enregistrement']);
                    }
                    exit;
                } catch (\Exception $e) {
                    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
                    exit;
                }
            }
        }

        // Gestion de l'ajout d'option
        if(isset($_POST['action']) && $_POST['action'] == 'addOption') {
            if(isset($_POST['nom_option']) && !empty($_POST['nom_option'])) {
                try {
                    $option = new options();
                    $option->setNom_option($_POST['nom_option']);
                    $id = $option->save();
                    
                    if($id) {
                        echo json_encode(['success' => true, 'id' => $id]);
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'enregistrement']);
                    }
                    exit;
                } catch (\Exception $e) {
                    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
                    exit;
                }
            }
        }

        // Gestion de l'ajout de carburant
        if(isset($_POST['action']) && $_POST['action'] == 'addCarburant') {
            if(isset($_POST['nom_carburant']) && !empty($_POST['nom_carburant'])) {
                try {
                    $carburant = new carburant();
                    $carburant->setNom_carburant($_POST['nom_carburant']);
                    $id = $carburant->save();
                    
                    if($id) {
                        echo json_encode(['success' => true, 'id' => $id]);
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'enregistrement']);
                    }
                    exit;
                } catch (\Exception $e) {
                    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
                    exit;
                }
            }
        }

        // Gestion de l'ajout de modèle
        if(isset($_POST['action']) && $_POST['action'] == 'addModele') {
            if(isset($_POST['nom_modele']) && !empty($_POST['nom_modele']) && 
               isset($_POST['marque_modele']) && !empty($_POST['marque_modele'])) {
                try {
                    $modele = new modeles();
                    $modele->setNom_modele($_POST['nom_modele']);
                    $modele->setId_marque($_POST['marque_modele']);
                    $id = $modele->save();
                    
                    if($id) {
                        echo json_encode(['success' => true, 'id' => $id]);
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'enregistrement']);
                    }
                    exit;
                } catch (\Exception $e) {
                    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
                    exit;
                }
            }
        }

        // Gestion de l'ajout de génération
        if(isset($_POST['action']) && $_POST['action'] == 'addGeneration') {
            if(isset($_POST['nom_generation']) && !empty($_POST['nom_generation']) && 
               isset($_POST['modele_generation']) && !empty($_POST['modele_generation'])) {
                try {
                    // 1. Créer la génération
                    $generation = new generation();
                    $generation->setNom_generation($_POST['nom_generation']);
                    $id_generation = $generation->save();
                    
                    if($id_generation) {
                        // 2. Récupérer le modèle
                        $modele = modeles::byId($_POST['modele_generation']);
                        
                        if($modele) {
                            // 3. Créer la relation
                            if($modele->addGeneration($id_generation)) {
                                echo json_encode([
                                    'success' => true, 
                                    'id' => $id_generation,
                                    'message' => 'Génération ajoutée avec succès'
                                ]);
                            } else {
                                // Si l'ajout de la relation échoue, supprimer la génération
                                $sql = "DELETE FROM generation WHERE id_generation = :id";
                                app::$db->prepare($sql, ['id' => $id_generation]);
                                echo json_encode([
                                    'success' => false, 
                                    'error' => 'Erreur lors de la liaison avec le modèle'
                                ]);
                            }
                        } else {
                            // Si le modèle n'est pas trouvé, supprimer la génération
                            $sql = "DELETE FROM generation WHERE id_generation = :id";
                            app::$db->prepare($sql, ['id' => $id_generation]);
                            echo json_encode([
                                'success' => false, 
                                'error' => 'Modèle non trouvé'
                            ]);
                        }
                    } else {
                        echo json_encode([
                            'success' => false, 
                            'error' => 'Erreur lors de l\'enregistrement de la génération'
                        ]);
                    }
                    exit;
                } catch (\Exception $e) {
                    error_log("Erreur lors de l'ajout de génération : " . $e->getMessage());
                    echo json_encode([
                        'success' => false, 
                        'error' => 'Erreur : ' . $e->getMessage()
                    ]);
                    exit;
                }
            } else {
                echo json_encode([
                    'success' => false, 
                    'error' => 'Données manquantes'
                ]);
                exit;
            }
        }
        
        // Récupération des marques existantes pour l'affichage
        $marques = marques::tous();
        $options = options::tous();
        $carburants = carburant::tous();
        $modeles = modeles::tous();
        $generations = generation::tous();
        require "views/pages/gestion.php";
    }
}

?>
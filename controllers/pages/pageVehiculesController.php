<?php

namespace monApp\controllers\pages;

use monApp\core\app;
use monApp\models\vehicules;
use monApp\models\images;
use monApp\core\tools;

class pageVehiculesController {
    public function index() {
        // Si on reçoit une requête POST pour ajouter un véhicule
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Création d'un nouvel objet véhicule
                $vehicule = new vehicules();
                
                // Attribution des valeurs
                $vehicule->setAnnee_vehicule(intval($_POST['annee']));
                $vehicule->setPrix_vehicule(floatval($_POST['prix']));
                $vehicule->setDescription_vehicule($_POST['description']);
                $vehicule->setKilometrage_vehicule(intval($_POST['kilometrage']));
                $vehicule->setBoite_vitesse_vehicule($_POST['boite']);
                $vehicule->setPuissance_vehicule(intval($_POST['puissance']));
                $vehicule->setPuissance_fiscale(intval($_POST['puissance_fiscale']));
                $vehicule->setImmatriculation_vehicule($_POST['immatriculation']);
                $vehicule->setStatut_vehicule('Disponible');
                $vehicule->setId_modele(intval($_POST['modele']));
                $vehicule->setId_carburant(intval($_POST['carburant']));
                
                // Ajout de la génération si elle est spécifiée
                if(isset($_POST['generation']) && !empty($_POST['generation'])) {
                    $vehicule->setId_generation(intval($_POST['generation']));
                }

                // Sauvegarde du véhicule en base de données
                $id_vehicule = $vehicule->save();
                
                if($id_vehicule) {
                    // Traitement des options sélectionnées
                    if(isset($_POST['options_vehicule']) && is_array($_POST['options_vehicule'])) {
                        foreach($_POST['options_vehicule'] as $option_id) {
                            $sql = "INSERT INTO vehicules_options (id_vehicule, id_option) 
                                   VALUES (?, ?)";
                            app::$db->exec($sql, [
                                $id_vehicule,
                                intval($option_id)
                            ]);
                        }
                    }

                    // Traitement des images
                    if(isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
                        foreach($_FILES['images']['name'] as $key => $name) {
                            if($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                                try {
                                    // Création d'un tableau pour l'image courante
                                    $currentImage = [
                                        'name' => $_FILES['images']['name'][$key],
                                        'type' => $_FILES['images']['type'][$key],
                                        'tmp_name' => $_FILES['images']['tmp_name'][$key],
                                        'error' => $_FILES['images']['error'][$key],
                                        'size' => $_FILES['images']['size'][$key]
                                    ];

                                    // Upload de l'image
                                    $fileInfo = tools::handleImageUpload($currentImage);

                                    if($fileInfo['success']) {
                                        // Création de l'entrée dans la table images
                                        $image = new images();
                                        $image->setNom_image($fileInfo['original_name']);
                                        $image->setAlt_image(pathinfo($fileInfo['original_name'], PATHINFO_FILENAME));
                                        $image->setUrl_image($fileInfo['new_name']);
                                        $image->setSlug_image(strtolower(str_replace(' ', '-', pathinfo($fileInfo['original_name'], PATHINFO_FILENAME))));
                                        
                                        $id_image = $image->save();
                                        
                                        if($id_image) {
                                            // Création de la liaison dans images_vehicules
                                            $sql = "INSERT INTO images_vehicules (id_vehicule, id_image) VALUES (?, ?)";
                                            app::$db->exec($sql, [$id_vehicule, $id_image]);
                                        }
                                    }
                                } catch (\Exception $e) {
                                    // Log l'erreur mais continue avec les autres images
                                    error_log('Erreur lors du traitement de l\'image : ' . $e->getMessage());
                                }
                            }
                        }
                    }

                    // Remplacer la réponse JSON par une redirection
                    header('Location: ?p=vehicules');
                    exit;
                } else {
                    throw new \Exception('Erreur lors de l\'ajout du véhicule');
                }
                
            } catch (\Exception $e) {
                echo json_encode([
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
            }
            exit;
        }

        // Affichage de la page
        require "views/pages/vehicules.php";
    }
}

?>
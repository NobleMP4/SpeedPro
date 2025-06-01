<?php

use monApp\core\tpl;
use monApp\models\vehicules;
use monApp\models\options;
use monApp\models\marques;
use monApp\models\modeles;
use monApp\models\generation;
use monApp\models\carburant;
use monApp\models\images;
use monApp\core\app;
use monApp\core\session;

// Activation du débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérification si c'est une requête AJAX
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

// Si c'est une requête AJAX, on s'assure qu'aucune sortie n'a été faite
if ($isAjax) {
    // Nettoyage de tout buffer de sortie existant
    while (ob_get_level()) {
        ob_end_clean();
    }
    
    // Désactiver l'affichage des erreurs
    ini_set('display_errors', 0);
    error_reporting(0);
}

// Vérification et création du dossier d'upload si nécessaire
$uploadDir = __DIR__ . '/../../assets/imgs/vehicules/';
if (!file_exists($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true)) {
        error_log("Erreur : Impossible de créer le dossier d'upload : " . $uploadDir);
    } else {
        chmod($uploadDir, 0777);
        error_log("Dossier d'upload créé avec succès : " . $uploadDir);
    }
}

// Récupération de l'utilisateur connecté
$userSession = session::get('user');
if (!$userSession) {
    header('Location: ?p=login');
    exit;
}

// Vérification des permissions pour l'ajout de véhicule
$canAddVehicle = in_array($userSession['role'], [1, 2, 3]); // Tous les rôles peuvent ajouter

// Traitement du formulaire d'ajout de véhicule
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'addVehicule') {
    // Vérification des permissions
    if (!$canAddVehicle) {
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Vous n\'avez pas les permissions nécessaires pour ajouter un véhicule.']);
            exit;
        } else {
            $_SESSION['error_message'] = 'Vous n\'avez pas les permissions nécessaires pour ajouter un véhicule.';
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    error_log("Début du traitement du formulaire");
    
    try {
        // Vérification des champs requis
        $required_fields = [
            'annee' => 'Année',
            'prix' => 'Prix',
            'description' => 'Description',
            'kilometrage' => 'Kilométrage',
            'boiteVitesse' => 'Boîte de vitesse',
            'puissance' => 'Puissance',
            'immatriculation' => 'Immatriculation',
            'modele' => 'Modèle',
            'carburant' => 'Carburant'
        ];

        $errors = [];
        foreach ($required_fields as $field => $label) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                $errors[] = "Le champ {$label} est requis";
            }
        }

        if (!empty($errors)) {
            throw new Exception(implode("\n", $errors));
        }

        // Début de la transaction
        app::$db->beginTransaction();

        // Insertion du véhicule
        $sql = "INSERT INTO vehicules (
                    annee_vehicule, 
                    prix_vehicule, 
                    description_vehicule, 
                    kilometrage_vehicule,
                    boite_vitesse_vehicule, 
                    puissance_vehicule, 
                    puissance_fiscale,
                    immatriculation_vehicule, 
                    statut_vehicule,
                    id_modele, 
                    id_carburant, 
                    id_generation
                ) VALUES (
                    :annee,
                    :prix,
                    :description,
                    :kilometrage,
                    :boiteVitesse,
                    :puissance,
                    :puissanceFiscale,
                    :immatriculation,
                    'Disponible',
                    :modele,
                    :carburant,
                    :generation
                )";

        $params = [
            'annee' => intval($_POST['annee']),
            'prix' => floatval($_POST['prix']),
            'description' => $_POST['description'],
            'kilometrage' => intval($_POST['kilometrage']),
            'boiteVitesse' => $_POST['boiteVitesse'],
            'puissance' => intval($_POST['puissance']),
            'puissanceFiscale' => !empty($_POST['puissanceFiscale']) ? intval($_POST['puissanceFiscale']) : null,
            'immatriculation' => $_POST['immatriculation'],
            'modele' => intval($_POST['modele']),
            'carburant' => intval($_POST['carburant']),
            'generation' => !empty($_POST['generation']) ? intval($_POST['generation']) : null
        ];

        $result = app::$db->prepare($sql, $params);
        if (!$result) {
            throw new Exception("Erreur lors de l'insertion du véhicule");
        }

        $id_vehicule = app::$db->lastInsertId();
        error_log("Véhicule créé avec l'ID : " . $id_vehicule);

        // Traitement des images
        if (!empty($_FILES['images']['name'][0])) {
            // Types MIME autorisés
            $allowed_types = [
                'image/png',
                'image/jpeg',
                'image/jpg',
                'image/webp'
            ];

            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    // Vérification du type MIME
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mime_type = finfo_file($finfo, $tmp_name);
                    finfo_close($finfo);

                    if (!in_array($mime_type, $allowed_types)) {
                        throw new Exception("Le type de fichier '" . $_FILES['images']['name'][$key] . "' n'est pas autorisé. Formats acceptés : PNG, JPG, JPEG, WEBP");
                    }

                    $fileName = $_FILES['images']['name'][$key];
                    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $uniqueName = uniqid() . '.' . $fileExt;
                    $targetFile = $uploadDir . $uniqueName;
                    $relativePath = 'assets/imgs/vehicules/' . $uniqueName;

                    if (move_uploaded_file($tmp_name, $targetFile)) {
                        chmod($targetFile, 0644);
                        
                        // Insertion de l'image
                        $sql = "INSERT INTO images (
                                    nom_image, 
                                    alt_image, 
                                    url_image, 
                                    slug_image
                                ) VALUES (
                                    :nom,
                                    :alt,
                                    :url,
                                    :slug
                                )";

                        $params = [
                            'nom' => pathinfo($fileName, PATHINFO_FILENAME),
                            'alt' => "Image du véhicule",
                            'url' => $relativePath,
                            'slug' => strtolower(str_replace(' ', '-', pathinfo($fileName, PATHINFO_FILENAME)))
                        ];

                        $result = app::$db->prepare($sql, $params);
                        if (!$result) {
                            throw new Exception("Erreur lors de l'insertion de l'image");
                        }

                        $id_image = app::$db->lastInsertId();

                        // Liaison image-véhicule
                        $sql = "INSERT INTO images_vehicules (id_vehicule, id_image) VALUES (:id_vehicule, :id_image)";
                        $result = app::$db->prepare($sql, [
                            'id_vehicule' => $id_vehicule,
                            'id_image' => $id_image
                        ]);

                        if (!$result) {
                            throw new Exception("Erreur lors de la liaison image-véhicule");
                        }
                    } else {
                        throw new Exception("Erreur lors de l'upload du fichier");
                    }
                }
            }
        }

        // Traitement des options
        if (!empty($_POST['options']) && is_array($_POST['options'])) {
            foreach ($_POST['options'] as $id_option) {
                $sql = "INSERT INTO vehicules_options (id_vehicule, id_option) VALUES (:id_vehicule, :id_option)";
                $result = app::$db->prepare($sql, [
                    'id_vehicule' => $id_vehicule,
                    'id_option' => intval($id_option)
                ]);

                if (!$result) {
                    throw new Exception("Erreur lors de l'ajout des options");
                }
            }
        }

        app::$db->commit();
        
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Véhicule ajouté avec succès']);
            exit;
        } else {
            $_SESSION['success_message'] = "Véhicule ajouté avec succès";
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }

    } catch (Exception $e) {
        app::$db->rollBack();
        error_log("Erreur : " . $e->getMessage());
        error_log("Trace : " . $e->getTraceAsString());
        
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            exit;
        } else {
            $_SESSION['error_message'] = $e->getMessage();
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
    }
}

// Traitement des requêtes AJAX
if (isset($_GET['action']) && $isAjax) {
    ob_clean(); // Nettoyer le buffer de sortie
    header('Content-Type: application/json');
    
    try {
        switch ($_GET['action']) {
            case 'getModeles':
                if (isset($_GET['marque'])) {
                    $id_marque = intval($_GET['marque']);
                    $sql = "SELECT DISTINCT m.id_modele, m.nom_modele 
                           FROM modeles m 
                           WHERE m.id_marque = :id_marque 
                           ORDER BY m.nom_modele";
                    
                    $stmt = app::$db->getPDO()->prepare($sql);
                    $stmt->execute(['id_marque' => $id_marque]);
                    $modeles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    
                    if (!is_array($modeles)) {
                        throw new Exception('Erreur lors de la récupération des modèles');
                    }
                    
                    echo json_encode([
                        'success' => true,
                        'modeles' => $modeles
                    ]);
                    exit;
                }
                break;
                
            case 'getGenerations':
                if (isset($_GET['modele'])) {
                    $id_modele = intval($_GET['modele']);
                    $sql = "SELECT DISTINCT g.id_generation, g.nom_generation 
                           FROM generation g 
                           INNER JOIN modeles_generations mg ON g.id_generation = mg.id_generation
                           WHERE mg.id_modele = :id_modele 
                           ORDER BY g.nom_generation";
                    
                    $stmt = app::$db->getPDO()->prepare($sql);
                    $stmt->execute(['id_modele' => $id_modele]);
                    $generations = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    
                    if (!is_array($generations)) {
                        throw new Exception('Erreur lors de la récupération des générations');
                    }
                    
                    echo json_encode([
                        'success' => true,
                        'generations' => $generations
                    ]);
                    exit;
                }
                break;
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'error' => $e->getMessage()
        ]);
        exit;
    }
    exit;
}

// Si ce n'est pas une requête AJAX, on continue avec le rendu normal de la page
if (!$isAjax) {
    // Récupération des données pour la vue
    $sql = "SELECT * FROM vehicules WHERE statut_vehicule = 'Disponible'";
    $vehicules = app::$db->query($sql, "monApp\\models\\vehicules");
    $options = options::tous();
    $marques = marques::tous();

    // Modification de la récupération des modèles pour inclure l'id_marque
    $sql = "SELECT DISTINCT m.*, ma.id_marque 
            FROM modeles m 
            INNER JOIN marques ma ON m.id_marque = ma.id_marque 
            ORDER BY ma.nom_marque, m.nom_modele";
    $modeles = app::$db->query($sql, "monApp\\models\\modeles");

    $carburants = carburant::tous();

    // Récupération des générations avec les relations
    $sql = "SELECT g.*, 
                   mg.id_modele as modele_id,
                   m.id_marque as marque_id
            FROM generation g 
            INNER JOIN modeles_generations mg ON g.id_generation = mg.id_generation
            INNER JOIN modeles m ON mg.id_modele = m.id_modele
            ORDER BY m.id_marque, mg.id_modele, g.nom_generation";
    $generations = app::$db->query($sql, "monApp\\models\\generation");

    // Passage des données à la vue
    tpl::assign('vehicules', $vehicules);
    tpl::assign('options', $options);
    tpl::assign('marques', $marques);
    tpl::assign('modeles', $modeles);
    tpl::assign('generations', $generations);
    tpl::assign('carburants', $carburants);
    tpl::assign('canAddVehicle', $canAddVehicle);

    // Nettoyage des messages de session
    $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
    $success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : null;
    unset($_SESSION['error_message'], $_SESSION['success_message']);

    tpl::assign('error_message', $error_message);
    tpl::assign('success_message', $success_message);

    tpl::view("vehicules");
}

?>
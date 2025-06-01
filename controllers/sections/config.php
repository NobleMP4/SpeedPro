<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\core\session;
use monApp\models\marques;
use monApp\models\modeles;
use monApp\models\generation;

// Traitement des requêtes AJAX en premier
if (isset($_GET['action'])) {
    // S'assurer qu'il n'y a pas de sortie avant
    ob_clean();
    
    header('Content-Type: application/json');
    
    // Récupération de l'utilisateur connecté pour les permissions
    $userSession = session::get('user');
    if (!$userSession) {
        echo json_encode(['success' => false, 'error' => 'Non autorisé']);
        exit;
    }

    switch ($_GET['action']) {
        case 'getModeles':
            if (isset($_GET['marque'])) {
                try {
                    $id_marque = (int)$_GET['marque'];
                    error_log("Récupération des modèles pour la marque ID: " . $id_marque);
                    
                    // Récupération des modèles pour la marque
                    $sql = "SELECT id_modele, nom_modele FROM modeles WHERE id_marque = :id_marque ORDER BY nom_modele";
                    $stmt = app::$db->getPDO()->prepare($sql);
                    $stmt->execute([':id_marque' => $id_marque]);
                    $modeles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    error_log("Modèles trouvés : " . count($modeles));
                    
                    $response = [
                        'success' => true,
                        'modeles' => $modeles
                    ];
                    error_log("Réponse JSON : " . json_encode($response));
                    echo json_encode($response);
                    exit;
                } catch (Exception $e) {
                    error_log("Erreur lors de la récupération des modèles : " . $e->getMessage());
                    echo json_encode([
                        'success' => false,
                        'error' => $e->getMessage()
                    ]);
                    exit;
                }
            } else {
                error_log("Paramètre 'marque' manquant");
                echo json_encode([
                    'success' => false,
                    'error' => 'ID de marque manquant'
                ]);
                exit;
            }
            break;
    }
    exit;
}

// Récupération de l'utilisateur connecté
$userSession = session::get('user');
if (!$userSession) {
    header('Location: ?p=login');
    exit;
}

// Définition des permissions selon le rôle
$canAdd = true; // Tout le monde peut ajouter
$canDelete = in_array($userSession['role'], [1, 2]); // Admin et Gérant peuvent supprimer

// Traitement de l'ajout d'une marque
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'addMarque') {
        // Vérification des permissions pour l'ajout
        if (!$canAdd) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
        
        // Vérification et nettoyage des données
        if (isset($_POST['nomMarque']) && !empty(trim($_POST['nomMarque']))) {
            $nomMarque = trim($_POST['nomMarque']);
            
            try {
                // Création et sauvegarde de la nouvelle marque
                $marque = new marques();
                $marque->setNom_marque($nomMarque);
                $result = $marque->save();
                
                // Redirection vers la même page
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            } catch (Exception $e) {
                // En cas d'erreur, on continue vers l'affichage normal de la page
            }
        }
    }
    // Traitement de la suppression
    elseif ($_POST['action'] === 'deleteMarque' && isset($_POST['id_marque'])) {
        // Vérification des permissions pour la suppression
        if (!$canDelete) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
        
        try {
            $id_marque = (int)$_POST['id_marque'];
            $marque = new marques();
            $marque->setId_marque($id_marque);
            $marque->delete();
            
            // Redirection vers la même page
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        } catch (Exception $e) {
            // En cas d'erreur, on continue vers l'affichage normal de la page
        }
    }
    // Traitement de l'ajout d'un modèle
    elseif ($_POST['action'] === 'addModele' && isset($_POST['nomModele']) && isset($_POST['marqueModele'])) {
        // Vérification des permissions pour l'ajout
        if (!$canAdd) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
        
        try {
            // Vérification et nettoyage des données
            $nomModele = trim($_POST['nomModele']);
            $idMarque = (int)$_POST['marqueModele'];
            
            if (!empty($nomModele) && $idMarque > 0) {
                // Création et sauvegarde du nouveau modèle
                $modele = new modeles();
                $modele->setNom_modele($nomModele);
                $modele->setId_marque($idMarque);
                $modele->save();
                
                // Redirection vers la même page
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }
        } catch (Exception $e) {
            // En cas d'erreur, on continue vers l'affichage normal de la page
        }
    }
    // Traitement de la suppression d'un modèle
    elseif ($_POST['action'] === 'deleteModele' && isset($_POST['id_modele'])) {
        // Vérification des permissions pour la suppression
        if (!$canDelete) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
        
        try {
            $id_modele = (int)$_POST['id_modele'];
            $pdo = app::$db->getPDO();
            
            // Démarrer une transaction
            $pdo->beginTransaction();
            
            try {
                // Suppression des options des véhicules associés
                $sql = "DELETE vo FROM vehicules_options vo 
                        INNER JOIN vehicules v ON vo.id_vehicule = v.id_vehicule 
                        WHERE v.id_modele = :id_modele";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':id_modele' => $id_modele]);
                error_log("Options des véhicules supprimées");

                // Suppression des véhicules associés
                $sql = "DELETE FROM vehicules WHERE id_modele = :id_modele";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':id_modele' => $id_modele]);
                error_log("Véhicules supprimés");

                // Suppression des générations associées
                $sql = "DELETE FROM generation WHERE id_modele = :id_modele";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':id_modele' => $id_modele]);
                error_log("Générations supprimées");

                // Suppression du modèle
                $sql = "DELETE FROM modeles WHERE id_modele = :id_modele";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':id_modele' => $id_modele]);
                error_log("Modèle supprimé");

                // Valider la transaction
                $pdo->commit();
                error_log("Transaction validée - Modèle " . $id_modele . " supprimé avec succès");

                // Redirection vers la même page
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;

            } catch (Exception $e) {
                // En cas d'erreur, annuler la transaction
                $pdo->rollBack();
                error_log("Erreur lors de la suppression du modèle : " . $e->getMessage());
                error_log("Transaction annulée");
                throw $e;
            }
        } catch (Exception $e) {
            error_log("Erreur globale lors de la suppression du modèle : " . $e->getMessage());
            // En cas d'erreur, on continue vers l'affichage normal de la page
        }
    }
    // Traitement de l'ajout d'une génération
    elseif ($_POST['action'] === 'addGeneration' && isset($_POST['modeleGeneration']) && isset($_POST['nomGeneration'])) {
        // Vérification des permissions pour l'ajout
        if (!$canAdd) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
        
        try {
            // Vérification et nettoyage des données
            $idModele = (int)$_POST['modeleGeneration'];
            $nomGeneration = trim($_POST['nomGeneration']);
            
            if (!empty($nomGeneration) && $idModele > 0) {
                // Création et sauvegarde de la nouvelle génération
                $generation = new generation();
                $generation->setNom_generation($nomGeneration);
                $generation->setId_modele($idModele);
                $generation->save();
                
                // Redirection vers la même page
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }
        } catch (Exception $e) {
            // En cas d'erreur, on continue vers l'affichage normal de la page
        }
    }
    // Traitement de la suppression d'une génération
    elseif ($_POST['action'] === 'deleteGeneration' && isset($_POST['id_generation'])) {
        // Vérification des permissions pour la suppression
        if (!$canDelete) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
        
        try {
            $id_generation = (int)$_POST['id_generation'];
            $generation = new generation();
            $generation->setId_generation($id_generation);
            $generation->delete();
            
            // Redirection vers la même page
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        } catch (Exception $e) {
            // En cas d'erreur, on continue vers l'affichage normal de la page
        }
    }
}

// Récupération des marques depuis la base de données
$listeMarques = marques::getAllSorted();

// Récupération des modèles pour chaque marque
$modelesParMarque = [];
$generationsParModele = [];
foreach ($listeMarques as $marque) {
    $modeles = modeles::getByMarque($marque->id_marque);
    $modelesParMarque[$marque->id_marque] = $modeles;
    
    // Récupération des générations pour chaque modèle
    foreach ($modeles as $modele) {
        $generationsParModele[$modele->id_modele] = $modele->getGenerations();
    }
}

// Envoi des données à la vue
tpl::assign('marques', $listeMarques);
tpl::assign('modelesParMarque', $modelesParMarque);
tpl::assign('generationsParModele', $generationsParModele);
tpl::assign('canAdd', $canAdd);
tpl::assign('canDelete', $canDelete);
tpl::view("config");

?>
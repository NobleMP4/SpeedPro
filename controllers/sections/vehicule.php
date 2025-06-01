<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\core\session;
use monApp\models\vehicules;
use monApp\models\modeles;
use monApp\models\marques;
use monApp\models\generation;
use monApp\models\carburant;
use monApp\models\clients;

// Récupération de l'utilisateur connecté
$userSession = session::get('user');
if (!$userSession) {
    header('Location: ?p=login');
    exit;
}

// Définition des permissions selon le rôle
$canEdit = in_array($userSession['role'], [1, 2, 3]); // Admin, Gérant et Vendeur peuvent modifier

// Vérifier si c'est une requête AJAX
if (isset($_GET['api'])) {
    ob_clean(); // Nettoyer le buffer de sortie
    header('Content-Type: application/json');
    
    switch ($_GET['api']) {
        case 'searchClients':
            // Vérification des permissions pour la recherche de clients (nécessaire pour la vente)
            if (!$canEdit) {
                echo json_encode([
                    'error' => 'Vous n\'avez pas les permissions nécessaires pour effectuer cette action.',
                    'success' => false
                ]);
                exit;
            }
            try {
                $search = $_GET['q'] ?? '';
                
                if (empty($search)) {
                    echo json_encode(['clients' => [], 'success' => true]);
                    exit;
                }

                $sql = "SELECT * FROM clients 
                        WHERE LOWER(nom_client_1) LIKE LOWER(:search)
                           OR LOWER(prenom_client_1) LIKE LOWER(:search)
                           OR LOWER(email_client_1) LIKE LOWER(:search)
                           OR telephone_client_1 LIKE :search
                        ORDER BY 
                            CASE 
                                WHEN LOWER(nom_client_1) LIKE LOWER(:exact) THEN 1
                                WHEN LOWER(prenom_client_1) LIKE LOWER(:exact) THEN 2
                                ELSE 3
                            END,
                            nom_client_1, prenom_client_1
                        LIMIT 10";

                $searchTerm = '%' . $search . '%';
                $exactTerm = $search . '%';
                
                $stmt = app::$db->getPDO()->prepare($sql);
                $stmt->execute([
                    ':search' => $searchTerm,
                    ':exact' => $exactTerm
                ]);
                
                $results = $stmt->fetchAll(\PDO::FETCH_CLASS, "monApp\\models\\clients");
                
                $clientsData = array_map(function($client) {
                    return [
                        'id_client' => $client->getId_client(),
                        'nom_client_1' => $client->getNom_client_1(),
                        'prenom_client_1' => $client->getPrenom_client_1(),
                        'email_client_1' => $client->getEmail_client_1(),
                        'telephone_client_1' => $client->getTelephone_client_1()
                    ];
                }, $results);

                echo json_encode([
                    'clients' => $clientsData,
                    'success' => true
                ]);
                exit;
            } catch (\Exception $e) {
                echo json_encode([
                    'error' => $e->getMessage(),
                    'success' => false
                ]);
                exit;
            }
            break;
            
        case 'sellVehicle':
            try {
                // Vérification des permissions pour la vente
                if (!$canEdit) {
                    throw new \Exception('Vous n\'avez pas les permissions nécessaires pour vendre un véhicule.');
                }
                $id_vehicule = $_POST['id_vehicule'] ?? null;
                $id_client = $_POST['id_client'] ?? null;

                if (!$id_vehicule || !$id_client) {
                    throw new \Exception('Paramètres manquants');
                }

                $sql = "UPDATE vehicules 
                        SET statut_vehicule = 'Vendu', 
                            id_client = :id_client 
                        WHERE id_vehicule = :id_vehicule";

                $stmt = app::$db->getPDO()->prepare($sql);
                $success = $stmt->execute([
                    ':id_vehicule' => $id_vehicule,
                    ':id_client' => $id_client
                ]);

                echo json_encode(['success' => $success]);
                exit;
            } catch (\Exception $e) {
                echo json_encode([
                    'error' => $e->getMessage(),
                    'success' => false
                ]);
                exit;
            }
            break;

        case 'updateVehicle':
            try {
                // Nettoyage du buffer de sortie
                ob_clean();
                
                // Vérification des permissions pour la modification
                if (!$canEdit) {
                    throw new \Exception('Vous n\'avez pas les permissions nécessaires pour modifier un véhicule.');
                }
                
                // Validation des données reçues
                $id_vehicule = $_POST['id_vehicule'] ?? null;
                if (!$id_vehicule) {
                    throw new \Exception('ID du véhicule manquant');
                }

                // Préparation des données à mettre à jour
                $updateData = [
                    'description' => $_POST['description'] ?? '',
                    'kilometrage' => intval($_POST['kilometrage'] ?? 0),
                    'puissance' => intval($_POST['puissance'] ?? 0),
                    'puissance_fiscale' => intval($_POST['puissance_fiscale'] ?? 0),
                    'immatriculation' => $_POST['immatriculation'] ?? '',
                    'id_vehicule' => $id_vehicule
                ];

                // Mise à jour des informations du véhicule
                $sql = "UPDATE vehicules SET 
                        description_vehicule = :description,
                        kilometrage_vehicule = :kilometrage,
                        puissance_vehicule = :puissance,
                        puissance_fiscale = :puissance_fiscale,
                        immatriculation_vehicule = :immatriculation
                        WHERE id_vehicule = :id_vehicule";

                $stmt = app::$db->getPDO()->prepare($sql);
                $success = $stmt->execute($updateData);

                if (!$success) {
                    throw new \Exception('Erreur lors de la mise à jour du véhicule');
                }

                // Gestion des options
                if (isset($_POST['options'])) {
                    // Suppression des anciennes options
                    $sql = "DELETE FROM vehicules_options WHERE id_vehicule = :id_vehicule";
                    $stmt = app::$db->getPDO()->prepare($sql);
                    $stmt->execute([':id_vehicule' => $id_vehicule]);

                    // Ajout des nouvelles options
                    $options = json_decode($_POST['options']);
                    if (is_array($options)) {
                        $sql = "INSERT INTO vehicules_options (id_vehicule, id_option) VALUES (:id_vehicule, :id_option)";
                        $stmt = app::$db->getPDO()->prepare($sql);

                        foreach ($options as $id_option) {
                            $stmt->execute([
                                ':id_vehicule' => $id_vehicule,
                                ':id_option' => $id_option
                            ]);
                        }
                    }
                }

                echo json_encode([
                    'success' => true,
                    'message' => 'Véhicule mis à jour avec succès'
                ]);
                exit;

            } catch (\Exception $e) {
                echo json_encode([
                    'success' => false,
                    'error' => $e->getMessage()
                ]);
                exit;
            }
            break;
    }
    exit;
}

// Code normal de la page
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: ?p=vehicules');
    exit;
}

$id_vehicule = intval($_GET['id']);

try {
    // Récupération des détails du véhicule
    $sql = "SELECT v.*, 
                   m.id_modele, m.nom_modele, 
                   ma.id_marque, ma.nom_marque,
                   g.id_generation, g.nom_generation,
                   c.id_carburant, c.nom_carburant,
                   cl.id_client, cl.nom_client_1, cl.prenom_client_1
            FROM vehicules v
            LEFT JOIN modeles m ON v.id_modele = m.id_modele
            LEFT JOIN marques ma ON m.id_marque = ma.id_marque
            LEFT JOIN generation g ON v.id_generation = g.id_generation
            LEFT JOIN carburant c ON v.id_carburant = c.id_carburant
            LEFT JOIN clients cl ON v.id_client = cl.id_client
            WHERE v.id_vehicule = :id
            LIMIT 1";

    // Récupérer d'abord les données brutes
    $stmt = app::$db->getPDO()->prepare($sql);
    $stmt->execute(['id' => $id_vehicule]);
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (!$result) {
        throw new \Exception("Véhicule non trouvé");
    }

    // Création des objets
    $vehicule = new vehicules();
    $vehicule->setId_vehicule($result['id_vehicule']);
    $vehicule->setAnnee_vehicule($result['annee_vehicule']);
    $vehicule->setPrix_vehicule($result['prix_vehicule']);
    $vehicule->setDescription_vehicule($result['description_vehicule']);
    $vehicule->setKilometrage_vehicule($result['kilometrage_vehicule']);
    $vehicule->setBoite_vitesse_vehicule($result['boite_vitesse_vehicule'] ?: 'Manuelle'); // Valeur par défaut
    $vehicule->setPuissance_vehicule($result['puissance_vehicule']);
    $vehicule->setPuissance_fiscale($result['puissance_fiscale']);
    $vehicule->setImmatriculation_vehicule($result['immatriculation_vehicule']);
    $vehicule->setStatut_vehicule($result['statut_vehicule'] ?: 'Disponible'); // Valeur par défaut
    
    // Ajout des informations du client si le véhicule est vendu
    if (!empty($result['id_client'])) {
        $vehicule->setId_client($result['id_client']);
        $vehicule->setNom_client($result['nom_client_1']);
        $vehicule->setPrenom_client($result['prenom_client_1']);
    }

    // Création et association du modèle
    if (!empty($result['id_modele'])) {
        $modele = new modeles();
        $modele->setId_modele($result['id_modele']);
        $modele->setNom_modele($result['nom_modele']);
        
        // Création et association de la marque
        if (!empty($result['id_marque'])) {
            $marque = new marques();
            $marque->setId_marque($result['id_marque']);
            $marque->setNom_marque($result['nom_marque']);
            $modele->setMarque($marque);
        }
        
        $vehicule->setModele($modele);
    }

    // Création et association de la génération
    if (!empty($result['id_generation'])) {
        $gen = new generation();
        $gen->setId_generation($result['id_generation']);
        $gen->setNom_generation($result['nom_generation']);
        $vehicule->setGeneration($gen);
    }

    // Création et association du carburant
    if (!empty($result['id_carburant'])) {
        $carb = new carburant();
        $carb->setId_carburant($result['id_carburant']);
        $carb->setNom_carburant($result['nom_carburant']);
        $vehicule->setCarburant($carb);
    }

    // Récupération des options du véhicule
    $sql = "SELECT o.* 
            FROM options o
            INNER JOIN vehicules_options vo ON o.id_option = vo.id_option
            WHERE vo.id_vehicule = :id";

    $stmt = app::$db->getPDO()->prepare($sql);
    $stmt->execute(['id' => $id_vehicule]);
    $vehicule_options = $stmt->fetchAll(\PDO::FETCH_CLASS, "monApp\\models\\options");

    // Récupération de toutes les options disponibles
    $sql = "SELECT * FROM options ORDER BY nom_option";
    $stmt = app::$db->getPDO()->prepare($sql);
    $stmt->execute();
    $all_options = $stmt->fetchAll(\PDO::FETCH_CLASS, "monApp\\models\\options");

    // Création d'un tableau des IDs des options du véhicule pour faciliter la vérification
    $vehicule_options_ids = array_map(function($opt) {
        return $opt->getId_option();
    }, $vehicule_options);

    // Passage des données à la vue
    tpl::assign('vehicule', $vehicule);
    tpl::assign('vehicule_options', $vehicule_options);
    tpl::assign('all_options', $all_options);
    tpl::assign('vehicule_options_ids', $vehicule_options_ids);
    tpl::assign('canEdit', $canEdit);

    tpl::view("vehicule");

} catch (\Exception $e) {
    // En cas d'erreur, redirection vers la liste des véhicules
    error_log("Erreur dans vehicule.php : " . $e->getMessage());
    header('Location: ?p=vehicules');
    exit;
}

?>
<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class modeles extends table {
    protected $id_modele;
    protected $nom_modele;
    protected $id_marque;
    protected $nom_marque;
    
    public static $suffix = "";
    public static $key = "id_modele";
    
    public function getId_modele() {
        return $this->id_modele;
    }
    
    public function setId_modele($id_modele) {
        $this->id_modele = $id_modele;
    }
    
    public function getNom_modele() {
        return $this->nom_modele;
    }
    
    public function setNom_modele($nom_modele) {
        $this->nom_modele = $nom_modele;
    }
    
    public function getId_marque() {
        return $this->id_marque;
    }
    
    public function setId_marque($id_marque) {
        $this->id_marque = $id_marque;
    }

    public function getNom_marque() {
        return $this->nom_marque;
    }

    public function setNom_marque($nom_marque) {
        $this->nom_marque = $nom_marque;
    }
    
    public static function getTable() {
        return 'modeles';
    }

    public function save() {
        $data = [
            'nom_modele' => $this->nom_modele,
            'id_marque' => $this->id_marque
        ];

        if($this->id_modele) {
            // Update
            $sql = "UPDATE modeles SET ";
            foreach($data as $key => $value) {
                $sql .= "$key = :$key, ";
            }
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE id_modele = :id_modele";
            $data['id_modele'] = $this->id_modele;
            
            app::$db->prepare($sql, $data, get_class($this));
            return $this->id_modele;
        } else {
            // Insert
            $columns = implode(',', array_keys($data));
            $values = ':' . implode(',:', array_keys($data));
            $sql = "INSERT INTO modeles ($columns) VALUES ($values)";
            
            app::$db->prepare($sql, $data, get_class($this));
            return app::$db->lastInsertId();
        }
    }

    public static function tous() {
        return app::$db->query("SELECT m.*, ma.nom_marque 
                              FROM modeles m 
                              JOIN marques ma ON m.id_marque = ma.id_marque 
                              ORDER BY ma.nom_marque, m.nom_modele", 
                              get_called_class());
    }

    // Relations
    public function getMarque() {
        return marques::byId($this->id_marque);
    }

    public function setMarque($marque) {
        if ($marque instanceof marques) {
            $this->id_marque = $marque->getId_marque();
            $this->nom_marque = $marque->getNom_marque();
        }
    }

    public function getVehicules() {
        return vehicules::all(['conditions' => ['id_modele' => $this->id_modele]]);
    }

    // Nouvelle méthode pour récupérer les générations d'un modèle
    public function getGenerations() {
        if (!$this->id_modele) {
            return [];
        }
        
        $sql = "SELECT g.* 
                FROM generation g 
                INNER JOIN modeles_generations mg 
                ON g.id_generation = mg.id_generation 
                WHERE mg.id_modele = :id_modele 
                ORDER BY g.nom_generation";
                
        return app::$db->prepare($sql, 
            ['id_modele' => $this->id_modele], 
            "monApp\\models\\generation"
        );
    }

    // Méthode pour ajouter une génération à un modèle
    public function addGeneration($id_generation) {
        if (!$this->id_modele || !$id_generation) {
            error_log("ID modèle ou ID génération manquant");
            return false;
        }
        
        try {
            // Connexion directe à la base de données
            $db = app::getDb();
            
            // Préparer et exécuter la requête d'insertion
            $sql = "INSERT INTO modeles_generations (id_modele, id_generation) VALUES (:id_modele, :id_generation)";
            $stmt = $db->prepare($sql);
            
            // Exécuter avec les paramètres
            $result = $stmt->execute([
                ':id_modele' => $this->id_modele,
                ':id_generation' => $id_generation
            ]);
            
            if ($result) {
                error_log("Relation ajoutée avec succès - Modèle: " . $this->id_modele . ", Génération: " . $id_generation);
                return true;
            } else {
                error_log("Échec de l'insertion - Erreur: " . print_r($stmt->errorInfo(), true));
                return false;
            }
        } catch (\Exception $e) {
            error_log("Erreur lors de l'ajout de la relation modèle-génération : " . $e->getMessage());
            error_log("ID modèle : " . $this->id_modele . ", ID génération : " . $id_generation);
            return false;
        }
    }

    // Dans la classe modeles, ajoutez cette méthode statique
    public static function getByMarque($id_marque) {
        $sql = "SELECT id_modele, nom_modele 
                FROM modeles 
                WHERE id_marque = :id_marque 
                ORDER BY nom_modele";
                
        return app::$db->prepare($sql, 
            ['id_marque' => $id_marque], 
            get_called_class()
        );
    }

    public function getGeneration_modele() {
        return $this->generation_modele;
    }
} 
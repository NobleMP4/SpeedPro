<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class generation extends table {
    protected $id_generation;
    protected $nom_generation;
    protected $nom_modele;
    protected $nom_marque;
    protected $modele_id;
    protected $marque_id;
    
    public static $suffix = "";
    public static $key = "id_generation";
    
    public function getId_generation() {
        return $this->id_generation;
    }
    
    public function setId_generation($id_generation) {
        $this->id_generation = $id_generation;
    }
    
    public function getNom_generation() {
        return $this->nom_generation;
    }
    
    public function setNom_generation($nom_generation) {
        $this->nom_generation = $nom_generation;
    }

    public function getId_modele() {
        return $this->modele_id;
    }

    public function setId_modele($id_modele) {
        $this->modele_id = $id_modele;
    }

    public function getNom_modele() {
        return $this->nom_modele;
    }

    public function setNom_modele($nom_modele) {
        $this->nom_modele = $nom_modele;
    }

    public function getNom_marque() {
        return $this->nom_marque;
    }

    public function setNom_marque($nom_marque) {
        $this->nom_marque = $nom_marque;
    }

    public function getId_marque() {
        return $this->marque_id;
    }

    public function setId_marque($id_marque) {
        $this->marque_id = $id_marque;
        return $this;
    }
    
    public static function getTable() {
        return 'generation';
    }

    public function save() {
        $data = [
            'nom_generation' => $this->nom_generation
        ];

        try {
            app::$db->beginTransaction();

            if($this->id_generation) {
                // Update
                $sql = "UPDATE generation SET ";
                foreach($data as $key => $value) {
                    $sql .= "$key = :$key, ";
                }
                $sql = rtrim($sql, ', ');
                $sql .= " WHERE id_generation = :id_generation";
                $data['id_generation'] = $this->id_generation;
                
                app::$db->prepare($sql, $data, get_class($this));
                $id_generation = $this->id_generation;
            } else {
                // Insert
                $columns = implode(',', array_keys($data));
                $values = ':' . implode(',:', array_keys($data));
                $sql = "INSERT INTO generation ($columns) VALUES ($values)";
                
                app::$db->prepare($sql, $data, get_class($this));
                $id_generation = app::$db->lastInsertId();
            }

            // Si un modèle est spécifié, créer la relation dans modeles_generations
            if ($this->modele_id) {
                $sql = "INSERT INTO modeles_generations (id_modele, id_generation) VALUES (:id_modele, :id_generation)";
                app::$db->prepare($sql, [
                    'id_modele' => $this->modele_id,
                    'id_generation' => $id_generation
                ], get_class($this));
            }

            app::$db->commit();
            return $id_generation;
        } catch (\Exception $e) {
            app::$db->rollBack();
            throw $e;
        }
    }

    public static function tous() {
        return app::$db->query("SELECT g.*, m.nom_modele, ma.nom_marque 
                              FROM generation g 
                              LEFT JOIN modeles_generations mg ON g.id_generation = mg.id_generation 
                              LEFT JOIN modeles m ON mg.id_modele = m.id_modele 
                              LEFT JOIN marques ma ON m.id_marque = ma.id_marque 
                              ORDER BY ma.nom_marque, m.nom_modele, g.nom_generation", 
                              get_called_class());
    }

    // Relations
    public function getModeles() {
        $sql = "SELECT m.* 
                FROM modeles m 
                INNER JOIN modeles_generations mg ON m.id_modele = mg.id_modele 
                WHERE mg.id_generation = :id_generation";
                
        return app::$db->prepare($sql, 
            ['id_generation' => $this->id_generation], 
            "monApp\\models\\modeles"
        );
    }

    // Méthode pour récupérer les générations d'un modèle spécifique
    public static function getGenerationsParModele($id_modele) {
        $sql = "SELECT g.* FROM generation g 
                INNER JOIN modeles_generations mg ON g.id_generation = mg.id_generation 
                WHERE mg.id_modele = ?";
        return app::$db->query($sql, "monApp\\models\\generation", [$id_modele]);
    }

    public function delete() {
        if (!$this->id_generation) {
            return false;
        }

        try {
            app::$db->beginTransaction();

            // Suppression des relations dans modeles_generations
            $sql = "DELETE FROM modeles_generations WHERE id_generation = :id_generation";
            app::$db->prepare($sql, ['id_generation' => $this->id_generation]);

            // Suppression de la génération
            $sql = "DELETE FROM generation WHERE id_generation = :id_generation";
            app::$db->prepare($sql, ['id_generation' => $this->id_generation]);

            app::$db->commit();
            return true;
        } catch (\Exception $e) {
            app::$db->rollBack();
            throw $e;
        }
    }
} 
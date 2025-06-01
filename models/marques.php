<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class marques extends table {
    protected $id_marque;
    protected $nom_marque;
    
    public static $suffix = "";
    public static $key = "id_marque";
    
    // Getters et Setters
    public function getId_marque() {
        return $this->id_marque;
    }
    
    public function setId_marque($id_marque) {
        $this->id_marque = $id_marque;
        return $this;
    }
    
    public function getNom_marque() {
        return $this->nom_marque;
    }
    
    public function setNom_marque($nom_marque) {
        $this->nom_marque = $nom_marque;
        return $this;
    }
    
    public static function getTable() {
        return 'marques';
    }

    public function save() {
        $data = [
            'nom_marque' => $this->nom_marque
        ];

        if($this->id_marque) {
            // Update
            $sql = "UPDATE " . self::getTable() . " SET ";
            foreach($data as $key => $value) {
                $sql .= "$key = :$key, ";
            }
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE " . self::$key . " = :" . self::$key;
            $data[self::$key] = $this->id_marque;
            
            return app::$db->prepare($sql, $data, get_class($this));
        } else {
            // Insert
            $columns = implode(',', array_keys($data));
            $values = ':' . implode(',:', array_keys($data));
            $sql = "INSERT INTO " . self::getTable() . " ($columns) VALUES ($values)";
            
            app::$db->prepare($sql, $data, get_class($this));
            return app::$db->lastInsertId();
        }
    }

    public function delete() {
        if (!$this->id_marque) {
            return false;
        }
        
        $sql = "DELETE FROM " . self::getTable() . " WHERE " . self::$key . " = :" . self::$key;
        return app::$db->prepare($sql, [self::$key => $this->id_marque], get_class($this));
    }

    // Relations
    public function getModeles() {
        $sql = "SELECT * FROM modeles WHERE id_marque = :id_marque";
        return app::$db->prepare($sql, ['id_marque' => $this->id_marque], get_class($this));
    }

    public function getVehicules() {
        $sql = "SELECT * FROM vehicules v 
                INNER JOIN modeles m ON v.id_modele = m.id_modele 
                WHERE m.id_marque = :id_marque";
        return app::$db->prepare($sql, ['id_marque' => $this->id_marque], get_class($this));
    }

    // Méthodes utilitaires
    public static function findByName($nom) {
        $sql = "SELECT * FROM " . self::getTable() . " WHERE nom_marque = :nom LIMIT 1";
        $result = app::$db->prepare($sql, ['nom' => $nom], get_called_class());
        return !empty($result) ? $result[0] : null;
    }

    public static function getAllSorted() {
        $sql = "SELECT * FROM " . self::getTable() . " ORDER BY nom_marque ASC";
        return app::$db->prepare($sql, [], get_called_class());
    }

    public function countVehicules() {
        $sql = "SELECT COUNT(*) as count FROM vehicules v 
                INNER JOIN modeles m ON v.id_modele = m.id_modele 
                WHERE m.id_marque = :id_marque";
        $result = app::$db->prepare($sql, ['id_marque' => $this->id_marque], get_class($this));
        return isset($result[0]->count) ? $result[0]->count : 0;
    }

    public function toArray() {
        return [
            'id_marque' => $this->id_marque,
            'nom_marque' => $this->nom_marque
        ];
    }
} 
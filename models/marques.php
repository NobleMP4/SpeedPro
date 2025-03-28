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
    
    public function getNom_marque() {
        return $this->nom_marque;
    }
    
    public function setNom_marque($nom_marque) {
        $this->nom_marque = $nom_marque;
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
            $sql = "UPDATE marques SET ";
            foreach($data as $key => $value) {
                $sql .= "$key = :$key, ";
            }
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE id_marque = :id_marque";
            $data['id_marque'] = $this->id_marque;
            
            app::$db->prepare($sql, $data, get_class($this));
            return $this->id_marque;
        } else {
            // Insert
            $columns = implode(',', array_keys($data));
            $values = ':' . implode(',:', array_keys($data));
            $sql = "INSERT INTO marques ($columns) VALUES ($values)";
            
            app::$db->prepare($sql, $data, get_class($this));
            return app::$db->lastInsertId();
        }
    }

    // Relations
    public function getModeles() {
        return modeles::all(['conditions' => ['id_marque' => $this->id_marque]]);
    }

    public function getVehicules() {
        return vehicules::all(['conditions' => ['id_marque' => $this->id_marque]]);
    }
} 
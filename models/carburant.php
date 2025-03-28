<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class carburant extends table {
    protected $id_carburant;
    protected $nom_carburant;
    
    public static $suffix = "";
    public static $key = "id_carburant";
    
    public function getId_carburant() {
        return $this->id_carburant;
    }
    
    public function getNom_carburant() {
        return $this->nom_carburant;
    }
    
    public function setNom_carburant($nom_carburant) {
        $this->nom_carburant = $nom_carburant;
    }
    
    public static function getTable() {
        return 'carburant';
    }

    public function save() {
        $data = [
            'nom_carburant' => $this->nom_carburant
        ];

        if($this->id_carburant) {
            // Update
            $sql = "UPDATE carburant SET ";
            foreach($data as $key => $value) {
                $sql .= "$key = :$key, ";
            }
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE id_carburant = :id_carburant";
            $data['id_carburant'] = $this->id_carburant;
            
            app::$db->prepare($sql, $data, get_class($this));
            return $this->id_carburant;
        } else {
            // Insert
            $columns = implode(',', array_keys($data));
            $values = ':' . implode(',:', array_keys($data));
            $sql = "INSERT INTO carburant ($columns) VALUES ($values)";
            
            app::$db->prepare($sql, $data, get_class($this));
            return app::$db->lastInsertId();
        }
    }

    public static function tous() {
        return app::$db->query("SELECT * FROM carburant ORDER BY nom_carburant", get_called_class());
    }

    // Relations
    public function getVehicules() {
        return vehicules::all(['conditions' => ['id_carburant' => $this->id_carburant]]);
    }
} 
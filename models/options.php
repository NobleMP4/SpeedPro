<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class options extends table {
    protected $id_option;
    protected $nom_option;
    
    public static $suffix = "";
    public static $key = "id_option";
    
    // Getters et Setters
    public function getId_option() {
        return $this->id_option;
    }
    
    public function getNom_option() {
        return $this->nom_option;
    }
    
    public function setNom_option($nom_option) {
        $this->nom_option = $nom_option;
    }

    // Relations
    public function getVehicules() {
        $sql = "SELECT v.* FROM vehicules v 
                JOIN vehicules_options vo ON v.id_vehicule = vo.id_vehicule 
                WHERE vo.id_option = ?";
        return $this->query($sql, [$this->id_option]);
    }

    // Définir le nom de la table
    public static function getTable() {
        return 'options';
    }

    // Méthode pour sauvegarder une option
    public function save() {
        $data = [
            'nom_option' => $this->nom_option
        ];

        if($this->id_option) {
            // Update
            $sql = "UPDATE options SET ";
            foreach($data as $key => $value) {
                $sql .= "$key = :$key, ";
            }
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE id_option = :id_option";
            $data['id_option'] = $this->id_option;
            
            app::$db->prepare($sql, $data, get_class($this));
            return $this->id_option;
        } else {
            // Insert
            $columns = implode(',', array_keys($data));
            $values = ':' . implode(',:', array_keys($data));
            $sql = "INSERT INTO options ($columns) VALUES ($values)";
            
            app::$db->prepare($sql, $data, get_class($this));
            return app::$db->lastInsertId();
        }
    }

    // Méthode statique pour récupérer toutes les options
    public static function tous() {
        $sql = "SELECT * FROM options ORDER BY nom_option";
        return app::$db->query($sql, "monApp\\models\\options");
    }
} 
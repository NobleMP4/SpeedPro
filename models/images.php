<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class images extends table {
    protected static $key = 'id_image';
    
    protected $id_image;
    protected $nom_image;
    protected $alt_image;
    protected $url_image;
    protected $slug_image;
    protected $date_creation_image;

    // Getters et Setters
    public function getId_image() { return $this->id_image; }
    public function setId_image($value) { $this->id_image = $value; return $this; }

    public function getNom_image() { return $this->nom_image; }
    public function setNom_image($value) { $this->nom_image = $value; return $this; }

    public function getAlt_image() { return $this->alt_image; }
    public function setAlt_image($value) { $this->alt_image = $value; return $this; }

    public function getUrl_image() { return $this->url_image; }
    public function setUrl_image($value) { $this->url_image = $value; return $this; }

    public function getSlug_image() { return $this->slug_image; }
    public function setSlug_image($value) { $this->slug_image = $value; return $this; }

    public function getDate_creation_image() { return $this->date_creation_image; }
    public function setDate_creation_image($value) { $this->date_creation_image = $value; return $this; }

    // Relations
    public function getVehicules() {
        $sql = "SELECT v.* FROM vehicules v 
                JOIN images_vehicules iv ON v.id_vehicule = iv.id_vehicule 
                WHERE iv.id_image = ?";
        return $this->query($sql, [$this->id_image]);
    }

    public function save() {
        if (!isset($this->id_image)) {
            $sql = "INSERT INTO images (
                nom_image,
                alt_image,
                url_image,
                slug_image
            ) VALUES (?, ?, ?, ?)";
            
            $params = [
                $this->nom_image,
                $this->alt_image,
                $this->url_image,
                $this->slug_image
            ];
            
            if (app::$db->exec($sql, $params)) {
                $this->id_image = app::$db->lastInsertId();
                return $this->id_image;
            }
        }
        return false;
    }
} 
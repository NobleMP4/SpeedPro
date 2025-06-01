<?php
class images_vehicules {
    private $id_vehicule;
    private $id_image;

    public function __construct($id_vehicule = null, $id_image = null) {
        $this->id_vehicule = $id_vehicule;
        $this->id_image = $id_image;
    }

    // Getters
    public function getIdVehicule() {
        return $this->id_vehicule;
    }

    public function getIdImage() {
        return $this->id_image;
    }

    // Setters
    public function setIdVehicule($id_vehicule) {
        $this->id_vehicule = $id_vehicule;
    }

    public function setIdImage($id_image) {
        $this->id_image = $id_image;
    }
} 
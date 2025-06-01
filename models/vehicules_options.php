<?php
class vehicules_options {
    private $id_vehicule;
    private $id_option;

    public function __construct($id_vehicule = null, $id_option = null) {
        $this->id_vehicule = $id_vehicule;
        $this->id_option = $id_option;
    }

    // Getters
    public function getIdVehicule() {
        return $this->id_vehicule;
    }

    public function getIdOption() {
        return $this->id_option;
    }

    // Setters
    public function setIdVehicule($id_vehicule) {
        $this->id_vehicule = $id_vehicule;
    }

    public function setIdOption($id_option) {
        $this->id_option = $id_option;
    }
} 
<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class vehicules extends table {
    protected static $key = 'id_vehicule';
    protected static $suffix = '_vehicule';
    
    protected $id_vehicule;
    protected $annee_vehicule;
    protected $prix_vehicule;
    protected $description_vehicule;
    protected $kilometrage_vehicule;
    protected $boite_vitesse_vehicule;
    protected $puissance_vehicule;
    protected $puissance_fiscale;
    protected $immatriculation_vehicule;
    protected $statut_vehicule;
    protected $id_modele;
    protected $id_carburant;
    protected $id_client;
    protected $id_generation;
    protected $generation;
    protected $nom_marque;
    protected $nom_modele;
    protected $nom_generation;
    protected $nom_carburant;
    protected $nom_client_1;
    protected $prenom_client_1;
    protected $url_image;
    protected $alt_image;

    // Getters et Setters
    public function getId_vehicule() { return $this->id_vehicule; }
    public function setId_vehicule($value) { $this->id_vehicule = $value; return $this; }

    public function getAnnee_vehicule() { return $this->annee_vehicule; }
    public function setAnnee_vehicule($value) { $this->annee_vehicule = $value; return $this; }

    public function getPrix_vehicule() { return $this->prix_vehicule; }
    public function setPrix_vehicule($value) { $this->prix_vehicule = $value; return $this; }

    public function getDescription_vehicule() { return $this->description_vehicule; }
    public function setDescription_vehicule($value) { $this->description_vehicule = $value; return $this; }

    public function getKilometrage_vehicule() { return $this->kilometrage_vehicule; }
    public function setKilometrage_vehicule($value) { $this->kilometrage_vehicule = $value; return $this; }

    public function getBoite_vitesse_vehicule() { return $this->boite_vitesse_vehicule; }
    public function setBoite_vitesse_vehicule($value) { $this->boite_vitesse_vehicule = $value; return $this; }

    public function getPuissance_vehicule() { return $this->puissance_vehicule; }
    public function setPuissance_vehicule($value) { $this->puissance_vehicule = $value; return $this; }

    public function getPuissance_fiscale() { return $this->puissance_fiscale; }
    public function setPuissance_fiscale($value) { $this->puissance_fiscale = $value; return $this; }

    public function getImmatriculation_vehicule() { return $this->immatriculation_vehicule; }
    public function setImmatriculation_vehicule($value) { $this->immatriculation_vehicule = $value; return $this; }

    public function getStatut_vehicule() { return $this->statut_vehicule; }
    public function setStatut_vehicule($value) { $this->statut_vehicule = $value; return $this; }

    public function getId_modele() { return $this->id_modele; }
    public function setId_modele($value) { 
        $this->id_modele = $value; 
        return $this; 
    }

    public function getId_carburant() { return $this->id_carburant; }
    public function setId_carburant($value) { 
        $this->id_carburant = $value; 
        return $this; 
    }

    public function getId_client_vehicule() { return $this->id_client; }
    public function setId_client_vehicule($value) { $this->id_client = $value; return $this; }

    public function getId_client() { return $this->id_client; }
    public function setId_client($value) { 
        $this->id_client = $value; 
        return $this; 
    }

    public function getId_generation() { return $this->id_generation; }
    public function setId_generation($value) { 
        $this->id_generation = $value; 
        return $this; 
    }

    public function getGeneration() {
        if (!$this->generation && $this->id_generation) {
            // Charger la génération spécifique du véhicule
            $sql = "SELECT * FROM generation WHERE id_generation = :id_generation";
            $generations = app::$db->prepare($sql, ['id_generation' => $this->id_generation], "monApp\\models\\generation");
            
            if (!empty($generations)) {
                $this->generation = $generations[0];
            }
        }
        return $this->generation;
    }

    public function setGeneration($generation) {
        $this->generation = $generation;
        if ($generation) {
            $this->id_generation = $generation->getId_generation();
        }
        return $this;
    }

    // Relations
    public function getMarque() {
        $modele = $this->getModele();
        return $modele ? $modele->getMarque() : null;
    }

    public function getModele() {
        return modeles::byId($this->id_modele);
    }

    public function getCarburant() {
        return carburant::byId($this->id_carburant);
    }

    public function getClient() {
        return $this->id_client ? clients::byId($this->id_client) : null;
    }

    public function getImages() {
        $sql = "SELECT DISTINCT i.* FROM images i 
                INNER JOIN images_vehicules iv ON i.id_image = iv.id_image 
                WHERE iv.id_vehicule = ".$this->id_vehicule;
                
        return app::$db->query($sql, "monApp\\models\\images");
    }

    public function getOptions() {
        $sql = "SELECT DISTINCT o.* FROM options o 
                INNER JOIN vehicules_options vo ON o.id_option = vo.id_option 
                WHERE vo.id_vehicule = ".$this->id_vehicule;
                
        return app::$db->query($sql, "monApp\\models\\options");
    }

    public function getGenerations() {
        if (!$this->id_modele) {
            return [];
        }
        
        $sql = "SELECT DISTINCT g.* FROM generation g 
                INNER JOIN modeles_generations mg ON g.id_generation = mg.id_generation 
                WHERE mg.id_modele = :id_modele";
                
        return app::$db->prepare($sql, ['id_modele' => $this->id_modele], "monApp\\models\\generation");
    }

    public function save() {
        if (!isset($this->id_vehicule)) {
            $sql = "INSERT INTO vehicules (
                annee_vehicule, 
                prix_vehicule, 
                description_vehicule, 
                kilometrage_vehicule,
                boite_vitesse_vehicule,
                puissance_vehicule,
                puissance_fiscale,
                immatriculation_vehicule,
                statut_vehicule,
                id_modele,
                id_carburant,
                id_generation
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $params = [
                $this->annee_vehicule,
                $this->prix_vehicule,
                $this->description_vehicule,
                $this->kilometrage_vehicule,
                $this->boite_vitesse_vehicule,
                $this->puissance_vehicule,
                $this->puissance_fiscale,
                $this->immatriculation_vehicule,
                $this->statut_vehicule,
                $this->id_modele,
                $this->id_carburant,
                $this->id_generation
            ];
            
            if (app::$db->exec($sql, $params)) {
                $this->id_vehicule = app::$db->lastInsertId();
                return $this->id_vehicule;
            }
        }
        return false;
    }

    // Getters pour les nouvelles propriétés
    public function getNom_marque() {
        return $this->nom_marque;
    }

    public function getNom_modele() {
        return $this->nom_modele;
    }

    public function getNom_generation() {
        return $this->nom_generation;
    }

    public function getNom_carburant() {
        return $this->nom_carburant;
    }

    public function getNom_client_1() {
        return $this->nom_client_1;
    }

    public function getPrenom_client_1() {
        return $this->prenom_client_1;
    }

    public function getUrl_image() {
        return $this->url_image;
    }

    public function getAlt_image() {
        return $this->alt_image;
    }

    // Setters pour les nouvelles propriétés
    public function setNom_marque($nom_marque) {
        $this->nom_marque = $nom_marque;
    }

    public function setNom_modele($nom_modele) {
        $this->nom_modele = $nom_modele;
    }

    public function setNom_generation($nom_generation) {
        $this->nom_generation = $nom_generation;
    }

    public function setNom_carburant($nom_carburant) {
        $this->nom_carburant = $nom_carburant;
    }

    public function setNom_client_1($nom_client_1) {
        $this->nom_client_1 = $nom_client_1;
    }

    public function setPrenom_client_1($prenom_client_1) {
        $this->prenom_client_1 = $prenom_client_1;
    }

    public function setUrl_image($url_image) {
        $this->url_image = $url_image;
    }

    public function setAlt_image($alt_image) {
        $this->alt_image = $alt_image;
    }
} 
<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class clients extends table {
    protected static $key = 'id_client';
    
    protected $id_client;
    protected $nom_client_1;
    protected $prenom_client_1;
    protected $nom_client_2;
    protected $prenom_client_2;
    protected $email_client_1;
    protected $telephone_client_1;
    protected $email_client_2;
    protected $telephone_client_2;
    protected $rue;
    protected $code_postal;
    protected $ville;
    protected $pays;

    // Getters et Setters
    public function getId_client() { return $this->id_client; }
    public function setId_client($value) { $this->id_client = $value; return $this; }

    public function getNom_client_1() { return $this->nom_client_1; }
    public function setNom_client_1($value) { $this->nom_client_1 = $value; return $this; }

    public function getPrenom_client_1() { return $this->prenom_client_1; }
    public function setPrenom_client_1($value) { $this->prenom_client_1 = $value; return $this; }

    public function getNom_client_2() { return $this->nom_client_2; }
    public function setNom_client_2($value) { $this->nom_client_2 = $value; return $this; }

    public function getPrenom_client_2() { return $this->prenom_client_2; }
    public function setPrenom_client_2($value) { $this->prenom_client_2 = $value; return $this; }

    public function getEmail_client_1() { return $this->email_client_1; }
    public function setEmail_client_1($value) { $this->email_client_1 = $value; return $this; }

    public function getTelephone_client_1() { return $this->telephone_client_1; }
    public function setTelephone_client_1($value) { $this->telephone_client_1 = $value; return $this; }

    public function getEmail_client_2() { return $this->email_client_2; }
    public function setEmail_client_2($value) { $this->email_client_2 = $value; return $this; }

    public function getTelephone_client_2() { return $this->telephone_client_2; }
    public function setTelephone_client_2($value) { $this->telephone_client_2 = $value; return $this; }

    public function getRue() { return $this->rue; }
    public function setRue($value) { $this->rue = $value; return $this; }

    public function getCode_postal() { return $this->code_postal; }
    public function setCode_postal($value) { $this->code_postal = $value; return $this; }

    public function getVille() { return $this->ville; }
    public function setVille($value) { $this->ville = $value; return $this; }

    public function getPays() { return $this->pays; }
    public function setPays($value) { $this->pays = $value; return $this; }

    // Méthode pour obtenir l'adresse complète
    public function getAdresseComplete() {
        return $this->rue . ', ' . $this->code_postal . ' ' . $this->ville . ', ' . $this->pays;
    }

    public function save() {
        $data = [
            'nom_client_1' => $this->nom_client_1,
            'prenom_client_1' => $this->prenom_client_1,
            'nom_client_2' => $this->nom_client_2,
            'prenom_client_2' => $this->prenom_client_2,
            'email_client_1' => $this->email_client_1,
            'telephone_client_1' => $this->telephone_client_1,
            'email_client_2' => $this->email_client_2,
            'telephone_client_2' => $this->telephone_client_2,
            'rue' => $this->rue,
            'code_postal' => $this->code_postal,
            'ville' => $this->ville,
            'pays' => $this->pays
        ];

        // Log des données à sauvegarder
        error_log('Données à sauvegarder : ' . print_r($data, true));

        if($this->id_client) {
            // Update
            $sql = "UPDATE clients SET ";
            foreach($data as $key => $value) {
                $sql .= "$key = :$key, ";
            }
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE id_client = :id_client";
            $data['id_client'] = $this->id_client;
        } else {
            // Insert
            $columns = implode(',', array_keys($data));
            $values = ':' . implode(',:', array_keys($data));
            $sql = "INSERT INTO clients ($columns) VALUES ($values)";
        }

        // Log de la requête SQL
        error_log('Requête SQL : ' . $sql);
        error_log('Données pour la requête : ' . print_r($data, true));

        try {
            $result = app::$db->prepare($sql, $data, get_class($this));
            error_log('Résultat de la requête : ' . print_r($result, true));
            return $result;
        } catch (\Exception $e) {
            error_log('Erreur lors de la sauvegarde : ' . $e->getMessage());
            return false;
        }
    }

    // Relations
    public function getVehicules() {
        return vehicules::all(['conditions' => ['id_client' => $this->id_client]]);
    }
} 
<?php
namespace monApp\models;
use monApp\core\model;

class modeles_generations extends model {
    protected $id_modele;
    protected $id_generation;

    // Getters
    public function getId_modele() {
        return $this->id_modele;
    }

    public function getId_generation() {
        return $this->id_generation;
    }

    // Setters
    public function setId_modele($id) {
        $this->id_modele = $id;
    }

    public function setId_generation($id) {
        $this->id_generation = $id;
    }

    // Méthode pour associer une génération à un modèle
    public function associerGenerationModele($id_modele, $id_generation) {
        $this->id_modele = $id_modele;
        $this->id_generation = $id_generation;
        return $this->save();
    }

    // Méthode pour supprimer une association
    public function supprimerAssociation($id_modele, $id_generation) {
        $sql = "DELETE FROM modeles_generations WHERE id_modele = ? AND id_generation = ?";
        return parent::execute($sql, [$id_modele, $id_generation]);
    }

    // Méthode pour vérifier si une association existe
    public static function associationExiste($id_modele, $id_generation) {
        $sql = "SELECT COUNT(*) as count FROM modeles_generations WHERE id_modele = ? AND id_generation = ?";
        $result = parent::query($sql, [$id_modele, $id_generation], true);
        return $result->count > 0;
    }

    // Méthode pour récupérer toutes les associations d'un modèle
    public static function getAssociationsParModele($id_modele) {
        $sql = "SELECT * FROM modeles_generations WHERE id_modele = ?";
        return parent::query($sql, [$id_modele]);
    }

    // Méthode pour récupérer toutes les associations d'une génération
    public static function getAssociationsParGeneration($id_generation) {
        $sql = "SELECT * FROM modeles_generations WHERE id_generation = ?";
        return parent::query($sql, [$id_generation]);
    }
} 
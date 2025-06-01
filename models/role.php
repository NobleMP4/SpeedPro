<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class role extends table {
    protected $id_role;
    protected $nom_role;
    protected $droits_role;

    public static $suffix = "";
    public static $key = "id_role";

    public function __construct($id_role = null, $nom_role = null, $droits_role = null) {
        $this->id_role = $id_role;
        $this->nom_role = $nom_role;
        $this->droits_role = $droits_role;
    }

    public static function getTable() {
        return 'role';
    }

    // Getters avec les noms exacts correspondant aux propriétés
    public function getId_role() {
        return $this->id_role;
    }

    public function getNom_role() {
        return $this->nom_role;
    }

    public function getDroits_role() {
        return $this->droits_role;
    }

    // Alias des getters pour une meilleure lisibilité
    public function getIdRole() {
        return $this->getId_role();
    }

    public function getNomRole() {
        return $this->getNom_role();
    }

    public function getDroitsRole() {
        return $this->getDroits_role();
    }

    // Setters avec les noms exacts correspondant aux propriétés
    public function setId_role($id) {
        $this->id_role = $id;
    }

    public function setNom_role($nom) {
        $this->nom_role = $nom;
    }

    public function setDroits_role($droits) {
        $this->droits_role = $droits;
    }

    // Méthode pour récupérer tous les rôles
    public static function tous() {
        try {
            $pdo = app::$db->getPDO();
            $stmt = $pdo->prepare("SELECT id_role, nom_role, droits_role FROM role ORDER BY nom_role");
            $stmt->execute();
            
            // Récupérer les résultats et créer manuellement les objets
            $roles = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $role = new role($row['id_role'], $row['nom_role'], $row['droits_role']);
                $roles[] = $role;
            }
            
            error_log("Résultats de la requête tous() : " . print_r($roles, true));
            return $roles;
        } catch (\Exception $e) {
            error_log("Erreur dans la méthode tous() de role : " . $e->getMessage());
            return [];
        }
    }

    // Méthode pour sauvegarder un rôle
    public function save() {
        if ($this->id_role === null) {
            // Insertion
            $sql = "INSERT INTO role (nom_role, droits_role) VALUES (:nom_role, :droits_role)";
            $params = [
                ':nom_role' => $this->nom_role,
                ':droits_role' => $this->droits_role
            ];
        } else {
            // Mise à jour
            $sql = "UPDATE role SET nom_role = :nom_role, droits_role = :droits_role WHERE id_role = :id_role";
            $params = [
                ':id_role' => $this->id_role,
                ':nom_role' => $this->nom_role,
                ':droits_role' => $this->droits_role
            ];
        }

        try {
            app::$db->prepare($sql, $params);
            return true;
        } catch (\Exception $e) {
            error_log("Erreur lors de la sauvegarde du rôle : " . $e->getMessage());
            return false;
        }
    }

    // Méthode pour supprimer un rôle
    public function delete() {
        if ($this->id_role !== null) {
            $sql = "DELETE FROM role WHERE id_role = :id_role";
            try {
                app::$db->prepare($sql, [':id_role' => $this->id_role]);
                return true;
            } catch (\Exception $e) {
                error_log("Erreur lors de la suppression du rôle : " . $e->getMessage());
                return false;
            }
        }
        return false;
    }
} 
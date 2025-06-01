<?php
namespace monApp\models;

use monApp\core\table;
use monApp\core\app;

class user extends table {
    protected $id_user;
    protected $nom_user;
    protected $prenom_user;
    protected $login_user;
    protected $email_user;
    protected $mdp_user;
    protected $id_role_user;
    protected $nom_role;
    protected $date_creation_user;

    public static $suffix = "";
    public static $key = "id_user";

    // Getters
    public function getIdUser() { return $this->id_user; }
    public function getNomUser() { return $this->nom_user; }
    public function getPrenomUser() { return $this->prenom_user; }
    public function getLoginUser() { return $this->login_user; }
    public function getEmailUser() { return $this->email_user; }
    public function getMdpUser() { return $this->mdp_user; }
    public function getIdRoleUser() { return $this->id_role_user; }
    public function getNomRole() { return $this->nom_role; }
    public function getDateCreationUser() { return $this->date_creation_user; }

    // Setters
    public function setIdUser($id) { $this->id_user = $id; }
    public function setNomUser($nom) { $this->nom_user = $nom; }
    public function setPrenomUser($prenom) { $this->prenom_user = $prenom; }
    public function setLoginUser($login) { $this->login_user = $login; }
    public function setEmailUser($email) { $this->email_user = $email; }
    public function setMdpUser($mdp) { $this->mdp_user = $mdp; }
    public function setIdRoleUser($id_role) { $this->id_role_user = $id_role; }
    public function setNomRole($nom_role) { $this->nom_role = $nom_role; }
    public function setDateCreationUser($date) { $this->date_creation_user = $date; }

    public static function getTable() {
        return 'user';
    }

    // Méthode pour charger un utilisateur par son ID
    public function load() {
        try {
            if (empty($this->id_user)) {
                throw new \Exception("ID utilisateur non défini");
            }

            $sql = "SELECT u.*, r.nom_role 
                    FROM user u 
                    LEFT JOIN role r ON u.id_role_user = r.id_role 
                    WHERE u.id_user = ?";
            
            $stmt = app::$db->getPDO()->prepare($sql);
            $stmt->execute([$this->id_user]);
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($data) {
                $this->nom_user = $data['nom_user'];
                $this->prenom_user = $data['prenom_user'];
                $this->login_user = $data['login_user'];
                $this->email_user = $data['email_user'];
                $this->mdp_user = $data['mdp_user'];
                $this->id_role_user = $data['id_role_user'];
                $this->nom_role = $data['nom_role'];
                $this->date_creation_user = $data['date_creation_user'];
                return true;
            }
            return false;
        } catch (\Exception $e) {
            error_log("Erreur dans load() : " . $e->getMessage());
            throw $e;
        }
    }

    // Méthode pour récupérer tous les utilisateurs avec leurs rôles
    public static function getAllUsers() {
        try {
            $sql = "SELECT u.*, r.nom_role 
                    FROM user u 
                    LEFT JOIN role r ON u.id_role_user = r.id_role 
                    ORDER BY u.nom_user, u.prenom_user";
            return app::$db->prepare($sql, [], get_called_class());
        } catch (\Exception $e) {
            error_log("Erreur dans getAllUsers() : " . $e->getMessage());
            return [];
        }
    }

    // Méthode pour ajouter ou modifier un utilisateur
    public function save() {
        try {
            $pdo = app::$db->getPDO();
            
            if (!empty($this->id_user)) {
                // Update
                $sql = "UPDATE user SET 
                        email_user = :email,
                        id_role_user = :id_role";
                
                $params = [
                    ':email' => $this->email_user,
                    ':id_role' => $this->id_role_user,
                    ':id' => $this->id_user
                ];

                // Si un nouveau mot de passe est fourni
                if (!empty($this->mdp_user)) {
                    $sql .= ", mdp_user = :mdp";
                    $params[':mdp'] = $this->mdp_user;
                }

                $sql .= " WHERE id_user = :id";
                
                $stmt = $pdo->prepare($sql);
                return $stmt->execute($params);
            } else {
                // Insert
                $sql = "INSERT INTO user (nom_user, prenom_user, login_user, email_user, mdp_user, id_role_user, date_creation_user) 
                        VALUES (:nom, :prenom, :login, :email, :mdp, :id_role, NOW())";
                
                $params = [
                    ':nom' => $this->nom_user,
                    ':prenom' => $this->prenom_user,
                    ':login' => $this->login_user,
                    ':email' => $this->email_user,
                    ':mdp' => $this->mdp_user,
                    ':id_role' => $this->id_role_user
                ];

                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute($params);
                
                if ($result) {
                    $this->id_user = $pdo->lastInsertId();
                }
                
                return $result;
            }
        } catch (\Exception $e) {
            error_log("Erreur dans save() : " . $e->getMessage());
            throw $e;
        }
    }

    // Méthode pour supprimer un utilisateur
    public function delete() {
        try {
            if (empty($this->id_user)) {
                return false;
            }

            $pdo = app::$db->getPDO();
            $sql = "DELETE FROM user WHERE id_user = ?";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$this->id_user]);
        } catch (\Exception $e) {
            error_log("Erreur dans delete() : " . $e->getMessage());
            throw $e;
        }
    }

    // Méthode pour vérifier si un login existe déjà
    public static function loginExists($login) {
        try {
            $sql = "SELECT COUNT(*) as count FROM user WHERE login_user = ?";
            $result = app::$db->getPDO()->prepare($sql);
            $result->execute([$login]);
            $count = $result->fetchColumn();
            return $count > 0;
        } catch (\Exception $e) {
            error_log("Erreur lors de la vérification du login : " . $e->getMessage());
            return false;
        }
    }
} 
<?php

namespace monApp\models;
use monApp\core\table;
use PDOException;
use Exception;

class user extends table{

    protected static $suffixe = "_user";
    protected static $key = "id_user";
    protected static $suffix = 'mdp';

    private $id_user;
    private $nom_user;
    private $prenom_user;
    private $login_user;
    private $mdp_user;
    private $id_role_user;
    private $password_user;

    private $role_user;
   
    public function __construct(){
        if ($this->id_role_user) {
            $this->role_user = role::byId($this->id_role_user);
        }
    }

    public static function getTable(){
        return "user";
    }

    public function getId_user(){
        return $this->id_user;
    }

    public function setId_user($id_user){
        $this->id_user = $id_user;
        return $this;
    }

    public function getNom_user(){
        return $this->nom_user;
    }

    public function setNom_user($nom_user){
        $this->nom_user = $nom_user;
        return $this;
    }

    public function getPrenom_user(){
        return $this->prenom_user;
    }

    public function setPrenom_user($prenom_user){
        $this->prenom_user = $prenom_user;
        return $this;
    }

    public function getLogin_user(){
        return $this->login_user;
    }

    public function setLogin_user($login_user){
        $this->login_user = $login_user;
        return $this;
    }

    public function getMdp_user(){
        return $this->mdp_user;
    }

    public function getId_role_user(){
        return $this->id_role_user;
    }

    public function setId_role_user($id_role_user){
        $this->id_role_user = $id_role_user;
        $this->role_user = role::byId($id_role_user);
        return $this;
    }

    public function setMdp_user($password) {
        $this->mdp_user = $password;
        return $this;
    }

    public function getPassword_user() {
        return $this->password_user;
    }

    public function save() {
        try {
            if (isset($this->id_user)) {
                // C'est une insertion car nous avons déjà un ID
                $sql = "INSERT INTO user (id_user, nom_user, prenom_user, login_user, mdp_user, id_role_user) 
                        VALUES (:id, :nom, :prenom, :login, :mdp, :role)";
                
                $stmt = $this->getPdo()->prepare($sql);
                $result = $stmt->execute([
                    ':id' => $this->id_user,
                    ':nom' => $this->nom_user,
                    ':prenom' => $this->prenom_user,
                    ':login' => $this->login_user,
                    ':mdp' => $this->mdp_user,
                    ':role' => $this->id_role_user
                ]);
                
                return $result;
            }
            return false;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la sauvegarde de l'utilisateur : " . $e->getMessage());
        }
    }

    public static function login($id, $mdp){
        $condition = [
            [
                "champs" => "login_user",
                "op" => "=",
                "valeur" => $id
            ],
        ];
        $theUser = user::onlyOne($condition);
        
        if($theUser && password_verify($mdp, $theUser->mdp_user)){
            return $theUser;
        } else {
            return false;
        }
    }

    public function getRole_user(){
        return $this->role_user;
    }

    public function setRole_user($role_user){
        $this->role_user = $role_user;
        return $this;
    }

    public function getPdo() {
        return parent::connexion();
    }

    public static function isConnected() {
        return session::recup("user") !== null;
    }
}
?>
<?php 

namespace monApp\core;

use PDO;
use PDOException;

class database{

private $serverName;
private $bddName;
private $userName;
private $password;

private $db; //variable conservant la connexion à la base de données

public function __construct($hote, $dbName, $user, $motDePasse){

    $this->serverName = $hote;
    $this->bddName = $dbName;
    $this->userName = $user;
    $this->password = $motDePasse;

try{
    $this->db = new PDO("mysql:host=$this->serverName;dbname=$this->bddName","$this->userName","$this->password");
    }catch(PDOException $erreur){
        echo "Erreur";
        echo $erreur->getMessage();
    }
}
    public function query($sql,$class){
        $rst = $this->db->query($sql);
        return $rst->fetchAll(PDO::FETCH_CLASS,$class);
    }
    
    public function prepare($sql,$data,$class){
        $rst = $this->db->prepare($sql);
        $rst->execute($data);
        return $rst->fetchAll(PDO::FETCH_CLASS,$class);
    }

    public function exec($sql, $data = []) {
        if (empty($data)) {
            return $this->db->exec($sql);
        } else {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        }
    }

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }
}
?>
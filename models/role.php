<?php

namespace monApp\models;
use monApp\core\table;

class role extends table{

    protected static $suffixe = "_role";

    private $id_role;
    private $nom_role;
    private $droits_role;

    protected static $key = "id_role";

    public function getId_role(){
        return $this->id_role;
    }

    public function setId_role($id_role){
        $this->id_role = $id_role;
        return $this;
    }

    public function getNom_role(){
        return $this->nom_role;
    }

    public function setNom_role($nom_role){
        $this->nom_role = $nom_role;
        return $this;
    }

    public function getDroits_role(){
        return $this->droits_role;
    }

    public function setDroits_role($droits_role){
        $this->droits_role = $droits_role;
        return $this;
    }
}

?>
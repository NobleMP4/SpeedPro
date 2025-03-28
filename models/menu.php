<?php

namespace monApp\models;

use monApp\core\table;



class menu extends table{

    protected static $suffix = "_menu";
    protected static $key = "id_menu";

    protected $id_menu;
    protected $nom_menu;
    protected $position_menu;

    protected $liens=[];

    public function __construct(){
        $conditions=[
            [
                "champs"=> "id_menu_lien",
                "op"=> "=",
                "valeur" => $this->id_menu,
            ]
        ];
        $this->liens = lien::specifique($conditions);

    }

    

     // Constructor
     /*public function __construct($id_menu, $nom_menu, $position_menu) {
        $this->id_menu = $id_menu;
        $this->nom_menu = $nom_menu;
        $this->position_menu = $position_menu;
    }


    /**
     * Get the value of id_menu
     */ 
    public function getId_menu()
    {
        return $this->id_menu;
    }

    /**
     * Set the value of id_menu
     *
     * @return  self
     */ 
    public function setId_menu($id_menu)
    {
        $this->id_menu = $id_menu;

        return $this;
    }

    /**
     * Get the value of nom_menu
     */ 
    public function getNom_menu()
    {
        return $this->nom_menu;
    }

    /**
     * Set the value of nom_menu
     *
     * @return  self
     */ 
    public function setNom_menu($nom_menu)
    {
        $this->nom_menu = $nom_menu;

        return $this;
    }

    /**
     * Get the value of position_menu
     */ 
    public function getPosition_menu()
    {
        return $this->position_menu;
    }

    /**
     * Set the value of position_menu
     *
     * @return  self
     */ 
    public function setPosition_menu($position_menu)
    {
        $this->position_menu = $position_menu;

        return $this;
    }

    /**
     * Get the value of liens
     */ 
    public function getLiens_menu()
    {
        return $this->liens;
    }

    public function getLiens() {
        return $this->liens;
    }

    public function setLiens($liens) {
        $this->liens = $liens;
        return $this;
    }
}
?>
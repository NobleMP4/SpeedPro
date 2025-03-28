<?php 

namespace monApp\models;

use monApp\core\table;

class lien extends table{

    protected static $suffixe = "_lien";
    protected static $key = "id_lien";

    protected $id_lien;
    protected $texte_lien;
    protected $url_lien;
    protected $url_rw_lien;
    protected $order_lien;
    protected $id_menu_lien;

    public function __get($name) {
        $property = $name . '_lien';
        return $this->$property ?? parent::__get($name);
    }

    public function getId_lien() {
        return $this->id_lien;
    }

    public function getUrl() {
        return $this->url_lien;
    }

    public function setUrl($url) {
        $this->url_lien = $url;
        return $this;
    }

    public function getTexte() {
        return $this->texte_lien;
    }

    public function setTexte($texte) {
        $this->texte_lien = $texte;
        return $this;
    }

    public function getId_menu_lien() {
        return $this->id_menu_lien;
    }

    public function setId_menu_lien($id_menu_lien) {
        $this->id_menu_lien = $id_menu_lien;
        return $this;
    }

    public function afficherLien() {
        return $this->url_lien;
    }

    //url_rw_lien
    public function getUrl_rw_lien()
    {
        return $this->url_rw_lien;
    }

    //@return  self
    public function setUrl_rw_lien($url_rw_lien)
    {
        $this->url_rw_lien = $url_rw_lien;

        return $this;
    }

    //order_lien
    public function getOrder_lien()
    {
        return $this->order_lien;
    }

    //@return  self 
    public function setOrder_lien($order_lien)
    {
        $this->order_lien = $order_lien;

        return $this;
    }
}

?>
<?php

namespace monApp\controllers\pages;

use monApp\core\tpl;
use monApp\models\vehicules;
use monApp\models\clients;

class pageVehiculeSeulController{
    public function index(){
        require "views/pages/vehiculeseul.php";
    }
}
?>
<?php

namespace monApp\core;

use monApp\controllers\pages\page404Controller;
use monApp\controllers\pages\pageLoginController;
use monApp\controllers\pages\pageHomeController;
use monApp\controllers\pages\pageConfigController;
use monApp\controllers\pages\pageOptionsController;
use monApp\controllers\pages\pageCarburantsController;
use monApp\controllers\pages\pageClientsController;
use monApp\controllers\pages\pageVenteController;
use monApp\controllers\pages\pageUtilisateursController;
use monApp\controllers\pages\pageProfilController;
use monApp\controllers\pages\pageClientController;
use monApp\controllers\pages\pageVehiculeController;
class dispatcher{
    public function dispatch($route){
        if(!$route){
            $this->sendNotFound();
        }else{
            [$controllerName,$method] = explode("@",$route);
            $controller = new $controllerName();
            $controller->$method();
        }
    }
    public function sendNotFound(){
        header("HTTP/1.0 404 Not Found");
        $controller = new page404Controller();
        $controller->index();
    }
}


?>
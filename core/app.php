<?php 

namespace monApp\core;

use monApp\core\rooter;
use monApp\core\dispatcher;

class app{

    public static $rw=false;
    private static $html;

    public static $db;

    public static $rooter;
    public static $dispatcher;

    public static function db(){
        self::$db = new database("193.203.168.53","u848917271_php","u848917271_estebanphp","Pipefeu2.");
    }

    public static function section($section){
        require "controllers/sections/".$section.".php";
    }

    public static function page(){
        // Initialiser la connexion à la base de données
        self::db();
        
        self::$rooter = new rooter();
        self::$rooter->addRoute("","monApp\\controllers\\pages\\pageLoginController@index");
        self::$rooter->addRoute("accueil","monApp\\controllers\\pages\\pageHomeController@index");
        self::$rooter->addRoute("vehicules","monApp\\controllers\\pages\\pageVehiculesController@index");
        self::$rooter->addRoute("clients","monApp\\controllers\\pages\\pageClientsController@index");
        self::$rooter->addRoute("client","monApp\\controllers\\pages\\pageClientController@index");
        self::$rooter->addRoute("login","monApp\\controllers\\pages\\pageLoginController@index");
        self::$rooter->addRoute("vehiculeseul","monApp\\controllers\\pages\\pageVehiculeseulController@index");
        self::$rooter->addRoute("vente","monApp\\controllers\\pages\\pageVenteController@index");
        self::$rooter->addRoute("profil","monApp\\controllers\\pages\\pageProfilController@index");
        self::$rooter->addRoute("gestion","monApp\\controllers\\pages\\pageGestionController@index");
        self::$rooter->addRoute("logout","monApp\\controllers\\pages\\pageLogoutController@index");
        self::$rooter->addRoute("utilisateurs","monApp\\controllers\\pages\\pageUtilisateursController@index");
        $p = tools::get("p");
        if(is_null(session::recup("user"))){
            $p="login";
        }
        $route =  self::$rooter->getRoute($p);
        self::$dispatcher = new dispatcher();
        ob_start();
            self::$dispatcher->dispatch($route);
            self::$html = ob_get_contents();
        ob_end_clean();
         
    }

    public static function getHtml(){
        return self::$html;
    }

    public static function redirection($url) {
        header("Location: " . $url);
        exit();
    }
}

?>
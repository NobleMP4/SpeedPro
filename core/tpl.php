<?php

namespace monApp\core;

use Smarty\Smarty;

class tpl{

    public static $template; // stock l'objet smarty
    
    //init
    public static function init(){
        self::$template = new Smarty();
    }

    //assign
    public static function assign($key,$val){
        if(is_null(self::$template)){
            self::init();
        }
        self::$template->assign($key,$val);
    }

    //dislay
    public static function view($view){
        if(is_null(self::$template)){
            self::init();
        }
        self::$template->display("views/sections/$view.html");
    }

    public static function is_set($var){
        if(is_null(self::$template)){
            self::init();
        }
        return self::$template->getTemplateVars($var);
    }

}



?>
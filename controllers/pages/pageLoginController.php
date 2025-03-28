<?php

namespace monApp\controllers\pages;
use monApp\core\app;
use monApp\core\tpl;
use monApp\models\user;
use monApp\core\session;

class pageLoginController{
    public function index(){
        tpl::assign("message","");

        if(isset($_POST["login"]) && isset($_POST["mdp"])){
            $user = user::login($_POST["login"],$_POST["mdp"]);
            if($user){
                session::add("user", $user);
                // Assurons-nous que la session est bien démarrée
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                app::redirection("?p=accueil");
                exit();
            }else{
                tpl::assign("message","Identifiant ou mot de passe incorrect");
            }
        }
        tpl::assign("title","login");
        require "views/pages/login.php";
    }
}

?>
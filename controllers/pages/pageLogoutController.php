<?php

namespace monApp\controllers\pages;
use monApp\core\app;
use monApp\core\session;

class pageLogoutController {
    public function index() {
        // Détruire la session
        session::remove("user");
        session_destroy();
        
        // Rediriger vers la page de login
        app::redirection("index.php");
        exit();
    }
}

?>
<?php

namespace monApp\core;

class session {
    private static $instance;
    private static $varsSession = [];

    private function __construct() {
        session_start();
        // Charger les variables de session dans varsSession
        foreach ($_SESSION as $key => $data) {
            self::$varsSession[$key] = $this->isSerialized($data) ? @unserialize($data) : $data;
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function isSerialized($data) {
        // Si ce n'est pas une chaîne, ce n'est pas sérialisé
        if (!is_string($data)) {
            return false;
        }
        
        // Vérifier si c'est une valeur NULL sérialisée
        if ($data === 'N;') {
            return true;
        }
        
        // Essayer de désérialiser silencieusement
        $data = trim($data);
        if (@unserialize($data) !== false) {
            return true;
        }
        
        return false;
    }

    public static function get($nom) {
        self::getInstance();
        return isset(self::$varsSession[$nom]) ? self::$varsSession[$nom] : null;
    }

    public static function set($nom, $val) {
        self::getInstance();
        self::$varsSession[$nom] = $val;
        $_SESSION[$nom] = is_array($val) || is_object($val) ? serialize($val) : $val;
    }

    public static function remove($nom) {
        self::getInstance();
        if (isset(self::$varsSession[$nom])) {
            unset(self::$varsSession[$nom]);
        }
        if (isset($_SESSION[$nom])) {
            unset($_SESSION[$nom]);
        }
    }

    private function __clone() {}

    public function __destruct() {
        if (!empty(self::$varsSession)) {
            foreach (self::$varsSession as $key => $val) {
                $_SESSION[$key] = (is_array($val) || is_object($val)) ? serialize($val) : $val;
            }
            session_write_close();
        }
    }
}

?> 
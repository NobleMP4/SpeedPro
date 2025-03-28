<?php

namespace monApp\core;

class session{
    
private static $instance;
private static $varsSession = [];

private function __construct(){
    session_start();
    // Charger les variables de session varsSession
    foreach($_SESSION as $key => $data){
        self::$varsSession[$key] = $this->isSerialized($data) ? unserialize($data) : $data;
    }
}

public static function getInstance(){
    if(self::$instance == null){
        self::$instance = new self();
    }
    return self::$instance;
}

public function isSerialized($data){
    return is_string($data) && preg_match('/^(?:N; |a:\d+: {.*}:|0:\d+:"-*"; |s:\d+:",*"; |1: \d+; |d: \d+\. \d+; |b: [01] ; ) $ / s ', $data);
}

public static function recup($nom){
    self::getInstance();
    return self::$varsSession[$nom] ?? null;
}

public static function add($nom, $val){
    self::getInstance();
    self::$varsSession[$nom] = $val;
    $_SESSION[$nom] = $val;
}

public static function remove($nom){
    self::$varsSession [$nom] = NULL;
}

private function _clone() {}

public function __destruct() {
    if (!empty(self::$varsSession)) {
        foreach (self::$varsSession as $key => $val) {
            $_SESSION[$key] = $this->isSerialized($val) ? serialize($val) : $val;
        }
        session_write_close();
    }
}

}

?>
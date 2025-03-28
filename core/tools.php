<?php

namespace monApp\core;

class tools{
    private static $_gets = [];

    private static $lang = "fr";
    private static $formats = [
        "fr" => "d/m/y",
        "en" => "m/d/y",
        "us" => "Y-m-d"
    ];

    public static function formatDate($date){
        $theDate = new dateTime($date);
        $format = self::$formats[self::$lang];
        return $theDate->format($format);
    }

    private static function majPreLettre($str){
        return ucfirst($str);
    }

    public static function minuscule($str)  {
        return strtolower($str);
    }

    public static function nomPropre($str){
        $str = self::minuscule($str);
        $str = self::majPreLettre($str);
        return $str;
    }

    public static function gets(){
        foreach($_GET as $key=>$value){
            self::$_gets[$key] = $value;
        }
    }

    public static function get($key){
        if(isset(self::$_gets[$key])){
            return self::$_gets[$key];
        }else{
            return null;
        }
    }

    public static function handleImageUpload($file) {
        $uploadDir = 'assets/imgs/vehicules/';
        
        // Créer le dossier s'il n'existe pas
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $originalName = $file['name'];
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        
        // Générer un nom unique
        $newName = uniqid() . '_' . time() . '.' . $extension;
        $targetPath = $uploadDir . $newName;
        
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return [
                'success' => true,
                'original_name' => $originalName,
                'new_name' => $newName,
                'path' => $targetPath
            ];
        }
        
        throw new \Exception('Erreur lors de l\'upload du fichier');
    }
}

?>
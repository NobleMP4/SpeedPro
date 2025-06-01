<?php

use monApp\core\tpl;
use monApp\models\menu;
use monApp\core\session;
use monApp\models\role;
use monApp\core\app;

// Vérifier si l'utilisateur est connecté
$userSession = session::get('user');
if (!$userSession) {
    header('Location: index.php');
    exit;
}

$menus = menu::byId(1);
$menus2 = menu::byId(2);
$menus3 = menu::byId(3);
tpl::assign("menus",$menus);
tpl::assign("menus2",$menus2);
tpl::assign("menus3",$menus3);

// Récupérer le rôle de l'utilisateur
try {
    $sql = "SELECT r.nom_role FROM role r WHERE r.id_role = ?";
    $pdo = app::$db->getPDO();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userSession['role']]);
    $roleInfo = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if ($roleInfo) {
        $userSession['nom_role'] = $roleInfo['nom_role'];
    }
} catch (\Exception $e) {
    error_log("Erreur lors de la récupération du rôle : " . $e->getMessage());
}

// Assigner les informations à la vue
tpl::assign('user', $userSession);

tpl::view("header");

?>
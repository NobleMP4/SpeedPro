<?php

use monApp\core\tpl;
use monApp\core\session;
use monApp\core\app;

// Vérifier si l'utilisateur est connecté
$userSession = session::get('user');
if (!$userSession) {
    header('Location: index.php');
    exit;
}

// Traitement du changement de mot de passe
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['currentPassword'])) {
    try {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $message = '';
        $messageType = '';

        // Vérifier si les nouveaux mots de passe correspondent
        if ($newPassword !== $confirmPassword) {
            $message = "Les nouveaux mots de passe ne correspondent pas";
            $messageType = 'error';
        } else {
            // Vérifier l'ancien mot de passe
            $sql = "SELECT mdp_user FROM user WHERE id_user = ?";
            $stmt = app::$db->getPDO()->prepare($sql);
            $stmt->execute([$userSession['id']]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($user && password_verify($currentPassword, $user['mdp_user'])) {
                // Mettre à jour le mot de passe
                $sql = "UPDATE user SET mdp_user = ? WHERE id_user = ?";
                $stmt = app::$db->getPDO()->prepare($sql);
                $stmt->execute([password_hash($newPassword, PASSWORD_DEFAULT), $userSession['id']]);
                
                $message = "Mot de passe modifié avec succès";
                $messageType = 'success';
            } else {
                $message = "Le mot de passe actuel est incorrect";
                $messageType = 'error';
            }
        }
        
        tpl::assign('message', $message);
        tpl::assign('messageType', $messageType);
    } catch (\Exception $e) {
        error_log("Erreur lors du changement de mot de passe : " . $e->getMessage());
        tpl::assign('message', "Une erreur est survenue lors du changement de mot de passe");
        tpl::assign('messageType', 'error');
    }
}

// Récupérer les informations de l'utilisateur
try {
    $sql = "SELECT u.*, r.nom_role 
            FROM user u 
            LEFT JOIN role r ON u.id_role_user = r.id_role 
            WHERE u.id_user = ?";
    
    $pdo = app::$db->getPDO();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userSession['id']]);
    $userInfo = $stmt->fetch(\PDO::FETCH_ASSOC);

    if ($userInfo) {
        // Formater l'ID utilisateur
        $userInfo['formatted_id'] = sprintf("USR-%s-%03d", 
            date('Y'), 
            $userInfo['id_user']
        );
        
        // Assigner les informations à la vue
        tpl::assign('userInfo', $userInfo);
    }
} catch (\Exception $e) {
    error_log("Erreur lors de la récupération des informations du profil : " . $e->getMessage());
}

tpl::view("profil");

?>
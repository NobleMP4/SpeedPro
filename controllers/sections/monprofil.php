<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\core\session;
use monApp\models\user;
use monApp\models\role;

// Récupérer l'utilisateur connecté
$user = session::recup("user");

if ($user) {
    // Récupérer les informations complètes de l'utilisateur
    $userData = user::byId($user->getId_user());
    
    // Traitement de la modification du mot de passe
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'changePassword') {
        $response = ['success' => false, 'message' => ''];
        
        $currentPassword = $_POST['currentPassword'] ?? '';
        $newPassword = $_POST['newPassword'] ?? '';
        
        // Vérifier que l'ancien mot de passe est correct
        if (password_verify($currentPassword, $userData->getMdp_user())) {
            // Hasher le nouveau mot de passe
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            try {
                // Mise à jour directe dans la base de données
                $pdo = $userData->getPdo();
                $sql = "UPDATE user SET mdp_user = ? WHERE id_user = ?";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([$hashedPassword, $userData->getId_user()]);
                
                if ($result) {
                    $response['success'] = true;
                    $response['message'] = 'Mot de passe modifié avec succès';
                } else {
                    $response['message'] = 'Erreur lors de la mise à jour';
                }
            } catch (Exception $e) {
                $response['message'] = 'Erreur lors de la modification du mot de passe';
            }
        } else {
            $response['message'] = 'Le mot de passe actuel est incorrect';
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    
    // Assigner les données à la vue
    tpl::assign("profil", [
        "id" => $userData->getId_user(),
        "nom" => $userData->getNom_user(),
        "prenom" => $userData->getPrenom_user(),
        "email" => $userData->getEmail_user(),
        "login" => $userData->getLogin_user(),
        "role" => $userData->getRole_user()->getNom_role()
    ]);
}

tpl::view("monprofil");

?>
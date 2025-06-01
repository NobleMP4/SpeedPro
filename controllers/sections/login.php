<?php

use monApp\core\tpl;
use monApp\models\user;
use monApp\core\session;

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        // Vérification des identifiants
        $sql = "SELECT * FROM user WHERE login_user = ?";
        $pdo = \monApp\core\app::$db->getPDO();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$login]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mdp_user'])) {
            // Création de la session
            session::set('user', [
                'id' => $user['id_user'],
                'login' => $user['login_user'],
                'nom' => $user['nom_user'],
                'prenom' => $user['prenom_user'],
                'role' => $user['id_role_user']
            ]);
            
            // Redirection vers l'accueil
            header('Location: ?p=accueil');
            exit;
        } else {
            // Identifiants incorrects
            $error = "Identifiants incorrects";
            tpl::assign('error', $error);
        }
    } catch (\Exception $e) {
        error_log("Erreur de connexion : " . $e->getMessage());
        $error = "Une erreur est survenue";
        tpl::assign('error', $error);
    }
}

// Affichage de la vue
tpl::view("login");

?>
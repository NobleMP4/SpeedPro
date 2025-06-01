<?php

use monApp\core\tpl;
use monApp\models\user;
use monApp\models\role;
use monApp\core\app;
use monApp\core\session;

// Vérification de la session
$userSession = session::get('user');
if (!$userSession) {
    header('Location: ?p=login');
    exit;
}

// Définition des permissions selon le rôle
$userRole = intval($userSession['role']);
$canAdd = in_array($userRole, [1, 2]); // Admin et Gérant
$canEdit = $userRole === 1; // Admin peut tout modifier
$canEditVendeur = $userRole === 2; // Gérant peut modifier les vendeurs
$canDelete = in_array($userRole, [1, 2]); // Admin et Gérant
$canEditPassword = $userRole === 1; // Admin uniquement

// Traitement du formulaire de modification d'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'editUser') {
    try {
        $id_user = $_POST['id_user'];
        $email = $_POST['email_user'];
        $id_role = intval($_POST['id_role_user']);
        $mdp = $_POST['mdp_user'];

        // Récupération de l'utilisateur existant
        $userToEdit = new user();
        $userToEdit->setIdUser($id_user);
        $userToEdit->load();

        // Vérification des permissions
        if (!$canEdit && (!$canEditVendeur || $userToEdit->getIdRoleUser() !== 3)) {
            header('Location: ?p=utilisateurs&error=permission');
            exit;
        }

        // Si c'est un gérant, vérifier qu'il ne tente pas d'attribuer son propre rôle
        if ($userRole === 2 && $id_role === 2) {
            header('Location: ?p=utilisateurs&error=role');
            exit;
        }

        // Mise à jour des champs
        $userToEdit->setEmailUser($email);
        
        // Si c'est un gérant, vérifier qu'il ne change pas le rôle pour autre chose que vendeur
        if ($userRole === 2 && $id_role !== 3) {
            header('Location: ?p=utilisateurs&error=role');
            exit;
        }
        
        $userToEdit->setIdRoleUser($id_role);

        // Mise à jour du mot de passe uniquement si admin et si fourni
        if ($canEditPassword && !empty($mdp)) {
            $userToEdit->setMdpUser(password_hash($mdp, PASSWORD_DEFAULT));
        }

        if ($userToEdit->save()) {
            header('Location: ?p=utilisateurs&success=edit');
            exit;
        } else {
            header('Location: ?p=utilisateurs&error=edit');
            exit;
        }
    } catch (\Exception $e) {
        error_log("Erreur lors de la modification de l'utilisateur : " . $e->getMessage());
        header('Location: ?p=utilisateurs&error=edit');
        exit;
    }
}

// Traitement du formulaire d'ajout d'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'addUser') {
    try {
        // Vérification des permissions
        if (!$canAdd) {
            header('Location: ?p=utilisateurs&error=permission');
            exit;
        }

        $prenom = $_POST['prenom_user'];
        $nom = $_POST['nom_user'];
        $email = $_POST['email_user'];
        $mdp = $_POST['mdp_user'];
        $id_role = intval($_POST['id_role_user']);

        // Si c'est un gérant, vérifier qu'il ne tente pas d'attribuer son propre rôle
        if ($userRole === 2 && $id_role === 2) {
            header('Location: ?p=utilisateurs&error=role');
            exit;
        }

        // Génération du login (prenom_n01)
        $prenom_clean = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $prenom));
        $nom_clean = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nom));
        $base_login = $prenom_clean . "_" . substr($nom_clean, 0, 1);
        
        $numero = 1;
        $login = $base_login . sprintf("%02d", $numero);
        
        while (user::loginExists($login)) {
            $numero++;
            $login = $base_login . sprintf("%02d", $numero);
        }

        // Création de l'utilisateur
        $newUser = new user();
        $newUser->setLoginUser($login);
        $newUser->setPrenomUser($prenom);
        $newUser->setNomUser($nom);
        $newUser->setEmailUser($email);
        $newUser->setMdpUser(password_hash($mdp, PASSWORD_DEFAULT));
        $newUser->setIdRoleUser($id_role);
        $newUser->setDateCreationUser(date('Y-m-d H:i:s'));

        if ($newUser->save()) {
            header('Location: ?p=utilisateurs&success=add');
            exit;
        } else {
            header('Location: ?p=utilisateurs&error=add');
            exit;
        }
    } catch (\Exception $e) {
        error_log("Erreur lors de l'ajout d'un utilisateur : " . $e->getMessage());
        header('Location: ?p=utilisateurs&error=add');
        exit;
    }
}

// Traitement du formulaire de suppression d'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'deleteUser') {
    try {
        // Vérification des permissions
        if (!$canDelete) {
            header('Location: ?p=utilisateurs&error=permission');
            exit;
        }

        $id_user = $_POST['id_user'];
        
        // Récupération de l'utilisateur à supprimer
        $userToDelete = new user();
        $userToDelete->setIdUser($id_user);
        $userToDelete->load();

        // Si c'est un gérant, vérifier qu'il ne tente pas de supprimer un administrateur ou un autre gérant
        if ($userRole === 2 && ($userToDelete->getIdRoleUser() === 1 || $userToDelete->getIdRoleUser() === 2)) {
            header('Location: ?p=utilisateurs&error=role');
            exit;
        }
        
        if ($userToDelete->delete()) {
            header('Location: ?p=utilisateurs&success=delete');
            exit;
        } else {
            header('Location: ?p=utilisateurs&error=delete');
            exit;
        }
    } catch (\Exception $e) {
        error_log("Erreur lors de la suppression de l'utilisateur : " . $e->getMessage());
        header('Location: ?p=utilisateurs&error=delete');
        exit;
    }
}

// Test direct de la table role avec PDO
try {
    $pdo = app::$db->getPDO();
    
    // Vérifier la structure de la table
    $stmt = $pdo->query("DESCRIBE role");
    $structure = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    error_log("Structure de la table role : " . print_r($structure, true));
    
    // Récupérer les données brutes
    $stmt = $pdo->query("SELECT * FROM role");
    $rolesTest = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    error_log("Données brutes de la table role : " . print_r($rolesTest, true));
    
    // Tester la récupération avec FETCH_CLASS
    $stmt = $pdo->query("SELECT * FROM role");
    $rolesClass = $stmt->fetchAll(\PDO::FETCH_CLASS, "monApp\\models\\role");
    error_log("Données avec FETCH_CLASS : " . print_r($rolesClass, true));
    
    foreach ($rolesClass as $role) {
        error_log("Test des getters pour un rôle :");
        error_log("- getId_role() : " . $role->getId_role());
        error_log("- getNom_role() : " . $role->getNom_role());
        error_log("- getDroits_role() : " . $role->getDroits_role());
    }
    
} catch (\Exception $e) {
    error_log("Erreur lors de la vérification de la table role : " . $e->getMessage());
}

// Récupération de tous les utilisateurs avec leurs rôles
$users = user::getAllUsers();

// Récupération des rôles disponibles selon le rôle de l'utilisateur connecté
try {
    $roles = role::tous();
    
    // Si c'est un gérant, filtrer les rôles disponibles (uniquement rôle vendeur)
    if ($userRole === 2) {
        $roles = array_filter($roles, function($role) {
            return $role->getId_role() === 3;
        });
    }
} catch (\Exception $e) {
    error_log("Erreur lors de la récupération des rôles : " . $e->getMessage());
    $roles = [];
}

// Gestion des messages de succès/erreur
$success = isset($_GET['success']) ? $_GET['success'] : null;
$error = isset($_GET['error']) ? $_GET['error'] : null;

// Passage des variables à la vue
tpl::assign('users', $users);
tpl::assign('roles', $roles);
tpl::assign('success', $success);
tpl::assign('error', $error);
tpl::assign('canAdd', $canAdd);
tpl::assign('canEdit', $canEdit);
tpl::assign('canEditVendeur', $canEditVendeur);
tpl::assign('canDelete', $canDelete);
tpl::assign('canEditPassword', $canEditPassword);
tpl::assign('userRole', $userRole);

// Debug final
error_log("Variables passées à la vue - roles : " . print_r($roles, true));
error_log("Variables passées à la vue - users : " . print_r($users, true));

// Affichage de la vue
tpl::view("utilisateurs");

?>
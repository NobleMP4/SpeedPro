<?php

use monApp\core\tpl;
use monApp\core\app;
use monApp\models\user;
use monApp\models\role;

// Requête pour récupérer tous les utilisateurs, triés par id_role
$sql = "SELECT * FROM user ORDER BY id_role_user ASC";
$utilisateurs = app::$db->query($sql, "monApp\\models\\user");

// Requête pour récupérer tous les rôles
$sql = "SELECT * FROM role";
$roles = app::$db->query($sql, "monApp\\models\\role");

// Assigner les données au template
tpl::assign('utilisateurs', $utilisateurs);
tpl::assign('roles', $roles);

// Afficher la vue
tpl::view("listeutilisateurs");

?>
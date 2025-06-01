<?php
/* Smarty version 5.5.1, created on 2025-06-01 14:50:52
  from 'file:views/sections/header.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c68ccaf94a7_65571571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04d9f14f88d4dc824b5222ccd754edfcdd5a960f' => 
    array (
      0 => 'views/sections/header.html',
      1 => 1748782692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c68ccaf94a7_65571571 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedPro - Administration</title>
    <link rel="icon" href="assets/imgs/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- noUiSlider CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider@14.6.3/distribute/nouislider.min.css">
    <!-- Styles personnalisés -->
    <link rel="stylesheet/less" type="text/css" href="assets/styles/styles.less">
    <!-- Less.js -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/less@4.1.1"><?php echo '</script'; ?>
>
    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <!-- Bootstrap JS -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <!-- noUiSlider JS -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/nouislider@14.6.3/distribute/nouislider.min.js"><?php echo '</script'; ?>
>
    <!-- Chart.js -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>
    <!-- Custom JS -->
    <?php echo '<script'; ?>
 src="assets/js/js.js"><?php echo '</script'; ?>
>
</head>
<body class="admin-body">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <img src="assets/imgs/logo.png" alt="SpeedPro Logo" class="logo-img">
            </div>
            <button class="btn-toggle-sidebar d-lg-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <div class="sidebar-user">
            <div class="user-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="user-info">
                <div class="user-name"><?php echo $_smarty_tpl->getValue('user')['prenom'];?>
 <?php echo $_smarty_tpl->getValue('user')['nom'];?>
</div>
                <div class="user-role"><?php echo $_smarty_tpl->getValue('user')['nom_role'];?>
</div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="nav-item">
                <a href="?p=accueil" class="nav-link">
                    Dashboard
                </a>
            </li>
            <li class="nav-section">Gestion Véhicules</li>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('menus')->liens, 'lien', false, 'key');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('lien')->value) {
$foreach0DoElse = false;
?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $_smarty_tpl->getValue('lien')->afficherLien();?>
">
                    <span><?php echo $_smarty_tpl->getValue('lien')->texte;?>
</span>
                </a>
            </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            
            
            <li class="nav-section">Gestion Commerciale</li>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('menus2')->liens, 'lien', false, 'key');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('lien')->value) {
$foreach1DoElse = false;
?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $_smarty_tpl->getValue('lien')->afficherLien();?>
">
                    <span><?php echo $_smarty_tpl->getValue('lien')->texte;?>
</span>
                </a>
            </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

            <li class="nav-section">Administration</li>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('menus3')->liens, 'lien', false, 'key');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('lien')->value) {
$foreach2DoElse = false;
?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $_smarty_tpl->getValue('lien')->afficherLien();?>
">
                    <span><?php echo $_smarty_tpl->getValue('lien')->texte;?>
</span>
                </a>
            </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>

        <div class="sidebar-footer">
            <a href="?p=profil" class="footer-link">
                <i class="fas fa-user"></i>
                <span>Profil</span>
            </a>
            <a href="?p=logout" class="footer-link text-danger">
                <i class="fas fa-sign-out-alt"></i>
                <span>Déconnexion</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Content Container -->
        <div class="content-container">
</body>
</html><?php }
}

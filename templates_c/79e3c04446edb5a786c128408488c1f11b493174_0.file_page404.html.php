<?php
/* Smarty version 5.5.1, created on 2025-05-22 18:51:32
  from 'file:views/sections/page404.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_682f723402e230_93349335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79e3c04446edb5a786c128408488c1f11b493174' => 
    array (
      0 => 'views/sections/page404.html',
      1 => 1747939889,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682f723402e230_93349335 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedPro - 404</title>
    <link rel="icon" href="assets/imgs/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles personnalisés -->
    <link rel="stylesheet/less" type="text/css" href="assets/styles/styles.less">
    <!-- Less.js -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/less@4.1.1"><?php echo '</script'; ?>
>
</head>
<body>
    
    <!-- Page 404 -->
    <div class="error-container">
        <div class="error-content">
            <div class="error-code">
                <span>4</span>
                <div class="error-zero">
                    <div class="error-animation"></div>
                </div>
                <span>4</span>
            </div>
            <h1 class="error-title">Page non trouvée</h1>
            <p class="error-message">Désolé, la page que vous recherchez n'existe pas ou a été déplacée.</p>
            <div class="error-actions">
                <a href="?p=accueil" class="btn btn-primary">
                    <i class="fas fa-home me-2"></i>Retour à l'accueil
                </a>
                <button class="btn btn-outline-light" onclick="history.back()">
                    <i class="fas fa-arrow-left me-2"></i>Page précédente
                </button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}

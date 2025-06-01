<?php
/* Smarty version 5.5.1, created on 2025-05-31 09:32:56
  from 'file:views/sections/login.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683accc876cfe1_14414020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f2041a35e8ed427afd17e0d409e0c45abff6bd1' => 
    array (
      0 => 'views/sections/login.html',
      1 => 1748683966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683accc876cfe1_14414020 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedPro - Connexion</title>
    <link rel="icon" href="assets/imgs/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Styles personnalisés -->
    <link rel="stylesheet/less" type="text/css" href="assets/styles/styles.less">
    <!-- Less.js -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/less@4.1.1"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1><i class="fas fa-car-side me-2"></i>SpeedPro</h1>
                <p>Connectez-vous pour accéder à votre espace</p>
            </div>
            
            <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo $_smarty_tpl->getValue('error');?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php }?>
            
            <form id="loginForm" method="post">
                <div class="form-group">
                    <label for="username">
                        <i class="fas fa-user me-2"></i>Identifiant
                    </label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock me-2"></i>Mot de passe
                    </label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                </button>
            </form>
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

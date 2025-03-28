<?php
/* Smarty version 5.4.3, created on 2025-03-27 11:27:01
  from 'file:views/sections/formlogin.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e53605969981_50986631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7366949130f473f3af0aa1e2a96c7e807b9ac674' => 
    array (
      0 => 'views/sections/formlogin.html',
      1 => 1743074820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e53605969981_50986631 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
?><div class="login-container">
    <div class="login-card">
        <div class="login-sides">
            <div class="login-left">
                <div class="brand-section">
                    <img src="assets/imgs/logo-php.png" alt="Logo Garage" class="logo">
                </div>
            </div>
            
            <div class="login-right">
                <div class="login-content">
                    <h1>Connexion</h1>
                    <p class="subtitle">Espace administrateur</p>
                    
                    <form class="login-form" action="?p=login" method="POST">
                        <div class="input-group">
                            <div class="input-wrapper">
                                <input type="text" id="email" name="login" placeholder="Identifiant">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <input type="password" id="password" name="mdp" placeholder="Mot de passe">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>

                        <button type="submit" class="login-btn">
                            <span>Se connecter</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>

                        <div class="forgot-password">
                            <a href="#">Mot de passe oublié ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}

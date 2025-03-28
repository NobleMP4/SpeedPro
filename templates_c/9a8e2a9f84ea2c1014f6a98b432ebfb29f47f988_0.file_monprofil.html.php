<?php
/* Smarty version 5.4.3, created on 2025-03-12 14:24:17
  from 'file:views/sections/monprofil.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67d1991149f592_16886087',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a8e2a9f84ea2c1014f6a98b432ebfb29f47f988' => 
    array (
      0 => 'views/sections/monprofil.html',
      1 => 1741789456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67d1991149f592_16886087 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/projet-php/views/sections';
?><div class="profile-container">
    <div class="profile-header">
        <div class="profile-cover">
            <img src="assets/imgs/logo-php.png" alt="Photo de profil" width="100%">
        </div>
        <div class="profile-info">
            <div class="profile-avatar">
                <img src="https://webp.gp.cdn.pxr.nl/news/2025/03/05/79b03f67c43739350e4d34c4ca7000ab0d8558e8.jpg" alt="Photo de profil">
                <button class="edit-avatar">
                    <i class="fas fa-camera"></i>
                </button>
            </div>
            <div class="profile-details">
                <h1>John Doe</h1>
                <p class="role">Administrateur</p>
            </div>
        </div>
    </div>

    <div class="profile-content">
        <div class="profile-section">
            <div class="section-header">
                <h2>Informations personnelles</h2>
                <button class="btn-edit">
                    <i class="fas fa-pen"></i>
                    Modifier
                </button>
            </div>
            <div class="info-grid">
                <div class="info-item">
                    <label>Nom complet</label>
                    <p>John Doe</p>
                </div>
                <div class="info-item">
                    <label>Email</label>
                    <p>john.doe@example.com</p>
                </div>
                <div class="info-item">
                    <label>Téléphone</label>
                    <p>+33 6 12 34 56 78</p>
                </div>
                <div class="info-item">
                    <label>Poste</label>
                    <p>Administrateur système</p>
                </div>
            </div>
        </div>

        <div class="profile-section">
            <div class="section-header">
                <h2>Sécurité</h2>
                <button class="btn-edit">
                    <i class="fas fa-lock"></i>
                    Modifier
                </button>
            </div>
            <div class="security-options">
                <div class="security-item">
                    <div class="security-info">
                        <h3>Mot de passe</h3>
                        <p>Dernière modification il y a 3 mois</p>
                    </div>
                    <button class="btn-change-password">Changer le mot de passe</button>
                </div>
                <div class="security-item">
                    <div class="security-info">
                        <h3>Double authentification</h3>
                        <p>Sécurisez votre compte avec la 2FA</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}

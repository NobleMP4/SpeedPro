<?php
/* Smarty version 5.4.3, created on 2025-04-04 17:37:53
  from 'file:views/sections/monprofil.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67f018f1f0f629_11497103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '135de53886828675a229a2f5376551161fd1486e' => 
    array (
      0 => 'views/sections/monprofil.html',
      1 => 1743186666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67f018f1f0f629_11497103 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
?><div class="profile-container">
    <div class="profile-header">
        <div class="profile-cover">
            <img src="assets/imgs/logo-php.png" alt="Bannière de profil" width="100%">
        </div>
        <div class="profile-info">
            <div class="profile-details">
                <h1><?php echo $_smarty_tpl->getValue('profil')['prenom'];?>
 <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('profil')['nom'] ?? '', 'UTF-8');?>
</h1>
                <p class="role"><?php echo $_smarty_tpl->getValue('profil')['role'];?>
</p>
            </div>
        </div>
    </div>

    <div class="profile-content">
        <div class="profile-section">
            <div class="section-header">
                <h2>Informations personnelles</h2>
            
            </div>
            <div class="info-grid">
                <div class="info-item">
                    <label>Nom complet</label>
                    <p><?php echo $_smarty_tpl->getValue('profil')['prenom'];?>
 <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('profil')['nom'] ?? '', 'UTF-8');?>
</p>
                </div>
                <div class="info-item">
                    <label>Login</label>
                    <p><?php echo $_smarty_tpl->getValue('profil')['login'];?>
</p>
                </div>
                <div class="info-item">
                    <label>Email</label>
                    <p><?php echo $_smarty_tpl->getValue('profil')['email'];?>
</p>
                </div>
                <div class="info-item">
                    <label>Poste</label>
                    <p><?php echo $_smarty_tpl->getValue('profil')['role'];?>
</p>
                </div>
                <div class="info-item">
                    <label>ID du compte</label>
                    <p><?php echo $_smarty_tpl->getValue('profil')['id'];?>
</p>
                </div>
            </div>
        </div>

        <div class="profile-section">
            <div class="section-header">
                <h2>Sécurité</h2>
            </div>
            <div class="security-options">
                <div class="security-item">
                    <div class="security-info">
                        <h3>Mot de passe</h3>
                    </div>
                    <button class="btn-change-password">Changer le mot de passe</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}

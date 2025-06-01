<?php
/* Smarty version 5.5.1, created on 2025-06-01 14:04:23
  from 'file:views/sections/profil.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c5de7690ed8_72255185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f98d1915c9bbd695df5b042cc8c4e4ecadc7be24' => 
    array (
      0 => 'views/sections/profil.html',
      1 => 1748686402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c5de7690ed8_72255185 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!-- Page Profil -->
<div class="profile-container">
    <div class="profile-header">
        <div class="header-content">
            <h1><i class="fas fa-user-circle me-2"></i>Mon Profil</h1>
        </div>
    </div>

    <?php if ((true && ($_smarty_tpl->hasVariable('message') && null !== ($_smarty_tpl->getValue('message') ?? null)))) {?>
        <div class="alert alert-<?php if ($_smarty_tpl->getValue('messageType') == 'success') {?>success<?php } else { ?>danger<?php }?> alert-dismissible fade show" role="alert">
            <?php echo $_smarty_tpl->getValue('message');?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }?>

    <div class="row">
        <div class="col-12">
            <!-- Informations personnelles -->
            <div class="profile-card">
                <h3 class="card-title"><i class="fas fa-user me-2"></i>Informations personnelles</h3>
                <div class="profile-info-list">
                    <div class="info-item">
                        <span class="info-label">Nom</span>
                        <span class="info-value"><?php echo $_smarty_tpl->getValue('userInfo')['nom_user'];?>
</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Prénom</span>
                        <span class="info-value"><?php echo $_smarty_tpl->getValue('userInfo')['prenom_user'];?>
</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?php echo $_smarty_tpl->getValue('userInfo')['email_user'];?>
</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Identifiant</span>
                        <span class="info-value"><?php echo $_smarty_tpl->getValue('userInfo')['login_user'];?>
</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Rôle</span>
                        <span class="info-value"><?php echo $_smarty_tpl->getValue('userInfo')['nom_role'];?>
</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">N°ID</span>
                        <span class="info-value"><?php echo $_smarty_tpl->getValue('userInfo')['id_user'];?>
</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Date de création</span>
                        <span class="info-value"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('userInfo')['date_creation_user'],"%d/%m/%Y");?>
</span>
                    </div>
                </div>
            </div>

            <!-- Sécurité -->
            <div class="profile-card">
                <h3 class="card-title"><i class="fas fa-shield-alt me-2"></i>Sécurité</h3>
                <form id="securityForm" method="post" action="?p=profil">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="currentPassword">Mot de passe actuel</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="newPassword">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmPassword">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key me-2"></i>Changer le mot de passe
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }
}

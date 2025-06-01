<?php
/* Smarty version 5.5.1, created on 2025-06-01 14:03:40
  from 'file:views/sections/utilisateurs.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c5dbc7c3447_55659162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55cd8e9f502b7d2034c926bfede211f1c41cd768' => 
    array (
      0 => 'views/sections/utilisateurs.html',
      1 => 1748786619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c5dbc7c3447_55659162 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!-- Gestion des utilisateurs -->
<div class="clients-container">
    <!-- Messages de notification -->
    <?php if ((true && ($_smarty_tpl->hasVariable('success') && null !== ($_smarty_tpl->getValue('success') ?? null)))) {?>
        <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
            <?php if ($_smarty_tpl->getValue('success') == 'add') {?>
                <i class="fas fa-check-circle me-2"></i>L'utilisateur a été ajouté avec succès.
            <?php } elseif ($_smarty_tpl->getValue('success') == 'edit') {?>
                <i class="fas fa-check-circle me-2"></i>L'utilisateur a été modifié avec succès.
            <?php } elseif ($_smarty_tpl->getValue('success') == 'delete') {?>
                <i class="fas fa-check-circle me-2"></i>L'utilisateur a été supprimé avec succès.
            <?php }?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php }?>

    <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
        <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
            <?php if ($_smarty_tpl->getValue('error') == 'delete') {?>
                <i class="fas fa-exclamation-circle me-2"></i>Une erreur est survenue lors de la suppression de l'utilisateur.
            <?php } elseif ($_smarty_tpl->getValue('error') == 'permission') {?>
                <i class="fas fa-exclamation-circle me-2"></i>Vous n'avez pas les permissions nécessaires pour effectuer cette action.
            <?php } elseif ($_smarty_tpl->getValue('error') == 'role') {?>
                <i class="fas fa-exclamation-circle me-2"></i>Vous ne pouvez pas attribuer ou gérer ce rôle.
            <?php }?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php }?>

    <!-- Contenu principal -->
    <div class="row">
        <div class="col-12">
            <div class="clients-card">
                <div class="clients-header">
                    <div class="header-left">
                        <h2><i class="fas fa-users me-2"></i>Liste des utilisateurs</h2>
                        <div class="clients-count">
                            <span class="badge bg-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('users'));?>
 utilisateurs</span>
                        </div>
                    </div>
                    <div class="header-right">
                        <?php if ($_smarty_tpl->getValue('canAdd')) {?>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fas fa-plus me-2"></i>Ajouter un utilisateur
                        </button>
                        <?php }?>
                    </div>
                </div>

                <div class="clients-tools">
                    <div class="search-box">
                        <input type="text" class="form-control" id="searchUser" placeholder="Rechercher un utilisateur...">
                        <i class="fas fa-search"></i>
                    </div>
                </div>

                <div class="clients-list">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Login</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'user');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach0DoElse = false;
?>
                                <tr>
                                    <td>
                                        <div class="client-info">
                                            <div class="client-avatar">
                                                <span class="avatar-placeholder">
                                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('user')->getPrenomUser(),1,'');
echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('user')->getNomUser(),1,'');?>

                                                </span>
                                            </div>
                                            <div class="client-details">
                                                <span class="client-name">
                                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('user')->getPrenomUser());?>
 <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('user')->getNomUser() ?? '', 'UTF-8');?>

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-white"><?php echo $_smarty_tpl->getValue('user')->getLoginUser();?>
</td>
                                    <td class="text-white"><?php echo $_smarty_tpl->getValue('user')->getEmailUser();?>
</td>
                                    <td>
                                        <span class="badge bg-info">
                                            <?php echo $_smarty_tpl->getValue('user')->getNomRole();?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="client-actions">
                                            <?php if (($_smarty_tpl->getValue('canEdit') || ($_smarty_tpl->getValue('canEditVendeur') && $_smarty_tpl->getValue('user')->getIdRoleUser() == 3))) {?>
                                            <button class="btn btn-icon text-primary" title="Modifier" data-bs-toggle="modal" data-bs-target="#editUserModal<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->getValue('canDelete') && ($_smarty_tpl->getValue('userRole') == 1 || ($_smarty_tpl->getValue('userRole') == 2 && $_smarty_tpl->getValue('user')->getIdRoleUser() != 1 && $_smarty_tpl->getValue('user')->getIdRoleUser() != 2))) {?>
                                            <button class="btn btn-icon text-danger" title="Supprimer" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <?php }?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
}
if ($foreach0DoElse) {
?>
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <i class="fas fa-info-circle me-2"></i>Aucun utilisateur trouvé
                                    </td>
                                </tr>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Utilisateur -->
<?php if ($_smarty_tpl->getValue('canAdd')) {?>
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-plus me-2"></i>Ajouter un utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addUserForm" method="POST">
                <input type="hidden" name="action" value="addUser">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="prenom_user">Prénom</label>
                                <input type="text" class="form-control" id="prenom_user" name="prenom_user" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nom_user">Nom</label>
                                <input type="text" class="form-control" id="nom_user" name="nom_user" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email_user">Email</label>
                        <input type="email" class="form-control" id="email_user" name="email_user" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="mdp_user">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp_user" name="mdp_user" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_role_user">Rôle</label>
                        <select class="form-select" id="id_role_user" name="id_role_user" required>
                            <option value="">Sélectionnez un rôle</option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('roles'), 'role');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('role')->value) {
$foreach1DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('role')->getIdRole();?>
"><?php echo $_smarty_tpl->getValue('role')->getNomRole();?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }?>

<!-- Modal de modification pour chaque utilisateur -->
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'user');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach2DoElse = false;
if ($_smarty_tpl->getValue('canEdit') || ($_smarty_tpl->getValue('canEditVendeur') && $_smarty_tpl->getValue('user')->getIdRoleUser() == 3)) {?>
<div class="modal fade" id="editUserModal<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user-edit me-2"></i>Modifier l'utilisateur <?php echo $_smarty_tpl->getValue('user')->getPrenomUser();?>
 <?php echo $_smarty_tpl->getValue('user')->getNomUser();?>

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <input type="hidden" name="action" value="editUser">
                <input type="hidden" name="id_user" value="<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="email_user_<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
">Email</label>
                        <input type="email" class="form-control" id="email_user_<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
" name="email_user" value="<?php echo $_smarty_tpl->getValue('user')->getEmailUser();?>
" required>
                    </div>
                    <?php if ($_smarty_tpl->getValue('canEditPassword')) {?>
                    <div class="form-group mb-3">
                        <label for="mdp_user_<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
">Nouveau mot de passe (laisser vide pour ne pas modifier)</label>
                        <input type="password" class="form-control" id="mdp_user_<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
" name="mdp_user">
                    </div>
                    <?php }?>
                    <div class="form-group mb-3">
                        <label for="id_role_user_<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
">Rôle</label>
                        <select class="form-select" id="id_role_user_<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
" name="id_role_user" required <?php if ($_smarty_tpl->getValue('userRole') == 2) {?>disabled<?php }?>>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('roles'), 'role');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('role')->value) {
$foreach3DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('role')->getIdRole();?>
" <?php if ($_smarty_tpl->getValue('user')->getIdRoleUser() == $_smarty_tpl->getValue('role')->getIdRole()) {?>selected<?php }?>>
                                    <?php echo $_smarty_tpl->getValue('role')->getNomRole();?>

                                </option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                        <?php if ($_smarty_tpl->getValue('userRole') == 2) {?>
                        <input type="hidden" name="id_role_user" value="3">
                        <?php }?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

<!-- Modal de suppression -->
<?php if ($_smarty_tpl->getValue('canDelete')) {
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'user');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach4DoElse = false;
if ($_smarty_tpl->getValue('userRole') == 1 || ($_smarty_tpl->getValue('userRole') == 2 && $_smarty_tpl->getValue('user')->getIdRoleUser() != 1 && $_smarty_tpl->getValue('user')->getIdRoleUser() != 2)) {?>
<div class="modal fade" id="deleteUserModal<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-trash me-2"></i>Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <input type="hidden" name="action" value="deleteUser">
                <input type="hidden" name="id_user" value="<?php echo $_smarty_tpl->getValue('user')->getIdUser();?>
">
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <p>Êtes-vous sûr de vouloir supprimer l'utilisateur <strong><?php echo $_smarty_tpl->getValue('user')->getPrenomUser();?>
 <?php echo $_smarty_tpl->getValue('user')->getNomUser();?>
</strong> ?</p>
                    <p class="text-muted small">Cette action est irréversible.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Supprimer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}?>

<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la recherche
    const searchInput = document.getElementById('searchUser');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('.clients-list tbody tr');
            
            rows.forEach(row => {
                const userName = row.querySelector('.client-name')?.textContent.toLowerCase();
                const userLogin = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase();
                const userEmail = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase();
                const userRole = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase();
                
                if (userName && userLogin && userEmail && userRole) {
                    if (userName.includes(searchText) || 
                        userLogin.includes(searchText) || 
                        userEmail.includes(searchText) || 
                        userRole.includes(searchText)) {
                        row.style.display = '';
                        row.classList.add('animate__animated', 'animate__fadeIn');
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    }

    // Animation des boutons d'action
    document.querySelectorAll('.btn-icon').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.classList.add('animate__animated', 'animate__pulse');
        });
        
        btn.addEventListener('animationend', function() {
            this.classList.remove('animate__animated', 'animate__pulse');
        });
    });
});
<?php echo '</script'; ?>
>
<?php }
}

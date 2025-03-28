<?php
/* Smarty version 5.4.3, created on 2025-03-28 11:31:21
  from 'file:views/sections/listeutilisateurs.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e688891b8d14_45836640',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c8ad3bd4557f4086ff61d907ae1a25ef8e472a1' => 
    array (
      0 => 'views/sections/listeutilisateurs.html',
      1 => 1743161479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e688891b8d14_45836640 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
?><div class="users-list-container">
    <div class="users-header">
        <h2><i class="fas fa-users"></i> Gestion des Utilisateurs</h2>
        <button class="btn-add-user" onclick="openAddUserForm()">
            <i class="fas fa-user-plus"></i>
            Ajouter un utilisateur
        </button>
    </div>

    <!-- Section du formulaire d'ajout -->
    <div id="addUserFormSection" class="new-user-form-section" style="display: none;">
        <div class="form-header">
            <h2>Ajouter un utilisateur</h2>
            <button type="button" class="close-form" onclick="closeAddUserForm()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="addUserForm" class="form-grid" action="?p=utilisateurs" method="POST">
            <input type="hidden" name="action" value="addUser">
            
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            
            <div class="form-group">
                <label for="role">Rôle</label>
                <select class="form-select" id="role" name="role" required>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('roles'), 'role');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('role')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('role')->getId_role();?>
"><?php echo $_smarty_tpl->getValue('role')->getNom_role();?>
</option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <div class="form-actions full-width">
                <button type="button" class="btn-secondary" onclick="closeAddUserForm()">Annuler</button>
                <button type="submit" class="btn-primary">Ajouter l'utilisateur</button>
            </div>
        </form>
    </div>

    <div class="users-grid">
        <div class="users-table-container">
            <table class="users-table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Identifiant</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('utilisateurs'), 'user');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach1DoElse = false;
?>
                    <tr>
                        <td class="user-info">
                            <div class="user-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="user-details">
                                <span class="user-name"><?php echo mb_strtoupper((string) $_smarty_tpl->getValue('user')->getNom_user() ?? '', 'UTF-8');?>
 <?php echo $_smarty_tpl->getValue('user')->getPrenom_user();?>
</span>
                            </div>
                        </td>
                        <td><?php echo $_smarty_tpl->getValue('user')->getLogin_user();?>
</td>
                        <td>
                            <span class="role-badge role-<?php echo mb_strtolower((string) $_smarty_tpl->getValue('user')->getRole_user()->getNom_role(), 'UTF-8');?>
"><?php echo $_smarty_tpl->getValue('user')->getRole_user()->getNom_role();?>
</span>
                        </td>
                        <td class="actions">
                            <button class="btn-edit" title="Modifier" 
                                    onclick="toggleUserPanel(this)"
                                    data-user-id="<?php echo $_smarty_tpl->getValue('user')->getId_user();?>
" 
                                    data-user-name="<?php echo mb_strtoupper((string) $_smarty_tpl->getValue('user')->getNom_user() ?? '', 'UTF-8');?>
 <?php echo $_smarty_tpl->getValue('user')->getPrenom_user();?>
"
                                    data-user-login="<?php echo $_smarty_tpl->getValue('user')->getLogin_user();?>
">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="user-panel-row" style="display: none;">
                        <td colspan="4">
                            <div class="user-panel">
                                <div class="user-panel-content">
                                    <div class="edit-form" style="display: none;">
                                        <form class="user-edit-form">
                                            <div class="form-group">
                                                <label for="edit_nom">Nom</label>
                                                <input type="text" id="edit_nom" name="nom" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_prenom">Prénom</label>
                                                <input type="text" id="edit_prenom" name="prenom" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_role">Rôle</label>
                                                <select id="edit_role" name="role" class="form-select">
                                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('roles'), 'role');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('role')->value) {
$foreach2DoElse = false;
?>
                                                        <option value="<?php echo $_smarty_tpl->getValue('role')->getId_role();?>
"><?php echo $_smarty_tpl->getValue('role')->getNom_role();?>
</option>
                                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn-cancel" onclick="toggleEditForm(this, false)">Annuler</button>
                                                <button type="submit" class="btn-save">Enregistrer</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="user-modal-actions">
                                        <button class="action-btn edit-info" onclick="toggleEditForm(this, true)">
                                            <i class="fas fa-pen"></i>
                                            Modifier les informations
                                        </button>
                                        
                                        <button class="action-btn reset-password">
                                            <i class="fas fa-key"></i>
                                            Réinitialiser le mot de passe
                                        </button>
                                        
                                        <button class="action-btn delete-user">
                                            <i class="fas fa-trash-alt"></i>
                                            Supprimer l'utilisateur
                                        </button>
                                    </div>
                                </div>
                            </div>
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

<!-- Script pour ouvrir le modal -->
<?php echo '<script'; ?>
>
document.querySelector('.btn-add-user').addEventListener('click', function() {
    var modal = new bootstrap.Modal(document.getElementById('addUserModal'));
    modal.show();
});
<?php echo '</script'; ?>
>
<?php }
}

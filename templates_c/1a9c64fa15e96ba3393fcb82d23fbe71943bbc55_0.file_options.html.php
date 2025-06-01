<?php
/* Smarty version 5.5.1, created on 2025-06-01 13:49:05
  from 'file:views/sections/options.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c5a5113c2c8_43205505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a9c64fa15e96ba3393fcb82d23fbe71943bbc55' => 
    array (
      0 => 'views/sections/options.html',
      1 => 1748785743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c5a5113c2c8_43205505 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!-- Gestion des options -->
<div class="options-container">
    <!-- Messages de notification -->
    <?php if ((true && ($_smarty_tpl->hasVariable('success') && null !== ($_smarty_tpl->getValue('success') ?? null)))) {?>
        <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
            <?php if ($_smarty_tpl->getValue('success') == 'add') {?>
                <i class="fas fa-check-circle me-2"></i>L'option a été ajoutée avec succès.
            <?php } elseif ($_smarty_tpl->getValue('success') == 'edit') {?>
                <i class="fas fa-check-circle me-2"></i>L'option a été modifiée avec succès.
            <?php } elseif ($_smarty_tpl->getValue('success') == 'delete') {?>
                <i class="fas fa-check-circle me-2"></i>L'option a été supprimée avec succès.
            <?php }?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php }?>

    <!-- Contenu principal -->
    <div class="row">
        <div class="col-12">
            <div class="options-card">
                <div class="options-header">
                    <div class="header-left">
                        <h2><i class="fas fa-list-check me-2"></i>Liste des options</h2>
                        <div class="options-count">
                            <span class="badge bg-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('options'));?>
 options</span>
                        </div>
                    </div>
                    <div class="header-right">
                        <?php if ($_smarty_tpl->getValue('canAdd')) {?>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOptionModal">
                            <i class="fas fa-plus me-2"></i>Ajouter une option
                        </button>
                        <?php }?>
                    </div>
                </div>

                <div class="options-tools">
                    <div class="search-box">
                        <input type="text" class="form-control" id="searchOption" placeholder="Rechercher une option...">
                        <i class="fas fa-search"></i>
                    </div>
                </div>

                <div class="options-list">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom de l'option</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('options'), 'option');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach0DoElse = false;
?>
                                <tr>
                                    <td>
                                        <div class="option-name">
                                            <i class="fas fa-cog"></i>
                                            <span><?php echo $_smarty_tpl->getValue('option')->getNom_option();?>
</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="option-actions text-end">
                                            <?php if ($_smarty_tpl->getValue('canDelete')) {?>
                                            <button class="btn btn-icon text-danger delete-option" title="Supprimer" data-bs-toggle="modal" data-bs-target="#deleteOptionModal" data-id="<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
" data-nom="<?php echo $_smarty_tpl->getValue('option')->getNom_option();?>
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
                                    <td colspan="2" class="text-center text-muted py-4">
                                        <i class="fas fa-info-circle me-2"></i>Aucune option trouvée
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

<!-- Modal Ajout Option -->
<?php if ($_smarty_tpl->getValue('canAdd')) {?>
<div class="modal fade" id="addOptionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Ajouter une option</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addOptionForm" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="addOption">
                    <div class="form-group">
                        <label for="nomOption">Nom de l'option</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-cog"></i>
                            </span>
                            <input type="text" class="form-control" id="nomOption" name="nomOption" required placeholder="Saisir le nom de l'option">
                        </div>
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

<!-- Modal de confirmation de suppression -->
<?php if ($_smarty_tpl->getValue('canDelete')) {?>
<div class="modal fade" id="deleteOptionModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-trash me-2"></i>Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="deleteOptionForm" method="POST">
                <div class="modal-body text-center">
                    <input type="hidden" name="action" value="deleteOption">
                    <input type="hidden" name="id_option" id="deleteOptionId">
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <p>Êtes-vous sûr de vouloir supprimer l'option <strong id="deleteOptionName"></strong> ?</p>
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
}

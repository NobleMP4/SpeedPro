<?php
/* Smarty version 5.5.1, created on 2025-06-01 13:51:33
  from 'file:views/sections/carburants.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c5ae5c666c4_27148952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5048d4f27fe5795169fe86d07475c15d82ae14f8' => 
    array (
      0 => 'views/sections/carburants.html',
      1 => 1748785860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c5ae5c666c4_27148952 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!-- Gestion des carburants -->
<div class="carburants-container">

    <!-- Messages de notification -->
    <?php if ((true && ($_smarty_tpl->hasVariable('success') && null !== ($_smarty_tpl->getValue('success') ?? null)))) {?>
        <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
            <?php if ($_smarty_tpl->getValue('success') == 'add') {?>
                <i class="fas fa-check-circle me-2"></i>Le carburant a été ajouté avec succès.
            <?php } elseif ($_smarty_tpl->getValue('success') == 'edit') {?>
                <i class="fas fa-check-circle me-2"></i>Le carburant a été modifié avec succès.
            <?php } elseif ($_smarty_tpl->getValue('success') == 'delete') {?>
                <i class="fas fa-check-circle me-2"></i>Le carburant a été supprimé avec succès.
            <?php }?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php }?>

    <!-- Contenu principal -->
    <div class="carburants-card">
        <div class="carburants-header">
            <div class="header-left">
                <h2><i class="fas fa-list me-2"></i>Liste des carburants</h2>
                <div class="carburants-count">
                    <span class="badge bg-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('carburants'));?>
 carburants</span>
                </div>
            </div>
            <div class="header-right">
                <?php if ($_smarty_tpl->getValue('canAdd')) {?>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCarburantModal">
                    <i class="fas fa-plus me-2"></i>Ajouter un carburant
                </button>
                <?php }?>
            </div>
        </div>

        <div class="carburants-tools">
            <div class="search-box">
                <input type="text" class="form-control" id="searchCarburant" placeholder="Rechercher un carburant...">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <div class="carburants-list">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Type de carburant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('carburants'), 'carburant');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('carburant')->value) {
$foreach0DoElse = false;
?>
                        <tr>
                            <td>
                                <div class="carburant-name">
                                    <i class="fas fa-gas-pump me-2"></i>
                                    <span><?php echo $_smarty_tpl->getValue('carburant')->getNom_carburant();?>
</span>
                                </div>
                            </td>
                            <td>
                                <div class="carburant-actions text-end">
                                    <?php if ($_smarty_tpl->getValue('canDelete')) {?>
                                    <button class="btn btn-icon text-danger delete-carburant" title="Supprimer" data-bs-toggle="modal" data-bs-target="#deleteCarburantModal" data-id="<?php echo $_smarty_tpl->getValue('carburant')->getId_carburant();?>
" data-nom="<?php echo $_smarty_tpl->getValue('carburant')->getNom_carburant();?>
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
                                <i class="fas fa-info-circle me-2"></i>Aucun carburant trouvé
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

<!-- Modal Ajout Carburant -->
<?php if ($_smarty_tpl->getValue('canAdd')) {?>
<div class="modal fade" id="addCarburantModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Ajouter un carburant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addCarburantForm" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="addCarburant">
                    <div class="form-group">
                        <label for="nomCarburant">Type de carburant</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-gas-pump"></i>
                            </span>
                            <input type="text" class="form-control" id="nomCarburant" name="nomCarburant" required placeholder="Saisir le type de carburant">
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

<!-- Modal Modification Carburant -->
<div class="modal fade" id="editCarburantModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Modifier un carburant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editCarburantForm" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="editCarburant">
                    <input type="hidden" name="id_carburant" id="editCarburantId">
                    <div class="form-group">
                        <label for="editNomCarburant">Type de carburant</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-gas-pump"></i>
                            </span>
                            <input type="text" class="form-control" id="editNomCarburant" name="nom_carburant" required>
                        </div>
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

<!-- Modal de confirmation de suppression -->
<?php if ($_smarty_tpl->getValue('canDelete')) {?>
<div class="modal fade" id="deleteCarburantModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-trash me-2"></i>Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="deleteCarburantForm" method="POST">
                <div class="modal-body text-center">
                    <input type="hidden" name="action" value="deleteCarburant">
                    <input type="hidden" name="id_carburant" id="deleteCarburantId">
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <p>Êtes-vous sûr de vouloir supprimer le carburant <strong id="deleteCarburantName"></strong> ?</p>
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
<?php }?>

<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la recherche avec animation
    const searchInput = document.getElementById('searchCarburant');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('.carburants-list tbody tr');
            
            rows.forEach(row => {
                const carburantName = row.querySelector('.carburant-name span')?.textContent.toLowerCase();
                if (carburantName) {
                    if (carburantName.includes(searchText)) {
                        row.style.display = '';
                        row.classList.add('animate__animated', 'animate__fadeIn');
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    }

    // Gestion du modal de modification avec animation
    const editModal = document.getElementById('editCarburantModal');
    if (editModal) {
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nom = button.getAttribute('data-nom');
            
            this.querySelector('#editCarburantId').value = id;
            this.querySelector('#editNomCarburant').value = nom;
        });
    }

    // Gestion du modal de suppression avec animation
    const deleteModal = document.getElementById('deleteCarburantModal');
    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nom = button.getAttribute('data-nom');
            
            this.querySelector('#deleteCarburantId').value = id;
            this.querySelector('#deleteCarburantName').textContent = nom;
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

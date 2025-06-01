<?php
/* Smarty version 5.5.1, created on 2025-06-01 14:31:08
  from 'file:views/sections/config.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c642c536015_21581553',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c855b82c0cd07463f74b3715b7ce7cfa3c7e64cb' => 
    array (
      0 => 'views/sections/config.html',
      1 => 1748788236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c642c536015_21581553 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!-- Ajout de la bibliothèque Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- Configuration des véhicules -->
<div class="config-container">

    <!-- Sections de configuration -->
    <div class="row g-4">
        <!-- Section Marques -->
        <div class="col-12 col-xl-4">
            <div class="config-card">
                <div class="config-header">
                    <h2><i class="fas fa-trademark me-2"></i>Marques</h2>
                    <?php if ($_smarty_tpl->getValue('canAdd')) {?>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addMarqueModal">
                        <i class="fas fa-plus me-2"></i>Ajouter
                    </button>
                    <?php }?>
                </div>
                <div class="config-body">
                    <div class="search-box mb-3">
                        <input type="text" class="form-control" placeholder="Rechercher une marque..." id="searchMarque">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="config-list" id="marquesList">
                        <?php if ((true && ($_smarty_tpl->hasVariable('marques') && null !== ($_smarty_tpl->getValue('marques') ?? null))) && !( !$_smarty_tpl->hasVariable('marques') || empty($_smarty_tpl->getValue('marques')))) {?>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach0DoElse = false;
?>
                                <div class="config-item" data-marque-id="<?php echo $_smarty_tpl->getValue('marque')->id_marque;?>
">
                                    <div class="item-content">
                                        <div class="item-info">
                                            <span class="item-name"><?php echo $_smarty_tpl->getValue('marque')->nom_marque;?>
</span>
                                        </div>
                                        <div class="item-actions">
                                            <?php if ($_smarty_tpl->getValue('canDelete')) {?>
                                            <button class="btn btn-icon text-danger delete-marque" title="Supprimer" data-id="<?php echo $_smarty_tpl->getValue('marque')->id_marque;?>
" data-nom="<?php echo $_smarty_tpl->getValue('marque')->nom_marque;?>
" data-bs-toggle="modal" data-bs-target="#deleteMarqueModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        <?php } else { ?>
                            <div class="text-center text-muted py-3">
                                <i class="fas fa-info-circle me-2"></i>Aucune marque trouvée
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Modèles -->
        <div class="col-12 col-xl-4">
            <div class="config-card">
                <div class="config-header">
                    <h2><i class="fas fa-car-side me-2"></i>Modèles</h2>
                    <?php if ($_smarty_tpl->getValue('canAdd')) {?>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModeleModal">
                        <i class="fas fa-plus me-2"></i>Ajouter
                    </button>
                    <?php }?>
                </div>
                <div class="config-body">
                    <div class="search-box mb-3">
                        <input type="text" class="form-control" placeholder="Rechercher un modèle..." id="searchModele">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="config-list">
                        <?php if ((true && ($_smarty_tpl->hasVariable('modelesParMarque') && null !== ($_smarty_tpl->getValue('modelesParMarque') ?? null))) && !( !$_smarty_tpl->hasVariable('modelesParMarque') || empty($_smarty_tpl->getValue('modelesParMarque')))) {?>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach1DoElse = false;
?>
                                <?php if ((true && (true && null !== ($_smarty_tpl->getValue('modelesParMarque')[$_smarty_tpl->getValue('marque')->id_marque] ?? null))) && !( !true || empty($_smarty_tpl->getValue('modelesParMarque')[$_smarty_tpl->getValue('marque')->id_marque]))) {?>
                                    <div class="marque-group mb-3">
                                        <h6 class="marque-title mb-2">
                                            <i class="fas fa-car-side me-2"></i><?php echo $_smarty_tpl->getValue('marque')->nom_marque;?>

                                        </h6>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modelesParMarque')[$_smarty_tpl->getValue('marque')->id_marque], 'modele');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('modele')->value) {
$foreach2DoElse = false;
?>
                                            <div class="config-item">
                                                <div class="item-content">
                                                    <div class="item-info">
                                                        <span class="item-name"><?php echo $_smarty_tpl->getValue('modele')->nom_modele;?>
</span>
                                                    </div>
                                                    <div class="item-actions">
                                                        <?php if ($_smarty_tpl->getValue('canDelete')) {?>
                                                        <button class="btn btn-icon text-danger" title="Supprimer" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#deleteModeleModal" 
                                                                data-modele-id="<?php echo $_smarty_tpl->getValue('modele')->id_modele;?>
"
                                                                data-modele-nom="<?php echo $_smarty_tpl->getValue('modele')->nom_modele;?>
">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    </div>
                                <?php }?>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        <?php } else { ?>
                            <div class="text-center text-muted py-3">
                                <i class="fas fa-info-circle me-2"></i>Aucun modèle trouvé
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Générations -->
        <div class="col-12 col-xl-4">
            <div class="config-card">
                <div class="config-header">
                    <h2><i class="fas fa-code-branch me-2"></i>Générations</h2>
                    <?php if ($_smarty_tpl->getValue('canAdd')) {?>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addGenerationModal">
                        <i class="fas fa-plus me-2"></i>Ajouter
                    </button>
                    <?php }?>
                </div>
                <div class="config-body">
                    <div class="search-box mb-3">
                        <input type="text" class="form-control" placeholder="Rechercher une génération..." id="searchGeneration">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="config-list">
                        <?php if ((true && ($_smarty_tpl->hasVariable('generationsParModele') && null !== ($_smarty_tpl->getValue('generationsParModele') ?? null))) && !( !$_smarty_tpl->hasVariable('generationsParModele') || empty($_smarty_tpl->getValue('generationsParModele')))) {?>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach3DoElse = false;
?>
                                <?php if ((true && (true && null !== ($_smarty_tpl->getValue('modelesParMarque')[$_smarty_tpl->getValue('marque')->id_marque] ?? null)))) {?>
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modelesParMarque')[$_smarty_tpl->getValue('marque')->id_marque], 'modele');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('modele')->value) {
$foreach4DoElse = false;
?>
                                        <?php if ((true && (true && null !== ($_smarty_tpl->getValue('generationsParModele')[$_smarty_tpl->getValue('modele')->id_modele] ?? null))) && !( !true || empty($_smarty_tpl->getValue('generationsParModele')[$_smarty_tpl->getValue('modele')->id_modele]))) {?>
                                            <div class="generation-group mb-3">
                                                <h6 class="modele-title mb-2">
                                                    <i class="fas fa-car-side me-2"></i><?php echo $_smarty_tpl->getValue('marque')->nom_marque;?>
 - <?php echo $_smarty_tpl->getValue('modele')->nom_modele;?>

                                                </h6>
                                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('generationsParModele')[$_smarty_tpl->getValue('modele')->id_modele], 'generation');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('generation')->value) {
$foreach5DoElse = false;
?>
                                                    <div class="config-item">
                                                        <div class="item-content">
                                                            <div class="item-info">
                                                                <span class="item-name"><?php echo $_smarty_tpl->getValue('generation')->nom_generation;?>
</span>
                                                            </div>
                                                            <div class="item-actions">
                                                                <?php if ($_smarty_tpl->getValue('canDelete')) {?>
                                                                <button class="btn btn-icon text-danger" title="Supprimer"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteGenerationModal"
                                                                        data-generation-id="<?php echo $_smarty_tpl->getValue('generation')->id_generation;?>
"
                                                                        data-generation-nom="<?php echo $_smarty_tpl->getValue('generation')->nom_generation;?>
">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                            </div>
                                        <?php }?>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                <?php }?>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        <?php } else { ?>
                            <div class="text-center text-muted py-3">
                                <i class="fas fa-info-circle me-2"></i>Aucune génération trouvée
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Marque -->
<div class="modal fade" id="addMarqueModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une marque</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addMarqueForm" method="POST">
                    <input type="hidden" name="action" value="addMarque">
                    <div class="form-group mb-3">
                        <label for="nomMarque">Nom de la marque</label>
                        <input type="text" class="form-control" id="nomMarque" name="nomMarque" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" form="addMarqueForm" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modification Marque -->
<div class="modal fade" id="editMarqueModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier une marque</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editMarqueForm">
                    <input type="hidden" id="editMarqueId" name="id_marque">
                    <div class="form-group mb-3">
                        <label for="editNomMarque">Nom de la marque</label>
                        <input type="text" class="form-control" id="editNomMarque" name="nom_marque" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" form="editMarqueForm" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Modèle -->
<div class="modal fade" id="addModeleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un modèle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addModeleForm" method="POST">
                    <input type="hidden" name="action" value="addModele">
                    <div class="form-group mb-3">
                        <label for="marqueModele">Marque</label>
                        <select class="form-select" id="marqueModele" name="marqueModele" required>
                            <option value="">Sélectionner une marque</option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach6DoElse = false;
?>
                            <option value="<?php echo $_smarty_tpl->getValue('marque')->id_marque;?>
"><?php echo $_smarty_tpl->getValue('marque')->nom_marque;?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomModele">Nom du modèle</label>
                        <input type="text" class="form-control" id="nomModele" name="nomModele" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" form="addModeleForm" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Génération -->
<div class="modal fade" id="addGenerationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une génération</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addGenerationForm" method="POST">
                    <input type="hidden" name="action" value="addGeneration">
                    <div class="form-group mb-3">
                        <label for="marqueGeneration">Marque</label>
                        <select class="form-select" id="marqueGeneration" name="marqueGeneration" required>
                            <option value="">Sélectionner une marque</option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach7DoElse = false;
?>
                            <option value="<?php echo $_smarty_tpl->getValue('marque')->id_marque;?>
"><?php echo $_smarty_tpl->getValue('marque')->nom_marque;?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="modeleGeneration">Modèle</label>
                        <select class="form-select" id="modeleGeneration" name="modeleGeneration" required disabled>
                            <option value="">Sélectionner d'abord une marque</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomGeneration">Nom de la génération</label>
                        <input type="text" class="form-control" id="nomGeneration" name="nomGeneration" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" form="addGenerationForm" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteMarqueModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                </div>
                <p class="text-center">Êtes-vous sûr de vouloir supprimer la marque <strong id="marqueToDelete"></strong> ?</p>
                <p class="text-center text-muted small">Cette action est irréversible.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="deleteMarqueForm" method="POST">
                    <input type="hidden" name="action" value="deleteMarque">
                    <input type="hidden" name="id_marque" id="deleteMarqueId">
                    <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression de modèle -->
<div class="modal fade" id="deleteModeleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                </div>
                <p class="text-center">Êtes-vous sûr de vouloir supprimer le modèle <strong id="modeleToDelete"></strong> ?</p>
                <p class="text-center text-muted small">Cette action est irréversible.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="deleteModeleForm" method="POST">
                    <input type="hidden" name="action" value="deleteModele">
                    <input type="hidden" name="id_modele" id="deleteModeleId">
                    <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression de génération -->
<div class="modal fade" id="deleteGenerationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                </div>
                <p class="text-center">Êtes-vous sûr de vouloir supprimer la génération <strong id="generationToDelete"></strong> ?</p>
                <p class="text-center text-muted small">Cette action est irréversible.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="deleteGenerationForm" method="POST">
                    <input type="hidden" name="action" value="deleteGeneration">
                    <input type="hidden" name="id_generation" id="deleteGenerationId">
                    <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }
}

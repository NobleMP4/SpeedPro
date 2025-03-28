<?php
/* Smarty version 5.4.3, created on 2025-03-24 12:46:26
  from 'file:views/sections/gestion.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e15422564a08_03321431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac005d195aa7cd4da968e0389fd5f79a7817b737' => 
    array (
      0 => 'views/sections/gestion.html',
      1 => 1742814081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e15422564a08_03321431 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/projet-php/views/sections';
?><div class="admin-container">
    <div class="row">
        <!-- Première rangée -->
        <div class="row mb-4">
            <!-- Marques, Modèles et Générations (Colonne gauche) -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-car"></i> Gestion des Véhicules</h3>
                    </div>
                    <div class="card-body">
                        <!-- Section Marques -->
                        <div class="admin-section mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><i class="fas fa-trademark"></i> Marques</h4>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMarqueModal">
                                    <i class="fas fa-plus"></i> Ajouter
                                </button>
                            </div>
                            <div class="list-group">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach0DoElse = false;
?>
                                <div class="list-group-item d-flex justify-content-between align-items-center marque-item">
                                    <?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>

                                    <button class="btn btn-danger btn-sm" data-id="<?php echo $_smarty_tpl->getValue('marque')->getId_marque();?>
">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>

                        <!-- Section Modèles -->
                        <div class="admin-section mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><i class="fas fa-car-side"></i> Modèles</h4>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModeleModal">
                                    <i class="fas fa-plus"></i> Ajouter
                                </button>
                            </div>
                            <div class="search-box mb-3">
                                <input type="text" class="form-control" placeholder="Rechercher un modèle...">
                            </div>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modeles_by_marque'), 'marque');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach1DoElse = false;
?>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong><?php echo $_smarty_tpl->getValue('marque')->nom_marque;?>
</strong>
                                </div>
                                <div class="list-group list-group-flush">
                                    <?php if ($_smarty_tpl->getValue('marque')->modeles) {?>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getSmarty()->getModifierCallback('split')($_smarty_tpl->getValue('marque')->modeles,','), 'mod');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mod')->value) {
$foreach2DoElse = false;
?>
                                            <?php $_smarty_tpl->assign('mod_parts', $_smarty_tpl->getSmarty()->getModifierCallback('split')($_smarty_tpl->getValue('mod'),':'), false, NULL);?>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php echo $_smarty_tpl->getValue('mod_parts')[1];?>

                                                <button class="btn btn-danger btn-sm" data-id="<?php echo $_smarty_tpl->getValue('mod_parts')[0];?>
">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    <?php } else { ?>
                                        <div class="list-group-item text-muted">
                                            Aucun modèle
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </div>

                        <!-- Section Générations -->
                        <div class="admin-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><i class="fas fa-code-branch"></i> Générations</h4>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGenerationModal">
                                    <i class="fas fa-plus"></i> Ajouter
                                </button>
                            </div>
                            <div class="search-box mb-3">
                                <input type="text" class="form-control" placeholder="Rechercher une génération...">
                            </div>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('generations_by_model'), 'model');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('model')->value) {
$foreach3DoElse = false;
?>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong><?php echo $_smarty_tpl->getValue('model')->nom_marque;?>
 - <?php echo $_smarty_tpl->getValue('model')->nom_modele;?>
</strong>
                                </div>
                                <div class="list-group list-group-flush">
                                    <?php if ($_smarty_tpl->getValue('model')->generations) {?>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getSmarty()->getModifierCallback('split')($_smarty_tpl->getValue('model')->generations,','), 'gen');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('gen')->value) {
$foreach4DoElse = false;
?>
                                            <?php $_smarty_tpl->assign('gen_parts', $_smarty_tpl->getSmarty()->getModifierCallback('split')($_smarty_tpl->getValue('gen'),':'), false, NULL);?>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php echo $_smarty_tpl->getValue('gen_parts')[1];?>

                                                <button class="btn btn-danger btn-sm" data-id="<?php echo $_smarty_tpl->getValue('gen_parts')[0];?>
">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    <?php } else { ?>
                                        <div class="list-group-item text-muted">
                                            Aucune génération
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Options et Carburants (Colonne droite) -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-cogs"></i> Caractéristiques</h3>
                    </div>
                    <div class="card-body">
                        <!-- Section Options -->
                        <div class="admin-section mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><i class="fas fa-list"></i> Options</h4>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addOptionModal">
                                    <i class="fas fa-plus"></i> Ajouter
                                </button>
                            </div>
                            <div class="list-group">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('options'), 'option');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach5DoElse = false;
?>
                                <div class="list-group-item d-flex justify-content-between align-items-center option-item">
                                    <?php echo $_smarty_tpl->getValue('option')->getNom_option();?>

                                    <button class="btn btn-danger btn-sm" data-id="<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>

                        <!-- Section Carburants -->
                        <div class="admin-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><i class="fas fa-gas-pump"></i> Carburants</h4>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCarburantModal">
                                    <i class="fas fa-plus"></i> Ajouter
                                </button>
                            </div>
                            <div class="list-group">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('carburants'), 'carburant');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('carburant')->value) {
$foreach6DoElse = false;
?>
                                <div class="list-group-item d-flex justify-content-between align-items-center carburant-item">
                                    <?php echo $_smarty_tpl->getValue('carburant')->getNom_carburant();?>

                                    <button class="btn btn-danger btn-sm" data-id="<?php echo $_smarty_tpl->getValue('carburant')->getId_carburant();?>
">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Option -->
<div class="modal fade" id="addOptionModal" tabindex="-1" aria-labelledby="addOptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOptionModalLabel">
                    <i class="fas fa-plus"></i> Ajouter une option
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addOptionForm">
                    <div class="mb-3">
                        <label for="nom_option" class="form-label">Nom de l'option</label>
                        <input type="text" class="form-control" id="nom_option" name="nom_option">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Carburant -->
<div class="modal fade" id="addCarburantModal" tabindex="-1" aria-labelledby="addCarburantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarburantModalLabel">
                    <i class="fas fa-gas-pump"></i> Ajouter un carburant
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCarburantForm">
                    <div class="mb-3">
                        <label for="nom_carburant" class="form-label">Nom du carburant</label>
                        <input type="text" class="form-control" id="nom_carburant" name="nom_carburant">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Marque -->
<div class="modal fade" id="addMarqueModal" tabindex="-1" aria-labelledby="addMarqueModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMarqueModalLabel">
                    <i class="fas fa-trademark"></i> Ajouter une marque
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addMarqueForm">
                    <div class="mb-3">
                        <label for="nom_marque" class="form-label">Nom de la marque</label>
                        <input type="text" class="form-control" id="nom_marque" name="nom_marque">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Modèle -->
<div class="modal fade" id="addModeleModal" tabindex="-1" aria-labelledby="addModeleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModeleModalLabel">
                    <i class="fas fa-car-side"></i> Ajouter un modèle
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addModeleForm">
                    <div class="mb-3">
                        <label for="marque_modele" class="form-label">Marque</label>
                        <select class="form-select" id="marque_modele" name="marque_modele" required>
                            <option value="">Sélectionnez une marque</option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach7DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('marque')->getId_marque();?>
"><?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nom_modele" class="form-label">Nom du modèle</label>
                        <input type="text" class="form-control" id="nom_modele" name="nom_modele">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Génération -->
<div class="modal fade" id="addGenerationModal" tabindex="-1" aria-labelledby="addGenerationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGenerationModalLabel">
                    <i class="fas fa-code-branch"></i> Ajouter une génération
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addGenerationForm">
                    <div class="mb-3">
                        <label for="marque_generation" class="form-label">Marque</label>
                        <select class="form-select" id="marque_generation" name="marque_generation" required>
                            <option value="">Sélectionnez une marque</option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach8DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('marque')->getId_marque();?>
"><?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="modele_generation" class="form-label">Modèle</label>
                        <select class="form-select" id="modele_generation" name="modele_generation" required>
                            <option value="">Sélectionnez d'abord une marque</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nom_generation" class="form-label">Nom de la génération</label>
                        <input type="text" class="form-control" id="nom_generation" name="nom_generation">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>
<?php }
}

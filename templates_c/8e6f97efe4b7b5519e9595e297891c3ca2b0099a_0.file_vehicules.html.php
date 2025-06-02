<?php
/* Smarty version 5.5.1, created on 2025-06-02 07:10:54
  from 'file:views/sections/vehicules.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683d4e7e33d786_78538683',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e6f97efe4b7b5519e9595e297891c3ca2b0099a' => 
    array (
      0 => 'views/sections/vehicules.html',
      1 => 1748783489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683d4e7e33d786_78538683 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
?><!-- Gestion des Véhicules -->
<div class="vehicles-container">
    <!-- Messages d'erreur et de succès -->
    <?php if ($_smarty_tpl->getValue('error_message')) {?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_smarty_tpl->getValue('error_message');?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getValue('success_message')) {?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_smarty_tpl->getValue('success_message');?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }?>

    <!-- Grille des véhicules -->
    <div class="row g-4">
        <!-- Case d'ajout -->
        <?php if ($_smarty_tpl->getValue('canAddVehicle')) {?>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="vehicle-card add-card" data-bs-toggle="modal" data-bs-target="#addVehicleModal">
                <div class="vehicle-image add-image">
                    <div class="add-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="vehicle-info">
                    <h3>Ajouter un véhicule</h3>
                    <div class="vehicle-specs">
                        <span>Cliquez pour ajouter un nouveau véhicule à l'inventaire</span>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>

        <!-- Liste des véhicules -->
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehicules'), 'vehicule');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehicule')->value) {
$foreach0DoElse = false;
?>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="vehicle-card">
                <div class="vehicle-image">
                    <?php $_smarty_tpl->assign('images', $_smarty_tpl->getValue('vehicule')->getImages(), false, NULL);?>
                    <?php if ($_smarty_tpl->getValue('images') && is_array($_smarty_tpl->getValue('images')) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('images')) > 0 && $_smarty_tpl->getValue('images')[0]->getUrl_image()) {?>
                        <img src="<?php echo $_smarty_tpl->getValue('images')[0]->getUrl_image();?>
" alt="<?php echo $_smarty_tpl->getValue('images')[0]->getAlt_image();?>
">
                    <?php } else { ?>
                        <img src="assets/imgs/logo.png" alt="Image par défaut">
                    <?php }?>
                </div>
                <div class="vehicle-info">
                    <h3><?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getMarque()->getNom_marque();?>
 <?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getNom_modele();
if ($_smarty_tpl->getValue('vehicule')->getGeneration()) {?> <?php echo $_smarty_tpl->getValue('vehicule')->getGeneration()->getNom_generation();
}?></h3>
                    <div class="vehicle-specs">
                        <span><i class="fas fa-calendar"></i> <?php echo $_smarty_tpl->getValue('vehicule')->getAnnee_vehicule();?>
</span>
                        <span><i class="fas fa-tachometer-alt"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getKilometrage_vehicule(),0,','," ");?>
 km</span>
                        <span><i class="fas fa-gas-pump"></i> <?php echo $_smarty_tpl->getValue('vehicule')->getCarburant()->getNom_carburant();?>
</span>
                    </div>
                    <div class="vehicle-description mt-3">
                        <p class="text-light mb-3"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('vehicule')->getDescription_vehicule(),150,"...");?>
</p>
                    </div>
                    <div class="vehicle-price">
                        <span class="price"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getPrix_vehicule(),0,','," ");?>
 €</span>
                    </div>
                    <div class="vehicle-actions">
                        <a href="?p=vehicule&id=<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
" class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                            Détails
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
</div>

<!-- Modal d'ajout de véhicule -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVehicleModalLabel">Ajouter un véhicule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <form id="addVehicleForm" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="action" value="addVehicule">
                    <div class="row g-3">
                        <!-- Sélection Marque/Modèle/Génération -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marque">Marque</label>
                                <select class="form-select" id="marque" name="marque" required>
                                    <option value="">Sélectionner une marque</option>
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach1DoElse = false;
?>
                                        <option value="<?php echo $_smarty_tpl->getValue('marque')->getId_marque();?>
"><?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>
</option>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modele">Modèle</label>
                                <select class="form-select" id="modele" name="modele" required >
                                    <option value="">Sélectionner un modèle</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="generation">Génération</label>
                                <select class="form-select" id="generation" name="generation" >
                                    <option value="">Sélectionner une génération</option>
                                </select>
                            </div>
                        </div>

                        <!-- Autres champs existants -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="carburant">Carburant</label>
                                <select class="form-select" id="carburant" name="carburant" required>
                                    <option value="">Sélectionner un carburant</option>
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('carburants'), 'carburant');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('carburant')->value) {
$foreach2DoElse = false;
?>
                                        <option value="<?php echo $_smarty_tpl->getValue('carburant')->getId_carburant();?>
">
                                            <?php echo $_smarty_tpl->getValue('carburant')->getNom_carburant();?>

                                        </option>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="annee">Année</label>
                                <input type="number" class="form-control" id="annee" name="annee" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" id="prix" name="prix" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kilometrage">Kilométrage</label>
                                <input type="number" class="form-control" id="kilometrage" name="kilometrage" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="boiteVitesse">Boîte de vitesse</label>
                                <select class="form-select" id="boiteVitesse" name="boiteVitesse" required>
                                    <option value="">Sélectionner</option>
                                    <option value="Manuelle">Manuelle</option>
                                    <option value="Automatique">Automatique</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="puissance">Puissance (ch)</label>
                                <input type="number" class="form-control" id="puissance" name="puissance" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="puissanceFiscale">Puissance fiscale</label>
                                <input type="number" class="form-control" id="puissanceFiscale" name="puissanceFiscale">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="immatriculation">Immatriculation</label>
                                <input type="text" class="form-control" id="immatriculation" name="immatriculation" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>
                        </div>

                        <!-- Images -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="images">Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/png,image/jpeg,image/jpg,image/webp">
                                <small class="form-text text-light">Formats acceptés : PNG, JPG, JPEG, WEBP</small>
                            </div>
                        </div>

                        <!-- Options -->
                        <div class="col-12 mt-4 options-section">
                            <div class="form-group">
                                <label class="mb-3">
                                    <i class="fas fa-list-check me-2"></i>Options du véhicule
                                </label>
                                <div class="row g-3">
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('options'), 'option');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach3DoElse = false;
?>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="options[]" value="<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
" id="option_<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
">
                                            <label class="form-check-label text-light" for="option_<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
">
                                                <?php echo $_smarty_tpl->getValue('option')->getNom_option();?>

                                            </label>
                                        </div>
                                    </div>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter le véhicule</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}

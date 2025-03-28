<?php
/* Smarty version 5.4.3, created on 2025-02-25 13:43:56
  from 'file:views/sections/vehicules.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67bdc91c6b2550_33348944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f790e8e1c0f5f0f4b813e8905406c138892d4ad' => 
    array (
      0 => 'views/sections/vehicules.html',
      1 => 1740491034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67bdc91c6b2550_33348944 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/projet-php/views/sections';
?><section class="vehicules-section">
    <div class="container-fluid">
        <div class="row">
            <!-- Colonne des filtres -->
            <div class="col-lg-2 filters-column">
                <div class="filters-sidebar">
                    <div class="filters-header">
                        <h3>Filtres</h3>
                        <button class="filters-btn-reset" onclick="resetFilters()">
                            <i class="fas fa-undo"></i> Réinitialiser
                        </button>
                    </div>
                
                    <form id="filters-form" class="filters-content">
                        <!-- Prix -->
                        <div class="filters-group">
                            <h4>Prix</h4>
                            <div class="price-inputs">
                                <div class="input-group">
                                    <input type="number" id="prix-min" name="prix-min" placeholder="Min">
                                    <span>€</span>
                                </div>
                                <div class="separator">-</div>
                                <div class="input-group">
                                    <input type="number" id="prix-max" name="prix-max" placeholder="Max">
                                    <span>€</span>
                                </div>
                            </div>
                        </div>
                
                        <!-- Puissance -->
                        <div class="filters-group">
                            <h4>Puissance</h4>
                            <div class="price-inputs">
                                <div class="input-group">
                                    <input type="number" id="puissance-min" name="puissance-min" placeholder="Min">
                                    <span>ch</span>
                                </div>
                                <div class="separator">-</div>
                                <div class="input-group">
                                    <input type="number" id="puissance-max" name="puissance-max" placeholder="Max">
                                    <span>ch</span>
                                </div>
                            </div>
                        </div>
                
                        <!-- Kilométrage -->
                        <div class="filters-group">
                            <h4>Kilométrage</h4>
                            <div class="range-slider">
                                <input type="range" id="kilometrage" name="kilometrage" min="0" max="200000" step="5000">
                                <div class="range-value"><span id="km-value">100000</span> km</div>
                            </div>
                        </div>
                
                        <!-- Année -->
                        <div class="filters-group">
                            <h4>Année</h4>
                            <select name="annee" id="annee" class="form-select">
                                <option value="">Toutes les années</option>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('annees'), 'annee');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('annee')->value) {
$foreach0DoElse = false;
?>
                                    <option value="<?php echo $_smarty_tpl->getValue('annee')->annee;?>
"><?php echo $_smarty_tpl->getValue('annee')->annee;?>
</option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                
                        <!-- Marque -->
                        <div class="filters-group">
                            <h4>Marque</h4>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach1DoElse = false;
?>
                            <div class="filters-checkbox-list">
                                <label class="filters-checkbox-item">
                                    <input type="checkbox" name="marque[]" value="Peugeot">
                                    <span class="filters-checkmark"></span>
                                    <div class="filters-brand-info">
                                        <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/9/9d/Peugeot_2021_Logo.svg/699px-Peugeot_2021_Logo.svg.png" alt="Logo Peugeot" class="filters-brand-logo">
                                            <span class="filters-brand-name"><?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>
</span>
                                    </div>
                                </label>
                            </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            <br>
                            <button type="button" class="btn btn-dark" onclick="openAddMarqueModal()">
                                Ajouter une marque
                            </button>
                
                        </div>
                        
                        <!-- modèle -->
                        <div class="filters-group">
                            <h4>Modèle</h4>
                            <select name="modele" id="modele" class="form-select">
                                <option value="">Tous les modèles</option>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modeles'), 'modele');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('modele')->value) {
$foreach2DoElse = false;
?>
                                    <?php $_smarty_tpl->assign('generations', $_smarty_tpl->getValue('modele')->getGenerations(), false, NULL);?>
                                    <option value="<?php echo $_smarty_tpl->getValue('modele')->getId_modele();?>
">
                                        <?php echo $_smarty_tpl->getValue('modele')->getNom_modele();?>

                                        <?php if ($_smarty_tpl->getValue('generations')) {?>
                                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('generations'), 'generation');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('generation')->value) {
$foreach3DoElse = false;
?>
                                                - <?php echo $_smarty_tpl->getValue('generation')->getNom_generation();?>

                                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                        <?php }?>
                                    </option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                            <br>
                            <button type="button" class="btn btn-dark" onclick="openAddModeleModal()">
                                Ajouter un modèle
                            </button>
                        </div>
                
                        <!-- Carburant -->
                        <div class="filters-group">
                            <h4>Carburant</h4>
                            <div class="checkbox-list">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('carburants'), 'carburant');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('carburant')->value) {
$foreach4DoElse = false;
?>
                                <label class="checkbox-item">
                                    <input type="checkbox" 
                                           name="carburant[]" 
                                           value="<?php echo $_smarty_tpl->getValue('carburant')->getId_carburant();?>
"
                                           id="carburant-<?php echo $_smarty_tpl->getValue('carburant')->getId_carburant();?>
">
                                    <span class="checkbox-mark"></span>
                                    <span class="checkbox-label"><?php echo $_smarty_tpl->getValue('carburant')->getNom_carburant();?>
</span>
                                </label>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </div>
                            <br>
                            <button type="button" class="btn btn-dark" onclick="openAddCarburantModal()">
                                Ajouter un carburant
                            </button>
                        </div>
                
                        <div class="filters-group">
                            <h4>Options</h4>
                            <div class="checkbox-list">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('options'), 'option');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach5DoElse = false;
?>
                                <label class="checkbox-item">
                                    <input type="checkbox" 
                                           name="carburant[]" 
                                           value="<?php echo $_smarty_tpl->getValue('carburant')->getId_carburant();?>
"
                                           id="carburant-<?php echo $_smarty_tpl->getValue('carburant')->getId_carburant();?>
">
                                    <span class="checkbox-mark"></span>
                                    <span class="checkbox-label"><?php echo $_smarty_tpl->getValue('option')->getNom_option();?>
</span>
                                </label>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </div>
                            <br>
                            <button type="button" class="btn btn-dark" onclick="openAddOptionModal()">
                                Ajouter une option
                            </button>
                        </div>
                
                        <button type="submit" class="btn-apply">
                            Appliquer les filtres
                        </button>
                    </form>
                </div>
            </div>  

            <!-- Colonne de la liste des véhicules -->
            <div class="col-lg-10 vehicles-column">
                <div class="vehicles-section">
                    <div class="container">
                        <div class="vehicles-grid">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehicules'), 'vehicule');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehicule')->value) {
$foreach6DoElse = false;
?>
                            <div class="vehicle-card">
                                <div class="vehicle-image">
                                    <?php if (!( !true || empty($_smarty_tpl->getValue('vehicule')->getImages()))) {?>
                                        <?php $_smarty_tpl->assign('images', $_smarty_tpl->getValue('vehicule')->getImages(), false, NULL);?>
                                        <img src="assets/imgs/vehicules/<?php echo $_smarty_tpl->getValue('images')[0]->getUrl_image();?>
" alt="<?php echo $_smarty_tpl->getValue('images')[0]->getAlt_image();?>
">
                                    <?php } else { ?>
                                        <img src="assets/imgs/default-vehicle.jpg" alt="Image par défaut">
                                    <?php }?>
                                    <span class="vehicle-price"><?php echo $_smarty_tpl->getValue('vehicule')->getPrix_vehicule();?>
 €</span>
                                    <span class="vehicle-year"><?php echo $_smarty_tpl->getValue('vehicule')->getAnnee_vehicule();?>
</span>
                                </div>
                                <div class="vehicle-content">
                                    <h3 class="vehicle-title">
                                        <?php echo $_smarty_tpl->getValue('vehicule')->getMarque()->getNom_marque();?>
 
                                        <?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getNom_modele();?>

                                        <?php if ($_smarty_tpl->getValue('vehicule')->getGeneration()) {?>
                                            <?php echo $_smarty_tpl->getValue('vehicule')->getGeneration()->getNom_generation();?>

                                        <?php }?>
                                    </h3>
                                    <div class="vehicle-specs">
                                        <div class="spec-item">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span><?php echo $_smarty_tpl->getValue('vehicule')->getKilometrage_vehicule();?>
 km</span>
                                        </div>
                                        <div class="spec-item">
                                            <i class="fas fa-gas-pump"></i>
                                            <span><?php echo $_smarty_tpl->getValue('vehicule')->getCarburant()->getNom_carburant();?>
</span>
                                        </div>
                                        <div class="spec-item">
                                            <i class="fas fa-cog"></i>
                                            <span><?php echo $_smarty_tpl->getValue('vehicule')->getBoite_vitesse_vehicule();?>
</span>
                                        </div>
                                    </div>
                                    <p class="vehicle-description">
                                        <?php echo $_smarty_tpl->getValue('vehicule')->getDescription_vehicule();?>

                                    </p>
                                    <div class="vehicle-actions">
                                        <a href="?p=vehiculeseul&id=<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
" class="btn-details">Voir détails</a>
                                    </div>
                                </div>
                            </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

                            <!-- Bouton Ajouter un véhicule -->
                            <div class="add-vehicle-card" onclick="openAddVehicleForm()">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4V20M4 12H20" stroke="#666666" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal pour le formulaire d'ajout -->
<div id="addVehicleModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Ajouter un véhicule</h2>
            <span class="close">&times;</span>
        </div>
        <form id="addVehicleForm" action="?p=vehicules&action=add" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="marque">Marque</label>
                <select name="marque" id="marque" required onchange="updateModeles()">
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

            <div class="form-group">
                <label for="modele">Modèle</label>
                <select name="modele" id="modele" required onchange="updateMarque();">
                    <option value="">Sélectionnez un modèle</option>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach8DoElse = false;
?>
                        <optgroup label="<?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>
">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modeles'), 'modele');
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('modele')->value) {
$foreach9DoElse = false;
?>
                                <?php if ($_smarty_tpl->getValue('modele')->getMarque()->getId_marque() == $_smarty_tpl->getValue('marque')->getId_marque()) {?>
                                    <option value="<?php echo $_smarty_tpl->getValue('modele')->getId_modele();?>
" 
                                            data-marque="<?php echo $_smarty_tpl->getValue('marque')->getId_marque();?>
">
                                        <?php echo $_smarty_tpl->getValue('modele')->getNom_modele();?>

                                    </option>
                                <?php }?>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </optgroup>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <div class="form-group">
                <label for="generation">Génération</label>
                <select name="generation" id="generation" required onchange="updateGenerations();">
                    <option value="">Sélectionnez une génération</option>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modeles'), 'modele');
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('modele')->value) {
$foreach10DoElse = false;
?>
                        <?php $_smarty_tpl->assign('generations', $_smarty_tpl->getValue('modele')->getGenerations(), false, NULL);?>
                        <?php if ($_smarty_tpl->getValue('generations')) {?>
                            <optgroup label="<?php echo $_smarty_tpl->getValue('modele')->getNom_modele();?>
">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('generations'), 'generation');
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('generation')->value) {
$foreach11DoElse = false;
?>
                                    <option value="<?php echo $_smarty_tpl->getValue('generation')->getId_generation();?>
" 
                                            data-modele="<?php echo $_smarty_tpl->getValue('modele')->getId_modele();?>
">
                                        <?php echo $_smarty_tpl->getValue('generation')->getNom_generation();?>

                                    </option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </optgroup>
                        <?php }?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <div class="form-group">
                <label for="annee">Année</label>
                <input type="number" name="annee" id="annee" required>
            </div>

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" name="prix" id="prix" required>
            </div>

            <div class="form-group">
                <label for="kilometrage">Kilométrage</label>
                <input type="number" name="kilometrage" id="kilometrage" required>
            </div>

            <div class="form-group">
                <label for="carburant">Carburant</label>
                <select name="carburant" id="carburant" required>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('carburants'), 'carburant');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('carburant')->value) {
$foreach12DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('carburant')->getId_carburant();?>
"><?php echo $_smarty_tpl->getValue('carburant')->getNom_carburant();?>
</option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <div class="form-group">
                <label for="boite">Boîte de vitesse</label>
                <select name="boite" id="boite" required>
                    <option value="Manuelle">Manuelle</option>
                    <option value="Automatique">Automatique</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="puissance">Puissance (en ch)</label>
                <input type="number" name="puissance" id="puissance" required>
            </div>

            <div class="form-group">
                <label for="puissance_fiscale">Puissance fiscale (en cv)</label>
                <input type="number" 
                       name="puissance_fiscale" 
                       id="puissance_fiscale" 
                       required 
                       min="1" 
                       max="100"
                       placeholder="Ex: 7">
                <small class="form-text text-muted">
                    Nombre de chevaux fiscaux du véhicule
                </small>
            </div>

            <div class="form-group">
                <label for="immatriculation">Immatriculation</label>
                <input type="text" name="immatriculation" id="immatriculation" required>
            </div>

            <div class="form-group">
                <label for="statut">Statut</label>
                <select name="statut" id="statut" required>
                    <option value="Disponible">Disponible</option>
                    <option value="Vendu">Vendu</option>
                </select>
            </div>

            <div class="form-group">
                <label>Options</label>
                <div class="options-grid">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('options'), 'option');
$foreach13DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach13DoElse = false;
?>
                        <div class="option-checkbox">
                            <input type="checkbox" 
                                   name="options[]" 
                                   id="option-<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
" 
                                   value="<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
">
                            <label for="option-<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
">
                                <?php echo $_smarty_tpl->getValue('option')->getNom_option();?>

                            </label>
                        </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            </div>

            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" 
                       name="images[]" 
                       id="images" 
                       multiple 
                       accept="image/jpeg,image/png,image/gif"
                       class="form-control-file">
                <small class="form-text text-muted">
                    Formats acceptés : JPG, PNG, GIF. Taille maximale : 5MB par image.
                    Vous pouvez sélectionner plusieurs images.
                </small>
            </div>

            <button type="submit" class="btn-submit">Ajouter le véhicule</button>
        </form>
    </div>
</div>

<!-- Modal pour l'ajout de marque -->
<div id="addMarqueModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Ajouter une marque</h2>
            <span class="close">&times;</span>
        </div>
        <form id="addMarqueForm" action="?p=vehicules&action=addMarque" method="POST">
            <div class="form-group">
                <label for="nom_marque">Nom de la marque</label>
                <input type="text" name="nom_marque" id="nom_marque" required>
            </div>
            <button type="submit" class="btn-submit">Ajouter la marque</button>
        </form>
    </div>
</div>

<!-- Modal pour l'ajout de modèle -->
<div id="addModeleModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Ajouter un modèle</h2>
            <span class="close">&times;</span>
        </div>
        <form id="addModeleForm" action="?p=vehicules&action=addModele" method="POST">
            <div class="form-group">
                <label for="marque_modele">Marque</label>
                <select name="marque_modele" id="marque_modele" required>
                    <option value="">Sélectionnez une marque</option>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach14DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach14DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('marque')->getId_marque();?>
"><?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>
</option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <div class="form-group">
                <label for="nom_modele">Nom du modèle</label>
                <input type="text" name="nom_modele" id="nom_modele" required>
            </div>
            <div class="form-group">
                <label for="generations">Générations disponibles</label>
                <div class="generations-grid">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('generations'), 'generation');
$foreach15DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('generation')->value) {
$foreach15DoElse = false;
?>
                        <div class="generation-checkbox">
                            <input type="checkbox" 
                                   name="generations[]" 
                                   id="generation-<?php echo $_smarty_tpl->getValue('generation')->getId_generation();?>
" 
                                   value="<?php echo $_smarty_tpl->getValue('generation')->getId_generation();?>
">
                            <label for="generation-<?php echo $_smarty_tpl->getValue('generation')->getId_generation();?>
">
                                <?php echo $_smarty_tpl->getValue('generation')->getNom_generation();?>

                            </label>
                        </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            </div>
            <button type="submit" class="btn-submit">Ajouter le modèle</button>
        </form>
    </div>
</div>

<!-- Modal pour l'ajout de carburant -->
<div id="addCarburantModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Ajouter un carburant</h2>
            <span class="close">&times;</span>
        </div>
        <form id="addCarburantForm" action="?p=vehicules&action=addCarburant" method="POST">
            <div class="form-group">
                <label for="nom_carburant">Nom du carburant</label>
                <input type="text" name="nom_carburant" id="nom_carburant" required>
            </div>
            <button type="submit" class="btn-submit">Ajouter le carburant</button>
        </form>
    </div>
</div>

<!-- Modal pour l'ajout d'option -->
<div id="addOptionModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Ajouter une option</h2>
            <span class="close">&times;</span>
        </div>
        <form id="addOptionForm" action="?p=vehicules&action=addOption" method="POST">
            <div class="form-group">
                <label for="nom_option">Nom de l'option</label>
                <input type="text" name="nom_option" id="nom_option" required>
            </div>
            <button type="submit" class="btn-submit">Ajouter l'option</button>
        </form>
    </div>
</div>
<?php }
}

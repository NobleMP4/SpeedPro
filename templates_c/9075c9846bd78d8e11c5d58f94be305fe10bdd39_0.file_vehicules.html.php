<?php
/* Smarty version 5.4.3, created on 2025-03-24 12:03:24
  from 'file:views/sections/vehicules.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e14a0c1b8936_26558938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9075c9846bd78d8e11c5d58f94be305fe10bdd39' => 
    array (
      0 => 'views/sections/vehicules.html',
      1 => 1742817801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e14a0c1b8936_26558938 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/projet-php/views/sections';
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
                                            <span class="filters-brand-name"><?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>
</span>
                                    </div>
                                </label>
                            </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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
                        <!-- Section du formulaire d'ajout -->
                        <div id="addVehicleFormSection" class="new-client-form-section" style="display: none;">
                            <div class="form-header">
                                <h2>Ajouter un véhicule</h2>
                                <button type="button" class="close-form" onclick="closeAddVehicleForm()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <form id="addVehicleForm" class="form-grid">
                                <!-- Première ligne -->
                                <div class="form-group">
                                    <label for="marque">Marque</label>
                                    <select name="marque" id="marque" required>
                                        <option value="">Sélectionnez une marque</option>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach6DoElse = false;
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
                                    <select name="modele" id="modele" required>
                                        <option value="">Sélectionnez un modèle</option>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('marques'), 'marque');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach7DoElse = false;
?>
                                            <optgroup label="<?php echo $_smarty_tpl->getValue('marque')->getNom_marque();?>
">
                                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modeles'), 'modele');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('modele')->value) {
$foreach8DoElse = false;
?>
                                                    <?php if ($_smarty_tpl->getValue('modele')->getMarque()->getId_marque() == $_smarty_tpl->getValue('marque')->getId_marque()) {?>
                                                        <option value="<?php echo $_smarty_tpl->getValue('modele')->getId_modele();?>
" data-marque="<?php echo $_smarty_tpl->getValue('marque')->getId_marque();?>
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

                                <!-- Deuxième ligne -->
                                <div class="form-group">
                                    <label for="generation">Génération</label>
                                    <select name="generation" id="generation">
                                        <option value="">Sélectionnez une génération</option>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modeles'), 'modele');
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('modele')->value) {
$foreach9DoElse = false;
?>
                                            <?php $_smarty_tpl->assign('generations', $_smarty_tpl->getValue('modele')->getGenerations(), false, NULL);?>
                                            <?php if ($_smarty_tpl->getValue('generations')) {?>
                                                <optgroup label="<?php echo $_smarty_tpl->getValue('modele')->getNom_modele();?>
">
                                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('generations'), 'generation');
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('generation')->value) {
$foreach10DoElse = false;
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

                                <!-- Troisième ligne -->
                                <div class="form-group">
                                    <label for="prix">Prix</label>
                                    <input type="number" name="prix" id="prix" required>
                                </div>

                                <div class="form-group">
                                    <label for="kilometrage">Kilométrage</label>
                                    <input type="number" name="kilometrage" id="kilometrage" required>
                                </div>

                                <!-- Quatrième ligne -->
                                <div class="form-group">
                                    <label for="carburant">Carburant</label>
                                    <select name="carburant" id="carburant" required>
                                        <option value="">Sélectionnez un carburant</option>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('carburants'), 'carburant');
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('carburant')->value) {
$foreach11DoElse = false;
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

                                <!-- Cinquième ligne -->
                                <div class="form-group">
                                    <label for="puissance">Puissance (en ch)</label>
                                    <input type="number" name="puissance" id="puissance" required>
                                </div>

                                <div class="form-group">
                                    <label for="immatriculation">Immatriculation</label>
                                    <input type="text" name="immatriculation" id="immatriculation" required>
                                </div>

                                <!-- Description (pleine largeur) -->
                                <div class="form-group full-width">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="4" required></textarea>
                                </div>

                                <!-- Options (pleine largeur) -->
                                <div class="form-group full-width">
                                    <label>Options</label>
                                    <div class="options-grid">
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('options'), 'option');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach12DoElse = false;
?>
                                            <div class="option-checkbox">
                                                <input type="checkbox" name="options[]" id="option-<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
" value="<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
">
                                                <label for="option-<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
"><?php echo $_smarty_tpl->getValue('option')->getNom_option();?>
</label>
                                            </div>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    </div>
                                </div>

                                <!-- Images (pleine largeur) -->
                                <div class="form-group full-width">
                                    <label for="images">Images</label>
                                    <input type="file" name="images[]" id="images" multiple accept="image/jpeg,image/png,image/gif">
                                    <small class="form-text text-muted">
                                        Formats acceptés : JPG, PNG, GIF. Taille maximale : 5MB par image.
                                    </small>
                                </div>

                                <!-- Boutons d'action -->
                                <div class="form-actions full-width">
                                    <button type="button" class="btn-secondary" onclick="closeAddVehicleForm()">Annuler</button>
                                    <button type="submit" class="btn-primary">Ajouter le véhicule</button>
                                </div>
                            </form>
                        </div>

                        <div class="vehicles-grid">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehicules'), 'vehicule');
$foreach13DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehicule')->value) {
$foreach13DoElse = false;
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
<?php }
}

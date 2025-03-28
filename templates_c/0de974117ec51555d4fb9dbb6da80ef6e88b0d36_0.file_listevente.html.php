<?php
/* Smarty version 5.4.3, created on 2025-03-12 15:29:00
  from 'file:views/sections/listevente.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67d1a83c3b0938_68016821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0de974117ec51555d4fb9dbb6da80ef6e88b0d36' => 
    array (
      0 => 'views/sections/listevente.html',
      1 => 1741793340,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67d1a83c3b0938_68016821 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/projet-php/views/sections';
?><section class="vehicles-page">
    <div class="container-fluid">
        <div class="row">
            <!-- Colonne de la liste des véhicules -->
            <div class="col-lg-12 vehicles-column">
                <div class="vehicles-section">
                    <div class="vehicles-grid">
                        <?php if ((true && ($_smarty_tpl->hasVariable('vehicules') && null !== ($_smarty_tpl->getValue('vehicules') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('vehicules')) > 0) {?>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehicules'), 'vehicule');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehicule')->value) {
$foreach0DoElse = false;
?>
                                <div class="vehicle-card">
                                    <div class="vehicle-image">
                                        <?php if ((true && (true && null !== ($_smarty_tpl->getValue('vehicule')->url_image ?? null))) && $_smarty_tpl->getValue('vehicule')->url_image) {?>
                                            <img src="assets/imgs/vehicules/<?php echo $_smarty_tpl->getValue('vehicule')->url_image;?>
" alt="<?php echo (($tmp = $_smarty_tpl->getValue('vehicule')->alt_image ?? null)===null||$tmp==='' ? 'Image du véhicule' ?? null : $tmp);?>
">
                                        <?php } else { ?>
                                            <img src="assets/imgs/default-vehicle.jpg" alt="Image par défaut">
                                        <?php }?>
                                        <span class="vehicle-price"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getPrix_vehicule(),2,','," ");?>
 €</span>
                                        <span class="vehicle-year"><?php echo $_smarty_tpl->getValue('vehicule')->getAnnee_vehicule();?>
</span>
                                    </div>
                                    <div class="vehicle-content">
                                        <h3 class="vehicle-title">
                                            <?php echo (($tmp = $_smarty_tpl->getValue('vehicule')->nom_marque ?? null)===null||$tmp==='' ? 'Marque N/A' ?? null : $tmp);?>
 
                                            <?php echo (($tmp = $_smarty_tpl->getValue('vehicule')->nom_modele ?? null)===null||$tmp==='' ? 'Modèle N/A' ?? null : $tmp);?>

                                            <?php if ((true && (true && null !== ($_smarty_tpl->getValue('vehicule')->nom_generation ?? null))) && $_smarty_tpl->getValue('vehicule')->nom_generation) {?>
                                                <?php echo $_smarty_tpl->getValue('vehicule')->nom_generation;?>

                                            <?php }?>
                                        </h3>
                                        <div class="vehicle-specs">
                                            <div class="spec-item">
                                                <i class="fas fa-tachometer-alt"></i>
                                                <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getKilometrage_vehicule(),0,''," ");?>
 km</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="fas fa-gas-pump"></i>
                                                <span><?php echo (($tmp = $_smarty_tpl->getValue('vehicule')->nom_carburant ?? null)===null||$tmp==='' ? 'Non spécifié' ?? null : $tmp);?>
</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="fas fa-user"></i>
                                                <span>Vendu à: <?php echo $_smarty_tpl->getValue('vehicule')->nom_client_1;?>
 <?php echo $_smarty_tpl->getValue('vehicule')->prenom_client_1;?>
</span>
                                            </div>
                                        </div>
                                        <div class="vehicle-actions">
                                            <a href="?p=vehiculeseul&id=<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
" class="btn-details">Voir détails</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        <?php } else { ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> Aucun véhicule vendu trouvé.
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
}

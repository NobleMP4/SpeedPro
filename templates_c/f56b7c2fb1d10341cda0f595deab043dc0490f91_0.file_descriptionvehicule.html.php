<?php
/* Smarty version 5.4.3, created on 2025-02-25 09:20:42
  from 'file:views/sections/descriptionvehicule.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67bd8b6a8bcd14_53449441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f56b7c2fb1d10341cda0f595deab043dc0490f91' => 
    array (
      0 => 'views/sections/descriptionvehicule.html',
      1 => 1740475237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67bd8b6a8bcd14_53449441 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/projet-php/views/sections';
?><div class="vehicle-details-container">
    <div class="vehicle-header">
        <h1 class="vehicle-title">
            <?php echo $_smarty_tpl->getValue('vehicule')->getMarque()->getNom_marque();?>

            <?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getNom_modele();?>

            <?php if ($_smarty_tpl->getValue('vehicule')->getModele()->getGeneration_modele()) {?>
            <?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getGeneration_modele();?>

            <?php }?>
        </h1>
        <div class="vehicle-price"><?php echo $_smarty_tpl->getValue('vehicule')->getPrix_vehicule();?>
 €</div>
    </div>

    <div class="vehicle-content">
        <div class="vehicle-left-column">
            <div class="vehicle-gallery">
                <div class="main-image">
                    <?php if (!( !$_smarty_tpl->hasVariable('images') || empty($_smarty_tpl->getValue('images')))) {?>
                        <img src="assets/imgs/vehicules/<?php echo $_smarty_tpl->getValue('images')[0]->getUrl_image();?>
" alt="<?php echo $_smarty_tpl->getValue('images')[0]->getAlt_image();?>
">
                    <?php } else { ?>
                        <img src="assets/imgs/default-vehicle.jpg" alt="Image par défaut">
                    <?php }?>
                </div>
            </div>
            
            <div class="info-section description">
                <h2>Description</h2>
                <p class="description-text">
                    <?php echo $_smarty_tpl->getValue('vehicule')->getDescription_vehicule();?>

                </p>
            </div>
        </div>

        <div class="vehicle-info">
            <div class="info-section specifications">
                <h2>Caractéristiques</h2>
                <div class="specs-grid">
                    <div class="spec-item">
                        <span class="spec-label">Année</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getAnnee_vehicule();?>
</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Kilométrage</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getKilometrage_vehicule();?>
 km</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Carburant</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getCarburant()->getNom_carburant();?>
</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Transmission</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getBoite_vitesse_vehicule();?>
</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Puissance</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getPuissance_vehicule();?>
 ch</span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Puissance fiscale</span>
                        <span class="spec-value">
                            <?php if ($_smarty_tpl->getValue('vehicule')->getPuissance_fiscale() != null) {?>
                                <?php echo $_smarty_tpl->getValue('vehicule')->getPuissance_fiscale();?>
 CV
                            <?php } else { ?>
                                Non renseigné
                            <?php }?>
                        </span>
                    </div>
                    <div class="spec-item">
                        <span class="spec-label">Immatriculation</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getImmatriculation_vehicule();?>
</span>
                    </div>
                </div>
            </div>

            <div class="info-section options">
                <h2>Options et équipements</h2>
                <div class="options-list">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('options'), 'option');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach0DoElse = false;
?>
                    <div class="option-item">
                        <i class="fas fa-check-circle"></i>
                        <span class="option-label"><?php echo $_smarty_tpl->getValue('option')->getNom_option();?>
</span>
                    </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            </div>

            <div class="info-section status">
                <h2>Statut du véhicule</h2>
                <div class="status-info">
                    <?php if ($_smarty_tpl->getValue('vehicule')->getStatut_vehicule() == 'Vendu') {?>
                        <div class="status-badge status-sold">
                            <?php echo $_smarty_tpl->getValue('vehicule')->getStatut_vehicule();?>

                        </div>
                        <?php if ((true && ($_smarty_tpl->hasVariable('client') && null !== ($_smarty_tpl->getValue('client') ?? null))) && $_smarty_tpl->getValue('client')) {?>
                            <div class="client-info mt-3">
                                <p>
                                    <strong>Client :</strong> 
                                    <a href="?p=client&id=<?php echo $_smarty_tpl->getValue('vehicule')->id_client;?>
">
                                        <?php echo $_smarty_tpl->getValue('client')->getNom_client_1();?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>

                                        <?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>
                                            & <?php echo $_smarty_tpl->getValue('client')->getNom_client_2();?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>

                                        <?php }?>
                                    </a>
                                </p>
                            </div>
                        <?php } else { ?>
                            <p class="text-warning">Client non trouvé</p>
                        <?php }?>
                    <?php } else { ?>
                        <form onsubmit="vendreVehicule(event)" class="status-form">
                            <div class="form-group">
                                <select class="form-control" 
                                        id="statut" 
                                        name="statut" 
                                        onchange="handleStatusChange(this.value)" 
                                        data-current-status="<?php echo $_smarty_tpl->getValue('vehicule')->getStatut_vehicule();?>
">
                                    <option value="Disponible" <?php if ($_smarty_tpl->getValue('vehicule')->getStatut_vehicule() == 'Disponible') {?>selected<?php }?>>Disponible</option>
                                    <option value="Vendu" <?php if ($_smarty_tpl->getValue('vehicule')->getStatut_vehicule() == 'Vendu') {?>selected<?php }?>>Vendu</option>
                                </select>
                            </div>

                            <div id="client-selection" class="form-group" style="display: none;">
                                <label for="client-search">Rechercher un client :</label>
                                <div class="search-container">
                                    <input type="text" 
                                           class="form-control" 
                                           id="client-search" 
                                           placeholder="Nom du client..."
                                           autocomplete="off"
                                           oninput="filterClients(this.value)">
                                    <input type="hidden" name="id_client" id="id_client">
                                    <div id="clients-list" class="dropdown-list" style="display: none;">
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('liste_clients'), 'client_option');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('client_option')->value) {
$foreach1DoElse = false;
?>
                                            <div class="client-option" 
                                                 onclick="selectClient('<?php echo $_smarty_tpl->getValue('client_option')->getId_client();?>
', 
                                                 '<?php echo $_smarty_tpl->getValue('client_option')->getNom_client_1();?>
 <?php echo $_smarty_tpl->getValue('client_option')->getPrenom_client_1();
if ($_smarty_tpl->getValue('client_option')->getNom_client_2()) {?> & <?php echo $_smarty_tpl->getValue('client_option')->getNom_client_2();?>
 <?php echo $_smarty_tpl->getValue('client_option')->getPrenom_client_2();
}?>')">
                                                <?php echo $_smarty_tpl->getValue('client_option')->getNom_client_1();?>
 <?php echo $_smarty_tpl->getValue('client_option')->getPrenom_client_1();?>

                                                <?php if ($_smarty_tpl->getValue('client_option')->getNom_client_2()) {?>
                                                    & <?php echo $_smarty_tpl->getValue('client_option')->getNom_client_2();?>
 <?php echo $_smarty_tpl->getValue('client_option')->getPrenom_client_2();?>

                                                <?php }?>
                                            </div>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id_vehicule" value="<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
">
                            <button type="submit" id="submit-button" class="btn btn-success mt-2" style="display: none;">
                                Enregistrer
                            </button>
                        </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}

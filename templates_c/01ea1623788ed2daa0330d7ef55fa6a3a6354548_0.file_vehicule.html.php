<?php
/* Smarty version 5.5.1, created on 2025-06-01 14:28:39
  from 'file:views/sections/vehicule.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c6397d20c94_83073656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01ea1623788ed2daa0330d7ef55fa6a3a6354548' => 
    array (
      0 => 'views/sections/vehicule.html',
      1 => 1748788118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c6397d20c94_83073656 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><div class="vehicle-details-container">
    <div class="vehicle-header">
        <div class="header-content">
            <div class="title-wrapper">
                <h1><?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getMarque()->getNom_marque();?>
 <?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getNom_modele();?>
</h1>
                <?php if ($_smarty_tpl->getValue('vehicule')->getGeneration()) {?>
                    <span class="generation-badge">
                        <i class="fas fa-code-branch"></i>
                        <?php echo $_smarty_tpl->getValue('vehicule')->getGeneration()->getNom_generation();?>

                    </span>
                <?php }?>
            </div>
        </div>
        <div class="vehicle-status">
            <span class="status-badge <?php if ($_smarty_tpl->getValue('vehicule')->getStatut_vehicule() == 'Disponible') {?>available<?php } else { ?>sold<?php }?>">
                <?php echo $_smarty_tpl->getValue('vehicule')->getStatut_vehicule();?>

                <?php if ($_smarty_tpl->getValue('vehicule')->getStatut_vehicule() != 'Disponible' && $_smarty_tpl->getValue('vehicule')->getNom_client()) {?>
                    <span class="client-info">
                        <i class="fas fa-user"></i>
                        <?php echo $_smarty_tpl->getValue('vehicule')->getPrenom_client();?>
 <?php echo $_smarty_tpl->getValue('vehicule')->getNom_client();?>

                    </span>
                <?php }?>
            </span>
        </div>
    </div>

    <div class="vehicle-content">
        <div class="content-left">
            <div class="vehicle-gallery">
                <?php $_smarty_tpl->assign('images', $_smarty_tpl->getValue('vehicule')->getImages(), false, NULL);?>
                <div class="main-image">
                    <?php if ($_smarty_tpl->getValue('images') && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('images')) > 0) {?>
                        <img src="<?php echo $_smarty_tpl->getValue('images')[0]->getUrl_image();?>
" alt="<?php echo $_smarty_tpl->getValue('images')[0]->getAlt_image();?>
" id="mainImage">
                    <?php } else { ?>
                        <img src="assets/imgs/logo.png" alt="Image par défaut">
                    <?php }?>
                </div>
                <?php if ($_smarty_tpl->getValue('images') && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('images')) > 1) {?>
                    <div class="thumbnails">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('images'), 'image');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach0DoElse = false;
?>
                            <div class="thumbnail" onclick="changeMainImage('<?php echo $_smarty_tpl->getValue('image')->getUrl_image();?>
', '<?php echo $_smarty_tpl->getValue('image')->getAlt_image();?>
')">
                                <img src="<?php echo $_smarty_tpl->getValue('image')->getUrl_image();?>
" alt="<?php echo $_smarty_tpl->getValue('image')->getAlt_image();?>
">
                            </div>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
            </div>

            <div class="info-section description-section">
                <h2>Description</h2>
                <div class="description">
                    <?php echo $_smarty_tpl->getValue('vehicule')->getDescription_vehicule();?>

                </div>
            </div>

            <?php if ($_smarty_tpl->getValue('vehicule_options') && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('vehicule_options')) > 0) {?>
                <div class="info-section options-section">
                    <h2>Options</h2>
                    <div class="options-grid">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehicule_options'), 'option');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach1DoElse = false;
?>
                            <div class="option-item">
                                <i class="fas fa-check"></i>
                                <span><?php echo $_smarty_tpl->getValue('option')->getNom_option();?>
</span>
                            </div>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
            <?php }?>
        </div>

        <div class="content-right">
            <div class="info-section price-section">
                <h2>Prix</h2>
                <div class="price"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getPrix_vehicule(),0,'',' ');?>
 €</div>
            </div>

            <div class="info-section specs-section">
                <h2>Caractéristiques</h2>
                <div class="specs-grid">
                    <div class="spec-item">
                        <i class="fas fa-calendar"></i>
                        <span class="spec-label">Année</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getAnnee_vehicule();?>
</span>
                    </div>
                    <div class="spec-item">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="spec-label">Kilométrage</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getKilometrage_vehicule(),0,','," ");?>
 km</span>
                    </div>
                    <div class="spec-item">
                        <i class="fas fa-gas-pump"></i>
                        <span class="spec-label">Carburant</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getCarburant()->getNom_carburant();?>
</span>
                    </div>
                    <div class="spec-item">
                        <i class="fas fa-horse"></i>
                        <span class="spec-label">Puissance</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getPuissance_vehicule();?>
 ch</span>
                    </div>
                    <?php if ($_smarty_tpl->getValue('vehicule')->getPuissance_fiscale()) {?>
                    <div class="spec-item">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span class="spec-label">Puissance fiscale</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getPuissance_fiscale();?>
 CV</span>
                    </div>
                    <?php }?>
                    <div class="spec-item">
                        <i class="fas fa-cogs"></i>
                        <span class="spec-label">Boîte de vitesse</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getBoite_vitesse_vehicule();?>
</span>
                    </div>
                    <div class="spec-item">
                        <i class="fas fa-id-card"></i>
                        <span class="spec-label">Immatriculation</span>
                        <span class="spec-value"><?php echo $_smarty_tpl->getValue('vehicule')->getImmatriculation_vehicule();?>
</span>
                    </div>
                </div>
            </div>

            <div class="actions-section">
                <?php if ($_smarty_tpl->getValue('vehicule')->getStatut_vehicule() == 'Disponible' && $_smarty_tpl->getValue('canEdit')) {?>
                    <button class="btn btn-primary btn-contact" data-bs-toggle="modal" data-bs-target="#sellVehicleModal">
                        <i class="fas fa-handshake"></i> Vendre
                    </button>
                <?php }?>
                <?php if ($_smarty_tpl->getValue('canEdit')) {?>
                    <button class="btn btn-outline-light btn-share" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                        <i class="fas fa-edit"></i> Modifier
                    </button>
                <?php }?>
            </div>
        </div>
    </div>
</div>

<!-- Modal de vente -->
<div class="modal fade" id="sellVehicleModal" tabindex="-1" aria-labelledby="sellVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sellVehicleModalLabel">Vendre le véhicule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="search-client-section">
                    <div class="form-group">
                        <label for="clientSearch">Rechercher un client</label>
                        <div class="search-box">
                            <input type="text" class="form-control" id="clientSearch" placeholder="Nom, prénom, email...">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <div class="clients-results" id="clientsResults">
                        <!-- Les résultats de recherche seront injectés ici -->
                    </div>
                </div>
                <div class="selected-client-info" id="selectedClientInfo" style="display: none;">
                    <h6>Client sélectionné</h6>
                    <div class="client-card">
                        <div class="client-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="client-details">
                            <span class="client-name"></span>
                            <span class="client-email"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="confirmSaleBtn" disabled>
                    <i class="fas fa-check"></i> Confirmer la vente
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de modification -->
<div class="modal fade" id="editVehicleModal" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVehicleModalLabel">Modifier le véhicule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editVehicleForm">
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"><?php echo $_smarty_tpl->getValue('vehicule')->getDescription_vehicule();?>
</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="immatriculation">Immatriculation</label>
                                <input type="text" class="form-control" id="immatriculation" name="immatriculation" value="<?php echo $_smarty_tpl->getValue('vehicule')->getImmatriculation_vehicule();?>
">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="kilometrage">Kilométrage</label>
                                <input type="number" class="form-control" id="kilometrage" name="kilometrage" value="<?php echo $_smarty_tpl->getValue('vehicule')->getKilometrage_vehicule();?>
">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="puissance">Puissance (ch)</label>
                                <input type="number" class="form-control" id="puissance" name="puissance" value="<?php echo $_smarty_tpl->getValue('vehicule')->getPuissance_vehicule();?>
">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="puissance_fiscale">Puissance fiscale (CV)</label>
                                <input type="number" class="form-control" id="puissance_fiscale" name="puissance_fiscale" value="<?php echo $_smarty_tpl->getValue('vehicule')->getPuissance_fiscale();?>
">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Options</label>
                        <div class="options-grid">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('all_options'), 'option');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('option')->value) {
$foreach2DoElse = false;
?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
" 
                                           id="option_<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
" name="options[]" 
                                           <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')($_smarty_tpl->getValue('option')->getId_option(),$_smarty_tpl->getValue('vehicule_options_ids'))) {?>checked<?php }?>>
                                    <label class="form-check-label" for="option_<?php echo $_smarty_tpl->getValue('option')->getId_option();?>
">
                                        <?php echo $_smarty_tpl->getValue('option')->getNom_option();?>

                                    </label>
                                </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="saveVehicleBtn">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la modification du véhicule
    document.getElementById('saveVehicleBtn').addEventListener('click', function() {
        const form = document.getElementById('editVehicleForm');
        const formData = new FormData(form);
        formData.append('id_vehicule', '<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
');

        // Récupération des options cochées
        const selectedOptions = [];
        document.querySelectorAll('input[name="options[]"]:checked').forEach(checkbox => {
            selectedOptions.push(checkbox.value);
        });
        formData.append('options', JSON.stringify(selectedOptions));

        // Envoi de la requête AJAX
        fetch('?p=vehicule&api=updateVehicle', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('editVehicleModal'));
            modal.hide();
            window.location.reload();
        })
        .catch(error => {
            console.error('Erreur:', error);
            window.location.reload();
        });
    });
});
<?php echo '</script'; ?>
>
<?php }
}

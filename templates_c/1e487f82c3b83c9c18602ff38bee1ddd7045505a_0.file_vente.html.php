<?php
/* Smarty version 5.5.1, created on 2025-06-01 14:20:15
  from 'file:views/sections/vente.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c619f92e854_56826773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e487f82c3b83c9c18602ff38bee1ddd7045505a' => 
    array (
      0 => 'views/sections/vente.html',
      1 => 1748787614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c619f92e854_56826773 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
$_smarty_tpl->assign('canEdit', false, false, NULL);
$_smarty_tpl->assign('canDelete', false, false, NULL);
$_smarty_tpl->assign('canAdd', false, false, NULL);?>

<?php if ((true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
    <?php if ($_smarty_tpl->getValue('user')['role'] == 1) {?>         <?php $_smarty_tpl->assign('canEdit', true, false, NULL);?>
        <?php $_smarty_tpl->assign('canDelete', true, false, NULL);?>
        <?php $_smarty_tpl->assign('canAdd', true, false, NULL);?>
    <?php } elseif ($_smarty_tpl->getValue('user')['role'] == 2) {?>         <?php $_smarty_tpl->assign('canEdit', true, false, NULL);?>
        <?php $_smarty_tpl->assign('canAdd', true, false, NULL);?>
    <?php } elseif ($_smarty_tpl->getValue('user')['role'] == 3) {?>         <?php $_smarty_tpl->assign('canEdit', true, false, NULL);?>
    <?php }
}?>

<!-- Gestion des Véhicules -->
<div class="vehicles-container">
    <!-- Grille des véhicules -->
    <div class="row g-4">
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
                        <span class="client-info">
                            <i class="fas fa-user"></i> Vendu à : 
                            <?php if ($_smarty_tpl->getValue('vehicule')->nom_client_1) {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('vehicule')->nom_client_1);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('vehicule')->prenom_client_1);?>

                                <?php if ($_smarty_tpl->getValue('vehicule')->nom_client_2) {?>
                                    et <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('vehicule')->nom_client_2);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('vehicule')->prenom_client_2);?>

                                <?php }?>
                            <?php } else { ?>
                                Client non spécifié
                            <?php }?>
                        </span>
                    </div>
                    <div class="vehicle-price">
                        <span class="price"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getPrix_vehicule(),0,','," ");?>
 €</span>
                    </div>
                    <div class="vehicle-actions">
                        <button class="btn btn-outline-light btn-sm" onclick="window.location.href='?p=vehicule&id=<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
&action=view'">
                            <i class="fas fa-eye me-2"></i>Détails
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
}
if ($foreach0DoElse) {
?>
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>Aucun véhicule vendu à afficher.
            </div>
        </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
</div>

<?php if ($_smarty_tpl->getValue('canDelete')) {
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehicules'), 'vehicule');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehicule')->value) {
$foreach1DoElse = false;
?>
<!-- Modal de suppression pour chaque véhicule -->
<div class="modal fade" id="deleteVehicleModal<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                    Confirmer la suppression
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer ce véhicule ?</p>
                <div class="vehicle-info-preview">
                    <p class="mb-1"><strong>Modèle :</strong> <?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getMarque()->getNom_marque();?>
 <?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getNom_modele();?>
</p>
                    <p class="mb-1"><strong>Immatriculation :</strong> <?php echo $_smarty_tpl->getValue('vehicule')->getImmatriculation_vehicule();?>
</p>
                    <p class="mb-0"><strong>Client :</strong> 
                        <?php if ($_smarty_tpl->getValue('vehicule')->nom_client_1) {?>
                            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('vehicule')->nom_client_1);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('vehicule')->prenom_client_1);?>

                        <?php } else { ?>
                            Non attribué
                        <?php }?>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Annuler
                </button>
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="action" value="deleteVehicle">
                    <input type="hidden" name="id_vehicule" value="<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}?>

<!-- Inclusion de noUiSlider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider@14.6.3/distribute/nouislider.min.css">
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/nouislider@14.6.3/distribute/nouislider.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle des filtres
    const toggleFilters = document.getElementById('toggleFilters');
    const filtersPanel = document.getElementById('filtersPanel');

    toggleFilters.addEventListener('click', function() {
        filtersPanel.classList.toggle('show');
    });

    // Initialisation du slider de prix
    const priceSlider = document.getElementById('priceSlider');
    const minPriceInput = document.getElementById('minPrice');
    const maxPriceInput = document.getElementById('maxPrice');

    noUiSlider.create(priceSlider, {
        start: [0, 100000],
        connect: true,
        step: 1000,
        range: {
            'min': 0,
            'max': 100000
        },
        format: {
            to: function (value) {
                return Math.round(value);
            },
            from: function (value) {
                return Number(value);
            }
        }
    });

    // Mise à jour des inputs lors du slide
    priceSlider.noUiSlider.on('update', function (values, handle) {
        if (handle === 0) {
            minPriceInput.value = values[0];
        } else {
            maxPriceInput.value = values[1];
        }
    });

    // Mise à jour du slider lors de la saisie dans les inputs
    minPriceInput.addEventListener('change', function () {
        priceSlider.noUiSlider.set([this.value, null]);
    });

    maxPriceInput.addEventListener('change', function () {
        priceSlider.noUiSlider.set([null, this.value]);
    });

    // Réinitialisation des filtres
    document.getElementById('resetFilters').addEventListener('click', function() {
        document.querySelectorAll('.filters-body select').forEach(select => {
            select.value = '';
        });
        document.querySelectorAll('.filters-body input').forEach(input => {
            input.value = '';
        });
        priceSlider.noUiSlider.reset();
    });
});
<?php echo '</script'; ?>
>
<?php }
}

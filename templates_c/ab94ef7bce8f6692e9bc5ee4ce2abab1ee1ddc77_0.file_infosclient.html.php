<?php
/* Smarty version 5.4.3, created on 2025-02-24 14:36:52
  from 'file:views/sections/infosclient.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67bc8404bbd9e2_96394463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab94ef7bce8f6692e9bc5ee4ce2abab1ee1ddc77' => 
    array (
      0 => 'views/sections/infosclient.html',
      1 => 1740407573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67bc8404bbd9e2_96394463 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/projet-php/views/sections';
?><div class="container-fluid">
    <div class="client-header">
        <h2>Détails du client</h2>
        <button class="btn btn-primary" onclick="window.location.href='?p=editclient&id=<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
'">
            Modifier
        </button>
    </div>

    <div class="client-details">
        <div class="info-section">
            <h3>Informations personnelles</h3>
            <div class="info-grid">
                <div class="info-group">
                    <div class="info-item">
                        <label>Client principal</label>
                        <div class="info-value">
                            <span class="name"><?php echo $_smarty_tpl->getValue('client')->getNom_client_1();?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>
</span>
                            <span class="contact">
                                <i class="fas fa-phone"></i> <?php echo $_smarty_tpl->getValue('client')->getTelephone_client_1();?>
<br>
                                <i class="fas fa-envelope"></i> <?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>

                            </span>
                        </div>
                    </div>

                    <?php if ($_smarty_tpl->getValue('client')->getNom_client_2() || $_smarty_tpl->getValue('client')->getPrenom_client_2()) {?>
                        <div class="info-item">
                            <label>Client secondaire</label>
                            <div class="info-value">
                                <span class="name"><?php echo $_smarty_tpl->getValue('client')->getNom_client_2();?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>
</span>
                                <span class="contact">
                                    <?php if ($_smarty_tpl->getValue('client')->getTelephone_client_2()) {?>
                                        <i class="fas fa-phone"></i> <?php echo $_smarty_tpl->getValue('client')->getTelephone_client_2();?>
<br>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->getValue('client')->getEmail_client_2()) {?>
                                        <i class="fas fa-envelope"></i> <?php echo $_smarty_tpl->getValue('client')->getEmail_client_2();?>

                                    <?php }?>
                                </span>
                            </div>
                        </div>
                    <?php }?>

                    <div class="info-item">
                        <label>Adresse</label>
                        <div class="info-value">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>
                                <?php echo $_smarty_tpl->getValue('client')->getRue();?>
<br>
                                <?php echo $_smarty_tpl->getValue('client')->getCode_postal();?>
 <?php echo $_smarty_tpl->getValue('client')->getVille();?>
<br>
                                <?php echo $_smarty_tpl->getValue('client')->getPays();?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-section">
            <h3>Véhicules</h3>
            <div class="vehicles-list">
                <?php if ($_smarty_tpl->getValue('vehicules')) {?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehicules'), 'vehicule');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehicule')->value) {
$foreach0DoElse = false;
?>
                        <div class="vehicle-item">
                            <div class="vehicle-info">
                                <h4>
                                    <?php echo $_smarty_tpl->getValue('vehicule')->nom_marque;?>
 <?php echo $_smarty_tpl->getValue('vehicule')->nom_modele;?>

                                    <?php if ($_smarty_tpl->getValue('vehicule')->generation_modele) {?>
                                        (<?php echo $_smarty_tpl->getValue('vehicule')->generation_modele;?>
)
                                    <?php }?>
                                </h4>
                                <p>
                                    <strong>Immatriculation:</strong> <?php echo $_smarty_tpl->getValue('vehicule')->getImmatriculation_vehicule();?>
<br>
                                    <strong>Carburant:</strong> <?php echo $_smarty_tpl->getValue('vehicule')->nom_carburant;?>
<br>
                                    <strong>Kilométrage:</strong> <?php echo $_smarty_tpl->getValue('vehicule')->getKilometrage_vehicule();?>
 km<br>
                                    <strong>Année:</strong> <?php echo $_smarty_tpl->getValue('vehicule')->getAnnee_vehicule();?>

                                </p>
                            </div>
                            <a href="?p=vehiculeseul&id=<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
" class="btn btn-outline-primary btn-sm">
                                Voir détails
                            </a>
                        </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <p>Aucun véhicule associé à ce client.</p>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }
}

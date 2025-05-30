<?php
/* Smarty version 5.4.3, created on 2025-05-20 16:27:31
  from 'file:views/sections/infosclient.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_682cad73be5db5_80847802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dbd12bc1ca264ab3c5c580e527e3103231830c5' => 
    array (
      0 => 'views/sections/infosclient.html',
      1 => 1747758420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682cad73be5db5_80847802 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
?><div class="container-fluid">
    <div class="client-header">
        <h2>Détails du client</h2>
        <button class="btn btn-primary" onclick="openEditClientForm()">
            <i class="fas fa-edit"></i> Modifier
        </button>
    </div>

    <div id="editClientFormSection" class="edit-client-form-section" style="display: none;">
        <div class="form-header">
            <h2>Modifier les informations du client</h2>
            <button type="button" class="close-form" onclick="closeEditClientForm()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="editClientForm">
            <input type="hidden" name="id_client" value="<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
">
            <div class="form-grid">
                <div class="form-group">
                    <label for="edit_nom_client_1" class="form-label">Nom du client 1</label>
                    <input type="text" class="form-control" id="edit_nom_client_1" name="nom_client_1" value="<?php echo $_smarty_tpl->getValue('client')->getNom_client_1();?>
">
                </div>
                <div class="form-group">
                    <label for="edit_prenom_client_1" class="form-label">Prénom du client 1</label>
                    <input type="text" class="form-control" id="edit_prenom_client_1" name="prenom_client_1" value="<?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>
">
                </div>
                
                <div class="form-group">
                    <label for="edit_nom_client_2" class="form-label">Nom du client 2 (optionnel)</label>
                    <input type="text" class="form-control" id="edit_nom_client_2" name="nom_client_2" value="<?php echo $_smarty_tpl->getValue('client')->getNom_client_2();?>
">
                </div>
                <div class="form-group">
                    <label for="edit_prenom_client_2" class="form-label">Prénom du client 2 (optionnel)</label>
                    <input type="text" class="form-control" id="edit_prenom_client_2" name="prenom_client_2" value="<?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>
">
                </div>

                <div class="form-group">
                    <label for="edit_telephone_client_1" class="form-label">Téléphone client 1</label>
                    <input type="tel" class="form-control" id="edit_telephone_client_1" name="telephone_client_1" value="<?php echo $_smarty_tpl->getValue('client')->getTelephone_client_1();?>
">
                </div>
                <div class="form-group">
                    <label for="edit_telephone_client_2" class="form-label">Téléphone client 2 (optionnel)</label>
                    <input type="tel" class="form-control" id="edit_telephone_client_2" name="telephone_client_2" value="<?php echo $_smarty_tpl->getValue('client')->getTelephone_client_2();?>
">
                </div>
                <div class="form-group">
                    <label for="edit_email_client_1" class="form-label">Email client 1</label>
                    <input type="email" class="form-control" id="edit_email_client_1" name="email_client_1" value="<?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>
">
                </div>
                <div class="form-group">
                    <label for="edit_email_client_2" class="form-label">Email client 2 (optionnel)</label>
                    <input type="email" class="form-control" id="edit_email_client_2" name="email_client_2" value="<?php echo $_smarty_tpl->getValue('client')->getEmail_client_2();?>
">
                </div>

                <div class="form-group full-width">
                    <label for="edit_rue" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="edit_rue" name="rue" value="<?php echo $_smarty_tpl->getValue('client')->getRue();?>
">
                </div>
                <div class="form-group">
                    <label for="edit_code_postal" class="form-label">Code postal</label>
                    <input type="text" class="form-control" id="edit_code_postal" name="code_postal" value="<?php echo $_smarty_tpl->getValue('client')->getCode_postal();?>
">
                </div>
                <div class="form-group">
                    <label for="edit_ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="edit_ville" name="ville" value="<?php echo $_smarty_tpl->getValue('client')->getVille();?>
">
                </div>
                <div class="form-group">
                    <label for="edit_pays" class="form-label">Pays</label>
                    <input type="text" class="form-control" id="edit_pays" name="pays" value="<?php echo $_smarty_tpl->getValue('client')->getPays();?>
">
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeEditClientForm()">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </div>
        </form>
    </div>

    <div class="client-details">
        <div class="info-section">
            <h3>Informations personnelles</h3>
            <div class="info-grid">
                <div class="info-group">
                    <div class="info-item">
                        <label>Client principal</label>
                        <div class="info-value">
                            <span class="name"><?php echo mb_strtoupper((string) $_smarty_tpl->getValue('client')->getNom_client_1() ?? '', 'UTF-8');?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>
</span>
                            <span class="contact">
                                <i class="fas fa-phone"></i> <?php $_smarty_tpl->assign('tel1', $_smarty_tpl->getValue('client')->getTelephone_client_1(), false, NULL);?>
                                <?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 0, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 2, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 4, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 6, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 8, (int) 2);?>
<br>
                                <i class="fas fa-envelope"></i> <?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>

                            </span>
                        </div>
                    </div>

                    <?php if ($_smarty_tpl->getValue('client')->getNom_client_2() || $_smarty_tpl->getValue('client')->getPrenom_client_2()) {?>
                        <div class="info-item">
                            <label>Client secondaire</label>
                            <div class="info-value">
                                <span class="name"><?php echo mb_strtoupper((string) $_smarty_tpl->getValue('client')->getNom_client_2() ?? '', 'UTF-8');?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>
</span>
                                <span class="contact">
                                    <?php if ($_smarty_tpl->getValue('client')->getTelephone_client_2()) {?>
                                        <i class="fas fa-phone"></i> <?php $_smarty_tpl->assign('tel2', $_smarty_tpl->getValue('client')->getTelephone_client_2(), false, NULL);?>
                                        <?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 0, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 2, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 4, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 6, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 8, (int) 2);?>
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
            <h3>Véhicules achetés</h3>
            <div class="vehicles-list">
            
                <?php if ((true && ($_smarty_tpl->hasVariable('vehicules') && null !== ($_smarty_tpl->getValue('vehicules') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('vehicules')) > 0) {?>
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehicules'), 'vehicule');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehicule')->value) {
$foreach0DoElse = false;
?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card vehicle-card">
                                    <div class="row g-0">
                                        <div class="col-4">
                                            <?php if ((true && (true && null !== ($_smarty_tpl->getValue('vehicule')->url_image ?? null))) && $_smarty_tpl->getValue('vehicule')->url_image) {?>
                                                <img src="assets/imgs/vehicules/<?php echo $_smarty_tpl->getValue('vehicule')->url_image;?>
" 
                                                     class="img-fluid rounded-start h-100" 
                                                     alt="<?php echo (($tmp = $_smarty_tpl->getValue('vehicule')->alt_image ?? null)===null||$tmp==='' ? 'Image du véhicule' ?? null : $tmp);?>
"
                                                     style="object-fit: cover; width: 100%; height: 100%;">
                                            <?php } else { ?>
                                                <div class="bg-secondary d-flex align-items-center justify-content-center h-100 rounded-start">
                                                    <i class="fas fa-car fa-2x text-white"></i>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?php echo (($tmp = $_smarty_tpl->getValue('vehicule')->nom_marque ?? null)===null||$tmp==='' ? 'Marque N/A' ?? null : $tmp);?>
 
                                                    <?php echo (($tmp = $_smarty_tpl->getValue('vehicule')->nom_modele ?? null)===null||$tmp==='' ? 'Modèle N/A' ?? null : $tmp);?>

                                                    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('vehicule')->nom_generation ?? null))) && $_smarty_tpl->getValue('vehicule')->nom_generation) {?>
                                                        <span class="generation">(<?php echo $_smarty_tpl->getValue('vehicule')->nom_generation;?>
)</span>
                                                    <?php }?>
                                                </h5>
                                                <div class="vehicle-details">
                                                    <p>Immatriculation: <?php echo $_smarty_tpl->getValue('vehicule')->getImmatriculation_vehicule();?>

                                                    <br>
                                                    Année: <?php echo $_smarty_tpl->getValue('vehicule')->getAnnee_vehicule();?>

                                                    <br>
                                                    Prix: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getPrix_vehicule(),2,','," ");?>
 €</p>
                                                </div>
                                                <a href="?p=vehiculeseul&id=<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
" class="btn btn-primary btn-block mt-3">
                                                    <i class="fas fa-eye"></i> Voir détails
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Aucun véhicule associé à ce client.
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }
}

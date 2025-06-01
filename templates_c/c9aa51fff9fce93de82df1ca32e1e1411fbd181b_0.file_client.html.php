<?php
/* Smarty version 5.5.1, created on 2025-06-01 14:18:42
  from 'file:views/sections/client.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c61421bae75_97440956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9aa51fff9fce93de82df1ca32e1e1411fbd181b' => 
    array (
      0 => 'views/sections/client.html',
      1 => 1748787520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c61421bae75_97440956 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!-- Détails du client -->
<div class="clients-container">
    <div class="row">
        <div class="col-12 mb-4">
            <a href="?p=clients" class="btn btn-outline-light">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Informations principales -->
        <div class="col-md-8">
            <div class="clients-card mb-4">
                <div class="clients-header">
                    <div class="header-left">
                        <h2>
                            <i class="fas fa-user me-2"></i>
                            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('client')->getPrenom_client_1());?>
 <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('client')->getNom_client_1() ?? '', 'UTF-8');?>

                        </h2>
                    </div>
                    <div class="header-right">
                        <?php if ($_smarty_tpl->getValue('canEdit')) {?>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editClientModal">
                            <i class="fas fa-edit me-2"></i>Modifier
                        </button>
                        <?php }?>
                    </div>
                </div>

                <div class="p-4">
                    <!-- Contact Principal -->
                    <div class="info-section mb-4">
                        <h4 class="section-title mb-4">
                            <i class="fas fa-address-card me-2 text-primary"></i>
                            Contact Principal
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-group mb-3">
                                    <label class="text-light-50 mb-1">Email</label>
                                    <p class="text-light mb-0"><?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>
</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-group mb-3">
                                    <label class="text-light-50 mb-1">Téléphone</label>
                                    <p class="text-light mb-0"><?php echo $_smarty_tpl->getValue('client')->getTelephone_client_1();?>
</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Contact -->
                    <?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>
                    <div class="info-section mb-4">
                        <h4 class="section-title mb-4">
                            <i class="fas fa-users me-2 text-primary"></i>
                            Second Contact
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-group mb-3">
                                    <label class="text-light-50 mb-1">Nom complet</label>
                                    <p class="text-light mb-0"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('client')->getPrenom_client_2());?>
 <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('client')->getNom_client_2() ?? '', 'UTF-8');?>
</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-group mb-3">
                                    <label class="text-light-50 mb-1">Email</label>
                                    <p class="text-light mb-0"><?php echo $_smarty_tpl->getValue('client')->getEmail_client_2();?>
</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-group mb-3">
                                    <label class="text-light-50 mb-1">Téléphone</label>
                                    <p class="text-light mb-0"><?php echo $_smarty_tpl->getValue('client')->getTelephone_client_2();?>
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <!-- Adresse -->
                    <div class="info-section">
                        <h4 class="section-title mb-4">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                            Adresse
                        </h4>
                        <div class="address-box p-3 rounded" style="background: rgba(255,255,255,0.05);">
                            <p class="text-light mb-0"><?php echo $_smarty_tpl->getValue('client')->getAdresseComplete();?>
</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques et informations supplémentaires -->
        <div class="col-md-4">
            <div class="clients-card mb-4">
                <div class="clients-header">
                    <h2><i class="fas fa-info-circle me-2"></i>Informations</h2>
                </div>
                <div class="p-4">
                    <div class="info-group mb-4">
                        <label class="text-light-50 mb-2">Date d'inscription</label>
                        <p class="text-light mb-0 fs-5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('client')->getDate_creation_client(),"%d/%m/%Y");?>
</p>
                    </div>
                    <div class="info-group">
                        <label class="text-light-50 mb-2">Nombre de véhicules</label>
                        <p class="text-light mb-0 fs-5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('client')->getVehicules());?>
</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des véhicules -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="clients-card">
                <div class="clients-header">
                    <div class="header-left">
                        <h2>
                            <i class="fas fa-car me-2"></i>
                            Véhicules du client
                        </h2>
                        <?php if ($_smarty_tpl->getValue('client')->getVehicules()) {?>
                            <div class="clients-count">
                                <span class="badge bg-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('client')->getVehicules());?>
 véhicule(s)</span>
                            </div>
                        <?php }?>
                    </div>
                </div>

                <div class="clients-list">
                    <?php if ($_smarty_tpl->getValue('client')->getVehicules()) {?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Modèle</th>
                                        <th>Immatriculation</th>
                                        <th>Année</th>
                                        <th>Kilométrage</th>
                                        <th>Prix</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('client')->getVehicules(), 'vehicule');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehicule')->value) {
$foreach0DoElse = false;
?>
                                        <tr>
                                            <td>
                                                <div class="vehicle-name text-light">
                                                    <span><?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getMarque()->getNom_marque();?>
 <?php echo $_smarty_tpl->getValue('vehicule')->getModele()->getNom_modele();?>
</span>
                                                </div>
                                            </td>
                                            <td class="text-light"><?php echo $_smarty_tpl->getValue('vehicule')->getImmatriculation_vehicule();?>
</td>
                                            <td class="text-light"><?php echo $_smarty_tpl->getValue('vehicule')->getAnnee_vehicule();?>
</td>
                                            <td class="text-light"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getKilometrage_vehicule(),0," "," ");?>
 km</td>
                                            <td class="text-light fw-bold"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('vehicule')->getPrix_vehicule(),0," "," ");?>
 €</td>
                                            <td>
                                                <div class="vehicle-actions">
                                                    <a href="?p=vehicule&id=<?php echo $_smarty_tpl->getValue('vehicule')->getId_vehicule();?>
" class="btn-icon" title="Voir les détails">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="text-center py-5">
                            <i class="fas fa-car-alt fa-4x mb-4 text-muted"></i>
                            <h4 class="text-light mb-2">Aucun véhicule</h4>
                            <p class="text-muted">Ce client n'a pas encore de véhicule associé</p>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de modification du client -->
<?php if ($_smarty_tpl->getValue('canEdit')) {?>
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientModalLabel">Modifier le client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <form action="?p=client&id=<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
" method="POST" id="editClientForm">
                <div class="modal-body">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id_client" value="<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
">
                    
                    <!-- Contact Principal -->
                    <div class="contact-section mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nom_client_1">Nom</label>
                                    <input type="text" class="form-control" id="nom_client_1" name="nom_client_1" value="<?php echo $_smarty_tpl->getValue('client')->getNom_client_1();?>
" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="prenom_client_1">Prénom</label>
                                    <input type="text" class="form-control" id="prenom_client_1" name="prenom_client_1" value="<?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>
" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email_client_1">Email</label>
                                    <input type="email" class="form-control" id="email_client_1" name="email_client_1" value="<?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>
" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="telephone_client_1">Téléphone</label>
                                    <input type="tel" class="form-control" id="telephone_client_1" name="telephone_client_1" value="<?php echo $_smarty_tpl->getValue('client')->getTelephone_client_1();?>
" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Contact -->
                    <div class="separator">
                        <div class="separator-line"></div>
                        <div class="separator-text">
                            <button type="button" class="btn btn-outline-light" id="toggleSecondContact">
                                <i class="fas <?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>fa-minus<?php } else { ?>fa-plus<?php }?> me-2"></i>
                                <?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>Retirer<?php } else { ?>Ajouter<?php }?> un second contact
                            </button>
                        </div>
                        <div class="separator-line"></div>
                    </div>

                    <div id="secondContactSection" class="<?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>show<?php } else { ?>d-none<?php }?>">
                        <div class="contact-section mb-4">
                            <br>
                            <div class="section-title">Second Contact</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="nom_client_2">Nom</label>
                                        <input type="text" class="form-control" id="nom_client_2" name="nom_client_2" value="<?php echo $_smarty_tpl->getValue('client')->getNom_client_2();?>
">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="prenom_client_2">Prénom</label>
                                        <input type="text" class="form-control" id="prenom_client_2" name="prenom_client_2" value="<?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>
">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email_client_2">Email</label>
                                        <input type="email" class="form-control" id="email_client_2" name="email_client_2" value="<?php echo $_smarty_tpl->getValue('client')->getEmail_client_2();?>
">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="telephone_client_2">Téléphone</label>
                                        <input type="tel" class="form-control" id="telephone_client_2" name="telephone_client_2" value="<?php echo $_smarty_tpl->getValue('client')->getTelephone_client_2();?>
">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Adresse -->
                    <div class="contact-section mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <br>
                                    <label for="rue">Rue</label>
                                    <input type="text" class="form-control" id="rue" name="rue" value="<?php echo $_smarty_tpl->getValue('client')->getRue();?>
" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="code_postal">Code postal</label>
                                    <input type="text" class="form-control" id="code_postal" name="code_postal" value="<?php echo $_smarty_tpl->getValue('client')->getCode_postal();?>
" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="ville">Ville</label>
                                    <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $_smarty_tpl->getValue('client')->getVille();?>
" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="pays">Pays</label>
                                    <input type="text" class="form-control" id="pays" name="pays" value="<?php echo $_smarty_tpl->getValue('client')->getPays();?>
" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
}
}

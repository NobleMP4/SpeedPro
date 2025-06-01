<?php
/* Smarty version 5.5.1, created on 2025-06-01 13:53:47
  from 'file:views/sections/clients.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c5b6b006186_82842233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd52ae5e69fc9d8aa19c6688d8873922b396a7f3b' => 
    array (
      0 => 'views/sections/clients.html',
      1 => 1748786025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c5b6b006186_82842233 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!-- Gestion des clients -->
<div class="clients-container">
    <!-- Messages de notification -->
    <?php if ((true && ($_smarty_tpl->hasVariable('success') && null !== ($_smarty_tpl->getValue('success') ?? null)))) {?>
        <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
            <?php if ($_smarty_tpl->getValue('success') == 'add') {?>
                <i class="fas fa-check-circle me-2"></i>Le client a été ajouté avec succès.
            <?php } elseif ($_smarty_tpl->getValue('success') == 'edit') {?>
                <i class="fas fa-check-circle me-2"></i>Le client a été modifié avec succès.
            <?php } elseif ($_smarty_tpl->getValue('success') == 'delete') {?>
                <i class="fas fa-check-circle me-2"></i>Le client a été supprimé avec succès.
            <?php }?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php }?>

    <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
        <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
            <?php if ($_smarty_tpl->getValue('error') == 'delete') {?>
                <i class="fas fa-exclamation-circle me-2"></i>Une erreur est survenue lors de la suppression du client.
            <?php }?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php }?>

    <!-- Contenu principal -->
    <div class="row">
        <div class="col-12">
            <div class="clients-card">
                <div class="clients-header">
                    <div class="header-left">
                        <h2><i class="fas fa-users me-2"></i>Liste des clients</h2>
                        <div class="clients-count">
                            <span class="badge bg-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('clients'));?>
 clients</span>
                        </div>
                    </div>
                    <div class="header-right">
                        <?php if ($_smarty_tpl->getValue('canAdd')) {?>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
                            <i class="fas fa-plus me-2"></i>Ajouter un client
                        </button>
                        <?php }?>
                    </div>
                </div>

                <div class="clients-tools">
                    <div class="search-box">
                        <input type="text" class="form-control" id="searchClient" placeholder="Rechercher un client...">
                        <i class="fas fa-search"></i>
                    </div>
                </div>

                <div class="clients-list">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Contact Principal</th>
                                    <th>Contact Secondaire</th>
                                    <th>Adresse</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('clients'), 'client');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('client')->value) {
$foreach0DoElse = false;
?>
                                <tr>
                                    <td>
                                        <div class="client-info">
                                            <div class="client-avatar">
                                                <span class="avatar-placeholder">
                                                    <?php if (!( !true || empty($_smarty_tpl->getValue('client')->getPrenom_client_1())) && !( !true || empty($_smarty_tpl->getValue('client')->getNom_client_1()))) {?>
                                                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('client')->getPrenom_client_1(),1,'');
echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('client')->getNom_client_1(),1,'');?>

                                                    <?php } else { ?>
                                                        --
                                                    <?php }?>
                                                </span>
                                            </div>
                                            <div class="client-details">
                                                <span class="client-name">
                                                    <?php if (!( !true || empty($_smarty_tpl->getValue('client')->getPrenom_client_1())) && !( !true || empty($_smarty_tpl->getValue('client')->getNom_client_1()))) {?>
                                                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('client')->getPrenom_client_1());?>
 <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('client')->getNom_client_1() ?? '', 'UTF-8');?>

                                                    <?php } else { ?>
                                                        Information non disponible
                                                    <?php }?>
                                                </span>
                                                <div class="client-contact mt-2">
                                                    <?php if (!( !true || empty($_smarty_tpl->getValue('client')->getEmail_client_1()))) {?>
                                                        <div class="contact-item">
                                                            <i class="fas fa-envelope"></i>
                                                            <?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>

                                                        </div>
                                                    <?php }?>
                                                    <?php if (!( !true || empty($_smarty_tpl->getValue('client')->getTelephone_client_1()))) {?>
                                                        <div class="contact-item">
                                                            <i class="fas fa-phone"></i>
                                                            <?php echo $_smarty_tpl->getValue('client')->getTelephone_client_1();?>

                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($_smarty_tpl->getValue('client')->getNom_client_2() && $_smarty_tpl->getValue('client')->getPrenom_client_2()) {?>
                                            <div class="client-info">
                                                <div class="client-avatar">
                                                    <span class="avatar-placeholder">
                                                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('client')->getPrenom_client_2(),1,'');
echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('client')->getNom_client_2(),1,'');?>

                                                    </span>
                                                </div>
                                                <div class="client-details">
                                                    <span class="client-name">
                                                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('capitalize')($_smarty_tpl->getValue('client')->getPrenom_client_2());?>
 <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('client')->getNom_client_2() ?? '', 'UTF-8');?>

                                                    </span>
                                                    <div class="client-contact mt-2">
                                                        <?php if ($_smarty_tpl->getValue('client')->getEmail_client_2()) {?>
                                                            <div class="contact-item">
                                                                <i class="fas fa-envelope"></i>
                                                                <?php echo $_smarty_tpl->getValue('client')->getEmail_client_2();?>

                                                            </div>
                                                        <?php }?>
                                                        <?php if ($_smarty_tpl->getValue('client')->getTelephone_client_2()) {?>
                                                            <div class="contact-item">
                                                                <i class="fas fa-phone"></i>
                                                                <?php echo $_smarty_tpl->getValue('client')->getTelephone_client_2();?>

                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <span class="text-light">
                                                <i class="fas fa-user-slash me-2"></i>
                                                Aucun contact secondaire
                                            </span>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <div class="client-address">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php if ($_smarty_tpl->getValue('client')->getRue() && $_smarty_tpl->getValue('client')->getCode_postal() && $_smarty_tpl->getValue('client')->getVille() && $_smarty_tpl->getValue('client')->getPays()) {?>
                                                <?php echo $_smarty_tpl->getValue('client')->getAdresseComplete();?>

                                            <?php } else { ?>
                                                <span class="text-light">Adresse non renseignée</span>
                                            <?php }?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="client-actions">
                                            <a href="?p=client&id=<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
" class="btn btn-icon" title="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <?php if ($_smarty_tpl->getValue('canDelete')) {?>
                                            <button class="btn btn-icon text-danger" title="Supprimer" data-bs-toggle="modal" data-bs-target="#deleteClientModal<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <?php }?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
}
if ($foreach0DoElse) {
?>
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <i class="fas fa-info-circle me-2"></i>Aucun client trouvé
                                    </td>
                                </tr>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Client -->
<?php if ($_smarty_tpl->getValue('canAdd')) {?>
<div class="modal fade" id="addClientModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-plus me-2"></i>Ajouter un client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <?php if ((true && ($_smarty_tpl->hasVariable('errors') && null !== ($_smarty_tpl->getValue('errors') ?? null))) && !( !$_smarty_tpl->hasVariable('errors') || empty($_smarty_tpl->getValue('errors')))) {?>
                <div class="alert alert-danger m-3">
                    <ul class="mb-0">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('errors'), 'error');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('error')->value) {
$foreach1DoElse = false;
?>
                            <li><?php echo $_smarty_tpl->getValue('error');?>
</li>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            <?php }?>

            <form id="addClientForm" method="POST">
                <input type="hidden" name="action" value="addClient">
                <div class="modal-body">
                    <!-- Contact Principal -->
                    <div class="contact-section mb-4">
                        <h6 class="section-title">Contact Principal</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="prenom_client_1">Prénom</label>
                                    <input type="text" class="form-control" id="prenom_client_1" name="prenom_client_1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nom_client_1">Nom</label>
                                    <input type="text" class="form-control" id="nom_client_1" name="nom_client_1" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email_client_1">Email</label>
                            <input type="email" class="form-control" id="email_client_1" name="email_client_1" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="telephone_client_1">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone_client_1" name="telephone_client_1" required>
                        </div>
                    </div>

                    <!-- Séparateur -->
                    <div class="separator mb-4">
                        <div class="separator-line"></div>
                        <div class="separator-text">
                            <button type="button" class="btn btn-outline-light btn-sm" id="toggleSecondContact">
                                <i class="fas fa-plus me-2"></i>Ajouter un second contact
                            </button>
                        </div>
                        <div class="separator-line"></div>
                    </div>

                    <!-- Contact Secondaire -->
                    <div class="contact-section mb-4" id="secondContactSection" style="display: none;">
                        <h6 class="section-title">Second Contact</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="prenom_client_2">Prénom</label>
                                    <input type="text" class="form-control" id="prenom_client_2" name="prenom_client_2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nom_client_2">Nom</label>
                                    <input type="text" class="form-control" id="nom_client_2" name="nom_client_2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email_client_2">Email</label>
                            <input type="email" class="form-control" id="email_client_2" name="email_client_2">
                        </div>
                        <div class="form-group mb-3">
                            <label for="telephone_client_2">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone_client_2" name="telephone_client_2">
                        </div>
                    </div>

                    <!-- Adresse -->
                    <div class="contact-section mb-4">
                        <h6 class="section-title">Adresse</h6>
                        <div class="form-group mb-3">
                            <label for="rue">Rue</label>
                            <input type="text" class="form-control" id="rue" name="rue" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="code_postal">Code Postal</label>
                                    <input type="text" class="form-control" id="code_postal" name="code_postal" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="ville">Ville</label>
                                    <input type="text" class="form-control" id="ville" name="ville" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control" id="pays" name="pays" required value="France">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }?>

<!-- Modals de suppression pour chaque client -->
<?php if ($_smarty_tpl->getValue('canDelete')) {
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('clients'), 'client');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('client')->value) {
$foreach2DoElse = false;
?>
<div class="modal fade" id="deleteClientModal<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-trash me-2"></i>Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <input type="hidden" name="action" value="deleteClient">
                <input type="hidden" name="id_client" value="<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
">
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <p>Êtes-vous sûr de vouloir supprimer le client <strong><?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>
 <?php echo $_smarty_tpl->getValue('client')->getNom_client_1();?>
</strong> ?</p>
                    <p class="text-muted small">Cette action est irréversible.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Supprimer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de détails pour chaque client -->
<div class="modal fade" id="viewClientModal<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user me-2"></i>Détails du client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="section-title">Contact Principal</h6>
                        <p><strong>Nom :</strong> <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>
 <?php echo $_smarty_tpl->getValue('client')->getNom_client_1();?>
</p>
                        <p><strong>Email :</strong> <?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>
</p>
                        <p><strong>Téléphone :</strong> <?php echo $_smarty_tpl->getValue('client')->getTelephone_client_1();?>
</p>
                    </div>
                    <?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>
                    <div class="col-md-6">
                        <h6 class="section-title">Contact Secondaire</h6>
                        <p><strong>Nom :</strong> <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>
 <?php echo $_smarty_tpl->getValue('client')->getNom_client_2();?>
</p>
                        <p><strong>Email :</strong> <?php echo $_smarty_tpl->getValue('client')->getEmail_client_2();?>
</p>
                        <p><strong>Téléphone :</strong> <?php echo $_smarty_tpl->getValue('client')->getTelephone_client_2();?>
</p>
                    </div>
                    <?php }?>
                </div>
                <hr>
                <h6 class="section-title">Adresse</h6>
                <p><?php echo $_smarty_tpl->getValue('client')->getAdresseComplete();?>
</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Fermer
                </button>
            </div>
        </div>
    </div>
</div>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
}

<?php
/* Smarty version 5.4.3, created on 2025-02-24 15:30:24
  from 'file:views/sections/listeclients.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67bc90905888f1_50407922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '133c42650063d7c426c30e72d8018c374a72f335' => 
    array (
      0 => 'views/sections/listeclients.html',
      1 => 1740411019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67bc90905888f1_50407922 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/projet-php/views/sections';
?><div class="container-fluid">
    <div class="clients-header">
        <div class="search-bar">
            <input type="text" class="form-control" placeholder="Rechercher un client...">
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newClientModal">
            <i class="fas fa-plus"></i> Nouveau dossier client
        </button>
    </div>

    <div class="clients-list">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('clients'), 'client');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('client')->value) {
$foreach0DoElse = false;
?>
            <div class="client-item">
                <div class="client-name">
                    <?php echo $_smarty_tpl->getValue('client')->getNom_client_1();?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>

                    <?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>
                        & <?php echo $_smarty_tpl->getValue('client')->getNom_client_2();?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>

                    <?php }?>
                </div>
                <div class="client-contact">
                    <span><?php echo $_smarty_tpl->getValue('client')->getTelephone_client_1();?>

                        <br>
                        <?php echo $_smarty_tpl->getValue('client')->getTelephone_client_2();?>

                    </span>
                    <span><?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>

                        <br>
                        <?php echo $_smarty_tpl->getValue('client')->getEmail_client_2();?>

                    </span>
                    <span><?php echo $_smarty_tpl->getValue('client')->getAdresseComplete();?>
</span>
                </div>
                <div class="client-actions">
                    <a href="?p=client&id=<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
">
                        <button class="btn btn-outline-primary btn-sm">Modifier</button>
                    </a>
                    <button class="btn btn-outline-danger btn-sm" 
                            onclick="confirmerSuppression(<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
)">
                        Supprimer
                    </button>
                </div>
            </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>

    <!-- Modal pour nouveau client -->
    <div class="modal fade" id="newClientModal" tabindex="-1" aria-labelledby="newClientModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newClientModalLabel">Nouveau dossier client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="newClientForm">
                        <div class="mb-3">
                            <label for="nom_client_1" class="form-label">Nom du client 1</label>
                            <input type="text" class="form-control" id="nom_client_1" name="nom_client_1" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom_client_1" class="form-label">Prénom du client 1</label>
                            <input type="text" class="form-control" id="prenom_client_1" name="prenom_client_1" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nom_client_2" class="form-label">Nom du client 2 (optionnel)</label>
                            <input type="text" class="form-control" id="nom_client_2" name="nom_client_2">
                        </div>
                        <div class="mb-3">
                            <label for="prenom_client_2" class="form-label">Prénom du client 2 (optionnel)</label>
                            <input type="text" class="form-control" id="prenom_client_2" name="prenom_client_2">
                        </div>

                        <div class="mb-3">
                            <label for="telephone_client_1" class="form-label">Téléphone client 1</label>
                            <input type="tel" class="form-control" id="telephone_client_1" name="telephone_client_1" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone_client_2" class="form-label">Téléphone client 2 (optionnel)</label>
                            <input type="tel" class="form-control" id="telephone_client_2" name="telephone_client_2">
                        </div>
                        <div class="mb-3">
                            <label for="email_client_1" class="form-label">Email client 1</label>
                            <input type="email" class="form-control" id="email_client_1" name="email_client_1" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_client_2" class="form-label">Email client 2 (optionnel)</label>
                            <input type="email" class="form-control" id="email_client_2" name="email_client_2">
                        </div>

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" required>
                        </div>
                        <div class="mb-3">
                            <label for="code_postal" class="form-label">Code postal</label>
                            <input type="text" class="form-control" id="code_postal" name="code_postal" required>
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                        <div class="mb-3">
                            <label for="pays" class="form-label">Pays</label>
                            <input type="text" class="form-control" id="pays" name="pays" required value="France">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewClient()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}

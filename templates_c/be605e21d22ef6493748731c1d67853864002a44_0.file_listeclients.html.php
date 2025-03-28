<?php
/* Smarty version 5.4.3, created on 2025-03-24 10:24:59
  from 'file:views/sections/listeclients.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e132fbda4261_95012199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be605e21d22ef6493748731c1d67853864002a44' => 
    array (
      0 => 'views/sections/listeclients.html',
      1 => 1742811897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e132fbda4261_95012199 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/projet-php/views/sections';
?><div class="container-fluid">
    <div class="clients-header">
        <div class="search-bar">
            <input type="text" class="form-control" placeholder="Rechercher un client...">
        </div>
        <button type="button" class="btn btn-primary" onclick="openNewClientForm()">
            <i class="fas fa-plus"></i> Nouveau dossier client
        </button>
    </div>

    <div id="newClientFormSection" class="new-client-form-section" style="display: none;">
        <div class="form-header">
            <h2>Nouveau dossier client</h2>
            <button type="button" class="close-form" onclick="closeNewClientForm()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="newClientForm">
            <div class="form-grid">
                <div class="form-group">
                    <label for="nom_client_1" class="form-label">Nom du client 1</label>
                    <input type="text" class="form-control" id="nom_client_1" name="nom_client_1">
                </div>
                <div class="form-group">
                    <label for="prenom_client_1" class="form-label">Prénom du client 1</label>
                    <input type="text" class="form-control" id="prenom_client_1" name="prenom_client_1">
                </div>
                
                <div class="form-group">
                    <label for="nom_client_2" class="form-label">Nom du client 2 (optionnel)</label>
                    <input type="text" class="form-control" id="nom_client_2" name="nom_client_2">
                </div>
                <div class="form-group">
                    <label for="prenom_client_2" class="form-label">Prénom du client 2 (optionnel)</label>
                    <input type="text" class="form-control" id="prenom_client_2" name="prenom_client_2">
                </div>

                <div class="form-group">
                    <label for="telephone_client_1" class="form-label">Téléphone client 1</label>
                    <input type="tel" class="form-control" id="telephone_client_1" name="telephone_client_1">
                </div>
                <div class="form-group">
                    <label for="telephone_client_2" class="form-label">Téléphone client 2 (optionnel)</label>
                    <input type="tel" class="form-control" id="telephone_client_2" name="telephone_client_2">
                </div>
                <div class="form-group">
                    <label for="email_client_1" class="form-label">Email client 1</label>
                    <input type="email" class="form-control" id="email_client_1" name="email_client_1">
                </div>
                <div class="form-group">
                    <label for="email_client_2" class="form-label">Email client 2 (optionnel)</label>
                    <input type="email" class="form-control" id="email_client_2" name="email_client_2">
                </div>

                <div class="form-group full-width">
                    <label for="rue" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="rue" name="rue">
                </div>
                <div class="form-group">
                    <label for="code_postal" class="form-label">Code postal</label>
                    <input type="text" class="form-control" id="code_postal" name="code_postal">
                </div>
                <div class="form-group">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville">
                </div>
                <div class="form-group">
                    <label for="pays" class="form-label">Pays</label>
                    <input type="text" class="form-control" id="pays" name="pays" value="France">
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeNewClientForm()">Annuler</button>
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
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
                    <a href="?p=client&id=<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
">
                        <?php echo $_smarty_tpl->getValue('client')->getNom_client_1();?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>

                        <?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>
                            & <?php echo $_smarty_tpl->getValue('client')->getNom_client_2();?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>

                        <?php }?>
                    </a>
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
</div><?php }
}

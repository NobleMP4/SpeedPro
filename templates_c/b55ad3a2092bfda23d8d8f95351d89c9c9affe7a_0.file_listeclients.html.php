<?php
/* Smarty version 5.4.3, created on 2025-05-20 16:10:51
  from 'file:views/sections/listeclients.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_682ca98b5bfe94_68541518',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b55ad3a2092bfda23d8d8f95351d89c9c9affe7a' => 
    array (
      0 => 'views/sections/listeclients.html',
      1 => 1747757442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682ca98b5bfe94_68541518 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
?><div class="container-fluid">
    <div class="clients-header">
        <div class="search-bar">
            <input type="text" class="form-control" placeholder="Rechercher un client..." value="<?php echo (($tmp = $_smarty_tpl->getValue('searchTerm') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" id="clientSearch" oninput="filtrerClientsVue()">
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

    <div id="clientsList" class="clients-list">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('clients'), 'client');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('client')->value) {
$foreach0DoElse = false;
?>
            <div class="client-item" 
                data-search="<?php echo mb_strtolower((string) $_smarty_tpl->getValue('client')->getNom_client_1(), 'UTF-8');?>
 <?php echo mb_strtolower((string) $_smarty_tpl->getValue('client')->getPrenom_client_1(), 'UTF-8');?>
 <?php echo mb_strtolower((string) $_smarty_tpl->getValue('client')->getEmail_client_1(), 'UTF-8');?>
 <?php echo mb_strtolower((string) $_smarty_tpl->getValue('client')->getTelephone_client_1(), 'UTF-8');?>
 <?php echo mb_strtolower((string) $_smarty_tpl->getValue('client')->getRue(), 'UTF-8');?>
 <?php echo mb_strtolower((string) $_smarty_tpl->getValue('client')->getCode_postal(), 'UTF-8');?>
 <?php echo mb_strtolower((string) $_smarty_tpl->getValue('client')->getVille(), 'UTF-8');?>
 <?php echo mb_strtolower((string) $_smarty_tpl->getValue('client')->getPays(), 'UTF-8');?>
">
                <div class="client-name">
                    <a href="?p=client&id=<?php echo $_smarty_tpl->getValue('client')->getId_client();?>
">
                        <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('client')->getNom_client_1() ?? '', 'UTF-8');?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_1();?>

                        <?php if ($_smarty_tpl->getValue('client')->getNom_client_2()) {?>
                            & <?php echo mb_strtoupper((string) $_smarty_tpl->getValue('client')->getNom_client_2() ?? '', 'UTF-8');?>
 <?php echo $_smarty_tpl->getValue('client')->getPrenom_client_2();?>

                        <?php }?>
                    </a>
                </div>
                <div class="client-contact">
                    <span>
                        <?php $_smarty_tpl->assign('tel1', $_smarty_tpl->getValue('client')->getTelephone_client_1(), false, NULL);?>
                        <?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 0, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 2, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 4, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 6, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel1'), (int) 8, (int) 2);?>

                        <br>
                        <?php if ($_smarty_tpl->getValue('client')->getTelephone_client_2()) {?>
                            <?php $_smarty_tpl->assign('tel2', $_smarty_tpl->getValue('client')->getTelephone_client_2(), false, NULL);?>
                            <?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 0, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 2, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 4, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 6, (int) 2);?>
.<?php echo substr((string) $_smarty_tpl->getValue('tel2'), (int) 8, (int) 2);?>

                        <?php }?>
                    </span>
                    <span><?php echo $_smarty_tpl->getValue('client')->getEmail_client_1();?>

                        <br>
                        <?php echo $_smarty_tpl->getValue('client')->getEmail_client_2();?>

                    </span>
                    <span><?php echo $_smarty_tpl->getValue('client')->getAdresseComplete();?>
</span>
                </div>
                <div class="client-actions">
                    <button class="btn btn-outline-danger btn-sm">
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

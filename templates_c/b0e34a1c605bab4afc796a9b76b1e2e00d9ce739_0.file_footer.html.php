<?php
/* Smarty version 5.4.3, created on 2025-03-24 14:05:32
  from 'file:views/sections/footer.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e166ac4bfb08_47695594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0e34a1c605bab4afc796a9b76b1e2e00d9ce739' => 
    array (
      0 => 'views/sections/footer.html',
      1 => 1742823165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e166ac4bfb08_47695594 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/projet-php/views/sections';
?><!-- FOOTER-->
<footer class="garage-footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- Logo et informations entreprise -->
            <div class="footer-section">
                <div class="footer-logo">
                    <img src="assets/imgs/logo-php.png" alt="Logo Garage V.Parrot" class="footer-logo-img">
                </div>
                <p>© <?php echo $_smarty_tpl->getValue('dateAnnee');?>
 - Application interne - Tous droits réservés</p>
            </div>

            <!-- Compte et Déconnexion -->
            <div class="footer-section account-section">
                <h3>Mon compte</h3>
                <div class="account-info">
                    <p class="user-id"><i class="fas fa-user"></i> ID du compte : 3</p>
                    <a href="?p=logout" class="logout-btn">
                        <i class="fas fa-power-off"></i> Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php echo '<script'; ?>
 src="assets/js/js.js"><?php echo '</script'; ?>
><?php }
}

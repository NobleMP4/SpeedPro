<?php
/* Smarty version 5.4.3, created on 2025-04-10 14:01:38
  from 'file:views/sections/footer.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67f7cf429e1e74_92311859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3605fec40248d2f2cf281bcf63515cf47474458a' => 
    array (
      0 => 'views/sections/footer.html',
      1 => 1744293691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67f7cf429e1e74_92311859 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
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
                    <p class="user-id"><i class="fas fa-user"></i> ID du compte : <?php echo $_smarty_tpl->getValue('userId');?>
</p>
                    <a href="?p=logout" class="logout-btn">
                        <i class="fas fa-power-off"></i> Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html><?php }
}

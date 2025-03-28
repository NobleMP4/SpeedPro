<?php
/* Smarty version 5.4.3, created on 2025-03-25 13:41:12
  from 'file:views/sections/statistiques.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67e2b278a2cf37_76692886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0825d58d4fafe5b3ea8ea32577898f97964e62e' => 
    array (
      0 => 'views/sections/statistiques.html',
      1 => 1741972914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e2b278a2cf37_76692886 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/SpeedPro/views/sections';
?><div class="container-fluid">
    <div class="stats-header">
        <h2>Statistiques du garage</h2>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 6L19 9M18 4L20 6M4 20V14L14 4L20 10L10 20H4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Véhicules disponibles</h3>
                <p class="stat-number"><?php echo $_smarty_tpl->getValue('vehiculesDisponibles');?>
</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Véhicules vendus</h3>
                <p class="stat-number"><?php echo $_smarty_tpl->getValue('vehiculesVendus');?>
</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 19H20M4 15H20M4 11H20M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Marques différentes</h3>
                <p class="stat-number"><?php echo $_smarty_tpl->getValue('nombreMarques');?>
</p>
            </div>
        </div>

        
    </div>

    <div class="stats-charts">
        <div class="chart-card">
            <h3>Répartition des véhicules disponibles par marque</h3>
            <div class="brand-stats">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('statsParMarque'), 'stat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('stat')->value) {
$foreach0DoElse = false;
?>
                    <div class="brand-stat-item">
                        <span class="brand-name"><?php echo $_smarty_tpl->getValue('stat')->nom_marque;?>
</span>
                        <div class="progress-bar">
                            <div class="progress" style="width: <?php echo $_smarty_tpl->getValue('stat')->pourcentage;?>
%"></div>
                        </div>
                        <span class="brand-count"><?php echo $_smarty_tpl->getValue('stat')->nombre;?>
</span>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        </div>
    </div>
</div>
<?php }
}

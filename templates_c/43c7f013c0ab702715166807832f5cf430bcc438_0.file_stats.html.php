<?php
/* Smarty version 5.5.1, created on 2025-06-01 14:24:13
  from 'file:views/sections/stats.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_683c628d24a947_56315475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43c7f013c0ab702715166807832f5cf430bcc438' => 
    array (
      0 => 'views/sections/stats.html',
      1 => 1748787851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683c628d24a947_56315475 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/ProjetCours/sp/views/sections';
?><!-- Dashboard Stats -->
<div class="dashboard-container">
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <!-- Total Véhicules -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-card-content">
                    <div class="stat-card-info">
                        <h3 class="stat-card-title">Total Véhicules</h3>
                        <p class="stat-card-value"><?php echo $_smarty_tpl->getValue('stats')['total_vehicules'];?>
</p>
                    </div>
                    <div class="stat-card-icon">
                        <i class="fas fa-car"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Clients -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-card-content">
                    <div class="stat-card-info">
                        <h3 class="stat-card-title">Total Clients</h3>
                        <p class="stat-card-value"><?php echo $_smarty_tpl->getValue('stats')['total_clients'];?>
</p>
                    </div>
                    <div class="stat-card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Utilisateurs -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-card-content">
                    <div class="stat-card-info">
                        <h3 class="stat-card-title">Total Utilisateurs</h3>
                        <p class="stat-card-value"><?php echo $_smarty_tpl->getValue('stats')['total_utilisateurs'];?>
</p>
                    </div>
                    <div class="stat-card-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques détaillées par marque -->
    <div class="row">
        <div class="col-12">
            <div class="stats-detail-card">
                <div class="card-header">
                    <h3><i class="fas fa-chart-pie me-2"></i>Répartition par Marque</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('stats_marques'), 'marque');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('marque')->value) {
$foreach0DoElse = false;
?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="brand-stat-card">
                                <div class="brand-stat-header">
                                    <h4><?php echo $_smarty_tpl->getValue('marque')->nom_marque;?>
</h4>
                                    <span class="badge bg-primary"><?php echo $_smarty_tpl->getValue('marque')->total;?>
 véhicule(s)</span>
                                </div>
                                <div class="brand-stat-progress">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" 
                                             style="width: <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('math')->handle(array('equation'=>"(x/y)*100",'x'=>$_smarty_tpl->getValue('marque')->total,'y'=>$_smarty_tpl->getValue('stats')['total_vehicules'],'format'=>"%.1f"), $_smarty_tpl);?>
%"
                                             aria-valuenow="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('math')->handle(array('equation'=>"(x/y)*100",'x'=>$_smarty_tpl->getValue('marque')->total,'y'=>$_smarty_tpl->getValue('stats')['total_vehicules'],'format'=>"%.1f"), $_smarty_tpl);?>
" 
                                             aria-valuemin="0" 
                                             aria-valuemax="100">
                                        </div>
                                    </div>
                                    <small class="text-light-50">
                                        <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('math')->handle(array('equation'=>"(x/y)*100",'x'=>$_smarty_tpl->getValue('marque')->total,'y'=>$_smarty_tpl->getValue('stats')['total_vehicules'],'format'=>"%.1f"), $_smarty_tpl);?>
% du parc
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stats-detail-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
}

.stats-detail-card .card-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding-bottom: 15px;
    margin-bottom: 20px;
}

.stats-detail-card h3 {
    color: #fff;
    margin: 0;
    font-size: 1.5rem;
}

.brand-stat-card {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 8px;
    padding: 15px;
    height: 100%;
}

.brand-stat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.brand-stat-header h4 {
    margin: 0;
    color: #fff;
    font-size: 1.1rem;
}

.brand-stat-progress .progress {
    height: 8px;
    background: rgba(255, 255, 255, 0.1);
    margin-bottom: 5px;
}

.brand-stat-progress .progress-bar {
    background: #3498db;
}

.text-light-50 {
    color: rgba(255, 255, 255, 0.5);
}
</style><?php }
}

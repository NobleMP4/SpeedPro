<?php 

use monApp\core\tpl;
use monApp\models\menu;

$menus = menu::byId(1);
tpl::assign("menus",$menus);
tpl::view("header");

?>
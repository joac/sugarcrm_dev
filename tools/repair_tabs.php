<?php
set_include_path(realpath(dirname(__FILE__) . '/..') . PATH_SEPARATOR . get_include_path());
define('sugarEntry', 1 );
require_once('include/entryPoint.php');
require_once('modules/MySettings/TabController.php');
global $current_user;
$tool = new TabController();
$tool->restore_system_tabs(); 
echo "\n";
?>

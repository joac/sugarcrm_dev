<?php
set_include_path(realpath(dirname(__FILE__) . '/..') . PATH_SEPARATOR . get_include_path());
define('sugarEntry', 1 );
require_once('include/entryPoint.php');
require_once('modules/Administration/QuickRepairAndRebuild.php');
global $current_user;
$current_user->is_admin = '1';
$tool = new RepairAndClear();
$tool->show_output = True; 
$tool->rebuildExtensions();
echo "\n";
?>

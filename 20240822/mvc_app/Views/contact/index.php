<?php
require_once('path/to/smarty/libs/Smarty.class.php');
session_start();
$smarty = new Smarty();
$smarty->template_dir = 'path/to/templates';
$smarty->compile_dir = 'path/to/templates_c';

$smarty->display('index.tpl');
?>
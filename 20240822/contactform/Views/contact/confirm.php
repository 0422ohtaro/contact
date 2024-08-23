<?php
require_once('path/to/smarty/libs/Smarty.class.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_data'] = $_POST;

    $smarty = new Smarty();
    $smarty->template_dir = 'path/to/templates';
    $smarty->compile_dir = 'path/to/templates_c';

    $smarty->assign('form_data', $_POST);
    $smarty->display('confirm.tpl');
} else {
    header('Location: /contact/index');
    exit();
}
?>
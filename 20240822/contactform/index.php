<?php
define('ROOT_PATH', __DIR__ . '/');
require_once(ROOT_PATH . 'route.php');

$path = $_GET['path'] ?? '';
$method = strtolower($_SERVER['REQUEST_METHOD']);

route($path, $method);
?>

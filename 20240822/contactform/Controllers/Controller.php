<?php

require_once __DIR__ . '/../Models/Db.php';
require_once __DIR__ . '/../libs/Smarty.class.php';

class Controller {
    protected $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../Views/');
        $this->smarty->setCompileDir(__DIR__ . '/../views_c/');
        $this->smarty->setCacheDir(__DIR__ . '/../cache/');
        $this->smarty->setConfigDir(__DIR__ . '/../configs/');
    }

    public function view($view, $data = []) {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }
        $this->smarty->display($view . '.tpl');
    }

    protected function generateCsrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    protected function isValidCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
?>

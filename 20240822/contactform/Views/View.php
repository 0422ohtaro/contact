<?php

class View {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../Views/');
        $this->smarty->setCompileDir(__DIR__ . '/../views_c/');
        $this->smarty->setCacheDir(__DIR__ . '/../cache/');
        $this->smarty->setConfigDir(__DIR__ . '/../configs/');
    }

    public function render($template) {
        $this->smarty->display($template);
    }

    public function assign($key, $value) {
        $this->smarty->assign($key, $value);
    }
}
?>

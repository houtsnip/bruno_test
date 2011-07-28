<?php

class Autoload {

    public function __construct()
    {
        spl_autoload_register(array($this, 'load'));
    }

    private function _getPath($class) { return str_replace('_', '/', $class) . '.php'; }

    public function load($class)
    {
        if (preg_match('/^App_Model_([A-Z][A-Za-z_]*)$/', $class, $matches)) {
            include APPLICATION_PATH . "/models/{$this->_getPath($matches[1])}";
            return;
        }
        if (preg_match('/^App_ViewHelper_([A-Z][A-Za-z_]*)$/', $class, $matches)) {
            include APPLICATION_PATH . "/views/helpers/{$this->_getPath($matches[1])}";
            return;
        }
        include $this->_getPath($class);
    }

}


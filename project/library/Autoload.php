<?php

class Autoload {

    public function __construct()
    {
        spl_autoload_register(array($this, 'load'));
    }

    public function load($class)
    {
        if (preg_match('/^App_Model_([A-Z][a-z_]*)$/', $class, $matches)) {
            include APPLICATION_PATH . "/models/$matches[1].php";
            return;
        }
        if (preg_match('/^App_ViewHelper_([A-Z][a-z_]*)$/', $class, $matches)) {
            include APPLICATION_PATH . "/views/helpers/$matches[1].php";
            return;
        }
        include str_replace('_', '/', $class) . '.php';
    }

}


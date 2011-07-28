<?php

class Bootstrap
{

    private static $_instance;

    public static function getInstance() {
        if (!self::$_instance) self::$_instance = new self();
        return self::$_instance;
    }

    public function getDb()
    {
        if (!isset($this->_db)) $this->_database();
        return $this->_db;
    }

    protected function _autoloader()
    {
        require_once 'Autoload.php';
        $autoload = new Autoload();
        return $this;
    }

    protected function _database()
    {
        $this->_db = Zend_Db::factory('Pdo_Mysql', array(
            'host'     => 'localhost',
            'username' => 'test_bruno',
            'password' => 'test_bruno',
            'dbname'   => 'test_bruno'
        ));
        $this->_db->exec("SET NAMES 'utf8'");
        Zend_Db_Table::setDefaultAdapter($this->_db);
        return $this;
    }

    protected function _parseRequest()
    {
        $this->_request = new Request();
        return $this;
    }

    protected function _dispatch()
    {
        require_once APPLICATION_PATH . '/controllers/IndexController.php';
        $controller = new IndexController($this->_request);
        $action = "{$this->_request->getAction()}Action";
        $controller->{$action}();
        return $this;
    }

    protected function _render()
    {
        include APPLICATION_PATH . '/layouts/scripts/layout.phtml';
        return $this;
    }

    protected function _getContent()
    {
        include APPLICATION_PATH . "/views/scripts/index/{$this->_request->getView()}.phtml";
    }

    public function getHelper($helper)
    {
        if (!isset($this->_helpers[$helper])) {
            $helperClass = 'App_ViewHelper_' . ucfirst($helper);
            $this->_helpers[$helper] = new $helperClass($this->_request);
        }
        return $this->_helpers[$helper];
    }

    public function run()
    {
        $this
            ->_autoloader()
            ->_database()
            ->_parseRequest()
            ->_dispatch()
            ->_render()
            ;
    }

}


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
	$this->_view = new View($this->_request);
        require_once APPLICATION_PATH . '/controllers/IndexController.php';
        $controller = new IndexController($this->_request, $this->_view);
        $action = "{$this->_request->getAction()}Action";
        $controller->{$action}();
        return $this;
    }

    protected function _render()
    {
	$this->_view->render();
        return $this;
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


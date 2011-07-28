<?php

class View
{

    private $_request;

    private $_helpers = array();

    public function __construct(Request $request)
    {
    	$this->_request = $request;
    }

    public function render()
    {
        include APPLICATION_PATH . '/layouts/scripts/layout.phtml';
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

}


<?php

class Controller
{

    private $_request;

    protected $view;

    public function __construct(Request $request, View $view)
    {
        $this->_request = $request;
	$this->view = $view;
    }

    public function getRequest() { $this->_request; }

    public function _getParams() {
        return $this->_request->getParams();
    }

    public function _getParam($param, $default = null) {
        return $this->_request->getParam($param) ?: $default;
    }

    protected function getHelper($helper)
    {
    	return $this->view->getHelper($helper);
    }

    protected function redirect($url)
    {
        header("Location: $url");
        die;
    }

}


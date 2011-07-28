<?php

class Controller
{

    private $_request;

    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    public function getRequest() { $this->_request; }

    public function _getParams() {
        return $this->_request->getParams();
    }

    public function _getParam($param, $default = null) {
        return $this->_request->getParam($param) ?: $default;
    }

}


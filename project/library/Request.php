<?php

class Request {

    private $_action;
    private $_params;

    public function __construct()
    {
        preg_match_all('#/+([^/]+)#', $_SERVER['REQUEST_URI'], $matches);
        foreach ($matches[1] as $i => $part) {
            if (0 == $i)
            {
                $this->_action = $part;
                continue;
            }
            if ($i % 2 == 0) {
                $this->_params[$param] = $part;
            } else {
                $param = $part;
            }
        }
    }

    public function getAction()
    {
        return ucfirst(strtolower($this->_action)) ?: 'Index';
    }

    public function getParams() { return $this->_params;  }

    public function getParam($param)
    {
        if (!isset($this->_params[$param])) return;
        return $this->_params[$param];
    }

    public function getView() { return strtolower($this->_action) ?: 'index'; }

}


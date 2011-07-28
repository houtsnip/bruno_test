<?php

class ViewHelper {

    private $_request;

    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    protected function _getParam($param)
    {
        return $this->_request->getParam($param);
    }

}


<?php

abstract class ViewHelper_MappableObject extends ViewHelper
{

    private $_object;

    protected abstract function _createGateway();

    protected abstract function _createObject($row);

    public function get()
    {
        if (!isset($this->_object)) {
            $rows = $this->_createGateway()->find($this->_getParam('id'));
            if (!count($rows)) throw new Exception("Object '{$this->_getParam('id')}' not found");
            $this->_object = $this->_createObject($rows[0]);
        }
        return $this->_object;
    }

}


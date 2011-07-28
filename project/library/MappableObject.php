<?php

abstract class MappableObject {

    private $_data;

    private $_gateway;

    /**
     * Non-mappable fields in $_data
     */
    private $_nonMappable = array();

    public function __construct($data)
    {
        $this->_data = is_array($data) ? $data : $data->toArray();
    }

    public function updateData(array $data)
    {
        foreach ($data as $field => $value)
        {
            $this->__set($field, $value);
        } // end foreach
        return $this;
    }

    abstract protected function _createGateway();

    protected function _getGateway()
    {
        if (!isset($this->_gateway)) $this->_gateway = $this->_createGateway();
        return $this->_gateway;
    }

    public function getMappableData() {
        $ret = array();
        foreach (array_diff(array_keys($this->_data), $this->_nonMappable) as $field) {
            $ret[$field] = $this->__get($field);
        }
        return $ret;
    }

    public function save() {
        if (isset($this->_data['id'])) {
            $record = $this->_getGateway()->find($this->_data['id']);
            if (!$record) throw new Exception("id '{$this->_data['id']}' not found");
        } else {
            $record = $this->_getGateway()->createRow();
        }
        foreach ($this->getMappableData() as $field => $value)
        {
            $record->{$field} = is_object($value) ? (string) $value : $value;
        }
        $record->save();
        $this->id = $record->id;
        return $this;
    }

    public function __get($field)         { return $this->_data[$field]; }
    public function __set($field, $value) { $this->_data[$field] = $value; }

}


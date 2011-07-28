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

    abstract protected function _createGateway();

    protected function _getGateway()
    {
        if (!isset($this->_gateway)) $this->_gateway = $this->_createGateway();
        return $this->_gateway;
    }

    private function _getMappableData() {
        return array_diff_key($this->_data, array_fill_keys($this->_nonMappable, null));
    }

    public function save() {
        if (isset($this->_data['id'])) {
            $record = $this->_getGateway()->find($this->_data['id']);
            if (!$record) throw new Exception("id '{$this->_data['id']}' not found");
        } else {
            $record = $this->_getGateway()->createRow();
        }
        foreach ($this->_getMappableData() as $field => $value)
        {
            $record->{$field} = $value;
        }
        $record->save();
        return $this;
    }

    public function __get($field)         { return $this->_data[$field]; }
    public function __set($field, $value) { $this->_data[$field] = $value; }

}


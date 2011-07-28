<?php

abstract class MappableObjectList implements Iterator
{

    private $_rows = array();

    public function __construct($rows)
    {
        foreach ($rows as $row) {
            $this->_rows[] = $this->_getMappableObject($row);
        }
    }

    abstract protected function _getMappableObject($row);

    public function current() { return current($this->_rows); }
    public function key()     { return key($this->_rows); }
    public function next()    { next($this->_rows); }
    public function rewind()  { reset($this->_rows); }
    public function valid()   { return (bool) $this->current(); }

    public function count() { return count($this->_rows); }

}


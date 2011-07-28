<?php

class Date
{

    public function now() { return new self(time()); }

    private $_date;

    public function __construct($date)
    {
    	$this->_date = new DateTime(is_int($date) ? "@$date" : $date);
    }

    public function getFormatted() { return date('M d, Y H.i', $this->_date->getTimestamp()); }

    public function __toString() { return date('c', $this->_date->getTimestamp()); }
}


<?php

class Date
{

    private $_date;

    public function __construct($date)
    {
    	$this->_date = new DateTime($date);
    }

    public function getFormatted() { return date('M d, Y', $this->_date->getTimestamp()); }

}


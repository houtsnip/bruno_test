<?php

class App_Model_Answer extends MappableObject
{

    protected function _createGateway() { return new App_Model_DbTable_Answer(); }

    public function __get($field)
    {
    	$ret = parent::__get($field);
	switch ($field)
	{
	    case 'created_on':
		if ($field) return new Date($ret);
                break;

            case 'votes':
                return $ret ?: 0;

	} // end switch
	return $ret;
    }

    public function save()
    {
        if (!$this->created_on) $this->created_on = Date::now();
        return parent::save();
    }

}


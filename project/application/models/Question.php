<?php

class App_Model_Question extends MappableObject
{

    protected function _createGateway() { return new App_Model_DbTable_Question(); }

    public function getAnswers()
    {
	$answerGateway = new App_Model_DbTable_Answer();
	return $answerGateway->getAll($this->id);
    }

    public function __get($field)
    {
    	$ret = parent::__get($field);
	switch ($field)
	{
	    case 'created_on':
		return new Date($ret);

	} // end switch
	return $ret;
    }

}


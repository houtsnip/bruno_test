<?php

class App_Model_DbTable_Question extends Zend_Db_Table_Abstract
{

    protected $_name = 'questions';

    public function getAll()
    {
	return new App_Model_QuestionList($this->fetchAll());
    }

    public function getNew() { return new App_Model_Question($this->createRow()); }

}


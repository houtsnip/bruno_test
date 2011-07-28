<?php

class App_Model_DbTable_Answer extends Zend_Db_Table_Abstract
{

    protected $_name = 'answers';

    public function getAll($questionId)
    {
	return new App_Model_AnswerList($this->fetchAll(array(
	    'question_id = ?' => $questionId,
	    )));
    }

}


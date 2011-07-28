<?php

class App_Model_DbTable_Question extends Zend_Db_Table_Abstract
{

    protected $_name = 'questions';

    public function getAll()
    {
	return new App_Model_QuestionList($this->getAdapter()->fetchAll("
            SELECT q.*, COUNT(a.id) AS num_answers
              FROM questions q
              LEFT JOIN answers a ON a.question_id = q.id
              GROUP BY q.id
            "));
    }

    public function getNew() { return new App_Model_Question($this->createRow()); }

}


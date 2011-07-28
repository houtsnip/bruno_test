<?php

class App_ViewHelper_Questions extends ViewHelper
{

    private $_ret;

    public function getQuestions()
    {
        if (!isset($this->_ret)) {
            $dbTable = new App_Model_DbTable_Question();
            $this->_ret = new App_Model_QuestionList($dbTable->fetchAll());
        }
        return $this->_ret;
    }

}


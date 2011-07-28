<?php

class App_ViewHelper_Questions extends ViewHelper
{

    private $_ret;

    public function getQuestions()
    {
        if (!isset($this->_ret)) {
            $dbTable = new App_Model_DbTable_Question();
            $this->_ret = $dbTable->getAll();
        }
        return $this->_ret;
    }

}


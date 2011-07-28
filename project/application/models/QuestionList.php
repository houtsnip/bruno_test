<?php

class App_Model_QuestionList extends MappableObjectList
{

    protected function _getMappableObject($row) { return new App_Model_Question($row); }

}


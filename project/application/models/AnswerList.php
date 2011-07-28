<?php

class App_Model_AnswerList extends MappableObjectList
{

    protected function _getMappableObject($row) { return new App_Model_Answer($row); }

}


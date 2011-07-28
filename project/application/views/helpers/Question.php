<?php

class App_ViewHelper_Question extends ViewHelper_MappableObject
{

    protected function _createGateway() { return new App_Model_DbTable_Question(); }

    protected function _createObject($row) { return new App_Model_Question($row); }

}


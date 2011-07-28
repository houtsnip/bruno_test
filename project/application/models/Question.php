<?php

class App_Model_Question extends MappableObject
{

    protected function _createGateway() { return new App_Model_DbTable_Question(); }

}


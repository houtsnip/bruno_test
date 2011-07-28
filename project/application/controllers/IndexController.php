<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_setHeading('The Web Development');
    }

    private function _setHeading($heading)
    {
        $this->view->placeholder('heading')->set($this->view->translate($heading));
    }

    public function cvAction()
    {
        $this->_setHeading('Curriculum Vitae');
        if ('' != $this->_getParam('lead') && !isset($_SESSION['logged'])) {
            $visits = new App_Model_DbTable_Visit();
            $visits->insert(array(
                'ip_address'      => $_SERVER['REMOTE_ADDR'],
                'lead'            => $this->_getParam('lead'),
                'visited_on'      => date('c'),
                'user_agent'      => $_SERVER['HTTP_USER_AGENT'],
                'accept_language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
                ));
            $_SESSION['logged'] = true;
        }
    }

    public function dumpAction()
    {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
        die;
    }
}


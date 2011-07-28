<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initTranslateSetup() {
        $this->bootstrap('Translate');
        if (isset($_SERVER['SITE_LANG'])) {
            $this->getResource('Translate')->getAdapter()
                ->setLocale($_SERVER['SITE_LANG'])
                ;
        }
    }

    public function _initRouterSetup()
    {
        $this->bootstrap('FrontController');
        $this->getResource('FrontController')
            ->setRouter(new Zend_Controller_Router_Rewrite())
            ;
    }

    public function _initSessionStart() {
	$this->bootstrap('Session');
	Zend_Session::start();
    }

}


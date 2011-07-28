<?php

class IndexController extends Controller
{

    public function indexAction()
    {
    }

    public function questionAction()
    {
    }

    public function dumpAction()
    {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
        die;
    }

}


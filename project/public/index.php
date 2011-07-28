<?php

ini_set('display_errors', 'on');

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../../lib'),
    get_include_path(),
)));

/** Zend_Application */
require_once APPLICATION_PATH . '/Bootstrap.php';

$bootstrap = new Bootstrap();


<?php
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);


define("UPLOAD_DIR", realpath(dirname(__FILE__) . '/data/attachment'));
define("UPLOAD_DIRVIEW", realpath(dirname(__FILE__) . '/data/attachment'));

define('INFOEMAIL', 'info@acild.org');
define('DOMAINNAME', 'acild.devs.mobi');
define('FROMNAME', 'ACILD'); //for emails
define('ACILDPHONENO', '0720606167'); //acild phone number
define('ACILDUSSD', '*314*2012#'); //acild phone number




$application->bootstrap()
            ->run();
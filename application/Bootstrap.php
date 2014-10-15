<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload()
		{
			// Add autoloader empty namespace
			$autoLoader = Zend_Loader_Autoloader::getInstance();
			$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
			'basePath' => APPLICATION_PATH,
			'namespace' => '',
			'resourceTypes' => array(
			'form' => array(
			'path' => 'forms/',
			'namespace' => 'Form_',
			),
			'model' => array(
			'path' => 'models/',
			'namespace' => 'Model_'
			),
			),
			));
			// Return it so that it can be stored by the bootstrap
			return $autoLoader;
			
		}

}

//africastalking library for sending out messages

require_once('lib/AfricasTalkingGateway.php');

/** Routing Info for  urls **/
$FrontController = Zend_Controller_Front::getInstance(); 
$Router = $FrontController->getRouter();

 /*
 * 
 * Website routes
 * 
 */

//login
$Router->addRoute("login",
			new Zend_Controller_Router_Route
			(
			"/login",
			array
			("controller" => "account",
			"action" => "login") ));

//account password reset
$Router->addRoute("account/password-reset",
			new Zend_Controller_Router_Route
			(
			"account/password-reset/:ident/:token",
			array
			("controller" => "account",
			"action" => "password-reset") ));
			

//account password activate
$Router->addRoute("account/activate",
			new Zend_Controller_Router_Route
			(
			"account/activate/:ident/:token",
			array
			("controller" => "account",
			"action" => "activate") ));
			
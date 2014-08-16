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

$FrontController = Zend_Controller_Front::getInstance(); 
$Router = $FrontController->getRouter();

//contact
$Router->addRoute("category",
			new Zend_Controller_Router_Route
			(
			"articles/category/:slug",
			array
			("controller" => "category",
			"action" => "category") ));
$Router->addRoute("categories",
			new Zend_Controller_Router_Route
			(
			"articles/categories",
			array
			("controller" => "category",
			"action" => "index") ));
$Router->addRoute("weeks",
			new Zend_Controller_Router_Route
			(
			"/articles/weeks",
			array
			("controller" => "article",
			"action" => "weeks") ));
$Router->addRoute("week",
			new Zend_Controller_Router_Route
			(
			"articles/week/:id",
			array
			("controller" => "article",
			"action" => "week") ));
$Router->addRoute("day",
			new Zend_Controller_Router_Route
			(
			"articles/day/:day",
			array
			("controller" => "article",
			"action" => "day") ));

$Router->addRoute("article",
			new Zend_Controller_Router_Route
			(
			"/article/:id",
			array
			("controller" => "article",
			"action" => "article") ));
			
			
$Router->addRoute("weekArticles",
			new Zend_Controller_Router_Route
			(
			"/articles/week",
			array
			("controller" => "article",
			"action" => "week") ));
			
$Router->addRoute("dayArticles",
			new Zend_Controller_Router_Route
			(
			"/articles/day",
			array
			("controller" => "article",
			"action" => "day") ));
			
$Router->addRoute("search",
			new Zend_Controller_Router_Route
			(
			"/search/:search_term",
			array
			("controller" => "search",
			"action" => "index") ));
$Router->addRoute("search/build",
			new Zend_Controller_Router_Route
			(
			"/search/build",
			array
			("controller" => "search",
			"action" => "build") ));
$Router->addRoute("survey/index",
			new Zend_Controller_Router_Route
			(
			"/survey/index",
			array
			("controller" => "survey",
			"action" => "index") ));
$Router->addRoute("index/index",
			new Zend_Controller_Router_Route
			(
			"/index/index",
			array
			("controller" => "Index",
			"action" => "index") ));

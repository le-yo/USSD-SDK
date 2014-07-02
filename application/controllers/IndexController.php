<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $modelContent=new Model_Content();
       $categories=$modelContent->getCategories();
       $this->view->categories=$categories;
    }
    
	
 
    


}


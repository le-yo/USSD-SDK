<?php
/**
 * Get getContent helper
 *
 * Call as $this->getProfile() in your layout script
 */
class Zend_View_Helper_GetFarmerName extends Zend_View_Helper_Abstract
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function getFarmerName($id)
    {
    	
		$modelFarmers  = new Model_Farmers();
		
		$farmer = $modelFarmers->fetchFarmerById($id);
		
		return $farmer->names;
		
    }
}
 
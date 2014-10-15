<?php
/**
 * Get getContent helper
 *
 * Call as $this->getProfile() in your layout script
 */
class Zend_View_Helper_GetFarmerNameByPhone extends Zend_View_Helper_Abstract
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function getFarmerNameByPhone($phoneno)
    {
    	
		$modelFarmers  = new Model_Farmers();
		
		$farmer = $modelFarmers->fetchFarmerByPhone($phoneno);
		
		return $farmer->names;
		
    }
}
 
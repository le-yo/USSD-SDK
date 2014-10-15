<?php
/**
 * Get getContent helper
 *
 * Call as $this->getProfile() in your layout script
 */
class Zend_View_Helper_GetFarmerReward extends Zend_View_Helper_Abstract
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function getFarmerReward($id)
    {
		$modelRewards  = new Model_Rewards();
		
		$rewards = $modelRewards->fetchDataByFarmerId($id);
		
		return $org->names;
    }
}
 
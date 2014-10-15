<?php
/**
 * Get getContent helper
 *
 * Call as $this->getProfile() in your layout script
 */
class Zend_View_Helper_GetUserOrg extends Zend_View_Helper_Abstract
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function getUserOrg($id)
    {
		$modelPartners  = new Model_Partners();
		
		$org = $modelPartners->fetchDataById($id);
		if($org){
			return $org->names;
		}else{
			return '<i>None</i>';
		}
		
		
    }
}
 
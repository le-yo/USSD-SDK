<?php
/**
 * Get getContent helper
 *
 * Call as $this->getProfile() in your layout script
 */
class Zend_View_Helper_IsOrg extends Zend_View_Helper_Abstract
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function isOrg()
    {
		
		$auth = Zend_Auth::getInstance();
		if ($auth->hasIdentity()) {
			if($auth->getIdentity()->role=='101'){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
		
		
    }
}
 
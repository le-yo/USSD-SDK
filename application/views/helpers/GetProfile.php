<?php
/**
 * Get getContent helper
 *
 * Call as $this->getProfile() in your layout script
 */
class Zend_View_Helper_GetProfile extends Zend_View_Helper_Abstract
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function getProfile()
    {
		
		$auth = Zend_Auth::getInstance();
		if ($auth->hasIdentity()) {
			if(!$auth->getIdentity()->names==''){
				$expl = explode(' ', $auth->getIdentity()->names);
				return 'Welcome,  <b> '.strtoupper($expl[0]).'</b> ';
			}else{
				return 'Profile';
			}
		}else{
			return 'Login';
		}
		
		
    }
}
 
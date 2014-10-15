<?php
/**
 * Get getContent helper
 *
 * Call as $this->getProfile() in your layout script
 */
class Zend_View_Helper_GetProfileEmail extends Zend_View_Helper_Abstract
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function getProfileEmail()
    {
		
		$auth = Zend_Auth::getInstance();
		if ($auth->hasIdentity()) {
			if(!$auth->getIdentity()->names==''){
					
				$email = $auth->getIdentity()->email;
				
				return $email;
				
			}else{
				return 'Profile';
			}
		}else{
			return 'Login';
		}
		
		
    }
}
 
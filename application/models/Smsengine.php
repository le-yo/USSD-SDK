<?php

class Model_Smsengine extends Zend_Db_Table_Abstract {

    protected $_name = 'smslogs';

    public function formatPhoneno($phoneno = null) {
        if ($phoneno && is_numeric($phoneno)) {
            $phone = substr($phoneno, -9);
            $toPhone = '0' . $phone;
            return $toPhone;
        } else {
            return 0;
        }
    }
	
	public function sendSMS($to, $message){
		
		$tr = new Telerivet_API('u4gW6soyHxNrePvskmb4nQhvKy0U6aH0');
		$project = $tr->initProjectById('PJfb4299ba2908edb6');
		
		$sent_msg = $project->sendMessage(array(
		    'content' => $message,
		    'to_number' => $to
		));


	}

}


<?php

class Model_Sendsms extends Zend_Db_Table_Abstract {

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
		// Be sure to include the file you've just downloaded
		$to = substr($to, -9);
		
		// require_once('../libraries/AfricasTalkingGateway.php');
		
		// Specify your login credentials
		$username   = "lenykoskey";
		$apikey     = "abbfa09e621a6ece272a254e3fcd910657ff46e88f82db205499603d06dda908";
		
		// Specify the numbers that you want to send to in a comma-separated list
		// Please ensure you include the country code (+254 for Kenya in this case)
		$recipients = '+254'.$to; //can be comma separeted 
		$from = '20151';
		
		// Create a new instance of our awesome gateway class
		$gateway    = new AfricasTalkingGateway($username, $apikey);
		
		// Any gateway errors will be captured by our custom Exception class below, 
		// so wrap the call in a try-catch block
		try 
		{ 
		  // Thats it, hit send and we'll take care of the rest. 
		  $results = $gateway->sendMessage($recipients, $message, $from);
		  if($results){
		  	return $results;
		  }else{
		  	return 0;
		  }
		  // foreach($results as $result) {
		    // // Note that only the Status "Success" means the message was sent
		    // echo " Number: " .$result->number;
		    // echo " Status: " .$result->status;
		    // echo " MessageId: " .$result->messageId;
		    // echo " Cost: "   .$result->cost."\n";
		  // }
		}
		catch ( AfricasTalkingGatewayException $e )
		{
		  echo "Encountered an error while sending: ".$e->getMessage();
		}
		
		// DONE!!! 
	}


	public function sendSMSFromArray($to, $message){
			// Be sure to include the file you've just downloaded
			
			$recipients = array();
			
			foreach ($to as $key => $value) {
				$to = substr($value, -9);
				$to_end = '+254'.$to;
				
				array_push($recipients,$to_end);
			
				
			}
			
			if(count($recipients)>0){
				$recpts = implode(',', $recipients);
			
				// require_once('../libraries/AfricasTalkingGateway.php');
				
				// Specify your login credentials
				$username   = "lenykoskey";
				$apikey     = "abbfa09e621a6ece272a254e3fcd910657ff46e88f82db205499603d06dda908";
				
				// Specify the numbers that you want to send to in a comma-separated list
				// Please ensure you include the country code (+254 for Kenya in this case)
				$recipients = '+254'.$to; //can be comma separeted 
				$from = '20151';
				
				// Create a new instance of our awesome gateway class
				$gateway    = new AfricasTalkingGateway($username, $apikey);
				
				// Any gateway errors will be captured by our custom Exception class below, 
				// so wrap the call in a try-catch block
				try 
				{ 
				  // Thats it, hit send and we'll take care of the rest. 
				  $results = $gateway->sendMessage($recpts, $message, $from);
				  
				  if($results){
				  	return $results;
				  }else{
				  	return 0;
				  }
				  // foreach($results as $result) {
				    // // Note that only the Status "Success" means the message was sent
				    // echo " Number: " .$result->number;
				    // echo " Status: " .$result->status;
				    // echo " MessageId: " .$result->messageId;
				    // echo " Cost: "   .$result->cost."\n";
				  // }
				}
				catch ( AfricasTalkingGatewayException $e )
				{
				  echo "Encountered an error while sending: ".$e->getMessage();
				}
			
			}else{
				return 0;
			}
			
			// DONE!!! 
		}



    public function sendSMSThroughTelerivet($to, $message) {
		
        $api_key = 'OYJLPnutC239ezyCOVq6S4osEau3cRCy';
        $project_id = 'PJ76491f49cb451506';
        $phone_id = 'PN22d0ca2c27a3ab28';
        $to_number = $this->formatPhoneno($to);
        $content = strip_tags($message);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.telerivet.com/v1/projects/$project_id/messages/outgoing");
        curl_setopt($curl, CURLOPT_USERPWD, "{$api_key}:");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
            'content' => $content,
            'phone_id' => $phone_id,
            'to_number' => $to_number,
                        ), '', '&'));

        // if you get SSL errors, download SSL certs from https://telerivet.com/_media/cacert.pem .
        // curl_setopt($curl, CURLOPT_CAINFO, dirname(__FILE__) . "/cacert.pem");    

        $json = curl_exec($curl);
        $network_error = curl_error($curl);
        curl_close($curl);

        if ($network_error) {
            // echo $network_error; // do something with the error message
            return 0;
        } else {
            $res = json_decode($json, true);

            if (isset($res['error'])) {
                // API error
                // var_dump($res); // do something with the response
                return 0;
            } else {
                // success! 
                //log the message 
                //return true
                return 1;
                //var_dump($res); // do something with the response
            }
        }
    }

    public function addData($data) {
        $row = $this->createRow();
        $row->setFromArray($data);
        //save the new row
        return $row->save();
    }

    public function updateData($id, $data) {

        $select = $this->select()
                ->where('id=?', $id);
        $rows = $this->fetchAll($select);
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $row->setFromArray($data);
                //save the new row
                return $row->save();
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateGuid($id) {

        $select = $this->select()
                ->where('id=?', $id);
        $rows = $this->fetchAll($select);
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $row->guid = uniqid('et');
                //save the new row
                return $row->save();
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function fetchById($id) {
        $select = $this->select()
                ->where('deleted=?', 0);
        return $this->fetchRow($select);
    }

    public function fetchByGuid($guid) {
        $select = $this->select()
                ->where('guid=?', $guid);
        return $this->fetchRow($select);
    }
	public function fetchDataByMessageIdAndPhoneNo($messageid, $phoneno) {
        $select = $this->select()
                ->where('messageid=?', $messageid)
				->where('messageto=?', $phoneno);
        return $this->fetchRow($select);
    }
	
	

    public function fetchData() {
        $select = $this->select()
                ->order('datesent DESC');
        return $this->fetchAll($select);
    }
    public function fetchLatestActivity() {
        $select = $this->select()
                ->order('datesent DESC')
                ->limit(10);
        return $this->fetchAll($select);
    }
	
    public function countData() {
        $select = $this->select();
        $result = $this->fetchAll($select);
        if ($result) {
            $data = $result->toArray();
            if (!empty($data)) {
                return count($data);
            } else {
                return '0';
            }
        } else {
            return '0';
        }
    }

}



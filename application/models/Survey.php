<?php

class Model_Survey extends Zend_Db_Table_Abstract {

    protected $_name = "smsSurveys";
    protected $_dbTable;

    //Get all articles belonging to this category
    
    public function addData($data){
                   $row = $this->createRow();
				   //$row->guid = uniqid('acild-sms-');
                   $row->setFromArray($data);
				   
                   //save the new row
                   return $row->save();
           }
    
    public function getSurvey($code) {
    	//print_r($code);
		//exit;
        $select = $this->select()
                ->where('code=?', $code);
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			$row = (object) $row;
			return $row;
		}else{
			return $row;
		}
    }

public function getSurveybyID($id){
	 $select = $this->select()
                ->where('id=?', $id);
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			$row = (object) $row;
			return $row;
		}else{
			return $row;
		}
	
}
	
	//get survey codes
	
	public function getSurveyCodes(){
		$select = $this->select();
                //->where('survey_question_id=?', $id);
        $result = $this->fetchAll($select)->toArray();
		
		$output = array_slice($result, -5);
		//print_r($output);
		//exit;
		
	$i = '1';
    $options = "";
    foreach ($output as $row) {
    	
		//print_r($row['option_text']);
		//exit;
        $options = $options.$i.": ".$row['shortname']. PHP_EOL;
		// if($row->is_correct_answer==1){
			// $correctAnswer = $i;
		// }
        $i++;
	}
	
	return $options;
	}
	//survey menu
	public function getSurveyMenu(){
		$select = $this->select();
                //->where('survey_question_id=?', $id);
        $result = $this->fetchAll($select)->toArray();
		
		$output = array_slice($result, -5);
		//print_r($output);
		//exit;
		
	$i = '1';
    $options = array();
    foreach ($output as $row) {
    	
		//print_r($row['option_text']);
		//exit;
        $options[$i] = array($row['id'],$row['shortname'],$row['code']);
		// if($row->is_correct_answer==1){
			// $correctAnswer = $i;
		// }
        $i++;
	}
	//print_r($options);
	//exit;
	return $options;
	}
	
	//create user
	
	public function createUser($data) {
		
		$row = $this->createRow();
		// print_r($row);
		// exit;
		$row->setFromArray($data);
		// print_r($row);
		// exit;
		//save the new row //now fetch the id of the row just created and return it
		 if ($row->save()) {
		 	return TRUE;
			 
		 }else{
		 	return FALSE;
		 }
		 exit;
       // $where = array('TE_categories=?' => $category);
        //$data = array('TE_category_slug' => $slug);
        
    }

    

    public function getCategories() {
        $select = $this->select()
                ->distinct()
                ->from('cipelt_content', array('TE_categories', 'TE_category_slug'));
        return $this->fetchAll($select);
    }


    public function updateUser($progress, $phone) {
        $where = array('phone=?' => $phone);
        $data = array('menu_item_id' => $progress);
        if ( $this->update($data, $where ,$this->_name )) {
            return true;
        } else {
            return false;
        }
    }
	public function updateUserData($data, $id) {
        $where = array('id=?' => $id);
       // $data = array('menu_item_id' => $progress);
        if ( $this->update($data, $where ,$this->_name )) {
            return true;
        } else {
            return false;
        }
    }
	public function updateUserMenuStep($id,$step){
		$where = array('id=?' => $id);
        $data = array('step' => $step);
        if ( $this->update($data, $where ,$this->_name )) {
            return true;
        } else {
            return false;
        }
		
		
	}
	
	public function updateUserSession($id,$session){
		$where = array('id=?' => $id);
        $data = array('session' => $session);
        if ( $this->update($data, $where ,$this->_name )) {
            return true;
        } else {
            return false;
        }
		
		
	}

    public function getDbTable() {
        if (null === $this->_dbTable) {
            $this->setDbTable('cipelt_content');
        }

        return $this->_dbTable;
    }

    public function setDbTable($dbTable) {
//        if (is_string($dbTable)) {
//            $dbTable = new $dbTable();
//        }
//        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
//            throw new Exception('Invalid table data gateway provided');
//        }
//        $this->_dbTable = $dbTable;
//        return $this;
    }
    public function fetchCasualties(){
		$select = $this->select();
		return $this->fetchAll($select);
	}

}

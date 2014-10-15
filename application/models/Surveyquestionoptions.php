<?php

class Model_Surveyquestionoptions extends Zend_Db_Table_Abstract {

    protected $_name = "survey_question_options";
    protected $_dbTable;
	
	//lets add the options of the given question
	
	public function addData($data,$question_id){
		
		//print_r($data);
		//exit;
		$number = count($data);
		
		$count = 0;
		
		foreach ($data as $key => $value) {
			//creating each question responses
			$row = $this->createRow();
				   //$row->guid = uniqid('acild-sms-');
                   $row->option_text = $value;
				   $row->survey_question_id = $question_id;
				   
                   //save the new row
                   if (!empty($value)) {
                    $result = $row->save();
				  if ($result) {
				  	$count = $count+1;
					  
				  }	 
                   }
                  
			
		}
		
		if ($count == $number) {
			return TRUE;
			
		}else{
			return TRUE;
		}
                   
                   //return $row->save();
           }
    
	
    //Get all articles belonging to this category
    public function getQuestionOptions($id) {
    	
		//print_r($id);
		//exit;
		
        $select = $this->select()
                ->where('survey_question_id=?', $id);
        $result = $this->fetchAll($select)->toArray();
		//print_r($result);
		//exit;
		
		
		
		    $i = 'A';
    $options = "";
    foreach ($result as $row) {
    	
		//print_r($row['option_text']);
		//exit;
        $options = $options.$i.":".$row['option_text']. PHP_EOL;
		// if($row->is_correct_answer==1){
			// $correctAnswer = $i;
		// }
        $i++;
    }

		return $options;
	}
	
	//create user
	
	public function getOptionsdata($id){
		
		$select = $this->select()
                ->where('survey_question_id=?', $id);
        $result = $this->fetchAll($select)->toArray();
		
		
	$i = 'A';
    $options = "";
    foreach ($result as $row) {
        $options[$i] = array($i => array( $row['id'],$row['option_text'])); 
        $i++;
    }
	$optionsdata = $options;
		return $optionsdata;
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

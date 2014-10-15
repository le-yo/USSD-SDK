<?php

class Model_Surveyquestions extends Zend_Db_Table_Abstract {

    protected $_name = "smsSurveyQuestions";
    protected $_dbTable;


	//adddata
	public function addData($data,$survey_id){
		
		//print_r($survey_id);
		//exit;
		$select = $this->select()
                ->where('surveyid=?', $survey_id)
				//->where('menu_id=?', $menu_id)
				//->where('step=?', $step)
				->order('id DESC');;
        $row2 = $this->fetchRow($select);
		
		//print_r($row);
		//exit;
		if (empty($row2['id'])) {
			$row = $this->createRow();
				   //$row->guid = uniqid('acild-sms-');
            $row->setFromArray($data);
			$row->_order = 1;
				   
                   //save the new row
            return $row->save();
			
			//$row['id'] = 0;
			//return $row; 
		}else{
			$row = $this->createRow();
				   //$row->guid = uniqid('acild-sms-');
            $row->setFromArray($data);
			$row->_order = $row2['_order'] + 1;
				   
                   //save the new row
            return $row->save();
			//return $row;
		}
      }
	
    //Get all articles belonging to this category
    public function getQuestion($survey_id,$order) {
        $select = $this->select()
                ->where('surveyid=?', $survey_id)
				->where('_order=?', $order);
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			return $row;
		}else{
			return $row;
		}
    }
	
	
public function checkifUserShouldProceed($user_id,$survey_id){
	
	//print_r($survey_id." and ".$user_id);
	//exit;
	$proceed = 0;
	$questions = $this->getQuestions($survey_id);
	
	foreach ($questions as $key => $value) {
		//we need to find the user response
		//print_r($value['id']);
		//exit;
		$userResponse = $this->getUserResponse($user_id, $value['id']);
		print_r($userResponse);
		exit;
		
	}
	//print_r($questions);
	exit;
	
}
	//create user
public function getQuestions($survey_id) {
        $select = $this->select()
                ->distinct()
                //->from('cipelt_content')
				->where('surveyid=?', $survey_id);
        return $this->fetchAll($select);
    }

	public function getUserResponse($user_id,$question_id) {
	// $_name = "surveyResponse";
		
        $select = $this->select()
				//->from('surveyResponse')
                ->where('user_id=?', $user_id)
				->where('survey_question_id=?', $question_id);
				
				//print_r($select);
				//exit;
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			return $row; 
		}else{
			return $row;
		}
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



}

<?php

class Model_SurveyResponse extends Zend_Db_Table_Abstract {

    protected $_name = "surveyResponse";
    protected $_dbTable;

    //Get all articles belonging to this category
    public function getResponse($user_id,$menu_id,$step) {
        $select = $this->select()
                ->where('user_id=?', $user_id)
				->where('menu_id=?', $menu_id)
				->where('step=?', $step);
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			return $row; 
		}else{
			return $row;
		}
    }
	
	public function getUserResponse($user_id,$question_id) {
	// $_name = "surveyResponse";
		
        $select = $this->select()
				//->from('surveyResponse')
                ->where('user_id=?', $user_id)
				->where('survey_question_id=?', $question_id)
				->order('id DESC');
				
				//print_r($select);
				//exit;
        $row = $this->fetchRow($select);
		if (empty($row['response'])) {
			$row['response'] = -1;
			return $row; 
		}else{
			//$row['response']
			return $row;
		}
    }
	
	//confirm responses
	public function confirmResponses($user){
		$where = array('user_id=?' => $user['id'],'menu_id' => $user['menu_item_id'],'confirmed' => 0);
        $data = array('confirmed' => 1);
        if ( $this->update($data, $where ,$this->_name )) {
            return true;
        } else {
            return false;
        }
		
	}
	//create user
	
	public function createResponse($data) {
		
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

    

        public function getUserResponses($user_id,$survey_id) {
    	
		//print_r($id);
		//exit;
		
        $select = $this->select()
                ->where('survey_question_id=?', $id);
        $result = $this->fetchAll($select)->toArray();
		//print_r($result);
		//exit;
		
		
		
		    $i = '1';
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
}

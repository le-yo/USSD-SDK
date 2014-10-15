<?php

class Model_Response extends Zend_Db_Table_Abstract {

    protected $_name = "user_ussd_response";
    protected $_dbTable;

    //Get all articles belonging to this category
    public function getResponse($user_id,$menu_id,$step) {
        $select = $this->select()
                ->where('user_id=?', $user_id)
				->where('menu_id=?', $menu_id)
				->where('step=?', $step)
				->order('id DESC');;
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			return $row; 
		}else{
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
		//print_r($data);
		//exit;
		
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



}

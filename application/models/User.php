<?php

class Model_User extends Zend_Db_Table_Abstract {

    protected $_name = "users";
    protected $_dbTable;

    //Get all articles belonging to this category
    public function getUserWithPhone($no) {
    	
// print_r($no);
// exit;
        $select = $this->select()
                ->where('phoneno=?', $no);
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			return $row;
		}else{
			return $row;
		}
    }
	
	//create user
	
	//getUserWithNationaID($message)
	//Get all articles belonging to this category
    public function getUserWithNationaID($national_id) {
    	
//print_r($national_id);
//exit;
        $select = $this->select()
                ->where('idno=?', $national_id);
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			return $row;
		}else{
			return $row;
		}
    }
	
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


    public function updateUser($progress, $phone) {
        $where = array('phoneno=?' => $phone);
        $data = array('menu_item_id' => $progress);
        if ( $this->update($data, $where ,$this->_name )) {
            return true;
        } else {
            return false;
        }
    }
	public function updateUserData($data, $id) {
        $where = array('id=?' => $id);
		//print_r($data);
		//exit;
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

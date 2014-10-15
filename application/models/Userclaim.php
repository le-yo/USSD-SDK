<?php

class Model_Userclaim extends Zend_Db_Table_Abstract {

    protected $_name = "user_claims";
    protected $_dbTable;

	
	public function create($data) {
		
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


	public function updateUserCardData($data, $id) {
        $where = array('id=?' => $id);
        if ( $this->update($data, $where ,$this->_name )) {
            return true;
        } else {
            return false;
        }
    }

}

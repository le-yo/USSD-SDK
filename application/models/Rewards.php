<?php

class Model_Rewards extends Zend_Db_Table_Abstract {

    protected $_name = "rewards";
	
	public function addData($data){
                   $row = $this->createRow();
                   $row->setFromArray($data);
				   
                   //save the new row
                   return $row->save();
           }
	
	public function updateData($id, $data)
		 {
			
			$select = $this->select()
						->where('id=?',$id);
			$rows= $this->fetchAll($select);
			if(!empty($rows)){
				foreach ($rows as $row) {
				$row->setFromArray($data);
				//save the new row
				return $row->save();
				}
				return TRUE;
			}else{
				return FALSE;
			}
	       
		 }
		  public function updateInfo($data,$motherid){
                     $where=array('parentid=?'=>$motherid);
                      if($this->update($data,$where)){
                         return TRUE;
                     }else{
                     	return false;
                     }
                     
                 }
		  
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

    

    public function getCategories() {
        $select = $this->select()
                ->distinct()
                ->from('cipelt_content', array('TE_categories', 'TE_category_slug'));
        return $this->fetchAll($select);
    }


    public function update_category_slug($slug, $category) {
        $where = array('TE_categories=?' => $category);
        $data = array('TE_category_slug' => $slug);
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

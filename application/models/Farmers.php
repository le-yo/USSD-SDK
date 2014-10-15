<?php

class Model_Farmers extends Zend_Db_Table_Abstract
{
	protected $_name = 'farmers';
	
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
		 
		  public function fetchData(){
		 	$select = $this->select()
				->where('deleted=?',0);
			return $this->fetchAll($select);
		 }
		 public function fetchFarmerById($id){
		 	$select = $this->select()
				->where('id=?',$id);
			return $this->fetchRow($select);
		 }
		 
		 public function fetchDataById($id){
		 	$select = $this->select()
				->where('id=?',$id);
			return $this->fetchRow($select);
		 }
		 
		 
		 
		 public function fetchFarmerByPhone($phoneno){
		 	$select = $this->select()
				->where('phoneno=?',$phoneno);
			return $this->fetchRow($select);
		 }
		 
		  
		  public function fetchDataByFarmerId($farmerid){
		 	$select = $this->select()
				->where('farmer_id=?',$farmerid);
			return $this->fetchAll($select);
		 }
		  
		  
		  
		  public function farmerCount($org){
		 	if($org !== 1){
		 		$select = $this->select()
				->where('deleted=?',0)
				->where('organization=?',$org);
			$farmers =  $this->fetchAll($select);
		 	}else{
		 		$select = $this->select()
				->where('deleted=?',0);
				$farmers =  $this->fetchAll($select);
		 	}
			
			if($farmers){
				$farmersarray  = $farmers->toArray();
				return count($farmersarray);
			}else{
				return 0;
			}
		 }
		  
		  public function fetchDataByOrg($org){
		 	if($org  ==1 ){
		 		$select = $this->select()
					->where('deleted=?',0)
					->order('id DESC');
				return $this->fetchAll($select);
		 	}else{
		 		$select = $this->select()
					->where('deleted=?',0)
					->where('organization=?',$org)
					->order('id DESC');
			return $this->fetchAll($select);
		 	}	
		 	
		 }
		  public function fetchFarmerByPhoneno($phoneno){
		 	$select = $this->select()
					->where('deleted=?',0)
					->where('phoneno=?',$phoneno)
					->order('dateregistered DESC');
			return $this->fetchRow($select);
		 }
		  
		  
		  
		  //these models belong to Leyo, please call +254728355429 or email gmail@le-yo.com before edditing
		  
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


<?php

class Model_Account extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';
	
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
		 	$select = $this->select();
			return $this->fetchAll($select);
		 }
		  public function fetchDatabyEmail($email){
		  	$select = $this->select()
							->where('email=?',$email);
			return $this->fetchRow($select);
		  }
		  public function fetchDatabyRst($token){
		  	$select = $this->select()
							->where('passwordrst=?',$token);
			return $this->fetchRow($select);
		  }
}


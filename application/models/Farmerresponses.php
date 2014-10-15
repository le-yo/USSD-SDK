<?php

class Model_Farmerresponses extends Zend_Db_Table_Abstract
{
	protected $_name = 'responses';
	
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
		 public function fetchDataById($id){
		 	$select = $this->select()
				->where('id=?',$id);
			return $this->fetchRow($select);
		 }
		  
		
		  
		  
		  
}


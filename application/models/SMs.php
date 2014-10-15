<?php

class Model_SMs extends Zend_Db_Table_Abstract
{
	protected $_name = 'custommessages';
	
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
		public function updateGuid($id)
		 {
			
			$select = $this->select()
						->where('id=?',$id);
			$rows= $this->fetchAll($select);
			if(!empty($rows)){
				foreach ($rows as $row) {
				$row->guid = uniqid('et');
				//save the new row
				return $row->save();
				}
				return TRUE;
			}else{
				return FALSE;
			}
	       
		 }
		 public function fetchByMotherId($motherid){
                     $select = $this->select()
				->where('parentid=?',$motherid);
			return $this->fetchRow($select);
                 }
}


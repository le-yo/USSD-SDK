<?php

class Model_BulkSMS extends Zend_Db_Table_Abstract
{
	protected $_name = 'bulksms';
	
	public function addData($data){
                   $row = $this->createRow();
				   $row->guid = uniqid('acild-sms-');
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
		 public function fetchById($id){
             $select = $this->select()
				->where('id=?',$id);
			return $this->fetchRow($select);
         }
		 
		 public function fetchByGuid($guid){
             $select = $this->select()
				->where('guid=?',$guid);
			return $this->fetchRow($select);
         }
		 
		 
		 public function fetchSentSMS(){
             $select = $this->select()
				->where('status=?',1)
				->where('farmercount > 0');
			return $this->fetchAll($select);
         }
		 
		 public function messageCount($org){
			 	
			 if($org !== 1){	
			 $select = $this->select()
             	->from(array('b' => 'bulksms'),
                    array('farmercount','status'))
					->where('status=?',1)
					->where('organization=?',$org);
					
			 $m = $this->fetchAll($select);
			 }else{
			 	$select = $this->select()
             	->from(array('b' => 'bulksms'),
                    array('farmercount','status'))
					->where('status=?',1);
					
			 $m = $this->fetchAll($select);
			 }
			 
			 if($m){
			 	$countArray  = array();
			 	
			 	$mArray  = $m->toArray();
				 //print_r($mArray);exit;
				 
				 foreach ($mArray as $key => $value) {
					 	
					 array_push($countArray,$value['farmercount']);
					 
				 }
				 
				 if(!empty($countArray)){
				 	$sum = array_sum($countArray);
					 return $sum;
				 }else{
				 	return 0;
				 }
				 
				 
			 }else{
			 	return 0;
			 }
         }
		 
		 
		 
		 
}


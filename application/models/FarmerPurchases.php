<?php

class Model_FarmerPurchases extends Zend_Db_Table_Abstract {

    protected $_name = "farmer_purchases";
    protected $_dbTable;


	//create purchase
	
	public function createPurchase($data) {
		
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

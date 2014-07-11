<?php

class Model_MenuItems extends Zend_Db_Table_Abstract {

    protected $_name = "menu_item";
    protected $_dbTable;

    //Get all articles belonging to this category
    public function getMenuItems($id) {
        $select = $this->select()
                ->where('menu_id=?', $id);
        $result = $this->fetchAll($select)->toArray();
		
		$i = 1;
   		$menuItems = array();
    	foreach ($result as $row) {
        $menuItems[$i] = array( $row['id'],$row['description'],$row['next_menu_id'],$row['step'],$row['confirmation_phrase'] );
        $i++;
   		}
		return $menuItems;
		
    
	
	}
		public function getNextMenuStep($menu_item_id,$step){
		$select = $this->select()
                ->where('menu_id=?', $menu_item_id)
				->where('step=?', $step);
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			return $row;
		}else{
			return $row;
		}
	}
	
	public function getMenuOptions($id) {
        $select = $this->select()
                ->where('menu_id=?', $id);
        $result = $this->fetchAll($select)->toArray();
		
		$i = 1;
   		$menuItems = "";
    	foreach ($result as $row) {
    		 $menuItems = $menuItems.$i.":".$row['description']. PHP_EOL;
        //$menuItems[$i] = array( $row['id'],$row['description'] );
        $i++;
   		}
		return $menuItems;
		
    
	
	}
	
	//create user
	
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

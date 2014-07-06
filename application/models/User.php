<?php

class Model_User extends Zend_Db_Table_Abstract {

    protected $_name = "users";
    protected $_dbTable;

    //Get all articles belonging to this category
    public function getUserWithPhone($no) {
        $select = $this->select()
                ->where('phone=?', $no);
        $row = $this->fetchRow($select);
		if (empty($row['id'])) {
			$row['id'] = 0;
			return $row;
		}else{
			return $row;
		}
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
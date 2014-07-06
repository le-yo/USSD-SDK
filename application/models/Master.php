<?php

class Model_Master extends Zend_Db_Table_Abstract {

	function createData($table, $data) {
		$db_adapter = Zend_Db_Table::getDefaultAdapter();

		//$db_adapter->query($query);
		$keys = "";
		$values = "";
		//end($data);
		//fetch key of the last element of the array.
		$lastElementKey = key($data);

		foreach ($data as $key => $value) {

			if ($key == $lastElementKey) {
				$keys = $keys . $key;
				$values = $values . "'" . $value . "'";
			} else {
				$keys = $keys . "," . $key;
				$values = $values . ",'" . $value . "'";
			}
		}

		$query = $db_adapter -> query("INSERT INTO " . $table . " (" . $keys . ") VALUES (" . $values . ")");
		if ($query) {
			return 1;
		} else {
			return 0;
		}

	}

	function readData($what = "*", $table, $where) {
		$db_adapter = Zend_Db_Table::getDefaultAdapter();

		$statement = "SELECT " . $what . " FROM " . $table . " WHERE " . $where;
		$query = $db_adapter -> query($statement);

		if (count($query) > 0) {
			print_r($query);
			exit;
			$row = $query -> toArray();

			return $row;
			// echo $row->name;
			// echo $row->body;
		} else {
			$row = array();
			$row['id'] = 0;
			$row = (object)$row;
			//$row->id = 0;
			return $row;
		}

	}

	function updateData($what, $table, $where) {
		$db_adapter = Zend_Db_Table::getDefaultAdapter();

		$query = $db_adapter -> query("UPDATE " . $table . " SET " . $what . " WHERE " . $where);
	}

	function deleteData($what, $table, $where) {

	}

}

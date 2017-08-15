<?php

class Kategorija extends Db_object{

	protected static $db_table = "kategorije";
	protected static $db_table_fields = array('ime');
	public $id;
	public $ime;


	public $errors = array();

	public function provera_kategorije(){

		global $database;

		$ime = $database->escape_string($this->ime);
		$sql = "SELECT * FROM ". self::$db_table ." WHERE ";
		$sql .= "ime = '{$ime}' ";

		$sql_id = "SELECT * FROM ". self::$db_table ." WHERE ";
		$sql_id .= "id = '{$this->id}'";

		$result = $database->query($sql);
		$result_id = $database->query($sql_id);
		if($this->ime == ""){

			$this->errors = "Unesite ime kategoriji!";
			return false;

		}

		if(mysqli_num_rows($result_id) == 0){
			if(mysqli_num_rows($result) != 0){

				$this->errors = "Kategorija '".$this->ime."' već postoji!";
				return false;
				
			}else{
				return true;
			}
		}else{

			return true;

		}
	}

}
?>
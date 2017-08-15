<?php

class Korisnik extends Db_object{

	protected static $db_table = "korisnici";
	protected static $db_table_fields = array('username', 'password');
	public $id;
	public $username;


	public $errors = array();

	public static function verify_user($username, $password){

		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);
		$sql = "SELECT * FROM ". self::$db_table ." WHERE ";
		$sql .= "username = '{$username}' AND ";
		$sql .= "password = '{$password}' ";
		$sql .= "LIMIT 1";

		$the_result_array = self::find_this_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}

}
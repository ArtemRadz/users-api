<?php

class Model
{

	public function get_query($query) {
		try
		{
			$db = new Db();
			$db = $db->connect();

			$stmt = $db->query($query);
			$date = $stmt->fetchAll(PDO::FETCH_OBJ);

			$db = null;
			return $date;
		}
		catch(PDOException $e)  
		{
			return $e;
		}
	}

	public function post_query($query) {
		try
		{
			$db = new Db();
			$db = $db->connect();

			$stmt = $db->query($query);
			return '{"text": "User added"}';
		}
		catch(PDOException $e)  
		{
			return $e;
		}
	}

	public function get_users() {
		$sql = "SELECT * FROM users";

		$result = Model::get_query($sql);

		return $result;
	}

	public function get_user_id($id) {
		$sql = "SELECT * FROM users WHERE user_id = $id";

		$result = Model::get_query($sql);

		return $result;
	}

	public function get_user_name($name) {
		$sql = "SELECT * FROM users WHERE name = '$name'";

		$result = Model::get_query($sql);

		return $result;
	}

	public function insert_user($name, $surname, $age)
	{
		$sql = "INSERT INTO users (name, surname, age) VALUES ('$name', '$surname', $age)";
		return Model::post_query($sql);
	}
}

?>
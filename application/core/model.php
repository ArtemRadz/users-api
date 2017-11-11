<?php

require_once 'application/core/db.php';

class Model
{

	public function get_query($query) 
	{
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

	public function post_query($query) 
	{
		try
		{
			$db = new Db();
			$db = $db->connect();

			$stmt = $db->query($query);

			$db = null;
			return 'User added';
		}
		catch(PDOException $e)  
		{
			return $e;
		}
	}

	public function update_query($query, $id) 
	{
		try
		{
			$db = new Db();
			$db = $db->connect();

			$stmt = $db->query($query);

			$db = null;
			return "User with id $id updated";
		}
		catch(PDOException $e)  
		{
			return $e;
		}
	}

	public function delete_query($query, $id) 
	{
		try
		{
			$db = new Db();
			$db = $db->connect();

			$stmt = $db->query($query);

			$db = null;
			return "User with id $id deleted";
		}
		catch(PDOException $e)  
		{
			return $e;
		}
	}



	//GET
	public function get_users() 
	{
		$sql = "SELECT * FROM users";

		$result = Model::get_query($sql);

		return $result;
	}

	public function get_user_id($id) 
	{
		$sql = "SELECT * FROM users 
				WHERE user_id = $id";

		$result = Model::get_query($sql);

		return $result;
	}

	public function get_user_name($name) 
	{
		$sql = "SELECT * FROM users 
				WHERE name = '$name'";

		$result = Model::get_query($sql);

		return $result;
	}


	//INSERT
	public function insert_user($name, $surname, $age)
	{
		$sql = "INSERT INTO users (name, surname, age) 
				VALUES ('$name', '$surname', $age)";

		$result = Model::post_query($sql);

		return $result;
	}


	//UPDATE
	public function update_user($id, $name, $surname, $age)
	{
		$sql = "UPDATE users 
				SET name = '$name', surname = '$surname', age = $age 
				WHERE user_id = $id";

		$result = Model::update_query($sql, $id);

		return $result;
	}


	//DELETE
	public function delete_user($id)
	{
		$sql = "DELETE FROM users 
				WHERE user_id = $id";

		$result = Model::delete_query($sql, $id);

		return $result;
	}
}

?>
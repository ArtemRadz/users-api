<?php

class Route
{
	static function start()
	{
		$model = new Model();
		$request = $_SERVER['REQUEST_URI'];
		$method = $_SERVER['REQUEST_METHOD'];

		//Request GET
		if($method === 'GET') 
		{

			require_once 'application/controllers/get_controller.php';
			$get_controller = new Get_controller();
			$error_message = null;
			$date = null;

			//request 'localhost/api/users'
			if($request === '/api/users') 
			{	
				$error_message = "Not found users";
				$date = $get_controller->get("get_users");
			} 

			//request 'localhost/api/users/{id}'
			else if(preg_match('/api\/users\/\d+/', $request))
			{
				$id = explode('/', $request)[3];
				$error_message = "Not found user with id $id";
				$date = $get_controller->get("get_user_id", $id);
			} 

			//request 'localhost/api/users/{name}'
			else if(preg_match('/api\/users\/[a-zA-Z]+/', $request))
			{
				$name = explode('/', $request)[3];
				$error_message = "Not found user with name $name";
				$date = $get_controller->get("get_user_name", $name);
			}

			if(empty($date)) 
			{
				$message = new Message($error_message);
				echo json_encode($message);
				return;
			}

			echo json_encode($date);
		}


		//Request POST
		else if($method === 'POST') 
		{
			require_once 'application/controllers/post_controller.php';
			$post_controller = new Post_controller();

			//request 'localhost/api/users/add with body name, surname and age'
			if($request === '/api/users') 
			{
				$name = $_POST['name'];
				$surname = $_POST['surname'];
				$age = $_POST['age'];
				$message = $post_controller->post($name, $surname, $age);
				echo $message;
			}
		}


		//REQUEST PUT
		else if($method === 'PUT') 
		{
			require_once 'application/controllers/put_controller.php';
			$put_controller = new Put_controller();

			//request 'localhost/api/users/{id} with body name, surname and age'
			if(preg_match('/api\/users\/\d+/', $request))
			{
				$id = explode('/', $request)[3];
				parse_str(file_get_contents('php://input'), $_PUT);
    			$name = $_PUT['name'];
				$surname = $_PUT['surname'];
				$age = $_PUT['age'];
				$message = $put_controller->put($id, $name, $surname, $age);
				echo $message;		
    		}
		}

		else if($method === 'DELETE') 
		{
			require_once 'application/controllers/delete_controller.php';
			$delete_controller = new Delete_controller();

			//request 'localhost/api/users/{id}'
			if(preg_match('/api\/users\/\d+/', $request))
			{
				$id = explode('/', $request)[3];
				$message = $delete_controller->delete($id);
				echo $message;		
    		}
		}
	}
}

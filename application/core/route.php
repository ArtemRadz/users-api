<?php

class Route
{
	static function start()
	{
		$model = new Model();
		$request = $_SERVER['REQUEST_URI'];
		$method = $_SERVER['REQUEST_METHOD'];

		//Request GET
		if($method === 'GET') {

			//request 'localhost/api/users'
			if($request === '/api/users') 
			{	
				$date = json_encode($model->get_users());
				if(empty($date)) 
				{
					$message = new Message("Not found users");
					echo json_encode($message);
					return;
				}
				echo $date;
			} 
			//request 'localhost/api/users/{id}'
			else if(preg_match('/api\/users\/\d+/', $request))
			{
				$id = explode('/', $request)[3];
				$date = $model->get_user_id($id);
				if(empty($date)) 
				{
					$message = new Message("Not found user with id $id");
					echo json_encode($message);
					return;
				}

				echo json_encode($date);
			} 
			//request 'localhost/api/users/{name}'
			else if(preg_match('/api\/users\/[a-zA-Z]+/', $request))
			{
				$name = explode('/', $request)[3];
				$date = $model->get_user_name($name);

				if(empty($date)) 
				{
					$message = new Message("Not found user with name $name");
					echo json_encode($message);
					return;
				}

				echo json_encode($date);
			}
		}

		//Request POST
		else if($method === 'POST') 
		{
			//request 'localhost/api/users/add with body name, surname and age'
			if($request === '/api/user/add') {
				$name = $_POST['name'];
				$surname = $_POST['surname'];
				$age = $_POST['age'];
				$message = $model->insert_user($name, $surname, $age);
				echo $message;
			}
		}
	}
}

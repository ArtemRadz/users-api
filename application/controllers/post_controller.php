<?php 

class Post_controller extends Controller 
{
	public function post($name, $surname, $age) 
	{
		$date = $this->model->insert_user($name, $surname, $age);
		return $date;
	}
}

?>
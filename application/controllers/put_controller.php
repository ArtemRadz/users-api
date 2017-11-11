<?php 

class Put_controller extends Controller 
{
	public function put($id, $name, $surname, $age) 
	{
		$date = $this->model->update_user($id, $name, $surname, $age);
		return $date;
	}
}

?>
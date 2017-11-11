<?php 

class Delete_controller extends Controller 
{
	public function delete($id) 
	{
		$date = $this->model->delete_user($id);
		return $date;
	}
}

?>
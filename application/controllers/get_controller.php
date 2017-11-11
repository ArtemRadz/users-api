<?php 

class Get_controller extends Controller 
{
	public function get($get_query, $id=null, $name=null) 
	{
		$date = $this->model->$get_query($id, $name);
		return $date;
	}
}

?>
<?php 

class Message {

	function __construct($message) 
	{
		$this->message = $message;
		$this->documentation_url = 'localhost/api/documentation';
	}
}

?>
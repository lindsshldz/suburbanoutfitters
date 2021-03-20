<?php

require_once 'dblogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

class User{
    public $email;
    public $userID;
	public $role = '';
	
	function __construct($email){
		global $conn;

		$this->email = $email;

		$query="select * from users where email='$email' ";
		//echo $query.'<br>';
		$result = $conn->query($query);
		if(!$result) die($conn->error);
			
		$rows = $result->num_rows;		
		
		$role = '';

		for($i=0; $i<$rows; $i++){
			$row = $result->fetch_array(MYSQLI_ASSOC);			
			$role = $row['role'];
			$this->userID= $row['userID'];
		}		

		$this->role = $role;
	}

	function getRoles(){
		return $this->role;
	}

}


















?>
<?php

require_once 'User.php';

session_start();

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	$userID = $user->userID;
	$email = $user->email;
	$user_roles = $user->getRoles();
	
	$found=0;
	foreach($user_roles as $urole){
		foreach($page_roles as $prole){
			if($urole == $prole){
				$found=1;
			}
		}
	}
}



?>
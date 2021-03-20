<?php

require_once 'User.php';

session_start();

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	$userID = $user->userID;
	$email = $user->email;
	$user_role = $user->getRoles();

	$found=0;
    foreach($page_roles as $prole){
        if($user_role == $prole){
            $found=1;
        }
    }

}

?>
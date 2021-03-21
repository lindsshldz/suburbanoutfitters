<?php

require_once 'User.php';

$user_role = null;
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}else{
	$user = $_SESSION['user'];
	$userID = $user->userID;
	$email = $user->email;
	$user_role = $user->getRoles();

	$found = 0;
    foreach ($page_roles as $prole) {
        if ($user_role == $prole) {
            $found = 1;
        }
    }

    error_log("found result: " . $found);
    if (!$found) {
        header("Location: index.php");
        exit();
    }

}
?>
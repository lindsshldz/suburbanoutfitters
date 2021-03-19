<?php
//Run first, after importing suburban_outfitters.sql
require_once '../php/dblogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

//User Britt Calvimonte
$firstName = 'Britt';
$lastName = 'Calvimonte';
$email = 'bcalvi@xyz.com';
$password = 'cust123';
$phoneNumber = '(801)555-4444';
$imgPath = null;
$role = 'customer';
$storeID = null;

$token = password_hash($password, PASSWORD_DEFAULT);
add_user($conn, $firstName, $lastName, $email, $token, $phoneNumber, $imgPath, $role, $storeID);

//User Jane Doe
$firstName = 'Jane';
$lastName = 'Doe';
$email = 'jane@abc.com';
$password = 'cust456';
$phoneNumber = '(435)111-2222';
$imgPath = null;
$role = 'customer';
$storeID = null;

$token = password_hash($password, PASSWORD_DEFAULT);
add_user($conn, $firstName, $lastName, $email, $token, $phoneNumber, $imgPath, $role, $storeID);

//User Troy Shields
$firstName = 'Troy';
$lastName = 'Shields';
$email = 'tls@email.com';
$password = 'cust789';
$phoneNumber = '(858)585-8585';
$imgPath = null;
$role = 'customer';
$storeID = null;

$token = password_hash($password, PASSWORD_DEFAULT);
add_user($conn, $firstName, $lastName, $email, $token, $phoneNumber, $imgPath, $role, $storeID);

//User Lindsay Shields
$firstName = 'Lindsay';
$lastName = 'Shields';
$email = 'linds.aln@gmail.com';
$password = 'pass123';
$phoneNumber = null;
$imgPath = null;
$role = 'admin';
$storeID = null;

$token = password_hash($password, PASSWORD_DEFAULT);
add_user($conn, $firstName, $lastName, $email, $token, $phoneNumber, $imgPath, $role, $storeID);

//User Cristina Cendejas
$firstName = 'Cristina';
$lastName = 'Cendejas';
$email = 'cristina@test.com';
$password = 'pass456';
$phoneNumber = null;
$imgPath = null;
$role = 'admin';
$storeID = null;

$token = password_hash($password, PASSWORD_DEFAULT);
add_user($conn, $firstName, $lastName, $email, $token, $phoneNumber, $imgPath, $role, $storeID);

//User Smith Mainoo
$firstName = 'Smith';
$lastName = 'Mainoo';
$email = 'smith@test.com';
$password = 'pass789';
$phoneNumber = null;
$imgPath = null;
$role = 'admin';
$storeID = null;

$token = password_hash($password, PASSWORD_DEFAULT);
add_user($conn, $firstName, $lastName, $email, $token, $phoneNumber, $imgPath, $role, $storeID);


function add_user($conn, $firstName, $lastName, $email, $token, $phoneNumber, $imgPath, $role, $storeID)
{
    //code to add user here
    $query = "insert into users(firstName, lastName, email, password, phoneNumber, imgPath, role, storeID) 
              values ('$firstName', '$lastName', '$email', '$token', '$phoneNumber', '$imgPath', '$role', '$storeID')";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
}


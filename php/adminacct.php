<?php

include 'adminnavbar.php';

//create connection
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//Get values from login screen
// $email = mysql_entities_fix_string($conn, $_POST['email']);
// $password = mysql_entities_fix_string($conn, $_POST['password']);
// $firstName = "";
// $lastName = "";



    $query = "SELECT * from users where email='$email'";

    $result = $conn->query($query);
    if(!$result) die($conn->error);

    $rows = $result->num_rows;
    for($i = 0; $i < $rows; $i++){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $email = $row['email'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        
     }
    
  




echo <<<_END
    
    <!--Profile Section-->
    <div class="container">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="row">
                <div class="col-sm-4 user-details">
                    <img src="/suburbanoutfitters/img/user.png" alt="user avatar">
                </div>
                <div class="col-sm-6 profile-info">
                    <div class="row ">
                        <div class="col-sm-4">
                            <p>First Name:</p>
                            <p>Last Name:</p>
                            <p>Username:</p>
                        </div>
                        <div class="col-sm-8">
                           <p>$firstName</p>
                            <p>$lastName</p>
                            <p>$email</p>
                        </div>
                    </div>
                    
                </div>
                <input type="submit" class="bg-light col-sm-2" value="Edit Profile" style="height: 30px;">
            </div>
            <input type="file" value="update photo">
            <div class="border-bottom my-2"></div>
            <div class="card-body">
                <h5 class="text-uppercase mb-4">Assisted Order Lists by: $email</this></h5>
                    <ul class="list-unstyled mb-0">
_END;


$order_number = "";
//order query
$order_query = "SELECT * from orders";
$order_result = $conn->query($order_query);
if(!$order_query) die($conn->error);

$orders = $order_result->num_rows;
for($j = 0; $j< $orders; $j++){
   $order = $order_result->fetch_array(MYSQLI_ASSOC);
   $order_number = $order['orderID'];
//loop for orders
echo <<<_END
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Order #: $order_number</strong><a href="aorderdetails.php"><span>Details</span></a></li>
_END; 
}

echo <<<_END

                    </ul>
            </div>
                <div class="col-lg-12 form-group" style="text-align: center">
                    <button class="btn btn-dark" type="submit"><a href="aorderlist.php">View All Customer Orders</a></button>
                </div>
            <div class="border-bottom my-2"></div>
            <div class="col-lg-12 form-group" style="text-align: center">
                <button class="btn btn-dark" type="submit"><a href="aproducts.php">Manage Inventory</a></button>
            </div>
        </div>
    </div>
    
</body>
</html>
_END;

//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}


?>

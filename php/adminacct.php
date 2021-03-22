<?php
$page_roles = array('admin');
require_once 'checksession.php';
include 'navbar.php';

//create connection
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['update'])) {
    $firstName = mysql_entities_fix_string($conn,$_POST['firstName']);
    $lastName = mysql_entities_fix_string($conn,$_POST['lastName']);

    $updateQuery = "UPDATE users SET firstName='$firstName', lastName='$lastName' WHERE email='$email'";
    $updateResult = $conn->query($updateQuery);
    if(!$updateResult) die($conn->error);

    header("Location: adminacct.php");
}


$query = "SELECT * from users LEFT JOIN stores on users.storeID = stores.storeID where email='$email'";

$result = $conn->query($query);
if(!$result) die($conn->error);

$firstName = '';
$lastName = '';
$storeName = '';

$rows = $result->num_rows;
for($i = 0; $i < $rows; $i++) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $email = $row['email'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $storeName = $row['storeName'];
}
echo <<<_END
    
    <!--Profile Section-->
    <div class="container">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="row">
                <div class="col-sm-4 user-details">
                    <img src="../img/user.png" alt="user avatar">
                </div>
                <div class="col-sm-6 profile-info">
                    <div class="row">
                            <div class="col-sm-4">
                                <p>First Name:</p>
                                <p>Last Name:</p>
                                <p>Username:</p>
                                <p>Store Name:</p>
                            </div><div class="col-sm-6">
                                <form method="post" action="adminacct.php">
                               <p><input type="text" name="firstName" value="$firstName" placeholder="First Name"></p>
                                <p><input type="text" name="lastName" value="$lastName" placeholder="Last Name"></p>
                                <p>$email</p>
                                <p>$storeName</p>
                            </div>  
                            <div class="col-sm-2">
                                <input type="submit" class=" btn btn-light btn-outline-dark " name="update" value="Update Profile">
                            </div>
                            </form>      
                    </div> 
                </div> 
            </div>
            <div class="border-bottom my-2"></div>
            <div class="card-body">
                <h5 class="text-uppercase mb-4">Assisted Orders by $firstName</this></h5>
                    <ul class="list-unstyled mb-0">
_END;

$order_number = "";
$order_query = "SELECT * from orders WHERE admin_userID = '$userID'";
$order_result = $conn->query($order_query);
if(!$order_query) die($conn->error);

$orders = $order_result->num_rows;
for($j = 0; $j< $orders; $j++){
    $order = $order_result->fetch_array(MYSQLI_ASSOC);
    $order_number = $order['orderID'];
    echo <<<_END
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Order #: $order_number</strong>
                    <a class="btn btn-link" href="aorderdetails.php?orderID=$order_number"><span>Details</span></a></li>
_END;
}

echo <<<_END
                    </ul>
            </div>
                <div class="col-lg-12 form-group" style="text-align: center">
                    <button class="btn btn-outline-dark" type="submit"><a href="aorderlist.php">View All Customer Orders</a></button>
                </div>
            <hr style="padding-bottom: 20px;">
            <div class="row">
                <div class="col-lg-6 form-group" style="text-align: center">
                    <button class="btn btn-outline-dark" type="submit"><a href="aproducts.php">Manage Inventory</a></button>
                </div>
                <div class="col-lg-6 form-group" style="text-align: center">
                    <button class="btn btn-outline-dark" type="submit"><a href="areports.php">Sales Data</a></button>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
_END;

$conn->close();

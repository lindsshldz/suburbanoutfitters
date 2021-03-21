<?php
$page_roles = array('admin');
require_once 'checksession.php';
include 'navbar.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//query for orders
$query = "SELECT * from payment join shipping on payment.paymentID = shipping.paymentID join orders on payment.orderID = orders.orderID";
$order_result = $conn->query($query);
if(!$order_result) die($conn->error);

if(isset($_GET['orderID'])) {
    $orderID = mysql_entities_fix_string($conn, $_GET['orderID']);
    if($orderID != '') {
        $query = "SELECT * from payment join shipping on payment.paymentID = shipping.paymentID 
                join orders on payment.orderID = orders.orderID WHERE payment.orderID='$orderID'";
        $order_result = $conn->query($query);
        if (!$order_result) die($conn->error);
    }
}

echo <<<_END
    <div class="container">
        <div class="card bg-primary text-white">
            <div class="card-body text-uppercase">All Customer Orders</div>
          </div>
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="search-container">
                <form method="get" action="aorderlist.php">
                    <input type="text" placeholder="Search Order # ..." name="orderID">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="row">
            <div class="col-sm-4">
                <h2 class="h5 text-uppercase mb-4">Order #</h2>
            </div>
            <div class="col-sm-4">
                <h2 class="h5 text-uppercase mb-4">Status</h2>
            </div>
            <div class="col-sm-4">
                <h2 class="h5 text-uppercase mb-4">Details</h2>
            </div>
        </div>
        <div class="border-bottom my-2"></div>
_END;

//order list
$orderID = "";
$status = "";
$rows = $order_result->num_rows;
for($i = 0; $i < $rows; $i++){
    $row = $order_result->fetch_array(MYSQLI_ASSOC);
    $orderID = $row['orderID'];
    $status = $row['status'];

    echo <<<_END
    <div>
    <div class="row">
        <div class="col-sm-4">
            <p>$orderID</p>
        </div>
        <div class="col-sm-4">
            <p>$status</p>
        </div>
        <div class="col-sm-4">
        <form action="aorderdetails.php?orderID=$orderID" method="post">
            <button class="btn btn-link" name="orderID" value="$orderID">Details</button>
        </form>
        </div>
    </div>
    </div>
_END;
}

echo <<<_END
        </div>
        <a class="btn btn-light btn-outline-dark" style="margin-top: 20px;" href="adminacct.php">Admin Account</a>
    </div>
</body>
</html>
_END;

$conn->close();

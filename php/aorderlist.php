<?php

include 'adminnavbar.php';
require_once 'dblogin.php';
//create connection
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//query for orders
$query = "SELECT * from payment join shipping on payment.paymentID = shipping.paymentID join orders on payment.orderID = orders.orderID";
$order_result = $conn->query($query);
if(!$order_result) die($conn->error);
$email="";


echo <<<_END

    <div class="container">
        <div class="card bg-primary text-white">
            <div class="card-body text-uppercase">Customer Order Lists</div>
          </div>
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="search-container">
                <form action="#">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="row">
            <div class="col-sm-4">
                <h2 class="h5 text-uppercase mb-4">Order ID</h2>
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
        <form action="/suburbanoutfitters/php/aorderdetails.php" method="post">
            <button class="btn" name="orderID" value="$orderID">Details</button>
        </form>
        </div>
    </div>
    </div>


_END;
 }
 
 echo <<<_END
        </div>
    </div>
</body>
</html>
_END;
?>
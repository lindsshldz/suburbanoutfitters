<?php

include 'adminnavbar.php';
//create connection
// $conn = new mysqli($hn, $un, $pw, $db);
// if($conn->connect_error) die($conn->connect_error);

//query for order details

$status ="";
$name = "";
$address = "";
$tracking = "";

if(isset($_POST['orderID'])){
    $orderID = $_POST['orderID'];

    $query = "SELECT * from payment join shipping on payment.paymentID = shipping.paymentID join orders on payment.orderID = orders.orderID join users on orders.orderID = users.userID where orders.orderID = '$orderID'";
    
    $order_result = $conn->query($query);
    if(!$order_result) die($conn->error);
    $row = $order_result->fetch_array(MYSQLI_ASSOC);

    $status = $row['status'];
    $name = $row['firstName']. ' '.$row['lastName'];
    $address = $row['address1'].' '.$row['address2'].' '.$row['city'].' '.$row['state'].' '.$row['zipCode'];
    $tracking = $row['tracking'];
}

echo <<<_END
    <div class="container">
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Customer Order Details</h2>
            <div class="row">
                <!-- SHIPPING TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Name</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Address</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Status</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tracking #</strong></th>
                            <th class="border-0" scope="col"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link">$name</a></strong></div>
                                </div>
                            </th>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$address</p>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$status</p>
                            </td>
                            <td class="align-middle border-light">
                                <div class="mb-0 small">$tracking</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <div class="border-bottom my-2"></div>
        <div class="col-lg-12 form-group" style="text-align: center">
            <button class="btn btn-dark" type="submit"><a href="aorderlist.php">View All Customer Orders</a></button>
        </div>
    </div>
    </div>
</div>
</body>
</html>
_END;

?>

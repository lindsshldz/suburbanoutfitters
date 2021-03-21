<?php
$page_roles = array('admin');
require_once 'checksession.php';
include 'navbar.php';

$orderID = mysql_entities_fix_string($conn, $_GET['orderID']);

$query = "SELECT * from payment join shipping on payment.paymentID = shipping.paymentID join orders 
            on payment.orderID = orders.orderID left join promos on orders.promoID = promos.promoID join users on orders.userID = users.userID 
            where orders.orderID = '$orderID'";

$order_result = $conn->query($query);
if(!$order_result) die($conn->error);
$row = $order_result->fetch_array(MYSQLI_ASSOC);

$status = $row['status'];
$name = $row['firstName']. ' '.$row['lastName'];
$address = $row['address1'].' '.$row['address2'].' '.$row['city'].' '.$row['state'].' '.$row['zipCode'];
$tracking = $row['tracking'];
$paymentID = $row['paymentID'];
$email = $row['email'];
$adminID = $row['admin_userID'];
$promoCode = $row['promoCode'];

if(isset($_POST['assisted'])) {
    $shipStatus = mysql_entities_fix_string($conn, $_POST['status']);
    $tracking = mysql_entities_fix_string($conn,$_POST['tracking']);
    $orderAdmin = mysql_entities_fix_string($conn,$_POST['adminID']);
    $orderID = mysql_entities_fix_string($conn,$_POST['orderID']);
    $paymentID = mysql_entities_fix_string($conn,$_POST['paymentID']);

    $assistQuery = "UPDATE orders SET admin_userID='$orderAdmin' WHERE orderID='$orderID'";
    $assistResult = $conn->query($assistQuery);
    if(!$assistResult) die($conn->error);

    $shipQuery = "UPDATE shipping SET status='$shipStatus', tracking='$tracking' WHERE paymentID='$paymentID'";
    $shipResult = $conn->query($shipQuery);
    if(!$shipResult) die($conn->error);

    header("Location: aorderdetails.php?orderID=$orderID");
}

echo <<<_END
    <div class="container">
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4"><i class="fas fa-scroll"></i><span style="margin-left: 5px"> Customer Order #$orderID Details</span></h2>
            <div class="row">
                <!-- SHIPPING TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Name</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Address</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Promo Used</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Status</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tracking #</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Assisted by</strong></th></th>
                            <th class="border-0" scope="col"> </th>
                        </tr>
                        </thead>
                        <form method="post" action="aorderdetails.php">
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
                                <p class="mb-0 small">$promoCode</p>
                            </td>
                            <td class="align-middle border-0">
                                <div class="mb-0 small"><select name="status">
                                <option></option>
_END;
$shipSelected = '';
$opSelected = '';
if($status == 'Shipped') {
    $shipSelected = 'selected';
}elseif($status == 'Order Processing') {
    $opSelected = 'selected';
}
    echo <<<_END
                                    <option value="Shipped" $shipSelected>Shipped</option>
                                    <option value="Order Processing" $opSelected>Order Processing</option>
                                </select></div>
                            </td>
                            <td class="align-middle border-light">
                                <div class="mb-0 small"><input type="text" name="tracking" value="$tracking" placeholder="Tracking or Pending"></div>
                            </td>
                            <td class="align-middle border-light">
                                <div class="mb-0 small"><select name="adminID">
                                <option></option>
_END;

$adminQuery = "SELECT * from users WHERE role = 'admin'";
$adminResult = $conn->query($adminQuery);
$rows = $adminResult->num_rows;
for($j=0; $j<$rows; ++$j) {
    $selected = '';
    $row = $adminResult->fetch_array(MYSQLI_ASSOC);
    if($row['userID'] == $adminID){
        $selected = 'selected';
    }
    echo <<<_END
                                    <option value="$row[userID]" $selected>$row[email]</option>
_END;
}

echo <<<_END
                                </select></div>
                            </td>
                            <td class="align-middle border-light">
                                <input type="hidden" value="$orderID" name="orderID">
                                <input type="hidden" value="$paymentID" name="paymentID">
                                <div class="mb-0 small"><input type="submit" name="assisted" value="Save"></div>
                        </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </section>
        <div class="border-bottom my-2"></div>
        <div class="col-lg-12 form-group" style="text-align: center">
            <button class="btn btn-dark"><a href="aorderlist.php">View All Customer Orders</a></button>
        </div>
    </div>
    </div>
</div>
</body>
</html>
_END;

?>
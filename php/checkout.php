<?php
$page_roles = array('admin', 'customer');
require_once 'checksession.php';
include 'navbar.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['cvv'])) {
    $firstName = mysql_entities_fix_string($conn,$_POST['firstName']);
    $lastName = mysql_entities_fix_string($conn,$_POST['lastName']);
    $email = mysql_entities_fix_string($conn,$_POST['email']);
    $phoneNumber = mysql_entities_fix_string($conn,$_POST['phoneNumber']);

    $address1 = mysql_entities_fix_string($conn,$_POST['address1']);
    $address2 = mysql_entities_fix_string($conn,$_POST['address2']);
    $city = mysql_entities_fix_string($conn,$_POST['city']);
    $state = mysql_entities_fix_string($conn,$_POST['state']);
    $zipCode = mysql_entities_fix_string($conn,$_POST['zipCode']);
    $creditCard = mysql_entities_fix_string($conn,$_POST['creditCard']);
    $expMonth = mysql_entities_fix_string($conn,$_POST['expMonth']);
    $expYear = mysql_entities_fix_string($conn,$_POST['expYear']);
    $cvv = mysql_entities_fix_string($conn,$_POST['cvv']);

    $total = mysql_entities_fix_string($conn,$_POST['total']);
    $promoID = mysql_entities_fix_string($conn, $_POST['promoID']);

    $invSize = mysql_entities_fix_string($conn, $_POST['invSize']);

    $orderQuery = "INSERT INTO orders SET userID='$userID', storeID='1', orderDate=CURDATE(), totalPrice='$total', promoID='$promoID'";
    $orderResult = $conn->query($orderQuery);
    if(!$orderResult) die($conn->error);
    $orderID = $conn->insert_id;

    $cartQuery = "SELECT products.sellPrice, cartItem.productID, cartItem.cartQty FROM products INNER JOIN cartItem ON
                  products.productID = cartItem.productID WHERE userID = '$userID'";
    $cartResult = $conn->query($cartQuery);
    if(!$cartResult) die($conn->error);
    $rows = $cartResult->num_rows;

    for($j=0; $j<$rows; ++$j) {
        $row = $cartResult->fetch_array(MYSQLI_ASSOC);
        $productID = $row['productID'];
        $orderQty = $row['cartQty'];
        $sellPrice = $row['sellPrice'];

        $invQuery = "SELECT inventoryID, quantity FROM inventory WHERE productID='$productID' AND invSize='$invSize'";
        $invResult = $conn->query($invQuery);
        error_log("invQuery: ".$invQuery);
        if(!$invResult) die($conn->error);
        $invRow = $invResult->fetch_array(MYSQLI_ASSOC);
        $inventoryID = $invRow['inventoryID'];
        $invQty = $invRow['quantity'];
        error_log("invQty: ".$invQty);
        error_log("invID: ".$inventoryID);

        $lineQuery = "INSERT INTO orderlines SET productID='$productID', orderID='$orderID', 
                        inventoryID='$inventoryID', quantity='$orderQty', sellPrice='$sellPrice'";
        $lineResult = $conn->query($lineQuery);
        if (!$lineResult) die($conn->error);

        $newInv = $invQty - $orderQty;
        error_log("newInv: ".$newInv);
        $updateInvQuery = "UPDATE inventory SET quantity='$newInv' WHERE inventoryID='$inventoryID'";
        $updateInvResult = $conn->query($updateInvQuery);
        if(!$updateInvResult) die($conn->error);
        }

    $custQuery = "UPDATE users SET firstName='$firstName', lastName='$lastName', email='$email', phoneNumber='$phoneNumber'
                  WHERE userID = '$userID'";
    $custResult = $conn->query($custQuery);
    if(!$custResult) die($conn->error);

    $paymentQuery = "INSERT INTO payment SET userID='$userID', orderID='$orderID', address1='$address1', address2='$address2', city='$city', state='$state',
                     zipCode='$zipCode', creditCard='$creditCard', expMonth='$expMonth', expYear='$expYear', cvv=$cvv, paymentDate=CURDATE()";
    $paymentResult = $conn->query($paymentQuery);
    if(!$paymentResult) die($conn->error);
    $paymentID = $conn->insert_id;

    $status = 'New Order';
    $tracking = 'New Order';
    $shipQuery = "INSERT INTO shipping SET paymentID='$paymentID', tracking='$tracking', status='$status'";
    $shipResult = $conn->query($shipQuery);
    if(!$shipResult) die($conn->error);

    $emptyCart = "DELETE FROM cartItem WHERE userID = '$userID'";
    $emptyResult = $conn->query($emptyCart);
    if(!$emptyResult) die($conn->error);

    header("Location: checkout.php?orderID=$orderID");

}

$orderID = mysql_entities_fix_string($conn,$_GET['orderID']);

$query = "SELECT orders.orderID, orders.orderDate, orders.totalPrice, orderlines.quantity, orderlines.sellPrice,
          orderlines.productID, products.productName, products.imgName FROM orders INNER JOIN orderlines on orders.orderID = 
          orderlines.orderID INNER JOIN products on orderlines.productID = products.productID where orders.orderID='$orderID'";
$result = $conn->query($query);
if(!$result) die($conn->error);

$orderData = array();
$rows = $result->num_rows;
$total = 0;
for($j=0; $j<$rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $total = $row['totalPrice'];
    sprintf("%01.2f", $total);
    array_push($orderData, $row);
}
echo <<<_END
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light" id="pink-hero-section">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Checkout Confirmation</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0" id="pink-breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Order Number: $orderID</h2>
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <!-- ORDER TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                            <th class="border-0" scope="col"> </th>
                        </tr>
                        </thead>
                        <tbody>
_END;
$subtotal = 0;
for($j=0; $j<$rows; ++$j) {
    $orderline = $orderData[$j];
    $prodTotal = $orderline['sellPrice'] * $orderline['quantity'];
    $subtotal += $prodTotal;

    echo <<<_END
                        <tr>
                            <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="proddetails.php?productID=$orderline[productID]">
                                    <img src="/suburbanoutfitters/img/$orderline[imgName]" alt="..." width="70"/></a>
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="proddetails.php?productID=$orderline[productID]">$orderline[productName]</a></strong></div>
                                </div>
                            </th>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$orderline[sellPrice]</p>
                            </td>
                            <td class="align-middle border-light">
                                <div class="quantity">$orderline[quantity]</div>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$$prodTotal</p>
                            </td>
                        </tr>
_END;
}
$tax = $subtotal * 0.047;
$tax = sprintf("%01.2f", $tax);

echo <<<_END
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Order total</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$$subtotal</span></li>
                            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Tax</strong><span class="text-muted small">$$tax</span></li>
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>$$total</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
_END;

$shippingQuery = "SELECT * FROM payment WHERE orderID='$orderID'";
$shippingResult = $conn->query($shippingQuery);
if(!$shippingResult) die($conn->error);
$row = $shippingResult->fetch_array(MYSQLI_ASSOC);

echo <<<_END
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Shipping Details</h2>
        <div class="row">
            <!-- SHIPPING TABLE-->
            <div class="table-responsive mb-4">
                <table class="table">
                    <thead class="bg-light">
                    <tr>
                        <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Address</strong></th>
                        <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Status</strong></th>
                        <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tracking #</strong></th>
                        <th class="border-0" scope="col"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="pl-0 border-0" scope="row">
                            <div class="media align-items-center"><a width="70"/></a>
                                <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link">$row[address1]</a></strong></div>
                            </div>
                        </th>
                        <td class="align-middle border-0">
                            <p class="mb-0 small">New Order</p>
                        </td>
                        <td class="align-middle border-light">
                            <div class="mb-0 small">New Order</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
</body>
_END;

$conn->close();
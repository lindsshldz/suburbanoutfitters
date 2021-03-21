<?php
$page_roles = array('admin', 'customer');
require_once 'checksession.php';
include 'navbar.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$orderID = mysql_entities_fix_string($conn,$_GET['orderID']);

$query = "SELECT users.firstName, users.lastName, payment.*, orders.orderID, shipping.status, shipping.tracking
            FROM users INNER JOIN payment ON users.userID = payment.userID INNER JOIN shipping ON 
            payment.paymentID = shipping.paymentID INNER JOIN orders on payment.orderID = orders.orderID 
            WHERE orders.orderID = '$orderID'";
$result = $conn->query($query);
if(!$result) die($conn->error);

$row = $result->fetch_array(MYSQLI_ASSOC);


echo <<<_END
    <div class="container">
        <section class="py-5 bg-light" id="pink-hero-section">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Order # $orderID Details</h1>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0" id="pink-breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: white;"><a href="custacct.php">Customer Account</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Shipping Details</h2>
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
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link">$row[firstName] $row[lastName]</a></strong></div>
                                </div>
                            </th>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$row[address1], $row[city], $row[state], $row[zipCode]</p>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$row[status]</p>
                            </td>
                            <td class="align-middle border-light">
                                <div class="mb-0 small">$row[tracking]</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Item Details</h2>
            <div class="row">
                <!-- SHIPPING TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product Name</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quanity</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product Total</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        
_END;

$itemQuery = "SELECT orders.totalPrice, orderlines.quantity, orderlines.sellPrice, products.productName FROM orders 
                INNER JOIN orderlines ON orders.orderID = orderlines.orderID
                INNER JOIN products ON orderlines.productID = products.productID WHERE orders.orderID='$orderID'";
$itemResult = $conn->query($itemQuery);
if(!$itemResult) die($conn->error);

$rows = $itemResult->num_rows;
for($j=0; $j<$rows; ++$j) {
    $row = $itemResult->fetch_array(MYSQLI_ASSOC);
    $prodtotal = $row['quantity'] * $row['sellPrice'];
    echo <<<_END
                        <tr>
                            <td class="align-middle border-0" scope="row">
                                <div class="media align-items-center">
                                    <p class="mb-0 small">$row[productName]</p>
                                </div>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$row[quantity]</p>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$$prodtotal</p>
                            </td>
                        </tr>
_END;
}

echo <<<_END
                        <tr class="align-items-end">
                            <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link"></a>Order Total</strong></div>
                                </div>
                            </th>
                            <td class="align-middle border-0">
                                <p class="mb-0 small"></p>
                            </td>
                            <td class="align-middle border-0">
                                <div class="mb-0 small"><strong>$$row[totalPrice]</strong></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    </div>
</div>
</body>
_END;


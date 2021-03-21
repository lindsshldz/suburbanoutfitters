<?php
$page_roles = array('admin');
require_once 'checksession.php';
include 'navbar.php';

$janQuery = "SELECT sum(totalPrice) FROM orders WHERE orderDate BETWEEN '2021-01-01' AND '2021-01-30'";
$janResult = $conn->query($janQuery);
$row = $janResult->fetch_array(MYSQLI_ASSOC);
$janSum = sprintf("%01.2f",$row['sum(totalPrice)']);

$febQuery = "SELECT sum(totalPrice) FROM orders WHERE orderDate BETWEEN '2021-02-01' AND '2021-02-28'";
$febResult = $conn->query($febQuery);
$row = $febResult->fetch_array(MYSQLI_ASSOC);
$febSum = sprintf("%01.2f",$row['sum(totalPrice)']);

$marQuery = "SELECT sum(totalPrice) FROM orders WHERE orderDate BETWEEN '2021-03-01' AND '2021-03-31'";
$marResult = $conn->query($marQuery);
$row = $marResult->fetch_array(MYSQLI_ASSOC);
$marSum = sprintf("%01.2f",$row['sum(totalPrice)']);

$promoQuery = "SELECT sum(totalPrice) FROM orders WHERE promoID <> '0'";
$promoResult = $conn->query($promoQuery);
$row = $promoResult->fetch_array(MYSQLI_ASSOC);
$promoSum = sprintf("%01.2f",$row['sum(totalPrice)']);

$assistedQuery = "SELECT sum(totalPrice) FROM orders WHERE admin_userID <> '0'";
$assistedResult = $conn->query($assistedQuery);
$row = $assistedResult->fetch_array(MYSQLI_ASSOC);
$assistedSum = sprintf("%01.2f",$row['sum(totalPrice)']);

$onlineQuery = "SELECT sum(totalPrice) FROM orders WHERE storeID='1'";
$onlineResult = $conn->query($onlineQuery);
$row = $onlineResult->fetch_array(MYSQLI_ASSOC);
$onlineSum = sprintf("%01.2f",$row['sum(totalPrice)']);

$totalQuery = "SELECT sum(totalPrice) FROM orders";
$totalResult = $conn->query($totalQuery);
$row = $totalResult->fetch_array(MYSQLI_ASSOC);
$grandTotal = sprintf("%01.2f",$row['sum(totalPrice)']);

echo <<<_END
<div class="container">
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4"><i class="fas fa-calendar-alt"></i><span style="margin-left: 5px;">Monthly Sales Totals</span> </h2>
            <div class="row">
                <!-- Other Totals-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">January</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">February</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">March</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-uppercase">YTD Total</strong></th>
                        </tr>
                        </thead>
                        <form method="post" action="aorderdetails.php">
                        <tbody>
                        <tr>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$ $janSum</p>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$ $febSum</p>
                            </td>
                            <td class="align-middle border-light">
                                <p class="mb-0 small">$ $marSum</p>
                            </td>
                            <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link">$ $grandTotal</a></strong></div>
                                </div>
                            </th>
                        </tbody>
                        </form>
                    </table>
                </div>
            </div>
            <br>
            <h6 class="h6 text-uppercase mb-4"><i class="fas fa-chart-pie"></i><span style="margin-left: 5px;"> Other Totals</span></h6>
            <div class="row">
                <!-- Other Totals-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Applied Promo</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Admin Assisted</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Online</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-uppercase">Grand Total</strong></th>
                        </tr>
                        </thead>
                        <form method="post" action="aorderdetails.php">
                        <tbody>
                        <tr>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$ $promoSum</p>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$ $assistedSum</p>
                            </td>
                            <td class="align-middle border-light">
                                <p class="mb-0 small">$ $onlineSum</p>
                            </td>
                            <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link">$ $grandTotal</a></strong></div>
                                </div>
                            </th>
                        </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </section>
        <div class="col-lg-12 form-group">
            <button class="btn btn-light btn-outline-dark"><a href="aorderlist.php">Admin Account</a></button>
        </div>
    </div>
    </div>
</div>
</body>
</html>
_END;


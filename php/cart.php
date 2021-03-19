<?php
require_once 'dblogin.php';
include 'navbar.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$customerID = 1;

if (isset($_POST['cartQty'])) {
    $productID = $_POST['productID'];
    $cartQty = $_POST['cartQty'];

    $query = "SELECT cartQty FROM cartItem WHERE productID = '$productID' AND customerID = '$customerID'";

    $result = $conn->query($query);
    if(!$result) die($conn->error);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if (count($row) == 0) {
        $query = "INSERT INTO cartItem (customerID, productID, cartQty) VALUES 
              ('$customerID', '$productID', '$cartQty')";
    }else {
        $cartQty = $cartQty + $row['cartQty'];
        $query = "UPDATE cartItem SET cartQty = '$cartQty' WHERE productID = $productID";
    }
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    header("Location: cart.php");
}

if (isset($_POST['cartupdate'])) {
    $qty = $_POST['quantity'];
    $prodID = $_POST['prodID'];

    $cartQuery = "UPDATE cartItem SET cartQty='$qty' WHERE productID='$prodID'";
    $cartResult = $conn->query($cartQuery);
    if(!$cartResult) die($conn->error);
}

if (isset($_POST['delete'])) {
    $prodID = $_POST['prodID'];

    $deleteQuery = "DELETE FROM cartItem WHERE productID='$prodID'";
    $deleteResult = $conn->query($deleteQuery);
    if(!$deleteResult) die($conn->error);
}

$query = "SELECT products.productID, products.imgName, products.productName, products.sellPrice, cartItem.cartQty FROM products INNER JOIN cartItem ON
          products.productID = cartItem.productID WHERE customerID = '$customerID'";

$result = $conn->query($query);
if(!$result) die($conn->error);

$cart_data = array();

$rows = $result->num_rows;
for($j=0; $j<$rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    array_push($cart_data, $row);
}
echo <<<_END
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light" id="blue-hero-section">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Cart</h1>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0" id="blue-breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
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
    $item = $cart_data[$j];

    $prodID = $item['productID'];
    $img = $item['imgName'];
    $prodName = $item['productName'];
    $price = $item['sellPrice'];
    $qty = $item['cartQty'];
    $prodTotal = $price * $qty;

    $subtotal += $prodTotal;

    echo <<<_END
                            <tr>
                                <th class="pl-0 border-0" scope="row">
                                    <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="proddetails.php?productID=$prodID"><img src="/suburbanoutfitters/img/$img" alt="..." width="70"/></a>
                                        <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="proddetails.php?productID=$prodID">$prodName</a></strong></div>
                                    </div>
                                </th>
                                <td class="align-middle border-0">
                                    <p class="mb-0 small">$$price</p>
                                </td>
                                    <td class="align-middle border-0">
                                        <form method="post" action="cart.php">
                                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                                            <div class="quantity">
                                                <button class="dec-btn p-0 p-0"><i class="fas fa-caret-left"></i></button>
                                                <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="$qty" name="quantity">
                                                <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="prodID" value="$prodID">
                                        <input type="hidden" name="cartupdate" value="yes">
                                        </form>
                                    </td>
                                
                                <td class="align-middle border-0">
                                    <p class="mb-0 small">$$prodTotal</p>
                                </td>
                                <td class="align-middle border-0"><a class="reset-anchor">
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="prodID" value="$prodID">
                                        <button type="submit" name="delete" style="border: none; background: none;"><i class="fas fa-trash-alt small text-muted"></i></button>
                                   </form><a/>
                                </td>
                            </tr>
                            
_END;
}

$tax = $subtotal * 0.047;
$tax = sprintf("%01.2f", $tax);
$total = $subtotal + $tax;
$total = sprintf("%01.2f", $total);

echo <<<_END

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ORDER TOTAL-->
                
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Cart total</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$$subtotal</span></li>
                                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Tax</strong><span class="text-muted small">$$tax</span></li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>$$total</span></li>
                                <form method="post" action="checkout.php"> 
                                    <input type="hidden" value="$total" name="total">
                                <li>
                                        <div class="form-group mb-0">
                                            <input class="form-control" type="text" placeholder="Enter your coupon">
                                            <button class="btn btn-dark btn-sm btn-block" type="submit"> <i class="fas fa-gift mr-2"></i>Apply coupon</button>
                                        </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
_END;
$custQuery = "SELECT * FROM customers WHERE customerID = '$customerID'";

$custResult = $conn->query($custQuery);
if(!$custResult) die($conn->error);
$customer = $custResult->fetch_array(MYSQLI_ASSOC);
echo <<<_END
        
            <section class="py-5">
                <h2 class="h5 text-uppercase mb-4">Checkout Your Cart</h2>
                <div class="row">
                    <div class="col-lg-8">     
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="text-small text-uppercase" for="firstName">First name</label>
                                    <input class="form-control form-control-lg" id="firstName" type="text" name="firstName" value="$customer[firstName]" placeholder="Enter your first name">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label class="text-small text-uppercase" for="lastName">Last name</label>
                                    <input class="form-control form-control-lg" id="lastName" type="text" name="lastName" value="$customer[lastName]" placeholder="Enter your last name">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label class="text-small text-uppercase" for="email">Email address</label>
                                    <input class="form-control form-control-lg" id="email" type="email" name="email" value="$customer[email]"placeholder="e.g. Jason@example.com">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label class="text-small text-uppercase" for="phone">Phone number</label>
                                    <input class="form-control form-control-lg" id="phone" type="tel" name="phoneNumber" value="$customer[phoneNumber]"placeholder="e.g. +02 245354745">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label class="text-small text-uppercase" for="address">Shipping Address line 1</label>
                                    <input class="form-control form-control-lg" id="address" type="text" name="address1" placeholder="House number and street name">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label class="text-small text-uppercase" for="address">Shipping Address line 2</label>
                                    <input class="form-control form-control-lg" id="addressalt" type="text" name="address2" placeholder="Apartment, Suite, Unit, etc (optional)">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label class="text-small text-uppercase" for="city">City</label>
                                    <input class="form-control form-control-lg" id="city" type="text" name="city">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label class="text-small text-uppercase" for="state">State</label>
                                    <input class="form-control form-control-lg" id="state" type="text" name="state">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label class="text-small text-uppercase" for="zip">Zip Code</label>
                                    <input class="form-control form-control-lg" id="zip" type="text" name="zipCode">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label class="text-small text-uppercase">Credit Card Number</label>
                                    <div class="input-group">
                                        <input type="text" name="creditCard" placeholder="Your card number" class="form-control" required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted">
                                                        <i class="fab fa-cc-visa mx-1"></i>
                                                        <i class="fab fa-cc-amex mx-1"></i>
                                                        <i class="fab fa-cc-mastercard mx-1"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 form-group">
                                    <label class="text-small text-uppercase"><span class="hidden-xs">Expiration</span></label>
                                    <div class="input-group">
                                        <input type="number" placeholder="MM" name="expMonth" class="form-control" required>
                                        <input type="number" placeholder="YY" name="expYear" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label class="text-small text-uppercase">CVV</label>
                                        <input type="text" name="cvv" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <button class="btn btn-dark" type="submit">Place order</button>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- JavaScript files-->
    <script src="/suburbanoutfitters/thirdparty/jquery/jquery.min.js"></script>
    <script src="/suburbanoutfitters/thirdparty/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/suburbanoutfitters/thirdparty/lightbox2/js/lightbox.min.js"></script>
    <script src="/suburbanoutfitters/thirdparty/nouislider/nouislider.min.js"></script>
    <script src="/suburbanoutfitters/thirdparty/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/suburbanoutfitters/thirdparty/owl.carousel2/owl.carousel.min.js"></script>
    <script src="/suburbanoutfitters/thirdparty/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="/suburbanoutfitters/js/front.js"></script>
    </body>
_END;


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suburban Outfitters</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../thirdparty/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="../thirdparty/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="../thirdparty/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="../thirdparty/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="../thirdparty/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/thirdparty/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/themestyles.css" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/SUlogo.png">
    <link rel="stylesheet" href="../css/loginstyles.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
        <div class="container px-0 px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">Suburban Outfitters</span></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link active" href="index.php">Home</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="proddetails.php">Product detail</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">(2)</small></a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</div>
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
                        <tr>
                            <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="proddetails.php"><img src="/suburbanoutfitters/img/redshirt.png" alt="..." width="70"/></a>
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="proddetails.php">Red T-Shirt</a></strong></div>
                                </div>
                            </th>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$25</p>
                            </td>
                            <td class="align-middle border-0">
                                <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                                    <div class="quantity">
                                        <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                        <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1"/>
                                        <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$25</p>
                            </td>
                            <td class="align-middle border-0"><a class="reset-anchor" href="#"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                        </tr>
                        <tr>
                            <th class="pl-0 border-light" scope="row">
                                <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="proddetails.php"><img src="/suburbanoutfitters/img/purplepants.png" alt="..." width="70"/></a>
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="proddetails.php">Purple Pants</a></strong></div>
                                </div>
                            </th>
                            <td class="align-middle border-light">
                                <p class="mb-0 small">$50</p>
                            </td>
                            <td class="align-middle border-light">
                                <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                                    <div class="quantity">
                                        <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                        <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1"/>
                                        <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle border-light">
                                <p class="mb-0 small">$50</p>
                            </td>
                            <td class="align-middle border-light"><a class="reset-anchor" href="#"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                        </tr>
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
                            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$75</span></li>
                            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Tax</strong><span class="text-muted small">$6.37</span></li>
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>$81.37</span></li>
                            <li>
                                <form action="#">
                                    <div class="form-group mb-0">
                                        <input class="form-control" type="text" placeholder="Enter your coupon">
                                        <button class="btn btn-dark btn-sm btn-block" type="submit"> <i class="fas fa-gift mr-2"></i>Apply coupon</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Checkout Your Cart</h2>
        <div class="row">
            <div class="col-lg-8">
                <form method="post" action="checkout.php">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="firstName">First name</label>
                            <input class="form-control form-control-lg" id="firstName" type="text" placeholder="Enter your first name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="lastName">Last name</label>
                            <input class="form-control form-control-lg" id="lastName" type="text" placeholder="Enter your last name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="email">Email address</label>
                            <input class="form-control form-control-lg" id="email" type="email" placeholder="e.g. Jason@example.com">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="phone">Phone number</label>
                            <input class="form-control form-control-lg" id="phone" type="tel" placeholder="e.g. +02 245354745">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="address">Shipping Address line 1</label>
                            <input class="form-control form-control-lg" id="address" type="text" placeholder="House number and street name">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="address">Shipping Address line 2</label>
                            <input class="form-control form-control-lg" id="addressalt" type="text" placeholder="Apartment, Suite, Unit, etc (optional)">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="text-small text-uppercase" for="city">City</label>
                            <input class="form-control form-control-lg" id="city" type="text">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="text-small text-uppercase" for="state">State</label>
                            <input class="form-control form-control-lg" id="state" type="text">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="text-small text-uppercase" for="zip">Zip Code</label>
                            <input class="form-control form-control-lg" id="zip" type="text">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase">Credit Card Number</label>
                            <div class="input-group">
                                <input type="text" name="cardNumber" placeholder="Your card number" class="form-control" required>
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
                                        <input type="number" placeholder="MM" name="" class="form-control" required>
                                        <input type="number" placeholder="YY" name="" class="form-control" required>
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4">
                                    <label class="text-small text-uppercase">CVV</label>
                                    <input type="text" required class="form-control">
                                </div>
                            </div>
                        <div class="col-lg-12 form-group">
                            <button class="btn btn-dark" type="submit">Place order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<!-- JavaScript files-->
<!--<script src="/suburbanoutfitters/thirdparty/jquery/jquery.min.js"></script>-->
<!--<script src="/suburbanoutfitters/thirdparty/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!--<script src="/suburbanoutfitters/thirdparty/lightbox2/js/lightbox.min.js"></script>-->
<!--<script src="/suburbanoutfitters/thirdparty/nouislider/nouislider.min.js"></script>-->
<!--<script src="/suburbanoutfitters/thirdparty/bootstrap-select/js/bootstrap-select.min.js"></script>-->
<!--<script src="/suburbanoutfitters/thirdparty/owl.carousel2/owl.carousel.min.js"></script>-->
<!--<script src="/suburbanoutfitters/thirdparty/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>-->
<!--<script src="/suburbanoutfitters/thirdparty/js/front.js"></script>-->
</body>
</html>
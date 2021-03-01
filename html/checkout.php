<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suburban Outfitters</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/suburbanoutfitters/thirdparty/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="/suburbanoutfitters/thirdparty/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="/suburbanoutfitters/thirdparty/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="/suburbanoutfitters/thirdparty/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="/suburbanoutfitters/thirdparty/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/suburbanoutfitters/thirdparty/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/suburbanoutfitters/css/themestyles.css" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/suburbanoutfitters/img/SUlogo.png">
    <link rel="stylesheet" href="/suburbanoutfitters/css/loginstyles.css" >
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
        <h2 class="h5 text-uppercase mb-4">Order Number: 123456789 </h2>
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
                        <tr>
                            <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="proddetails.php"><img src="/suburbanoutfitters/img/redshirt.png" alt="..." width="70"/></a>
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="proddetails.php">Red T-Shirt</a></strong></div>
                                </div>
                            </th>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$25</p>
                            </td>
                            <td class="align-middle border-light">
                                <div class="quantity">1</div>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">$25</p>
                            </td>
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
                                <div class="quantity">1</div>
                            </td>
                            <td class="align-middle border-light">
                                <p class="mb-0 small">$50</p>
                            </td>
                        </tr>
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
                            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$75</span></li>
                            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Tax</strong><span class="text-muted small">$6.37</span></li>
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>$81.37</span></li>
                        </ul>
                    </div>
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
                                <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link">123 S. Easy Street, Salt Lake City, UT 84111</a></strong></div>
                            </div>
                        </th>
                        <td class="align-middle border-0">
                            <p class="mb-0 small">Order Received</p>
                        </td>
                        <td class="align-middle border-light">
                            <div class="mb-0 small">Pending</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
</body>
</html>
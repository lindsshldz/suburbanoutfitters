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
    <!-- TITLE SECTION-->
    <section class="py-5 bg-light" id="pink-hero-section">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Shop</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0" id="pink-breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <!-- SHOP SIDEBAR-->
                <div class="col-lg-3 order-2 order-lg-1">
                    <h5 class="text-uppercase mb-4">Categories</h5>
                    <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Fashion</strong></div>
                    <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                        <li class="mb-2"><a class="reset-anchor" href="#">Shirts</a></li>
                        <li class="mb-2"><a class="reset-anchor" href="#">Pants</a></li>
                        <li class="mb-2"><a class="reset-anchor" href="#">Shoes</a></li>
                    </ul>
                </div>
                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <p class="text-small text-muted mb-0">Showing 1–6 of 6 results</p>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                                <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                                <li class="list-inline-item">
                                    <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                                        <option value="default">Default sorting</option>
                                        <option value="low-high">Price: Low to High</option>
                                        <option value="high-low">Price: High to Low</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <!-- PRODUCT-->
                        <div class="col-lg-4 col-sm-6">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-"></div><a class="d-block" href="proddetails.php"><img class="img-fluid w-100" src="/suburbanoutfitters/img/redshirt.png" alt="Red Shirt"></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Red T-Shirt</a></h6>
                                <p class="small text-muted">$25</p>
                            </div>
                        </div>
                        <!-- PRODUCT-->
                        <div class="col-lg-4 col-sm-6">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-"></div><a class="d-block" href="proddetails.php"><img class="img-fluid w-100" src="/suburbanoutfitters/img/blueshirt.png" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Blue T-Shirt</a></h6>
                                <p class="small text-muted">$25</p>
                            </div>
                        </div>
                        <!-- PRODUCT-->
                        <div class="col-lg-4 col-sm-6">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-primary"></div><a class="d-block" href="proddetails.php"><img class="img-fluid w-100" src="/suburbanoutfitters/img/purplepants.png" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Purple Pants</a></h6>
                                <p class="small text-muted">$50</p>
                            </div>
                        </div>
                        <!-- PRODUCT-->
                        <div class="col-lg-4 col-sm-6">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-"></div><a class="d-block" href="proddetails.php"><img class="img-fluid w-100" src="/suburbanoutfitters/img/greenpants.png" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Green Pants</a></h6>
                                <p class="small text-muted">$50</p>
                            </div>
                        </div>
                        <!-- PRODUCT-->
                        <div class="col-lg-4 col-sm-6">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-info"></div><a class="d-block" href="proddetails.php"><img class="img-fluid w-100" src="/suburbanoutfitters/img/brownshoes.png" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">Brown Shoes</a></h6>
                                <p class="small text-muted">$75</p>
                            </div>
                        </div>
                        <!-- PRODUCT-->
                        <div class="col-lg-4 col-sm-6">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-"></div><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="/suburbanoutfitters/img/pinkshoes.jpg" alt="..."></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="/suburbanoutfitters/html/proddetails.php">Pink Shoes</a></h6>
                                <p class="small text-muted">$75</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
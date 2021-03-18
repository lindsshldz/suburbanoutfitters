<?php
require_once 'dblogin.php';
include('navbar.php');

//Connect to database
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM products";

if (isset($_GET["category"])) {
    $category = $_GET["category"];
    $query = "SELECT * FROM products WHERE category = '$category'";
}

$result = $conn->query($query);
if(!$result) die($conn->error);

$rows = $result->num_rows;
$product_data = array();

// create an array of product data
for($j=0; $j<$rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    array_push($product_data, $row);
}
$conn->close();

    echo <<<_END
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
                    <div class="py-2 px-4 bg-dark text-white mb-3"><a href="products.php"><strong class="small text-uppercase font-weight-bold" style="color: white;">Fashion</strong></a></div>
                    <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                        <li class="mb-2"><a class="reset-anchor" href="products.php?category=Shirts">Shirts</a></li>
                        <li class="mb-2"><a class="reset-anchor" href="products.php?category=Pants">Pants</a></li>
                        <li class="mb-2"><a class="reset-anchor" href="products.php?category=Shoes">Shoes</a></li>
                    </ul>
                </div>
                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <p class="text-small text-muted mb-0">Showing 1-6 of 6 results</p>
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
_END;
//Display Products in DB
for($j=0; $j<$rows; ++$j) {
    $product = $product_data[$j];
    echo <<<_END
                        <div class="col-lg-4 col-sm-6">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-"></div><a class="d-block" href="proddetails.php?productID=$product[productID]"><img class="img-fluid w-100" src="/suburbanoutfitters/img/$product[imgName]"></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php">Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">$product[productName]</a></h6>
                                <p class="small text-muted">$$product[sellPrice]</p>
                            </div>
                        </div>
_END;
}
echo <<<_END
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
_END;


<?php
$page_roles = array('admin');
require_once 'checksession.php';
include 'navbar.php';

$query = "SELECT * FROM products";
$result = $conn->query($query);
$rows = $result->num_rows;

// create an array of product data
$product_data = array();
for($j=0; $j<$rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    array_push($product_data, $row);
}

echo <<<_END
<div  class="container">
    <div><a class="btn btn-light btn-outline-dark" href="aproddetails.php">+ Add New Product</a></div>

<body>
<div class="page-holder">
 
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <p class="text-lg text-muted mb-0">Total products: $rows</p>
                        </div>
                    </div>
_END;
for($j=0; $j<$rows; ++$j) {
    $product = $product_data[$j];
    echo <<<_END
                    <!-- PRODUCT-->
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-"></div><a class="d-block" href="aproddetails.php?productID=$product[productID]">
                                        <img src="../img/$product[imgName]" height="75"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <h6><a class="reset-anchor">$product[productName]</a></h6>
                            <p class="small text-muted"><a class="btn-link"href="aproddetails.php?productID=$product[productID]">Item Details</a></p>
                        </div>
                    </div>
_END;
}

echo <<<_END
                </div>
            </div>
        </div>
        <a class="btn btn-light btn-outline-dark"href="adminacct.php">Admin Account</a>
    </section>
</div>
</body>
_END;

$conn->close();

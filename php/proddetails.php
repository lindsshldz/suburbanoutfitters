<?php
$page_roles = array('admin', 'customer');
require_once 'checksession.php';
include 'navbar.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$productID = mysql_entities_fix_string($conn, $_GET["productID"]);

$query = "SELECT * FROM products WHERE productID = $productID";
$result = $conn->query($query);
if(!$result) die($conn->error);

$row = $result->fetch_array(MYSQLI_ASSOC);

$productID = $row['productID'];
$image = $row['imgName'];
$thumbnail = $row['imgThumbnail'];
echo <<<_END
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <!-- PRODUCT SLIDER-->
                <div class="row m-sm-0">
                    <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                        <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="/suburbanoutfitters/img/$thumbnail" alt="..."></div>
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="/suburbanoutfitters/img/$thumbnail" alt="..."></div>
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="/suburbanoutfitters/img/$thumbnail" alt="..."></div>
                            <div class="owl-thumb-item flex-fill mb-2"><img class="w-100" src="/suburbanoutfitters/img/$thumbnail" alt="..."></div>
                        </div>
                    </div>
                    <div class="col-sm-10 order-1 order-sm-2">
                        <div class="owl-carousel product-slider" data-slider-id="1"><a class="d-block" href="/suburbanoutfitters/img/$thumbnail" data-lightbox="product" title="Product item 1"><img class="img-fluid" src="/suburbanoutfitters/img/$thumbnail" alt="..."></a><a class="d-block" href="/suburbanoutfitters/img/$thumbnail" data-lightbox="product" title="Product item 2"><img class="img-fluid" src="/suburbanoutfitters/img/$thumbnail" alt="..."></a><a class="d-block" href="/suburbanoutfitters/img/$thumbnail" data-lightbox="product" title="Product item 3"><img class="img-fluid" src="/suburbanoutfitters/img/$thumbnail" alt="..."></a><a class="d-block" href="/suburbanoutfitters/img/$thumbnail" data-lightbox="product" title="Product item 4"><img class="img-fluid" src="/suburbanoutfitters/img/$thumbnail" alt="..."></a></div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
                <h1>$row[productName]</h1>
                <p class="text-muted lead">$$row[sellPrice]</p>
                <p class="text-small mb-4">$row[productDescription]</p>
                <form method="post" action="cart.php">
                <ul class="list-unstyled small d-inline-block">
                    <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Size:</strong><select name="invSize" style="margin-left: 10px;">
                        <option></option>
_END;
$invQuery = "SELECT * FROM inventory WHERE productID = '$productID'";
$invResult = $conn->query($invQuery);
$invSize = "";
$inventoryID = "";
if(!$invResult) die($conn->error);
$invRows = $invResult->num_rows;
for($j=0; $j<$invRows; ++$j) {
    $invRow = $invResult->fetch_array(MYSQLI_ASSOC);
    $invSize = $invRow['invSize'];
    $inventoryID = $invRow['inventoryID'];
    echo <<<_END
                        <option><span class="ml-2 text-muted" value="$invSize">$invSize<span></option>
_END;
}
echo  <<<_END

                        </select>
                    </li>
                </ul>
                
                    <input type="hidden" name="productID" value="$row[productID]">
                    <input type="hidden" name="userID" value="$userID">
                    <div class="row align-items-stretch mb-4">
                        <div class="col-sm-5 pr-sm-0">
                            <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                <div class="quantity">
                                    <button class="dec-btn p-0" type="button"><i class="fas fa-caret-left"></i></button>
                                    <input class="form-control border-0 shadow-0 p-0" type="text" value="1" name="cartQty">
                                    <button class="inc-btn p-0" type="button"><i class="fas fa-caret-right" type="button"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pl-sm-0">
                            <input class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" type="submit" value="Add to cart">
                        </div>
                    </div>
                </form>
                <ul class="list-unstyled small d-inline-block">
                    <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted">$row[sku]</span></li>
                    <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#">$row[category]</a></li>
                    <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ml-2" href="#">$row[tags]</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
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

$conn->close();


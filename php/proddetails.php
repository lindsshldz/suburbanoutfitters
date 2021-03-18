<?php
include('navbar.php');
if($conn->connect_error) die($conn->connect_error);

$product_id = $_GET["Product ID"];

$query = "SELECT * FROM products WHERE Product ID = $product_id";
$result = $conn->query($query);
if(!$result) die($conn->error);

$row = $result->fetch_array(MYSQLI_ASSOC);
$conn->close();

$image = $row[ImgPath];

echo <<<_END
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <!-- PRODUCT SLIDER-->
                <div class="row m-sm-0">
                    <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                        <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="/suburbanoutfitters/img/redshirtdetail1.png" alt="..."></div>
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="/suburbanoutfitters/img/redshirtdetail1.png" alt="..."></div>
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="/suburbanoutfitters/img/redshirtdetail1.png" alt="..."></div>
                            <div class="owl-thumb-item flex-fill mb-2"><img class="w-100" src="/suburbanoutfitters/img/redshirtdetail1.png" alt="..."></div>
                        </div>
                    </div>
                    <div class="col-sm-10 order-1 order-sm-2">
                        <div class="owl-carousel product-slider" data-slider-id="1"><a class="d-block" href="/suburbanoutfitters/img/redshirtdetail1.png" data-lightbox="product" title="Product item 1"><img class="img-fluid" src="/suburbanoutfitters/img/redshirtdetail1.png" alt="..."></a><a class="d-block" href="/suburbanoutfitters/img/redshirtdetail1.png" data-lightbox="product" title="Product item 2"><img class="img-fluid" src="/suburbanoutfitters/img/redshirtdetail1.png" alt="..."></a><a class="d-block" href="/suburbanoutfitters/img/redshirtdetail1.png" data-lightbox="product" title="Product item 3"><img class="img-fluid" src="/suburbanoutfitters/img/redshirtdetail1.png" alt="..."></a><a class="d-block" href="/suburbanoutfitters/img/redshirtdetail1.png" data-lightbox="product" title="Product item 4"><img class="img-fluid" src="/suburbanoutfitters/img/redshirtdetail1.png" alt="..."></a></div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
                <h1>Red T-Shirt</h1>
                <p class="text-muted lead">$25</p>
                <p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                <div class="row align-items-stretch mb-4">
                    <div class="col-sm-5 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                            <div class="quantity">
                                <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.php">Add to cart</a></div>
                </div>
                <ul class="list-unstyled small d-inline-block">
                    <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted">01234</span></li>
                    <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#">Shirts</a></li>
                    <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ml-2" href="#">Casual</a></li>
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

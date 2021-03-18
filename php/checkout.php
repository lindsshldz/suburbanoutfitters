<?php
include('navbar.php');
echo <<<_END
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
_END;

<?php
include('navbar.php');
echo <<<_END
    <!-- HERO SECTION-->
    <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(/suburbanoutfitters/img/hero-banner.png)">
            <div class="container py-5">
                <div class="row px-4 px-lg-5">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-3">20% off Winter Sale</h1><a class="btn btn-dark" href="products.php">Shop All</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
            <header class="text-center">
                <h3 class="h5 text-uppercase mb-4">Categories</h3>
            </header>
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href="products.php?category=shirts"><img class="img-fluid" src="/suburbanoutfitters/img/shirticon.png" alt=""><strong class="category-item-title">Shirts</strong></a></div>
                <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href="products.php?category=pants""><img class="img-fluid" src="/suburbanoutfitters/img/pantsicon.png" alt=""><strong class="category-item-title">Pants</strong></a></div>
                <div class="col-md-4"><a class="category-item" href="products.php?category=shoes"><img class="img-fluid" src="/suburbanoutfitters/img/shoeicon.png" alt=""><strong class="category-item-title">Shoes</strong></a></div>
            </div>
        </section>
    </div>
</body>
_END;





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
                            
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="adminacct.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Logged in  As Admin</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div>

    <div class="container">
        <div class="card bg-primary text-white">
            <div class="card-body text-uppercase">Customer Order Lists</div>
          </div>
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="search-container">
                <form action="#">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        <div class="row">
            <div class="col-sm-4">
                <h2 class="h5 text-uppercase mb-4">Order Number</h2>
            </div>
            <div class="col-sm-4">
                <h2 class="h5 text-uppercase mb-4">Status</h2>
            </div>
            <div class="col-sm-4">
                <h2 class="h5 text-uppercase mb-4">Details</h2>
            </div>
        </div>
        <div class="border-bottom my-2"></div>
        <div>
            <div class="row">
                <div class="col-sm-4">
                    <p>12345678</p>
                </div>
                <div class="col-sm-4">
                    <p>Pending</p>
                </div>
                <div class="col-sm-4">
                    <a href="/suburbanoutfitters/html/aorderdetails.php"><input type="submit" value="Details"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p>12345678</p>
                </div>
                <div class="col-sm-4">
                    <p>Pending</p>
                </div>
                <div class="col-sm-4">
                    <a href="/suburbanoutfitters/html/aorderdetails.php"><input type="submit" value="Details"></a>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
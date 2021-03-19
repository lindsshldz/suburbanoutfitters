<?php

require_once 'dblogin.php';
//create connection
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$username = "";
$firstName = "";
$lastName = "";


$query = "SELECT * from admins where email='u5678@utah.edu'";

$result = $conn->query($query);
if(!$result) die($conn->error);

$rows = $result->num_rows;
for($i = 0; $i < $rows; $i++){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $username = $row['email'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
}


echo <<<_END
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
                            <li class="nav-item"><a class="nav-link" href="login.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>$username</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        
    </div>
    <!--Profile Section-->
    <div class="container">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="row">
                <div class="col-sm-4 user-details">
                    <img src="/suburbanoutfitters/img/user.png" alt="user avatar">
                </div>
                <div class="col-sm-6 profile-info">
                    <div class="row ">
                        <div class="col-sm-4">
                            <p>First Name:</p>
                            <p>Last Name:</p>
                            <p>Username:</p>
                        </div>
                        <div class="col-sm-8">
                           <p>$firstName</p>
                            <p>$lastName</p>
                            <p>$username</p>
                        </div>
                    </div>
                    
                </div>
                <input type="submit" class="bg-light col-sm-2" value="Edit Profile" style="height: 30px;">
            </div>
            <input type="file" value="update photo">
            <div class="border-bottom my-2"></div>
            <div class="card-body">
                <h5 class="text-uppercase mb-4">Assisted Order Lists by: $username</this></h5>
                    <ul class="list-unstyled mb-0">
_END;


$order_number = "";
//order query
$order_query = "SELECT * from orders";
$order_result = $conn->query($order_query);
if(!$order_query) die($conn->error);

$orders = $order_result->num_rows;
for($j = 0; $j< $orders; $j++){
   $order = $order_result->fetch_array(MYSQLI_ASSOC);
   $order_number = $order['orderID'];
//loop for orders
echo <<<_END
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Order #: $order_number</strong><a href="aorderdetails.php"><span>Details</span></a></li>
_END; 
}

echo <<<_END

                    </ul>
            </div>
                <div class="col-lg-12 form-group" style="text-align: center">
                    <button class="btn btn-dark" type="submit"><a href="aorderlist.php">View All Customer Orders</a></button>
                </div>
            <div class="border-bottom my-2"></div>
            <div class="col-lg-12 form-group" style="text-align: center">
                <button class="btn btn-dark" type="submit"><a href="aproducts.php">Manage Inventory</a></button>
            </div>
        </div>
    </div>
    
</body>
</html>
_END;



?>
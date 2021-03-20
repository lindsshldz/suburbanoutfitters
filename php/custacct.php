<?php
include 'navbar.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$userID = mysql_entities_fix_string($conn,$_GET['userID']);

if(isset($_POST['submit'])) {
    $fname = mysql_entities_fix_string($conn,$_POST['firstName']);
    $lname = mysql_entities_fix_string($conn,$_POST['lastName']);
    $email = mysql_entities_fix_string($conn,$_POST['email']);
    $phone = mysql_entities_fix_string($conn,$_POST['phoneNumber']);
    $password = mysql_entities_fix_string($conn,$_POST['password']);

    $query = "UPDATE users SET firstName='$fname', lastName='$lname', email='$email', phoneNumber='$phone', 
                     password='$password' WHERE userID=$userID";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    header("Location: custacct.php");
}

$query = "SELECT * FROM users where userID = '$userID'";
$result = $conn->query($query);
if(!$result) die($conn->error);

$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
<div class="container">
    <section class="py-5 bg-light" id="blue-hero-section">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">$row[firstName]'s Account</h1>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0" id="blue-breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: white;">Customer Account</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Your Account Details</h2>
            <div class="row">
                <form method="post" action="custacct.php">
                    <fieldset style="width:200px;">
                        <p>First Name</p>
                        <input type="text" id="firstName" value="$row[firstName]" name="firstName" placeholder="Enter First Name" required/>
                        <br><br>
            
                        <p>Last Name</p>
                        <input type="text" id="lastName" value="$row[lastName]" name="lastName" placeholder="Enter Last Name"/>
                        <br><br>
            
                        <p>Email</p>
                        <input type="text" id="email" value="$row[email]" name="email" placeholder="Enter Username" required/>
                        <br><br>
                      
                        <p>Phone Number</p>
                        <input type="text" id="phoneNumber" value="$row[phoneNumber]" name="phoneNumber" placeholder="Enter Phone" required/>
                        <br><br>
            
                        <input type="Submit" name="submit" value="Submit Changes" />
                </fieldset>
            </form>
        </div>
    </section>
    </div>
    <hr>
     <div class="card-body">
                    <h5 class="text-uppercase mb-4">Order History</this></h5>
                        <ul class="list-unstyled mb-0">
_END;
$orderQuery = "SELECT * FROM orders WHERE userID = $userID";
$orderResult = $conn->query($orderQuery);

$rows = $orderResult->num_rows;
for($j=0; $j<$rows; ++$j) {
    $row = $orderResult->fetch_array(MYSQLI_ASSOC);

    echo <<<_END
                            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Order #: $row[orderID]</strong><a href="orderdetails.php?orderID=$row[orderID]"><span>Details</span></a></li>
_END;
}
echo <<<_END
                        </ul>
                </div>
     
</div>
</body>
_END;


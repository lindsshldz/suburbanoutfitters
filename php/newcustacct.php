<?php
include 'navbar.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['password'])) {
    $fname = mysql_entities_fix_string($conn,$_POST['firstName']);
    $lname = mysql_entities_fix_string($conn,$_POST['lastName']);
    $email = mysql_entities_fix_string($conn,$_POST['email']);
    $phone = mysql_entities_fix_string($conn,$_POST['phoneNumber']);
    $password = mysql_entities_fix_string($conn,$_POST['password']);

    $token = password_hash($password, PASSWORD_DEFAULT);
    $role = 'customer';
    $query = "INSERT INTO users(firstName, lastName, email, password, phoneNumber, role) 
              VALUES ('$fname', '$lname', '$email', '$token', '$phone', '$role')";
    $result = $conn->query($query);
    if (!$result) die($conn->error);

    header("Location: login.php");
}

echo <<<_END
<div class="container">
    <section class="py-5 bg-light" id="blue-hero-section">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">New Account</h1>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0" id="blue-breadcrumb">
                                <li class="breadcrumb-item">Suburban Outfitters</li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: white;">Customer Account</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
        <section class="py-5">
            <p class="text-body">Once you sign up, you'll enter your new credentials at login. Happy shopping!</p>
            <br>
            <h2 class="h5 text-uppercase mb-4">Account Details</h2>
            <div class="row">
                <form method="post" action="newcustacct.php">
                    <fieldset style="width:200px;">
                        <p>First Name</p>
                        <input type="text" id="firstName"  name="firstName" placeholder="Enter First Name" required/>
                        <br><br>
            
                        <p>Last Name</p>
                        <input type="text" id="lastName" name="lastName" placeholder="Enter Last Name" required/>
                        <br><br>
            
                        <p>Email</p>
                        <input type="text" id="email"  name="email" placeholder="Enter Username" required/>
                        <br><br>
                      
                        <p>Phone Number</p>
                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone" required/>
                        <br><br>

                        <p>Password</p>
                        <input type="text" id="phoneNumber" name="password" placeholder="Enter Password" required/>
                        <br><br>
            
                        <input class="btn btn-dark" type="Submit" name="submit" value="Sign Up" />
                </fieldset>
            </form>
        </div>
    </section>
    </div>
_END;

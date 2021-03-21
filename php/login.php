<!--lindsay's edits-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suburban Outfitters</title>
    <link rel="stylesheet" href="../css/loginstyles.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/SUlogo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div>
            <!-- login form -->
            <div  id="login-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >

                <div class="modal-dialog" style="margin: 10px auto;">
                    <div class="loginmodal-container" style="background: url(binding_dark.png)repeat fixed;color: black;">
                        <img src="/suburbanoutfitters/img/SUlogo.png"><br>
                        <h3 style="text-align: center">Suburban Outfitters</h3>
                        <p style="text-align: center">Login to shop!</p><br>
                        <form action="login.php" method="post">
                            <input type="text" name="email" placeholder="Email" autocomplete="off" required>
                            <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                            <input type="submit" name="login" class="login loginmodal-submit" value="Login" style="background-color:#80b2f0;">
                        </form>
                        <p><a href="newcustacct.php">New? Click here to create an account!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
require_once 'dblogin.php';
require_once 'User.php';
include 'Sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['email']) && isset($_POST['password'])) {

    //Get values from login screen
    $email = mysql_entities_fix_string($conn, $_POST['email']);
    $password = mysql_entities_fix_string($conn, $_POST['password']);

    //get password from DB w/ SQL
    $query = "SELECT password FROM users WHERE email = '$email'";

    $result = $conn->query($query);
    if(!$result) die($conn->error);

    $rows = $result->num_rows;
    $passwordFromDB="";
    for($j=0; $j<$rows; $j++)
    {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $passwordFromDB = $row['password'];

    }

    //Compare passwords
    if(password_verify($password,$passwordFromDB))
    {
        echo "successful login<br>";

        $user = new User($email);

        session_start();
        $_SESSION['user'] = $user;

        header("Location: index.php");
    }
    else
    {
        echo "login error<br>";
    }
}

$conn->close();

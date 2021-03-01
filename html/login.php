<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suburban Outfitters</title>
    <link rel="stylesheet" href="/suburbanoutfitters/css/loginstyles.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/suburbanoutfitters/img/SUlogo.png">
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
                        <h3 style="text-align: center">Suburban Outfitters</h3><br>
                        <form action="index.php" method="post">
                            <input type="text" name="uname" placeholder="Username" autocomplete="off" required>
                            <input type="password" name="upass" placeholder="Password" autocomplete="off" required>
                            <input type="submit" name="login" class="login loginmodal-submit" value="Login" style="background-color:#80b2f0;">
                        </form>
                        <a href="/suburbanoutfitters/html/index.php"><span style="text-align: center">New? Create Account</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
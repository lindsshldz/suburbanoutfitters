
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
                        <h3 style="text-align: center">Suburban Outfitters</h3><br>
                        <form action="login.php" method="post">
                            <input type="text" name="email" placeholder="Email" autocomplete="off" required>
                            <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                            <input type="submit" name="login" class="login loginmodal-submit" value="Login" style="background-color:#80b2f0;">
                        </form>
                        <a href="adminacct.php">Temporary Admin Acct Link</a> <a href="custacct.php">Temporary Customer Acct Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

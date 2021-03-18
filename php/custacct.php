<?php
include('navbar.php');
echo <<<_END
<div class="container">
    <form>
        <fieldset style="width:200px;">

            <legend><b>Customer Account</b></legend>

            <p>First Name</p>
            <input type="text" id="First Name" placeholder="Enter First Name" required/>
            <br><br>

            <p>Last Name</p>
            <input type="text" id="Last Name" placeholder="Enter Last Name"/>
            <br><br>

            <p>Username</p>
            <input type="text" id="Username" placeholder="Enter Username" required/>
            <br><br>

            <p>Password</p>
            <input type="text" id="password" placeholder="Enter Password  " required/>

            <br><br>

            <input type="Submit" value="Submit Changes" />
    </fieldset>
</form>
<hr>
 <div class="card-body">
                <h5 class="text-uppercase mb-4">Assisted Order Lists by [username]</this></h5>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Order #: 123456</strong><a href="orderdetails.php"><span>Details</span></a></li>
                        <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Order #: 123456</strong><a href="orderdetails.php"><span>Details</span></a></li>
                        <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Order #: 123456</strong><a href="orderdetails.php"><span>Details</span></a></li>
                        <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Order #: 123456</strong><a href="orderdetails.php"><span>Details</span></a></li>
                    </ul>
            </div>
 
</div>
</body>
_END;


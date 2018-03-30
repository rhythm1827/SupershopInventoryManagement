<?php
include("master.php");
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="Home.php">Home</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li  class="active"><a href="register.php">Register</a></li>
                <li><a href="add_product.php">Add Product</a></li>
                <li><a href="view_product.php">View Products</a></li>
                <li><a href="sell_product.php">Sell Products</a></li>
                <li><a href="staff.php">See Staffs</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="sell_details.php">Sell details</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel-heading">
            </div>
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><center><h4>Staffs Registration</h4></center></h4>
                </div>

                <div class="panel-body">
                    <form role="form" method="post" action="register.php">
                        <fieldset>
                            <div class="form-group">
                                <p>First Name</p>
                                <input class="form-control" name="fname" type="name" autofocus>

                            </div>
                            <div class="form-group">
                                <p>Last Name</p>
                                <input class="form-control" name="lname" type="name" autofocus>
                            </div>
                            <div class="form-group">
                                <p>Email Address</p>
                                <input class="form-control" name="email" type="name" autofocus>
                            </div>
                            <div class="form-group">
                                <p>Password</p>
                                <input class="form-control" name="pass" type="Password" autofocus>
                            </div>
                            <div class="form-group">
                                <p>Contact Number</p>
                                <input class="form-control" name="cnumber" type="name" autofocus>
                            </div>

                            <div class="form-group">
                                <p>Address</p>
                                <input class="form-control" name="address" type="name" autofocus>
                            </div>
                            <div class="form-group">
                                <p>Date of birth</p>
                                <input class="form-control" name="bd" type="date" autofocus>
                            </div>
                            
                            <div class="form-group">
                                <p>Gender</p>
                                <input type="radio" name="gender" value="male" checked> Male
                                <input type="radio" name="gender" value="female"> Female
                                <input type="radio" name="gender" value="other" checked> Other<br>
                            </div>

                            <input class="btn btn-lg btn-success btn-block" type="submit" value="submit" name="submit" >
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<footer class="container-fluid text-center">
    <p>powered by rhythm,armin,peu</p>
</footer>

</body>
</html>

<?php

    include("database/db_conection.php");
    //$dbcon=mysqli_connect("localhost","root","");
    //mysqli_select_db($dbcon,"supershop");
    if(isset($_POST['submit']))
    {
        $user_fname  = $_POST['fname'];
        $user_lname  = $_POST['lname'];
        $user_cnumber  = $_POST['cnumber'];
        $user_address  = $_POST['address'];
        $user_email  = $_POST['email'];
        $user_pass  = $_POST['pass'];
        $user_gender  = $_POST['gender'];
        $user_bd = $_POST['bd'];
        if($user_fname=='')
        {
            echo"<script>alert('Please enter the first name')</script>";
            exit();
        }
        if(strlen($user_fname)<3||strlen($user_fname)>20)
        {
            echo"<script>alert('First name atleast 3 characters and at most 20 characters long')</script>";
            exit();
        }
        if($user_lname=='')
        {
            echo"<script>alert('Please enter the last name')</script>";
            exit();
        }
        if(strlen($user_lname)<3||strlen($user_lname)>20)
        {
            echo"<script>alert('Last name atleast 3 characters and at most 20 characters long')</script>";
            exit();
        }

        if($user_cnumber=='')
        {
            echo"<script>alert('Please enter your mobile number')</script>";
            exit();
        }
        if(strlen($user_cnumber)<6||strlen($user_cnumber)>20)
        {
            echo"<script>alert('Mobile number must be 6 to 20 characters long')</script>";
            exit();
        }
        if($user_bd=='')
        {
            echo"<script>alert('Please give your date of birth')</script>";
            exit();
        }
        if($user_address=='')
        {
            echo"<script>alert('Please enter your full address')</script>";
            exit();
        }
        if(strlen($user_address)<6||strlen($user_address)>40)
        {
            echo"<script>alert('Address must be 12 to 40 characters long')</script>";
            exit();
        }

        if($user_email=='')
        {
            echo"<script>alert('Please enter your email address')</script>";
            exit();
        }
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL))
        {
            echo"<script>alert('Please enter a valid email address')</script>";
            exit();
        }
        if($user_pass=='')
        {
            echo"<script>alert('Please enter a password')</script>";
            exit();
        }
        if(!preg_match("#[0-9]+#", $user_pass) )
        {
            echo"<script>alert('Password have at least one number')</script>";
            exit();
        }
        if(!preg_match("#[a-z]+#", $user_pass) )
        {
            echo"<script>alert('Password have at least one lowercase letter')</script>";
            exit();
        }
        if(!preg_match("#[A-Z]+#", $user_pass) )
        {
            echo"<script>alert('Password have at least one uppercase letter')</script>";
            exit();
        }
        if(strlen($user_pass)<8||strlen($user_pass)>22)
        {
            echo"<script>alert('User password atleast 8 to 22 characters long')</script>";
            exit();
        }
        if($user_gender=='')
        {
            echo"<script>alert('Please select your gender')</script>";
            exit();
        }

        $check_staff_query="select * from staff WHERE email='$user_email'";
        $run_query=mysqli_query($dbcon,$check_staff_query);

        if(mysqli_num_rows($run_query)>0)
        {
            echo "<script>alert('Handle $user_email is already exist in our database, Please try another one!')</script>";
            exit();
        }

        $insert_staff="insert into staff
        (fname,lname,email,pass,mobile,gender,address,bd) VALUE 
        ('$user_fname','$user_lname','$user_email','$user_pass','$user_cnumber',
        '$user_gender','$user_address','$user_bd')";
        if(mysqli_query($dbcon,$insert_staff))
        {
            echo"<script>alert('Successfully Registered.')</script>";
            echo"<script>window.open('register.php','_self')</script>";
        }

    }

?>
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
                <li  class="active"><a href="employee.php">My Account</a></li>
                <li><a href="view_product.php">View Products</a></li>
                <li><a href="sell_product.php">Sell Products</a></li>
                <li><a href="sell_details.php">Sell details</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
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
                    <h4 class="panel-title"><center><h4>Employee Login</h4></center></h4>
                </div>

                <div class="panel-body">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="i.e: ruhul5347@gmail.com" name="email" type="name" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password">
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >
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
//session_start();
include("database/db_conection.php");

if(isset($_POST['login']))
{
    $user_email=$_POST['email'];
    $user_pass=$_POST['pass'];
    if($user_email=='')
    {
        echo"<script>alert('Please enter the email')</script>";
        exit();
    }
    if($user_pass=='')
    {
        echo"<script>alert('Please enter the password')</script>";
        exit();
    }
    $check_user="select * from staff WHERE email='$user_email' AND pass='$user_pass'";

    $run=mysqli_query($dbcon,$check_user);

    if($run){
        if(mysqli_num_rows($run))
        {
            while($row=mysqli_fetch_array($run))
            {
                session_start();
                $_SESSION['SESS_EMAIL'] = $row['email'];
                session_write_close();
            }
            echo "<script>window.open('check.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Email or password is incorrect!')</script>";
            exit();
        }
    }else{
        echo "An error";
    }
}
?>



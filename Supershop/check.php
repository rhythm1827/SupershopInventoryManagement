<?php
    include("master.php");
    require_once('auth.php');
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
                    <?php
                        include("database/db_conection.php");
                        $email = $_SESSION['SESS_EMAIL'];
                    ?>
                    <li><a href="#"><?php echo $email ?></a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
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
                        <h4 class="panel-title"><center><h4>Sell Products</h4></center></h4>
                    </div>

                    <div class="panel-body">
                        <form role="form" method="post" action="sell_product.php">
                            <fieldset>
                                <div class="form-group">
                                    <p>Unit Number</p>
                                    <input class="form-control" name="unumber" type="name" autofocus>
                                </div>
                                <div class="form-group">
                                    <p>Quantity</p>
                                    <input class="form-control" name="quantity" type="name" autofocus>
                                </div>

                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Sell" name="submit" >
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

if(isset($_POST['submit']))
{
    $user_unumber  = $_POST['unumber'];
    $user_quantity = $_POST['quantity'];

    if($user_unumber=='')
    {
        echo"<script>alert('Please enter the unit number')</script>";
        exit();
    }
    if($user_quantity=='')
    {
        echo"<script>alert('Please enter the quantity')</script>";
        exit();
    }
    $check_unit_number_query="select * from product WHERE unumber='$user_unumber'";
    $run_query=mysqli_query($dbcon,$check_unit_number_query);
    while($row=mysqli_fetch_array($run_query))
    {
        $user_pname = $row['pname'];
        $user_category = $row['catagory'];
        $user_bprice = $row['bprice'];
        $user_sprice = $row['sprice'];
        $user_mdate = $row['mdate'];
        $user_edate = $row['edate'];
        $user_quantity2 = $row['quantity'];
        $user_unumber2 = $row['unumber'];
    }

    if(mysqli_num_rows($run_query)==0)
    {
        echo "<script>alert('Product unit number $user_unumber is not exist, try another one!')</script>";
        exit();
    }

    if($user_quantity > $user_quantity2)
    {
        echo"<script>alert('We have only quantity $user_quantity2')</script>";
        exit();
    }
    $user_new_quantity = $user_quantity2 - $user_quantity;
    $user_profit = ($user_sprice - $user_bprice) * $user_quantity;
    $user_soldby = $_SESSION['SESS_EMAIL'];
    $insert_sell="insert into sell (unumber,quantity,bprice,sprice,profit,date,soldby) VALUE 
                  ('$user_unumber','$user_quantity','$user_bprice','$user_sprice','$user_profit',NOW(),'$user_soldby')";
    $update_quantity = "update product set quantity = '$user_new_quantity' WHERE unumber = '$user_unumber'";
    if(mysqli_query($dbcon,$insert_sell) && mysqli_query($dbcon,$update_quantity))
    {
        echo"<script>alert('Successfully product sold and profit is $user_profit ')</script>";
        echo"<script>window.open('sell_product.php','_self')</script>";
    }

}

?>
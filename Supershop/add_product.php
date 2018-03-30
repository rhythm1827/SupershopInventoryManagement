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
                    <li><a href="register.php">Register</a></li>
                    <li  class="active"><a href="add_product.php">Add Product</a></li>
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
                        <h4 class="panel-title"><center><h4>Product Details</h4></center></h4>
                    </div>

                    <div class="panel-body">
                        <form role="form" method="post" action="add_product.php">
                            <fieldset>
                                <div class="form-group">
                                    <p>Product Name</p>
                                    <input class="form-control" name="pname" type="name" autofocus>

                                </div>
                                <div class="form-group">
                                    <p>Category</p>
                                    <input class="form-control" name="catagory" type="name" autofocus>

                                </div>
                                <div class="form-group">
                                    <p>Buying Price</p>
                                    <input class="form-control" name="bprice" type="number" step="any" autofocus>
                                </div>
                                <div class="form-group">
                                    <p>Selling Price</p>
                                    <input class="form-control" name="sprice" type="number" step="any" autofocus>
                                </div>
                                <div class="form-group">
                                    <p>MFG Date</p>
                                    <input class="form-control" name="mdate" type="date" autofocus>
                                </div>

                                <div class="form-group">
                                    <p>EXP Date</p>
                                    <input class="form-control" name="edate" type="date" autofocus>
                                </div>
                                <div class="form-group">
                                    <p>Unit Number</p>
                                    <input class="form-control" name="unumber" type="number" autofocus>
                                </div>

                                <div class="form-group">
                                    <p>Quantity</p>
                                    <input class="form-control" name="quantity" type="number" autofocus>
                                </div>

                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Add" name="submit" >
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
    $user_pname  = $_POST['pname'];
    $user_catagory  = $_POST['catagory'];
    $user_bprice  = $_POST['bprice'];
    $user_sprice  = $_POST['sprice'];
    $user_mdate  = $_POST['mdate'];
    $user_edate  = $_POST['edate'];
    $user_unumber  = $_POST['unumber'];
    $user_quantity = $_POST['quantity'];
    if($user_pname=='')
    {
        echo"<script>alert('Please enter the product name')</script>";
        exit();
    }
    if(strlen($user_pname)<2||strlen($user_pname)>25)
    {
        echo"<script>alert('Product name atleast 2 characters and at most 25 characters long')</script>";
        exit();
    }

    if($user_catagory=='')
    {
        echo"<script>alert('Please enter the product category')</script>";
        exit();
    }

    if($user_bprice=='')
    {
        echo"<script>alert('Please enter the buying price')</script>";
        exit();
    }
    if($user_sprice=='')
    {
        echo"<script>alert('Please enter the selling price')</script>";
        exit();
    }
    if($user_mdate=='')
    {
        echo"<script>alert('Please enter the manufacturing date')</script>";
        exit();
    }
    if($user_edate=='')
    {
        echo"<script>alert('Please enter the expire date')</script>";
        exit();
    }
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

    $insert_product="insert into product
        (pname,catagory,bprice,sprice,mdate,edate,unumber,quantity) VALUE 
        ('$user_pname','$user_catagory','$user_bprice','$user_sprice','$user_mdate',
        '$user_edate','$user_unumber','$user_quantity')";
    if(mysqli_query($dbcon,$insert_product))
    {
        echo"<script>alert('Successfully product added.')</script>";
        echo"<script>window.open('add_product.php','_self')</script>";
    }

}

?>
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
                <li  class="active"><a href="Home.php">Home</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="register.php">Register</a></li>
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
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Rice</div>
                <div class="panel-body"><img src="images\rice.jpg" class="img-responsive" style="width:350px; height: 200px" alt="Image"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-danger">
                <div class="panel-heading">Corn</div>
                <div class="panel-body"><img src="images\corn.jpg" class="img-responsive" style="width:350px; height: 200px" alt="Image"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="panel-heading">Meat</div>
                <div class="panel-body"><img src="images\meat.jpg" class="img-responsive" style="width:350px; height: 200px" alt="Image"></div>
            </div>
        </div>
    </div>
</div><br>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Shirts</div>
                <div class="panel-body"><img src="images\shirt.jfif" class="img-responsive" style="width:350px; height: 200px" alt="Image"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-danger">
                <div class="panel-heading">Shampoo</div>
                <div class="panel-body"><img src="images\shampoo.jpg" class="img-responsive" style="width:350px; height: 200px" alt="Image"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="panel-heading">Oils</div>
                <div class="panel-body"><img src="images\oil.jpg" class="img-responsive" style="width:350px; height: 200px" alt="Image"></div>
            </div>
        </div>
    </div>
</div><br><br>

<footer class="container-fluid text-center">
    <p>powered by rhythm,armin,peu</p>
</footer>

</body>
</html>

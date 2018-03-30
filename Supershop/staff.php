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
                <li><a href="add_product.php">Add Product</a></li>
                <li><a href="view_product.php">View Products</a></li>
                <li><a href="sell_product.php">Sell Products</a></li>
                <li class="active"><a href="staff.php">See Staffs</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="sell_details.php">Sell details</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="table-scrol">
    <h1 align="center"></h1>

    <div class="table-responsive">


        <table class="table table-bordered table-hover table-striped" style="background-color: #dddddd; border: 3px solid black; table-layout: fixed">
            <thead>
            <tr>
                <th colspan="10" style="background-color: #7f3c12;"><center><h2><font color="white">Staff Details</font></h2></center></th>
            </tr>
            <tr style="background-color: #737e83;">
                <th colspan="3"><center>Email Id</center></th>
                <th colspan="2"><center>Name</center></th>
                <th><center>Mobile</center></th>
                <th><center>Gender</center></th>
                <th colspan="3"><center>Address</center></th>



            </tr>
            </thead>

            <?php
            include("database/db_conection.php");
            if(isset($_POST['submit']))
            {
                $user_type  = $_POST['type'];
                $view_staff_query="select * from staff";
                $run=mysqli_query($dbcon,$view_staff_query);

                while($row=mysqli_fetch_array($run))
                {
                    $user_name  = $row['lname'];
                    $user_name1  = $row['fname'];
                    $user_email  = $row['email'];
                    $user_mobile = $row['mobile'];
                    $user_gender = $row['gender'];
                    $user_address = $row['address'];
                    ?>

                    <tr>
                        <td colspan="3"><?php echo $user_email;  ?></td>
                        <td colspan="2"><?php echo $user_name1 ." ". $user_name;  ?></td>
                        <td colspan="1"><?php echo $user_mobile;  ?></td>
                        <td colspan="1"><?php echo $user_gender;  ?></td>
                        <td colspan="3"><?php echo $user_address;  ?></td>
                    </tr>
                <?php }?>


            <?php }
            else
            {
                $view_staff_query="select * from staff";
                $run=mysqli_query($dbcon,$view_staff_query);

                while($row=mysqli_fetch_array($run))
                {
                    $user_name1  = $row['fname'];
                    $user_name  = $row['lname'];
                    $user_email  = $row['email'];
                    $user_mobile = $row['mobile'];
                    $user_gender = $row['gender'];
                    $user_address = $row['address'];
                    ?>

                    <tr>
                        <td colspan="3"><?php echo $user_email;  ?></td>
                        <td colspan="2"><?php echo $user_name1 ." ". $user_name;  ?></td>
                        <td colspan="1"><?php echo $user_mobile;  ?></td>
                        <td colspan="1"><?php echo $user_gender;  ?></td>
                        <td colspan="3"><?php echo $user_address;  ?></td>
                    </tr>

                <?php } ?>
            <?php } ?>

        </table>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>powered by rhythm,armin,peu</p>
</footer>

</body>
</html>

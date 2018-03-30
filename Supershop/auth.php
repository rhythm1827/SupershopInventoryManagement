<?php
    session_start();
    if(!isset($_SESSION['SESS_EMAIL'])||trim($_SESSION['SESS_EMAIL']==''))
    {
        header("location: login.php");
        exit();
    }
?>
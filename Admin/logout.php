<?php
//Include Constanst.php for SITEURL
include('../config/constants.php');
//1. Destroy the session 
session_destroy();//unset $_SESSION[USER]
//2. Redirect login page
header('location:'.SITEURL.'Admin/login.php');
?>
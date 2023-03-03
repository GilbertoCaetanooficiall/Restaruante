<?php
//Authorization Acces control
//Chech whether the user is logged in or not
if (!isset($_SESSION['user'])) {
    
    //user is not logged in
    //Redirect to login page with message
   $_SESSION['no-login-message'] = "<div class='error text-center'>Por favor accessa a sua conta primeiro</div>";
    //Redirect to login page
    header('location:'.SITEURL.'Admin/login.php');
}
?>
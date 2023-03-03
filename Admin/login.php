<?php include('../config/constants.php');?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body Background="../images/bg.JPG">
    
    <div class="login">
    <br><br>
    <?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if (isset($_SESSION['no-login-message'] )) {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    ?>
    
        <h1 class="text-center">Login</h1>
        <form action="" method="post" class = "text-center">
        
            <br>
               Nome de Usuário:<br><br>               
              <input type="text" name="username" placeholder="Insere seu nome de usuario"><br><br>
               Senha: <br><br>
             <input type="password" name="password" placeholder="Insere a sua Senha"><br><br>            
             <input type="submit" name="submit" value="Entrar" class="btn">
               
        
        </form>
        </div>
</body>
</html>

<?php
//check if the button submit cliked or not
if(isset($_POST['submit'])){
   //process for login
   //1. Get the Data from login form
   $username =$_POST['username'];
   $password =md5($_POST['password']);
  
//2. SQL to check whether the user with username and password exists or not
$sql ="SELECT * FROM  tb_admin WHERE username='$username' AND PASSWORD= '$password'";

//3. Execute the query
$res =mysqli_query($conn, $sql);

//4. Count rows to check whether the user exists or not
$count =mysqli_num_rows($res);
if ($count==1) {
    //user available and login success
     $_SESSION['login'] ="<div class='successo'>Bem-vindo</div>";
     $_SESSION['user'] = $username;
     //Redirect to Home page/dashboard
    header('location:'.SITEURL.'admin/');
    }    
else {
    //User not available and login falied
    $_SESSION['login'] ="<div class='error text-center'>Nome de usuario ou palavra-passe errada, por favor tente novamente</div>";
    //Redirect to login 
    header('location:'.SITEURL.'admin/login.php');
}
}
?>
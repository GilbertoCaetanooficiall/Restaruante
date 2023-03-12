<?php
  //Strat the session

  session_start();
//Criando constantes de valores não repitivos
define('SITEURL','http://localhost/Restaruante/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','restaurante');
$conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();//criando a conexão com  a BD
$db_select=mysqli_select_db($conn, DB_NAME) or die();//selecionando a base de dados
?>
<?php

//includde constants.php file here
include('../config/constants.php');
//1. Get the ID of admin to be deleted

 $id_admin= $_GET['id_admin'] ;

// 2. Create SQL Query to Delete Admin

$sql = "DELETE  FROM tb_admin WHERE id_admin = $id_admin ";

//Execute the Query
$res = mysqli_query($conn, $sql);

//Check wether the query executed successfully or not
if ($res == true) {
    //Query executed successfully and Admin deleted
    // echo "Admin deletado com sucesso";
    //Create Session Variable to display message
    $_SESSION['delete'] = "<div class= 'successo'> Admin foi apagado com sucesso.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}else {
    echo "Falhou na tarefa";
    $_SESSION['delete'] = "<div class= 'error'>Falhou na tarefa.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
// 3. Redirect to Manage Admin page with message (success/error)

?>
<?php

//includde constants.php file here
include('../config/constants.php');
//1. Get the ID of admin to be deleted

if (isset($_GET['id_categoria']) & isset($_GET['nome_imagem'])) {
    $id_categoria= $_GET['id_categoria'] ;
    $image_name =$_GET['nome_imagem'];
   
   if ($image_name !="") {
  //remove physicall image
  $path = "../images/categories/".$image_name;
  $remove =unlink($path);

 if ($image_name==false) {
 $_SESSION['remove'] = "<div class= 'error'>Falhou em remover a categoria.</div>";
 // 3. Redirect to Manage Admin page with message (success/error)
 header('location:'.SITEURL.'admin/manage-category.php');
 die(); 
}
   }
      // 2. Create SQL Query to Delete category
    
    $sql = "DELETE  FROM tb_categoria WHERE id_categoria = $id_categoria ";
    
    //Execute the Query
    $res = mysqli_query($conn, $sql);
    
    //Check wether the query executed successfully or not
    if ($res == true) {
        //Query executed successfully and Admin deleted
        // echo "Admin deletado com sucesso";
        //Create Session Variable to display message
        $_SESSION['delete'] = "<div class= 'successo'> categoria foi apagado com sucesso.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }else {
        echo "Falhou na tarefa";
        $_SESSION['delete'] = "<div class= 'error'>Falhou na tarefa.</div>";
        // 3. Redirect to Manage Admin page with message (success/error)
        header('location:'.SITEURL.'admin/manage-category.php');
    }
}


?>
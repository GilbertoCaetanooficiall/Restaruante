<?php  include('partials/menu.php');?>

<div class="main-content">
<div class="wrapper">
    <h1>Actualizar Usuário</h1>

    <br/><br/><br/>

    <?php
     // 1. Get the ID of selected admin
     
     $id_admin=$_GET['id_admin'];
     
     // 2. Create SQL Query to get details
     
     $sql="SELECT * FROM tb_admin WHERE id_admin=$id_admin";
     
     //Execute the query
     $res=mysqli_query($conn, $sql);

      //check wether the query is executed or not
     
      if ($res==true) {
     //check wether the data is available or not
     $count = mysqli_num_rows($res);
   //check wether we have admin data or not
    if ($count==1) {
   //Get the details
   $row=mysqli_fetch_assoc($res);
   $full_name =$row['username'];
   $contacto= $row['contact'];
   $email= $row['email'];
   
   
    }
   
     }
     else {
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
     }
    ?>
   <form action="" method="POST">
           <table class="tbl-30">
             <tr>
                <td>Nome completo</td>
                <td>
                    <input type="text" name="username" value ="<?php echo $full_name;?>">
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name="email" value ="<?php echo $email;?>">
                </td>
                <tr>
                <td>Contacto:</td>
                <td>
                    <input type="tel" name="contact" value="<?php echo $contacto;?>">
                </td>
            <tr>
                    <td colspan ="2">
                        <input type="hidden" name="id_admin" value="<?php echo $id_admin;?>">
                        <input type="submit" name="submit" value="actualizar" class="btn-secondary">
                    </td>
                </tr>
            </tr>
        </table>
   </form>
</div>
</div>
<?php
if (isset($_POST['submit'])) {
   // echo "BOTÃO ESTÁ FUNCIONANDO";
    //pegar todos os valores do formulário e actualizar na base de dados
     $id_admin =$_POST['id_admin'];
     $full_name=$_POST['username'];
     $email=$_POST['email'];
     $contacto=$_POST['contact'];
     //Create a SQL Query to update Admin 
     $sql ="UPDATE tb_admin SET
     username = '$full_name',
     email = '$email',
     contact = '$contacto'
     WHERE id_admin = '$id_admin'";

    //Execute the Query
     $res =mysqli_query($conn,$sql);
     
     //check wether the query executed successfully or not

     if($res == true){

        $_SESSION['delete'] = "<div class= 'successo'> Admin foi actualizado com sucesso.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else {
        echo "Falhou na tarefa";
        $_SESSION['delete'] = "<div class= 'error'>Falhou na tarefa.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
}
?>
<?php include('partials/footer.php');?>
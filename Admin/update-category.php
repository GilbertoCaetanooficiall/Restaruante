<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
    <h1>Actualizar Categoria</h1>
    <br/><br/><br/>

 
    <br/><br/><br/>

    <?php
     // 1. Get the ID of selected admin
     
     $id_categoria=$_GET['id_categoria'];
     
     // 2. Create SQL Query to get details
     
     $sql="SELECT * FROM tb_categoria WHERE id_categoria= '$id_categoria' ";
     
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
   $id_categoria =$row['id_categoria'];
   $title=$row['title'];
   $current_image=$row['nome_imagem'];
   $featured= $row['featured'];
   $active= $row['active'];
   
    }
    else {
        echo "Falhou na tarefa";
        $_SESSION['category-not-found'] = "<div class= 'error'>categoria não encontrada.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
     }
     else {
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-category.php');
     }
    ?>
   <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Titutlo:</td>
                    <td>
                        <input type="text" name="title" placeholder="<?php echo $title;?>">
                    </td>
                </tr>
                <tr>
                    <td>Imagem Actual</td>
                    <td>
                       <?php
                       if ($current_image!="") {
                       ?> 
                        <img src="<?php echo SITEURL.'/images/categories/'.$current_image; ?>" width="150px">
                        <?php
                       } else {
                        echo "<di class='error'> Sem imagem</div>";
                       }
                       ?> 
                    </td>
                </tr>
                <tr>
                    <td>Selecionar imagem</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="sim") {echo "checked";}?> type="radio" name="featured" value="sim"> Sim
                        
                        <input <?php if($featured=="nao") {echo "checked";}?> type="radio" name="featured" value="nao">Não
                    </td>
                </tr>
                <tr>
                    <td>Activo:</td>
                    <td>
                        <input <?php if($active=="sim") {echo "checked";}?> type="radio" name="active" value="sim"> Sim
                        <input <?php if($active=="nao") {echo "checked";}?> type="radio" name="active" value="nao">Não
                    </td>

                    <tr>
                        <td colspan ="2">
                        <input type="hidden" name="nome_imagem" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id_categoria" value="<?php echo $id_categoria;?>">
                            <input type="submit" name ="submit" value="Actualizar" class="btn-secondary">
                        </td>
                    </tr>
                </tr>

            </table>
        </form>
</div>
</div>
<?php
if (isset($_POST['submit'])) {
   //echo "BOTÃO ESTÁ FUNCIONANDO";
    //pegar todos os valores do formulário e actualizar na base de dados
     $id_categoria =$_POST['id_categoria'];
     $title=$_POST['title'];
     $current_image=$_POST['nome_imagem'];
   $featured= $_POST['featured'];
   $active= $_POST['active'];


   //2. Updating new image if selected
    //Check whether image is selected or not

    if (isset($_FILES['image']['name'])) {
       
        $image_name=$_FILES['image']['name'];

        //check is available or not
        if ($image_name!="") {
             //upload image
            //to upload image we need  image name, source path and destination path
           $image_name=$_FILES['image']['name'];
           //upload the image name only if is selected
           
          //Auto rename our image
           //Get the extesion of our image(jpg,png, gift etc)
           $sext = end(explode('.', $image_name));

           //rename the image
           $image_name ="categoria_de_comidas_".rand(000,999).'.'.$sext;

           $source_path=$_FILES['image']['tmp_name'];
           $destination_path="../images/categories/".$image_name;  
          
           //finally uploaded the image 
           $upload =move_uploaded_file($source_path, $destination_path);
            //Check Whether the image is uploaded or not
            //and if the image is not uploaded then we will stop the process and redirect with erro message
            if ($upload == false) {
                //set message
                $_SESSION['upload']="<div class ='error'> falhou ao remover a imagem </div>";
                //redirect to add category page
                header('location:'.SITEURL."Admin/manage-category.php");
                //stop the process
                die();
              }
             if ($current_image !="") {
                $remove_path="../images/categories/".$current_image;
                $remove= unlink($remove_path);
                if ($remove == false) {
                    //set message
                  $_SESSION['falied-to-remove']="<div class ='error'> falhou ao remover a imagem </div>";
                  //redirect to add category page
                  header('location:'.SITEURL."Admin/manage-category.php");
                  //stop the process
                  die();
                }
             }
        }
        else
         {
            $image_name = $current_image;
        }
    }
    else 
    {
        $image_name = $current_image;
    }

   //Update the Database
     $sql2 ="UPDATE tb_categoria SET
     title = '$title',
     nome_imagem='$image_name',
     featured = '$featured',
     active = '$active'
     WHERE id_categoria = '$id_categoria'";

    //Execute the Query
     $res2 =mysqli_query($conn,$sql2);
     
     //check wether the query executed successfully or not

     if($res2 == true){

        
        $_SESSION['update'] = "<div class= 'successo'> Categoria foi actualizada com sucesso.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    
    else {
        echo "Falhou na tarefa";
        $_SESSION['category-not-found'] = "<div class= 'error'>Falhou na tarefa.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
}
?>
<?php include('partials/footer.php');?>
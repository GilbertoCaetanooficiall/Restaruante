<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1> Adicionando Nova categoria</h1>
    
        <br><br>
        <?php
          if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }

          if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
          }
        ?>
        <br><br>

        <!-- add category from starts-->
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Titutlo:</td>
                    <td>
                        <input type="text" name="title" placeholder="Nome da categoria">
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
                        <input type="radio" name="featured" value="sim"> Sim
                        <input type="radio" name="featured" value="nao">Não
                    </td>
                </tr>
                <tr>
                    <td>Activo:</td>
                    <td>
                        <input type="radio" name="active" value="sim"> Sim
                        <input type="radio" name="active" value="nao">Não
                    </td>

                    <tr>
                        <td colspan ="2">
                            <input type="submit" name ="submit" value="Adicionar" class="btn-secondary">
                        </td>
                    </tr>
                </tr>

            </table>
        </form>
        <!--add category form ends -->

        <?php
        //Check whether the submit button is clicked or not

        if (isset($_POST['submit'])) {
           //1.Get the value from category form
           $title =$_POST['title'];

           //.For radio, we need to check wether two button is selected or not
           if (isset($_POST['featured'])) {
            
            //Get the value from form

            $featured =$_POST['featured'];
           }
           else {
            //set default value
            $featured ="Não";
           }
           if (isset($_POST['active'])) {
          
            //Get the value from form

            $active =$_POST['active'];
           }
           else {

            //Set default value

            $active ="Não";
           }

           //Check the wheteher image is selected or not and set the value for image name accoridingly           

         if (isset($_FILES['image']['name'])) {
            //upload image
            //to upload image we need  image name, source path and destination path
           $image_name=$_FILES['image']['name'];
           
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
            $_SESSION['upload']="<div class ='error'> falhou ao carregar a imagem</div>";
            //redirect to add category page
            header('location:'.SITEURL."Admin/add-category.php");
            //stop the process
            die();
          }
            
        }
         

           //2. Create  SQL Query to insert category into databases
           $sql ="INSERT INTO tb_categoria SET 
             title='$title',
             nome_imagem='$image_name',
             featured='$featured',
             active='$active'
             ";

             //3. Execute the Query and Save in database
             $res =mysqli_query($conn, $sql);

             //4. Check whether two query executed or not and data added or not
             if($res==true){
                //Query executed and category added
                $_SESSION['add']  = "<div class= 'successo'> nova categoria foi adicionada com sucesso.</div>";
                //Redirect to manage category page
                header("location:". SITEURL .'admin/manage-category.php'); 
            }
            else {
                
                    //echo("Desculpe, verifique a query");
                    //Create a ssession variable to display message
                    $_SESSION['add']  = "<div class= 'error'> Falhou em adicionar uma nova categoria.</div>";
                   //redirect page to manage admin
                    header("location:". SITEURL .'admin/manage-category.php');
                 
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>
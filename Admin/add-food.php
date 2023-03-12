<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1> Adicionando Nova comida</h1>
    
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
                        <input type="text" name="title" placeholder="Nome da comida">
                    </td>
                </tr>
                <tr>
                    <td>Selecionar imagem</td>
                    <td>
                        <input type="file" name="image"> 
                    </td>
                </tr>
                
                <tr>
                    <td>Descrição:</td>
                    <td>
                      <textarea name="descricion" cols="30" rows="5" placeholder="Descrição da comida"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Preço:</td>
                    <td>
                        <input type="number" name="price"> :KZ
                    
                    </td>
                    </tr>
                <tr>
                    <td>categoria</td>
                    <td>
                        <select name="categoria">
                        <?php
                        $sql="SELECT * FROM tb_categoria WHERE active = 'sim'";
                       
                        $res=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($res);
                        if ($count>0) {
                        while ($row=mysqli_fetch_assoc($res)) {
                            $id_categoria=$row['id_categoria'];
                            $title=$row['title'];?>
                            <option value="<?php echo $id_categoria; ?>"><?php echo $title;?></option>
                            <?php
                        }

                         
                        }else {
                            ?>
                            <option value="0">Sem categorias</option>
                            <?php
                        }

                        ?>
                        </select>
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
           $descricion=$_POST['descricion'];
           $price=$_POST['price'];
           $categoria=$_POST['categoria'];
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
           //upload the image name only if is selected
           if ($image_name!="") {
             //Auto rename our image
           //Get the extesion of our image(jpg,png, gift etc)
           $sext =end(explode('.', $image_name));

           //rename the image
           $image_name ="comidas_".rand(000,999).'.'.$sext;

           $src=$_FILES['image']['tmp_name'];
           $dst="../images/categories/comidas/".$image_name;  
          
           //finally uploaded the image 
           $upload =move_uploaded_file($src, $dst);
            //Check Whether the image is uploaded or not
            //and if the image is not uploaded then we will stop the process and redirect with erro message
           
           
           
            if ($upload == false) {
            //set message
            $_SESSION['upload']="<div class ='error'> falhou ao carregar a imagem</div>";
            //redirect to add category page
            header('location:'.SITEURL."Admin/add-food.php");
            //stop the process
            die();
           }
        
          }
         
        }
         

           //2. Create  SQL Query to insert category into databases
           $sql2 ="INSERT INTO tb_comida SET 
             title='$title',
             descripcion='$descricion',
             price='$price',
             nome_imagem='$image_name',
             featured='$featured',
             active='$active',
             id_categoria='$categoria'
             ";

             //3. Execute the Query and Save in database
             $res2=mysqli_query($conn, $sql2);

             //4. Check whether two query executed or not and data added or not
             if($res2==true){
                //Query executed and category added
                $_SESSION['add']  = "<div class= 'successo'> nova comida foi adicionada com sucesso.</div>";
                //Redirect to manage category page
                header("location:". SITEURL .'admin/manage-food.php'); 
            }
            else {
                
                    //echo("Desculpe, verifique a query");
                    //Create a ssession variable to display message
                    $_SESSION['add']  = "<div class= 'error'> Falhou em adicionar uma nova comida.</div>";
                   //redirect page to manage admin
                    header("location:". SITEURL .'admin/manage-food.php');
                 
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>
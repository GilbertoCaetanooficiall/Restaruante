<?php include('partials/menu.php')?>
<div class="main-content">
<div class="wapper">
    <h1>Gerenciar comida</h1>
    <br /> <br />  <br />
<?php
    if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }
          

          if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
          }
          if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }
          if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }
          if (isset($_SESSION['food-not-found'])) {
            echo $_SESSION['food-not-found'];
            unset($_SESSION['food-not-found']);
          }
          if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
          }
          if (isset($_SESSION['falied-to-remove'])) {
            echo $_SESSION['falied-to-remove'];
            unset($_SESSION['falied-to-remove']);
          }
          ?>
           <br /> <br />  <br />
    <!-- criando botão para adicionar administrador-->
    <a href="<?php echo SITEURL;  ?>admin/add-food.php" class="btn-primary">adicionar comida</a>
    <br /> <br />  <br />
    <table class="tbl-full">
        <tr class="abc">
        <th >S.N</th>
            <th>Titutlo</th>
            <th>imagem</th>
            <th>preço</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Ação</th>
        </tr>
        </tr>

<?php
 //Query to get all admin
 $sql = "SELECT * FROM tb_comida ";
 //Execute the query 
 $res=mysqli_query($conn,$sql);

   // COUNT ROWS TO CHECK WHETHER WE HAVE DATA IS DATABASE OR NOT
    $count = mysqli_num_rows($res);//function to get all line rows in databases
    $sn=1;//

    //Check the run in databases
    if ($count>0) {

    //We have data in databaese
    while ($rows= mysqli_fetch_assoc($res)) {
        //Using while loop to get all the datas form database
        //and while loop will run as long as we have data in databes
    
        //Get individual DATA
        $id_comida =$rows['id_comida'];
        $title=$rows['title'];
        $image_name=$rows['nome_imagem'];
        $price=$rows['price'];
        $featured= $rows['featured'];
        $active= $rows['active'];
        //Display the values in our Table
  ?>
  <tr>
  <td><?php echo $sn++;?></td>
  <td><?php echo $title;?></td>
  <td>
      <?php
            if($image_name !=""){
           ?>
            
            
              <img  src="<?php echo SITEURL. 'images/categories/comidas/'.$image_name;?>" width="10%">
          <?php 
            
          }
          else {
              echo "<div class ='error'> Imagem não adicionada</div>";
          }
     

     ?>
         
</td>
<td><?php echo $price;?>KZ</td>
  <td><?php echo $featured;?></td>
  <td><?php echo $active;?></td>
  <td>
  <a href="<?php echo SITEURL.'admin/update-food.php?id_comida='.$id_comida;?>" class="btn-secondary"> Actualizar</a>
  <a href="<?php echo SITEURL.'admin/delete-food.php?id_comida='.$id_comida. '&nome_imagem=' .$image_name;?>" class="btn-third"> Deletar</a>
  </td>

</tr>
<?php
                }
            }
            
            else {
                //We do have not data in databases
            
            ?>
                <tr>
                    <td><div class="error">Nenhuma Categoria foi adicionada</div></td>
                </tr>
             <?php
            }
        
          ?>
  </table>
</div>
</div>

<?php include('partials/footer.php');?>
<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Actualizando a encomenda</h1>
        <br><br>


        <?php
             $id_encomenda=$_GET['id_encomenda'];
     
             // 2. Create SQL Query to get details
             
             $sql="SELECT * FROM tb_encomenda WHERE id_encomenda ='$id_encomenda'";
             
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
           $title=$row['food'];
           $price=$row['price'];
           $total=$row['total'];
           $status=$row['status'];
           $quantity=$row['quantity'];
           $customer_name =$row['customer_name'];
           $customer_contact= $row['customer_contact'];
           $customer_email= $row['customer_email'];
           $customer_addres=$row['customer_addres'];
           
           
            }
           
             }
             else {
                //Redirect to manage admin page
                header('location:'.SITEURL.'admin/manage-order.php');
             }
            ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>encomenda:</td>
                    <td>
                        <strong><?php echo $title;?></strong>
                    </td>
                </tr>
                <tr>
                    <td>Preço:</td>
                    <td>
                        <strong><?php echo $price;?> KZ</strong>
                    </td>
                </tr>
                <tr>
                    <td>valor a pagar:</td>
                    <td>
                        <strong><?php echo $total;?> KZ</strong>
                    </td>
                </tr>
                <tr>
                    <td>Quantidade:</td>
                    <td>
                        <input type="number" name="quantity" value="<?php echo $quantity;?>">
                    </td>
                </tr>
                <tr>
                    <td>Condição :</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="encomendado"){echo "selected";}?>value="encomendado">encomendado</option>
                            <option <?php if($status=="para entregar"){echo "selected";}?> value="para entregar">para entregar</option>
                            <option <?php if($status=="entregado"){echo "selected";}?>value="entregado">entregado</option>
                            <option <?php if($status=="cancelado"){echo "selected";}?>value="cancelado">cancelado</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Cliente :</td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name;?>">
                    </td>
                </tr> 
                <tr>
                <td>Email :</td>
                    <td>
                        <input type="email" name="customer_email" value="<?php echo $customer_email;?>">
                    </td>
                </tr>
                <tr>
                <td>Contacto :</td>
                    <td>
                        <input type="tel" name="customer_contact" value="<?php echo $customer_contact;?>">
                    </td>
                </tr>
                <tr>
                <td>endereço : </td>
                    <td>
                       <textarea name="customer_addres" cols="30" rows="10" ><?php echo $customer_addres;?></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="hidden" name="id_encomenda" value="<?php echo $id_encomenda;?>">
                        <input type="submit" name="submit" value="Actualiza" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
        
   
      </div>
    <?php

                    if (isset($_POST['submit'])) {
                        $id_encomenda =$_POST['id_encomenda'];
                        $quantity=$_POST['quantity'];
                        $total= $price * $quantity;
                        $customer_name=$_POST['customer_name'];
                        $customer_email=$_POST['customer_email'];
                        $customer_contact=$_POST['customer_contact'];
                        $customer_addres=$_POST['customer_addres'];
                        $price=$_POST['price'];
                      $status= $_POST['status'];
                      
                      $sql2 ="UPDATE tb_encomenda SET
                      quantity='$quantity',
                      total='$total',
                      price='$price',
                      customer_name = '$customer_name',
                      customer_email='$customer_email',
                      customer_contact='$customer_contact',
                      customer_addres='$customer_addres',
                      status = '$status'
                      WHERE id_encomenda = '$id_encomenda'";
                 
                     //Execute the Query
                      $res2 =mysqli_query($conn,$sql2);
                      
                      //check wether the query executed successfully or not
                 
                      if($res2 == true){
                 
                         
                         $_SESSION['update'] = "<div class= 'successo'> encomenda foi actualizada com sucesso.</div>";
                         header('location:'.SITEURL.'admin/manage-order.php');
                     }
                     
                     else {
                         echo "Falhou na tarefa";
                         $_SESSION['food-not-found'] = "<div class= 'error'>Falhou na tarefa.</div>";
                         header('location:'.SITEURL.'admin/manage-order.php');
                     }
                    }
                    
        ?>
</div>




<?php include('partials/footer.php');?>
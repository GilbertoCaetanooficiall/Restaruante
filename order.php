<?php include ('partials-front/menu.php');?>
<body>
<?php
            if (isset($_GET['id_comida'])) {
                $id_comida=$_GET['id_comida'];
                $sql="SELECT * FROM tb_comida WHERE id_comida='$id_comida'";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if ($count==1) {
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $price=$row['price'];
                $image_name=$row['nome_imagem'];
                }
                else
                 {
                    header('location:'.SITEURL);
                }
            }
        ?>
              
<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
      
       <h2 class="text-center text-white">Preenche o formulário para confirmar a encomenda.</h2>

            <form action="#" class="order" method="POST">
                <fieldset>
                    <legend class= "text-center text-white">Comida selecionada</legend>

                    <div class="food-menu-img">
                    <?php
                if ($image_name!="") {
                   ?>
                    <img src="<?php echo SITEURL.'images/categories/comidas/'.$image_name;?>" alt="" class="img-responsive img-curve">
                <?php
                }
                else{
                    echo "<div class='error'>sem imagem adicionada</div>";
                }
             ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="food" value="<?php echo $title;?>">
                        
                        <p class="food-price"><?php echo $price;?> KZ</p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g.  Gilberto Caetano" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Rua, Cidade/Bairro, País" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Encomendar" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
                    if (isset($_POST['submit'])) {
                        $food=$_POST['food'];
                        $price=$_POST['price'];
                        $quantity=$_POST['qty'];
                        $full_name=$_POST['full-name'];
                        $contact=$_POST['contact'];
                        $email=$_POST['email'];
                        $address=$_POST['address'];
                        $total= $quantity * $price;
                        $status="Encomendado";
                        $encomenda_date= date("y-m-d h:i:sa");
                    
                        $sql2="INSERT INTO tb_encomenda SET
                      food ='$food',
                      price = '$price',
                      quantity='$quantity',
                      customer_name='$full_name',
                      customer_contact='$contact',
                      customer_email='$email',
                      customer_addres='$address',
                      total='$total',
                      status='$status',
                      encomenda_date='$encomenda_date'";
                    $res2 = mysqli_query($conn, $sql2) ;

      
      
                            // Check wether the query is executed  data is inserted or not and display agropirate  message
                           if($res2==true){
                            //  echo("inserido com sucesso");
                            //Create a ssession variable to display message
                            $_SESSION['encomenda']  = "<div class ='success text-center'> Sua encomenda foi adicionada com sucesso.</div>";
                             //redirect page to manage admin
                             header('location:'.SITEURL); 
                           
                    }
                           else{
                            //echo("Desculpe, verifique a query");
                            //Create a ssession variable to display message
                            $_SESSION['encomenda']  = "<div class ='error text-center'> Falhou ao fazer o pedido.</div>";
                           //redirect page to manage admin
                           header('location:'.SITEURL);
                           }
                    }

                    
            ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php include ('partials-front/footer.php');?>
</body>
   
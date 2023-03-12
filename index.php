<?php include ('partials-front/menu.php');?>
<body>

       <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL.'food-search.php';?>" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
        

    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php
                    if (isset($_SESSION['encomenda'])) {
                    echo $_SESSION['encomenda'];
                    unset($_SESSION['encomenda']);
                }
    ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
          <div class="container">
            <h2 class="text-center">Explore a variedades de comidas</h2>

            <?php
                   
                   
                   $sql="SELECT* FROM tb_categoria WHERE active = 'sim' AND featured = 'sim' LIMIT 3";
                    
                    $res=mysqli_query($conn,$sql);
                    
                    $count=mysqli_num_rows($res);
                 
                    if ($count>0) {
                        
                        while ($row=mysqli_fetch_assoc($res)) {
                            $id_categoria=$row['id_categoria'];
                            $image_name=$row['nome_imagem'];
                            $title=$row['title'];
                            ?>
            <a href="<?php echo SITEURL.'category-foods.php?id_categoria='.$id_categoria;?>">
            <div class="box-3 float-container">
           <?php
                if ($image_name!="") {
                   ?>
                    <img src="<?php echo SITEURL.'images/categories/'.$image_name;?>" alt="Pizza" class="img-responsive img-curve">
                <?php
                }
                else{
                    echo "<div class='error'>sem imagem adicionada</div>";
                }
           ?>
           

                <h3 class="float-text text-white"><?php echo $title;?></h3>
            </div>
            </a>
                            <?php
                        }
                    }
                    else {
                        echo "<div class='error'>Sem categoria adicionada</div>";
                    }
            ?>
          <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Destaques</h2>

            <?php
                    $sql="SELECT* FROM tb_comida WHERE active = 'sim' AND featured = 'sim' LIMIT 6";
                    
                    $res=mysqli_query($conn,$sql);
                    
                    $count=mysqli_num_rows($res);
                 
                    if ($count>0) {
                        
                        while ($row=mysqli_fetch_assoc($res)) {
                            $id_comida=$row['id_comida'];
                            $price=$row['price'];
                            $image_name=$row['nome_imagem'];
                            $descripcion=$row['descripcion'];
                            $title=$row['title'];
                            ?>
            <a href="<?php echo SITEURL.'foods.php'?>">
            
            <div class="food-menu-box">
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
                    <h4><?php echo $title;?></h4>
                    <p class="food-price"><?php echo $price;?> KZ</p>
                    <p class="food-detail"><?php echo $descripcion;?></p>
                    <br>
                    <a href="<?php echo SITEURL.'order.php?id_comida='.$id_comida;?>" class="btn btn-primary">Encomende já</a>
                    </div>
                     </div>
               <?php
                        }
                    }
                    else {
                        echo "<div class='error'>Sem categoria adicionada</div>";
                    }
                    ?>


            

                
                 <div class="clearfix"></div>

            

                 </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
<?php include('partials-front/footer.php');?>
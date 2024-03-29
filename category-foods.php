<?php include ('partials-front/menu.php');?>
<body>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

        <?php
        
            if (isset($_GET['id_categoria'])) {
               $id_categoria=$_GET['id_categoria'];
                $sql="SELECT title FROM tb_categoria WHERE id_categoria='$id_categoria'";
               
                $res=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($res);
                $title_categoria=$row['title'];
            }
        ?>
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $title_categoria;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                    $sql="SELECT* FROM tb_comida WHERE active = 'sim' and id_categoria='$id_categoria'";
                    
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
                    <a href="<?php echo SITEURL.'order.php?id_comida='.$id_comida?>" class="btn btn-primary">Encomende já</a>
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

    </section>
    <?php include('partials-front/footer.php')?>
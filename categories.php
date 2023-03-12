<?php include ('partials-front/menu.php');?>
<body>
      <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
                    $sql="SELECT* FROM tb_categoria WHERE active = 'sim' ";
                    
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
<?php include('partials-front/footer.php')?>
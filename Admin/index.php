<?php include('partials/menu.php')?>
   <!--Div menu section ends-->
   <!--Div main content section begins-->
   <div class="main-content">
   <div class="wrapper">
    <h1>DASHBOARD</h1>
    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
  }
  ?>
      </div>
      <div class="col-4 text-center">
        <?php
        $sql="SELECT * FROM tb_categoria";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
        <h1><?php echo $count;?></h1>
         Categorias
         <br />
        </div>
      <div class="col-4 text-center">
      <?php
        $sql="SELECT * FROM tb_comida";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
        <h1><?php echo $count;?></h1>
         Comidas
         <br />
        </div>
      <div class="col-4 text-center">
      <?php
        $sql="SELECT * FROM tb_encomenda";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
        <h1><?php echo $count;?></h1>
         Encomendas
         <br />
        </div>
        <div class="col-4 text-center">
        <?php
        $sql="SELECT SUM(total) AS total  FROM tb_encomenda WHERE status='entregado'";
        $res=mysqli_query($conn,$sql);
        $rows=mysqli_fetch_assoc($res);
        $renevue_total=$rows['total'];
        ?>
        <h1><?php echo $renevue_total;?>KZ</h1>
         Receita gerada
         <br />
        </div>
      <div class="clearfix"> </div>
   </div>
   <!--Div main content section ends-->
   <?php include('partials/footer.php')?>
</body>
</html>

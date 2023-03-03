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
        <h1>5</h1>
         categories
         <br />
        </div>
      <div class="col-4 text-center">
        <h1>5</h1>
         categories
         <br />
        </div>
      <div class="col-4 text-center">
        <h1>5</h1>
         categories
         <br />
        </div>
        <div class="col-4 text-center">
        <h1>5</h1>
         categories
         <br />
        </div>
      <div class="clearfix"> </div>
   </div>
   <!--Div main content section ends-->
   <?php include('partials/footer.php')?>
</body>
</html>

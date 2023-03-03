<?php include('partials/menu.php')?>
<body>
   </div>
   <!--Div menu section ends-->
   <!--Div main content section begins-->
   <div class="main-content">
   <div class="wrapper">
    <h1>Painel de administração</h1>
    <br /> <br />  <br />
   
   <?php
   if(isset($_SESSION['add'])){
   
    echo $_SESSION['add'];//displaying session message
   unset($_SESSION['add']);//Removing displaying session message
}
if (isset($_SESSION['delete'])) {
   echo $_SESSION['delete'];//displaying session message
   unset($_SESSION['delete']);//Removing displaying session message
}
if (isset($_SESSION['update'])) {
   echo $_SESSION['update'];//displaying session message
   unset($_SESSION['update']);//Removing displaying session message
}

   if(isset($_SESSION['changed-pwd'])){
      echo $_SESSION['changed-pwd'];
      unset($_SESSION['changed-pwd']);
   }
   if(isset($_SESSION['pwd-not-match'])){
      echo $_SESSION['pwd-not-match'];
      unset($_SESSION['pwd-not-match']);
   }
   if(isset($_SESSION['user-not-found'])){
      echo $_SESSION['user-not-found'];
      unset($_SESSION['user-not-found']);
   }

 ?>
    <br /> <br />  <br /> 

    <!-- criando botão para adicionar administrador-->
    <a href="add-admin.php" class="btn-primary">Novo Admin</a>
    <br /> <br />  <br />
     <table class="tbl-full">
        <tr>
            <th>S.N</th>
            <th>Nome de Usuário</th>
            <th>Email</th>
            <th>Contacto</th>
            <th>Ação</th>
        </tr>

        <?php
        //Query to get all admin
            $sql = "SELECT * FROM tb_admin ";
         //Execute the query 
         $res=mysqli_query($conn,$sql);

         //check wheter the Query is Executed or not
         if($res==TRUE){
            // COUNT ROWS TO CHECK WHETHER WE HAVE DATA IS DATABASE OR NOT
            $count = mysqli_num_rows($res);//function to get all line rows in databases
          $sn=1;//

            //Check the run in databases
            if ($count>0) {

            //We have data in databaese
            while ($rows =mysqli_fetch_assoc($res)) {
                //Using while loop to get all the datas form database
                //and while loop will run as long as we have data in databes
            
                //Get individual DATA
                $id_admin =$rows['id_admin'];
                $username=$rows['username'];
                $email= $rows ['email'];
                $contacto= $rows['contact'];
                //Display the values in our Table
                ?>
                
                
                <tr>
                <td><?php echo $sn ++; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $contacto; ?></td>
                <td>
                <a href="<?php echo SITEURL;  ?>admin/update-password.php?id_admin=<?php  echo $id_admin;  ?>" class="btn-primary"> Mudar senha</a>
                <a href="<?php echo SITEURL;  ?>admin/update-admin.php?id_admin=<?php  echo $id_admin;  ?>" class="btn-secondary"> Actualizar</a>
                <a href="<?php echo SITEURL;  ?>admin/delete-admin.php?id_admin=<?php  echo $id_admin;  ?> " class="btn-third"> Deletar</a>
                </td>
            </tr>
            <?php
            }
          }
          else {
            //We do not have data in database
          } 
        }
        ?>
       
       
       
     </table>
    </div>
</div> 
      <!--Div footer section begins-->
 <?php include('partials/footer.php')?>
</body>
</html>

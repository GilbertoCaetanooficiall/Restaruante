<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Adicionando novo Administrador</h1>
        <br/><br/><br/>
       
       <?php

if(isset($_SESSION['add'])){
   
    echo $_SESSION['add'];//displaying session message
   unset($_SESSION['add']);//Removing displaying session message
}
       ?>
        <form action="" method="post">
        <table class="tbl-30">
            <tr>
                <td>Nome de Usuário</td>
                <td><input type="text" name="nome_completo" placeholder="insere seu nome"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name="email" placeholder="insere nome de email">
                </td>
                <tr>
                <td>Contacto:</td>
                <td>
                    <input type="tel" name="contact" placeholder="insere numero de contacto">
                </td>
                <tr>
                    <td>Senha :</td>
                    <td> 
                        <input type="password" name ="password" placeholder="Inserir senha">
                    </td>
                </tr>
                <tr>
                    <td colspan ="2">
                        <input type="submit" name="submit" value="cadastrar" class="btn-secondary">
                    </td>
                </tr>
            </tr>
        </table>
       </form>
    </div>
</div>
<?php include('partials/footer.php')?>

<?php
/*process da validação do botão e salvar os dados na base dados*/
/*verificar se o botão está enviando os dados ou não */

if (isset ($_POST['submit'])) {
   // echo "botão clicado";
    //pegar os dados do formulário
    $full_name =$_POST['nome_completo'];
    $contacto= $_POST['contact'];
    $email= $_POST['email'];
    $password=md5($_POST['password']);
    
    //query para salvar dos dados na base de dados
    $sql =" INSERT INTO tb_admin SET
            username='$full_name',
            email='$email',
            contact='$contacto',
            password='$password'
            ";
        //Executing query and saving data into database
      $res = mysqli_query($conn, $sql) or die(mysqli_error());

      if ($full_name &&  $email && $contacto && $password !="") {
      
        // Check wether the query is executed  data is inserted or not and display agropirate  message
       if($res==true){
        //  echo("inserido com sucesso");
        //Create a ssession variable to display message
        $_SESSION['add']  = "<div class= 'successo'> Admin foi adicionado com sucesso.</div>";
         //redirect page to manage admin
          header("location:". SITEURL .'admin/manage-admin.php');   
      }
      

    
}
       else{
        //echo("Desculpe, verifique a query");
        //Create a ssession variable to display message
        $_SESSION['add']  = "<div class= 'error'> Falhou em adicionar um novo Admin nenhum campo pode estar vazio.</div>";
       //redirect page to manage admin
        header("location:". SITEURL .'admin/add-admin.php');
     }
    }
?>
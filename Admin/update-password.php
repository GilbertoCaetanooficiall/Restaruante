<?php include('partials/menu.php');?>

<div class ="main-content">
    <div class ="wapper">
        <h1>Mudar palavra passe</h1>
        <br/><br/><br/>

        <form action="" method="POST">
            <table class ="tbl-30">
                <tr>
                    <td>Palavra-passe actual :</td>
                    <td>
                        <input type="password" name="password" placeholder="inserir palavra-passe antiga">
                    </td>
                </tr>
                <tr>
                    <td>Nova palavra-passe :</td>
                    <td>
                        <input type="password" name="new_password" placeholder="inserir palavra-passe nova">
                    </td>
                </tr>
                <tr>
                    <td>confirmar palavra-passe :</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirmar palavra-passe nova">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id_admin" value="<?php echo $_GET['id_admin'];?>">
                      <input type="submit" name ="submit" value="mudar palavra-passe" class ="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php
    // Check whether the submit  button is clicked or not

    if (isset($_POST['submit'])) {
        echo " o evento acontece família";
        //1. Get the data from form
        $id_admin = $_POST['id_admin'];
        $password = md5 ($_POST['password']);
        $new_password = md5 ($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //2. Check whether the user with current ID and current  Password exist or not
        $sql ="SELECT * FROM  tb_admin WHERE id_admin='$id_admin' AND PASSWORD= '$password'";

        //execute the query
        $res = mysqli_query($conn, $sql);
        
        if($res == true)
         {
        //check whether data is available or not
            $count = mysqli_num_rows( $res );
            
            if ($count==1)
           
             {

                //User Exists and Password can be changed
                //echo "ser found";
                if ($new_password == $confirm_password)
                 {
                    $sql2 ="UPDATE tb_admin SET
                        password='$new_password'
                        Where id_admin='$id_admin'
                        ";
                    $res2=mysqli_query($conn, $sql2);

                    if ($res2==true)
                     {
                       //User not found set message and redirect
                        $_SESSION['changed-pwd'] ="<div class= 'successo'>Palavra-passe foi alterada com sucesso.</div>";
                        //Redirect user
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                else {
                $_SESSION['changed-pwd'] ="<div class= 'error'>falhou em alterar a palavra passe.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php'); 
                }
                }
                else {
                    $_SESSION['pwd-not-match'] ="<div class= 'error'>palavra passe errada.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
                }
               }
            else
             {
                //User not found set message and redirect
                $_SESSION['user-not-found'] ="<div class= 'error'>usuario  não encontrado.</div>";
                //Redirect user
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        //3. Check whether the New Password and Confirm Passowrd match or not
        
        //4. Change password if all above is true 
    }
?>
<?php include('partials/footer.php');?>

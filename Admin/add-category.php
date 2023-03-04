<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1> Adicionando Nova categoria</h1>
    
        <br><br>

        <!-- add category from starts-->
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Titutlo:</td>
                    <td>
                        <input type="text" name="title" placeholder="Nome da categoria">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="sim"> Sim
                        <input type="radio" name="featured" value="nao">Não
                    </td>
                </tr>
                <tr>
                    <td>Activo:</td>
                    <td>
                        <input type="radio" name="active" value="sim"> Sim
                        <input type="radio" name="active" value="nao">Não
                    </td>

                    <tr>
                        <td colspan ="2">
                            <input type="submit" name ="submit" value="Adicionar" class="btn-secondary">
                        </td>
                    </tr>
                </tr>

            </table>
        </form>
        <!--add category form ends -->

        <?php
        //Check whether the submit button is clicked or not

        if (isset($_POST['submit'])) {
            echo "Acontece o evento familia";
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>
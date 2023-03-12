<?php include('partials/menu.php')?>
<div class="main-content">
<div class="wapper">
<?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
?>    

<h1>Gerenciar encomendas</h1>
    <table class="tbl-full">
        <tr class="abc">
            <th >S.N</th>
            <th>Encomenda</th>
            <th>Qty</th>
            <th >Preço</th>
            <th >TOTAL</th>
            <th >Data </th>
            <th >Condição</th>
            <th >Cliente</th>
            <th >Contacto</th>
            <th >Email</th>
            <th >Endereço</th>
            <th >Ação</th>
            </tr>
           <?php
           $sql="SELECT *FROM tb_encomenda";
           $res=mysqli_query($conn,$sql);
           $count=mysqli_num_rows($res);
           $sn=1;
        if ($count>0) {
            
            while ($rows=mysqli_fetch_assoc($res)) {
                $id_encomenda=$rows['id_encomenda'];
                $encomenda=$rows['food'];
                $quantity=$rows['quantity'];
                $price=$rows['price'];
                $total=$rows['total'];
                $encomenda_date=$rows['encomenda_date'];
                $status=$rows['status'];
                $customer_name=$rows['customer_name'];
                $customer_contact=$rows['customer_contact'];
                $customer_email=$rows['customer_email'];
                $customer_address=$rows['customer_addres'];
            ?>
            <tr>
            <td><?php echo $sn++;?></td>
            <td><?php echo $encomenda;?></td>
            <td><?php echo $quantity;?></td>
            <td><?php echo $price;?>KZ</td>
            <td><?php echo $total;?>KZ</td>
            <td><?php echo $encomenda_date ;?></td>
            <td>
                <strong>
                    
                <?php

if ($status=="encomendado") {
    echo "<label style =' color:yellow;'>$status</label>";
} elseif ($status=="para entregar") {
    echo "<label style =' color:orange;'>$status</label>";
}elseif ($status=="entregado") {
    echo "<label style =' color:green;'>$status</label>";
}elseif ($status=="cancelado") {
    echo "<label style =' color:red;'>$status</label>";
}

?>
                </strong>
            </td>
            <td><?php echo $customer_name ;?></td>
            <td><?php echo $customer_contact ;?></td>
            <td><?php echo $customer_email ;?></td>
            <td><?php echo $customer_address;?></td>
            <td>
            <a href="<?php echo SITEURL.'admin/update-order.php?id_encomenda='.$id_encomenda;?>" class="btn-secondary"> Alterar</a>
            </td>
        </tr>
            <?php
            
            }
        }
        else {
            
            
            echo "<tr><td colspam = '12' class='error'> sem encomendas </td></tr>";
        }
           ?> 
     </table>
    </div>
</div>
<?php include('partials/footer.php')?>
<?php include('../others/sidebar.php');?>
<?php
$services_id = $_GET['services_id'];
$query = mysqli_query($con, "SELECT * FROM `services` WHERE `id`= '$services_id'");
$services =mysqli_fetch_array($query);
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Services Products<a href='services_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a><a href='services_products_add.php?services_id=<?php echo $services_id;?>'><button type="button" class="btn btn-sm btn-primary" style="background:#52616B;float:right;">Add Product to Service</button></a></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php
                $query = mysqli_query($con, "SELECT * FROM `services_products` WHERE `service_id`= '$services_id'");
                if(mysqli_num_rows($query)){
                ?>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">Product Name</th>
                                <th scope="col" class="sort">Current Stock</th>
                                <th scope="col" class="sort">Quantity</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        <?php
                        while($sp =mysqli_fetch_array($query)){
                            $products_id = $sp['product_id'];
                            $query2 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$products_id'");
                            $products = mysqli_fetch_array($query2);

                            echo "
                            <tr style='font-weight:bold;'>
                                <td>".strtoupper($products['product_name'])." ".$products['brand']." - ".$products['type']."</td>
                                <td>".$products['quantity']."</td>
                                <td>".$sp['quantity']."</td>

                                <td><a href='services_products_upd.php?sp_id=".$sp['id']."'><button type='button' class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-edit'></i></button></a></td>
                            </tr>
                            ";
                        }

                        ?>
                        </tbody>
                    </table>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../others/footer.php');?>

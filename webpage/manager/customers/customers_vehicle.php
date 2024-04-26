<?php include('../others/sidebar.php');?>
<?php
$customers_id = $_GET['customers_id'];
$query = mysqli_query($con, "SELECT * FROM `customers` WHERE `id`= '$customers_id'");
$customers =mysqli_fetch_array($query);
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0"><?php echo strtoupper($customers['lname']).", ".ucwords($customers['fname'])." ".ucwords($customers['mname']); ?> Vehicles<a href='customers_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a>
                    <a href='vehicles_add.php?customers_id=<?php echo $customers_id;?>'><button class="btn btn-sm btn-primary" style="background:#52616B;float:right;">Add Vehicle</button></a></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php
                $query = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `customer_id`= '$customers_id'");
                if(mysqli_num_rows($query)){
                ?>
                    <table class="datatable table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="type">Type</th>
                                <th scope="col" class="sort" data-sort="model">Model</th>
                                <th scope="col" class="sort" data-sort="plate_no.">Plate Number</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            while($vehicles =mysqli_fetch_array($query)){
                                echo "
                                <tr style='font-weight:bold;'>                              <td>".strtoupper($vehicles['type'])."</td>
                                    <td>".$vehicles['model']." </td>
                                    <td>".$vehicles['plate_no']."</td>
                                    <td><a href='vehicles_upd.php?vehicles_id=".$vehicles['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fa fa-edit'></i></button></a></td>
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
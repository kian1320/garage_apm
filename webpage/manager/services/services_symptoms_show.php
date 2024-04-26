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
                <h3 class="mb-0">Services Symptoms<a href='services_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a><a href='services_symptoms_add.php?services_id=<?php echo $services_id;?>'><button type="button" class="btn btn-sm btn-primary" style="background:#52616B;float:right;">Add Symptoms to Service</button></a></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php
                $query = mysqli_query($con, "SELECT * FROM `services_symptoms` WHERE `service_id`= '$services_id'");
                if(mysqli_num_rows($query)){
                ?>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">Description</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        <?php
                        while($ss =mysqli_fetch_array($query)){
                            
                            echo "
                            <tr style='font-weight:bold;'>
                                <td>".strtoupper($ss['description'])."</td>
                                <td><a href='services_symptoms_upd.php?ss_id=".$ss['id']."'><button type='button' class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-edit'></i></button></a></td>
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

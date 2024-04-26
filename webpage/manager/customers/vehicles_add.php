<?php include('../others/sidebar.php');?>
<?php
$customers_id = $_GET['customers_id'];
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Add Vehicle<a href='customers_vehicle.php?customers_id=<?php echo $customers_id; ?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
            	    <h6 class="heading-small text-muted mb-4">Vehicle information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Model</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter model" name="model">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Type</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter type" name="type">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Plate Number</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Enter plate number" name="plate_no">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type='hidden' name='customer_id' value='<?php echo $customers_id ?>'>
                                <center><input type='submit' name='vehicle_add' value='ADD VEHICLE' class="btn btn-md btn-primary" style="background:#52616B;"></center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../others/footer.php');?>
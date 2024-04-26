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
                <h3 class="mb-0">Update Services<a href='services_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
    	            <h6 class="heading-small text-muted mb-4">Service Information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Service Name</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter service name" name="service_name" value='<?php echo $services['service_name'] ?>'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Estimated Hour</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter estimated hour" name="estimated_hr" value='<?php echo $services['estimated_hr'] ?>'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Estimated Day</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Enter estimated day" name="estimated_day" value='<?php echo $services['estimated_day'] ?>'>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type='hidden' name='services_id' value='<?php echo $services_id ?>'>
                                    <center><input type='submit' name='service_upd' value='UPDATE SERVICE' class="btn btn-md btn-primary" style="background:#52616B;"><input type='submit' name='service_del' value='DELETE SERVICE' class="btn btn-md btn-primary" style="background:#52616B;"></center>               
                                </div>
                            </div> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../others/footer.php');?>
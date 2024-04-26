<?php include('../others/sidebar.php');?>
<?php
$ss_id = $_GET['ss_id'];
$query = mysqli_query($con, "SELECT * FROM `services_symptoms` WHERE `id`='$ss_id' ");
$ss = mysqli_fetch_array($query);
$service_id = $ss['service_id'];
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Update Symptoms<a href='services_symptoms_show.php?services_id=<?php echo $service_id; ?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
        	        <h6 class="heading-small text-muted mb-4">Symptoms</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">    
                                    <label class="form-control-label" for="input-last-name">Symptoms</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Enter Symptoms" name="description" value='<?php echo $ss['description']?>' required autofocus>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">    
                                    <input type='hidden' name='service_id' value='<?php echo $service_id ?>'>
                        			<input type='hidden' name='ss_id' value='<?php echo $ss_id ?>'>
                                    <center><input type='submit' name='services_symptoms_upd' value='UPDATE SYMPTOM/s' class="btn btn-md btn-primary" style="background:#52616B;"><input type='submit' name='services_symptoms_del' value='REMOVE SYMPTOM/s' class="btn btn-md btn-primary" style="background:#52616B;"></center>
                
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
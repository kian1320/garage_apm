<?php include('../others/sidebar.php');?>
<?php
$services_id = $_GET['services_id'];
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Add Symptoms to Service<a href='services_symptoms_show.php?services_id=<?php echo $services_id; ?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
        	        <h6 class="heading-small text-muted mb-4">Service Symptoms</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                            
                    				<label class="form-control-label" for="input-first-name">Description</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter Symptoms" name="description" required autofocus>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type='hidden' name='service_id' value='<?php echo $services_id ?>'>
                                    <center><input type='submit' name='services_symptoms_add' value='ADD SYMPTOM/s TO SERVICE' class="btn btn-md btn-primary" style="background:#52616B;"></center>
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
<?php include('../others/sidebar.php');?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Add Service<a href='services_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
    	            <h6 class="heading-small text-muted mb-4">Service information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Service name</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter service name" name="service_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Estimated Hour</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter estimated hour" name="estimated_hr">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Estimated Day</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Enter estimated day" name="estimated_day">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <center><input type='submit' name='service_add' value='ADD SERVICE' class="btn btn-md btn-primary" style="background:#52616B;"></center>               
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
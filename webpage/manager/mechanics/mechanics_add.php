<?php include('../others/sidebar.php');?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Add Mechanic<a href='mechanics_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
                    <h6 class="heading-small text-muted mb-4">Product information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Full name</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter Fullname" name="fullname"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Nick Name</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter Nickname" name="nickname"  required>
                                </div>
                            </div>
                          
                            </div> 
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <center><input type='submit' name='mechanic_add' value='ADD MECHANIC' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
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
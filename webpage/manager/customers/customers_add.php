<?php include('../others/sidebar.php');?>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Add Customer<a href='customers_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
       
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
                    <h6 class="heading-small text-muted mb-4">User authentication</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-user-name">Username</label>
                                    <input type="text" id="input-user-name" class="form-control" placeholder="Enter username" name="username" required value="<?php echo username_suggest(); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-pass-name">Password</label>
                                    <input type="text" id="input-pass-name" class="form-control" placeholder="Enter password" name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                	<h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">First name</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter first name" name="fname"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Middle name</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter middle name" name="mname"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Last name</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Enter last name" name="lname"  required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Contact</label>
                                    <input id="input-address" class="form-control" placeholder="Enter Contact 09xxxxxxxx" min="9000000000" max="9999999999" type="number" name="contact" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Address</label>
                                    <input id="input-address" class="form-control" placeholder="Home Address" type="text" name="address" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <center><input type='submit' name='customer_add' value='ADD CUSTOMER' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../others/footer.php');?>
<?php include('sidebar.php');?>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Update Username</h3>
            </div>
       
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
                    <h6 class="heading-small text-muted mb-4">User authentication</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-user-name">New Username</label>
                                    <input type="text" id="input-user-name" class="form-control w-50" placeholder="Enter new username" name="new_username" required value="<?php echo username_suggest(); ?>">
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-user-name">Username</label>
                                    <input type="text" id="input-user-name" class="form-control" placeholder="Enter username" name="username" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-pass-name">Password</label>
                                    <input type="password" id="input-pass-name" class="form-control" placeholder="Enter password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center><input type='submit' name='username_update' value='UPDATE USERNAME' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>
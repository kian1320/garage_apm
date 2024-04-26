<?php include('../others/sidebar.php');?>
<?php
$mechanics_id = $_GET['mechanics_id'];
$query = mysqli_query($con, "SELECT * FROM `mechanics` WHERE `id`= '$mechanics_id'");
$mechanics =mysqli_fetch_array($query);
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Update mechanic<a href='mechanics_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
    	            <h6 class="heading-small text-muted mb-4">mechanic information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Fullname</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter mechanic" name="fullname" value='<?php echo $mechanics['fullname'] ?>'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Nick name</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter Nickname" name="nickname" value='<?php echo $mechanics['nickname'] ?>'>
                                </div>
                            </div>
                          
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type='hidden' name='mechanics_id' value='<?php echo $mechanics_id ?>'>
                                    <center><input type='submit' name='mechanic_upd' value='UPDATE mechanic' class="btn btn-lg btn-primary" style="background:#52616B;"><input type='submit' name='mechanic_del' value='DELETE mechanic' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
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
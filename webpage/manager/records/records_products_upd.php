<?php include('../others/sidebar.php');?>
<?php

$rp_id = $_GET['rp_id'];
$query = mysqli_query($con, "SELECT * FROM `record_products` WHERE `id`= '$rp_id'");
$rp =mysqli_fetch_array($query);

$records_id = $rp['record_id'];
$query2 = mysqli_query($con, "SELECT * FROM `records` WHERE `id`= '$records_id'");
$records =mysqli_fetch_array($query2);
?>
<br>
<div class="row">
    <div class="col">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Update Product<a href='records_services_show.php?records_id=<?php echo $records_id?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">BACK</button></a></h3>
        </div>
   	</div>

<form action='../../../database/action.php' method='post'>
	<div class="pl-lg-4">
            <div class="row">
            <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="input-first-name">Quantity</label>
                <input type="text" id="input-first-name" class="form-control" placeholder="Enter estimated time" name="quantity" value='<?php echo $rp['quantity'] ?>' required>
            </div>
            </div>
	<input type='hidden' name='old_quantity' value='<?php echo $rp['quantity'] ?>'>
	<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>
	<input type='hidden' name='rp_id' value='<?php echo $rp_id; ?>'>
	<input type='hidden' name='product_id' value='<?php echo $rp['product_id']; ?>'>
<br>
</div>
</div>
<input type='submit' name='record_products_upd' value='UPDATE' class="btn btn-lg btn-primary" style="background:#52616B;margin-left:30px;"><input type='submit' name='record_products_del' value='DELETE' class="btn btn-lg btn-primary" style="background:#52616B;">
        </div>
</form>
</div>
</div>

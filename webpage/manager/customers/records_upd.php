<?php include('../others/sidebar.php');?>
<?php

$records_id = $_GET['records_id'];
$query = mysqli_query($con, "SELECT * FROM `records` WHERE `id`= '$records_id'");
$records =mysqli_fetch_array($query);
$customer_id = $records['customer_id'];
?>
<br>
<div class="row">
    <div class="col">
	    <div class="card">
	        <div class="card-header">
	            <h3 class="mb-0">Update Customer Record<a href='records_show.php?customers_id=<?php echo $customer_id; ?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
	        </div>
	    	<div class="card-body">
	    		<form action='../../../database/action.php' method='post'>
	        		<div class="pl-lg-4">
	            		<div class="row">
	            			<div class="col-lg-6">
	            				<div class="form-group">
					                <label class="form-control-label" for="input-first-name">Date Record</label><br>
					                <input type='date' name='record_date' placeholder='Enter Date' value='<?php echo $records['record_date']; ?>' class='form-control'>
	                			</div>
	                		</div>

	            			<div class="col-lg-6">
	            				<div class="form-group">
									<label class="form-control-label" for="input-first-name">Vehicle Name</label>
									<select name='vehicle_id' required class='form-control'>
									<?php
									$query = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `customer_id`= '$customer_id'");
									while($vehicles =mysqli_fetch_array($query)){
										echo "
										<option value='".$vehicles['id']."'  "; if($vehicles['id'] == $records['vehicle_id']){echo "SELECTED"; } echo">".strtoupper($vehicles['model'])." ".$vehicles['type'].",  ".$vehicles['plate_no']." </option>
										";
									}
									?>
									</select>
								</div>
	            			</div>

	            			<div class="col-lg-12">
	            				<div class="form-group">
	        					 	<input type='hidden' name='estimated_hr' id='estimated_hr' placeholder='Enter Estimated Hour'  value='<?php echo $records['estimated_hr']; ?>' disabled><br>
									<input type='hidden' name='estimated_day'  id='estimated_day' placeholder='Enter Estimated Day'  value='<?php echo $records['estimated_day']; ?>' disabled><br>
									<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>

									<input type='hidden' name='customer_id' value='<?php echo $customer_id ?>'>
									<center><input type='submit' name='record_upd2' value='UPDATE RECORD' class="btn btn-lg btn-primary" style="background:#52616B;"><input type='submit' name='record_del2' value='DELETE RECORD' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
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

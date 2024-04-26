<?php include('../others/sidebar.php');?>
<?php 
$customers_id = $_GET['customers_id'];
?>
<br>
<div class="row">
    <div class="col-md-12">
	    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Add Record<a href='records_show.php?customers_id=<?php echo $customers_id; ?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
        </div>
    		<div class="card-body">
    			<form action='../../../database/action.php' method='post'>
        			<div class="pl-lg-4">
           				<div class="row">
            				<div class="col-lg-6">
            					<div class="form-group">
					            	<label class="form-control-label" for="input-first-name">Date of Appointment</label><br>
					                <input type='date' name='record_date' placeholder='Enter Date'class="form-control" value='<?php echo date('Y-m-d'); ?>' required><br>
					            </div>
					        </div>
            				<div class="col-lg-6">
            					<div class="form-group">
									<label class="form-control-label" for="input-first-name">Vehicle</label><br>
									<select name='vehicle_id' required class="form-control">
									<?php
									$query = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `customer_id`= '$customers_id'");
									while($vehicles =mysqli_fetch_array($query)){
										echo "
										<option value='".$vehicles['id']."'>".strtoupper($vehicles['model'])." ".$vehicles['type'].",  ".$vehicles['plate_no']." </option>
										";
									}
									?>
									</select>
								</div>
            				</div>
            				<div class="col-lg-12">
            					<div class="form-group">
            						<input type='hidden' name='customer_id' value='<?php echo $customers_id; ?>' >
            						<input type='hidden' name='estimated_hr' id='estimated_hr' placeholder='Enter Estimated Hour' value='0' readonly >
									<input type='hidden' name='estimated_day'  id='estimated_day' placeholder='Enter Estimated Day' value='0' readonly>
           
           							<center><input type='submit' name='records_add3' value='ADD RECORD' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
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

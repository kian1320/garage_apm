<?php include('../others/sidebar.php');?>
<br>
<div class="row">
    <div class="col-md-12">
    	<div class="card">
        	<div class="card-header">
            	<h3 class="mb-0">Add Record<a href='records_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
        	</div>
    		<div class="card-body">
    			<form action='../../../database/action.php' method='post'>
        			<div class="pl-lg-4">
            			<div class="row">
            				<div class="col-lg-6">
            					<div class="form-group">
					            	<label class="form-control-label" for="input-first-name">Date of Appointment</label><br>
					                <input type='date' name='record_date' placeholder='Enter date' value='<?php echo date('Y-m-d'); ?>' class='form-control'><br><br>
				           		</div>
				            </div>   
				            <div class="col-lg-6">
            					<div class="form-group">
				                	<label class="form-control-label" for="input-first-name">Customer Name</label><br>
									<select name='customer_id' id='customer_id' required class='form-control'>
										<?php
										$query = mysqli_query($con, "SELECT * FROM `customers` ORDER BY `lname` DESC");
										while($customers =mysqli_fetch_array($query)){
											echo "
											<option value='".$customers['id']."'>".strtoupper($customers['lname'])." ".$customers['fname'].",  ".$customers['mname']." </option>
											";
										}
										?>
									</select>
								</div>
							</div>	
				            <div class="col-lg-6">
            					<div class="form-group">		
									<div id='select_vehicle'>
										<label class="form-control-label" for="input-first-name">Vehicle</label><br>
										<select name='vehicle_id' required class='form-control'>
										<?php
										$query = mysqli_query($con, "SELECT * FROM `customers` ORDER BY `lname` DESC");
										$customers =mysqli_fetch_array($query);
										$customer_id = $customers['id'];
										$query = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `customer_id`= '$customer_id'");
										while($vehicles =mysqli_fetch_array($query)){
											echo "
											<option value='".$vehicles['id']."'>".strtoupper($vehicles['model'])." ".$vehicles['type'].",  ".$vehicles['plate_no']." </option>
											";
										}
										?>
										</select>
									</div>
            					</div>
        					</div>

				            <div class="col-lg-12">
            					<div class="form-group">
					            	<input type='hidden' name='estimated_hr' id='estimated_hr' placeholder='Enter Estimated Hour' value='0' readonly >
									<input type='hidden' name='estimated_day'  id='estimated_day' placeholder='Enter Estimated Day' value='0' readonly>
            
            						<center><input type='submit' name='records_add' value='ADD RECORD' class="btn btn-md btn-primary" style="background:#52616B;"></center>
                  				</div>
                			</div>
                		</div>
                	</div>
              	</form>	
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#customer_id').change(function(){
			var customer_id = $(this).val();
			var link = "records_add_vehicle.php?customer_id="+customer_id;

			$.get(link, function(returnData){
				$('#select_vehicle').html(returnData);
			});
		});
	});
</script>

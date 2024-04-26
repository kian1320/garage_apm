<?php include('../others/sidebar.php');?>
<?php

$records_id = $_GET['records_id'];
$query = mysqli_query($con, "SELECT * FROM `records` WHERE `id`= '$records_id'");
$records =mysqli_fetch_array($query);
$customer_id = $records['customer_id'];
?>
<br>
<div class="row">
    <div class="col-md-12">
	    <div class="card">
	        <div class="card-header">
	            <h3 class="mb-0">Update Record<a href='records_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
	        </div>
	    	<div class="card-body">
	    		<form action='../../../database/action.php' method='post'>
	        		<div class="pl-lg-4">
	            		<div class="row">
	            			<div class="col-lg-6">
	            				<div class="form-group">
	                				<label class="form-control-label" for="input-first-name">Date Record</label><br>
	                				<input type='date' name='record_date' placeholder='Enter Date' class='form-control' value='<?php echo $records['record_date']; ?>'>
	                			</div>
	                		</div>

	            			<div class="col-lg-6">
	            				<div class="form-group">
					                <label class="form-control-label" for="input-first-name">Customer Name</label><br>
									<select name='customer_id' id='customer_id' class='form-control' required>
									<?php
									$query = mysqli_query($con, "SELECT * FROM `customers` ORDER BY `lname` DESC");
									while($customers =mysqli_fetch_array($query)){
										echo "
										<option value='".$customers['id']."'  "; if($customers['id'] == $records['customer_id']){echo "SELECTED"; } echo">".strtoupper($customers['lname'])." ".$customers['fname'].",  ".$customers['mname']." </option>
										";
									}
									?>	
									</select>
								</div>
							</div>
	            			<div class="col-lg-6">
	            				<div class="form-group">
									<div id='select_vehicle'>
										<label class="form-control-label" for="input-first-name">Vehicle Name</label><br>
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
							</div>
	            			<div class="col-lg-12">
	            				<div class="form-group">	
						            <input type='hidden' name='estimated_hr' id='estimated_hr' placeholder='Enter Estimated Hour'  value='<?php echo $records['estimated_hr']; ?>' disabled>
									<input type='hidden' name='estimated_day'  id='estimated_day' placeholder='Enter Estimated Day'  value='<?php echo $records['estimated_day']; ?>' disabled>
									<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>
						            
	        						<center><input type='submit' name='record_upd' value='UPDATE RECORD' class="btn btn-md btn-primary" style="background:#52616B;"><input type='submit' name='record_del' value='DELETE RECORD' class="btn btn-md btn-primary" style="background:#52616B;"></center>
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
			
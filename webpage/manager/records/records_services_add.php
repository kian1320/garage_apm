<?php include('../others/sidebar.php');?>
<?php

$records_id = $_GET['records_id'];
$query = mysqli_query($con, "SELECT * FROM `records` WHERE `id`= '$records_id'");
$records =mysqli_fetch_array($query);
$customer_id = $records['customer_id'];
?>
<div class="row">
    <div class="col-md-12">
	    <div class="card">
	        <div class="card-header">
	            <h3 class="mb-0">Add Record Services<a href='records_services_show.php?records_id=<?php echo $records_id; ?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">BACK</button></a></h3>
	        </div>
			<div class="card-body">
			    <form action='../../../database/action.php' method='post'>
			        <div class="pl-lg-4">
			            <div class="row">
				            <div class="col-lg-6">
					            <div class="form-group">
					            	<label class="form-control-label" for="input-first-name">SERVICES</label><br>
									<?php
									$query = mysqli_query($con, "SELECT * FROM `services` ORDER BY `service_name` DESC");
									while($services =mysqli_fetch_array($query)){
										echo "
										<b><ul><input type='checkbox' class='serv_checkbox' name='serv".$services['id']."' value='".$services['id']."' > ".strtoupper($services['service_name'])."</ul></b>
										";
									}
									?>
								</div>

								<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>
								<input type='submit' name='record_services_add' value='ADD SERVICES INTO RECORD' class="btn btn-lg btn-primary" style="background:#52616B;">
							</div>
				            <div class="col-lg-6">
								<div id='products_list' style='overflow: auto;height:5;'></div>
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
	$('.serv_checkbox').click(function(){

		var check = $(this).prop('checked');
		var service_id = $(this).val();
		if(check == true){
			var link = "records_add_products.php?service_id="+service_id;

			$.get(link, function(returnData){
				$('#products_list').append(returnData);
			});
			
		}else{
			$('.app_add_prod'+service_id).remove();
		}
	});
});

</script>
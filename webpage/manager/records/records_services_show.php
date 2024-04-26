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
      	<div class="card-header border-0">
			<h3 class="mb-0">Records<a href='records_show.php?records_id=<?php echo $records_id?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">back</button></a><a href='records_services_add.php?records_id=<?php echo $records_id;?>'style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;" type="button">Add Service to record</button></a></h3>
      	</div>
      	<div class="card-body">

		<?php
		$query = mysqli_query($con, "SELECT * FROM `record_services` WHERE `record_id`= '$records_id'");
		if(mysqli_num_rows($query)){
		?>	
		<div class="table-responsive">
		    <table class="datatable table align-items-center table-flush">
		        <thead class="thead-light">
		            <tr>
		              <th scope="col" class="sort">Service</th>
		              <th scope="col" class="sort">Estimated Time</th>
		              <th scope="col" class="sort">Status</th>
		              <th scope="col"></th>
		            </tr>
		        </thead>
		        <tbody class="list">
				<?php
				while($rs =mysqli_fetch_array($query)){
					$rs_id = $rs['id'];
					$services_id = $rs['service_id'];
					$query2 = mysqli_query($con, "SELECT * FROM `services` WHERE `id`= '$services_id'");
					$services = mysqli_fetch_array($query2);
					
					$mechanic_name = "";
					$mechanic_id= $rs['mechanic_id'];
					$query3 = mysqli_query($con, "SELECT * FROM `mechanics` WHERE `id`= '$mechanic_id'");
					$mechanics = mysqli_fetch_array($query3);
					if(mysqli_num_rows($query3)){
						$mechanic_name = $mechanics['fullname'];
					}
					echo "
					<tr>
						<td>".$services['service_name']." </td>
						<td>".$services['estimated_hr']."hr ".$services['estimated_day']."day </td>
						<td><a href='records_services_upd.php?rs_id=".$rs['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'>".record_service_status($rs['status'])."</button></a><br>".$mechanic_name."</td>
						<td><a href='records_services_del.php?rs_id=".$rs['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'><i class='fas fa-trash'></i></button></a></td>
					</tr>
					";

					$query3 = mysqli_query($con, "SELECT * FROM `record_products` WHERE `rs_id`='$rs_id' ");			
					if(mysqli_num_rows($query3)){
						while($rp =mysqli_fetch_array($query3)){
							$prod_id = $rp['product_id'];

							$query4 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`='$prod_id'");
							$prod = mysqli_fetch_array($query4);	
							$color="";
							if($prod['quantity']<=0){

								$color="#C9D6DF";
							}
							echo "
							<tr style='background-color:".$color.";'>
								<td colspan='4' style='padding-left:50px;'>".$prod['product_name']." (".$prod['quantity'].") ".$rp['quantity']."x <a href='records_products_upd.php?rp_id=".$rp['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'><i class='fas fa-edit'></i></button></a></td>
							</tr>
							";
						}	
					}
				}
				?>
			</table>

			<h3 class="mb-0">Other Products<a href='records_products_add.php?records_id=<?php echo $records_id;?>'style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;" type="button">Add Other Products</button></a></h3>
			<table class="table align-items-center table-flush">
		        <thead class="thead-light">
		            <tr>
		              <th scope="col" class="sort">Product</th>
		              <th scope="col" class="sort">Qty</th>
		              <th scope="col"></th>
		            </tr>
		        </thead>
		        <tbody class="list">
		        	<?php
					$query3 = mysqli_query($con, "SELECT * FROM `record_products` WHERE `rs_id`='0' ");			
					if(mysqli_num_rows($query3)){
						while($rp =mysqli_fetch_array($query3)){
							$prod_id = $rp['product_id'];

							$query4 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`='$prod_id'");
							$prod = mysqli_fetch_array($query4);	
							
							$color="";
							if($prod['quantity']<=0){

							$color="red";
							}
							echo "
							<tr style='background-color:".$color.";'>
								<td style='padding-left:50px;'>".$prod['product_name']." </td>
								<td>".$rp['quantity']."</td>
								<td><a href='records_products_upd.php?rp_id=".$rp['id']."'><button button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'><i class='fas fa-edit'></i></button></a></td>
							</tr>
							";
						}	
					}
		        	?>
		        </tbody>
		    </table>
		</div>
		<?php
		}
		?>
  	</div>
    </div>
  </div>
</div>
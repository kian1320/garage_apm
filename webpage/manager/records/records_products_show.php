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
            <h3 class="mb-0">Update Record<a href='records_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
        </div>
    </div>

    <div class="card-body">
    <form action='../../../database/action.php' method='post'>
        <div class="pl-lg-4">
            <div class="row">
            	<div class="col-lg-6">
            	<div class="form-group">
                <label class="form-control-label" for="input-first-name">Date Record</label><br>
                <input type='date' name='record_date' placeholder='Enter Date' value='<?php echo $records['record_date']; ?>'><br><br>
                <label class="form-control-label" for="input-first-name">Customer Name</label><br>
				<select name='customer_id' id='customer_id' required>
				<?php
				$query = mysqli_query($con, "SELECT * FROM `customers` ORDER BY `lname` DESC");
				while($customers =mysqli_fetch_array($query)){
					echo "
					<option value='".$customers['id']."'  "; if($customers['id'] == $records['customer_id']){echo "SELECTED"; } echo">".strtoupper($customers['lname'])." ".$customers['fname'].",  ".$customers['mname']." </option>
					";
				}
				?>	
				</select><br><br>
				<div id='select_vehicle'>
				<label class="form-control-label" for="input-first-name">Vehicle Name</label><br>
				<select name='vehicle_id' required>
				<?php
				$query = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `customer_id`= '$customer_id'");
				while($vehicles =mysqli_fetch_array($query)){
					echo "
					<option value='".$vehicles['id']."'  "; if($vehicles['id'] == $records['vehicle_id']){echo "SELECTED"; } echo">".strtoupper($vehicles['model'])." ".$vehicles['type'].",  ".$vehicles['plate_no']." </option>
					";
				}
				?>
				</select>
				</div><br>
            </div>
            </div>
            <input type='hidden' name='estimated_hr' id='estimated_hr' placeholder='Enter Estimated Hour'  value='<?php echo $records['estimated_hr']; ?>' disabled><br>
			<input type='hidden' name='estimated_day'  id='estimated_day' placeholder='Enter Estimated Day'  value='<?php echo $records['estimated_day']; ?>' disabled><br>
			<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>
            </div>
            <br>
            <center><input type='submit' name='record_upd' value='UPDATE RECORD' class="btn btn-lg btn-primary" style="background:#52616B;"><input type='submit' name='record_del' value='DELETE RECORD' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
        </div>
<hr class="my-4" />

<center><a href='records_services_add.php?records_id=<?php echo $records_id;?>'><button class="btn btn-lg btn-primary" style="background:#52616B;" type="button">Add Service</button></a>

<a href='records_products_add.php?records_id=<?php echo $records_id;?>'><button class="btn btn-lg btn-primary" style="background:#52616B;" type="button">Add Product</button></a></center>
<br>
<?php
$query = mysqli_query($con, "SELECT * FROM `record_services` WHERE `record_id`= '$records_id'");
if(mysqli_num_rows($query)){
?>	
<div class="table-responsive">
            <table class="table align-items-center table-flush">
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

			echo "
			<tr>
				<td>".$services['service_name']." </td>
				<td>".$services['estimated_hr']."hr ".$services['estimated_day']."day </td>
				<td><a href='records_services_upd.php?rs_id=".$rs['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'>".record_service_status($rs['status'])."</button></a></td>
				<td><a href='records_services_del.php?rs_id=".$rs['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'>REMOVE</button></a></td>
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
						<td style='padding-left:50px;'>".$prod['product_name']." (".$prod['quantity'].")</td>
						<td>".$rp['quantity']."</td>
						<td></td>
						<td><a href='records_products_upd.php?rp_id=".$rp['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'>UPDATE</button></a></td>
					</tr>
					";
				}	
			}
		}

		$query3 = mysqli_query($con, "SELECT * FROM `record_products` WHERE `rs_id`='0' ");			
		if(mysqli_num_rows($query3)){
			echo "
			<tr>
				<td colspan='4'>Other Products</td>
			</tr>
			";
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
					<td></td>
					<td><a href='records_products_upd.php?rp_id=".$rp['id']."'><button button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'>UPDATE</button></a></td>
				</tr>
				";
			}	
		}
		?>


	</table>
<hr>
<b>STATUS: </b><?php echo record_status($records['status']);?>

<form action='../../../database/action.php' method='post'>
<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>
<?php
	if($records['status']==0){
		echo "	
		<input type='hidden' name='status' value='1'>
		<input type='hidden' name='official_receipt'value=''>
		<input type='submit' name='record_status_upd' value='START' button class='btn btn-md btn-primary' style='background:#52616B;' type='button'>";
	}
	if($records['status']==1){
		echo "
		<input type='hidden' name='official_receipt'value=''>
		<input type='hidden' name='status' value='3'>
		<input type='submit' name='record_status_upd' value='CANCEL' button class='btn btn-md btn-primary' style='background:#52616B;' type='button'>";

		$query = mysqli_query($con, "SELECT * FROM `record_services` WHERE `record_id`= '$records_id' AND `status`=0 ");

		if(mysqli_num_rows($query)==0){
			echo "
			<input type='hidden' name='status' value='2'>
			<input type='text' name='official_receipt' placeholder='Please Enter OR Number'>
			<input type='submit' name='record_status_upd' value='FINISH' button class='btn btn-md btn-primary' style='background:#52616B;' type='button'>";
		}
	}
	if($records['status']==2){
		echo "
		<input type='hidden' name='status' value='3'>
		<input type='hidden' name='official_receipt'value=''>
		<input type='submit' name='record_status_upd' value='CANCEL' button class='btn btn-md btn-primary' style='background:#52616B;' type='button'>";
	}
	if($records['status']==3){
		echo "
		<input type='hidden' name='status' value='1'>
		<input type='hidden' name='official_receipt'value=''>
		<input type='submit' name='record_status_upd' value='RESUME' button class='btn btn-md btn-primary' style='background:#52616B;' type='button'>";
	}
?>
</form>
<?php
}
?>
<?php
include('../../../database/conn.php');?>
<?php

$service_id = $_GET['service_id'];
$query = mysqli_query($con, "SELECT * FROM `services` WHERE `id`= '$service_id'");
$services =mysqli_fetch_array($query);

$query2 = mysqli_query($con, "SELECT * FROM `services_products` WHERE `service_id`= '$service_id'");
?>

<h2 class='app_add_prod<?php echo $service_id; ?>'><?php echo strtoupper($services['service_name']); ?></h2>
<hr class='app_add_prod<?php echo $service_id; ?>'>

<?php
if(mysqli_num_rows($query2)){
	while($sp =mysqli_fetch_array($query2)){
		$product_id = $sp['product_id'];
		$query3 = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$product_id'");
		$products = mysqli_fetch_array($query3);

		echo "
		<label class='app_add_prod".$service_id."'>".strtoupper($products['product_name'])." ".$products['brand']." - ".$products['type']." (".$products['quantity'].")</label>
		<input name='quantity".$sp['id']."' value='".$sp['quantity']."' class='app_add_prod".$service_id."'>
		<br>
		";
	}
}else{
	echo "<i class='app_add_prod".$service_id."'>No additional product needed</i>";
}
?>
<br>
	
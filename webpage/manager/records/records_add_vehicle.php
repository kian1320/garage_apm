<?php
include('../../../database/conn.php');
?>
<label class="form-control-label" for="input-first-name">Vehicle</label><br>
<select name='vehicle_id' required class='form-control'>
<?php
$customer_id = $_GET['customer_id'];
$query = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `customer_id`= '$customer_id'");
while($vehicles =mysqli_fetch_array($query)){
	echo "
	<option value='".$vehicles['id']."'>".strtoupper($vehicles['model'])." ".$vehicles['type'].",  ".$vehicles['plate_no']." </option>
	";
}
?>
</select>
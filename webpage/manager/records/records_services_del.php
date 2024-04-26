<?php include('../others/sidebar.php');?>
<?php

$rs_id = $_GET['rs_id'];
$query = mysqli_query($con, "SELECT * FROM `record_services` WHERE `id`= '$rs_id'");
$rs =mysqli_fetch_array($query);


$records_id = $rs['record_id'];
$query2 = mysqli_query($con, "SELECT * FROM `records` WHERE `id`= '$records_id'");
$records =mysqli_fetch_array($query2);
$customer_id = $records['customer_id'];
?>
<a href='records_upd.php?records_id=<?php echo $records_id?>'><button>back</button></a>
<form action='../../../database/action.php' method='post'>
	Are you sure you want to delete?

	<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>
	<input type='hidden' name='rs_id' value='<?php echo $rs_id ?>'>
	<input type='submit' name='record_services_del' value='DELETE record'>
</form>

<?php include('../others/sidebar.php');?>
<?php
$rs_id = $_GET['rs_id'];
$query = mysqli_query($con, "SELECT * FROM `record_services` WHERE `id`= '$rs_id'");
$rs =mysqli_fetch_array($query);


$records_id = $rs['record_id'];
$query2 = mysqli_query($con, "SELECT * FROM `records` WHERE `id`= '$records_id'");
$records =mysqli_fetch_array($query2);
?>
<br>
<div class="row">
    <div class="col">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Update Mechanic<a href='records_upd.php?records_id=<?php echo $records_id?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">BACK</button></a></h3>
        </div>
   	</div>

<form action='../../../database/action.php' method='post'>
        <div class="pl-lg-4">
            <div class="row">
            <div class="col-lg-6">
            <div class="form-group">
               <label class="form-control-label" for="input-first-name">Choose Mechanic</label><br>
	
				<select name='mechanic_id' required>
				<?php
				$query = mysqli_query($con, "SELECT * FROM `mechanics` ORDER BY `fullname` ASC");
				while($mechanics =mysqli_fetch_array($query)){
					echo "
					<option value='".$mechanics['id']."'  "; if($mechanics['id'] == $rs['mechanic_id']){echo "SELECTED"; } echo">".strtoupper($mechanics['nickname'])." ".$mechanics['fullname']." </option>
					";
				}
				?>
				
				</select><br><br>
	<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>
	<input type='hidden' name='rs_id' value='<?php echo $rs_id ?>'>

<?php
	if($rs['status']==0){
?>

	<input type='hidden' name='status' value='1'>
	<input type='hidden' name='date_finished' value='<?php echo date('Y-m-d'); ?>'>
	<input type='submit' name='record_services_upd' value='DONE' class='btn btn-lg btn-primary' style='background:#52616B;'>

<?php
	}if($rs['status']==1){
?>

	<input type='hidden' name='mechanic_id' value='0'>
	<input type='hidden' name='status' value='0'>
	<input type='hidden' name='date_finished' value='<?php echo '0000-00-00' ?>'>
<input type='submit' name='record_services_upd' value='CANCEL' class='btn btn-lg btn-primary' style='background:#52616B;'>
<?php
	}
?>
</form>
</div>
</div>

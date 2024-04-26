<?php include('../others/sidebar.php');?>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header border-0">
          <h3 class="mb-0">Customer Record/s<a href='customers_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a><a href='records_add.php?customers_id=<?php echo $_GET['customers_id']; ?>' style="float:right;">
          <button class="btn btn-sm btn-primary" style="background:#52616B;">Add Customer Record</button></a></h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php
        $customer_id = $_GET['customers_id'];
        $query = mysqli_query($con, "SELECT * FROM `records` WHERE `customer_id`= '$customer_id' ORDER BY `date_added` DESC");
        if(mysqli_num_rows($query)){
        ?>
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort">Date</th>
                <th scope="col" class="sort">Vehicle</th>
                <th scope="col" class="sort">Start Date</th>
                <th scope="col" class="sort">End Date</th>
                <th scope="col" class="sort">Estimated Time</th>
                <th scope="col" class="sort">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
        		<?php
        		while($records =mysqli_fetch_array($query)){
        			$vehicle_id = $records['vehicle_id'];

        			$query3 = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `id`='$vehicle_id'");
        			$vehicles = mysqli_fetch_array($query3);
              $start_date = '-';
              $end_date = '-';
              if($records['start_date']!='0000-00-00'){
                $start_date = $records['start_date'];
              }
              if($records['end_date']!='0000-00-00'){
                $end_date = $records['end_date'];
              }
        			echo "
        			<tr>
        				<td>".date('M d, Y', strtotime($records['record_date']))."</td>
        				<td>".$vehicles['model']." ".strtoupper($vehicles['type'])." ".$vehicles['plate_no']."</td>
        				<td style='text-align:center;'>".$start_date."</td>
        				<td style='text-align:center;'>".$end_date."</td>
        				<td>".$records['estimated_hr']."hr ".$records['estimated_day']." day</td>
        				<td>".record_status($records['status'])."</td>
        				<td><a href='records_upd.php?records_id=".$records['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-edit'></i></button></a></td>
        			</tr>
        			";
        		}
        		?>
        	 </tbody>
    	    </table>
        <?php
        }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('../others/footer.php');?>

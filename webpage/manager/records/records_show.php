<?php include('../others/sidebar.php');?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header border-0">
          <h3 class="mb-0">Records<a href='records_add.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;"> Add New Record</button></a></h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <?php
          $query = mysqli_query($con, "SELECT * FROM `records` ORDER BY `date_added` DESC");
          if(mysqli_num_rows($query)){
          ?>
         <table class="datatable table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Date of Appointment</th>
                  <th scope="col" class="sort">Customer</th>
                  <th scope="col" class="sort">Vehicle</th>
                  <th scope="col" class="sort">Start Date</th>
                  <th scope="col" class="sort">End Date</th>
                  <th scope="col" class="sort">Estimated Hour</th>
                  <th scope="col" class="sort">Status</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">  
        		<?php
        		while($records =mysqli_fetch_array($query)){
        			$customer_id = $records['customer_id'];
        			$vehicle_id = $records['vehicle_id'];
              $records_id = $records['id'];

        			$query2 = mysqli_query($con, "SELECT * FROM `customers` WHERE `id`='$customer_id'");
        			$customers = mysqli_fetch_array($query2);

        			$query3 = mysqli_query($con, "SELECT * FROM `vehicles` WHERE `id`='$vehicle_id'");
        			$vehicles = mysqli_fetch_array($query3);

              $start_date = '-';
              if($records['start_date']!='0000-00-00'){
                $start_date = date('M d, Y', strtotime($records['start_date']));
              }
              $end_date = '-';
              if($records['end_date']!='0000-00-00'){
                $end_date = "<b>OR:".$records['official_receipt']."</b><br>".date('M d, Y', strtotime($records['end_date']));
              }
        			echo "
        			<tr>
        				<td>".date('M d, Y', strtotime($records['record_date']))."</td>
        				<td>".strtoupper($customers['lname']).", ".$customers['fname']." ".$customers['mname']."</td>
        				<td>".$vehicles['model']." ".$vehicles['type']." ".$vehicles['plate_no']."</td>
        				<td>".$start_date."</td>
        				<td>".$end_date."</td>
        				<td>".$records['estimated_hr']."hr ".$records['estimated_day']." day</td>
        				<td>".record_status($records['status'])."</td>
        				<td><a href='records_upd.php?records_id=".$records['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-edit'></i></button></a>
                  <a href='records_services_show.php?records_id=".$records['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-tools'></i></button></a>
                </td>
                <td>";
                if($records['status']==0){
                  echo " 
                  <form action='../../../database/action.php' method='post'>
                    <input type='hidden' name='record_id' value='".$records_id."'>
                    <input type='hidden' name='status' value='1'>
                    <input type='hidden' name='official_receipt'value=''>
                    <input type='submit' name='record_status_upd' value='ACCEPT' button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'>
                    <input type='submit' name='record_status_del' value='DELETE' button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'>
                  </form>
                  ";
                }

                if($records['status']==1){
                  echo "  
                  <form action='../../../database/action.php' method='post'>
                    <input type='hidden' name='record_id' value='".$records_id."'>
                    <input type='hidden' name='status' value='2'>
                    <input type='hidden' name='official_receipt'value='' required>
                    <input type='submit' name='record_status_upd' value='START' button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'></form>";
                }
                if($records['status']==2){
                  $query4 = mysqli_query($con, "SELECT * FROM `record_services` WHERE `record_id`= '$records_id' AND `status`= 2 ");

                  if(mysqli_num_rows($query4)==0){
                    echo "
                    <form action='../../../database/action.php' method='post'>
                      <input type='hidden' name='record_id' value='".$records_id."'>
                      <input type='hidden' name='status' value='3'>
                      <input type='text' name='official_receipt' placeholder='Please Enter OR Number'>
                      <input type='submit' name='record_status_upd' value='FINISH' button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'></form>";
                  }
                  echo "
                  <form action='../../../database/action.php' method='post'>
                    <input type='hidden' name='official_receipt' value=''>
                    <input type='hidden' name='status' value='4'>
                    <input type='hidden' name='record_id' value='".$records_id."'>
                    <input type='submit' name='record_status_upd' value='CANCEL' button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'></form>";
                }
                if($records['status']==3){
                  echo "
                  <form action='../../../database/action.php' method='post'>
                    <input type='hidden' name='record_id' value='".$records_id."'>
                    <input type='hidden' name='status' value='4'>
                    <input type='hidden' name='official_receipt'value=''>
                    <input type='submit' name='record_status_upd' value='CANCEL' button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'></form>";
                }
                if($records['status']==4){
                  echo "
                  <form action='../../../database/action.php' method='post'>
                    <input type='hidden' name='record_id' value='".$records_id."'>
                    <input type='hidden' name='status' value='1'>
                    <input type='hidden' name='official_receipt'value=''>
                    <input type='submit' name='record_status_upd' value='RESUME' button class='btn btn-sm btn-primary' style='background:#52616B;' type='button'></form>";
                }
              echo "  
                </td>
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
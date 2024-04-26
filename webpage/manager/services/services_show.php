<?php include('../others/sidebar.php');?>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header border-0">
          <h3 class="mb-0">Services<a href='services_add.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Add Services</button></a></h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php
        $query = mysqli_query($con, "SELECT * FROM `services`");
        if(mysqli_num_rows($query)){
        ?>
          <table class="datatable table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Name</th>
                  <th scope="col" class="sort">Estimated Hour</th>
                  <th scope="col" class="sort">Estimated Day</th>
                  <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">
        		<?php
        		while($services =mysqli_fetch_array($query)){
        			echo "
        			<tr>
        				<td>".strtoupper($services['service_name'])."</td>
        				<td styl>".$services['estimated_hr']." hr/s</td>
        				<td>".$services['estimated_day']." day/s</td>
        				<td><a href='services_upd.php?services_id=".$services['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-edit'></i></button></a>
                <a href='services_products_show.php?services_id=".$services['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-tools'></i></button></a><a href='services_symptoms_show.php?services_id=".$services['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-stethoscope'></i></button></a></td>
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

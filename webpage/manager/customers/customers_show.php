<?php include('../others/sidebar.php');?>
<br>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header border-0">
          <h3 class="mb-0">Customers List<a href='customers_add.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Add Customer</button></a></h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php
        $query = mysqli_query($con, "SELECT * FROM `customers` ORDER BY lname ASC");
        if(mysqli_num_rows($query)){
        ?>
          <table class="datatable table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Name</th>
                  <th scope="col" class="sort" data-sort="contact">Contact</th>
                  <th scope="col" class="sort" data-sort="address">Address</th>
                  <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">         
        			<?php
        			while($customers =mysqli_fetch_array($query)){
          			echo "
          			<tr>
          				<td>".strtoupper($customers['lname']).", ".ucwords($customers['fname'])." ".ucwords($customers['mname'])."</td>
          				<td>".$customers['contact']."</td>
          				<td>".$customers['address']."</td>
          				<td>
                    <a href='customers_upd.php?customers_id=".$customers['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa fa-edit'></i></button></a>
                    <a href='customers_vehicle.php?customers_id=".$customers['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa fa-motorcycle'></i></button></a>
                    <a href='records_show.php?customers_id=".$customers['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa fa-clipboard-list'></i></button></a>
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
<?php include('../others/footer.php');?>
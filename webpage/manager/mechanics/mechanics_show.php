<?php include('../others/sidebar.php');?>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header border-0">
          <h3 class="mb-0">Mechanics<a href='mechanics_add.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Add Mechanics</button></a></h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php
        $query = mysqli_query($con, "SELECT * FROM `mechanics` ");
        if(mysqli_num_rows($query)){
        ?>
          <table class="datatable table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="fullname">Full Name</th>
                <th scope="col" class="sort" data-sort="nickname">Nick name</th>
                
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
        		<?php
        		while($mechanics =mysqli_fetch_array($query)){
        			echo "
        			<tr>
        				<td>".$mechanics['fullname']."</td>
                <td>".$mechanics['nickname']."</td>
        				
        				<td><a href='mechanics_upd.php?mechanics_id=".$mechanics['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-edit'></i></button></a>
                    
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
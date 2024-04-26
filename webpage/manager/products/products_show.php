<?php include('../others/sidebar.php');?>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header border-0">
          <h3 class="mb-0">Products<a href='products_add.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Add Product</button></a></h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <?php
        $query = mysqli_query($con, "SELECT * FROM `products` ");
        if(mysqli_num_rows($query)){
        ?>
          <table class="datatable table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">Name</th>
                <th scope="col" class="sort" data-sort="name">Code</th>
                <th scope="col" class="sort" data-sort="brand">Brand</th>
                <th scope="col" class="sort" data-sort="type">Type</th>
                <th scope="col" class="sort" data-sort="quantity">Quantity</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
        		<?php
        		while($products =mysqli_fetch_array($query)){
        			echo "
        			<tr>
        				<td>".$products['product_name']."</td>
                <td>".$products['product_code']."</td>
        				<td>".$products['brand']."</td>
        				<td>".$products['type']."</td>
        				<td>".$products['quantity']."</td>
        				<td><a href='products_upd.php?products_id=".$products['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-edit'></i></button></a>
                    <a href='products_stocks_upd.php?products_id=".$products['id']."'><button class='btn btn-sm btn-primary' style='background:#52616B;'><i class='fas fa-plus-circle'></i></button></a></td>
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
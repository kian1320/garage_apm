<?php include('../others/sidebar.php');?>
<?php

$records_id = $_GET['records_id'];
$query = mysqli_query($con, "SELECT * FROM `records` WHERE `id`= '$records_id'");
$records =mysqli_fetch_array($query);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Add Record Products<a href='records_services_show.php?records_id=<?php echo $records_id?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                	<label class="form-control-label" for="input-first-name">PRODUCTS</label><br>
                            		<select name='product_id' required class='form-control'>
                            		<?php
                            		$query = mysqli_query($con, "SELECT * FROM `products`");
                            		while($products =mysqli_fetch_array($query)){
                            			echo "
                            			<option value='".$products['id']."'>".strtoupper($products['product_name'])." ".$products['brand']." - ".$products['type']." (".$products['quantity'].")</option>
                            			";
                            		}
                            		?>
                            		</select>
                                </div>
                            </div>
                        	<div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Quantity</label>
                                    <input type="number" id="input-first-name" class="form-control" placeholder="Enter quantity" name="quantity">
                                </div>
                           </div>
                           <div class="col-lg-12">
                                <div class="form-group">
                                	<input type='hidden' name='record_id' value='<?php echo $records_id ?>'>
                                	<center><input type='submit' name='record_products_add' value='ADD PRODUCTS INTO RECORD' class="btn btn-md btn-primary" style="background:#52616B;"></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
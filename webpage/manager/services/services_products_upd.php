<?php include('../others/sidebar.php');?>
<?php
$sp_id = $_GET['sp_id'];
$query = mysqli_query($con, "SELECT * FROM `services_products` WHERE `id`='$sp_id' ");
$sp = mysqli_fetch_array($query);
$product_id = $sp['product_id'];
$service_id = $sp['service_id'];
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Update Service to Product<a href='services_products_show.php?services_id=<?php echo $service_id; ?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
        	        <h6 class="heading-small text-muted mb-4">Product information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                	                <label class="form-control-label" for="input-first-name">Products</label><br>
                                    <select name='product_id' class='form-control' required readonly>
                    					<?php
                    					$query = mysqli_query($con, "SELECT * FROM `products`");
                    					while($products =mysqli_fetch_array($query)){
                    						echo "
                    						<option value='".$products['id']."' "; if($products['id'] == $sp['product_id']){echo "SELECTED"; } echo">".strtoupper($products['product_name'])." ".$products['brand']." - ".$products['type']." (".$products['quantity'].")</option>
                    						";
                    					}
                    					?>
    			                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">    
                                    <label class="form-control-label" for="input-last-name">Quantity</label>
                                    <input type="number" id="input-last-name" class="form-control" placeholder="Enter quantity" name="quantity" value='<?php echo $sp['quantity']?>'>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">    
                                    <input type='hidden' name='service_id' value='<?php echo $service_id ?>'>
                        			<input type='hidden' name='sp_id' value='<?php echo $sp_id ?>'>
                                    <center><input type='submit' name='services_products_upd' value='UPDATE PRODUCT/s TO SERVICE' class="btn btn-md btn-primary" style="background:#52616B;"><input type='submit' name='services_products_del' value='REMOVE PRODUCT/s TO SERVICE' class="btn btn-md btn-primary" style="background:#52616B;"></center>
                
                                </div>
                            </div>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
      
<?php include('../others/footer.php');?>
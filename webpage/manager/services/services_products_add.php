<?php include('../others/sidebar.php');?>
<?php
$services_id = $_GET['services_id'];
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Add Product to Service<a href='services_products_show.php?services_id=<?php echo $services_id; ?>' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
        	        <h6 class="heading-small text-muted mb-4">Product to Service Information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Products</label><br>
                                    <select name='product_id' class="form-control" required>
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
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter quantity" name="quantity">
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type='hidden' name='service_id' value='<?php echo $services_id ?>'>
                                    <center><input type='submit' name='services_products_add' value='ADD PRODUCT/s TO SERVICE' class="btn btn-md btn-primary" style="background:#52616B;"></center>
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
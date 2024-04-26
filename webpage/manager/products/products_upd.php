<?php include('../others/sidebar.php');?>
<?php
$products_id = $_GET['products_id'];
$query = mysqli_query($con, "SELECT * FROM `products` WHERE `id`= '$products_id'");
$products =mysqli_fetch_array($query);
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Update Product<a href='products_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
    	            <h6 class="heading-small text-muted mb-4">Product information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Product</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter product" name="product_name" value='<?php echo $products['product_name'] ?>'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Brand</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter brand" name="brand" value='<?php echo $products['brand'] ?>'>
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Code</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter code" name="product_code" value='<?php echo $products['product_code'] ?>'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Type</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Enter type" name="type" value='<?php echo $products['type'] ?>'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Quantity</label>
                                    <input type="number" id="input-last-name" class="form-control" placeholder="Enter quantity" name="quantity" value='<?php echo $products['quantity'] ?>'>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type='hidden' name='products_id' value='<?php echo $products_id ?>'>
                                    <center><input type='submit' name='product_upd' value='UPDATE PRODUCT' class="btn btn-lg btn-primary" style="background:#52616B;"><input type='submit' name='product_del' value='DELETE PRODUCT' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
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
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
                                    <label class="form-control-label" for="input-last-name">Stock</label>
                                    <input type="number" id="input-last-name" class="form-control" placeholder="Add Stock" name="stock" required autofocus>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type='hidden' name='products_id' value='<?php echo $products_id ?>'>
                                    <center><input type='submit' name='product_stock_add' value='ADD STOCK TO PRODUCT' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
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
<?php include('../others/sidebar.php');?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">Add Product<a href='products_show.php' style="float:right;"><button class="btn btn-sm btn-primary" style="background:#52616B;">Back</button></a></h3>
            </div>
            <div class="card-body">
                <form action='../../../database/action.php' method='post'>
                    <h6 class="heading-small text-muted mb-4">Product information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Product name</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter product name" name="product_name"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Product Code</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter product code" name="product_code"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Brand</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Enter brand" name="brand" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Type</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Enter type" name="type" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Quantity</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Enter quantity" name="quantity" required>
                                </div>
                            </div> 
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <center><input type='submit' name='product_add' value='ADD PRODUCT' class="btn btn-lg btn-primary" style="background:#52616B;"></center>
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
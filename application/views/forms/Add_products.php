<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css"/>

<?= isset($errors); ?>
<form method="post" action="<?= site_url('masters/products/save') ?>" enctype="multipart/form-data">
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="cate_id">Product Category <sup class="text-danger">*</sup></label>
        <select name="cate_id" id="cate_id" placeholder="Category" class="form-control select2" required>
            <option value="">Select Category</option>
            <?php 
                if($category){
                    foreach ($category as $value) {
                    ?>
                       <option value="<?= $value->id; ?>"><?= $value->category_name; ?></option>
                    <?php 
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="product_name">Product Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="product_name" placeholder="Variation Name" name="product_name" required>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="descriptions">Description</label>
        <input type="text" class="form-control" id="descriptions" placeholder="Description" name="descriptions">
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="manufacture">Manufacturer</label>
        <input type="text" class="form-control" id="manufacture" placeholder="Manufacturer" name="manufacture">
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="price">Price <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="price" placeholder="Price" name="price" required>
    </div>
    <div class="form-actions col-md-12">
        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
    </div>
</form>

<!-- Select2 JavaScript -->
<script src="<?= site_url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script>
    /* Select2 Init*/
    $(".select2").select2();
</script>
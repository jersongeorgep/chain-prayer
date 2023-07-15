<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css"/>
<?= isset($errors); ?>
<form method="post" action="<?= site_url('masters/variations/update/'.$variation->variation_id); ?>" enctype="multipart/form-data">
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="state">Category <sup class="text-danger">*</sup></label>
        <select name="category_id" id="category_id" placeholder="Category" class="form-control select2" required>
            <option value="">Select Category</option>
            <?php 
                if($category){
                    foreach ($category as $value) {
                    ?>
                       <option value="<?= $value->id; ?>" <?=(($variation->category_id == $value->id)? 'selected' : ''); ?> ><?= $value->category_name; ?></option>
                    <?php 
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="variation_item">Variation Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="variation_item" placeholder="Variation Name" name="variation_item" required value="<?= $variation->variation_item; ?>">
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
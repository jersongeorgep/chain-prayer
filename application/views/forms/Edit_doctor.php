<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css"/>

<?= isset($errors); ?>
<form method="post" action="<?= site_url('masters/doctors/update/'. $doctor->id); ?>" enctype="multipart/form-data">
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="salute">Salute</label>
        <select name="salute" id="salute" placeholder="Salute" class="form-control select2" >
            <?php 
                if($salute){
                    foreach ($salute as $value) {
                    ?>
                       <option value="<?= $value; ?>" <?=(($doctor->salute==$value)?"selected":""); ?> ><?= $value; ?></option>
                    <?php 
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="variation_item">Doctor Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="name" placeholder="Doctor Name" name="name" required value="<?=$doctor->name ?>">
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="degree">Degree</label>
        <select name="degree" id="degree" placeholder="Degree" class="form-control select2" >
            <option value="">Select Degree</option>
            <?php 
                if($degree){
                    foreach ($degree as $value) {
                    ?>
                       <option value="<?= $value; ?>" <?=(($doctor->degree==$value)?"selected":""); ?>><?= $value; ?></option>
                    <?php 
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="contact">Contact Number</label>
        <input type="text" class="form-control" id="contact" placeholder="Doctor Name" name="contact" value="<?= $doctor->contact; ?>" >
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="email">E-mail </label>
        <input type="text" class="form-control" id="email" placeholder="Doctor Name" name="email" value="<?= $doctor->email; ?>" >
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
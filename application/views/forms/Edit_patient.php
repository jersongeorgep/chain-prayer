<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css"/>

<?= isset($errors); ?>
<form method="post" action="<?= site_url('masters/patients/update/'.$patient->id) ?>" enctype="multipart/form-data">
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="patients_name">Patient Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="patients_name" placeholder="Patient Name" name="patients_name" required value="<?= $patient->patients_name; ?>">
    </div>
    <div class="form-group col-md-3">
        <label class="control-label mt-10" for="age">Age <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="age" placeholder="Age" name="age" required value="<?= $patient->age; ?>">
    </div>
    <div class="form-group col-md-3">
        <label class="control-label mt-10" for="variation_item">Gender <sup class="text-danger">*</sup></label>
        <div class="radio radio-info">
            <input type="radio" name="gender" id="male" value="Male" <?= (($patient->gender =='Male')? "checked" : ""); ?> >
            <label for="male"> Male </label> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" id="female" value="Female" <?= (($patient->gender =='Female')? "checked" : ""); ?> >
            <label for="female"> Female </label>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="address">Address</label>
        <textarea class="form-control" id="address" placeholder="Address" name="address" rows="5" ><?= $patient->address; ?></textarea>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="mobile">Mobile</label>
        <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="<?= $patient->mobile; ?>" >
    </div>
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="email">E-mail </label>
        <input type="text" class="form-control" id="email" placeholder="E-mail" name="email" value="<?= $patient->email; ?>" >
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
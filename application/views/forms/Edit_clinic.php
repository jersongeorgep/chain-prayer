<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css');?>" rel="stylesheet" type="text/css"/>
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css"/>

<?= isset($errors); ?>
<form method="post" action="<?= site_url('masters/clinics/update/'.$clinic->id) ?>" enctype="multipart/form-data">
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="doctor_name">Doctor Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="doctor_name" placeholder="Doctor Name" name="doctor_name" required value="<?= $clinic->doctor_name; ?>">
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="clients_name">Clinic Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="clients_name" placeholder="Clinic Name" name="clients_name" required value="<?= $clinic->clients_name; ?>">
    </div>
    <div class="form-group col-md-12">
        <label class="control-label mt-10" for="address">Address</label>
        <textarea class="form-control" id="address" placeholder="Address" name="address" rows="5" ><?= $clinic->address; ?></textarea>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="pincode">PIN Code </label>
        <input type="text" class="form-control" id="pincode" placeholder="pincode" name="pincode" value="<?= $clinic->pincode; ?>" >
    </div>
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="contact_person">Contact Person</label>
        <input type="text" class="form-control" id="contact_person" placeholder="Contact Person" name="contact_person" value="<?= $clinic->contact_person; ?>" >
    </div>
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="<?= $clinic->phone; ?>" >
    </div>
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="mobile">Mobile</label>
        <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="<?= $clinic->mobile; ?>" >
    </div>
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="email">E-mail </label>
        <input type="text" class="form-control" id="email" placeholder="E-mail" name="email" value="<?= $clinic->email; ?>" >
    </div>
    <div class="form-group col-md-6">
        <label class="control-label mt-10" for="email">Area</label>
        <select name="area_id" id="area_id" class="form-control select2">
            <option value="">Select Area</option>
            <?php foreach ($areas as $area) { ?>
                <option value="<?= $area->id; ?>" <?= (($area->id==$clinic->area_id)?"selected":""); ?>><?= $area->area; ?></option>
            <?php } ?>
        </select>
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
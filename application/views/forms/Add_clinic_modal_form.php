<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />
<div class="row">
    <div class="col-sm-12">
        <?= isset($errors); ?>
        <form method="post" enctype="multipart/form-data" id="addClients">
            <div class="form-group col-md-12 text-left">
                <label class="control-label mt-10" for="doctor_name">Doctor Name <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="doctor_name" placeholder="Doctor Name" name="doctor_name" required>
            </div>
            <div class="form-group col-md-12 text-left">
                <label class="control-label mt-10" for="clients_name">Clinic Name <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="clients_name" placeholder="Clinic Name" name="clients_name" required>
            </div>
            <div class="form-group col-md-12 text-left">
                <label class="control-label mt-10" for="address">Address</label>
                <textarea class="form-control" id="address" placeholder="Address" name="address" rows="5" ></textarea>
            </div>
            <div class="form-group col-md-12 text-left">
                <label class="control-label mt-10" for="address">Address</label>
                <textarea class="form-control" id="address" placeholder="Address" name="address"></textarea>
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="pincode">PIN Code </label>
                <input type="text" class="form-control" id="pincode" placeholder="pincode" name="pincode">
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="contact_person">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" placeholder="Contact Person" name="contact_person">
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile">
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="email">E-mail </label>
                <input type="text" class="form-control" id="email" placeholder="E-mail" name="email">
            </div>
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="email">Area</label>
                <select name="area_id" id="area_id" class="form-control select2">
                    <option value="">Select Area</option>
                    <?php foreach ($areas as $area) { ?>
                        <option value="<?= $area->id; ?>"><?= $area->area; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-actions col-md-12 text-left">
                <button type="submit" class="btn btn-success" id="name"> <i class="fa fa-save"></i> Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Select2 JavaScript -->
<script src="<?= site_url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script>
    $(function() {

        /* Select2 Init*/
        $(".select2").select2();

        $('#addClients').validate({
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter doctor name."
                }
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                $('#submit').prop('disabled', true).html('<i class="fa fa-spin fa-circle-o-notch"></i> Processing...');
                var form_data = new FormData(form);
                setTimeout(function() {
                    $.ajax({
                        url: base_url + "masters/clinics/save_clinics",
                        type: "POST",
                        data: form_data,
                        cache: false,
                        async: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            var obj = $.parseJSON(response);
                            if (obj.status == 1) {
                                $.toast({
                                    heading: 'Success',
                                    text: obj.msg,
                                    position: 'top-right',
                                    loaderBg: '#e69a2a',
                                    icon: 'success',
                                    hideAfter: 3500,
                                    stack: 6
                                });
                                $('#responsive-modal').modal('toggle');
                                location.reload();
                            } else {
                                $.toast({
                                    heading: 'Error/Delete',
                                    text: obj.msg,
                                    position: 'top-right',
                                    loaderBg: '#e69a2a',
                                    icon: 'error',
                                    hideAfter: 3500,
                                    stack: 6
                                });
                                $('#submit').prop('disabled', false).html(' <i class="fa fa-save"></i> Save');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }

                    });

                }, 500);
            }
        });
    })
</script>
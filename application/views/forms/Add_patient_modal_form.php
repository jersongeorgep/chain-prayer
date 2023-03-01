<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />

<?= isset($errors); ?>
<div class="row">
    <div class="col-sm-12">
        <form method="post" enctype="multipart/form-data" id="addPatients">
            <div class="form-group col-md-12 text-left">
                <label class="control-label mt-10" for="patients_name">Patient Name <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="patients_name" placeholder="Patient Name" name="patients_name" required>
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="age">Age <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="age" placeholder="Age" name="age" required>
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="variation_item">Gender <sup class="text-danger">*</sup></label>
                <div class="radio radio-info">
                    <input type="radio" name="gender" id="male" value="Male" checked>
                    <label for="male"> Male </label> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" id="female" value="Female">
                    <label for="female"> Female </label>
                </div>
            </div>
            <div class="form-group col-md-12 text-left">
                <label class="control-label mt-10" for="address">Address</label>
                <textarea class="form-control" id="address" placeholder="Address" name="address"    ></textarea>
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile">
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="email">E-mail </label>
                <input type="text" class="form-control" id="email" placeholder="E-mail" name="email">
            </div>
            <div class="form-actions col-md-12 text-left">
                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
            </div>
        </form>
    </div>
</div>
<!-- Select2 JavaScript -->
<script src="<?= site_url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script>
    $(function(){
        /* Select2 Init*/
        $(".select2").select2();

        $('#addPatients').validate({
            rules: {
                patients_name: {
                    required: true
                }
            },
            messages: {
                patients_name: {
                    required: "Please enter doctor name."
                }
            },
            submitHandler: function(form, e) {
                e.preventDefault();
                $('#submit').prop('disabled', true).html('<i class="fa fa-spin fa-circle-o-notch"></i> Processing...');
                var form_data = new FormData(form);
                setTimeout(function() {
                    $.ajax({
                        url: base_url + "masters/patients/save-patient",
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
    });
</script>
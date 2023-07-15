<style>
    .error {
        color: red;
        border-color: rgba(234, 108, 65, 0.5);
    }
</style>

<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />

<?= isset($errors); ?>
<div class="row">
    <div class="col-sm-12">
        <form id="addDoctor" method="POST" enctype="multipart/form-data">
            <div class="form-group col-md-3 text-left">
                <label class="control-label mt-10" for="salute">Salute</label>
                <select name="salute" id="salute" placeholder="Salute" class="form-control select2">
                    <?php
                    if ($salute) {
                        foreach ($salute as $value) {
                    ?>
                            <option value="<?= $value; ?>"><?= $value; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-9 text-left">
                <label class="control-label mt-10" for="name">Doctor Name <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" id="name" placeholder="Doctor Name" name="name" required>
            </div>
            <div class="form-group col-md-12 text-left">
                <label class="control-label mt-10" for="degree">Degree</label>
                <select name="degree" id="degree" placeholder="Category" class="form-control select2">
                    <option value="">Select Degree</option>
                    <?php
                    if ($degree) {
                        foreach ($degree as $value) {
                    ?>
                            <option value="<?= $value; ?>"><?= $value; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="contact">Mobile</label>
                <input type="text" class="form-control" id="contact" placeholder="Doctor Name" name="contact">
            </div>
            <div class="form-group col-md-6 text-left">
                <label class="control-label mt-10" for="email">E-mail </label>
                <input type="text" class="form-control" id="email" placeholder="Doctor Name" name="email">
            </div>
            <div class="form-actions col-md-12 text-left">
                <button type="submit" class="btn btn-success" id="submit"> <i class="fa fa-save"></i> Save</button>
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
        /* validate form data */
        $('#addDoctor').validate({
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
                        url: base_url + "masters/doctors/save-doctor",
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
                                $('.btnsmt').prop('disabled', false).attr('value', 'Save');
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
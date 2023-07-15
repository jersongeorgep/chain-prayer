        <!-- Select2 -->
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">

        <form id="quickForm" action="<?= site_url('masters/local-fhs/update/'.$localFh->id) ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="center_id">Center <sup class="text-danger">*</sup></label>
                    <select class="form-control form-control-sm select2" name="center_id" id="center_id">
                        <option value="">Select</option>
                        <?php if ($center_fh) : ?>
                            <?php foreach ($center_fh as $value) : ?>
                                <option value="<?= $value->id; ?>" <?= ($value->id == $localFh->center_id) ? "selected" :"" ?>><?= $value->centerName; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="localName">Local Faith Home <sup class="text-danger">*</sup></label>
                    <input type="text" name="localName" class="form-control form-control-sm" onchange="get_code(this.value)" id="localName" placeholder="Local Faith Home" value="<?= $localFh->localName; ?>" />
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="code">Local Code <sup class="text-danger">*</sup></label>
                    <input type="text" name="code" class="form-control form-control-sm" id="code" placeholder="Code" value= "<?= ($localFh->code)? $localFh->code : code_generate($localFh->localName); ?>">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="contact">Phone</label>
                    <input type="text" name="contact" class="form-control form-control-sm" id="contact" placeholder="Phone" value= "<?= $localFh->contact; ?>">
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="address">Address</label>
                    <textarea class="form-control from-control-sm" name="address" id="address" placeholder="Address"><?= $localFh->address; ?></textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

        <script>
            $(function() {
                $('.select2').select2();

                $('#quickForm').validate({
                    rules: {
                        center_id: {
                            required: true
                        },
                        localName: {
                            required: true,
                        },
                        code: {
                            required: true,
                        }
                    },
                    messages: {
                        center_id: {
                            required: "Please choose  Center",
                        },
                        localName: {
                            required: "Please enter Local name",
                        },
                        code: {
                            required: "Please enter code",
                        }
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });

            });

            function get_code(str) {
                $.ajax({
                    type: "POST",
                    url: base_url + 'masters/local-fhs/generate_code',
                    data: 'code=' + str,
                    cache: false,
                    async: false,
                    success: function(response) {
                        $('#code').val(response);
                    }
                });
            }
        </script>
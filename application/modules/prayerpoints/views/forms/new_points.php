        <!-- Select2 -->
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">

        <form id="quickForm" action="<?= site_url('prayerpoints/save') ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="serial_no">Serial No <sup class="text-danger">*</sup></label>
                    <select class="form-control form-control-sm select2" name="serial_no" id="serial_no">
                        <option value="">Select</option>
                        <?php if ($serial_nos) : ?>
                            <?php foreach ($serial_nos as $value) : ?>
                                <option value="<?= $value->id; ?>"><?= $value->serial_no; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="title">Title <sup class="text-danger">*</sup></label>
                    <input type="text" name="title" class="form-control form-control-sm" id="title" placeholder="Title">
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="point_eng">Point in English <sup class="text-danger">*</sup></label>
                    <textarea type="text" name="point_eng" class="form-control form-control-sm" id="point_eng" placeholder="Point in English" rows="3"></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="point_mal">Point in Malayalam<sup class="text-danger">*</sup></label>
                    <textarea type="text" name="point_mal" class="form-control form-control-sm" id="point_mal" placeholder="Point in Malayalam" rows="3"></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="point_tam">Point in Tamil <sup class="text-danger">*</sup></label>
                    <textarea type="text" name="point_tam" class="form-control form-control-sm" id="point_tam" placeholder="Point in Tamil" rows="3"></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="c">Point in Telugu</label>
                    <textarea type="text" name="point_tel" class="form-control form-control-sm" id="point_tel" placeholder="Point in Telugu" rows="3"></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="point_hin">Point in Hindi</label>
                    <textarea type="text" name="point_hin" class="form-control form-control-sm" id="point_hin" placeholder="Point in Hindi" rows="3"></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="point_kan">Point in Kannada</label>
                    <textarea type="text" name="point_kan" class="form-control form-control-sm" id="point_kan" placeholder="Point in Kannada" rows="3"></textarea>
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
                        serial_no: {
                            required: true
                        },
                        title: {
                            required: true,
                        },
                        point_eng: {
                            required: true,
                        },
                        point_mal: {
                            required: true,
                        },
                        point_tam: {
                            required: true,
                        }
                    },
                    messages: {
                        serial_no: {
                            required: "Please choose  Serial No",
                        },
                        title: {
                            required: "Please enter Title ",
                        },
                        point_eng: {
                            required: "Please enter English point",
                        },
                        point_mal: {
                            required: "Please enter Malayalam point",
                        },
                        point_tam: {
                            required: "Please enter Tamil point",
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

        </script>
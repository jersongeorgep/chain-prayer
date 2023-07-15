        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">

        <form id="quickForm" action="<?= site_url('masters/Headers_data/update/'.$headers->id) ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-sm-12 col-md-3">
                    <label for="lang_id">Language</label>
                    <select class="form-control form-control-sm select2" name="lang_id" id="lang_id">
                        <option value="">Select</option>
                        <?php foreach ($language as $value): ?>
                            <option value="<?= $value->id; ?>" <?= (($value->id == $headers->lang_id)? "selected" :""); ?>><?= $value->language; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-3">
                    <label for="praise">Praise</label>
                    <input type="text" name="praise" class="form-control form-control-sm" id="praise" placeholder="Praise" value="<?= $headers->praise; ?>">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control form-control-sm" id="title" placeholder="Title" value="<?= $headers->title; ?>">
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="details">Details</label>
                    <textarea name="details" class="form-control form-control-sm" placeholder="Details"><?= $headers->details; ?></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="verses">Verses</label>
                    <textarea name="verses" class="form-control form-control-sm" placeholder="Verses"><?= $headers->verses; ?></textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
        <!-- Summernote -->
        <script src="<?= site_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

        <script>
            $(function() {
                $('.select2').select2();
                
                $('#quickForm').validate({
                    rules: {
                        lang_id: {
                            required: true
                        },
                        title: {
                            required: true,
                        },
                        details: {
                            required: true,
                        },
                        verses: {
                            required: true,
                        }
                    },
                    messages: {
                        lang_id: {
                            required: "Please enter a language",
                        },
                        title: {
                            required: "Please enter title",
                        },
                        details: {
                            required: "Please enter details",
                        },
                        verses: {
                            required: "Please enter verses",
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
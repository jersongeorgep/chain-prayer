        <!-- summernote -->
        <link rel="stylesheet" href="<?= site_url('assets/plugins/summernote/summernote-bs4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">

        <form id="quickForm" action="<?= site_url('masters/terms/update/'.$terms->id) ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-sm-12 col-md-12">
                    <label for="lang_id">Language</label>
                    <select class="form-control form-control-sm select2" name="lang_id" id="lang_id">
                        <option value="">Select</option>
                        <?php foreach ($language as $value): ?>
                            <option value="<?= $value->id; ?>" <?= (($value->id == $terms->lang_id)? "selected" : ""); ?>><?= $value->language; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control form-control-sm" id="title" placeholder="Title" value="<?= $terms->title ?>">
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <label for="summernote">Terms</label>
                    <textarea name="terms" id="summernote" class="form-control form-control-sm" placeholder="Terms"><?= $terms->terms ?></textarea>
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
        <script src="<?= site_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

        <script>
            $(function() {
                $('.select2').select2();
                $('#summernote').summernote({
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ],
                    fontSizes: ['8', '9', '10', '11', '12', '14', '16', '17', '18', '19', '24', '36', '48' , '64', '82', '150']
                });
                $('#quickForm').validate({
                    rules: {
                        lang_id: {
                            required: true
                        },
                        title: {
                            required: true,
                        },
                        terms: {
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
                        terms: {
                            required: "Please enter terms",
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
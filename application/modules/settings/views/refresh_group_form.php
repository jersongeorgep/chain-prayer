        <!-- Select2 -->
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">

        <form id="quickForm" method="POST" enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-sm-12 col-md-12 select2-blue">
                    <label for="center_id">Center <sup class="text-danger">*</sup></label>
                    <select class=" form-control form-control-sm select2" name="center_id" id="center_id" data-placeholder="Select a Center" data-dropdown-css-class="select2-blue" style="width: 100%;" >
                        <option value="">Select</option>
                        <option value="all">All</option>
                        <?php if ($center_fh) : ?>
                            <?php foreach ($center_fh as $value) : ?>
                                <option value="<?= $value->id; ?>"><?= $value->centerName; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Reset Gorup</button>
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
                        }
                    },
                    messages: {
                        center_id: {
                            required: "Please choose  Center",
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
                    },
                    submitHandler:function(){
						reset_center_groups();
					}
                });


            });

            function reset_center_groups(){
				var form_data = $('#quickForm').serializeArray();
				 $.ajax({
					type : "POST",
					url     : base_url + 'settings/refresh-groups/reset-members-groups',
					data    : form_data,
					cache   : false,
					async   : false,
					success : function(response){
						var data = JSON.parse(response);
                        toastr.success(data.msg);
					}
				}); 	
			}

        </script>
        <!-- Select2 -->
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
        
        <link rel="stylesheet" href="<?= site_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
        <!-- Theme style -->

        <div class="row">
        	<div class="col-12">
        		<!-- /.card -->
        		<div class="card">
        			<!-- /.card-header -->
        			<div class="card-body">
        				<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        					<div class="row">
        						<div class="col-sm-12">
        							<form  method="POST" id="quickForm" class="row" enctype="multipart/form-data">
        								<div class="form-group col-sm-12 col-md-3">
        									<label for="serial_no">Serial<sup class="text-danger">*</sup></label>
        									<select class="form-control form-control-sm select2" name="serial_no" id="serial_no">
        										<option value="">Select</option>
												<?php if ($serial_nos) : ?>
        											<?php foreach ($serial_nos as $value) : ?>
        												<option value="<?= $value->id; ?>"><?= $value->serial_no; ?></option>
        											<?php endforeach; ?>
        										<?php endif; ?>
        									</select>
        								</div>
										<div class="form-group col-sm-12 col-md-3">
        									<label for="lang_id">Languages<sup class="text-danger">*</sup></label>
        									<select class="form-control form-control-sm select2" name="lang_id" id="lang_id">
        										<option value="">Select</option>
        										<?php if ($languages) : ?>
        											<?php foreach ($languages as $value) : ?>
        												<option value="<?= $value->id; ?>"><?= $value->language; ?></option>
        											<?php endforeach; ?>
        										<?php endif; ?>
        										
        									</select>
        								</div>
										<div class="form-group col-sm-12 col-md-2 pt-2">
        									<button type="submit" class="btn btn-sm btn-success mt-4" name="btn_search" id="btn_search" value="search"><i class="fa fa-search"></i> Find</button>
        								</div>
        							</form>
        						</div>

        					</div>

        				</div>
        			</div>
        			<!-- /.card-body -->
        		</div>
        		<!-- /.card -->
        	</div>
        	<!-- /.col -->
        </div>

        <div class="row">
        	<div class="col-12">
        		<!-- /.card -->
        		<div class="card">
        			<!-- /.card-header -->
        			<div class="card-body">
        				<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        					<div class="row">
        						<div class="col-sm-12" id="view_serial_list">
        							
        						</div>
        					</div>

        				</div>
        			</div>
        			<!-- /.card-body -->
        		</div>
        		<!-- /.card -->
        	</div>
        	<!-- /.col -->
        </div>

        <!-- DataTables  & Plugins -->
        <script src="<?= site_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/jszip/jszip.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
		
		<script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>


        <script>
        	$(function() {

				$('.select2').select2();

        		$("#select_all").click(function() {
        			$('input:checkbox').not(this).prop('checked', this.checked);
        		});

				$('#quickForm').validate({
                    rules: {
                        serial_no: {
                            required: true
                        },
                        lang_id: {
                            required: true
                        }
                    },
                    messages: {
                        serial_no: {
                            required: "Please choose  serial no",
                        },
                        lang_id: {
                            required: "Please choose  language",
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
						get_serial_wise_data();
					}
                });

        	});

			function get_serial_wise_data(){
				var form_data = $('#quickForm').serializeArray();
				 $.ajax({
					type : "POST",
					url : base_url + 'prayerpoints/printdata/get_serial_wise_data',
					data : form_data,
					cache : false,
					async : false,
					success : function(response){
						$('#view_serial_list').empty();
						$('#view_serial_list').append(response);
					}
				}); 	
			}
        </script>
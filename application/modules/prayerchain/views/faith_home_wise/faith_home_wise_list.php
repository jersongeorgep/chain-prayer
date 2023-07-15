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
        									<label for="center_id">Center<sup class="text-danger">*</sup></label>
        									<select class="form-control form-control-sm select2" name="center_id" id="center_id">
        										<option value="">Select</option>
												<?php if ($center_fh) : ?>
        											<?php foreach ($center_fh as $value) : ?>
        												<option value="<?= $value->id; ?>"><?= $value->centerName; ?></option>
        											<?php endforeach; ?>
        										<?php endif; ?>
        									</select>
        								</div>
										<div class="form-group col-sm-12 col-md-3">
        									<label for="local_fh">Local<sup class="text-danger">*</sup></label>
        									<select class="form-control form-control-sm select2" name="local_fh" id="local_fh">
        										<option value="">Select</option>
        										
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
        						<div class="col-sm-12" id="view_group_list">
        							
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
                        center_id: {
                            required: true
                        },
                        local_fh: {
                            required: true
                        }
                    },
                    messages: {
                        center_id: {
                            required: "Please choose  Center",
                        },
                        local_fh: {
                            required: "Please choose  Local faith home",
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
						get_faith_home_wise_data();
					}
                });

				$('#mailingForm').validate({
                    rules: {
                        center_id_mail: {
                            required: true
                        },
                        local_fh_mail: {
                            required: true
                        },
						to_mail_id: {
                            required: true
                        }
                    },
                    messages: {
                        center_id_mail: {
                            required: "Please choose  Center",
                        },
                        local_fh_mail: {
                            required: "Please choose  Local faith home",
                        },
						to_mail_id: {
                            required: "Please enter to email",
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
						send_faith_home_wise_mail();
					}
                });

				$("#center_id"). on('change', function(){
					var center_id = this.value;
					$.ajax({
						type : "POST",
						url : base_url + 'prayerchain/members/get_local_fhs',
						data : "center_id="+center_id,
						cache : true,
						async : true,
						success : function (response) {
							$('#local_fh').empty();
							html = '<option value="">Select</option>';
							var data = JSON.parse(response);
							for (let i = 0; i < data.length; i++) {
								html += '<option value="'+ data[i].id +'">'+ data[i].localName +'</option>';
							}
							$('#local_fh').append(html);
						}
					});
					
				})

				$("#center_id_mail"). on('change', function(){
					var center_id = this.value;
					$.ajax({
						type : "POST",
						url : base_url + 'prayerchain/members/get_local_fhs',
						data : "center_id="+center_id,
						cache : true,
						async : true,
						success : function (response) {
							$('#local_fh_mail').empty();
							html = '<option value="">Select</option>';
							var data = JSON.parse(response);
							for (let i = 0; i < data.length; i++) {
								html += '<option value="'+ data[i].id +'">'+ data[i].localName +'</option>';
							}
							$('#local_fh_mail').append(html);
						}
					});
					
				})

        		$('#delete_btn').on('click', function() {
        			var post_arr = [];
        			$('#show_data input[type=checkbox]').each(function() {
        				if (jQuery(this).is(":checked")) {
        					var id = this.value;
        					post_arr.push(id);
        				}
        			});
        			if (post_arr.length > 0) {
        				if (confirm("Do you really want to delete records?")) {
        					$.ajax({
        						type: "POST",
        						url: base_url + "prayerchain/members/delete",
        						async: false,
        						cache: false,
        						data: {
        							ids: post_arr
        						},
        						success: function(response) {
        							$.each(post_arr, function(i, l) {
        								$("#ids_" + l).closest('tr').remove();
        							});
        							toastr.error("Data Deleted");
        							setTimeout(() => {
        								window.location.reload();
        							}, 500); 
        						}
        					});
        				}
        			} else {
        				alert("Please select rows for delete");
        			}
        		});

        	});

			function get_faith_home_wise_data(){
				var form_data = $('#quickForm').serializeArray();
				 $.ajax({
					type : "POST",
					url : base_url + 'prayerchain/printdata/get_local_fh_wise_data',
					data : form_data,
					cache : false,
					async : false,
					success : function(response){
						$('#view_group_list').empty();
						$('#view_group_list').append(response);
					}
				}); 	
			}

			function send_faith_home_wise_mail(){
				var form_data = $('#quickForm').serializeArray();
				 $.ajax({
					type : "POST",
					url : base_url + 'prayerchain/printdata/send_local_fh_wise_data',
					data : form_data,
					cache : false,
					async : false,
					success : function(response){
						$('#view_group_list').empty();
						$('#view_group_list').append(response);
					}
				}); 	
			}
        </script>
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
        								<div class="form-group col-sm-12 col-md-4">
        									<label for="excel_file">Excel File<sup class="text-danger">*</sup></label>
        									<input type="file" class="form-control form-control-sm" name="excel_file" id="excel_file" />
        								</div>
										<div class="form-group col-sm-12 col-md-1 pt-2">
        									<button type="submit" class="btn btn-sm btn-success mt-4" id="btn_search"><i class="fa fa-upload"></i> Find</button>
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
							<form action="<?= site_url('prayerchain/excel_import/save_bulk_data'); ?>" method="POST" id="save_csv_data" enctype="multipart/form-data">
        					<div class="row">
        						<div class="col-sm-12">
        							<table id="example1" class="table table-bordered table-striped dataTable dtr-inline table-sm text-sx" aria-describedby="example1_info">
        								<thead>
        									<tr>
        										<th class="text-center" width="5%">Sl. No</th>
        										<th class="text-center">Center</th>
        										<th class="text-center">Local</th>
												<th class="text-center">Language</th>
        										<th class="text-center">Time</th>
												<th class="text-center">Bro./ Sis. </th>
        										<th class="text-center">Emg Name </th>
												<th class="text-center">Mal Name </th>
												<th class="text-center">Tam Name </th>
												<th class="text-center">Tel Name </th>
												<th class="text-center">Hin Name </th>
												<th class="text-center">Kan Name </th>
												<th class="text-center">Mobile</th>
        									</tr>
        								</thead>
        								<tbody id="show_data">
        									
        								</tbody>
        							</table>
									
        						</div>
								<div class="col-12">
        							<button type="submit" class="btn btn-sm btn-success" id="btn_search"><i class="fa fa-save"></i> Save </button>
        						</div>
        					</div>
							</form>
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

        		table = $("#example1").DataTable({
					//"dom": 'Blfrtip',
        			"responsive": true,
        			"lengthChange": false,
        			"autoWidth": false,
					"bPaginate": false,
					"bInfo" : false
					//"buttons": ["excel", "pdf", "print", "colvis"]
        		});

        		$("#select_all").click(function() {
        			$('input:checkbox').not(this).prop('checked', this.checked);
        		});
				
				$('#quickForm').validate({
                    rules: {
                        excel_file: {
                            required: true
                        }
                    },
                    messages: {
                        excel_file: {
                            required: "Please choose  excel file",
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
					submitHandler:function(form){
						get_excel_data(form);
					}
                });

				$("#center_id"). on('change', function(){
					var center_id = this.value;
					$.ajax({
						type : "POST",
						url : base_url + 'prayerchain/members/get_groups_in_center',
						data : "center_id="+center_id,
						cache : true,
						async : true,
						success : function (response) {
							$('#group_no').empty();
							html = '<option value="">Select</option> <option value="all">All</option>';
							var data = JSON.parse(response);
							for (let i = 0; i < data.length; i++) {
								html += '<option value="'+ data[i].group_no +'">'+ data[i].group_no +'</option>';
							}
							$('#group_no').append(html);
						}
					});
					
				});

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

			function get_excel_data(form){
				var form_data =  new FormData(form);
				 $.ajax({
					type : "POST",
					url : base_url + 'prayerchain/excel-import/get_excel_data',
					data : form_data,
					cache : false,
					async : false,
					processData : false,
					contentType :false,
					success : function(response){
						$('#show_data').empty();
						$('#show_data').append(response);
					}
				}); 	
			}
        </script>
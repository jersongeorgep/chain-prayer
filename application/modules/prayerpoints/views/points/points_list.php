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
        								<div class="form-group col-sm-12 col-md-3 col-lg-3">
        									<label for="serial_no">Serial No<sup class="text-danger">*</sup></label>
        									<select class="form-control form-control-sm select2" name="serial_no" id="serial_no">
        										<option value="">Select</option>
												<?php if ($serial_nos) : ?>
        											<?php foreach ($serial_nos as $value) : ?>
        												<option value="<?= $value->id; ?>"><?= $value->serial_no; ?></option>
        											<?php endforeach; ?>
        										<?php endif; ?>
        									</select>
        								</div>
										<div class="form-group col-sm-12 col-md-3 col-lg-3">
        									<label for="lang">Language<sup class="text-danger">*</sup></label>
        									<select class="form-control form-control-sm select2" name="lang" id="lang">
        										<option value="">Select</option>
												<option value="eng">English</option>
												<option value="mal">Malayalam</option>
												<option value="tam">Tamil</option>
												<option value="tel">Telugu</option>
												<option value="hin">Hindi</option>
												<option value="kan">Kanada</option>
        									</select>
        								</div>
										<div class="form-group col-sm-12 col-md-3 col-lg-3 pt-2 mt-4">
        									<button type="submit" class="btn btn-sm btn-success" id="btn_search"><i class="fa fa-search"></i> Find</button>
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
        			<div class="card-header">
        				<h3 class="card-title">
        					<span><a href="<?= site_url('prayerpoints/create-new'); ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> New </a></span>
        					<span><button type="button" id="delete_btn" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button></span>
        				</h3>
        			</div>
        			<!-- /.card-header -->
        			<div class="card-body">
        				<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        					<div class="row">
        						<div class="col-sm-12">
        							<table id="example1" class="table table-bordered table-striped dataTable dtr-inline table-sm text-sm" aria-describedby="example1_info">
        								<thead>
        									<tr>
        										<th class="text-center" width="7%">Sl. No</th>
        										<th class="text-center" width="2%"> <input type="checkbox" name="select_all" id="select_all" /> </th>
												<th width="15%" class="text-center">Title</th>
        										<th class="text-center">Point</th>
        										<th class="text-center" width="8%">Action</th>
        									</tr>
        								</thead>
        								<tbody id="show_data">
        									
        								</tbody>
        							</table>
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

        		table = $("#example1").DataTable({
					//"dom": 'Blfrtip',
        			"responsive": true,
        			"lengthChange": false,
        			"autoWidth": false,
					"columns": [
						{ "data": "sl_no" },
						{ "data": "select" },
						{ "data": "title" },
						{ "data": "points" },
						{ "data": "action" }
					],
        			'columnDefs': [{
        				'targets': [1], // column index (start from 0)
        				'orderable': false, // set orderable false for selected columns
        			}],
        			/* "buttons": [{extend: "excel",
						exportOptions: {
							columns: [ 0, 2, 3, 4, 5, 6, 7, 8 ] 
						},
					},{extend: "pdf",
						exportOptions: {
							columns: [ 0, 2, 3, 4, 5, 6, 7, 8 ] 
						},
					}, {extend: "print",
						exportOptions: {
							columns: [ 0, 2, 3, 4, 5, 6, 7, 8 ] 
						},	
					}] */
        		});

        		$("#select_all").click(function() {
        			$('input:checkbox').not(this).prop('checked', this.checked);
        		});

				$('#quickForm').validate({
                    rules: {
                        serial_no: {
                            required: true
                        },
                        lang: {
                            required: true
                        }
                    },
                    messages: {
                        serial_no: {
                            required: "Please choose  serial No",
                        },
						lang: {
                            required: "Please choose Language"
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
						get_serial_data();
					}
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
        						url: base_url + "prayerpoints/delete",
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

			function get_serial_data(){
				var form_data = $('#quickForm').serializeArray();
				 $.ajax({
					type : "POST",
					url : base_url + 'prayerpoints/get_serial_data',
					data : form_data,
					cache : false,
					async : false,
					success : function(response){
						var data = JSON.parse(response);
						table.clear();
       					table.rows.add(data).draw(false);
					}
				}); 	
			}

			function get_local_fhs(center_id){
				$.ajax({
						type : "POST",
						url : base_url + 'prayerchain/members/get_local_fhs',
						data : "center_id="+center_id,
						cache : true,
						async : true,
						success : function (response) {
							$('#local_fh').empty();
							html = '<option value="">Select</option> <option value="all">All</option>';
							var data = JSON.parse(response);
							for (let i = 0; i < data.length; i++) {
								html += '<option value="'+ data[i].id +'">'+ data[i].localName +'</option>';
							}
							$('#local_fh').append(html);
						}
					});
			}
        </script>
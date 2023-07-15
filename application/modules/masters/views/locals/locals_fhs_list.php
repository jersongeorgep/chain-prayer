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
        								<div class="form-group col-4">
        									<label for="center_id">Center FH</label>
        									<select class="form-control form-control-sm select2" name="center_id" id="center_id">
        										<option value="">Select</option>
        										<?php if ($center_fh) : ?>
        											<?php foreach ($center_fh as $value) : ?>
        												<option value="<?= $value->id; ?>"><?= $value->centerName; ?></option>
        											<?php endforeach; ?>
        										<?php endif; ?>
        									</select>
        								</div>
										<div class="form-group col-4">
        									<label for="center_id">Keyword</label>
        									<input type="text" class="form-control form-control-sm" name="keyword" id="keyword">
        								</div>
        								<div class="form-group col-3 pt-2">
        									<button type="submit" class="btn btn-sm btn-success mt-4" id="btn_search"><i class="fa fa-search"></i> Find</button>
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

        <div class="row" >
        	<div class="col-12">
        		<!-- /.card -->
        		<div class="card">
        			<div class="card-header">
        				<h3 class="card-title">
        					<span><a href="<?= site_url('masters/local-fhs/create-new'); ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> New </a></span>
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
        										<th width="10%" class="text-center">Code</th>
        										<th class="text-center">Local</th>
        										<th class="text-center">Center Code</th>
        										<th class="text-center">Center </th>
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
					"dom": 'Blfrtip',
        			"responsive": true,
        			"lengthChange": false,
        			"autoWidth": false,
					"columns": [
						{ "data": "sl_no" },
						{ "data": "select" },
						{ "data": "code" },
						{ "data": "localName" },
						{ "data": "centerCode" },
						{ "data": "centerName" },
						{ "data": "action" }
					],
        			'columnDefs': [{
        				'targets': [1], // column index (start from 0)
        				'orderable': false, // set orderable false for selected columns
        			}],
        			"buttons": [{extend: "excel",
						exportOptions: {
							columns: [ 0, 2, 3, 4, 5 ] 
						},
					},{extend: "pdf",
						exportOptions: {
							columns: [ 0, 2, 3, 4, 5 ] 
						},
					}, {extend: "print",
						exportOptions: {
							columns: [ 0, 2, 3, 4, 5 ] 
						},	
					}]
        		});

        		$("#select_all").click(function() {
        			$('input:checkbox').not(this).prop('checked', this.checked);
        		});

				$('#quickForm').validate({
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
						get_local_fhs_data();
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
        						url: base_url + "masters/local-fhs/delete",
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

			function get_local_fhs_data(){
				var form_data = $('#quickForm').serializeArray();
				 $.ajax({
					type : "POST",
					url : base_url + 'masters/local-fhs/get_local_fh_data',
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
        </script>
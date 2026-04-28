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
        			<div class="card-header">
        				<h3 class="card-title">
        					<span><a href="<?= site_url('prayerpoints/makeSerialNumber/create-new'); ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> New </a></span>
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
        										<th class="text-center">Serial Nos </th>
												<th class="text-center" width="8%">Action</th>
        									</tr>
        								</thead>
        								<tbody id="show_data">
											<?php if(!empty($serial_nos)): $slNo = 1; ?>
        									<?php  foreach($serial_nos as $val): ?>
												<tr>
													<td><?= $slNo; ?></td>
													<td><input type="checkbox" name="ids[]" id="ids_" value="<?= $val->id; ?>"></td>
													<td><?= $val->serial_no; ?></td>
													<td><a href="<?= site_url('prayerpoints/makeSerialNumber/edit/' . $val->id); ?>" class="btn btn-xs btn-success"><i class="fas fa-edit"></i></a></td>
												</tr>
											<?php $slNo++;  endforeach; ?>
											<?php endif; ?>
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

        		$("#example1").DataTable({
					"responsive": true,
					"lengthChange": false,
					"autoWidth": false,
					'columnDefs': [{
						'targets': [1], // column index (start from 0)
						'orderable': false, // set orderable false for selected columns
					}]
					//"buttons": ["excel", "pdf", "print", "colvis"]
				}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        		$("#select_all").click(function() {
        			$('input:checkbox').not(this).prop('checked', this.checked);
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
        						url: base_url + "prayerpoints/makeSerialNumber/delete",
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

        </script>
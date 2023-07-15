<!-- Data table CSS -->
<style>
	 .br {
        border-right: 1px #000 solid;
    }

    .bb {
        border-bottom: 1px #000 solid;
    }
</style>
<link href="<?= site_url('assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-image-checkbox/dist/css/bootstrap-image-checkbox.css'); ?>" rel="stylesheet" type="text/css" />
<?php $this->load->view('common/breadcrumb'); ?>

<!-- Row -->
<div class="row">
<div class="col-sm-12">
<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
							<form method="POST" class="col-sm-12" action="<?= site_url('reports/get_proforma_search_result'); ?>" enctype="multipart/form-data">
								<div class="form-group col-md-3">
									<label class="control-label mt-10" for="doctor_name">From <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control datepicker" id="fromDate" placeholder="From Date" name="fromDate" required>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label mt-10" for="doctor_name">To <sup class="text-danger">*</sup></label>
									<input type="text" class="form-control datepicker" id="toDate" placeholder="toDate" name="toDate" required>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label mt-10" for="doctor_name">Clinic/Doctor <sup class="text-danger">*</sup></label>
									<select name="clinic_id" id="clinic_id" class="form-control select2">
										<option value="">Select Clinic</option>
										<?php
										foreach ($clinics as $val) {
										?>
											<option value="<?= $val->id; ?>"><?= (($val->doctor_name)? "Dr. ". $val->doctor_name. " / ":"");?> <?=  "M/s. ".$val->clients_name ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group col-md-3">
									<button type="submit" class="btn btn-sm btn-success mt-40"><i class="fa fa-search"></i> Search</button>
									<button type="button" id="printReport" class="btn btn-sm btn-primary mt-40"><i class="fa fa-print"></i> Print</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
<?php if(isset($proforma_items)): ?>
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<table id="datable_1" class="table table-hover display  pb-30">
									<thead class="thead-dark">
										<tr>
											<th width="5%">Sl No</th>
											<th width="9%" >Invoice No.</th>
											<th width="8%">Date</th>
											<th width="9%">Order No.</th>
											<th>Work</th>
											<th>Patient</th>
											<th width="10%">Amount</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach($proforma_items as $items): ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $items->invoice_no; ?></td>
                                                <td><?= date('d-m-Y', strtotime($items->invoice_date)); ?></td>
                                                <td><?= $items->po_number; ?></td>
                                                <td><?= $items->work; ?></td>
                                                <td><?= $items->patient_name; ?></td>
                                                <td class="text=right"><?= number_format($items->total_amount,"2",".",","); ?></td>
                                            </tr>
										<?php $i++; endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Row -->
<!-- /Row -->
<?php endif; ?>
<!-- Data table JavaScript -->
<script src="<?= site_url('assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/vendors/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= site_url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>

<script>
	$(function() {

		$(".select2").select2();

		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
			//endDate: '+0d',
			autoclose: true
		});

		$('#datable_1').DataTable();
		
		$('#printReport').on('click', function() {
            var fromDate = $('#fromDate').val();
			var toDate = $('#toDate').val();
			var clinic_id = $('#clinic_id').val();
			$.ajax({
				type : "POST",
                url : base_url + 'reports/print_proforma_report',
				data : "fromDate="+fromDate+"&toDate="+toDate+"&clinic_id="+clinic_id,
                success: function(result){
                    var content = result;
                    var printWindow = window.open('', 'PRINT', 'height=800,width=1000');
                    printWindow.document.write('<html><head><title>Clinic Report</title>');
                    printWindow.document.write('</head><body>');
                    printWindow.document.write(content);
                    printWindow.document.write('</body></html>');
                    printWindow.document.close();
                    setTimeout(function() {
                        printWindow.print();
                    }, 500);
                }
            });
            
        });

	});

	

	
</script>
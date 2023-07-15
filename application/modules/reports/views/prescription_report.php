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
							<form method="POST" class="col-sm-12" action="<?= site_url('reports/get_search_result'); ?>" enctype="multipart/form-data">
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
<?php if(isset($prescriptions)): ?>
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
											<th width="9%" >Order No</th>
											<th width="8%">Date</th>
											<th>Work</th>
											<th>Patient</th>
											<th width="18%">positions</th>
											<th width="10%">DueDate</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach($prescriptions as $prescription):  ?>
											<tr>
												<td><?= $i; ?></td>
												<td><?= $prescription->po_number; ?></td>
												<td><?= date('d-m-Y', strtotime($prescription->po_date)); ?></td>
												<td><?= (($prescription->doctor_name)?"Dr. ".$prescription->doctor_name:"/ "); ?> <?= (($prescription->clients_name)?$prescription->clients_name:""); ?></td>
												<td><?= $prescription->patient_name; ?></td>
												<td><div class="row"><?= '<div class="col-xs-6 br bb text-center">' . (($prescription->position_tl)?$prescription->position_tl:0) . '</div><div class="col-xs-6 bb text-center">' . (($prescription->position_tr)?$prescription->position_tr:0) . '</div></div><div class="row"><div class="col-xs-6 br text-center">' . (($prescription->position_bl)?$prescription->position_bl:0) . '</div><div class="col-xs-6 text-center">'. (($prescription->position_br)?$prescription->position_br:0) .'</div></div>'; ?></td>
												<td><?= $prescription->due_date; ?></td>
											</tr>
										<?php $i++;  endforeach; ?>
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
		
	});

	

	
</script>
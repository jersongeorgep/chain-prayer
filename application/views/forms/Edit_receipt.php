<style>
    .position span {
        padding: 4px;
        font: 1.5em sans-serif;
        font-weight: 500;
        cursor: pointer;
    }

    .position span:hover {
        color: #ff8b15;
    }

    .br {
        border-right: 1px #000 solid;
    }

    .bb {
        border-bottom: 1px #000 solid;
    }

    .thead-dark {
        background-color: #375468;
    }

    .table>thead>tr>th {
        color: #ffffff;
        border-color: #ffffff;
        font: 1.1em sans-serif;
    }

    .table>tfoot>tr>th {
        font: 1.4em sans-serif;
        font-weight: 500;
    }

    .pt-3 {
        padding-top: 3px !important;
    }

    .custom-control-input {
        position: relative;
        left: 0.1rem;
        top: 5.5rem;
        width: 100%;
        height: 25px;
        z-index: 1000;
    }
</style>
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-image-checkbox/dist/css/bootstrap-image-checkbox.css'); ?>" rel="stylesheet" type="text/css" />
<div class="row">
    <form action="<?= site_url('office/receipts/update/'. $receipt->id); ?>" method="post" enctype="multipart/form-data">
        <div class="col-sm-8">
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="ref_no">Ref. No. <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" placeholder="Ref. No." value="<?= $receipt->ref_no; ?>" readonly>
                <input type="hidden" id="po_number" placeholder="Ref. No." name="ref_no" value="<?= $receipt->ref_no; ?>" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="receipt_date">Date <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control datepicker" id="receipt_date" placeholder="Date" name="receipt_date" required value="<?= date('d-m-Y', strtotime($receipt->receipt_date)); ?>">
            </div>
            <div class="form-group col-md-12">
                <label class="control-label mt-10" for="clinic_id"><button type="button" class="btn btn-link btn-icon-anim btn-sm text-primary ml-10 pa-0" title="Add New Client" onclick="showModal('<?= site_url('office/prescriptions/add-clinics-modal') ?>', 'Add New Clients')"><i class="fa fa-plus mt-5"></i></button> Doctor / Clinic Name <sup class="text-danger">*</sup> </label>
                <select name="clinic_id" id="clinic_id" class="form-control select2">
                    <option value="">Select Clinic</option>
                    <?php
                    foreach ($clinics as $val) {
                    ?>
                        <option value="<?= $val->id; ?>" <?= (($receipt->clinic_id == $val->id)?"selected":""); ?> ><?= (($val->doctor_name)? "Dr. ". $val->doctor_name. " / ":"");?> <?=  "M/s. ".$val->clients_name ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
            <label class="control-label mt-10" for="opening_balance">Opening Balance</label>
            <input type="text" class="form-control text-right" id="opening_balance" placeholder="0.00" name="opening_balance" <?= (($opening_balance != 0)? "readonly":"") ?> value="<?= $opening_balance; ?>">
            </div>
            <div class="form-group col-md-4">
            <label class="control-label mt-10" for="current_balance">Current Balance</label>
            <input type="text" class="form-control text-right" readonly id="current_balance" placeholder="0.00" name="current_balance" value="<?= $current_balance; ?>">
            </div>
            <div class="form-group col-md-4">
            <label class="control-label mt-10" for="receipt_amount">Amount <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control text-right" id="receipt_amount" placeholder="0.00" name="receipt_amount" value="<?= $receipt->receipt_amount; ?>">
            </div>
            <div class="form-group col-md-6">
            <label class="control-label mt-10" for="transaction_mode">Transaction Mode</label>
            <select name="transaction_mode" id="transaction_mode" class="form-control select2">
                    <option value="">Select Transaction Mode</option>
                    <?php
                    foreach ($txn_mode as $val00) {
                    ?>
                        <option value="<?= $val00; ?>" <?= ($val00 == $receipt->transaction_mode)?"selected":""; ?>><?= $val00; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
            <label class="control-label mt-10" for="collected_by">Collected By</label>
            <input type="text" class="form-control" id="collected_by" placeholder="Collected By" name="collected_by" value="<?= $receipt->collected_by; ?>">
            </div>
            <div class="form-group col-md-12">
                <label class="control-label mt-10" for="remarks">Remarks</label>
                <textarea class="form-control" id="remarks" placeholder="Remarks" name="remarks" rows="2"><?= $receipt->remarks; ?></textarea>
            </div>

        </div>
        <div class="col-sm-4">
            
        </div>

        <div class="form-actions col-md-12">
            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
        </div>
    </form>
</div>

<!-- Select2 JavaScript -->
<script src="<?= site_url('assets/vendors/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= site_url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script>
    var slno = $('#productLine').length;
    $(function() {

        /* Select2 Init*/
        $(".select2").select2();

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            //endDate: '+0d',
            autoclose: true
        });
        
        $('#clinic_id').on('change', function () {
            var clinicId = this.value;
            $.ajax({
                type:"POST",
                url: base_url + "office/receipts/get_current_balance",
                data : "clinicId="+clinicId,
                success : function (result) {
                    var data = JSON.parse(result);
                    $('#current_balance').val(parseInt(data.current_balance).toFixed(2));
                    if(data.opening_balance === 0){
                        $('#opening_balance').removeAttr('readonly').val(parseInt(data.opening_balance).toFixed(2));
                    }else{
                        $('#opening_balance').prop('readonly', true).val(parseInt(data.opening_balance).toFixed(2));
                    }
                }
            });
        })
    });

   
</script>
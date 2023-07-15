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
    <form action="<?= site_url('office/prescriptions/update/'.$prescription->id); ?>" method="post" enctype="multipart/form-data">
        <div class="col-sm-8">
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="po_number">Order Number <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" placeholder="Order Number" value="<?= $prescription->po_number; ?>" readonly>
                <input type="hidden" id="po_number" placeholder="Order Number" name="po_number" value="<?= $prescription->po_number; ?>" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="po_date">Order Date <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control datepicker" id="po_date" placeholder="Order Date" name="po_date" required value="<?= $prescription->po_date; ?>">
            </div>
            <div class="form-group col-md-12">
                <label class="control-label mt-10" for="clinic_id"><button type="button" class="btn btn-link btn-icon-anim btn-sm text-primary ml-10 pa-0" title="Add New Client" onclick="showModal('<?= site_url('office/prescriptions/add-clinics-modal') ?>', 'Add New Clients')"><i class="fa fa-plus mt-5"></i></button> Doctor / Clinic Name <sup class="text-danger">*</sup> </label>
                <select name="clinic_id" id="clinic_id" class="form-control select2">
                    <option value="">Select Clinic</option>
                    <?php
                    foreach ($clinics as $val) {
                    ?>
                        <option value="<?= $val->id; ?>" <?= (($val->id == $prescription->clinic_id)?"selected":"") ?> ><?= (($val->doctor_name)? "Dr. ". $val->doctor_name." /": ""); ?><?= "M/s. ".$val->clients_name; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
            <label class="control-label mt-10" for="patient_name">Patient Name </label>
            <input type="text" class="form-control" id="patient_name" placeholder="Patient Name" name="patient_name" value="<?= $prescription->patient_name; ?>">
            </div>
             <div class="form-group col-md-3">
            <label class="control-label mt-10" for="age">Age</label>
            <input type="text" class="form-control" id="age" placeholder="Age" name="age" value="<?= $prescription->age; ?>">
            </div>
            <div class="form-group col-md-3">
            <label class="control-label mt-10" for="variation_item">Gender</label>
            <div class="radio radio-info">
                <input type="radio" name="gender" id="male" value="Male" <?= (($prescription->gender == "Male")? "checked":""); ?> >
                <label for="male"> Male </label> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" id="female" value="Female" <?= (($prescription->gender == "Female")? "checked":""); ?> >
                <label for="female"> Female </label>
            </div>
        </div>
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="due_date">Due Date <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control datepicker" id="due_date" placeholder="Due Date" name="due_date" value="<?= $prescription->due_date; ?>">
            </div>
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="shade_id"><button type="button" class="btn btn-link btn-icon-anim btn-sm text-primary ml-10 pa-0" title="Add New Patient" onclick="showModal('<?= site_url('office/prescriptions/add-shade-modal') ?>', 'Add New Patient')"><i class="fa fa-plus mt-5"></i></button> Shade </label>
                <select name="shade_id" id="shade_id" class="form-control select2">
                    <option value="">Select Shade</option>
                    <?php
                    foreach ($shades as $shadesVal) {
                    ?>
                        <option value="<?= $shadesVal->id; ?>" <?= (($shadesVal->id == $prescription->shade_id)?"selected":""); ?> ><?= $shadesVal->shade; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <span class="clearfix"></span>
            <?php 
                $i = 0;
                foreach ($v_cate as $Vdata) {
                $variations = $this->Variations_m->get_many_by(array('category_id=' . $Vdata->id));
            ?>
                <input type="hidden" name="cate_id[]" value="<?= $Vdata->id; ?>" />
                <input type="hidden" name="option_id[]" value="<?= $options_line[$i]->id; ?>" />
                <div class="form-group col-sm-4">
                    <label class="control-label mt-10" for="otps"><?= $Vdata->category_name; ?></label>
                    <select class="form-control select2" name="options_id[]" id="otps_<?= $Vdata->id; ?>">
                        <option value="">Select</option>
                        <?php foreach ($variations as $Vopt) { ?>
                            <option value="<?= $Vopt->id; ?>"<?= (($Vopt->id ==$options_line[$i]->options_id)?"selected":"") ; ?> ><?= $Vopt->variation_item; ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php
            $i++; } ?>
            <span class="clearfix"></span>
            <div class="form-group col-md-12">
                <label class="control-label mt-10" for="remarks">Remarks</label>
                <textarea class="form-control" id="remarks" placeholder="Remarks" name="remarks" rows="2"></textarea>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="form-group col-md-12 text-center">
                <label class="control-label mb-10" for="email">Position <sup class="text-danger">*</sup></label>
                <div class="row">
                    <div class="col-sm-6 col-xs-6 position br bb pa-0 text-center"><span id="pos_18"></span><span id="pos_17"></span><span id="pos_16"></span><span id="pos_15"></span><span id="pos_14"></span><span id="pos_13"></span><span id="pos_12"></span><span id="pos_11"></span></div>
                    <div class="col-sm-6 col-xs-6 position bb pa-0 text-center"><span id="pos_21"></span><span id="pos_22"></span><span id="pos_23"></span><span id="pos_24"></span><span id="pos_25"></span><span id="pos_26"></span><span id="pos_27"></span><span id="pos_28"></span></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-6 position br pa-0 text-center"><span id="pos_48"></span><span id="pos_47"></span><span id="pos_46"></span><span id="pos_45"></span><span id="pos_44"></span><span id="pos_43"></span><span id="pos_42"></span><span id="pos_41"></span></div>
                    <div class="col-sm-6 col-xs-6 position pa-0 text-center"><span id="pos_31"></span><span id="pos_32"></span><span id="pos_33"></span><span id="pos_34"></span><span id="pos_35"></span><span id="pos_36"></span><span id="pos_37"></span><span id="pos_38"></span></div>
                </div>
            </div>
            <div class="form-group col-md-12 text-center">
                <?php $this->load->view('teeths'); ?>
            </div>

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
        selectTeeth(<?= $prescription->id; ?>);
        get_sum();
        /* Select2 Init*/
        $(".select2").select2();

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            //endDate: '+0d',
            autoclose: true
        });
        i = 0;
        $('#add_line_items').on('click', function() {
            i += $('#productLine').length;
            var lineItem = `<tr>
                                    <td class="text-center">` + slno + `</td>
                                    <td><select id="select_` + i + `" class="form-control select2" onChange="get_product_rate(this.value,` + i + `)" name="product_id[]" required>
                                    <option value="">Select Products</option>
                                    <?php foreach ($products as $pValue) { ?>
                                    <option value="<?= $pValue->id; ?>"><?= $pValue->product_name; ?></option>
                                    <?php } ?>
                                    </select></td>
                                    <td><input type="text" id="quantity_` + i + `" onChange="get_total_amt(` + i + `)" class="form-control text-center" name="qty[]" value="0" /></td>
                                    <td><input type="text" id="rate_` + i + `" onChange="get_total_amt(` + i + `)" class="form-control text-right" name="rate[]" value="0.00" /></td>
                                    <td><input type="text" id="total_` + i + `" class="form-control text-right" name="total[]" value="0.00" /></td>
                                    <td><button type="button" id="lineId_` + i + `" name="" class="btn btn-sm btn-circle btn-danger" title="Remove Items" onClick="removeLine(` + i + `)"><i class="fa fa-minus mt-5"></i></button></td>
                                    </tr>`;
            $('#productLine').append(lineItem);
            slno++;
        });

        $('#clinic_id').on("change", function() {
            var id = this.value;
            $.ajax({
                type: "post",
                url: base_url + "masters/clinics/get_data_by_id",
                data: "id=" + id,
                success: function(response) {
                    var result = JSON.parse(response);
                    $("#clinic_name").val(result.clients_name);

                },
                error: function(err) {
                    console.log(err);
                }


            });
        })

        $('#printOrder').on('click', function() {
            var id = this.value;
            $.ajax({
                url : base_url + 'office/prescriptions/print_oder_form/'+id,
                success: function(result){
                    var content = result;
                    var printWindow = window.open('', 'PRINT', 'height=800,width=1000');
                    printWindow.document.write('<html><head><title>Order Form</title>');
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

    function removeLine(id) {
        $("#lineId_" + id).closest('tr').remove();
        slno--;
    }

    function get_product_rate(value, id) {
        var productId = value;
        $.ajax({
            type: "get",
            url: base_url + 'office/prescriptions/get-products-details/' + productId,
            success: function(result) {
                rslt = $.parseJSON(result);
                //console.log(rslt.price);
                price = rslt.price;
                $('#rate_' + id).val(parseInt(price).toFixed(2));
                get_total_amt(id);
            }
        })
    }

    function get_total_amt(id) {
        var qty = $('#quantity_' + id).val();
        var rate = $('#rate_' + id).val();
        var total = parseInt(qty) * parseInt(rate);
        $('#total_' + id).val(parseInt(total).toFixed(2))
        get_sum();
    }

    function get_sum() {
        var rateSum = 0;
        var totalSum = 0;
        var rateUpSum = 0;
        var totalUpSum = 0;
        var totalRate = $('[name="rate[]"]');
        var totalAmount = $('[name="total[]"]');
        var totalUpRate = $('[name="rate_up[]"]');
        var totalUpAmount = $('[name="total_up[]"]');
        totalRate.each(function() {
            rateSum += parseInt($(this).val());
        });
        totalUpRate.each(function() {
            rateUpSum += parseInt($(this).val());
        });
        $('#footerTotalRate').html('<span>' + ((rateSum + rateUpSum).toFixed(2)) + '</span>');
        totalAmount.each(function() {
            totalSum += parseInt($(this).val());
        });
        totalUpAmount.each(function() {
            totalUpSum += parseInt($(this).val());
        });
        $('#footerTotalAmt').html('<span>' + ((totalSum + totalUpSum).toFixed(2)) + '<input type="hidden" name="total_amount" value="' + ((totalSum + totalUpSum).toFixed(2)) + '"/></span>');

    }

    function selectTeeth(id) {
        $.ajax({
            url: base_url + "office/prescriptions/get_teeth_positions/" + id,
            success: function(response) {
                var result = JSON.parse(response);
                var data = result.prescription;

                var tl_position = (data.position_tl).split(",");
                for (i = 0; i < tl_position.length; i++) {
                    s_id = parseInt(tl_position[i]) + 10;
                    addHtml = "<input type='hidden' name='position_tl[]' value='" + tl_position[i] + "'/>" + tl_position[i];
                    $('#pos_' + s_id).html(addHtml);
                    $('.tooth-' + s_id + '-parent').css('fill', '#ff8b15');
                }

                var tr_position = (data.position_tr).split(",");
                for (j = 0; j < tr_position.length; j++) {
                    s_id = parseInt(tr_position[j]) + 20;
                    addHtml = "<input type='hidden' name='position_tr[]' value='" + tr_position[j] + "'/>" + tr_position[j];
                    $('#pos_' + s_id).html(addHtml);
                    $('.tooth-' + s_id + '-parent').css('fill', '#ff8b15');
                }

                var br_position = (data.position_br).split(",");
                for (k = 0; k < br_position.length; k++) {
                    s_id = parseInt(br_position[k]) + 30;
                    addHtml = "<input type='hidden' name='position_br[]' value='" + br_position[k] + "'/>" + br_position[k];
                    $('#pos_' + s_id).html(addHtml);
                    $('.tooth-' + s_id + '-parent').css('fill', '#ff8b15');
                }

                var bl_position = (data.position_bl).split(",");
                for (l = 0; l < bl_position.length; l++) {
                    s_id = parseInt(bl_position[l]) + 40;
                    addHtml = "<input type='hidden' name='position_bl[]' value='" + bl_position[l] + "'/>" + bl_position[l];
                    $('#pos_' + s_id).html(addHtml);
                    $('.tooth-' + s_id + '-parent').css('fill', '#ff8b15');
                }
            }
        });
    }

    function removeItem(id, lineid) {
        if (confirm("Do you want to delete this Item ?")) {
            $.ajax({
                type: "post",
                data: "line_id=" + id,
                url: base_url + "office/prescriptions/remove-line-item",
                success: function(response) {
                    $.toast({
                        heading: 'Error/Delete',
                        text: response.msg,
                        position: 'top-right',
                        loaderBg: '#e69a2a',
                        icon: 'error',
                        hideAfter: 3500,
                        stack: 6
                    });
                    $('#lineId_' + lineid).closest('tr').remove();
                    get_sum();
                }
            });
        }
    }
</script>
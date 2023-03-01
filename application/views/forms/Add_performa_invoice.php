<link href="<?= site_url('assets/vendors/bower_components/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-touchspin CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- select2 CSS -->
<link href="<?= site_url('assets/vendors/bower_components/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap-select CSS -->
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= site_url('assets/vendors/bower_components/bootstrap-image-checkbox/dist/css/bootstrap-image-checkbox.css'); ?>" rel="stylesheet" type="text/css" />
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
    .boldFont{
        font-weight: 600;
        font-size:medium;
    }

    .select2-container--default .select2-selection--single {
        border: 0px solid #aaa;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 40px;
    }
</style>

<div class="row">
    <form action="<?= site_url('office/Proformainvoice/save'); ?>" method="post" enctype="multipart/form-data">
        <div class="col-sm-8">
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="invoice_no">Invoice Number <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" placeholder="Invoice Number" value="<?= auto_number('proforma_invoice', 'invoice_no', 'PIN', 1000); ?>" readonly>
                <input type="hidden" id="invoice_no" placeholder="Invoice Number" name="invoice_no" value="<?= auto_number('proforma_invoice', 'invoice_no', 'PIN', 1000); ?>" />
            </div>
            <div class="form-group col-md-6">
                <label class="control-label mt-10" for="invoice_date">Invoice Date <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control datepicker" id="invoice_date" placeholder="Order Date" name="invoice_date" required value="<?= date('d-m-Y') ?>">
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label mt-10" for="order_id">Order Number <sup class="text-danger">*</sup> </label>
                <select name="order_id" id="order_id" class="form-control select2">
                    <option value="">Select Orders</option>
                    <?php
                    foreach ($orders as $val) {
                    ?>
                        <option value="<?= $val->id; ?>"><?= $val->po_number; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-12" id="loadOrderDetails">
                 
            </div>
            

        </div>
        <div class="col-sm-4" id="loadOder Details">
           
            <div class="form-group col-md-12 text-center">
                <label class="control-label mb-10" for="email">Position <sup class="text-danger">*</sup></label>
                <div class="row">
                    <div id="tl" class="col-sm-6 col-xs-6 position br bb pa-0 text-center boldFont">0</div>
                    <div id="tr" class="col-sm-6 col-xs-6 position bb pa-0 text-center boldFont">0</div>
                </div>
                <div class="row">
                    <div id="bl" class="col-sm-6 col-xs-6 position br pa-0 text-center boldFont">0</div>
                    <div id="br" class="col-sm-6 col-xs-6 position pa-0 text-center boldFont">0</div>
                </div>
            </div>
            
        </div>
        <div class="col-sm-12 mt-10">
            <div class="form-group col-md-12 table-responsive">
                <label class="control-label mb-10" for="email">Add Products <sup class="text-danger">*</sup></label>
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%" class="text-center">Sl.No</th>
                            <th>Particulars</th>
                            <th>Descriptions</th>
                            <th width="10%" class="text-center">Qty</th>
                            <th width="15%" class="text-center">Rate</th>
                            <th width="15%" class="text-center">Amount</th>
                            <th width="8%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="productLine">
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-right">Total</th>
                            <th class="text-right" id="footerTotalRate"><span>0.00</span></th>
                            <th class="text-right" id="footerTotalAmt"><span>0.00</span></th>
                            <th><button type="button" name="" id="add_line_items" class="btn btn-sm btn-circle btn-success" title="Add Line Items"><i class="fa fa-plus mt-5"></i></button></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-sm-12">
        <div class="form-actions col-md-12">
            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
        </div>
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
        i = 0;
        $('#add_line_items').on('click', function() {
            i += $('#productLine').length;
            slno++;
            var lineItem = `<tr>
                                    <td class="text-center">` + slno + `</td>
                                    <td><select id="select_` + i + `" class="form-control select2" name="product_id[]" required>
                                    <option value="">Select Products</option>
                                    <?php foreach ($products as $pValue) { ?>
                                    <option value="<?= $pValue->id; ?>"><?= $pValue->variation_item; ?></option>
                                    <?php } ?>
                                    </select></td>
                                    <td><input type="text" id="description_` + i + `" class="form-control text-center" name="line_description[]" value="" /></td>
                                    <td><input type="text" id="quantity_` + i + `" onChange="get_total_amt(` + i + `)" class="form-control text-center" name="qty[]" value="0" /></td>
                                    <td><input type="text" id="rate_` + i + `" onChange="get_total_amt(` + i + `)" class="form-control text-right" name="rate[]" value="0.00" /></td>
                                    <td><input type="text" id="total_` + i + `" class="form-control text-right" name="total[]" value="0.00" /></td>
                                    <td><button type="button" id="lineId_` + i + `" name="" class="btn btn-sm btn-circle btn-danger" title="Remove Items" onClick="removeLine(` + i + `)"><i class="fa fa-minus mt-5"></i></button></td>
                                    </tr>`;
            $('#productLine').append(lineItem);
           
        });

        $('#order_id').on("change", function() {
            var id = this.value;
            var html = "";

            $.ajax({
                type:"post",
                url:base_url+"office/proformainvoice/get-order-details",
                data: "id="+id,
                success:function(response){
                    var result = JSON.parse(response);
                    var orderDatails = result.row;
                    var selectedItem = result.selectedItems;
                    html = `<table class="table table-bordered table-stripped"><tbody><tr>
                            <th width="20%">Dr./Clinic Name: </th>
                            <td colspan="3" class="boldFont">`+ ((orderDatails.doctor_name)? "Dr. " + orderDatails.doctor_name : "M/s. " + orderDatails.clients_name) +`</td>
                            </tr><tr>
                            <th width="20%">Patient Name:</th>
                            <td class="boldFont">`+ orderDatails.patient_name +`</td>
                            <th width="15%">Age/ Gender</th>
                            <td class="boldFont">`+ orderDatails.age + "/ "+ orderDatails.gender +`</td>
                            </tr></tbody> </table> `;
                            $("#loadOrderDetails").html(html);
                            $('#tl').text(((orderDatails.position_tl)?orderDatails.position_tl : 0));
                            $('#tr').text(((orderDatails.position_tr)?orderDatails.position_tr:0));
                            $('#bl').text(((orderDatails.position_bl)?orderDatails.position_bl:0));
                            $('#br').text(((orderDatails.position_br)?orderDatails.position_br:0));
                            $('#productLine').empty();        
                    var i = $('#productLine').length;
                    for(x=0; x < selectedItem.length; x++){
                    i++; 
                    var lineItem = `<tr>
                        <td class="text-center">` + slno + `</td>
                        <td><select id="select_` + i + `" class="form-control select2" name="product_id[]" required>
                        <option value="">Select Products</option>
                        <option value="`+selectedItem[x].variationsId+`" selected>`+selectedItem[x].variation_item+`</option>
                        <?php foreach ($products as $pValue) { ?>
                            <option value="<?= $pValue->id; ?>"><?= $pValue->variation_item; ?></option>
                        <?php } ?>
                        </select></td>
                        <td><input type="text" id="description_` + i + `" class="form-control text-center" name="line_description[]" value="" /></td>
                        <td><input type="text" id="quantity_` + i + `" onChange="get_total_amt(` + i + `)" class="form-control text-center" name="qty[]" value="0" /></td>
                        <td><input type="text" id="rate_` + i + `" onChange="get_total_amt(` + i + `)" class="form-control text-right" name="rate[]" value="0.00" /></td>
                        <td><input type="text" id="total_` + i + `" class="form-control text-right" name="total[]" value="0.00" /></td>
                        <td><button type="button" id="lineId_` + i + `" name="" class="btn btn-sm btn-circle btn-danger" title="Remove Items" onClick="removeLine(` + i + `)"><i class="fa fa-minus mt-5"></i></button></td>
                        </tr>`;
                        $('#productLine').append(lineItem);
                        
                    }
                },
                error:function(err){
                    console.log(err);
                }


            });
        })

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
        var totalRate = $('[name="rate[]"]');
        var totalAmount = $('[name="total[]"]');
        totalRate.each(function() {
            rateSum += parseInt($(this).val());
        });
        $('#footerTotalRate').html('<span>' + rateSum.toFixed(2) + '</span>');
        totalAmount.each(function() {
            totalSum += parseInt($(this).val());
        });
        $('#footerTotalAmt').html('<span>' + totalSum.toFixed(2) + '<input type="hidden" name="total_amount" value="' + totalSum + '"/></span>');

    }
</script>
<style>
    body{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 12px;
    }
    table{
        font-size: 12px !important;
    }
    .bg_logo{
        background-image: url(<?= site_url('assets/dist/img/watermark_logo.png') ?>);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
    table {
        font-size: medium;
    }

    h1 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .no_margin {
        padding: 0px;
        margin: 0px;
    }

    .br_doted {
        border-bottom: 1px dotted #000;
        padding: 10px;
    }

    .textBold {
        font-size: 13;
        font-weight: 600;
        ;
    }

    .fontBig {
        font-size: large;
    }

    .br_t {
        border-top: 1px solid #000;
    }

    .br_l {
        border-left: 1px solid #000;
    }

    .br_r {
        border-right: 1px solid #000;
    }

    .br_b {
        border-bottom: 1px solid #000;
    }

    .table-bordered>tbody>tr>td,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>td,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>thead>tr>th {
        font-size: 10px;
    }

    .garyColor {
        font-size: 10px;
        color: gray;
    }
</style>
<!-- Row -->
<table cellpadding="0px" cellspacing="0px" width="100%" class="bg_logo">
    <tr>
        <td width="50%" valign="top">
            <table cellpadding="5px" cellspacing="0px" width="100%">
                <tr>
                    <td><img class="img-responsive" src="<?= site_url('assets/dist/img/logo_print.png'); ?>" width="60%" /> </td>
                </tr>
                <tr>
                    <td class="textBold"><?= (($company->addressLine1)? $company->addressLine1 . ", " : "") ; ?> <?= (($company->addressLine2)?$company->addressLine2.", ":""); ?>
                    <br /> <?= (($company->building)? $company->building . ", ":"") ; ?> <?= (($company->post)?$company->post.", ":""); ?> <?= (($company->district)?$company->district.", ":""); ?> 
                    <br /><?= (($company->phone)?$company->phone . ", ":"") ; ?> <?= $company->mobile; ?></td>
                </tr>
            </table>
        </td>
        <td width="50%" valign="center" align="center">
                <table cellpadding="5px" cellspacing="0px" width="100%">
                    <tr>
                        <th width="40%" class="br_b br_t br_l">Doctor Name <span style="float:right">:</span> </th>
                        <td width="60%" class="br_b br_t br_l br_r"><b><?= (($clinics->doctor_name)?"Dr. ". $clinics->doctor_name: ""); ?></b></td>
                    </tr>
                    <tr>
                        <th width="40%" class="br_b br_l">Clinic Name <span style="float:right">:</span></th>
                        <td width="60%" class="br_b br_l br_r"><b><?= (($clinics->clients_name)?"M/s. ". $clinics->clients_name: ""); ?></b></td>
                    </tr>
                    <tr>
                        <th width="40%" class="br_b br_l">Address <span style="float:right">:</span></th>
                        <td width="60%" class="br_b br_l br_r"><b><?= (($clinics->address)? $clinics->address: ""); ?></b></td>
                    </tr>
                </table> 
            
        </td>       
    </tr>
    <tr>
        <td colspan="2" align="center">
        <h1> STATEMENT REPORT <br /> <small><?= $page_name; ?></small></h1>
        </td>
    </tr>
    <tr>
        <td class="br_l br_t  br_r" align="center"><h1>Invoices</h1></td>
        <td class="br_t br_r" align="center"><h1>Receipts</h1></td>
    </tr>
    <tr>
        <td class="br_r" valign="top">
            <table cellpadding="5px" cellspacing="0px" width="100%">
                <thead>
                    <tr>
                        <th width="10%" class="br_t br_l">Sl. No.</th>
                        <th width="20%" class="br_t br_l">Invoice No.</th>
                        <th width="25%" class="br_t br_l">Date</th>
                        <th width="30%"class="br_t br_l">Work</th>
                        <th width="15%" class="br_t br_l">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="br_t br_l">#</td>
                        <td class="br_t br_l" colspan="3"><b><?= strtoupper('Opening Balance'); ?></b></td>
                        <td class="br_t br_l" align="right"><?= number_format($opening_balance,"2",".",","); ?></td>
                    </tr>
                    <?php 
                        $total = ($opening_balance)?$opening_balance:0;
                        if($proforma_items){ 
                        $slno = 1;
                        foreach($proforma_items as $value){ ?>
                    <tr>
                        <td class="br_t br_l" align="center"><?= $slno ?></td>
                        <td class="br_t br_l" align="center"><?= $value->invoice_no; ?></td>
                        <td class="br_t br_l" align="center"><?= date('d-m-Y', strtotime($value->invoice_date)); ?></td>
                        <td class="br_t br_l"><?= $value->work; ?></td>
                        <td class="br_t br_l" align="right"><?= number_format($value->total_amount,2); ?></td>
                    </tr>
                    <?php  
                    $total += $value->total_amount;
                    $slno++; } } else{ ?>
                        <tr>
                            <td class="br_t br_l" colspan="5" align="center"> No Data Available </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th  class="br_t br_l br_b" colspan="4" align="right"> Grand Total </th>
                        <th  class="br_t br_l br_b" align="right"><?= number_format($total, 2); ?></th>
                    </tr>
                </tfoot>
            </table>
        </td>
        <td valign="top">
        <table cellpadding="5px" cellspacing="0px" width="100%">
                <thead>
                    <tr>
                        <th width="10%" class="br_t">Sl. No.</th>
                        <th width="20%" class="br_t br_l">Ref No.</th>
                        <th width="25%" class="br_t br_l">Date</th>
                        <th width="30%"class="br_t br_l">Transaction</th>
                        <th width="15%" class="br_t br_l br_r">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $total_rec = 0;
                        if($receipts){ 
                        $slno1 = 1;
                        foreach($receipts as $value1){ ?>
                    <tr>
                        <td class="br_t" align="center"><?= $slno1 ?></td>
                        <td class="br_t br_l" align="center"><?= $value1->ref_no; ?></td>
                        <td class="br_t br_l" align="center"><?= date('d-m-Y', strtotime($value1->receipt_date)); ?></td>
                        <td class="br_t br_l"><?= $value1->transaction_mode; ?></td>
                        <td class="br_t br_l br_r" align="right"><?= number_format($value1->receipt_amount,2); ?></td>
                    </tr>
                    <?php  
                    $total_rec += $value1->receipt_amount;
                    $slno1++; } } else{ ?>
                        <tr>
                            <td class="br_t br_r" colspan="5" align="center"> No Data Available </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th  class="br_t br_b" colspan="4" align="right"> Grand Total </th>
                        <th  class="br_t br_l br_r br_b" align="right"><?= number_format($total_rec, 2); ?></th>
                    </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><br /><br /><h2>Current Balance : <?= number_format(($total - $total_rec),"2",".",","); ?>/-</h2></td>
    </tr>
</table>

<!-- /Row -->
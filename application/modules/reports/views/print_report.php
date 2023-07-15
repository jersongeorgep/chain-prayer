<style>
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
        font-size: 1.5rem;
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
        font-size: medium;
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
        font-size: medium;
    }

    .garyColor {
        font-size: small;
        color: gray;
    }
</style>
<!-- Row -->
<table cellpadding="0px" cellspacing="0px" width="100%" class="bg_logo">
    <tr>
        <td colspan="2" align="center">
        <h1> PROFORMA INVOICE REPORT </h1>
        </td>
    </tr>
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
        <td width="50%" valign="center" align="center"><h2><?= $page_name; ?></h2></td>       
    </tr>
    <tr>
        <td colspan="2">
            <table cellpadding="10px" cellspacing="0px" width="100%">
                <thead>
                    <tr>
                        <th class="br_t br_l">Sl. No.</th>
                        <th class="br_t br_l">Invoice No.</th>
                        <th class="br_t br_l">Date</th>
                        <th class="br_t br_l">Order No.</th>
                        <th class="br_t br_l">Work</th>
                        <th class="br_t br_l">Patient Name</th>
                        <th class="br_t br_l br_r">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($proforma_items){ 
                        $slno = 1;
                        $total = 0;
                        foreach($proforma_items as $value){ ?>
                    <tr>
                        <td class="br_t br_l" align="center"><?= $slno ?></td>
                        <td class="br_t br_l" align="center"><?= $value->invoice_no; ?></td>
                        <td class="br_t br_l" align="center"><?= $value->invoice_date; ?></td>
                        <td class="br_t br_l" align="center"><?= $value->po_number; ?></td>
                        <td class="br_t br_l"><?= $value->work; ?></td>
                        <td class="br_t br_l"><?= $value->patient_name; ?></td>
                        <td class="br_t br_l br_r" align="right"><?= number_format($value->total_amount,2); ?></td>
                    </tr>
                    <?php  
                    $total += $value->total_amount;
                    $slno++; } } else{ ?>
                        <tr>
                            <td colspan="7" align="center"> No Data Available </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th  class="br_t br_l br_b" colspan="6" align="right"> Grand Total </th>
                        <th  class="br_t br_l br_r br_b" align="right"><?= number_format($total, 2); ?></th>
                    </tr>
                </tfoot>
            </table>
        </td>
    </tr>
</table>

<!-- /Row -->
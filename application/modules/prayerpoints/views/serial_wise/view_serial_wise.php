<style>
    .text-md-text {
    font-size: 1.1rem!important;
}
</style>
<section class="invoice" id="group_list">
<div class="row">
    <div class="col-12 text-center">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td class="pb-0">
                        <h5 class="text-bold text-larger"><?= $headers->praise; ?></h5>
                        <h2 class="text-bold text-larger"><?= $headers->title; ?></h2>
                        <h4 class="text-bold mt-0"><?= $headers->details; ?></h4>
                        <p class="<?= (($language->lang_code == 'tam' || $language->lang_code == 'mal')? 'text-md' : 'text-lg'); ?>"><?= $headers->verses; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="pt-0 pb-0">
                        <h4 class="text-bold"><?= strtoupper('Prayer Points'); ?> - (<?= $serial_no->serial_no; ?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small class="pull-right"><span><?= date('d-m-Y'); ?></span></small></h4>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <table class="table table-sm text-md-text">
            <tbody>
                <?php  if(!empty($points)): ?>
                    <?php 
                        $field = 'point_'.$language->lang_code; ?>
                    <?php foreach($points as $val): ?>
                <tr>
                    <td width="5%" class="text-center"><?= $val->title; ?></td>
                    <td width="95%" class="text-justify"><?= $val->$field; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</section>
<button type="button" class="btn btn-success btn-sm mt-2" id="printBtn" onclick="printMe()"><i class="fa fa-print"></i> Print</button> 

<script>
    function printMe() {
    var disp_setting="toolbar=yes,location=no,";
        disp_setting+="directories=yes,menubar=yes,";
        disp_setting+="scrollbars=yes,width=1000, height=900, left=100, top=25";
        var content_vlue = document.getElementById('group_list').innerHTML;
        var docprint=window.open("","",disp_setting);
        docprint.document.open();
        docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
        docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
        docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
        docprint.document.write('<head><title>Prayer Points</title>');
        docprint.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">');
        docprint.document.write('<link rel="stylesheet" href="'+ base_url +'assets/plugins/fontawesome-free/css/all.min.css">');
        docprint.document.write('<link rel="stylesheet" href="'+ base_url +'assets/dist/css/adminlte.min.css">');
        docprint.document.write('<style type="text/css">body{ margin:0px;');
            docprint.document.write('font-family:verdana,Arial;color:#000;');
            docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:14px;}');
            docprint.document.write('.table>tbody>tr>td,.table>tbody>tr>th { border-top: none; !important}');
            docprint.document.write('@media print {.page-break  { display:block; page-break-before:always; } @page { margin:15mm 15mm 15mm 15mm;}}');
        <?php if($language->lang_code == 'hin'): ?>
            docprint.document.write('.text-md-text {font-size: 1.48rem!important;');
        <?php elseif($language->lang_code == 'eng' || $language->lang_code == 'tel'): ?>
            docprint.document.write('.text-md-text {font-size: 1.4rem!important;');
        <?php elseif($language->lang_code == 'tam'): ?>
            docprint.document.write('.text-md-text {font-size: 1.38em!important;');
        <?php else: ?>
            docprint.document.write('.text-md-text {font-size: 1.22rem!important;');
        <?php endif; ?>
        docprint.document.write('a{color:#000;text-decoration:none;}</style>');
        docprint.document.write('</head><body onLoad="self.print()"><center>');
        docprint.document.write(content_vlue);
        docprint.document.write('</center></body></html>');
        docprint.document.close();
        docprint.focus();
        } 
    
</script>
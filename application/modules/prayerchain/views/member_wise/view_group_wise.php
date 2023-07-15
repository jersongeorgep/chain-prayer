<section class="invoice" id="group_list">
<div class="row">
    <div class="col-12 text-center">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td class="pb-0">
                        <h5 class="text-bold text-larger"><?= $headers->praise; ?></h5>
                        <h3 class="text-bold text-larger"><?= $headers->title; ?></h3>
                        <h4 class="text-bold mt-0"><?= $headers->details; ?></h4>
                        <p class="text-sm"><?= $headers->verses; ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="pt-0 pb-0">
                        <h5 class="text-bold"><?= strtoupper('Prayer Chain Group'); ?> <?= $group_no; ?></h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-6">
        <table class="table table-sm text-sm">
            <tbody>
                <?php foreach ($left_time as $value) : ?>
                    <?php $members =  members_time_slot($center_id, $group_no, $value->id, $language->id) ?>
                    <tr>
                        <td width="20%"><?= $value->prayer_time; ?> </td>
                        <td><?php foreach ($members as  $value) : ?>
                                <p class="text-bold mb-0"><?= $value->bro_sis; ?> <?= $value->memberName; ?> [<?= (($value->code) ? $value->code : code_generate($value->localName)); ?>]</p>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-6">
        <table class="table table-sm text-sm">
            <tbody>
                <?php foreach ($right_time as $value) : ?>
                    <?php $members =  members_time_slot($center_id, $group_no, $value->id, $language->id); ?>
                    <tr>
                        <td width="20%"><?= $value->prayer_time; ?> </td>
                        <td><?php foreach ($members as  $value) : ?>
                                <p class="text-bold mb-0"><?= $value->bro_sis; ?> <?= $value->memberName; ?> [<?= (($value->code) ? $value->code : code_generate($value->localName)); ?>]</p>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <td>
                        <h5 class="text-bold text-center"><?= $terms->title; ?></h5>
                        <p class="text-sm text-md"><?= $terms->terms; ?></p>
                    </td>
                </tr>
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
        docprint.document.write('<head><title>Prayer Group List</title>');
        docprint.document.write(' <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">');
        docprint.document.write(' <link rel="stylesheet" href="'+ base_url +'assets/plugins/fontawesome-free/css/all.min.css">');
        docprint.document.write(' <link rel="stylesheet" href="'+ base_url +'assets/dist/css/adminlte.min.css">');
        docprint.document.write('<style type="text/css">body{ margin:0px;');
        docprint.document.write('font-family:verdana,Arial;color:#000;');
        docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
        docprint.document.write('.table>tbody>tr>td,.table>tbody>tr>th { border-top: none; !important}');
        docprint.document.write('a{color:#000;text-decoration:none;}</style>');
        docprint.document.write('</head><body onLoad="self.print()"><center>');
        docprint.document.write(content_vlue);
        docprint.document.write('</center></body></html>');
        docprint.document.close();
            docprint.focus();
        }
</script>
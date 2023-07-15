<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>Prayer Group List</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= site_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dist/css/adminlte.min.css'); ?>">
    <style type="text/css">
        body {
            font-family: verdana, Arial;
            color: #000;
            font-family: Verdana, Geneva, sans-serif;
            font-size: 12px;
            margin: 0 !important;
            padding: 0 !important;
            height: auto;
            overflow: hidden;
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th {
            border-top: none !important;
            margin: 0px !important;
            padding: 0px !important;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        @media print {
            .print:last-child {
                page-break-after: avoid;
                page-break-inside: avoid;
                margin-bottom: 0px;
            }

            .page-break {
                page-break-before: always;
                page-break-after: avoid;
            }

            @page {
                /* size: A4; */
                /* DIN A4 standard, Europe */
                margin: 15mm 15mm 15mm 15mm !important;
            }
        }
    </style>
</head>

<body onLoad="self.print()">
    <?php if (!empty($viewMembers)) : ?>
        <?php foreach ($viewMembers as  $memberValue) :
            $language = $this->db->select('*')->from('languages')->where('id', $memberValue->lang_id)->get()->row();
            $headers = $this->db->select('*')->from('header_data')->where('lang_id', $memberValue->lang_id)->get()->row();
            $terms = $this->db->select('*')->from('terms')->where('lang_id', $memberValue->lang_id)->get()->row();
        ?>
            <table class="table table-sm m-0 p-0">
                <tr>
                    <td colspan="2">
                        <table class="table table-sm m-0 p-0">
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <h5 class="text-bold text-larger m-0"><?= $headers->praise; ?></h5>
                                        <h3 class="text-bold text-large m-0 p-1"><?= $headers->title; ?></h3>
                                        <h4 class="text-bold mt-0 p-1"><?= $headers->details; ?></h4>
                                        <p class="text-sm m-0"><?= $headers->verses; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <h5 class="text-bold"><?= strtoupper('Prayer Chain Group'); ?> <?= $memberValue->group_no; ?> <small><span class="pull-right">(<?= date('d-m-Y'); ?>)</span></small></h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                    <table class="table table-sm m-0">
                            <tbody>
                                <?php foreach ($left_time as $value) : ?>
                                    <?php $members =  members_time_slot($memberValue->group_no, $value->id, $memberValue->lang_id) ?>
                                    <tr>
                                        <td width="25%" class="text-bold m-0"><?= $value->prayer_time; ?> </td>
                                        <td width="75%"><?php foreach ($members as  $value) : ?>
                                                <p class="text-bold text-sm m-0 p-0"><?= $value->bro_sis; ?> <?= $value->memberName; ?> (<?= (($value->code) ? $value->code : code_generate($value->localName)); ?>)</p>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                    <td width="50%">
                    <table class="table table-sm m-0">
                            <tbody>
                                <?php foreach ($right_time as $value) : ?>
                                    <?php $members =  members_time_slot($memberValue->group_no, $value->id, $memberValue->lang_id); ?>
                                    <tr>
                                        <td width="25%" class="text-bold m-0"><?= $value->prayer_time; ?> </td>
                                        <td width="75%"><?php foreach ($members as  $value) : ?>
                                                <p class="text-bold text-sm m-0 p-0"><?= $value->bro_sis; ?> <?= $value->memberName; ?> (<?= (($value->code) ? $value->code : code_generate($value->localName)); ?>)</p>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <table class="table table-sm m-0">
                            <tbody>
                                <tr>
                                    <td colspan="3"><h5 class="text-bold text-center m-0 p-1"><?= $terms->title; ?></h5></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p class="text-sm m-0 p-0"><?= $terms->terms; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $lang_name = $language->lang_code . "_name"; ?>
                                    <td class="text-center text-md"><b><?= $memberValue->bro_sis; ?> <?= $memberValue->$lang_name; ?> </b></td>
                                    <td class="text-center text-lg"><b><?= $memberValue->localName; ?></b></td>
                                    <td class="text-center text-lg"><b><?= $memberValue->prayer_time; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="page-break"></div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>
<!-- <button type="button" class="btn btn-success btn-sm mt-2" id="printBtn" onclick="printMe()"><i class="fa fa-print"></i> Print</button> -->
<script>
    /* function printMe() {
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
        } */
</script>
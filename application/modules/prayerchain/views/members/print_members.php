<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>Prayer Group List</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= site_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dist/css/adminlte.min.css'); ?>">
    <style type="text/css">
        body {
            margin: 0px;
            font-family: verdana, Arial;
            color: #000;
            font-family: Verdana, Geneva, sans-serif;
            font-size: 12px;
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th {
            border-top: none !important;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }

            @page {
                /* size: A4; */
                /* DIN A4 standard, Europe */
                margin: 10mm 10mm 10mm 10mm;
            }
        }
    </style>
</head>

<body onLoad="self.print()">
    <center>
        <?php if (!empty($members)) : 
            //print_r($members);
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline table-sm text-sm" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th colspan="8" class="text-center">
                                    <h3>Members Register</h3>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center" width="7%">Sl. No</th>
                                <th class="text-center">Name </th>
                                <th width="15%" class="text-center">Mobile</th>
                                <th width="10%" class="text-center">Time</th>
                                <th width="10%" class="text-center">Local</th>
                                <th width="10%" class="text-center">Center</th>
                                <th width="10%" class="text-center">Language</th>
                                <th width="10%" class="text-center">Group</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            <?php 
                                $slNo = 1;
                                foreach ($members as $member) : ?>
                                <tr>
                                    <td class="text-center"><?= $slNo; ?></td>
                                    <td><?= $member->bro_sis; ?> <?= $member->eng_name; ?></td>
                                    <td class="text-center"><?= $member->mobile; ?></td>
                                    <td class="text-center"><?= $member->prayer_time; ?></td>
                                    <td><?= $member->localName; ?></td>
                                    <td><?= $member->centerName; ?></td>
                                    <td><?= $member->language; ?></td>
                                    <td class="text-center"><?= $member->group_no; ?></td>
                                </tr>
                            <?php
                            $slNo++;
                            endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </center>
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
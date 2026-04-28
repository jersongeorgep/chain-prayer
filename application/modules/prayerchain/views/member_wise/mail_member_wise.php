<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
    <title>Prayer Group List</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <style type="text/css">
        body{ margin:0px; font-family:verdana,Arial;color:#000; font-family:Verdana, Geneva, sans-serif; font-size:12px;}
        .table>tbody>tr>td,.table>tbody>tr>th { border-top: none !important; margin: 0px !important; padding: 0px !important; }
        a{color:#000;text-decoration:none;}
        
    </style>
    </head>
    <body>
<?php if(!empty($viewMembers)): ?>
 <?php foreach ($viewMembers as  $memberValue): 
    $language = $this->db->select('*')->from('languages')->where('id', $memberValue->lang_id)->get()->row();
    $headers = $this->db->select('*')->from('header_data')->where('lang_id', $memberValue->lang_id)->get()->row();
    $terms = $this->db->select('*')->from('terms')->where('lang_id', $memberValue->lang_id)->get()->row();
    ?>   
    <table style="width: 100%; margin-bottom: 1rem; color: #212529; background-color: transparent; font-size: .875rem!important;">
            <tbody>
                <tr>
                    <td class="pb-0" align="center">
                        <h5 style="margin-bottom: 0.5rem; font-family: inherit;line-height: 1.2; color: inherit; font-weight: 700; font-size: 1.25rem;"><?= $headers->praise; ?></h5>
                        <h3 style="margin-bottom: 0.5rem; font-family: inherit;line-height: 1.2; color: inherit; font-weight: 700; font-size: 1.75rem;"><?= $headers->title; ?></h3>
                        <h4 style="margin-bottom: 0.5rem; font-family: inherit;line-height: 1.2; color: inherit; font-size: 1.5rem; margin-top:0px"><?= $headers->details; ?></h4>
                        <p class="text-sm"><?= $headers->verses; ?>
                    </td>
                </tr>
                <tr>
                    <td class="pt-0 pb-0" align="center">
                        <h5 style="margin-bottom: 0.5rem; font-family: inherit; color: inherit; font-weight: 700; font-size: 1.25rem;"><?= strtoupper('Prayer Chain Group'); ?> <?= $group_no; ?> <small><span class="pull-right"><?= date('d-m-Y'); ?></span></small></h5>
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; margin-bottom: 1rem; color: #212529; background-color: transparent; font-size: .875rem!important;">
            <tr>
                <td align="center">
                <table style="width: 100%; margin-bottom: 1rem; color: #212529; background-color: transparent; font-size: .875rem!important;">
            <tbody>
                <?php foreach ($left_time as $value) : ?>
                    <?php $members =  members_time_slot( $group_no, $value->id, $memberValue->lang_id) ?>
                    <tr>
                        <td width="20%"><?= $value->prayer_time; ?> </td>
                        <td><?php foreach ($members as  $value) : ?>
                                <p style="font-weight: 700; margin-bottom: 0!important;"><?= $value->bro_sis; ?> <?= $value->memberName; ?> (<?= (($value->code) ? $value->code : code_generate($value->localName)); ?>)</p>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
                </td>

                <td>
                <table style="width: 100%; margin-bottom: 1rem; color: #212529; background-color: transparent; font-size: .875rem!important;">
            <tbody>
                <?php foreach ($right_time as $value) : ?>
                    <?php $members =  members_time_slot( $group_no, $value->id, $memberValue->lang_id); ?>
                    <tr>
                        <td width="20%"><?= $value->prayer_time; ?> </td>
                        <td><?php foreach ($members as  $value) : ?>
                                <p style="font-weight: 700; margin-bottom: 0!important;" ><?= $value->bro_sis; ?> <?= $value->memberName; ?> (<?= (($value->code) ? $value->code : code_generate($value->localName)); ?>)</p>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 1rem; color: #212529; background-color: transparent; font-size: .875rem!important;">
            <tbody>
                <tr>
                    <td colspan="3">
                        <h5 style="margin-bottom: 0.5rem; font-family: inherit;line-height: 1.2; color: inherit; font-weight: 700; font-size: 1.25rem; text-align: center!important;"><?= $terms->title; ?></h5>
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

<?php endforeach; ?>
</section>
<?php endif; ?>
</body></html>

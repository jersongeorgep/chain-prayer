<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prayer Points</title>
    <style>
        @page {
            margin: 1cm;
        }
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 12pt;
            color: #333;
            line-height: 1.4;
        }
        .text-center {
            text-align: center;
        }
        .text-bold {
            font-weight: bold;
        }
        .text-larger {
            font-size: 1.5rem;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .header-table td {
            padding: 5px;
            border: none;
        }
        .points-table {
            width: 100%;
            border-collapse: collapse;
        }
        .points-table td {
            padding: 8px;
            border-top: 1px solid #dee2e6;
            vertical-align: top;
        }
        .sl-no {
            width: 5%;
            text-align: center;
        }
        .point-text {
            width: 95%;
            text-align: justify;
        }
        h2, h4, h5 {
            margin: 5px 0;
        }
        .pull-right {
            float: right;
        }
        <?php if($language->lang_code == 'hin'): ?>
            body { font-size: 14pt; }
        <?php elseif($language->lang_code == 'tam'): ?>
            body { font-size: 13pt; }
        <?php elseif($language->lang_code == 'mal'): ?>
            body { font-size: 13pt; }
        <?php endif; ?>
    </style>
</head>
<body>
    <div class="text-center">
        <h5 class="text-bold"><?= $headers->praise; ?></h5>
        <h2 class="text-bold text-larger"><?= $headers->title; ?></h2>
        <h4 class="text-bold"><?= $headers->details; ?></h4>
        <p><?= $headers->verses; ?></p>
        <hr>
        <h4 class="text-bold">
            PRAYER POINTS - (<?= $serial_no->serial_no; ?>)
            <span style="float: right; font-size: 0.8rem; font-weight: normal;"><?= date('d-m-Y'); ?></span>
        </h4>
    </div>

    <table class="points-table">
        <tbody>
            <?php if(!empty($points)): ?>
                <?php $field = 'point_'.$language->lang_code; ?>
                <?php foreach($points as $val): ?>
                <tr>
                    <td class="sl-no"><?= $val->title; ?></td>
                    <td class="point-text"><?= $val->$field; ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

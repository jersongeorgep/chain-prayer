        <!-- Select2 -->
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">

        <form id="quickForm" action="<?= site_url('settings/update_settings/'. $settings->id ); ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-sm-12 col-md-12 select2-blue">
                    <label for="center_id">Center <sup class="text-danger">*</sup></label>
                    <select class=" form-control select2" name="center_id[]" id="center_id" multiple="multiple" data-placeholder="Select a Center" data-dropdown-css-class="select2-blue" style="width: 100%;" >
                        <option value="">Select</option>
                        <?php if ($center_fh) : 
                            $groupCenters = explode(',', $settings->group_center);
                            ?>
                            <?php foreach ($center_fh as $value) : ?>
                                <option value="<?= $value->id; ?>" <?= (in_array($value->id, $groupCenters) ? "selected" : "") ;?>><?= $value->centerName; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
        <script src="<?= site_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

        <script>
            $(function() {
                $('.select2').select2();


            });

        </script>
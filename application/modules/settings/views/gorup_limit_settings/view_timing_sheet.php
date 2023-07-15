<section class="invoice" id="group_list">
<div class="row">
    <div class="col-12 text-center table-responsive">
        <form action="<?= site_url('settings/Members_limit_settings/update_timing')?>" method="post">
        <?php if(!empty($times)): ?>
        <table class="table table-sm">
           <thead>
                <tr>
                    <th width="10%">Sl No.</th>
                    <th width="80%">Time</th>
                    <th width="10%">Members</th>
                </tr>
           </thead>
           <tbody>
                <?php for($i = 0; $i < count($times); $i++): ?>
                <tr>
                    <td>
                        <input type="text" class="form-control form-control-sm text-center" value="<?= $i + 1;?>" readonly />
                        <input type="hidden" name="centerId[]" id="centerId_<?= $i; ?>" value="<?= $center_fh->id; ?>" />
                        <input type="hidden" name="timeId[]" id="timeId_<?= $i; ?>" value="<?= $times[$i]->id; ?>" />
                    </td>
                    <td><input type="text" name="time[]" id="time_<?= $i; ?>" class="form-control form-control-sm text-bold" value="<?= $times[$i]->prayer_time; ?>" readonly /></td>
                    <td><input type="text" name="allow_members[]" id="allow_members_<?= $i; ?>" class="form-control form-control-sm text-center" value="<?= $times[$i]->allowed_member; ?>" /></td>
                </tr>
                <?php endfor; ?>
                <tr>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="left_limit">Left Time Limit</label>
                                <input type="text" class="form-control form-control-sm text-center" name="left_limit" id="left_limit" placeholder="Left Time Limit" value="<?= (!empty($time_limit->left_limit))? $time_limit->left_limit : ""?>"/>
                            </div>
                            <div class=" col-sm-6">
                                <label for="left_limit">Right Time Limit</label>
                                <input type="text" class="form-control form-control-sm text-center" name="right_limit" id="right_limit" placeholder="Right Time Limit" value="<?= (!empty($time_limit->right_limit))? $time_limit->right_limit : ""?>" />
                            </div>
                        </div>
                    </td>
                </tr>
           </tbody>
           <tfoot>
            <tr>
                <th colspan="3" class="text-left">
                    <button type="submit" class="btn btn-success">Update</button>
                </th>
            </tr>
           </tfoot>
        </table>
        <?php endif; ?>
        </form>
    </div>
</div>
</section>
<script>
   
</script>
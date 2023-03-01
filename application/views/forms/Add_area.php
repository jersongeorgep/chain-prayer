<?= isset($errors); ?>
<form method="post" action="<?= site_url('masters/areas/save/') ?>" enctype="multipart/form-data">
    <div class="form-group col-md-6">
        <label class="control-label mb-10" for="area">Area Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="area" placeholder="Area Name" name="area" required>
    </div>
    <div class="form-actions mt-10">
        <button type="submit" class="btn btn-success mr-10 mt-30"> <i class="fa fa-save"></i> Save</button>
    </div>
</form>
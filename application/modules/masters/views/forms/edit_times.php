        <form id="quickForm" action="<?= site_url('masters/times/update/'.$editTime->id)?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                  <div class="form-group">
                    <label for="prayer_time">Time</label>
                    <input type="text" name="prayer_time" class="form-control form-control-sm" id="prayer_time" placeholder="Time" value="<?= $editTime->prayer_time; ?>">
                  </div>
                  <div class="form-group">
                    <label for="allowed_member">Max Allowed Member</label>
                    <input type="text" name="allowed_member" class="form-control form-control-sm" id="allowed_member" placeholder="Allowed Member" value="<?= $editTime->allowed_member; ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
    <script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
    <script src="<?= site_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>

    <script>
$(function () {
  $('#quickForm').validate({
    rules: {
        prayer_time: {
        required: true
      },
      allowed_member: {
        required: true,
      }
    },
    messages: {
        prayer_time: {
        required: "Please enter a time",
      },
      allowed_member: {
        required: "Please enter allowed members",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }

  });
});

</script>
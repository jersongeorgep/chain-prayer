        <form id="quickForm" action="<?= site_url('masters/center-fhs/save')?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                  <div class="form-group">
                    <label for="centerName">Center <sup class="text-danger">*</sup></label>
                    <input type="text" name="centerName" class="form-control form-control-sm" id="centerName" placeholder="Center">
                  </div>
                  <div class="form-group">
                    <label for="center_code">Center Code <sup class="text-danger">*</sup></label>
                    <input type="text" name="center_code" class="form-control form-control-sm" id="center_code" placeholder="Country Code">
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
        centerName: {
        required: true
      },
      center_code: {
        required: true,
      }
    },
    messages: {
        centerName: {
        required: "Please enter a Center Name",
      },
      center_code: {
        required: "Please enter country code",
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
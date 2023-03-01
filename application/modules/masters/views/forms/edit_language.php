          <form id="quickForm" action="<?= site_url('masters/languages/update/'.$language->id)?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                  <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" name="language" class="form-control form-control-sm" id="language" placeholder="Language" value="<?= $language->language; ?>">
                  </div>
                  <div class="form-group">
                    <label for="lang_code">code</label>
                    <input type="text" name="lang_code" class="form-control form-control-sm" id="lang_code" placeholder="Code" value="<?= $language->lang_code; ?>">
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
        language: {
        required: true
      },
      lang_code: {
        required: true,
      }
    },
    messages: {
        prayer_time: {
        required: "Please enter a Language",
      },
      allowed_member: {
        required: "Please enter Code",
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
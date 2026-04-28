        <!-- Select2 -->
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
        <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">

        <form id="quickForm" action="<?= site_url('prayerchain/members/save') ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body row">
                <div class="form-group col-sm-12 col-md-3">
                    <label for="center_id">Center <sup class="text-danger">*</sup></label>
                    <select class="form-control form-control-sm select2" name="center_id" id="center_id">
                        <option value="">Select</option>
                        <?php if ($center_fh) : ?>
                            <?php foreach ($center_fh as $value) : ?>
                                <option value="<?= $value->id; ?>"><?= $value->centerName; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-3">
                    <label for="local_id">Local <sup class="text-danger">*</sup></label>
                    <select class="form-control form-control-sm select2" name="local_id" id="local_id">
                        <option value="">Select</option>                        
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-3">
                    <label for="time_id">Time <sup class="text-danger">*</sup></label>
                    <select class="form-control form-control-sm select2" name="time_id" id="time_id">
                        <option value="">Select</option>
                        <?php if ($times) : ?>
                            <?php foreach ($times as $value) : ?>
                                <option value="<?= $value->id; ?>"><?= $value->prayer_time; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-3">
                    <label for="lang_id">Language <sup class="text-danger">*</sup></label>
                    <select class="form-control form-control-sm select2" name="lang_id" id="lang_id">
                        <option value="">Select</option>
                        <?php if ($language) : ?>
                            <?php foreach ($language as $value) : ?>
                                <option value="<?= $value->id; ?>"><?= $value->language; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="group_no">Group No. <sup class="text-danger">*</sup></label>
                    <input type="text" name="group_no" class="form-control form-control-sm" id="group_no" placeholder="Group No." readonly>
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="bro_sis">Bro. /Sis. <sup class="text-danger">*</sup></label>
                    <select class="form-control form-control-sm select2" name="bro_sis" id="bro_sis">
                        <option value="">Select</option>
                        <?php if ($brosis) : ?>
                            <?php foreach ($brosis as $value) : ?>
                                <option value="<?= $value; ?>"><?= $value; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="eng_name">Name in English <sup class="text-danger">*</sup></label>
                    <input type="text" name="eng_name" class="form-control form-control-sm" id="eng_name" placeholder="Name (ENG)">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="mal_name">Name in Malayalam <sup class="text-danger">*</sup></label>
                    <input type="text" name="mal_name" class="form-control form-control-sm" id="mal_name" placeholder="Name (MAL)">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="tam_name">Name in Tamil</label>
                    <input type="text" name="tam_name" class="form-control form-control-sm" id="tam_name" placeholder="Name (TAM)">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="tel_name">Name in Telugu</label>
                    <input type="text" name="tel_name" class="form-control form-control-sm" id="tel_name" placeholder="Name (TEL)">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="hin_name">Name in Hindi</label>
                    <input type="text" name="hin_name" class="form-control form-control-sm" id="hin_name" placeholder="Name (HIN)">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="kan_name">Name in Kannada</label>
                    <input type="text" name="kan_name" class="form-control form-control-sm" id="kan_name" placeholder="Name (KAN)">
                </div>
                <div class="form-group col-12">
                    <label for="mobile">Mobile No.</label>
                    <input type="text" name="mobile" class="form-control form-control-sm" id="mobile" placeholder="Mobile">
                </div>
                <div class="form-group col-12">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control form-control-sm" id="email" placeholder="E-mail">
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

                $('#quickForm').validate({
                    rules: {
                        center_id: {
                            required: true
                        },
                        local_id: {
                            required: true,
                        },
                        time_id: {
                            required: true,
                        },
                        lang_id: {
                            required: true,
                        },
                        group_no: {
                            required: true,
                        },
                        bro_sis: {
                            required: true,
                        },
                        eng_name: {
                            required: true,
                        },
                        mobile: {
                            required: true,
                        }
                    },
                    messages: {
                        center_id: {
                            required: "Please choose  Center",
                        },
                        local_id: {
                            required: "Please choose Local ",
                        },
                        time_id: {
                            required: "Please choose time",
                        },
                        lang_id: {
                            required: "Please choose Language",
                        },
                        group_no: {
                            required: "Please enter Group Code",
                        },
                        bro_sis: {
                            required: "Please enter Bro/Sis",
                        },
                        eng_name: {
                            required: "Please enter Eng Name",
                        },
                        mobile: {
                            required: "Please enter Mobile",
                        },
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });

                $('#center_id').on('change', function(){
                    var centerId = this.value;
                    $.ajax({
                        type : "post",
                        url : base_url + 'prayerchain/members/get_local_fhs',
                        data : "center_id="+centerId,
                        cache : false,
                        async : false,
                        success : function(response){
                            var data = JSON.parse(response);
                            $('#local_id').empty();
                            var html = '<option value="">Select</option>';
                            for(let i = 0; i < data.length; i++){
                                html += '<option value="'+ data[i].id +'">'+ data[i].localName +'</option>';
                            }
                            $('#local_id').append(html);
                        }
                    });
                });

                $('#time_id').on('change', function() {
                    var timeId = this.value;
                    var centerId = $('#center_id').val();
                    $.ajax({
                        type : "POST",
                        url : base_url + 'prayerchain/members/get_group_number',
                        data : "timeId="+ timeId +"&centerId="+centerId,
                        cache : false,
                        async : false,
                        success : function(response){
                            console.log(response);
                            $('#group_no').val(response);
                        }
                    });
                })

            });

        </script>
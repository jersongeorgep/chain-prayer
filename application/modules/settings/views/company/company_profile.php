<!-- Row -->
<div class="row">
    <div class="col-lg-3 col-xs-12">
        <div class="panel panel-default card-view  pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body  pa-0">
                    <div class="profile-box">
                        <div class="profile-cover-pic">
                            <div class="profile-image-overlay"></div>
                        </div>
                        <div class="profile-info text-center">
                            <div class="profile-img-wrap">
                                <img class="inline-block mb-10" src="<?= site_url('assets/dist/img/logo.png'); ?>" alt="user" />
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">edit</span>
                                    <input class="upload" type="file">
                                </div>
                            </div>
                            <h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger"><?= $company->name; ?></h5>
                            <h6 class="block capitalize-font pb-20"><?= $company->addressLine1; ?> <?= $company->addressLine2; ?></h6>
                        </div>
                        <div class="social-info">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <span class="counts block head-font"><span class="counter-anim">345</span></span>
                                    <span class="counts-text block">post</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <span class="counts block head-font"><span class="counter-anim">246</span></span>
                                    <span class="counts-text block">followers</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <span class="counts block head-font"><span class="counter-anim">898</span></span>
                                    <span class="counts-text block">tweets</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-xs-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pb-0">
                    <div class="tab-struct custom-tab-1">
                        <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                            <li class="active" role="presentation" class=""><a data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Company</span></a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent_8">
                            <div id="settings_8" class="tab-pane fade active in" role="tabpanel">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body pa-0">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-wrap">
                                                            <form action="<?= site_url('settings/company/update/1'); ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="form-body overflow-hide">
                                                                    <div class="form-group col-sm-12">
                                                                        <label class="control-label mb-10" for="name">Name</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Company Name" value="<?= $company->name; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label mb-10" for="addressLine1">Address 01</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-flag-o"></i></div>
                                                                            <input type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="Company Name" value="<?= $company->addressLine1; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label mb-10" for="addressLine2">Address 02</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-flag-o"></i></div>
                                                                            <input type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="addressLine2" value="<?= $company->addressLine2; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="control-label mb-10" for="building">Building</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                                                            <input type="text" class="form-control" id="building" placeholder="Building" name="building" value="<?= $company->building; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="control-label mb-10" for="pincode">Pin Code</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-star-o"></i></div>
                                                                            <input type="text" class="form-control" id="pincode" placeholder="PIN code" name="pincode" value="<?= $company->pincode; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="control-label mb-10" for="post">Post Office</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                            <select class="form-control" id="post" name="post" tabindex="1">
                                                                            <option value="<?= $company->post; ?>" selected><?= $company->post; ?></option>
                                                                            <option value="">Select Post Office</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="control-label mb-10" for="district">District</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-flag-o"></i></div>
                                                                            <input type="text" class="form-control" id="district" placeholder="District" name="district" value="<?= $company->district; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="control-label mb-10" for="state">State</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-flag-o"></i></div>
                                                                            <input type="text" class="form-control" id="state" placeholder="state" name="state" value="<?= $company->state; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="control-label mb-10" for="country">Country</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-flag-o"></i></div>
                                                                            <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?= $company->country; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label mb-10" for="phone">Phone</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone"  value="<?= $company->phone; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label mb-10" for="email">E-mail</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-envelope"></i></div>
                                                                            <input type="text" class="form-control" id="email" placeholder="email" name="email"  value="<?= $company->email; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label mb-10" for="mobile">Mobile</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                                                            <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="<?= $company->mobile; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label mb-10" for="website">Website</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-globe"></i></div>
                                                                            <input type="text" class="form-control" id="website" placeholder="Website" name="website"  value="<?= $company->website; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label mb-10" for="gstNumber">GST Number</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                                                            <input type="text" class="form-control" id="gstNumber" placeholder="GST" name="gstNumber" value="<?= $company->gstNumber; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label mb-10" for="contactPerson">Contact Person</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                            <input type="text" class="form-control" id="contactPerson" placeholder="Contact Person" name="contactPerson" value="<?= $company->contactPerson; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label class="control-label mb-10" for="companyLogo">Company Logo</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="icon-folder"></i></div>
                                                                            <input type="file" class="form-control" id="companyLogo" placeholder="Company Logo" name="companyLogo" value="<?= $company->companyLogo; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions mt-10">
                                                                    <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /Row -->
<script>
   $(function(){
        $("#pincode").on('change', function(e){
            var pin = this.value;
            $.ajax({
                type : "get",
                url : base_url+"settings/company/get_postal_details/"+pin,
                success : function(response){
                    result = jQuery.parseJSON(response);
                    var data = result[0].PostOffice;
                    $("#post").empty();
                    var opts = '<option value="">Select Post Office</option>'
                    for(i=0; i<data.length; i++){
                        opts += '<option value="'+data[i].Name+'">'+data[i].Name+'</option>'
                    }
                    $("#post").append(opts);
                    $('#district').val(data[0].District);
                    $('#state').val(data[0].State);
                    $('#country').val(data[0].Country);
                  //  console.log(result[0].PostOffice);
                }

            });
        });
   });
</script>
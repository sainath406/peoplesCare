<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/admin/components/select2/dist/css/select2.min.css">
        <?php $this->load->view('common/head_admin'); ?>
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/admin/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/admin/plugins/iCheck/all.css">
        <style>
            .select2 {font-size: 12px;}
            hr {margin-bottom: 10px; margin-top: 10px;}
            .error_frm {font-size: 12px; color: red; display: inline-block;}
            .star {color: red;}
            #profile {overflow: hidden;text-overflow: ellipsis;white-space: nowrap;border: none;padding-left: 0;padding-top: 0;}
            #profile:focus {outline: none;}
            .med_add_class { padding: 10px 0; display: none;}
            .grp_add_class { padding: 10px 0; display: none;}
            .btn-box-tool {padding: 5px 10px;}
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <?php $this->load->view('common/header_admin'); ?>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="m-heading">
                    <h4 style="margin: 0;">Add Patient</h4>
                </div>
                <div class="container-fluid" style="margin-top: 25px;">
                    <div class="col-sm-12">
                        <?php if ($this->session->flashdata('success') != '') { ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success!</h4>
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php } if ($this->session->flashdata('error') != '') { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <form role="form" action="<?= base_url('admin_login/addPatient'); ?>" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="box box-warning box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title font-mont">Patient Details</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Profile Picture</label><br/>
                                                <img src="<?= config_item('root_dir') . "assets/images/profile.png"; ?>" width="70%" height="auto" style="border: 1px solid #dedede;" />
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="profile" name="profile">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Patient Name</label>
                                                        <span class="star">*</span>
                                                        <input type="text" class="form-control" autocomplete="off" id="patient_name" name="patient_name" maxlength="75" value="<?= set_value('patient_name') ?>" onkeypress="return allowalphaspace(event)" placeholder="Enter Patient Name">
                                                        <?= form_error('patient_name'); ?>
                                                    </div>
                                                </div>  
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Patient ID</label>
                                                        <input type="text" class="form-control" id="patient_id" autocomplete="off" maxlength="50" name="patient_id" value="<?= set_value('patient_id') ?>" placeholder="Enter Patient Id">
                                                        <?= form_error('patient_id'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender">
                                                            <option value="" <?= set_select('gender', "", TRUE) ?>> -- Select Gender -- </option>
                                                            <option value="Male" <?= set_select('gender', "Male") ?>>Male</option>
                                                            <option value="Female" <?= set_select('gender', "Female") ?>>Female</option>
                                                        </select>
                                                        <?= form_error('gender'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Patient Age</label>
                                                        <input type="text" class="form-control" id="age" autocomplete="off" name="age" maxlength="3" value="<?= set_value('age') ?>" onkeypress="return isNumberPress(event)" placeholder="Enter Patient Age">
                                                        <?= form_error('age'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Date Of Birth</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                            <input type="text" class="form-control pull-right" autocomplete="off" id="datepicker" name="dob" value="<?= set_value('dob') ?>" readonly placeholder="Choose Date Of Birth">
                                                            <?= form_error('dob'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Referred By</label>
                                                        <select class="form-control select2" id="reference" name="reference" style="width: 100%;">
                                                            <option value="" <?= set_select('reference', "", TRUE) ?>> -- Select Reference -- </option>
                                                            <?php foreach ($refs as $ref) { ?>
                                                                <option value="<?= $ref->id; ?>" <?= set_select('reference', $ref->id) ?>><?= $ref->ref_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?= form_error('reference'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Blood Group</label>
                                                        <select class="form-control select2" id="blood" name="blood" style="width: 100%;">
                                                            <option value="" <?= set_select('blood', "", TRUE) ?>> -- Select Blood Group -- </option>
                                                            <?php foreach ($bloods as $blood) { ?>
                                                                <option value="<?= $blood->id; ?>" <?= set_select('blood', $blood->id) ?>><?= $blood->b_group_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?= form_error('blood'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-warning box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title font-mont">Contact Details</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Primary Mobile No.</label>
                                                        <span class="star">*</span>
                                                        <input type="text" class="form-control" id="p_mobile" name="p_mobile" value="<?= set_value('p_mobile') ?>" autocomplete="off" maxlength="15" onkeypress="return isNumberPress(event)" placeholder="Enter Primary Number">
                                                        <?= form_error('p_mobile'); ?>
                                                    </div>
                                                </div>  
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Secondary Mobile No.</label>
                                                        <input type="text" class="form-control" id="s_mobile" name="s_mobile" value="<?= set_value('s_mobile') ?>" autocomplete="off" maxlength="15" onkeypress="return isNumberPress(event)" placeholder="Enter Secondary Number">
                                                        <?= form_error('s_mobile'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Language Preference</label>
                                                        <select class="form-control select2" id="language" name="language" style="width: 100%;">
                                                            <?php foreach ($langs as $lang) { ?>
                                                                <option value="<?= $lang->id; ?>" <?= set_select('language', $lang->id) ?>><?= $lang->language; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?= form_error('language'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Land Line Nos.</label>
                                                        <input type="text" class="form-control" id="landline" maxlength="10" value="<?= set_value('landline') ?>" autocomplete="off" onkeypress="return isNumberPress(event)" name="landline" placeholder="Enter Landline No.">
                                                        <?= form_error('landline'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="Email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" maxlength="75" autocomplete="off" placeholder="Enter Email Address">
                                                        <?= form_error('email'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Street Address</label>
                                                        <input type="text" class="form-control" id="street" name="street" value="<?= set_value('street') ?>" autocomplete="off" placeholder="Enter Street Address">
                                                        <?= form_error('street'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Locality</label>
                                                        <input type="text" class="form-control" id="locality" name="locality" value="<?= set_value('patient_name') ?>" autocomplete="off" placeholder="Enter Locality">
                                                        <?= form_error('locality'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city') ?>" autocomplete="off" maxlength="50" placeholder="Enter City Name">
                                                        <?= form_error('city'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Pincode</label>
                                                        <input type="text" class="form-control" id="pincode" autocomplete="off" name="pincode" value="<?= set_value('pincode') ?>" maxlength="8" placeholder="Enter pincode">
                                                        <?= form_error('pincode'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="box box-warning box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title font-mont">Medical History</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" id="med_plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body" style="max-height: 340px; overflow-y: scroll;">
                                        <div class="col-md-12">
                                            <div class="med_add_class">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Enter Item" id="med_add" name="med_add">
                                                        <label class="input-group-btn"><span class="btn btn-warning" id="submit_med">Add Item</span></label>
                                                    </div>
                                                    <span class="error error_med"></span>
                                                </div>
                                            </div>
                                            <div id="each_med">
                                                <?php foreach ($med_his as $med) { ?>
                                                    <label>
                                                        <input type="checkbox" name="med_his[]" value="<?= $med->id; ?>" class="minimal">&nbsp;&nbsp;<?= $med->med_his; ?>
                                                    </label>
                                                    <hr>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-warning box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title font-mont">Groups</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" id="groups_plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body" style="max-height: 260px; overflow-y: scroll;">
                                        <div class="col-md-12">
                                            <div class="grp_add_class">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Enter Item" id="grp_add" name="grp_add">
                                                        <label class="input-group-btn"><span class="btn btn-warning" id="submit_grp">Add Item</span></label>
                                                    </div>
                                                    <span class="error error_grp"></span>
                                                </div>
                                            </div>
                                            <div id="each_grp">
                                                <?php foreach ($groups as $group) { ?>
                                                    <label>
                                                        <input type="checkbox" name="groups[]" value="<?= $group->id; ?>" class="minimal">&nbsp;&nbsp;<?= $group->group_name; ?>
                                                    </label>
                                                    <hr>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-block btn-primary btn-flat font-mont" style="margin-bottom: 35px;">Submit Patient Details</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer_admin'); ?>
        <script src="<?= config_item('root_dir'); ?>assets/admin/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="<?= config_item('root_dir'); ?>assets/admin/components/select2/dist/js/select2.full.min.js"></script>
        <script src="<?= config_item('root_dir'); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
        <?php $this->load->view('admin/common/addPatient'); ?>
    </body>
</html>

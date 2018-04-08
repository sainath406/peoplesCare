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
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <?php $this->load->view('common/header_admin'); ?>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="m-heading">
                    <h4 style="margin: 0;">Add Appointment</h4>
                </div>
                <div class="container" style="margin-top: 25px;">
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
                    <form role="form" action="<?= base_url('admin_login/addAppointment'); ?>" method="post">
                        <div class="col-sm-12">
                            <div class="box box-warning box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title font-mont">Appointment Details</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Patient Name</label>
                                                    <span class="star">*</span>
                                                    <input type="text" class="form-control" autocomplete="off" id="patient_name" name="patient_name" maxlength="75" value="<?= set_value('patient_name') ?>" onkeypress="return allowalphaspace(event)" placeholder="Enter Patient Name">
                                                    <?= form_error('patient_name'); ?>
                                                </div>
                                            </div>  
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Patient ID</label>
                                                    <input type="text" class="form-control" id="patient_id" autocomplete="off" maxlength="50" name="patient_id" value="<?= set_value('patient_id') ?>" placeholder="Enter Patient Id">
                                                    <?= form_error('patient_id'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <span class="star">*</span>
                                                    <input type="text" class="form-control" id="mobile" autocomplete="off" maxlength="15" name="mobile" value="<?= set_value('mobile') ?>" placeholder="Enter Mobile Number" onkeypress="return isNumberPress(event)">
                                                    <?= form_error('mobile'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" id="email" autocomplete="off" name="email" maxlength="75" value="<?= set_value('email') ?>" placeholder="Enter Email">
                                                    <?= form_error('email'); ?>
                                                </div>
                                            </div>
<!--                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Date Of Birth</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control pull-right" autocomplete="off" id="datepicker" name="dob" value="<?= set_value('dob') ?>" readonly placeholder="Choose Date Of Birth">
                                                        <?= form_error('dob'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
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
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-block btn-primary btn-flat font-mont" style="margin-bottom: 35px;">Submit Appointment</button>
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

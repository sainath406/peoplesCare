<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/head_admin'); ?>
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/admin/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <?php $this->load->view('common/header_admin'); ?>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="m-heading">
                    <h4 style="margin: 0;">Add Patient</h4>
                </div>
                <div class="container" style="margin-top: 25px;">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title font-mont">Patient Details</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" action="<?= base_url('admin_login/contacted_members'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Patient Name</label>
                                                <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Enter Patient Name">
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Patient ID</label>
                                                <input type="text" class="form-control" id="patient_id" placeholder="Enter Patient Id">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value=""> -- Select Gender -- </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Patient Age</label>
                                                <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input type="text" class="form-control pull-right" id="datepicker" name="dob" readonly placeholder="Choose Date Of Birth">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer_admin'); ?>
        <script src="<?= config_item('root_dir'); ?>assets/admin/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script>
            $(function () {
                $('#datepicker').datepicker({
                    autoclose: true,
                    format: 'dd-mm-yyyy'
                })
            });
        </script>
    </body>
</html>

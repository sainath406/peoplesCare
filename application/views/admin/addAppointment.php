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
            .select2-container .select2-search--inline .select2-search__field {height: 22px;}
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
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Doctors</label>
                                                    <select class="form-control select2" id="doctors" name="doctors" style="width: 100%;">
                                                        <option value="" <?= set_select('doctors``', "", TRUE) ?>> -- Select Doctor -- </option>
                                                        <?php foreach ($doctors as $doctor) { ?>
                                                            <option value="<?= $doctor->id; ?>" <?= set_select('doctors', $doctor->id) ?>><?= $doctor->doctor_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?= form_error('doctors'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control select2" id="category" name="category" style="width: 100%;">
                                                        <option value="" <?= set_select('category``', "", TRUE) ?>> -- Select Category -- </option>
                                                        <?php foreach ($categories as $category) { ?>
                                                            <option value="<?= $category->id; ?>" <?= set_select('category', $category->id) ?>><?= $category->category_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?= form_error('category'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Scheduled On</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control pull-right" data-provide="datepicker" autocomplete="off" id="datepicker" name="schedule_date" value="<?= set_value('schedule_date') ?>" readonly placeholder="Choose Schedule Date">
                                                        <?= form_error('schedule_date'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Planned Procedures</label>
                                                    <select class="form-control select2" name="procedures" multiple="multiple" data-placeholder="Select a Procedures" style="width: 100%;">
                                                        <option>Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                                </div>
                                            </div>
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
        <script>
                                                        $(function () {
                                                            $('.select2').select2()

                                                            $('#datepicker').datepicker({
                                                                autoclose: true,
                                                                startDate: 'd',
                                                                format: 'dd-mm-yyyy',
                                                                todayHighlight: true
                                                            })
                                                        });
        </script>
        <script type="text/javascript">
            function isNumberPress(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }

            $(document).ready(function () {
                $("input, textarea").on("keypress", function (e) {
                    if (e.which === 32 && !this.value.length)
                        e.preventDefault();
                });
            });

            function allowalphaspace(event) {
                var inputValue = event.which;
                if ((inputValue > 47 && inputValue < 58) && (inputValue != 32)) {
                    event.preventDefault();
                }
            }
        </script>
    </body>
</html>

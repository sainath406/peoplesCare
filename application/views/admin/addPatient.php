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
                    <form role="form" action="<?= base_url('admin_login/contacted_members'); ?>" method="post">
                        <div class="col-sm-9">
                            <div class="box box-warning box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title font-mont">Patient Details</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Patient Name</label>
                                                    <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Enter Patient Name">
                                                </div>
                                            </div>  
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Patient ID</label>
                                                    <input type="text" class="form-control" id="patient_id" placeholder="Enter Patient Id">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender">
                                                        <option value=""> -- Select Gender -- </option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Patient Age</label>
                                                    <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Date Of Birth</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control pull-right" id="datepicker" name="dob" readonly placeholder="Choose Date Of Birth">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Referred By</label>
                                                    <select class="form-control select2" name="reference" style="width: 100%;">
                                                        <option value=""> -- Select Reference -- </option>
                                                        <?php foreach ($refs as $ref) { ?>
                                                            <option value="<?= $ref->id; ?>"><?= $ref->ref_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Blood Group</label>
                                                    <select class="form-control select2" name="blood" style="width: 100%;">
                                                        <option value=""> -- Select Blood Group -- </option>
                                                        <?php foreach ($bloods as $blood) { ?>
                                                            <option value="<?= $blood->id; ?>"><?= $blood->b_group_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Profile Picture</label>
                                                    <div class="input-group">
                                                        <label class="input-group-btn">
                                                            <span class="btn btn-warning">
                                                                Browse <input type="file" style="display: none;" name="profile">
                                                            </span>
                                                        </label>
                                                        <input type="text" class="form-control" placeholder="Click Browse To Choose" readonly>
                                                    </div>
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
                                                    <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Enter Patient Name">
                                                </div>
                                            </div>  
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Secondary Mobile No.</label>
                                                    <input type="text" class="form-control" id="patient_id" placeholder="Enter Patient Id">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Language Preference</label>
                                                    <select class="form-control select2" name="language" style="width: 100%;">
                                                        <?php foreach ($langs as $lang) { ?>
                                                            <option value="<?= $lang->id; ?>"><?= $lang->language; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Land Line Nos.</label>
                                                    <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Street Address</label>
                                                    <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Locality</label>
                                                    <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="box box-warning box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title font-mont">Medical History</h3>
                                </div>
                                <div class="box-body" style="max-height: 260px; overflow-y: scroll;">
                                    <div class="col-md-12">
                                        <?php foreach ($med_his as $med) { ?>
                                            <label>
                                                <input type="checkbox" name="med_his[]" value="<?= $med->id; ?>" class="minimal">&nbsp;&nbsp;<?= $med->med_his; ?>
                                            </label>
                                            <hr>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-warning box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title font-mont">Groups</h3>
                                </div>
                                <div class="box-body" style="max-height: 260px; overflow-y: scroll;">
                                    <div class="col-md-12">
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
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-block btn-primary btn-flat font-mont" style="margin-top: 25px;">Submit Patient Details</button>
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
                    format: 'dd-mm-yyyy'
                })

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                })
            });
        </script>
        <script>
            $(function () {
                // We can attach the `fileselect` event to all file inputs on the page
                $(document).on('change', ':file', function () {
                    var input = $(this),
                            numFiles = input.get(0).files ? input.get(0).files.length : 1,
                            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                    input.trigger('fileselect', [numFiles, label]);
                });

                // We can watch for our custom `fileselect` event like this
                $(document).ready(function () {
                    $(':file').on('fileselect', function (event, numFiles, label) {

                        var input = $(this).parents('.input-group').find(':text'),
                                log = numFiles > 1 ? numFiles + ' files selected' : label;

                        if (input.length) {
                            input.val(log);
                        } else {
                            if (log)
                                alert(log);
                        }

                    });
                });

            });
        </script>
    </body>
</html>

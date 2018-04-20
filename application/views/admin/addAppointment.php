<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/admin/components/select2/dist/css/select2.min.css">
        <?php $this->load->view('common/head_admin'); ?>
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/admin/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/admin/plugins/iCheck/all.css">
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/jquery/jquery-ui.css">
        <link rel="stylesheet" href="<?= config_item('root_dir'); ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.css">
        <script src="<?= config_item('root_dir'); ?>assets/admin/components/select2/dist/js/select2.full.min.js"></script>
        <script>
            $(function () {
                $('.select2').select2();
                $('.timepicker').timepicker({
                    showInputs: false
                });
                $('#datepicker').datepicker({
                    autoclose: true,
                    minDate: 'D',
                    showAnim: 'slideDown',
                    changeMonth: true,
                    changeYear: true,
                    setDate: 'D',
                    dateFormat: 'dd-mm-yy',
                    todayHighlight: true
                });
                $('#datepicker').datepicker('setDate', 'today');
            });
        </script>
        <style>
            .select2 {font-size: 12px;}
            hr {margin-bottom: 10px; margin-top: 10px;}
            .error_frm {font-size: 12px; color: red; display: inline-block;}
            .star {color: red;}
            .select2-container .select2-search--inline .select2-search__field {height: 22px;padding-left: 7px;}
            .ui-menu .ui-menu-item {font-size: 12px; font-family: work sans; }
            .ui-menu .ui-menu-item .ui-state-active{border:none !important;background:#efefef; border-bottom: 1px solid #ccc !important; border-top: 1px solid #ccc !important;}
            .ui-menu .ui-menu-item:hover {border:none;}
            #ui-id-1 { max-height: 150px; overflow-y: scroll; overflow-x: hidden; }
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0; 
            }
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
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Patient Name / Phone</label>
                                                    <span class="star">*</span>
                                                    <input type="text" class="form-control" autocomplete="off" name="patient_name" maxlength="75" id="p_name" placeholder="Enter Patient Name / Phone" value="<?= set_value('patient_name') ?>">
                                                    <input type="hidden" id="hidden_patient" name="hidden_patient" value="<?= set_value('hidden_patient'); ?>">                            
                                                    <?= ((form_error('patient_name')) ? form_error('patient_name') : form_error('hidden_patient')); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <span class="star">*</span>
                                                    <input type="text" class="form-control" id="mobile" autocomplete="off" maxlength="15" name="mobile" value="<?= set_value('mobile') ?>" placeholder="Enter Mobile Number" onkeypress="return isNumberPress(event)">
                                                    <?= form_error('mobile'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Doctors</label>
                                                    <span class="star">*</span>
                                                    <select class="form-control select2" id="doctors" name="doctors" style="width: 100%;">
                                                        <option value="" <?= set_select('doctors', "", TRUE) ?>> -- Select Doctor -- </option>
                                                        <?php foreach ($doctors as $doctor) { ?>
                                                            <option value="<?= $doctor->id; ?>" <?= set_select('doctors', $doctor->id) ?> <?= (($doctor->id == 2) ? 'selected' : ''); ?>><?= $doctor->doctor_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?= form_error('doctors'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Clinics</label>
                                                    <span class="star">*</span>
                                                    <select class="form-control select2" id="clinic" name="clinic" style="width: 100%;">
                                                        <option value="" <?= set_select('clinic', "", TRUE) ?>> -- Select Clinic -- </option>
                                                        <?php foreach ($clinics as $clinic) { ?>
                                                            <option value="<?= $clinic->id; ?>" <?= set_select('clinic', $clinic->id) ?> <?= (($clinic->id == 1) ? 'selected' : ''); ?> ><?= $clinic->clinic_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?= form_error('clinic'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <span class="star">*</span>
                                                    <select class="form-control select2" id="category" name="category" style="width: 100%;">
                                                        <option value="" <?= set_select('category``', "", TRUE) ?>> -- Select Category -- </option>
                                                        <?php foreach ($categories as $category) { ?>
                                                            <option value="<?= $category->id; ?>" <?= set_select('category', $category->id) ?>><?= $category->category_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?= form_error('category'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Scheduled On</label>
                                                    <span class="star">*</span>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control pull-right" data-provide="datepicker" autocomplete="off" id="datepicker" name="schedule_date" value="<?= set_value('schedule_date') ?>" readonly placeholder="Choose Schedule Date">
                                                    </div>
                                                    <?= form_error('schedule_date'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>Time</label>
                                                    <span class="star">*</span>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control timepicker" name="time" id="time" autocomplete="off" value="<?= set_value('time') ?>" placeholder="Select Time">
                                                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                                    </div>
                                                    <?= form_error('time'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Duration</label>
                                                    <span class="star">*</span>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="duration" id="duration" autocomplete="off" value="<?= ((set_value('duration')) ? set_value('duration') : 30); ?>" placeholder="Enter Duration" onkeypress="return isNumberPress(event)">
                                                        <div class="input-group-addon">Minutes</div>
                                                    </div>
                                                    <?= form_error('duration'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Planned Procedures</label>
                                                    <select class="form-control select2" name="procedures[]" multiple="multiple" data-placeholder="Select a Procedures" style="width: 100%;">
                                                        <?php foreach ($procedures as $pro) { ?>
                                                            <option value="<?= $pro->id ?>" <?= set_select('procedures[]', $pro->id) ?>><?= $pro->procedure_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?= form_error('procedures[]'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Notes</label>
                                                    <textarea name="description" class="form-control" rows="3" autocomplete="off" placeholder="Appointment Description"><?= set_value('description') ?></textarea>
                                                    <?= form_error('description'); ?>
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
        <script src="<?= config_item('root_dir'); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
        <script src="<?= config_item('root_dir'); ?>assets/jquery/jquery-ui.min.js"></script>
        <script src="<?= config_item('root_dir'); ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
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
        <script>
            $(document).ready(function () {
                var BASE_URL = '<?= base_url(); ?>';
                function split(val) {
                    return val.split(/,\s*/);
                }
                function extractLast(term) {
                    return split(term).pop();
                }
                $("#p_name").bind("keydown", function (event) {
                    var hidename = $("#hidden_patient").val().trim();
                    if (hidename != '') {
                        $.ajax({
                            type: "POST",
                            url: BASE_URL + "admin_login/checkPatient",
                            data: 'id=' + hidename,
                            success: function (msg) {
                                var name = $("#p_name").val().trim();
                                if (msg != name) {
                                    $('#p_name').val('');
                                    $('#hidden_patient').val('');
                                    $('#mobile').val('');
                                    $('#mobile').removeAttr("readonly");
                                    $('#p_name').focus();
                                    return false;
                                }
                            }
                        });
                    }
                    if (event.keyCode === $.ui.keyCode.TAB && $(this).data("autocomplete").menu.active) {
                        event.preventDefault();
                    }
                }).autocomplete({
                    source: function (request, response) {
                        $.getJSON(BASE_URL + "admin_login/getPatients", {
                            p_name: extractLast(request.term)
                        }, response);
                    },
                    search: function () {
                        // custom minLength
                        var term = extractLast(this.value);
                        if (term.length < 1) {
                            return false;
                        }
                    },
                    focus: function () {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function (event, ui) {
                        var terms = split(this.value);
                        // remove the current input
                        terms.pop();
                        $("#hidden_patient").val(ui.item.value);
                        // add the selected item
                        terms.push(ui.item.label);
                        // add placeholder to get the comma-and-space at the end
                        terms.push("");
                        this.value = terms.join("");
                        var dataa = (ui.item.label).trim();
                        var intValArray = dataa.split('||');
                        $('#mobile').val(intValArray[1].trim());
                        $('#mobile').attr("readonly", "readonly");
                        return false;
                    }
                });
            });
        </script>
    </body>
</html>

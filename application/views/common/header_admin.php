<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header loggedin-logo">
                <a href="<?= base_url('admin_login'); ?>" class="navbar-brand"><b>Admin</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?= base_url('admin_login'); ?>">Dashboard</a></li>
                    <li><a href="<?= base_url('calendar'); ?>">Calendar</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Patients <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('admin_login/addPatient'); ?>">Add Patient</a></li>
                            <li><a href="<?= base_url('admin_login/addAppointment'); ?>">Add Appointment</a></li> 
                            <li><a href="<?= base_url('patient_vital_signs'); ?>">Vital Signs</a></li>
                            <li><a href="<?= base_url('patient_clinical_notes'); ?>">Clinical Notes</a></li>
                            <li><a href="<?= base_url('patient_treatment_plans'); ?>">Treatment Plans</a></li>
                            <li><a href="<?= base_url('patient_completed_procedures'); ?>">Completed Procedures</a></li>
                            <li><a href="<?= base_url('patient_prescription'); ?>">Prescription</a></li>
                            <li><a href="<?= base_url('patient_invoice'); ?>">Invoice</a></li>
                            <li><a href="<?= base_url('patient_medical_records'); ?>">Medical Records</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('appointment_members'); ?>">Appointments</a></li>
                    <li><a href="<?= base_url('reports'); ?>">Reports</a></li>
                    <li><a href="<?= base_url('back_office'); ?>">Back Office</a></li>
                    <li><a href="<?= base_url('cms'); ?>">CMS</a></li>
                    <li><a href="<?= base_url('seo'); ?>">SEO</a></li>
                    <li><a href="<?= base_url('support'); ?>">Support</a></li>
                    <li><a href="<?= base_url('settings'); ?>">Settings</a></li>
                </ul>
            </div>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle login-name" data-toggle="dropdown"><?= $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname') . ' ' ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('admin/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
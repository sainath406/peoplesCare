<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/head_admin'); ?>
        <style>
            .patients {padding-top: 15px; padding-bottom: 15px; overflow: hidden;}
            .profile_name {white-space: nowrap; text-overflow: ellipsis; font-size: 12px; margin-top: 5px; overflow: hidden; text-transform: capitalize; line-height: 19px; margin-bottom: 0; padding: 5px 0px; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;}
            .profile_list {padding: 5px; border: 1px solid #ddd; margin-bottom: 15px;}
            .profile_list img { border: 1px solid #eee; height: 139px;}
            .icon_crud a {padding: 0px 5px;}
            .pagination {margin: 0 0 15px 0;}
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <?php $this->load->view('common/header_admin'); ?>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="m-heading">
                    <h4 style="margin: 0;">Patients List</h4>
                </div>
                <div class="container-fluid">
                    <div class="container">
                        <div class="well search_bar">
                            <form role="form" action="<?= base_url('admin_login/patient_list'); ?>" method="get">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" autocomplete="off" id="name" placeholder="Search by Name" value="<?= $name; ?>">
                                            <input type="hidden" name="limit" value="<?= $limit; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" autocomplete="off" id="email" placeholder="Search by Email" value="<?= $email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone" autocomplete="off" id="phone" placeholder="Search by Phone" value="<?= $phone; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="reg">
                                                <option value="" <?= (($reg == "") ? "selected" : ""); ?>> -- Search by Register Type -- </option>
                                                <option value="1" <?= (($reg == "1") ? "selected" : ""); ?>>Patient</option>
                                                <option value="2" <?= (($reg == "2") ? "selected" : ""); ?>>Appointment</option>
                                                <option value="3" <?= (($reg == "3") ? "selected" : ""); ?>>Contact Us</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="<?= base_url('admin_login/patient_list'); ?>" class="btn btn-default">Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="container">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div style="padding: 5px 15px; overflow: hidden;">
                                        <div class="col-md-2">
                                            <span>
                                                <form role="form" class="form-horizontal" action="<?= base_url('admin_login/patient_list' . $querystring); ?>" method="get">
                                                    Records
                                                    <select name="limit" class="records-control dropdown1" onchange="this.form.submit();">
                                                        <option value="12" <?= ($limit == '12') ? 'selected' : ''; ?>>12</option>
                                                        <option value="24" <?= ($limit == '24') ? 'selected' : ''; ?>>24</option>
                                                        <option value="48" <?= ($limit == '48') ? 'selected' : ''; ?>>48</option>
                                                        <option value="72" <?= ($limit == '72') ? 'selected' : ''; ?>>72</option>
                                                        <option value="96" <?= ($limit == '96') ? 'selected' : ''; ?>>96</option>
                                                    </select>
                                                    <input type="hidden" name="name" value="<?= $name; ?>">
                                                    <input type="hidden" name="email" value="<?= $email; ?>">
                                                    <input type="hidden" name="reg" value="<?= $reg; ?>">
                                                    <input type="hidden" name="phone" value="<?= $phone; ?>">
                                                </form>
                                            </span>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 2px;">
                                            <span class="countclass"><?= 'Count : <b>' . $ttl_rows . '</b>'; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-body">
                                <div class="patients">
                                    <?php foreach ($patients as $patient) { ?>
                                        <div class="col-md-2">
                                            <div class="profile_list">
                                                <img src="<?= (($patient->profile) ? config_item('root_dir') . "assets/profile_pictures/" . $patient->profile : config_item('root_dir') . "assets/images/profile.png") ?>" width="100%" height="auto" />
                                                <p class="text-center profile_name">
                                                    <?= $patient->p_name; ?><br/>
                                                    <span>Ph : <?= $patient->p_mobile; ?></span>
                                                </p>
                                                <p class="text-center icon_crud" style="margin: 7px 7px 2px 7px;">
                                                    <a href="<?= base_url('admin_login/viewPatient/' . $patient->id); ?>" class="btn btn-warning" title="View Patient"><i class="fa fa-eye"></i></a>
                                                    <a href="<?= base_url('admin_login/editPatient/' . $patient->id); ?>" class="btn btn-info" title="Edit Patient"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger" title="Delete Patient"><i class="fa fa-trash"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-12"><?= $pagination; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer_admin'); ?>
    </body>
</html>

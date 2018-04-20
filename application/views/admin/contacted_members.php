<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/head_admin'); ?>
        <style>
            .search_bar {padding-bottom: 10px;}
            .pagination {margin-top: 0; margin-bottom: 10px;}
            .warning-table table th{background: #f39c12; background-color: #f39c12;}
            .icon_crud a {padding: 0px 5px;}
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <?php $this->load->view('common/header_admin'); ?>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="m-heading">
                    <h4 style="margin: 0;">Contacted Members Details</h4>
                </div>
                <div class="container-fluid">
                    <div class="well search_bar">
                        <form role="form" action="<?= base_url('admin_login/contacted_members'); ?>" method="get">
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" autocomplete="off" id="name" placeholder="Search by name" value="<?= $name; ?>">
                                        <input type="hidden" name="limit" value="<?= $limit; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" autocomplete="off" id="email" placeholder="Search by email" value="<?= $email; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" autocomplete="off" id="phone" placeholder="Search by Phone" value="<?= $phone; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url('contact_us'); ?>" class="btn btn-default">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box">
                        <div class="row" style="padding: 15px 25px 10px 25px;">
                            <div class="col-md-2">
                                <span>
                                    <form role="form" class="form-horizontal" action="<?= base_url('admin_login/contacted_members' . $querystring); ?>" method="get">
                                        Records
                                        <select name="limit" class="records-control dropdown1" onchange="this.form.submit();">
                                            <option value="10" <?= ($limit == '10 ') ? 'selected' : ''; ?>>10</option>
                                            <option value="25" <?= ($limit == '25') ? 'selected' : ''; ?>>25</option>
                                            <option value="50" <?= ($limit == '50') ? 'selected' : ''; ?>>50</option>
                                            <option value="75" <?= ($limit == '75') ? 'selected' : ''; ?>>75</option>
                                            <option value="100" <?= ($limit == '100') ? 'selected' : ''; ?>>100</option>
                                        </select>
                                        <input type="hidden" name="name" value="<?= $name; ?>">
                                        <input type="hidden" name="email" value="<?= $email; ?>">
                                    </form>
                                </span>
                            </div>
                            <div class="col-md-2" style="margin-top: 4px;">
                                <span class="countclass"><?= 'Count : <b>' . $ttl_rows . '</b>'; ?></span>
                            </div>
                        </div>
                        <div class="box-body">
                            <div style="padding: 0px 15px 0px 15px;">
                                <table id="example1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Best Date</th>
                                            <th>Call Timings</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($members) {
                                            foreach ($members as $member) {
                                                ?>
                                                <tr>
                                                    <td><?= $member->name; ?></td>
                                                    <td class="text-right"><?= $member->mobile; ?></td>
                                                    <td class="text-center"><?= date('M d, Y (D)', strtotime($member->date)); ?></td>
                                                    <td><?= $member->time; ?></td>
                                                    <td class="text-center"><?= date('d-m-Y', strtotime($member->created)); ?></td>
                                                    <td class="icon_crud text-center">
                                                        <?php if ($member->is_patient) { ?>
                                                            <a class="btn btn-success" title="Patient Status"><i class="fa fa-check"></i></a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-danger" title="Patient Status"><i class="fa fa-close"></i></a>
                                                        <?php } ?>
                                                        <a href="<?= base_url() . "admin_login/viewContactMember/" . $member->id; ?>" class="btn btn-primary" title="View Contact"><i class="fa fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger" title="Delete Contact"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="7"><p class="text-center" style="margin: 10px;">No Data Available </p></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Best Date</th>
                                            <th>Call Timings</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <?= $pagination; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer_admin'); ?>
    </body>
</html>

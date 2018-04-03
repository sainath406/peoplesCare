<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/head_admin'); ?>
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
                        <form role="form" action="<?= base_url('admin_login/index'); ?>" method="get">
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" autocomplete="off" id="name" placeholder="Search by name" value="<?= $name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" autocomplete="off" id="email" placeholder="Search by email" value="<?= $email; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url('admin_login'); ?>" class="btn btn-default">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box">
                        <div class="row" style="padding: 10px 10px 0px 10px;">
                            <div class="col-md-2">
                                <span>
                                    <form role="form" class="form-horizontal" action="<?= base_url('admin_login/index' . $querystring); ?>" method="get">
                                        Records
                                        <select name="limit" class="records-control dropdown1" onchange="this.form.submit();">
                                            <option value="10" <?= ($limit == '10 ') ? 'selected' : ''; ?>>10</option>
                                            <option value="25" <?= ($limit == '25') ? 'selected' : ''; ?>>25</option>
                                            <option value="50" <?= ($limit == '50') ? 'selected' : ''; ?>>50</option>
                                            <option value="75" <?= ($limit == '75') ? 'selected' : ''; ?>>75</option>
                                            <option value="100" <?= ($limit == '100') ? 'selected' : ''; ?>>100</option>
                                        </select>
                                    </form>
                                </span>
                            </div>
                            <div class="col-md-2" style="margin-top: 4px;">
                                <span class="countclass"><?= 'Count : <b>' . $ttl_rows . '</b>'; ?></span>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Service</th>
                                        <th>Best Date</th>
                                        <th>Call Timings</th>
                                        <th>New Patient?</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($members) {
                                        foreach ($members as $member) {
                                            ?>
                                            <tr>
                                                <td><?= $member->name; ?></td>
                                                <td><?= $member->email; ?></td>
                                                <td><?= $member->mobile; ?></td>
                                                <td><?= $member->service; ?></td>
                                                <td><?= date('d D, M Y', strtotime($member->date)); ?></td>
                                                <td><?= $member->time; ?></td>
                                                <td><?= $member->patient_type; ?></td>
                                                <td><?= date('d-m-Y', strtotime($member->created)); ?></td>
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
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Service</th>
                                        <th>Best Date</th>
                                        <th>Call Timings</th>
                                        <th>Patient Type</th>
                                        <th>Created</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <?= $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer_admin'); ?>
    </body>
</html>

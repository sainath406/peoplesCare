<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('common/head_admin'); ?>
    </head>
    <body class = "hold-transition login-page">
        <div class = "login-box">
            <div class = "login-logo admin-logoo">
                <a href = "<?= base_url('admin'); ?>">ADMIN</a>
            </div>
            <div class = "login-box-body">
                <?php if ($this->session->flashdata('error')) {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?= base_url('admin'); ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" maxlength="75" value="<?= set_value('email') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?= form_error('email'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" maxlength="75" value="<?= set_value('password') ?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
                <p style="margin: 10px 0 10px;"><a href="#">I forgot my password</a></p>
            </div>
        </div>
        <script src="<?= config_item('root_dir'); ?>assets/admin/components/jquery/dist/jquery.min.js"></script>
        <script src="<?= config_item('root_dir'); ?>assets/admin/components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= config_item('root_dir'); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>

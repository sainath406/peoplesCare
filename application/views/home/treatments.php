<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('home/common/head'); ?>
    </head>
    <body>
        <?php $this->load->view('home/common/nav'); ?>
        <div class="main-block">
            <div class="banner"><img src="<?= config_item('root_dir'); ?>assets/images/treatments-banner.jpg" alt="dental hospital in nizampet" class="img-responsive"></div>
            <div class="container">
                <div class="row">
                    <div class="inner-content">
                        <div class="col-md-12">
                            <div class="block-heading-two">
                                <h3><span>Treatments</span></h3>
                            </div>
                            <div class="services-content">
                                <div class="row">
                                    <?php foreach ($treat as $key => $value) { ?>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="view view-eighth"> <img src="<?= config_item('root_dir'); ?>assets/images/treatments/<?= stripslashes(str_replace("\n", "", $value['image'])); ?>" alt="dental hospital in kukatpally" class="img-responsive" />
                                                <h3><?= stripslashes(str_replace("\n", "", $value['name'])); ?></h3>
                                                <div class="mask">
                                                    <h3><?= stripslashes(str_replace("\n", "", $value['name'])); ?></h3>
                                                    <p><?= stripslashes(str_replace("\n", "", $value['subtitle'])); ?></p>
                                                    <a href="<?= base_url(); ?>treatments/treatment_view/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>" class="info">Read More</a> 
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('home/common/footer'); ?>
    </body>
</html>
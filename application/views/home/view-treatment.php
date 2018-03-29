<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('home/common/head'); ?>
    </head>
    <body>
        <?php $this->load->view('home/common/nav'); ?>
        <div class="divider-raj"></div>
        <div class="main-block">
            <div class="container">
                <div class="row">
                    <div class="inner-content">
                        <div class="col-sm-3">
                            <div class="s-widget m-t-20">
                                <h5>Treatments</h5>
                                <div class="widget-content categories">
                                    <ul class="list-6">
                                        <?php foreach ($treat as $key => $value) { ?>
                                            <li><a href="<?= base_url(); ?>treatments/treatment_view/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?= stripslashes(str_replace("\n", "", $value['name'])); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>         
                        </div>
                        <div class="col-md-9">
                            <div class="block-heading-two">
                                <h3><span><?= stripslashes(str_replace("\n", "", $treatview['name'])); ?></span></h3>
                            </div>
                            <div class="col-md-12">
                                <div class="home_articul m-t-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1><?= stripslashes(str_replace("\n", "", $treatview['subtitle'])); ?></h1>
                                            <p>
                                                <?= stripslashes(str_replace("\n", "", $treatview['content'])); ?>
                                            </p>
                                        </div>
                                    </div>		
                                    <div class="row">
                                        <div class='col-md-12'>
                                            <div class="block-heading-two">
                                                <h3><span>Photos </span></h3>
                                            </div>
                                            <div class="client-one">
                                                <div class="owl-carousel" data-items="5" data-auto-play="true" data-pagination="false" data-single-item="false">
                                                    <?php if (($treatview['image'] != '0') && ($treatview['image'] != '')) { ?>
                                                        <div class="c1-item"> <a class="fancybox" rel="ligthbox" href="<?= base_url(); ?>images/treatments/<?= $treatview['image']; ?>"> <img class="img-responsive" alt="dentsit" src="<?= config_item('root_dir'); ?>assets/images/treatments/<?= $treatview['image']; ?>" /> </a></div>
                                                    <?php } if (($treatview['image2'] != '0') && ($treatview['image2'] != '')) { ?>
                                                        <div class="c1-item"> <a class="fancybox" rel="ligthbox" href="<?= base_url(); ?>images/treatments/<?= $treatview['image2']; ?>"> <img class="img-responsive" alt="Orthodontist" src="<?= config_item('root_dir'); ?>assets/images/treatments/<?= $treatview['image2']; ?>" /> </a></div>
                                                    <?php } if (($treatview['image3'] != '0') && ($treatview['image3'] != '')) { ?>
                                                        <div class="c1-item"> <a class="fancybox" rel="ligthbox" href="<?= base_url(); ?>images/treatments/<?= $treatview['image3']; ?>"> <img class="img-responsive" alt="Orthodontist" src="<?= config_item('root_dir'); ?>assets/images/treatments/<?= $treatview['image3']; ?>" /> </a></div>
                                                    <?php } if (($treatview['image4'] != '0') && ($treatview['image4'] != '')) { ?>
                                                        <div class="c1-item"> <a class="fancybox" rel="ligthbox" href="<?= base_url(); ?>images/treatments/<?= $treatview['image4']; ?>"> <img class="img-responsive" alt="Orthodontist" src="<?= config_item('root_dir'); ?>assets/images/treatments/<?= $treatview['image4']; ?>" /> </a></div>
                                                    <?php } if (($treatview['image5'] != '0') && ($treatview['image5'] != '')) { ?>
                                                        <div class="c1-item"> <a class="fancybox" rel="ligthbox" href="<?= base_url(); ?>images/treatments/<?= $treatview['image5']; ?>"> <img class="img-responsive" alt="dentist" src="<?= config_item('root_dir'); ?>assets/images/treatments/<?= $treatview['image5']; ?>" /> </a></div>
                                                            <?php } ?>		
                                                </div>
                                            </div>                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('home/common/footer'); ?>
    </body>
</html>
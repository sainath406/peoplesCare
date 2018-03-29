<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('home/common/head'); ?>
        <style>
            #quote-carousel { padding: 0 10px 30px 10px; margin-top: 30px; }
            #quote-carousel .carousel-control { background: none; color: #CACACA; font-size: 2.3em; text-shadow: none; margin-top: 30px; }
            #quote-carousel .carousel-control.left {left: -60px;}
            #quote-carousel .carousel-control.right {right: -60px;}
            #quote-carousel .carousel-indicators { right: 50%; top: auto; bottom: 0px; margin-right: -19px; }
            #quote-carousel .carousel-indicators li { width: 50px; height: 50px; margin: 5px; cursor: pointer; border: 4px solid #CCC; border-radius: 50px; opacity: 0.4; overflow: hidden; transition: all 0.4s; }
            #quote-carousel .carousel-indicators .active { background: #333333; width: 128px; height: 128px; border-radius: 100px; border-color: #f33; opacity: 1; overflow: hidden; }
            .carousel-inner {min-height: 300px;}
            .item blockquote { border-left: none; margin: 0; }
            .item blockquote p:before { content: "f10d"; font-family: 'Fontawesome'; float: left; margin-right: 10px; }
        </style>
    </head>
    <body>
        <?php $this->load->view('home/common/nav'); ?>
        <div class="main-block">
            <div class="container">
                <div class="row">
                    <div class="inner-content">
                        <div class="col-md-9">
                            <div class="block-heading-two">
                                <h3><span>Gallery</span></h3>
                            </div>
                            <div class="row">
                                <?php foreach ($gallery as $key => $value) { ?>
                                    <div class="col-md-4">
                                        <div class="gallery-box img-thumbnail"><a href="<?= base_url(); ?>gallery/view_gallery/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>"><img class="img-responsive " alt="dental hospital in hydernagar" src="<?= config_item('root_dir'); ?>assets/images/gallery/<?= stripslashes(str_replace("\n", "", $value['image'])); ?>"></a>
                                            <h4><a href="<?= base_url(); ?>gallery/view_gallery/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>"><?= stripslashes(str_replace("\n", "", $value['name'])); ?></a></h4>
                                            <small><i class="fa fa-calendar"></i>&nbsp; <?= date('d-m-Y', strtotime($value['date'])); ?> </small>
                                            <p><?= stripslashes(str_replace("\n", "", $value['content'])); ?></p>
                                            <a class="btn btn-color btn-xs" href="<?= base_url(); ?>gallery/view_gallery/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>">View More</a>
                                        </div>
                                    </div>  
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="block-heading-two">
                                <h3><span>Patients Speak </span></h3>
                            </div>
                            <div class="row">
                                <div class="col-md-12" data-wow-delay="0.2s">
                                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                        <!-- Bottom Carousel Indicators -->
                                        <!-- Carousel Slides / Quotes -->
                                        <div class="carousel-inner ">
                                            <!-- Quote 1 -->
                                            <?php
                                            for ($i = 0; $i < count($speak); $i++) {
                                                if ($i == 0) {
                                                    ?>
                                                    <div class="item active">
                                                    <?php } else { ?>
                                                        <div class="item">
                                                        <?php } ?>
                                                        <blockquote>
                                                            <div class="row">
                                                                <p><?php
                                                                    $sdata = preg_replace('/<[^>]*>/', '', @$speak[$i]['content']);
                                                                    echo stripslashes(str_replace("\n", "", $sdata));
                                                                    ?>
                                                                </p>
                                                                <small><?= stripslashes(str_replace("\n", "", $speak[$i]['name'])); ?></small>
                                                            </div>
                                                        </blockquote>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>					 
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php $this->load->view('home/common/footer'); ?>
    </body>
</html>
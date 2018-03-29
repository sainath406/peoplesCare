<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('home/common/head'); ?>
    </head>
    <body>
        <?php $this->load->view('home/common/nav'); ?>
        <section id="inner-content">
            <div class="divider-raj"></div>
            <div class="banner"><img src="<?= config_item('root_dir'); ?>assets/images/blogbanner.png" class="img-responsive"></div> 
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="inner-container">   
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="blog-inner">
                                        <h1><?= stripslashes(str_replace("\n", "", $blog['name'])); ?></h1>
                                        <div class="post-byline">by 
                                            <span class="postr-name"><a href="#"><?= stripslashes(str_replace("\n", "", $blog['pname'])); ?></a></span>
                                            In <span class="published"><a href="">Blog style</a></span>
                                            Updated <span class="updated"><?= stripslashes(str_replace("\n", "", $blog['record_date'])); ?></span>
                                        </div>
                                        <div class="thumbnail"><a href=""><img src="<?= config_item('root_dir'); ?>assets/images/blog/<?= stripslashes(str_replace("\n", "", $blog['image'])); ?>" class="img-responsive"></a></div>
                                        <p><?= stripslashes(str_replace("\n", "", $blog['content'])); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="block-heading-two">
                            <h3><span>Patients   Speak </span></h3>
                        </div>
                        <div class="testimonials-one">		
                            <div class="owl-carousel" data-items="1" data-auto-play="true" data-pagination="false" data-single-item="true">
                                <!-- Carousel item starts -->
                                <?php foreach ($speak as $key => $value) { ?>
                                    <div class="owl-content">
                                        <!-- Testimonials one Item -->
                                        <div class="testimonials-one-item">
                                            <div class="testimonials-one-content">
                                                <p><?php
                                                    $sdata = preg_replace('/<[^>]*>/', '', $value['content']);
                                                    echo stripslashes(str_replace("\n", "", $sdata));
                                                    ?>
                                                </p>
                                            </div>
                                            <h5><a href="#"><?= stripslashes(str_replace("\n", "", $value['name'])); ?></a></h5>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('home/common/footer'); ?>
    </body>
</html>
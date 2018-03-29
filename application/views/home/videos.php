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
                        <div class="col-md-9">
                            <div class="block-heading-two">
                                <h3><span>Videos </span></h3>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <?php foreach ($videos as $key => $value) { ?>
                                        <div class="col-md-4"><div class="thumbnail"><iframe width="100%" height="200" src="https://www.youtube.com/embed/<?= stripslashes(str_replace("\n", "", $value['url'])); ?>" frameborder="0" allowfullscreen></iframe></div></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="block-heading-two">
                                <h3><span>Patients Speak </span></h3>
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
            </div>
        </div>
        <?php $this->load->view('home/common/footer'); ?>
    </body>
</html>
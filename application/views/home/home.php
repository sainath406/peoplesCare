<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('home/common/head'); ?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    </head>
    <body>
        <?php $this->load->view('home/common/nav'); ?>
        <div class="main-block">   
            <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line slider" data-ride="carousel" data-pause="hover" data-interval="5000" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                    <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper For Slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <!-- Slide Background -->
                        <img src="<?= config_item('root_dir'); ?>assets/images/img1.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <div class="bs-slider-overlay"></div>
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_right">
                            <h1 data-animation="animated zoomInLeft" style="font-size: 50px ;margin: 40px 0 0 0"> Tomorrow's Dentistry Today</h1>
                        </div>
                    </div>
                    <!-- Third Slide -->
                    <div class="item ">
                        <!-- Slide Background -->
                        <img src="<?= config_item('root_dir'); ?>assets/images/img2.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <div class="bs-slider-overlay"></div>
                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide_style_left">
                                    <h1 data-animation="animated zoomInRight" style="font-size: 50px ;margin: 40px 0 0 0; color: #cdad3e;">Your smile is our passion</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->
                    <div class="item ">
                        <!-- Slide Background -->
                        <img src="<?= config_item('root_dir'); ?>assets/images/img3.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <div class="bs-slider-overlay"></div>
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_right">
                            <h1 data-animation="animated zoomInLeft" style="font-size: 50px ;margin: 40px 0 0 0;color: #498979;"> Specalized<br/> Dental Services</h1>
                        </div>
                    </div>
                </div>
                <!-- End of Wrapper For Slides -->

                <!-- Left Control -->
                <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <!-- Right Control -->
                <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div> 
            <!-- End  bootstrap-touch-slider Slider -->

            <div class="container hidden-xs hidden-sm">
                <div class="row">
                    <div class="home_pages_reviews">
                        <div class="col-md-4"><a target="_blank" href="https://www.google.co.in/#q=peoples+dental+cae+&gws_rd=cr&lrd=0x3bcb921db6dcb7fd:0x88d9fd733be448,1"><img src="<?= config_item('root_dir'); ?>assets/images/GoogleReviewsBanner.jpg" alt="Dental clinic hydernagar" class="img-responsive"></a> </div>
                        <div class="col-md-4"><a target="_blank" href="https://www.practo.com/hyderabad/doctor/narasimha-1-dentist/feedback"><img src="<?= config_item('root_dir'); ?>assets/images/PractoReviewsBanner.jpg" alt="Dental hospital hydernagar" class="img-responsive" ></a></div>
                        <div class="col-md-4"><a target="_blank" href="http://www.justdial.com/Hyderabad/Peoples-Dental-Care-%3Cnear%3E-Opposite-Rainbow-Hospital-Above-HDFC-Bank-Nizampet/040PXX40-XX40-160428165657-B8L7_BZDET?xid=SHlkZXJhYmFkIHBlb3BsZXMgZGVudGFsIGNhcmUgSHlkZXIgTmFnYXIgS3VrYXRwYWxseQ==&tab=writereview"><img src="<?= config_item('root_dir'); ?>assets/images/justdailReviewsBanner.jpg" alt="Dentist hydernagar" class="img-responsive"></a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="welocme-bg col-xs-12 col-sm-12 col-md-12">
                <div class="container">
                    <div class="recent_updates">Recent Updates</div>
                    <div id="myCarousel" class="vertical-slider carousel vertical slide col-md-10" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($updates as $key => $value) { ?>
                                <div class="item <?php if ($key == '0') { ?>active<?php } ?>">
                                    <div class="row">
                                        <div class="col-xs-12 welcom-title col-sm-12 col-md-12">
                                            <ul>
                                                <li> <?= stripslashes(str_replace("\n", "", $value['message'])); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/row-fluid-->
                                </div>
                            <?php } ?>
                            <!--/item-->
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="container">
                <div class="welcome-text">
                    <h3><?= stripslashes(str_replace("\n", "", $welcometext['name'])); ?></h3>
                    <p>
                        <?php
                        $sdata7 = preg_replace('/<[^>]*>/', '', $welcometext['content']);
                        echo stripslashes(str_replace("\n", "", $sdata7));
                        ?>
                    </p>
                </div>
                <div class="services-content heding-text">
                    <h6>Treatments</h6>
                    <div class="row">
                        <?php foreach ($treat as $key => $value) { ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="view view-eighth"> <img src="<?= config_item('root_dir'); ?>assets/images/treatments/<?= stripslashes(str_replace("\n", "", $value['image'])); ?>" alt="Orthodontist in hydernagar" class="img-responsive" />
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
                <div class="our_patients heding-text">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6> Patients <span> Speak </span></h6>
                            <div class="testimonials-one">
                                <div class="" data-items="1" data-auto-play="true" data-pagination="false" data-single-item="true">
                                    <!-- Carousel item starts -->
                                    <?php foreach ($speak as $key => $value) { ?>
                                        <div class="owl-content">
                                            <!-- Testimonials one Item -->
                                            <div class="testimonials-one-item">
                                                <div class="testimonials-one-content">
                                                    <p>
                                                        <?php
                                                        $cdata4 = preg_replace('/<[^>]*>/', '', $value['content']);
                                                        echo substr(stripslashes(str_replace("\n", "", $cdata4)), 0, 100);
                                                        ?>
                                                    </p>
                                                </div>
                                                <h5><a href="#"><?= stripslashes(str_replace("\n", "", $value['name'])); ?></a></h5>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- Carousel item ends -->
                                </div>
                            </div>
                            <a class="read-more"></a> 
                        </div>
                        <div class="col-sm-6 heding-text">
                            <h6> Patient <span> Care </span></h6>
                            <?php foreach ($care as $key => $value) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="home_articul m-t-10"><a href="<?= base_url(); ?>patientcare/view_patient_care/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>"><img class="pull-left  postImg img-thumbnail margin10"  height="100" width="120" alt="Dental clinic nizampet" src="<?= config_item('root_dir'); ?>assets/images/care/<?= stripslashes(str_replace("\n", "", $value['image'])); ?>"></a>
                                            <article>
                                                <h1> <a href="<?= base_url(); ?>patientcare/view_patient_care/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>"><?= substr(stripslashes(str_replace("\n", "", $value['name'])), 0, 60); ?></a></h1>
                                                <p><?php
                                                    $cdata4 = preg_replace('/<[^>]*>/', '', $value['content']);
                                                    echo substr(stripslashes(str_replace("\n", "", $cdata4)), 0, 100);
                                                    ?>
                                                </p>
                                                <a href="<?= base_url(); ?>patientcare/view_patient_care/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>" class="read-more">Read More</a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="read_more" href="<?= base_url(); ?>patientcare">View All</a> </div>
                        <div class="col-md-3 heding-text">
                            <h6> Videos</h6>
                            <?php foreach ($videos as $key => $value) { ?>
                                <div class="row">
                                    <div class="thumbnail">
                                        <iframe width="100%" height="140" src="https://www.youtube.com/embed/<?= stripslashes(str_replace("\n", "", $value['url'])); ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="read_more " href="<?= base_url(); ?>videos">View All</a> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="video_points">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="about_cont">  
                                <div class="block-heading-two">
                                    <h3><span>Why People's Dental Care ? </span></h3>
                                </div>  
                                <ul class="list-2">
                                    <li><i class="fas fa-check"></i>&nbsp;&nbsp;Quality Policy & Sterilization</li>
                                    <li><i class="fas fa-check"></i>&nbsp;&nbsp;Professional Qualified Dentists</li>
                                    <li><i class="fas fa-check"></i>&nbsp;&nbsp;Emergency Dental Care</li>
                                    <li><i class="fas fa-check"></i>&nbsp;&nbsp;Personalized Patient’s Care</li>
                                    <li><i class="fas fa-check"></i>&nbsp;&nbsp;Best Dentistry Practices</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="abo">
                                <div class="abou_video">
                                    <div class="inner blink">
                                        <div class="embed-responsive embed-responsive-16by9 myvid">
                                            <iframe frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/AnKFLpc5lIA" class="embed-responsive-item"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-responsive" src="<?= config_item('root_dir'); ?>assets/images/shadow.png" alt="Dental clinic in nizampet">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="client-one">
                <div class="owl-carousel" data-items="5" data-auto-play="true" data-pagination="false" data-single-item="false">
                    <!-- Item -->
                    <?php foreach ($insurance as $key => $value) { ?>
                        <div class="c1-item"> 
                            <a href="#"><img src="<?= config_item('root_dir'); ?>assets/images/insurance/<?= stripslashes(str_replace("\n", "", $value['image'])); ?>" alt="Dental hospital in nizampet" class="img-responsive" /></a>
                            <div class="img-hover"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php $this->load->view('home/common/footer'); ?>
    </body>
</html>
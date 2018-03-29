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
        <section id="inner-content">
            <div class="divider-raj"></div>
            <div class="banner"><img src="<?= config_item('root_dir'); ?>assets/images/blogbanner.png" class="img-responsive"></div> 
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="inner-container">   
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php foreach ($record as $key => $value) { ?>
                                        <div class="blog-inner">
                                            <h1><a href="<?= base_url(); ?>blog/blog_view/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>"><?= substr(stripslashes(str_replace("\n", "", $value['name'])), 0, 60); ?></a></h1>
                                            <div class="post-byline">by 
                                                <span class="postr-name"><a href="<?= base_url(); ?>blog/blog_view/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>"><?= substr(stripslashes(str_replace("\n", "", $value['pname'])), 0, 60); ?></a></span>
                                                ·
                                                In <span class="published"><a href="<?= base_url(); ?>blog/blog_view/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>">Blog style</a></span>
                                                Updated :<span class="updated"><?= substr(stripslashes(str_replace("\n", "", $value['record_date'])), 0, 60); ?></span>
                                            </div>
                                            <div class="thumbnail"><a href="<?= base_url(); ?>blog/blog_view/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>"><img src="<?= config_item('root_dir'); ?>assets/images/blog/<?= $value['image']; ?>" class="img-responsive"></a></div>
                                            <p><?php
                                                $cdata4 = preg_replace('/<[^>]*>/', '', $value['content']);
                                                echo substr(stripslashes(str_replace("\n", "", $cdata4)), 0, 428);
                                                ?>
                                            </p>
                                            <a href="<?= base_url(); ?>blog/blog_view/<?= stripslashes(str_replace("\n", "", $value['id'])); ?>">Read More...</a>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-12" align="right">
                                        <?= $pagination; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="block-heading-two">
                            <h3><span>Patients   Speak </span></h3>
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
            </div>
        </section>
        <?php $this->load->view('home/common/footer'); ?>
    </body>
</html>
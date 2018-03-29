<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('home/common/head'); ?>
    </head>
    <body>
        <?php $this->load->view('home/common/nav'); ?>
        <div class="main-block">
            <div class="banner"><img src="<?= config_item('root_dir'); ?>assets/images/content/<?= stripslashes(str_replace("\n", "", $about['image'])); ?>" alt="Dentist in nizampet" class="img-responsive"></div>
            <div class="container">
                <div class="row">
                    <div class="inner-content">
                        <div class="col-md-9">
                            <div class="block-heading-two">
                                <h3><span><?= stripslashes(str_replace("\n", "", $about['name'])); ?></span></h3>
                            </div>
                            <p><?= stripslashes(str_replace("\n", "", $about['content'])); ?></p>
                            <div class="clearfix"></div>
                            <div class="block-heading-two">
                                <h3><span>Doctors Profile</span></h3>
                            </div>
                            <div id="no-more-tables">
                                <table class="col-md-12 table-bordered table-striped table-condensed cf">
                                    <tbody>
                                    <td data-title="Code" style="background: #1189bc; color: #fff;">DR. Ujwala </td>
                                    <td data-title="Company" style="background: #1189bc; color: #fff;">BDS,MDS prosthodontist</td>
                                    </tr>
                                    <tr>
                                        <td data-title="Code" style="background: #1189bc; color: #fff;">DR.G.L Narasimharao</td>
                                        <td data-title="Company" style="background: #1189bc; color: #fff;"> BDS,MDS Oral Pathologist</td>
                                    </tr>
                                    <tr>
                                        <td data-title="Code" style="background: #1189bc; color: #fff;">DR.SanthoshReddy</td>
                                        <td data-title="Company" style="background: #1189bc; color: #fff;">BDS,MDS Orthodontics</td>
                                    </tr>
                                    <tr>
                                        <td data-title="Code" style="background: #1189bc; color: #fff;">DR.Irfan</td>
                                        <td data-title="Company" style="background: #1189bc; color: #fff;">BDS, MDS Oral And MaxilloFacial Surgeon</td>
                                    </tr>
                                    <tr>
                                        <td data-title="Code" style="background: #1189bc; color: #fff;">Dr.Sowjanya</td>
                                        <td data-title="Company" style="background: #1189bc; color: #fff;">BDS,MDS Periodontist</td>
                                    </tr>
                                    <tr>
                                        <td data-title="Code" style="background: #1189bc;color: #fff;">Dr.Madhavi</td>
                                        <td data-title="Company" style="background: #1189bc;color: #fff;">BDS,MDS Endodontist</td>
                                    </tr>
                                    </tbody>
                                </table>
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
                                    <!-- Carousel item ends -->
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
<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('home/common/head'); ?>
    </head>
    <body>
        <?php $this->load->view('home/common/nav'); ?>
        <div class="main-block">
            <div class="banner"><img src="<?= config_item('root_dir'); ?>assets/images/contact-banner.jpg" alt="Orthodontist" class="img-responsive"></div>
            <div class="container">
                <div class="">
                    <div class="">
                        <div class="block-heading-two">
                            <h3><span>Contact Us</span></h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="well">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/AnKFLpc5lIA" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <!-- Contact Form -->
                                <div class="">
                                    <!-- Form -->
                                    <?php if ($this->session->flashdata('msg_succ') != '') { ?>
                                        <div class="alert alert-block alert-success">
                                            <button type="button" class="close" data-dismiss="alert">
                                                <i class="ace-icon fa fa-times"></i>
                                            </button>
                                            <p>
                                                <?= $this->session->flashdata('msg_succ') ? $this->session->flashdata('msg_succ') : ''; ?>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <form method="POST" role="form" name="contact">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="menu-text"> SERVICE : </label>
                                                    <select class="form-control" name="service" required>
                                                        <option value="">Select Service</option>
                                                        <option value="Pediatric Dentistry">Pediatric Dentistry</option>
                                                        <option value="Cosmetic Dentistry"> Cosmetic Dentistry</option>
                                                        <option value="Root Canal Treatments"> Root Canal Treatments </option>
                                                        <option value="Orthodontists"> Orthodontists </option>
                                                        <option value="Restorative Dentistry"> Restorative Dentistry </option>
                                                        <option value="Pediatric Dentists "> Pediatric Dentists </option>
                                                        <option value="Invisalign- Clear Braces"> Invisalign- Clear Braces </option>
                                                        <option value="Crown Bridge"> Crown &amp; Bridge </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="menu-text"> BEST DATE : </label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="date" placeholder="dd/mm/yyyy" required>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <!--<label class="menu-text"> Date : </label>-->
                                                    <input type="text" class="form-control" name="mobile" placeholder="Phone Number" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="menu-text"> BEST TIME TO CALL : </label>
                                                    <select class="form-control" name="time" id=""  placeholder="Select Time" required>                
                                                        <option value="">Select Time</option>
                                                        <option value="Morning">Morning</option>
                                                        <option value="Afternoon">Afternoon</option>
                                                        <option value="Evening">Evening</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="menu-text"> ARE YOU A NEW PATIENT? : </label>
                                                    <select class="form-control" name="patient_type" required>
                                                        <option value="">ARE YOU A NEW PATIENT?</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="g-recaptcha" data-sitekey="6LdVPyEUAAAAANGWre1ztDhQDARwEtPyb9YgTEWT"></div>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" value="submit" class="btn btn-red" />
                                    </form>
                                </div>
                                <br />
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="well">
                                    <a href="https://www.google.co.in/#q=peoples+dental+cae+&gws_rd=cr&lrd=0x3bcb921db6dcb7fd:0x88d9fd733be448,1" target="_blank"><img src="<?= config_item('root_dir'); ?>assets/images/Google-Review-Button.png" alt="Orthodontist" class="img-responsive"></a>
                                </div>
                                <div class="well">
                                    <!-- Heading -->
                                    <div class="top_appointment"> <a href="https://www.practo.com/hyderabad/doctor/narasimha-1-dentist" type="button">Fix An Appointment</a></div>
                                    <p> <?= stripslashes(str_replace("\n", "", $fstyles['address'])); ?></p>
                                    <p class="tel"> <i class="fa fa-phone"></i> Ph : <?= stripslashes(str_replace("\n", "", $fstyles['phone'])); ?><br />
                                        <i class="fa fa-envelope"></i> Mail : <a href="#"><?= stripslashes(str_replace("\n", "", $fstyles['email'])); ?></a><br />
                                    </p>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="well">
                                    <div class="contact-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15220.683641270658!2d78.38187!3d17.499353!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x88d9fd733be448!2sPeople&#39;s+Dental+Care!5e0!3m2!1sen!2sin!4v1473251622706" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('home/common/footer'); ?>
        <script type="text/javascript">
            (function (d, s, id) {
                var js, script = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.async = true;
                js.src = "https://www.practo.com/bundles/practopractoapp/js/marketing/doc-widget.js";
                script.parentNode.insertBefore(js, script);
            })(document, 'script', 'practo-widget-js');
        </script>
    </body>
</html>
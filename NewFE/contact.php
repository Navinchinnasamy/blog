<!DOCTYPE html>
<html lang="en">
    <?php require "header.php"; ?>
    <body class="bordered">
        
        <!-- Preloader Two -->
        <div id="preloader">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    
    <div id="wrapper" class="main-wrapper">
        <?php require_once "navbar.php"; ?>        
        <div class="breadcrumb-area clearfix">
            <div class="container">
                <h2 class="page-title">Conctat Page</h2>
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Conctat Page</li>
                </ul>
            </div>
        </div> <!-- end .breadcrumb-area -->

        <!--
        Contact
        ==================================== -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="row contact-page">
                    <header class="col-md-8 col-md-offset-2 section-head text-center item_top">
                        <h2>contact us</h2>
                        <p>Write to us to know anything about idea products</p>
                    </header>

                    <div class="col-md-9 item_left">
                        <div id="map-canvas"></div>
                    </div>

                    <div class="col-md-3 item_right">
                        <div class="address">
                            <h5>Headquarter</h5>
                            <p><i class="fa fa-map-marker"></i>123 Lake Circus, Kalabagan Dhanmondi, Dhaka 1205, Bangladesh</p>
                            <p><i class="fa fa-phone"></i>Phone: 1-123-6987-2369</p>
                            <p><i class="fa fa-envelope"></i><a href="mailto:support@pixelcoder.net">support@pixelcoder.net</a></p>
                            <p><i class="fa fa-link"></i><a target="_blank" href="http://www.pixelcoder.net">www.pixelcoder.net</a></p>
                        </div>    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 item_left">
                        <form action="#" method="post" id="contact-form" class="row contact-form">
                            <div class="col-md-6">
                                <input type="text" name="fname" placeholder="First Name" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="lname" placeholder="Last Name" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Email" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="subject" placeholder="Subject" required class="form-control">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" class="form-control" required placeholder="Message"></textarea>
                                <input type="submit" value="Send Message" class="message-sub pull-right btn btn-blue">
                            </div>
                        </form>
                        <div id="success">
                            <p>Your message was sent succssfully! I will be in touch as soon as I can.</p>
                        </div>
                        <div id="error">
                             <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div> 
                    </div>

                    <div class="col-md-3 item_right">
                        <div class="address">
                            <h5>Factoy Location</h5>
                            <p><i class="fa fa-map-marker"></i>123 Lake Circus, Kalabagan Dhanmondi, Dhaka 1205, Bangladesh</p>
                            <p><i class="fa fa-phone"></i>Phone: 1-123-6987-2369</p>
                            <p><i class="fa fa-envelope"></i><a href="mailto:support@pixelcoder.net">support@pixelcoder.net</a></p>
                            <p><i class="fa fa-link"></i><a target="_blank" href="http://www.pixelcoder.net">www.pixelcoder.net</a></p>
                        </div>    
                    </div>
                </div>

            </div>
        </section>
        <!--
        End Contact
        ==================================== -->
        
	<?php include_once 'footer-widget-v2.php'; ?>
	<?php require_once "footer.php"; ?>
    </body>
</html>
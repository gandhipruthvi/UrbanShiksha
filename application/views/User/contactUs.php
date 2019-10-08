<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    <base href="<?=base_url();?>">
    
    <!-- Title -->
    <title>UrbanShiksha</title>
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">
    
    <!-- CSS Stylesheet -->
    <!--Link Page-->
    <?php include_once("link.php");?>
    <!--#Link Page-->

</head>
    
<body>
    <div class="wapper">
        <!--quckNav-->
        <?php include_once("quckNav.php");?>
        <!--#quckNav-->
        <!--Header-->
        <?php include_once("header.php");?>
        <!--#Header-->
        <section class="banner inner-page">
        	<div class="banner-img"><img src="iresources/Banner/contactus.jpg" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb">
        	<div class="container">
            	<ul>
                	<li><a href="<?=site_url('User/HomeC')?>"><b><i>Home</i></b></a></li>
                    <li><a href="<?=site_url('User/ContactUsC/')?>"><b><i>Contact Us</i></b></a></li>
                </ul>
            </div>
        </section>
        <section class="contact-detail">
        	<div class="container">
                <div class="section-title">
                    
                    <h2>Get in Touch</h2>
                    <p>We’re here to help and answer any question you might have. We look forward to hearing from you🙂.</p>
                </div>
                <div class="contact-boxView">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="contact-box yello">
                                <div class="icon-box">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h4>location</h4>
                                <p>Ashvi Consultancy Services, Royal Square, Uttran, Surat</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-box green">
                                <div class="icon-box">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <h4>phone number</h4>
                                <p><a href="tel:+918401683983">(+91)8401683983</a></p>
                                <p><a href="tel:+918200072309">(+91)8200072309</a></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-box red">
                                <div class="icon-box">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <h4>email address</h4>
                                <p><a href="mailTo:urbanshiksha2019@gmail.com">urbanshiksha2019@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-message">
        	<div class="container">
            	<div class="section-title">
                	<h2>SENT A MESSAGE</h2>
                </div>
                <div class="form-filde">
                    <form action="<?=site_url("User/ContactUsC/sendFeedBack/")?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-box">
                                    <input type="text" placeholder="Name" data-validation="required" name="name">
                                </div>
                                <div class="input-box">
                                    <input type="text" placeholder="Email" data-validation="required" name="email">
                                </div>
                                <div class="input-box">
                                    <input type="text" placeholder="Subject" data-validation="required" name="subject" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-box">
                                    <textarea placeholder="Message" data-validation="required" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="submit-box">
                                    <input type="submit" value="SEND" class="btn">
                                </div>
                            </div>
                        </div>
                    </form>
                    <pre style="background-color:#f8f8f8;border-color: #f8f8f8;"></pre>
                </div>
            </div>
    <!--Footer Page-->
    <?php include_once("footer.php");?>
    <!--#Footer Page-->
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!--Script Page-->
    <?php include_once("script.php");?>
    <!--#Script Page-->
</body>
</html>


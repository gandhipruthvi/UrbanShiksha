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
    <link rel="shortcut icon" href="resources/images/Favicon.ico">
    <!-- <link href="assets/css/main.css" rel="stylesheet"> -->
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
        	<div class="banner-img"><img src="images/bookimg1.jpg" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Verification</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb ">
        	<div class="container">
            	<ul>
                	<li><a href="<?= site_url('User/HomeC/')?>"><b><i>Home</i></b></a></li>
                    <li><a><b><i>Registration Successful</i></b></a></li>
                </ul>
            </div>
        </section>
        <section class="thankYou-page">
        	<div class="container">
                <div class="section-title">
                    <h2 style="text-align: center; font-size: 50px">Verification mail successfuly sent</h2>
                    <a href="<?=site_url('User/LoginC/')?>" style="text-align: center; font-size: 25px">Login</a>
                </div>
            </div>
        </section>
        <!--Footer Page-->
<?php include_once("footer.php");?>
<!--#Footer Page-->
    </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!--Script Page-->
    <?php include_once("script.php");?>
    <!--#Script Page-->
</body>
</html>


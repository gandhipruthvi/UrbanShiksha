<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:15 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<base href="<?=base_url()?>">
<title>UrbanShiksha | Admin</title>

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<!-- Custom Css -->
<link href="assets/css/main.css" rel="stylesheet">

<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blush">
<!-- Page Loader -->
<?php include_once("pageLoader.php");?>
<!-- #END# Page Loader --> 

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars --> 

<!-- Morphing Search  -->
<?php include_once("morphingSearch.php");?>    
<!-- /morphsearch-content --> 

<!-- Top Bar -->
<?php include_once("topBar.php");?>
<!-- #Top Bar -->

<!--Side menu and right menu -->
<?php include_once("sideMenuRightMenu.php");?>
<!--Side menu and right menu -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Reviews </h2>
        </div>
        <div class="row">
                <div class="col-md-3">
                    <center>
                    <div class="thumbnail card" style="height:500px;width:250px;padding-top:10px;background-color:#DCDCDC;">
                        <img src="<?= base_url("upload/$userData->image")?>" class="img-responsive img-circle" style="height:150px;width:150px;border-radius:50%;">
                        <div class="caption body">
                                <h3><?=$userData->userName?></h3>
                                <p style="color:#000000;">DOB:<?=$userData->dateOfBirth?></p>
                                <div class="row">
                                <div class="col-sm-6">
                                <p style="color:#dc143c;">Gender:<?=$userData->gender?></p>
                                </div>
                                <div class="col-sm-6">
                                <p style="color:#dc143c;">Status:<?php
                                    if($userData->status == 0)
                                    {
                                        echo "Active";
                                    }
                                    else
                                    {
                                        echo "Block";
                                    }
                                ?></p>
                                </div>  
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                <p style="color:#000000;">Contact No:<?=$userData->contactNumber?>
                                Email:<?=$userData->email?></p>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">                                
                                <p style="color:#000000;">Degree:<?=$userData->qualification?></p>
                                </div>
                                <div class="col-sm-6">                                
                                <p style="color:#000000;">UserXP:<?=$userData->userXP?></p>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">                                
                                <p style="color:#000000;">City:<?=$userData->cityName?></p>
                                </div>
                                <div class="col-sm-6">
                                <p style="color:#000000;">State:<?=$userData->stateName?></p>
                                </div>
                                </div>
                                <p style="color:#000000;">Country:<?=$userData->countryName?></p>
                        </div>
                    </div>
                    </center>
             </div>
                <div class="col-md-9">
                <div class="card" style="background-color:#DCDCDC;">
                <?php
                    foreach ($courseData as $key)
                    {
                ?>
                <div class="col-md-6">
                    
                    <div class="thumbnail card" style="height:500px;width:250px;margin: 10px;border-radius: 5%;" >
                        <center>
                        <img src="<?= base_url("upload/course/$key->image")?>" class="card-img-top" style="height:150px;width:200px;padding-top: 5px;border-radius: 10%;">
                        <div class="caption body">
                            <h3><?=$key->courseName?></h3>
                            <p style="color:#4169E1;"><?=$key->subjectName?></p>
                            <p style="color:#4169E1;"><?=$key->description?></p>
                            <p style="color:black;">Price: <strong class="col-blush"><?=$key->price?></strong> <span style="color:black;">Chapters: </span><strong class="col-green"><?=$key->noOfChapters?></strong></p>
                        <?php
                            foreach ($rateData as $value)
                            {
                        ?>
                        <p style="color:#4169E1;"><?=$value->stars?></p>
                        <p style="color:#4169E1;"><?=$value->review?></p>
                        <?php
                            }
                        ?>
                        </div>
                    </center>
                    </div>
                </div>
                <?php
                    }
                ?>
                </div>
                </div>
        </div>  
    </div>
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:16 GMT -->
</html>
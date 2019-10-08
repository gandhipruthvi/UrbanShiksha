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
            <h2>All Courses</h2>
            <small class="text-muted">Welcome to Swift application</small>
        </div>
        <div class="row clearfix">            
                <?php
                    foreach ($course as $key)
                    {
                ?>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    
                    <div class="thumbnail card" style="height:500px;width:250px;" >
                        <img src="<?= base_url("upload/course/$key->image")?>" class="img-fluid" style="height:150px;width:250px;">
                        <div class="caption  body">
                            <h3><?=$key->courseName?></h3>
                            <p><?=$key->subjectName?></p>
                            <p><?=$key->description?></p>
                            <p>Price: <strong class="col-blush"><?=$key->price?></strong> Chapters: <strong class="col-green"><?=$key->noOfChapters?></strong></p>
                            <p>Uploaded By <strong><?=$key->userName?></strong></p>
                            <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                        </div>
                    </div>
                
                </div>
                <?php
                    }
                ?>
            <div class="col-sm-12 text-center">
                <a href="#" class="btn btn-raised waves-effect g-bg-blush2" role="button">Load more</a>
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
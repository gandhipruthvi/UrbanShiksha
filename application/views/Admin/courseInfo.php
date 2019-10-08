<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/courses-info.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 10:00:09 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<base href="<?=base_url();?>">

<title>UrbanShiksha | Admin</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="assets/css/main.css" rel="stylesheet">


<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search 
--> 
<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 


<link rel="shortcut icon" href="image/slider-leftArrow.png">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    
    <!--#Morphing Search-->

    <!-- Top Bar -->
    <?php include_once("topBar.php");?>
    <!-- #Top Bar -->
    
    <!--Side menu and right menu -->
    <?php include_once("sideMenuRightMenu.php");?>
    <!--Side menu and right menu -->


<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Course Information</h2>
            <small class="text-muted">Welcome to Swift application</small>
        </div>        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class=" card">
                    <div class="course-profile">
                        <img src="<?= base_url("upload/course/$coursedata1->image")?>" class="img-fluid" style="height:400px;width:1250px;">
                    </div>
                </div>                
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                    </div>
                    <h2 align="center">About Course</h2>
                    <div class="body">
                        <p class="m-b-0">Course Name</p>
                        <h4 class="col-blush"><?=$coursedata1->courseName?></h4>
                        <p class="m-b-0">Course Price</p>
                        <h4 class="col-green"><?=$coursedata1->price?></h4>
                        <p class="m-b-0">Professor Name</p>
                        <h4><?=$coursedata1->userName?></h4>
                        <p class="m-b-0">Difficulty</p>
                        <h4>Advanced</h4> 
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#report">Description</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="report">
                                <div class="wrap-reset">
                                    <div class="mypost-list">
                                        <div class="post-box">
                                            <p><?=$description?></p>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
                    <div class="card body table-responsive" style="background-color:#FFEBCD">
                        
                    <div class="reviews-view">
                        
                                <h4>Reviews List</h4>
                                <div class="reviews-slide">
                                    <?php
                                         foreach ($reviewdata as $key) { 
                                    ?>
                                    <div class="row">
                                    <div class="col-md-2">
                                    <div class="img-responsive img-circle" style="text-align:center"><img src="<?= base_url("upload/$key->image")?>" style="width:80px;height:80px;border-radius:50%"></div>
                                    </div>
                                    <div class="col-md-10">
                                        <span style="color:RED"><?=$key->userName?></span><br>
                                     <?php 
                                            for($i=1;$i<=5;$i++)
                                        {
                                            if($key->stars>=$i)
                                            {
                                        ?>
                                                <i class="fa fa-star"></i>
                                            <?php
                                                }
                                                 else
                                                {
                                            ?>
                                                    <i class="fa fa-star-o"></i>
                                                <?php
                                            }
                                        }
                                        ?>

                                    
                                    
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you </p>
                                    </div>
                                    </div>
                                    <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                        </div>
         </div>
    </div>
</section>
<!-- main content -->

<div class="color-bg"></div>

</body>

<!-- Mirrored from thememakker.com/templates/swift/university/courses-info.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 10:00:09 GMT -->
</html>
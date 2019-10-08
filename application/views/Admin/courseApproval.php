<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 10:00:03 GMT -->
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
<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
<link href="assets/css/main.css" rel="stylesheet">
<!-- Custom Css -->


<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
<style type="text/css">

.dropdown:hover>.dropdown-menu {
    position: absolute;
    display: block;
}

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    width: 215px;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 50px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>
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
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Unapproved Courses</h2>
        </div>
        <div class="row clearfix">
            <?php 
            foreach ($courseData as $key) {
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="member-card verified">
                                <div class="thumb-xl member-thumb">
                                    <img src="<?= base_url("upload/course/$key->image")?>" class="img-thumbnail" alt="course-image">                                
                                </div>
                                <div class="m-t-20">
                                    <h4 class="m-b-0"><?= $key->courseName?></h4>
                                    <p class="text-muted">ID : <?= $key->courseID?></p>
                                    <p class="text-muted">Uploaded By : <?= $key->userName?></p>
                                    <p class="text-muted">Description : <?= $key->description?></p>
                                    <p class="text-muted">Price : <?= $key->price?></p>
                                    <p class="text-muted">SubjectName : <?= $key->subjectName?></p>
                                    <p><a class="btn-grp btn btn-raised btn-primary m-t-20 waves-effect" href="<?= site_url("Admin/UnCoursesC/approveCourse/$key->courseID")?>">Approve</a>
                                        <a class="btn-grp btn btn-raised btn-danger m-t-20 waves-effect" href="<?= site_url("Admin/UnCoursesC/disapproveCourse/$key->courseID")?>">Disapprove</a></p>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- main content -->

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/calendar/calendar.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 10:00:04 GMT -->
</html>
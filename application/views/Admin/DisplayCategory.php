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
<section class="content page-calendar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="card m-t-15">
                    <div class="body">
                        <button type="button" class="btn btn-raised btn-primary btn-sm m-t-0" data-toggle="modal" href="#cal-new-event"> <i class="zmdi zmdi-plus"></i> Category</button>
                        <button class="btn btn-sm btn-default hidden-lg-up m-t-0 float-right" data-toggle="collapse" data-target="#open-chats" aria-expanded="false" aria-controls="collapseExample"><i class="zmdi zmdi-chevron-down"></i></button>
                        <div class="collapse-xs collapse-sm collapse" id="open-chats">
                            <?php
                            foreach ($categorydata as $key) {
                                ?>
                                <div class="event-name b-greensea"><?=$key->categoryName?><a class=" text-muted event-remove"><i class="zmdi zmdi-chevron-right"></i></a> </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="card m-t-15">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <h4 class="custom-font text-default m-0">Events Schedule</h4>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12 text-right">
                                <div class="btn-group">
                                    <button class="btn btn-raised btn-success btn-sm" id="change-view-today">today</button>
                                    <button class="btn btn-raised btn-default btn-sm" id="change-view-day" >Day</button>
                                    <button class="btn btn-raised btn-default btn-sm" id="change-view-week">Week</button>
                                    <button class="btn btn-raised btn-default btn-sm" id="change-view-month">Month</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="tcol">                       
                            <div id="calendar"></div>                       
                        </div>
                    </div>
                </div>
            </div>
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
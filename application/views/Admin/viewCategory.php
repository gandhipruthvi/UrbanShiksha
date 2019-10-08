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
.dropdown {
  position: relative;
  display: right;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  color: black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 16px 18px;
  z-index: 1;
  align-content: right;
}

.x1:hover .x2 {
  display: block;
}

.c1:hover .c2{
    display: block;
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
<section class="content page-calendar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-4 col-md-12">
                <div class="card m-t-10">
                    <div class="card-header">
                        <button type="button" class="btn btn-raised btn-primary btn-sm m-t-0" data-toggle="modal" href="#cal-new-event"> <i class="zmdi zmdi-plus"></i> Category</button>                        
                    </div>
                    <div class="body">
                        <?php
                        foreach($categorydata as $key)
                        {
                            ?>
                            <div class="btn-group"> 
                            <div class="dropdown x1 collapse-xs collapse-sm collapse">
                                <div class="event-name b-greensea row"><div class="col-md-12"><?=$key->categoryName?></div><div class="col-md-12"><a class=" text-muted event-remove"><i class="zmdi zmdi-chevron-right"></i></a></div> </div>
                                <div class="dropdown-content x2">
                                    <?php
                                    foreach ($subcategorydata as $key1) {
                                    if($key1->categoryID==$key->categoryID)
                                    {
                                        ?>
                                        <div class="btn-group dropright"> 
                                        <div class="dropdown c1 collapse-xs collapse-sm collapse" style="right:auto; left: 0;">
                                            <div class="event-name b-greensea"><?=$key1->subcategoryName?> <a class=" text-muted event-remove"><i class="zmdi zmdi-chevron-right"></i></a> </div>
                                                <div class="dropdown-content c2">
                                        <?php
                                        foreach($subjectdata as $key2)
                                        {
                                            if($key2->subcategoryID==$key1->subcategoryID)
                                            {
                                                ?>
                                                   <div class="dropdown d1 collapse-xs collapse-sm collapse">
                                                    <div class=""><a href='<?=site_url("Admin/CourseC/showCourse/$key2->subjectID")?>' class="l1 event-name b-greensea" style="text-decoration: none; color: black;"><?=$key2->subjectName?></a></div>
                                                 </div> 
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    </div>
                                     </div>
                                    <?php
                                    }
                                }

                                ?>
                                </div>
                            </div>
                        </div>
                            <br>
                        <?php
                    }
                    ?>

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
                        <!-- <div class="tcol">                       
                            <div id="calendar"></div>                       
                        </div> -->
                        <!--Ends Here-->
                        <div class="block-header">
                            <h2>All Courses</h2>
                            <small class="text-muted">Welcome to My application</small>
                        </div>
                         <div class="row clearfix">  
                        <?php
                        
                            foreach ($coursedata as $key5) {
                                
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card">            
                                <img src="<?=base_url()?>upload/course/<?=$key5->image?>" alt=""  class="img-fluid">
                                 <div class="caption body">
                                    <h3><?=$key5->courseName?></h3>
                                    <p>Subject: <strong class="col-blush"><?=$key5->subjectName?></strong></p>
                                    <p>Description: <strong class="col-blush"><?=$key5->description?></strong></p>
                                    <p> No of Chapters: <strong class="col-green"><?=$key5->noOfChapters?></strong></p>
                                    <p>Price: <strong class="col-blush"><?=$key5->price?></strong></p>
                                    <p> Course Uploaded By: <strong class="col-green"><?=$key5->userName?></strong></p>
                                  
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
        <!--Ends Here-->
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
<script type="text/javascript">
    $(".l1").hover(function(){
        $(this).css("background-color","#30373e");
        $(this).css("color","white");

    });
    $(".l1").mouseout(function(){
        $(this).css("background-color","#f2f2f2");
        $(this).css("color","black");

    });
</script>
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 10:00:04 GMT -->
</html>
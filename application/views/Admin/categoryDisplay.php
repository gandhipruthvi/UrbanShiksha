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
<section class="content page-calendar">
    <div class="container-fluid">
        <div class="row">
            <div class="card col-md-3">
                <div class="card-header">
                    <div>
                        <button type="button" class="btn btn-raised btn-primary btn-sm m-t-0" data-toggle="modal" data-target="#defaultModal"> <i class="zmdi zmdi-plus"></i> Category</button>                        
                    </div>
                </div>
                <div class="body">
                    <?php
                    foreach($categorydata as $key)
                    {
                        ?>
                        <div class="dropdown">                            
                          <div class="event-name b-greensea row">
                            <div class="col-md-10"><?=$key->categoryName?></div>
                            <div class="col-md-2"><a class=" text-muted event-remove"><i class="zmdi zmdi-chevron-right"></i></a></div>
                        </div>
                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                            <?php
                            foreach ($subcategorydata as $key1) 
                            {
                                if($key1->categoryID==$key->categoryID)
                                {
                                    ?>
                                    <li class="dropdown-submenu">
                                      <a  class="dropdown-item" tabindex="-1"><?=$key1->subcategoryName?></a>
                                      <ul class="dropdown-menu">
                                        <?php
                                        foreach($subjectdata as $key2)
                                        {
                                            if($key2->subcategoryID==$key1->subcategoryID)
                                            {
                                                ?>
                                                <li class="dropdown-item">
                                                    <a tabindex="-1" href="<?=site_url('Admin/CourseC/showCourse/').$key2->subjectID?>" style=><?=$key2->subjectName?></a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>                    
                <?php
            }
            ?>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h2><?php
                if(isset($names))
                {
                    echo $names->categoryName." > ";
                    echo $names->subcategoryName." > ";
                    echo $names->subjectName;
                }
                else
                {
                    echo "All Courses";
                }
                ?></h2>
            </div>
            <div class="body">
                <!--Ends Here-->
                <div class="row clearfix">  
                    <?php
                    foreach ($coursedata as $key5) {
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card">            
                            <img src="<?=base_url()?>upload/course/<?=$key5->image?>" alt=""  class="img-fluid">
                            <div class="caption body">
                                <h3><?=$key5->courseName?></h3>
                                <p>Subject: <strong class="col-blush"><?=$key5->subjectName?></strong></p>
                                <p>Description: <strong class="col-blush"><?=$key5->description?></strong></p>
                                <p> No of Chapters: <strong class="col-green"><?=$key5->noOfChapters?></strong></p>
                                <p>Price: <strong class="col-blush"><?=$key5->price?></strong></p>
                                <p> Course Uploaded By: <strong class="col-green"><?=$key5->userName?></strong></p>
                                <div class="switch">
                                            <label>Active
                                                <input type="checkbox" class="status-group" data-id="<?= $key5->courseID?>" <?php 
                                                if($key5->status != 0)
                                                    echo "checked";
                                                ?>>
                                                <span class="lever"></span>Block
                                            </label>
                                        </div>
                                <a href="<?=site_url('Admin/CategoryC/courseInfo/'.$key5->courseID)?>" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                            </div>        
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <!--Ends Here-->
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- main content -->

<!-- modal -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post">
                <div class="modal-body">
                    <ul class="nav nav-tabs flex-column flex-md-row">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#category">CATEGORY</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#subcateogry">SUBCATEGORY</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#subject">SUBJECT</a></li>
                        </ul>                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane modal-tab in active" id="category">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="txtcategory">
                                    </div>                        
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane modal-tab" id="subcateogry"> 
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Category Name</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="selectCategory">
                                            <?php
                                            foreach ($categorydata as $key ) {
                                                ?>
                                                <option value="<?= $key->categoryID?>"><?= $key->categoryName?></option>       
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <label class="col-md-4 col-form-label">Subcategory Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="txtsubcategory">
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>   

                            <div role="tabpanel" class="tab-pane modal-tab" id="subject"> 
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Subcategory Name</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="selectSubcategory">
                                            <?php
                                            foreach ($subcategorydata as $key ) {
                                                ?>
                                                <option value="<?= $key->subcategoryID?>"><?= $key->subcategoryName?></option>       
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <label class="col-md-4 col-form-label">Subject Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="txtSubject">
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>                         
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSubmit" class="btn btn-link waves-effect">ADD</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal end -->

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
<script type="text/javascript">
    $("#btnSubmit").click(function(){
        var id = $(".modal-tab.active").attr("id");
        if(id=="category")
        {
            $(".modal-content form").attr("action","<?= site_url("Admin/CategoryC/addCategory")?>");
        }
        else if(id=="subcategory")
        {
            $(".modal-content form").attr("action","<?= site_url("Admin/CategoryC/addSubcategory")?>");
        }
        else
        {
            $(".modal-content form").attr("action","<?= site_url("Admin/CategoryC/addSubject")?>");
        }
    });

    $(".status-group").change(function(){
        var id=$(this).data("id");
        $.ajax({
            url : "<?= site_url("Admin/CategoryC/statusChange/")?>"+id,
            success: function(result){              
            }
        });
    });
</script>
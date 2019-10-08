<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>All Courses | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?=base_url();?>">

    <?php require_once("link.php")?>

</head>

<body>
    <?php 
     require_once("leftSidebar.php")
    ?>

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="iresources/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once("headerAdvanceArea.php")?>

        <!-- start window area -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="search-container">
                                        <form  method="post" action="<?=site_url('Instructor/CourseC/searchCourse');?>">
                                          <input type="text" placeholder="Search.." name="txtsearch">
                                          <button type="submit"><i class="fa fa-search"></i></button>
                                      </form>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">All Courses</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="courses-area">
            <div class="container-fluid">
                <div class="row">
                <div class="row mg-b-15">
                    <?php
                        foreach($courseData as $key)
                        {
                            ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="courses-inner mg-t-30">
                            <div class="courses-title">
                                <a href="#"><img src="<?= base_url("upload/$key->image")?>" alt=""></a>
                                <h2><?=$key->courseName;?></h2>
                            </div>
                            <div class="courses-alaltic">
                               <!--  <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span> -->
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-inr"></i></span><?=$key->price?></span>
                            </div>
                            <div class="course-des">
                                <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b><?=$key->userName?></p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                            </div>
                            <div class="product-buttons">
                                <button type="button" class="button-default cart-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                    <?php
                       }
                    ?>
                </div>
            </div>
        </div>
        <!-- end window area -->

        <!-- footer area -->
            <?php require_once("footer.php")?>
        <!-- footer area -->
    </div>
 
</body>
    
       <?php
        require_once("script.php");
     ?> 

</html>
<script type="text/javascript">
  $('[data-toggle="popover"]').popover({
    placement : 'bottom',
    trigger : 'hover',
    container : 'body',
    html : true,
    content : function(){
      return $(this).next('.popper-content').html();
    }
  });
</script>
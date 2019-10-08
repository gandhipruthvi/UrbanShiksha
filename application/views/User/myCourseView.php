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

<script type="text/javascript">
    cart0=<?= $cartdata?>;
    enroll0=<?= $enrollData?>;
</script>
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
            <div class="banner-img"><img src="iresources/Banner/course.jpg" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>courses details</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="<?= site_url('User/HomeC/')?>"><b><i>Home</i></b></a></li>
                    <li><a href="<?= site_url('User/CourseC/')?>"><b><i>All courses</i></b></a></li>
                    <li><a>courses details</a></li>
                </ul>
            </div>
        </section>
        <div class="course-details">
            <div class="container">
                <h2><?=$coursedata->courseName?></h2>
                <div class="course-details-main">
                    <div class="course-img">
                        <img src="<?= base_url("upload/$coursedata->image")?>" class="img-fluid" style="height:400px;width:1250px;">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="course-instructorInfo">
                                <div class="info-slide"><i class="fa fa-user-secret"></i><?=$coursedata->userName;?></div>
                                <!--  <div class="info-slide"><i class="fa fa-calendar"></i>16-09-2016 - 15-08-2018 </div> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-row">
                                <div class="col-md-3"></div>
                                <?php
                                    if($coursedata->price==0)
                                    {
                                ?>
                                    <div class="price col-md-4" align="right"><span>Price: </span>Free</div>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <div class="price col-md-4" align="right"><span>Price: ₹ </span><?=$coursedata->price?></div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($coursedata->userID==$this->session->userID)
                                    {
                                ?>
                                    <div></div>
                                <?php
                                    }
                                    else
                                    {
                                        if($coursedata->price==0)
                                        {
                                ?>
                                    <div id="enroll">
                                            <a class="btn" id="btnenroll" data-id="<?= $coursedata->courseID?>" style="background-color: red;"><i class="fa fa-cart-plus"></i>Enroll</a>
                                    </div>
                                <?php
                                        }
                                        else
                                        {
                                ?>
                                    <div id="addToCart">
                                            <a class="btn" id="btnsubmit" data-id="<?= $coursedata->courseID?>"><i class="fa fa-cart-plus"></i>Add to Cart</a>
                                    </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="info">
                    <h4>Course Overview</h4>
    <p><?=$coursedata->description?></p>
</div>
<div class="syllabus">
    <h4>Syllabus</h4>
    <div class="syllabus-box">
        <div class="syllabus-title">1st lesson</div>
        <div class="syllabus-view first">
            <div class="main-point active">Lorem Ipsum is simply dummy text of the printing and typesetting</div>
            <div class="point-list">
                <ul>
                    <li><a href="course-lessons.html">vedio : Lorem ipsum dolor sit amet. <span class="hover-text">Watch Video<i class="fa fa-angle-right"></i></span></a></li>
                    <li><a href="course-lessons.html">Document : semper dolor quis lectus facilisis laoreet. <span class="hover-text">Let's Go<i class="fa fa-angle-right"></i></span></a></li>
                    <li><a href="quiz-intro.html">Quizzes : auctor quam quis commodo feugiat. <span class="hover-text">upgrade now<i class="fa fa-angle-right"></i></span></a></li>
                    <li class="no-link">There are many variations of passages of Lorem Ipsum available, </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="syllabus-box">
        <div class="syllabus-title">2st lesson</div>
        <div class="syllabus-view">
            <div class="main-point">It is a long established fact that a reader will be distracted by the</div>
            <div class="point-list">
                <ul>
                    <li><a href="course-lessons.html">Lessons : auctor quam quis commodo feugiat. <span class="hover-text">understand now<i class="fa fa-angle-right"></i></span></a></li>                                  
                    <li><a href="course-lessons.html">vedio : Lorem ipsum dolor sit amet. <span class="hover-text">Watch Video<i class="fa fa-angle-right"></i></span></a></li>
                    <li><a href="course-lessons.html">Document : semper dolor quis lectus facilisis laoreet. <span class="hover-text">Let's Go<i class="fa fa-angle-right"></i></span></a></li>
                    <li><a href="quiz-intro.html">Quizzes : auctor quam quis commodo feugiat. <span class="hover-text">upgrade now<i class="fa fa-angle-right"></i></span></a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="syllabus-box">
        <div class="syllabus-title">3st lesson</div>
        <div class="syllabus-view">
            <div class="main-point">readable content of a page when looking at its layout. The point of </div>
            <div class="point-list">
                <ul>
                    <li><a href="course-lessons.html">Lessons : auctor quam quis commodo feugiat. <span class="hover-text">understand now<i class="fa fa-angle-right"></i></span></a></li>                                  
                    <li><a href="course-lessons.html">vedio : Lorem ipsum dolor sit amet. <span class="hover-text">Watch Video<i class="fa fa-angle-right"></i></span></a></li>
                    <li><a href="course-lessons.html">Document : semper dolor quis lectus facilisis laoreet. <span class="hover-text">Let's Go<i class="fa fa-angle-right"></i></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="syllabus-box">
        <div class="syllabus-title">4st lesson</div>
        <div class="syllabus-view">
            <div class="main-point">using Lorem Ipsum is that it has a more-or-less normal distribution </div>
            <div class="point-list">
                <ul>
                    <li><a href="course-lessons.html">Lessons : auctor quam quis commodo feugiat. <span class="hover-text">understand now<i class="fa fa-angle-right"></i></span></a></li>                                  
                    <li><a href="course-lessons.html">vedio : Lorem ipsum dolor sit amet. <span class="hover-text">Watch Video<i class="fa fa-angle-right"></i></span></a></li>
                    <li><a href="quiz-intro.html">Quizzes : auctor quam quis commodo feugiat. <span class="hover-text">upgrade now<i class="fa fa-angle-right"></i></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="syllabus-box">
        <div class="syllabus-title">5st lesson</div>
        <div class="syllabus-view">
            <div class="main-point">of letters, as opposed to using 'Content here, content here', </div>
            <div class="point-list">
                <ul>
                    <li><a href="course-lessons.html">Lessons : auctor quam quis commodo feugiat. <span class="hover-text">understand now<i class="fa fa-angle-right"></i></span></a></li>                                  
                    <li><a href="course-lessons.html">Document : semper dolor quis lectus facilisis laoreet. <span class="hover-text">Let's Go<i class="fa fa-angle-right"></i></span></a></li>
                    <li><a href="quiz-intro.html">Quizzes : auctor quam quis commodo feugiat. <span class="hover-text">upgrade now<i class="fa fa-angle-right"></i></span></a></li>
                </ul>
            </div>
        </div>
    </div>

</div>
<div class="reviews">
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
                            <i class="fill fa fa-star" style="color:orange;"></i>
                            <?php
                        }
                        else
                        {
                            ?>
                            <i class="fa fa-star-o" style="color:orange;"></i>
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
        <script type="text/javascript">
            $("#btnenroll").click(function() {
                var eid=$(this).data("id");
                // alert(eid);
                if(enroll0==0)
                {
                    $.ajax({
                        url : "<?= site_url("User/CourseEnrollC/index/")?>"+eid, 
                        success: function(result){
                            $.notify({
                                message:"Course Enrolled"
                            },{
                                type:'success',
                                allow_dismiss: false,
                                placement: {
                                    from: "bottom",
                                    align: "right"
                                },
                                delay: 1000,
                                animate: {
                                    enter: 'animated fadeInDown',
                                    exit: 'animated fadeOutUp'
                                },
                                onShow: function(){
                                    this.css({'width':'auto','height':'auto'});
                                },
                            });
                            enroll0=1;
                        }                        
                    });
                }
                else
                {
                    $.notify({
                        message:"Already Enrolled"
                    },{
                        type:'danger',
                        allow_dismiss: false,
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        delay: 1000,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
                        onShow: function() {
                            this.css({'width':'auto','height':'auto'});
                        },
                    });
                }                
            });
        </script>
        <script type="text/javascript">
            $("#btnsubmit").click(function(){
                var cid=$(this).data("id");
                if(cart0==0)
                {
                    $.ajax({
                        url : "<?= site_url("User/CartC/index/")?>"+cid, 
                        success: function(result){
                            $.notify({
                                message:"Course added in your cart"
                            },{
                                type:'success',
                                allow_dismiss: false,
                                placement: {
                                    from: "bottom",
                                    align: "right"
                                },
                                delay: 1000,
                                animate: {
                                    enter: 'animated fadeInDown',
                                    exit: 'animated fadeOutUp'
                                },
                                onShow: function(){
                                    this.css({'width':'auto','height':'auto'});
                                },
                            });
                            cart0=1;
                        }
                    });
                }
                else
                {
                    $.notify({
                        message:"Already in your cart"
                    },{
                        type:'danger',
                        allow_dismiss: false,
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        delay: 1000,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
                        onShow: function() {
                            this.css({'width':'auto','height':'auto'});
                        },
                    });
                }
            });
        </script>
    </body>
    </html>


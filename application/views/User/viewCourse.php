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
    <style type="text/css">
        .circle{
            position:relative;
            width:50%;
            padding-bottom:50%;
            background:gold;
            border-radius:50%;
        }
        .circle p{
            position:absolute;
            top:50%; left:50%;
            transform: translate(-50%, -50%);
            margin:0;
            font-style: normal;
        }
    </style>
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
                    <li><a><b><i>courses details</i></b></a></li>
                </ul>
            </div>
        </section>
        <div class="course-details">
            <div class="container">
                <h2><?=$coursedata->courseName?></h2>
                <div class="course-details-main">
                    <div class="course-img">
                        <img src="<?= base_url("upload/course/$coursedata->image")?>" class="img-fluid" style="height:400px;width:1250px;">
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="course-instructorInfo">
                               <div class="info-slide" style="font-size: 20px; color: #4682B4;"><i class="fa fa-user-secret"></i><b><i><?=$coursedata->userName;?></i>
                               </div>
                           </div>
                       </div>
                       <div class="col-sm-6">
                        <div class="btn-row">
                            <?php
                            if($coursedata->userID!=$this->session->userID)
                            {
                                ?>
                                <div class="col-md-3" style="margin-top: 8px">
                                    <a onclick="wishlist(<?= $coursedata->courseID?>)" style="color: red"><i id="wishlistIcon" class="fa fa-heart<?php if($wishlist==0)echo "-o";?> fa-2x" aria-hidden="true"></i></a>
                                </div>
                                <?php
                            }
                            ?>
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
                                <div><a class="btn">Your Course</a></div>
                                <?php
                            }
                            else if($enrollData==1)
                            {
                                ?>
                                <div>
                                    <a class="btn" href="<?= site_url("User/MyCourseC/viewCourse/").urlencode(base64_encode($coursedata->courseID))?>"><i class="fa fa-cart-plus"></i>ALready Enrolled</a>
                                </div>
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
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" style="padding-right:0px;padding-left:0px;"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="padding:10px;">Syllabus</a></li>
                    <li role="presentation" style="padding-right:0px;padding-left: 0px;"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="padding:10px;">Questions</a></li>
                    <li role="presentation" style="padding-right:0px;padding-left: 0px;"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" style="padding:10px;">Reviews</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <!-- syllabus -->
                        <pre style="background-color: white;border-color: white;"></pre>
                        <div class="syllabus">
                            <h4>Syllabus</h4>
                            <?php
                            $cnt = 1;
                            foreach ($chapterData as $key) 
                            {
                                ?>
                                <div class="syllabus-box">
                                    <div class="syllabus-title"></div>
                                    <div class="syllabus-view first">
                                        <div class="main-point active"><?=$cnt?> : <?=$key->chapterName?></div>
                                        <?php
                                        foreach ($key->tpID as $key0) 
                                        {
                                            ?>
                                            <div class="point-list">
                                                <ul>
                                                    <li><a class="video-btn" data-toggle="modal" data-src="<?=$key0->videoURL?>" data-target="#myModal"> Video : Click here <span class="hover-text"><?php 
                                                    if($enrollData==0){
                                                        ?>First Enroll Course<i class="fa fa-angle-right"><?php
                                                    }
                                                    ?></i></span></a></li>
                                                    <li><a> <?=$key0->description?> <span class="hover-text"><?php 
                                                    if($enrollData==0){
                                                        ?>First Enroll Course<i class="fa fa-angle-right"><?php
                                                    }
                                                    ?></i></span></a></li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                $cnt++;
                            }
                            ?>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <!-- question -->
                        <pre style="background-color: white;border-color: white;"></pre>

                        <div class="question">
                            <h4>Ask Question</h4>
                            <div>
                                <input type="button" style="background-color: #008CBA;border: none;color: white;padding: 10px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;" value="Ask Question" id="asked">
                            </div>
                            <div class="ask-question" style="visibility: hidden;display: none;">
                                <div class="row">
                                    <div class="info-slide col-md-2">
                                        <p><span>Ask Question :</span></p>
                                    </div>
                                    <div class="input-box col-md-10">
                                        <input type="text" style="width:500px;height:150px;" class="form-control" id="txtQuestion">
                                    </div>
                                </div>
                                <pre style="background-color: white;border-color: white;"></pre>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <input type="button" style="background-color: #008CBA;border: none;color: white;padding: 10px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;" value="Ask" id="askButton" onclick="myQue(<?=$coursedata->courseID?>)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <pre style="background-color: white;border-color: white;"></pre>

                        <div class="questions">
                            <div class="questions-view">
                                <h4>Questions List</h4>
                                <div class="questions-slide"></div>
                                <?php
                                $q = 0;
                                foreach ($questions as $key)
                                {
                                    ?>
                                    <div class="container">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: white;">
                                                    <h4 class="row" style="position : static;">
                                                        <div class="col-md-11">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1<?=$key->questionID?>"><?=$key->question?></a>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="circle">
                                                                <p><?= substr($key->userName, 0,1)?></p>
                                                            </div>
                                                        </div>  
                                                    </h4>
                                                </div>
                                                <div id="collapse1<?=$key->questionID?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <?php
                                                        foreach ($key->answer as $key0)
                                                        {
                                                            ?>
                                                            <div><?=$key0->answer?></div>
                                                            <?php
                                                        }
                                                        ?>
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
                        <!-- end question -->
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">

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
        wish=<?= $wishlist?>;
        function wishlist(courseID)
        {
            if(wish==0)
            {
                $.ajax({
                    url: "<?= site_url("User/CourseC/addWishlist/")?>"+courseID,
                    success : function(result){
                        $("#wishlistIcon").attr("class","fa fa-heart fa-2x");
                        wish=1;
                        $.notify({
                            message:"Added to wishlist"
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
                    }
                });
            }
            else
            {
                $.ajax({
                    url: "<?= site_url("User/CourseC/removeWishlist/")?>"+courseID,
                    success : function(result){
                        $("#wishlistIcon").attr("class","fa fa-heart-o fa-2x");
                        wish=0;
                        $.notify({
                            message:"Removed from wishlist"
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
                            onShow: function(){
                                this.css({'width':'auto','height':'auto'});
                            },
                        });
                    }
                });   
            }
        }

        $("#btnenroll").click(function() {
            var eid=$(this).data("id");
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


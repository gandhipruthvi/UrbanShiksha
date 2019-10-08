<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    <base href="<?=base_url();?>">
    <!-- Title -->
    <title>UrbanShiksha</title>

    <!--Link Page-->
    <?php include_once("link.php");?>
    <!--#Link Page-->

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
            <div class="banner-img"><img src="iresources/Banner/wishlist.jpg" alt=""></div>
            <div class="page-title">	
                <div class="container">
                    <h1>Wishlist</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="<?= site_url("User/HomeC")?>"><b><i>Home</i></b></a></li>
                    <li><a href="<?= site_url("User/WishlistC")?>"><b><i>Wishlist</i></b></a></li>
                </ul>
            </div>
        </section>
        <section class="courses-view">
            <div class="container">
                <div class="row">
                    <?php 
                    if($wishlistData!=null)
                    {
                        foreach ($wishlistData as $key) {
                            ?>
                            <div class="col-sm-6 col-md-3">
                                <div class="course-post">
                                    <a href="<?= site_url("User/CourseC/viewCourse/").urlencode(base64_encode($key->courseID));?>">
                                        <div class="img">
                                            <img src="upload/course/<?= $key->image?>" alt="">
                                            <div class="price <?php 
                                            if($key->price==0)
                                            echo "free";
                                            ?>" style="width: 80px"><?php 
                                            if($key->price==0)
                                                echo "free";
                                            else
                                                echo "₹ ".$key->price;
                                            ?></div>  
                                        </div>
                                    </a>
                                    <div class="info">
                                        <div class="name"><?= $key->courseName?></div>
                                        <div class="expert"><span>By </span><?= $key->userName?></div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="comment-box">	
                                            <div class="box"><i class="fa fa-users"></i><?= $key->enID->count?> Enrolled</div>
                                        </div>
                                        <div class="rating">
                                            <div class="fill" style="width:<?= $key->rates?>%"></div>
                                        </div>
                                        <div class="view-btn">
                                            <a href="<?= site_url("User/WishlistC/removeCourse/").$key->courseID?>" class="btn" align="center">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                        }
                    }
                    else
                    {
                        ?>
                        <h2 style="text-align: center; font-size: 50px">Your wishlist is empty</h2>
                        <?php
                    }
                    ?>
                </div>
            </section>
            <!--Footer Page-->
            <?php include_once("footer.php");?>
            <!--#Footer Page-->
        </div>

        <!--Script Page-->
        <?php include_once("script.php");?>
        <!--#Script Page-->
    </body>
    </html>


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
    <link rel="shortcut icon" href="resources/images/Favicon.ico">
    <!-- <link href="assets/css/main.css" rel="stylesheet"> -->
    <!-- CSS Stylesheet -->
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
            <div class="banner-img"><img src="images/bookimg1.jpg" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>Cart</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb ">
            <div class="container">
                <ul>
                    <li><a href="<?site_url("User/HomeC")?>"><b><i>Home</i></b></a></li>
                    <li><a><b><i>Cart</i></b></a></li>
                </ul>
            </div>
        </section>
        <section class="cart-page">
            <div class="container"><?php
            if($cartData!=null)
            {
                ?>
                <div class="table-view">
                    <div class="cart-table">
                        <table>
                            <tr>
                                <th>COURSE</th>
                                <th>PRICE</th>
                                <th>TOTAL</th>
                                <th>&nbsp;</th>
                            </tr>
                            <?php
                            foreach ($cartData as $key) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="product-details">
                                            <div class="img"><img src="<?= base_url("upload/course/$key->image")?>" alt="" style="width:80px;height:65px;"></div>
                                            <div class="name"><?=$key->courseName?></div>
                                        </div>
                                    </td>
                                    <td><span class="small-text">PRICE</span><?=$key->price?></td>
                                    <td><span class="small-text">TOTAL</span><?=$key->price?></td>
                                    <td><span class="small-text">Remove Item</span><a href="<?=site_url('User/CartC/deleteCart/'.$key->courseID);?>" class="close-icon"><span>Delete</span><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="cart-total">
                        <table id="discount">
                            <?php
                            $total = 0;
                            foreach ($cartData as $key) 
                            {
                                $total += $key->price;
                            }
                            ?>
                            <tr class="total">
                                <td>Total Amount:-</td>
                                <td>₹<?=$total?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="cart-row">
                    <div class="coupon-code">
                        <input type="text" placeholder="Coupon code" id="txtCoupon">
                        <input type="submit" value="APPLY" onclick="applyCoupon(<?= $total?>)" class="btn">
                    </div>
                    <div class="check-outBtn">
                        <a id="checkOut" href="<?=site_url('User/HomeC/paySuccess/'.$key->cartID.'/'.$total);?>" class="btn">Proceed to Checkout</a>
                    </div>
                </div>
                <?php
            }
            else
            {
                ?>
                <h2 style="text-align: center; font-size: 50px">Your shopping cart is empty</h2>
                <?php
            }
            ?>
        </div>
    </section>
    <script type="text/javascript">
    function applyCoupon(total)
    {
        if($("#txtCoupon").val()=="" || $("#txtCoupon").val()==null)
        {
            $.notify({
                message:"Please enter coupon-code"
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
        else
        {
            htmlText="";
            coupon=$("#txtCoupon").val();
            $.ajax({
                url:"<?= site_url("User/CartC/checkCode/")?>"+coupon,
                success: function(result){
                    result = JSON.parse(result);
                    if(result==null)
                    {
                        $.notify({
                            message:"Please enter valid coupon-code"
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
                    else
                    {
                        discountAmt=total*result.description/100;
                        net=total-discountAmt;
                        htmlText+='<tr class="total">';
                        htmlText+='<td>Total Amount</td>';
                        htmlText+='<td>₹'+total+'</td>';
                        htmlText+='</tr>';
                        htmlText+='<tr class="total">';
                        htmlText+='<td>Discount Amount</td>';
                        htmlText+='<td>₹'+discountAmt+'</td>';
                        htmlText+='</tr>';
                        htmlText+='<tr class="total">';
                        htmlText+='<td>Net Amount</td>';
                        htmlText+='<td>₹'+net+'</td>';
                        htmlText+='</tr>';
                        $("#discount").html(htmlText);
                        $("#checkOut").attr("href","<?=site_url('User/HomeC/paySuccess/'.$key->cartID.'/')?>"+net);
                    }
                }
            });
        }
    }
</script>
    <section class="our-course">
        <div class="container">
            <div class="section-title">
                <h2>Our Courses</h2>
            </div>
            <div class="row">
                    <?php 
                foreach ($courseData as $key) {
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="course-box">
                            <div class="img">
                                <img src="upload/course/<?= $key->image?>" alt="">
                                <div class="price <?php if($key->price==0)echo 'free';?>" style="width:80px"><?php if($key->price==0)echo "free"; else echo "₹".$key->price;?></div>
                            </div>
                            <div class="course-name"><?= $key->courseName?><span><em>By </em><?= $key->userName?></span></div>
                            <div class="comment-row">
                                <div class="rating">
                                    <div class="fill" style="width:<?= $key->rates?>%"></div>
                                </div>
                                <div class="box"><i class="fa fa-users"></i><?= $key->enID->count?> Student</div>
                                <div class="enroll-btn">    
                                    <a href="<?=site_url("User/CourseC/viewCourse/").urlencode(base64_encode($key->courseID))?>" class="btn">More Info</a>
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
</body>
</html>



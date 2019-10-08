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
    <!--Link Page-->
    <?php include_once("link.php");?>
    <!--#Link Page-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<style>
    .form-group {
        margin-bottom: 10px;
    }
</style>
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
                    <h1>Account Settings</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="<?= site_url("User/HomeC")?>"><b><i>Home</i></b></a></li>
                    <li><a><b><i>Account Settings</i></b></a></li>
                </ul>
            </div>
        </section>
        <div class="my-accountPage">
            <div class="container">
                <div class="my-account">
                    <div class="account-tab">
                        <ul>
                            <li class="active"><a href="javascript:void(0);" id="profile">Profile</a></li>
                            <!-- <li><a href="javascript:void(0);" id="order">Order</a></li> -->
                            <li><a href="javascript:void(0);" id="change">Change Profile</a></li>
                            <li><a href="javascript:void(0);" id="changePassword">Change Password</a></li>
                        </ul>
                    </div>
                    <div class="tab-content profile-con open">
                        <div class="personal-edit">
                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i><span>Edit Profile</span></a>
                        </div>
                        <div class="personal-information">
                            <div class="info-slide">
                                <p><span>Name :</span><?=$userData->userName?></p>
                            </div>
                            <div class="info-slide">
                                <p><span>Email ID :</span><?=$userData->email?></p>
                            </div>
                            <div class="info-slide">
                                <p><span>Mobile Number :</span><?=$userData->contactNumber?></p>
                            </div>
                            <div class="info-slide">
                                <p><span>Date Of Birth :</span><?=$userData->dateOfBirth?></p>
                            </div>
                            <div class="info-slide">
                                <p><span>Gender :</span><?=$userData->gender?></p>
                            </div>
                            <div class="info-slide">
                                <p><span>Qualification :</span><?=$userData->qualification?></p>
                            </div>
                            <div class="info-slide">
                                <p><span>City :</span><?=$userData->cityName?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content change-con">
                        <form method="post" enctype="multipart/form-data" action="<?= site_url('User/AccountSettingC/changePicture/')?>">

                            <div class="row clearfix">           
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="col-sm-6 col-form-label"><h3>Current Image</h3></label>
                                        <div class="col-sm-5">
                                            <?php

                                            if($this->session->picture!="")
                                            {
                                                $picture = "upload/".$this->session->picture;
                                            }
                                            ?>
                                            <img src="<?=$picture?>" class="img-thumbnail" alt="profile image">
                                        </div>                                                
                                    </div>
                                </div>
                            </div>
                            <pre style="background-color: white;border-color:white;"></pre>
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-sm-6 col-form-label"><h3>New Image</h3></label>
                                    <div class="col-sm-5">
                                        <input type="file" name="newImage">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-raised g-bg-blush2" value="Change">
                            </div>
                        </form>
                    </div>                    
                    <div class="tab-content changePassword-con">
                        <div class="change-password ">
                            <div class="input-box">
                                <input type="password" placeholder="Current Password" id="oldPass">
                                <div id="res"></div>
                            </div>           
                            <div class="input-box">
                                <input type="password" placeholder="New Password" id="newPass">
                            </div>
                            <div class="input-box">
                                <input type="password" placeholder="Confirm Password" id="confirmPass">
                                <div id="pass"></div>
                            </div>      
                            <div class="submit-box">
                                <input type="button" value="Save" id="btnsubmit" class="btn">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="our-advantages">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="advantages-box">
                                <div class="img"><img src="resources/images/learn-icon.png" alt=""></div>
                                <h3>Learn at your own place</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stanypesetting, </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="advantages-box">
                                <div class="img"><img src="resources/images/save-timeIcon.png" alt=""></div>
                                <h3>Save time and money</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="advantages-box">
                                <div class="img"><img src="resources/images/online-learningIcon.png" alt=""></div>
                                <h3>100% Online learning</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="POST" enctype="multipart/form-data" action="<?=site_url('User/AccountSettingC/editData/')?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Profile</h4>
                        </div>
                        <div class="modal-body" style="text-align: center">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="info-slide">
                                        <p><span>Name :</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <input type="text" value="<?=$userData->userName;?>" name="txtuser" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="info-slide">
                                        <p><span>Email :</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <input type="text" value="<?=$userData->email?>" name="txtemail" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="info-slide">
                                        <p><span>Mobile Number :</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <input type="text" value="<?=$userData->contactNumber?>" name="txtnum" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="info-slide">
                                        <p><span>Date Of Birth :</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <input type="date" value="<?=$userData->dateOfBirth?>" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="info-slide">
                                        <p><span>Gender :</span></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-box">
                                        <input value="Female" id="radio-01" name="gender" type="radio" style="-webkit-appearance:radio;" 
                                        <?php
                                        if($userData->gender=="Female")
                                            {echo "checked";}
                                        ?>
                                        >Female
                                        <input value="Male" id="radio-02" name="gender" type="radio" style="-webkit-appearance:radio;" 
                                        <?php
                                        if($userData->gender=="Male")
                                            {echo "checked";}
                                        ?>
                                        >Male
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="info-slide">
                                        <p><span>Qualification :</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <input type="text" value="<?=$userData->qualification?>" name="txtquali" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="info-slide">
                                        <p><span>City :</span></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="custom-select" style="width:200px;" align="left">
                                        <select name="dropCity">
                                            <?php
                                            foreach ($cityData as $key)
                                            {
                                                ?>
                                                <option value="<?=$key->cityID?>"><?=$key->cityName?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <div class="info-slide">
                                        <p><span></span></p>
                                    </div>
                                </div>
                            </div>              
                        </div>
                        <div class="modal-footer">
                            <div class="row">

                                <button type="submit" class="btn btn-default" name="btnsub" class="form-control">Update</button>

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Footer Page-->


    <?php include_once("footer.php");?>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <?php include_once("script.php");?>

</body>
</html>
<script type="text/javascript">
    $("#oldPass").blur(function(){
        var x = $("#oldPass").val();
        $.ajax({
            url: "<?= site_url('User/AccountSettingC/chkPass/')?>"+x, 
            success: function(result){
                $("#res").html(result);
                if(result == 'Old password is not correct')
                {
//document.getElementById('btnsubmit').style.visibility = 'hidden';
$("#btnsubmit").hide();
}
else
{
//document.getElementById('btnsubmit').style.visibility = 'visible';
$("#btnsubmit").show();
}
}
});      
    });

    $("#confirmPass").blur(function(){   
        if($("#newPass").val() == $("#confirmPass").val())
        {
            $("#pass").html("Password matched");        
            $("#btnsubmit").removeAttr("disabled");
        }
        else
        {
            $("#pass").html("Password doesn't match");
            $("#btnsubmit").attr("disabled",true);
        }
    });

    $("#newPass").blur(function(){   
        if($("#confirmPass").val() != "")
        {
            if($("#newPass").val() == $("#confirmPass").val())
            {
                $("#pass").html("Password matched");        
                $("#btnsubmit").removeAttr("disabled");
            }
            else
            {
                $("#pass").html("Password doesn't match");
                $("#btnsubmit").attr("disabled",true);
            }
        }
    });

    $("#btnsubmit").click(function(){
        var x=$("#newPass").val();
        $.ajax({
            url : "<?= site_url("User/AccountSettingC/chngPass/")?>"+x, 
            success: function(result){
                swal("Password Changed", "", "success");
                $("#res").html("");
                $("#pass").html("");
                $("#btnsubmit").attr("disabled",true);
                $("#newPass").val("");
                $("#confirmPass").val("");
                $("#oldPass").val("");
            }
        });
    });    
</script>
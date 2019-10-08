<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:35 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="<?=base_url()?>">
    <title>UrbanShiksha | Admin</title>
    <script
    src="https://code.jquery.com/jquery-3.4.0.js"
    integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
    crossorigin="anonymous">
</script>
<script type="text/javascript">
</script>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<!-- Sweetalert Css -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
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
    <?php include_once("morphingSearch.php");?>
    <!-- /morphsearch-content --> 

    <!-- Top Bar -->
    <?php include_once("topBar.php");?>
    <!-- #Top Bar -->

    <!--Side menu and right menu -->
    <?php require_once("sideMenuRightMenu.php");?>
    <!--Side menu and right menu -->

    <!-- main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Manage Profile</h2>
                <small class="text-muted"></small>
            </div>

            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>  </h2>
                        </div>
                        <div class="body"> 
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#settings_with_icon_title"><i class="zmdi zmdi-settings"></i> CHANGE PASSWORD </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile_with_icon_title"><i class="zmdi zmdi-account"></i> PROFILE PICTURE </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile_with_change_data"><i class="zmdi zmdi-edit"></i> MANAGE DETAILS </a></li>                            
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="settings_with_icon_title"> <b>Change Your Password</b>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" placeholder="Current Password" name="currentPassword" id="currentPassword" required>
                                                </div>
                                            </div>
                                            <div class="form-group" id="newPasswordDiv">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="newPassword" placeholder="New Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group" id="confirmPasswordDiv">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm New Password" required>
                                                </div>
                                            </div>
                                            <button class="btn btn-raised btn-success" id="saveChanges">Save Changes</button>
                                            <button class="btn btn-raised g-bg-blush2" id="continue">Continue</button>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile_with_icon_title">
                                    <b>Change Profile Picture</b>

                                    <form method="post" enctype="multipart/form-data" action="<?= site_url('Admin/PictureC/changePicture/')?>">

                                        <div class="row clearfix">           
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-sm-6 col-form-label"><h3>Current Image</h3></label>
                                                    <div class="col-sm-5">
                                                        <?php

                                                        if($this->session->pictur!="")
                                                        {
                                                            $picture = "upload/".$this->session->pictur;
                                                        }
                                                        ?>
                                                        <img src="<?=$picture?>" class="img-thumbnail" alt="profile image">
                                                    </div>                                                
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-sm-6 col-form-label"><h3>New Image</h3></label>
                                                <div class="col-sm-5">
                                                    <input type="file" class="form-control" name="newImage">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-raised g-bg-blush2" value="Change">
                                        </div>

                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile_with_change_data">
                                    <b>Manage Details</b>
                                    <form method="post" enctype="multipart/form-data" action="<?=site_url('Admin/ChangeDataC/')?>">
                                        <div class="row clearfix">           
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Admin Name" name="txtanm" value="<?php
                                                        if(isset($adminInfo->adminName))
                                                        echo $adminInfo->adminName;
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">           
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Email" name="txtemail" value="<?php
                                                        if(isset($adminInfo->email))
                                                        echo $adminInfo->email;
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="row clearfix">           
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="User Name" name="txtusnm" value="<?php
                                                        if(isset($adminInfo->userName))
                                                        echo $adminInfo->userName;
                                                        ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   

                                        <div class="row clearfix">           
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Contact No" name="txtcno" value="<?php
                                                        if(isset($adminInfo->contactNo))
                                                        echo $adminInfo->contactNo;
                                                        ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                               
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-raised g-bg-blush2" value="Change">
                                        </div>

                                    </form>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->         
        </div>
    </section>

    <div class="color-bg"></div>
    <!-- Jquery Core Js --> 
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 
    <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script> <!-- sweetalert --> 
    <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js --> 
    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
    <script>
        $("#newPasswordDiv").hide();
        $("#confirmPasswordDiv").hide();
        $("#saveChanges").hide();
        $("#continue").click(function(){
            var currentPassword = $("#currentPassword").val();
            $.ajax({
                url:"<?= site_url("Admin/ChangePasswordC/chkPass/")?>"+currentPassword,
                type:'post',
                success: function(data){
                    if (data==1) {
                        showNotification("alert-success", "Old Password is correct", "bottom", "left", "", "");
                        $("#newPasswordDiv").show();
                        $("#confirmPasswordDiv").show();
                        $("#continue").hide();
                        $("#saveChanges").show();
                        $("#currentPassword").attr("readonly");
                    }
                    else
                    {
                        showNotification("alert-danger", "Password is incorrect", "bottom", "left", "", "");
                        $("#currentPassword").val("");
                        $("#newPasswordDiv").hide();
                        $("#confirmPasswordDiv").hide();
                    }
                }
            });
        });

        $("#saveChanges").click(function(){
            var newPassword=$("#newPassword").val();
            var confirmPassword=$("#confirmPassword").val();
            if(newPassword==confirmPassword)
            {
                $.ajax({
                    url:"<?= site_url("Admin/ChangePasswordC/changePass/")?>"+newPassword,
                    type:'post',
                    success: function(data){
                        if (data==1) {
                            showNotification("alert-success", "Password Updated", "bottom", "left", "", "");
                            $("#currentPassword").val("");
                            $("#newPassword").val("");
                            $("#confirmPassword").val("");
                            $("#currentPassword").removeAttr("readonly");
                            $("#newPasswordDiv").hide();
                            $("#confirmPasswordDiv").hide();
                            $("#saveChanges").hide();
                            $("#continue").show();
                        }
                        else
                        {
                            showNotification("alert-danger", "Error updating password", "bottom", "left", "", "");
                        }
                    }
                });
            }
            else
            {
                showNotification("alert-danger", "Password must match", "bottom", "left", "", "");
            }
        });
    </script>
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:35 GMT -->
</html>


<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/collapse.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:28 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<base href="<?=base_url()?>">
<title>UrbanShiksha | Admin</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
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
<?php include_once("morphingSearch.php");?>    
<!-- /morphsearch-content --> 

<!-- Top Bar -->
<?php include_once("topBar.php");?>
<!-- #Top Bar -->

<!--Side menu and right menu -->
<?php include_once("sideMenuRightMenu.php");?>
<!--Side menu and right menu -->

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Question</h2>
        </div>
        <!-- Example -->
        </div>
        <!-- Multiple Items To Be Open -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <small>Click on Question for more details</small>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                  <div id="accordion">
                    <div class="body">
                        <div class="row clearfix">
                        <?php
                            foreach ($ans as $key)
                            {
                        ?>                            
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                    <div class="panel-group full-body" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-col-black">
                                        <div class="panel-heading" role="tab" id="headingOne_19">
                                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" href="#collapseOne_19<?=$key->questionID?>" aria-expanded="true" aria-controls="collapseOne_19" style="height:40px;">
                                                <div class="row">
                                                <div class="col-md-10">
                                                <?=$key->question?>
                                                </div>
                                                <div class="col-md-2" style="text-align: right">
                                                    <img class="img-circle" src="<?=base_url("upload/$key->image")?>" style="height:20px;width:20px;border-radius:50%;" alt="hi">
                                                    <?=$key->userName?>
                                                </div>       
                                                </div>
                                            </a></h4>
                                        </div>
                                        <div id="collapseOne_19<?=$key->questionID?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19" data-parent="#accordion" style="background-color:#C0C0C0">
                                            <?php
                                                foreach ($key->answer as $qey)
                                                {
                                            ?>
                                            <div class="row">
                                            <div class="col-md-2" align="center">
                                                
                                                <img class="img-circle" src="<?=base_url("upload/$qey->image")?>" style="height:60px;width:60px;border-radius:50%" alt="hi" align="left">
                                                <p>AnswerBy : <?=$qey->userName?></p>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="panel-body" style="background-color:lightgrey;color:black;">
                                                Answer : <mark><?=$qey->answer?></mark></div>
                                            <!-- <div style="vertical-align: text-bottom;">AnswerBy : <?=$qey->userName?></div> -->
                                            </div>
                                            <div class="col-md-2">
                                                <p style="vertical-align: text-top;">Qualification : <?=$qey->qualification?></p>
                                                <p style="vertical-align: text-bottom;">Contact : <?=$qey->email?></p>
                                            </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
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
        <!-- #END# Multiple Items To Be Open --> 
    </div>
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 




</body>

<!-- Mirrored from thememakker.com/templates/swift/university/collapse.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:29 GMT -->
</html>
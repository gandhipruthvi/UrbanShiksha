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
            <h2>CHALLENGES</h2>
            <small class="text-muted">Welcome to Challenges</small>
        </div>
        <!-- Example -->
        
        <div class="container">
          <div id="accordion">
            <?php 
            foreach ($challengeData as $key)
            {
              ?>
              <div class="card">
                <div class="card-header" style="background-color: dimgrey;">
                  <div class="row">
                    <div class="col-md-11">
                      <a class="card-link" data-toggle="collapse" href="#collapseOne<?= $key->challengeID?>" style="color: white;">
                        <?=$key->challengeName?>                  
                      </a>
                    </div>
                    <div class="col-md-1">
                      <div class="switch">
                        <label>
                          <input type="checkbox" class="chkstatus" data-id="<?= $key->challengeID?>" 
                          <?php
                          if($key->status != 0)
                            echo "checked";
                          ?>>
                          <span class="lever"></span>
                        </label>
                      </div>
                    </div>
                  </div>              
                </div>
                <div id="collapseOne<?=$key->challengeID?>" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    <?php
                    foreach ($key->answer as $key1) 
                    {
                      ?>
                      <div class="row">
                        <div class="col-md-4" style="background-color: dimgrey;color: white">
                          <p>Creator Name:<?=$key->userName?></p>
                          <p>Type:<?=$key->challengeType?></p>
                          <p><?=$key->questionDescription?></p>
                        </div>
                        <div class="col-md-8" style="background-color: lightsteelblue">
                          <p>Answer By:<?=$key1->userName?></p>
                          <p>Solution:<?=$key1->description?></p>
                        </div>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>


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
<script type="text/javascript">
    $(".chkstatus").change(function(){
        var id=$(this).data("id");
        $.ajax({
            url : "<?= site_url("Admin/ChallengeC/statusChange/")?>"+id,
            success: function(result){
            }
        });
    });
</script>
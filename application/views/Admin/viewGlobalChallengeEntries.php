<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:15 GMT -->
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
  <!-- Custom Css -->
  <link href="assets/css/main.css" rel="stylesheet">

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
        <h2>Global Challenge : <?=$globalChallenge->globalChallengeName?></h2>
      </div>
      <h4>Entries</h4>
      <div class="row clearfix">
        <?php
        foreach ($fetchEntries as $key) 
        {
          ?>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="member-card verified">
                  <div class="m-t-20">
                    <p align="left">Answer : <?=$key->answer?></p>
                    <p align="left">User Name : <?=$key->userName?></p>
                    <input type="button" onclick="location.replace('<?=site_url('Admin/GlobalChallengeC/setWinner/').$key->globalChallengeEntriesID."/".$gID?>')" class="btn btn-raised g-bg-blush2" value="Winner" <?php
                      if($globalChallenge->winnerID==null || $globalChallenge->winnerID=="")
                      {
                        echo "enabled";
                      }
                      else
                      {
                        echo "disabled";
                      }
                    ?>>
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
    </section>
    <!-- main content -->

    <!-- modal -->
<!-- <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="Post">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Offer</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Offer ID</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="txtOfferID" name="txtOfferID" disabled>
                        </div>
                    </div>

                    <div id="res"></div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
  </div> -->
  <!-- modal end -->

  <div class="color-bg"></div>
  <!-- Jquery Core Js --> 
  <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
  <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
  <script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

  <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:16 GMT -->
</html>
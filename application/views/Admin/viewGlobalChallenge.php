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
        <h2>Global Challenges</h2>
      </div>
      <div class="row clearfix">
        <?php 
        foreach ($globalChallenge as $key) {
          ?>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="card">
              <div class="card-body">
<!--                         <div align="right">
                            <a class="editmodal" data-id="<?= $key->globalChallengeID?>" data-toggle="modal" data-target="#defaultModal"><i class="zmdi zmdi-edit"></i></a>
                          </div> -->
                          <div class="member-card verified">
                            <div class="m-t-20">
                              <h4 class="m-b-0"><?= $key->globalChallengeName?></h4>
                              <p class="text-muted">Creator : <?= $key->adminName?></p>
                              <?php
                                if($key->image!=null || $key->image!="")
                                {
                              ?>
                              <div class="popper" data-toggle="popover">
                                <p>Image</p>
                              </div>
                              <div class="popper-content" hidden>
                                <p><img src="<?=base_url("upload/challenge/").$key->image?>" style="height: 250px;width: 250px;"></p>
                              </div>
                              <?php
                                }
                              ?>
                              <p class="text-muted">Starting Date : <?= $key->startDate?></p>
                              <p class="text-muted">Ending Date : <?= $key->endDate?></p>
                            </div>

                            <?php
                            if($key->status != -1)
                            {
                              ?>
                              <p class="text-muted">
                                <div class="switch">
                                  <label>Enabled
                                    <input type="checkbox" class="checkbox-status" data-id="<?= $key->globalChallengeID?>" 
                                    <?php 
                                    if($key->status==1)
                                    {
                                      echo "checked";
                                    }
                                    ?>
                                    >
                                    <span class="lever"></span>Disabled</label>
                                  </div>
                                </p>
                                <?php
                              }
                              else
                              {
                                ?>
                                <a class="btn-grp btn btn-raised btn-primary m-t-20 waves-effect" href="<?= site_url("Admin/OffersC/startOffer/$key->offerID")?>" data-id="<?= $key->offerID?>" data-name="<?= $key->offerName?>" data-code="<?= $key->offerCode?>">Start</a>
                                <?php
                              }
                              ?>   
                              <div class="col-sm-12">
                                <input type="button" onclick="window.location.href='<?=site_url('Admin/GlobalChallengeC/getGlobalEntries/').$key->globalChallengeID?>'" class="btn btn-raised g-bg-blush2" value="View Details"  id="btnG">
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
  <script src="assets/plugins/tether/tether.js"></script><!-- Custom Js -->
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:16 GMT -->
</html>
<script type="text/javascript">
  $(".checkbox-status").change(function(){
    var id=$(this).data("id");
    $.ajax({
      url : "<?= site_url("Admin/GlobalChallengeC/statusChange/")?>"+id,
      success: function(result){             
      }
    });
  });
</script>

<script type="text/javascript">
  $('[data-toggle="popover"]').popover({
    placement : 'bottom',
    trigger : 'hover',
    container : 'body',
    title : 'Image',
    html : true,
    content : function(){
      return $(this).next('.popper-content').html();
    }
  });
</script>
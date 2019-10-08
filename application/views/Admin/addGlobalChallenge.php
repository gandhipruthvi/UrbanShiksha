<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/add-professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:10 GMT -->
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
    <!-- Dropzone Css -->
    <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Wait Me Css -->
    <link href="assets/plugins/waitme/waitMe.css" rel="stylesheet" />
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
                <h2>Add Global Challenge</h2>
                <form method="post" enctype="multipart/form-data" action="<?=site_url('Admin/GlobalChallengeC/addGlobalChallenge')?>">
                    <div class="row clearfix">           
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Global Challenge Title" name="globalChallengeName">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">           
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Question" name="txtQuestion">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row clearfix">           
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Description" name="description">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="button" class="btn btn-raised g-bg-blush2" id="addMedia" value="Add Media">
                    </div>                    

                    <div class="dropzone" id="myDropzone" style="visibility: hidden;display: none;width:600px;">
                        <div class="dz-default dz-message">
                            <span>Upload Media</span>
                        </div> 
                        <input type="hidden" name="img" id="img">         
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" class="form-control" placeholder="Start Date" name="startDate">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" class="form-control" placeholder="End Date" name="endDate">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-raised g-bg-blush2" value="Submit">
                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- main content -->

    <div class="color-bg"></div>

    <!-- Jquery Core Js --> 
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 


    <script src="assets/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
    <script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
    <script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
    <!-- Bootstrap Material Datetime Picker Plugin Js --> 
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 

    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
    <script src="assets/js/pages/forms/basic-form-elements.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/add-professors.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:13 GMT -->
</html>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    var base64 = '';
    $("#myDropzone").dropzone({
        url: "<?= base_url("upload")?>",       
        addRemoveLinks: true,
        maxFiles: 1,
        maxFileSize: 1,
        init: function() {
            this.on("addedfile", function (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    // event.target.result contains base64 encoded image                    
                    var base64String = event.target.result;

                    $("#img").val(base64String);
                    handlePictureDropUpload(base64String ,fileName );
                };
                reader.readAsDataURL(file);
            });
        },
    });
</script>
<script type="text/javascript">
    $("#addMedia").click(function(){
        if($("#myDropzone").is(":visible"))
        {
            $("#addMedia").val("Add Media");
            $("#myDropzone").css({"visibility":"hidden","display":"none"});
        }
        else
        {
            $("#addMedia").val("Cancel Media");
            $("#myDropzone").css({"visibility":"visible","display":"block"});
        }
    });
</script>
<!-- <script type="text/javascript">
 /*$('.datetimepicker').datetimepicker({
    format: 'yyyy-mm-dd hh:ii:ss'
 });*/
 // $('#datetimepicker').datetimepicker('setDaysOfWeekDisabled');
 $(function () {
   /* $('.datetimepicker').datetimepicker({
        alert(1);
        format: 'YYYY-MM-DD hh:mm'
    });*/

        alert("1");
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'YYYY MMMM DD - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY MMMM DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
});
</script> -->
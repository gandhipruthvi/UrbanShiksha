<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/departments.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:18 GMT -->
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
<!-- JQuery DataTable Css -->
<link href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
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
    
    <!--#Morphing Search-->

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
            <h2>Fourms</h2>
        </div>
        <!-- Basic Examples -->
        <!-- #END# Basic Examples --> 
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Forum ID</th>
                                    <th>Forum Topic</th>
                                    <th>Created Date</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                    <th>Like</th>
                                </tr>
                            </thead>                            
                            <tbody>
                                <?php
                                    foreach ($forumData as $key) 
                                    {
                                ?>
                                <tr>
                                    <td><?=$key->forumID?></td>
                                    <td><?=$key->forumTopic?></td>
                                    <td><?=$key->createdDate?></td>
                                    <td><?=$key->user->userName?></td>
                                    <td>
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" class="status-group" data-id="<?= $key->forumID?>" <?php 
                                                if($key->status == 0)
                                                    echo "checked";
                                                ?>>
                                                <span class="lever"></span>
                                            </label>
                                        </div>                                        
                                    </td>
                                    <td><?=$key->totalLike->flike?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table --> 
    </div>
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

<!-- Jquery DataTable Plugin Js --> 
<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/departments.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:18 GMT -->
</html>
<script type="text/javascript">
    $(".status-group").change(function(){
        var id=$(this).data("id");
        $.ajax({
            url : "<?= site_url("Admin/ForumC/statusChange/")?>"+id,
            success: function(result){              
            }
        });
    });
</script>
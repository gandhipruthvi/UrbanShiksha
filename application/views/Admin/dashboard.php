<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:07 GMT -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<base href="<?= base_url()?>">
	<title>UrbanShiksha | Admin</title>
	<link rel="icon" href="Admin/favicon.ico" type="image/x-icon">
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
	<section class="content home">
		<div class="container-fluid">
			<div class="block-header">
				<h2>Dashboard</h2>
				<small class="text-muted">Welcome to Urban Shiksha</small>
			</div>
			<div class="row clearfix top-report">
            <!-- <div class="col-lg-3 col-sm-6 col-md-6">
            </div> -->
            <div class="col-lg-3 col-sm-6 col-md-6">
            	<div class="card">
            		<div class="body">

            			<div class="row"><div class="col-md-3"><img src="<?= base_url("resources/images/student.jpg")?>" height="50px" wdith="200px"></div><div class="col-md-9" style="font-size: 24px;"><b>Total Students</b></div></div>
            			<!-- <p class="text-muted"> -->
                        <!-- <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div> -->
                        <center>
                        	<h1 style="color:#4682B4;font-size:42px;"><?=$studentdata?></h1>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
            	<div class="card">
            		<div class="body">
            			<div class="row"><div class="col-md-3"><img src="<?= base_url("resources/images/course.jpg")?>" height="55px" wdith="200px"></div><div class="col-md-9" style="font-size: 24px;"><b>Total Courses</b></div></div>

            			<center>
            				<h1 style="color:#4682B4;font-size:42px;"><?=$coursedata?></h1>
            			</center>
            		</div>
            	</div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
            	<div class="card">
            		<div class="body">
            			<div class="row"><div class="col-md-3"><img src="<?= base_url("resources/images/rupee.jpg")?>" height="55px" wdith="200px"></div><div class="col-md-9" style="font-size: 24px;"><b>Total Earnings</b></div></div>

            			<center>
            				<h1 style="color:#4682B4;font-size:42px;">₹<?=$amountdata->amount?></h1>
            			</center>
            		</div>
            	</div>
            </div>         
            <div class="col-lg-3 col-sm-6 col-md-6">
            	<div class="card">
            		<div class="body">
            			<div class="row"><div class="col-md-3"><img src="<?= base_url("resources/images/instructor.jpg")?>" height="55px" wdith="200px"></div><div class="col-md-9" style="font-size: 24px;"><b>Total Instructor</b></div></div>
            			<center>
            				<h1 style="color:#4682B4;font-size:42px;"><?=$instructordata?></h1>
            			</center>
            		</div>
            	</div>
            </div>           
        </div> 

        <div class="row clearfix"> 
        	<!-- Task Info -->
        	<div class="col-sm-12 col-md-12">
        		<div class="card">
        			<div class="header">
        				<h2><b>COURSE INFOS</b></h2>
        				<ul class="header-dropdown">
        					<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
        						<ul class="dropdown-menu pull-right">
        							<li><a href="javascript:void(0);">Action</a></li>
        							<li><a href="javascript:void(0);">Another action</a></li>
        							<li><a href="javascript:void(0);">Something else here</a></li>
        						</ul>
        					</li>
        				</ul>
        			</div>
        			<div class="body">
        				<div class="table-responsive">
        					<table class="table table-hover dashboard-task-infos">
        						<thead>
        							<tr>
        								<th>#</th>
        								<th>Course</th>
        								<th>Instructor</th>
        								<th>No Of Chapters</th>
        								<th>Price</th>
        							</tr>
        						</thead>
        						<tbody>
        							<?php
        							$cnt=0;
        							foreach ($coursedata1 as $key) 
        							{
        								$cnt++;
        								?>
        								<tr>
        									<td><?=$cnt;?></td>
        									<td><?=$key->cdata1->courseName;?></td>
        									<td><span class="label bg-green"><?=$key->cdata1->userName;?></span></td>
        									<td><?=$key->cdata1->noOfChapters;?></td>
        									<td><?=$key->cdata1->price;?></td>
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
        	<!-- #END# Task Info --> 
        </div>


    </div>
</section>
<!-- main content -->

<div class="color-bg"></div>

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search -->

<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/charts/sparkline.min.js"></script> 
<script src="assets/js/pages/index.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/swift/university/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Apr 2019 11:10:07 GMT -->
</html>
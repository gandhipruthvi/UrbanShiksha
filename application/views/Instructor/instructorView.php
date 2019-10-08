<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?=base_url();?>">

  <!-- links -->
  <?php require_once("link.php")?>

</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- navBar -->
    <?php require_once("navBar.php")?>

    <!-- mainSideBar -->
    <?php require_once("mainSideBar.php")?> 

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Courses</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Courses</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <?php
            foreach ($courseData as $key) {
              ?>
              <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <!-- Profile Image -->
                <div class="card card-primary card-outline" style="margin: 15px">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                      src="upload/course/<?= $key->image?>"
                      alt="User profile picture" style="height: 150px; width: 200px">
                    </div>

                    <h3 class="profile-username text-center"><?= $key->courseName?></h3>

                    <p class="text-muted text-center"><?= $key->userName?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Price</b> <a class="float-right"><?= $key->price?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Subject</b> <a class="float-right"><?= $key->subjectName?></a>
                      </li>
                    </ul>

                    <a href="<? site_url('CourseC/courseDetails/'.$key->courseID)?>" class="btn btn-primary btn-block"><b>More Info</b></a>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- /.col -->
              <?php
            }
            ?>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php require_once("footer.php")?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- script -->
  <?php require_once("script.php")?>

</body>
</html>
<script type="text/javascript">
  $('[data-toggle="popover"]').popover({
    placement : 'bottom',
    trigger : 'hover',
    container : 'body',
    html : true,
    content : function(){
      return $(this).next('.popper-content').html();
    }
  });
</script>
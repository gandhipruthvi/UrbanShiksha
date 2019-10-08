<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UrbanShiksha | Instructor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?=base_url();?>">

  <!-- links -->
  <?php require_once("link.php")?>
<style>
.addCourse:link, .addCourse:visited {
  padding: 15px 25px;
  text-align: center;
  font-weight: bold;
  text-decoration: none;
  display: inline-block;
}

.addCourse:hover, .addCourse:active {
  background-color:#CBCBCB;
  color: #4f5962;
}

.modal-header {
  padding: 2px 16px;
  background-color: #4f5962;
  color: white;
}
.modal-content{
  background-color: #EAEAEA;
}
a.addCourse{
   background-color: #4f5962;  
    color: white;
}

h1{
  line-height: 0.1em;
}
</style>
</head>
<body class="hold-transition sidebar-collapse">
  <div class="wrapper">

    <!-- navBar -->
    <?php require_once("navBar.php")?>

    <!-- mainSideBar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <div class="container-fluid">
          <div>
          <div class="row">
            <div class="col-sm-6">
              <h1 style="margin-top: 10px;margin-bottom: 10px;"><b><i>Courses</i></b></h1>
              <hr>
            </div>
            <hr>
          </div>
          <div class="col-sm-3">
             <a href="#" class="addCourse" data-toggle="modal" data-target="#myModal">Add New</a>
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
                <div class="card card-dark card-outline" style="margin: 15px">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                      src="upload/course/<?= $key->image?>"
                      alt="User profile picture" style="height: 150px; width: 200px">
                    </div>

                    <h3 class="profile-username text-center"><?= $key->courseName?></h3>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Price</b> <a class="float-right"><?= $key->price?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Subject</b> <a class="float-right"><?= $key->subjectName?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Enrolled</b> <a class="float-right"><?= $key->enr?></a>
                      </li>
                    </ul>

                    <a href="<?= site_url('Instructor/CourseC/courseDetails/'.$key->courseID)?>" class="btn btn-dark btn-block" style="background-color:#4f5962;"><b>More Info</b></a>
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

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form role="form" method="post" enctype="multipart/form-data" action="<?=site_url('Instructor/CourseC/addCourse')?>">
          <div class="modal-header">
            <h4 class="modal-title">Be An Instructor</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            
             
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control" name="txtcourse" placeholder="Enter Course Name" required>
                  </div>
                  
                  <div class="form-group">
                      <textarea rows="4" cols="50" class="form-control" name="description" placeholder="Description" required></textarea>
                  </div>

                  <div class="form-group">
                  <!-- <label>Select a Subject</label> -->
                  <select class="form-control select2" name="listSubject" style="width: 100%;">
                    <option value="opt1">Select a Subject</option>
                      <?php
                      foreach ($subjectData as $key) {
                        ?>
                        <option value="<?= $key->subjectID ?>"><?= $key->subjectName ?></option>    
                        <?php
                      }
                      ?>
                  </select>
                </div>

                  <div class="form-group">
                    <input type="text" class="form-control" name="price" placeholder="Price" required>
                  </div>
                  
                 <div class="dropzone" id="myDropzone">
                <div class="dz-default dz-message">
                    <span>Drop files here to upload</span>
                </div> 
                <input type="hidden" name="img" id="img">         
                </div>
                
                </div>
                <!-- /.card-body -->
             

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>

      </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- script -->
  <?php require_once("script.php")?>
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
          var base64String = event.target.result;
          $("#img").val(base64String);
          handlePictureDropUpload(base64String ,fileName );
        };
        reader.readAsDataURL(file);
      });
    },
  });
</script>
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
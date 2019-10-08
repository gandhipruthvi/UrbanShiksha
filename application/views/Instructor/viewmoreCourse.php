<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UrbanShiksha | Instructor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?=base_url();?>">

  <!-- favicon icon -->
  <link rel="shortcut icon" href="images/Favicon.ico">
  <!-- links -->

  <?php require_once("link.php")?>
  <style type="text/css">
    .switch {
      position: relative;
      display: inline-block;
      width: 44px;
      height: 23px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 17px;
      width: 17px;
      left: 0;
      bottom: 3px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #008B8B;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #008B8B;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
  </style>  
  <style type="text/css">
    input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .modal-header {
      padding: 2px 16px;
      background-color: #4f5962;
      color: white;
    }

    .modal-content{
      background-color: #EAEAEA;
    }

    .video-btn{
      /*background-color: white;*/
      color: black;
    }

    .video-btn:hover{
      color: navy;
    }

    .warning {
      background-color: #ffffcc;
      border-left: 6px solid #ffeb3b;
    }

    #courseEnrolledUserTable_filter{
      float: right;
    }
    #courseEnrolledUserTable_paginate{
      float: right;
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
          <div class="row">
            <div class="col-sm-6">
              <h1><b><i><a href="<?= site_url("Instructor/CourseC")?>">All Courses</a></i></b></h1>
              <hr>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-dark card-outline">
                <div class="card-body box-profile">
                  <?php
                  foreach ($courseDetails as $key) {
                    ?>
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                      src="upload/course/<?= $key->image?>"
                      alt="User profile picture" style="height: 150px; width: 200px">
                    </div>

                    <p class="text-muted text-center"><?=$key->courseName?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Price</b> <a class="float-right">₹ <?=$key->price?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Subject</b> <a class="float-right"><?=$key->subjectName?></a>
                      </li>
                    </ul>
                    <?php
                  }
                  ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header" style="background-color: #4f5962;">
                  <h3 class="card-title">Description</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <p class="text-muted">
                    <?=$coursedescription?>
                  </p>
                  <hr>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2" style="background-color:#4f5962;">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#reviews" data-toggle="tab" style="color:white;">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="#syllabus" data-toggle="tab" style="color:white;">Syllabus</a></li>
                    <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab" style="color:white;">Edit</a></li>
                    <li class="nav-item"><a class="nav-link" href="#questions" data-toggle="tab" style="color:white;">Questions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#eStudents" data-toggle="tab" style="color:white;">Enrolled Student</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="reviews">
                      <div class="reviews">
                        <div class="reviews-view">
                          <h4 style="font-style:italic;"><b>Reviews List</b></h4>
                          <div class="reviews-slide">
                            <?php
                            foreach ($reviewdata as $key1) { 
                              ?>
                              <div class="card" style="background-color:#EAEAEA">
                                <div class="row">
                                  <div class="col-md-2">
                                    <div class="img-responsive img-circle" style="text-align:center"><img src="<?= base_url("upload/$key1->image")?>" style="width:80px;height:80px;border-radius:50%"></div>
                                  </div>
                                  <div class="col-md-10">
                                    <span style="color:#B22222"><b><?=$key1->userName?></b></span><br>
                                    <?php 
                                    for($i=1;$i<=5;$i++)
                                    {
                                      if($key1->stars>=$i)
                                      {
                                        ?>
                                        <i class="fill fa fa-star" style="color:orange;"></i>
                                        <?php
                                      }
                                      else
                                      {
                                        ?>
                                        <i class="fa fa-star-o" style="color:orange;"></i>
                                        <?php
                                      }
                                    }
                                    ?>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you </p>
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

                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="syllabus">
                      <!-- The syllabus -->
                      <div class="syllabus">
                        <div class="row" style="margin-bottom:10px;">
                          <div class="col-md-9"><h4 style="font-style: italic"><b>Syllabus</b></h4></div>
                          <div class="col-md-3"><a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal" style="height: 40px;width:150px"><b>Add</b></a></div>
                        </div>
                        <div class="syllabus-box">
                          <?php
                          $cnt=0;
                          foreach ($chapterData as $key2) {
                            $cnt++;
                            ?>
                            <div class="card" style="background-color:#EAEAEA">
                              <div class="row">
                                <div class="syllabus-title col-md-11" style="font-size: 20px;">
                                  
                                  <b>Chapter<?php echo $cnt; echo ":-";echo $key2->chapterName?></b>
                                </div>
                                <div class="col-md-1">
                                  <a href="#" data-toggle="modal" data-target="#chapterEditModal" onclick="fetchChapterData(<?= $key2->chapterID?>,<?= $courseID?>)" style="font-size:22px"><i class="fa fa-edit"></i></a>
                                </div>
                              </div>
                              <div class="syllabus-view first row">
                                <div class="point-list col-md-12">
                                  <ul>
                                    <?php
                                    foreach ($key2->topicData as $key3) {
                                      ?>
                                      <li>
                                        <div class="row">
                                          <div class="col-md-4">
                                            <button class="video-btn btn" data-toggle="modal" data-src="<?= $key3->videoURL?>" data-target="#myVideoModal" title="Click to play video" style="background-color:#EAEAEA;font-size: 18px;color:#B22222;"><?=$key3->topicName;?></button>
                                          </div>
                                          <div class="col-md-8">
                                            <a><i class="fa fa-pencil" data-toggle="modal" data-src="<?= $key3->topicID?>" data-target="#editModal" onclick="topicEditModal(<?= $key3->topicID?>)"></i></a>
                                          </div>
                                        </div>
                                      </li>
                                      <?php
                                    }
                                    ?>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <!-- /tab-pane -->

                    <div class="tab-pane" id="edit" style="background-color: #EAEAEA;">
                      <form class="form-horizontal" method="post" action="<?=site_url('Instructor/EditCourseC/index/').$courseID?>">
                        <div class="form-group">
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="txtCourseName" value="<?=$courseDetails[0]->courseName?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="dropzone form-control" id="myDropzonePhoto" style="height:200px;width:720px;margin: 0 8px 15px 10px;">
                            <div class="dz-default dz-message">
                              <span>Upload Your Course Photo</span>
                            </div> 
                            <input type="hidden" name="img" id="img">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-10">
                            <input type="text" name="txtPrice" class="form-control"  value="<?=$courseDetails[0]->price?>" required> 
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-11">
                            <select name="listSubject" class="form-control" style="height:50px;width:720px;margin: 0 8px 15px 10px;">
                              <option value="opt1">Select One Subject</option>
                              <?php
                              foreach ($subjectData as $key4) 
                              {
                                ?>
                                <option value="<?= $key4->subjectID ?>"
                                  <?php
                                  if($courseDetails[0]->subjectID==$key4->subjectID)
                                  {
                                    echo "selected";
                                  }
                                  ?>>
                                  <?= $key4->subjectName ?>  
                                </option>
                                <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-10">
                            <textarea class="form-control" name="txtDescription" required><?=$courseDetails[0]->description?></textarea required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->

                      <!-- tab pane question -->
                      <div class="tab-pane" id="questions">
                        <div class="questions">
                          <div class="questions-view">
                            <h4 style="font-style: italic;"><b>Questions</b></h4>
                            <div class="questions-slide" style="background-color: #EAEAEA;">
                              <?php
                              $q = 1;
                              foreach ($questionData as $key) 
                              {
                                ?>
                                <pre></pre>
                                <div class="row" id="nullAnswer">
                                  <div class="col-md-1">
                                    <label class="switch">
                                      <input type="checkbox" data-id="<?=$key->questionID?>" class="status-toggle" <?php
                                      if($key->status==0)
                                      {
                                        echo "checked";
                                      }
                                      ?> required>
                                      <span class="slider round"></span>
                                    </label>
                                  </div>
                                  <div class="col-md-6">
                                    <p style="font-size: 20px"><b><i>Question <?=$q?></i></b> : <b><?=$key->question?></b></p>
                                  </div>                        
                                </div> 
                                <div class="row">
                                  <div class="col-md-1">
                                    <pre style="overflow-x:hidden;">Answers:</pre>
                                  </div>
                                  <div class="col-md-11">
                                    <textarea name="ansTxt" class="form-control ansTxt<?=$key->questionID?>" style="width:730px;" required></textarea>
                                    <pre></pre>
                                    <input type="button" name="ansBtn" data-id="<?=$key->questionID?>" value="Submit" class="form-control btn-success ansBtn" style="width:150px;margin-bottom: 10px;" required>
                                  </div>
                                </div>
                                <div id="ansDiv<?= $key->questionID?>">
                                  <div class="form-control" style="border:#4f5962;border-width:1px;border-style: solid;width: 800px;margin-left: 70px;background-color: #F5F5F5;">
                                    <p><b><i>
                                      <?php
                                      if($key->answer==null)
                                      {
                                        echo "Answer is pending";
                                      }
                                      else
                                      {
                                        echo "Old answer";
                                      }
                                      ?>
                                    </i></b></p>
                                    <?php
                                    foreach ($key->answer as $key0) 
                                    {
                                      ?>
                                      <div class="row" style="border:#4f5962;border-width:1px;width: 500px;">
                                        <div class="col-md-6">
                                          <p style="margin:5px 5px 5px 5px;font-size: 20px;"><b><i><?=$key0->answer?></i></b> </p>
                                          <textarea class="form-control" id="txtAns<?=$key0->answerID?>" name="txtAnswer" style="display: none;visibility: hidden;" required></textarea>
                                        </div>
                                        <div class="col-md-4">
                                          <input type="button" class="form-control btn-primary" id="btnAnsChange<?=$key0->answerID?>" name="btnAns" value="Change Answer" style="margin:5px 5px 5px 5px;" onclick="showChangeAnswer(<?=$key0->answerID?>)" required>
                                          <input type="button" class="form-control" id="btnAnsSubmit<?=$key0->answerID?>" name="btnAns0" value="Submit" style="display: none;visibility: hidden;margin:5px 5px 5px 5px;" onclick="ansSubmit(<?= $key->questionID?>,<?=$key0->answerID?>)" required>
                                        </div>
                                        <div class="col-md-2"> 
                                          <center style="margin:5px;"><button class="btn btn-danger btn-round waves-effect waves-light" onclick="delAnswer(<?= $key->questionID?>,<?=$key0->answerID?>)"><i class="fa fa-trash"></i></button></center>
                                        </div>
                                      </div>
                                      <pre></pre>
                                      <?php
                                    }
                                    ?>
                                  </div>
                                </div>
                                <?php
                                $q++;
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- tab pane question -->

                      <!-- tab pane Enrolled Students -->

                      <div class="tab-pane" id="eStudents">
                        <div class="eStudents">
                          <div class="eStudents-view">
                            <h4 style="font-style:italic;"><b>Students List</b></h4>
                            <div class="eStudents-slide">


                              <section class="content">
                                <div class="row">
                                  <div class="col-12">

                                    <div class="card">
                                      <div class="card-header">
                                        <h3 class="card-title">Enrolled Student</h3>
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="card-body">
                                        <table id="courseEnrolledUserTable" class="table table-bordered table-striped" >
                                          <thead>
                                            <tr>
                                              <th>Image</th>
                                              <th>Name</th>
                                              <th>Contact No</th>
                                              <th>Email</th>
                                              <th>Qualification</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                            foreach ($userEnrollData as $key) 
                                            {
                                              ?>
                                              <tr>
                                                <td><img src="<?=base_url("upload/").$key->image?>" style="height: 80px;width: 80px;"></td>
                                                <td><?=$key->userName?></td>
                                                <td><?=$key->contactNumber?></td>
                                                <td><?=$key->email?></td>
                                                <td><?=$key->qualification?></td>
                                              </tr>
                                              <?php
                                            }
                                            ?>
                                          </tfoot>
                                        </table>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                              </section>
                              <!-- /.content -->



                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- tab pane Enrolled Students -->

                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- footer -->
      <?php require_once("footer.php")?>

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Add</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url("Instructor/ChapterC/addChapter/$courseID")?>">
                  <div class="radio-row">
                    <div class="col-md-10">
                      <input value="addNew" id="radio-01" name="r1" type="radio" style="-webkit-appearance:radio;margin: 0 0px 0 10px;" checked onclick="changeRadio()" required>
                      <label class="container1"> Add Chapter
                      </label>
                      <input value="exist" id="radio-02" name="r1" type="radio" style="-webkit-appearance:radio;margin: 0 0px 0 10px;" onclick="changeRadio()" required>
                      <label class="container1"> Add Topic
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group" id="enterChap">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="txtchapter" placeholder="Enter Chapter...">
                    </div>
                  </div>

                  <div class="form-group" id="enterChap">
                    <div class="col-sm-10">
                      <select name="chapterNo" id="chapterNo" required=true>
                        <option value="">Select Chapter number</option>
                        <?php
                        $max=0;
                        foreach ($chapterData as $key) {
                          ?>
                          <option value="<?= $key->number?>"><?= $key->number?></option>
                          <?php
                          $max=$key->number;
                        }
                        $max++;
                        ?>
                        <option value="<?= $max?>"><?= $max?></option>
                      </select>
                    </div>
                  </div>

                  <div class="syllabus-box" id="enterDrop" style="visibility: hidden;display: none;">
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <select name="listchapter" >
                          <option value="opt1">Select One Chapter</option>
                          <?php
                          foreach ($chapterData as $key4) {
                            ?>
                            <option value="<?= $key4->chapterID ?>"><?= $key4->chapterName ?></option>    
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group" id="enterTopic">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="txttopic" placeholder="Enter Topic Name..." required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <textarea class="form-control" name="txtdescription" placeholder="Enter Description..." style="height:100px" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="dropzone" id="myDropzoneVideo" style="height:200px">
                      <div class="dz-default dz-message">
                        <span>Upload Video</span>
                      </div> 
                      <input type="hidden" name="video" id="video">         
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- topic edit modal -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Edit Topic</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <form class="form-horizontal" id="editForm" method="post" enctype="multipart/form-data">     
                  <div class="form-group" id="enterTopic">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="txtTopicName" id="txtTopicName" placeholder="Enter Topic Name..." required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <textarea class="form-control" name="txtDescription" id="txtDescription" placeholder="Enter Description..." style="height:100px" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="dropzone" id="myDropzoneEditVideo" style="height:200px">
                      <div class="dz-default dz-message">
                        <span>Upload Video</span>
                      </div> 
                      <input type="hidden" name="editVideo" id="editVideo" value="default" required>         
                    </div>          
                  </div>
                  <div style="background-color: #FFC77D">
                    <p><strong><i class="fa fa-warning" style="color:black;"></i></strong> If you are not uploading any video than same video will remain, and if you are uploading any video than it will replaced with old video</p>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- chapter edit modal -->
      <div class="modal fade" id="chapterEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Edit Chapter</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>

      <!-- video Modal -->
      <div class="modal fade" id="myVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" onclick="videoModalClose()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>        
              <div class="embed-responsive embed-responsive-16by9">
                <video id="videoTag0" width="320" height="240"><source id="videoSrc0"  type="video/mp4"></video>
                </div>
              </div>
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

    </body>
    </html>
    <script>
      $(function () {
    /*$("#courseEnrolledUserTable").DataTable(
    );*/
    $('#courseEnrolledUserTable').DataTable({
      dom: 'Bfrtip',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
   /* $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });*/
  });
</script>
<script>
  var videoID = 'videoTag0';
  var sourceID = 'videoSrc0';
  var newmp4 = "";

  $(".video-btn").click(function(){
    var bs="<?=base_url("upload/video/");?>";
    var video = $(this).data("src");
    newmp4=bs+video;
    $('#'+videoID).get(0).pause();
    $('#'+sourceID).attr('src', newmp4);
    $('#'+videoID).get(0).load();
    $('#'+videoID).get(0).play();
    $('#'+videoID).attr("controls",true);
  });
</script>
<script type="text/javascript">
  Dropzone.autoDiscover = false;
  var base64 = '';
  $("#myDropzonePhoto").dropzone({
    url: "<?= base_url("upload")?>",       
    addRemoveLinks: true,
    maxFiles: 1,
    maxFileSize: 1,
    acceptedFiles: "image/jpeg,image/png,image/jpg",
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

  $("#myDropzoneVideo").dropzone({
    url: "<?= base_url("upload")?>",       
    addRemoveLinks: true,
    maxFiles: 1,
    maxFileSize: 1,
    init: function() {
      this.on("addedfile", function (file) {
        var reader = new FileReader();
        reader.onload = function(event) {               
          var base64String = event.target.result;
          $("#video").val(base64String);
          handlePictureDropUpload(base64String ,fileName );
        };
        reader.readAsDataURL(file);
      });
    },
  });

  $("#myDropzoneEditVideo").dropzone({
    url: "<?= base_url("upload")?>",       
    addRemoveLinks: true,
    maxFiles: 1,
    maxFileSize: 1,
    init: function() {
      this.on("addedfile", function (file) {
        var reader = new FileReader();
        reader.onload = function(event) {               
          var base64String = event.target.result;
          $("#editVideo").val(base64String);
          handlePictureDropUpload(base64String ,fileName );
        };
        reader.readAsDataURL(file);
      });
    },
  });
</script>
<script type="text/javascript">
  $("#radio-01").change(function(){
    if($("#radio-01").is(':checked'))
    {
      $("#enterChap").css({"visibility":"visible","display":"block"});  
      $("#chapterNo").css({"visibility":"visible","display":"block"});  
      $("#enterDrop").css({"visibility":"hidden","display":"none"});  
    }     
  });
  $("#radio-02").change(function(){
    if($("#radio-02").is(':checked'))
    {
      $("#enterChap").css({"visibility":"hidden","display":"none"});  
      $("#chapterNo").css({"visibility":"hidden","display":"none"});
      $("#enterDrop").css({"visibility":"visible","display":"block"});  
    }
  });
</script>
<script type="text/javascript">
  $(".ansBtn").click(function(){
    var cID = <?=$courseID?>;
    var qID = $(this).data("id");

    var qAns = $(".ansTxt"+qID).val();
    // $("#nullAnswer").css({"visibility":"hidden","display":"none"});
    if(qAns!="")
    {
      $.ajax({
        type : "POST",
        data : {qAnswer : qAns},
        url : "<?=site_url('Instructor/QuestionC/index/')?>"+qID,
        success : function(result)
        {
          $(".ansTxt"+qID).val("");
          $("#ansDiv"+qID).empty();
          $("#ansDiv"+qID).html(result);
        }
      });
    }
  });
</script>
<script type="text/javascript">
  function changeRadio()
  {
    if($('#radio-01').is(':checked'))
    {
      $("#chapterNo").attr("required",true);
    }
    else
    {
      $("#chapterNo").attr("required",false);
    }
  }

  function showChangeAnswer(aID){
    if($("#btnAnsSubmit"+aID).is(":hidden"))
    {    
      $("#btnAnsChange"+aID).attr("value","Hide Answer");
      $("#txtAns"+aID).css({"visibility":"visible","display":"inline-block"});
      $("#btnAnsSubmit"+aID).css({"visibility":"visible","display":"inline-block"});
    }
    else
    {
      $("#btnAnsChange"+aID).attr("value","Change Answer");
      $("#txtAns"+aID).css({"visibility":"hidden","display":"none"});        
      $("#btnAnsSubmit"+aID).css({"visibility":"hidden","display":"none"});
    }
  }

  function delAnswer(qID,aID)
  {
    $.ajax({
      url : "<?=site_url('Instructor/QuestionC/deleteAnswer/')?>"+aID+'/'+qID,
      success : function(result)
      {
        $("#ansDiv"+qID).empty();
        $("#ansDiv"+qID).html(result);
      }
    });
  }

  function ansSubmit(qID,ansID)
  {
    var answer = $("#txtAns"+ansID).val();
    $.ajax({
      type : "POST",
      data : {answer : answer},
      url : "<?=site_url('Instructor/QuestionC/updateAnswer/')?>"+ansID+'/'+qID,
      success : function (result)
      {
        $("#ansDiv"+qID).empty();
        $("#ansDiv"+qID).html(result);
      }
    });
  }

  function topicEditModal(topicID)
  {
    $.ajax({
      url : "<?=site_url('Instructor/ChapterC/topicEditModal/')?>"+topicID,
      success : function (result)
      {
        var topicData=JSON.parse(result);
        $("#txtTopicName").val(topicData.topicName);
        $("#txtDescription").html(topicData.description);
        $("#editForm").attr("action","<?= site_url("Instructor/ChapterC/editTopic/$courseID/")?>"+topicID+"/"+topicData.chapterID);
      }
    }); 
  }

  function videoModalClose()
  {
    $('#'+videoID).get(0).pause();
  }

  $('#myVideoModal').on('hidden.bs.modal', function () {
    videoModalClose();
  });

  function fetchChapterData(chapterID,courseID)
  {
    var htmlText="";
    $.ajax({
      url : "<?= site_url("Instructor/ChapterC/fetchChapter/")?>"+chapterID+"/"+courseID,
      success : function(result){
        var data=JSON.parse(result);
        var number=data.chapterNumber;
        htmlText+="<div class='col-md-12'>";
        htmlText+="<form class='form-horizontal' id='editForm' method='post' enctype='multipart/form-data'>";
        htmlText+="<div class='form-group' id='enterTopic'>";
        htmlText+="<div class='col-sm-10'>";
        htmlText+="<label>Chapter Name</label>";
        htmlText+="<input type='text' class='form-control' name='txtTopicName' id='txtTopicName' placeholder='Enter Topic Name...' value='"+data.chapterData.chapterName+"' required>";
        htmlText+="</div>";
        htmlText+="</div>";
        htmlText+="<div class='form-group'>";
        htmlText+="<div class='col-sm-10'>";
        htmlText+="<label>Chapter Preferences</label>";
        htmlText+="<input type='hidden' name='previousNumber' id='previousNumber' value='"+data.chapterData.number+"' required>";
        htmlText+="<select name='newNumber'>";
        for(var key in number)
        {
          htmlText+="<option value='"+number[key].number+"'"
          if(number[key].number==data.chapterData.number)
            htmlText+="selected";
          htmlText+=">"+number[key].number+"</option>";
        }
        htmlText+="</select>";
        htmlText+="</div>";
        htmlText+="</div>";
        htmlText+="<div class='form-group'>";
        htmlText+="<div class='col-sm-offset-2 col-sm-10'>";
        htmlText+="<button type='submit' class='btn btn-success'>Submit</button>";
        htmlText+="</div>";
        htmlText+="</div>";
        htmlText+="</form>";
        htmlText+="</div>";
        $("#chapterEditModal .modal-body").html(htmlText);
        $("#chapterEditModal #editForm").attr("action","<?= site_url("Instructor/ChapterC/editChapter/")?>"+chapterID+"/"+courseID);
      }
    });
  }
</script>
<script type="text/javascript">
  $(".status-toggle").change(function(){
    var Qid=$(this).data("id");
    $.ajax({
      url : "<?= site_url("Instructor/QuestionC/statusChange/")?>"+Qid,
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
    html : true,
    content : function(){
      return $(this).next('.popper-content').html();
    }
  });
</script>
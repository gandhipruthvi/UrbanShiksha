<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta information -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
  <base href="<?=base_url();?>">

  <!-- Title -->
  <title>UrbanShiksha</title>
  <style type="text/css">

    body {margin:2rem;}

    .modal-dialog {
      max-width: 800px;
      margin: 30px auto;
    }

    .modal-body {
      position:relative;
      padding:0px;
    }
    .close {
      position:absolute;
      right:-30px;
      top:0;
      z-index:999;
      font-size:2rem;
      font-weight: normal;
      color:#fff;
      opacity:1;
    }

    .circle{
      position:relative;
      width:50%;
      padding-bottom:50%;
      background:gold;
      border-radius:50%;
    }
    .circle p{
      position:absolute;
      top:50%; left:50%;
      transform: translate(-50%, -50%);
      margin:0;
      font-style: normal;
    }

    /* Popover */
    .popover {
      border: 2px dotted red;
      width:600px;
    }

    *{
      margin: 0;
      padding: 0;
    }
    .rate {
      float: left;
      height: 46px;
      padding: 0 10px;
    }
    .rate:not(:checked) > input {
      position:absolute;
      top:-9999px;
    }
    .rate:not(:checked) > label {
      float:right;
      width:1em;
      overflow:hidden;
      white-space:nowrap;
      cursor:pointer;
      font-size:30px;
      color:#ccc;
    }
    .rate:not(:checked) > label:before {
      content: '★ ';
    }
    .rate > input:checked ~ label {
      color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
      color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
      color: #c59b08;
    }
  </style>
  <!-- favicon icon -->
  <link rel="shortcut icon" href="images/Favicon.ico">

  <!-- CSS Stylesheet -->
  <!--Link Page-->
  <?php include_once("link.php");?>
  <!--#Link Page-->

  <script type="text/javascript">
    cart0=<?= $cartdata?>;
    enroll0=<?= $enrollData?>;
  </script>
</head>

<body>
  <div class="wapper">
    <!--quckNav-->
    <?php include_once("quckNav.php");?>
    <!--#quckNav-->

    <!--Header-->
    <?php include_once("header.php");?>
    <!--#Header-->
    <section class="banner inner-page">
      <div class="banner-img"><img src="iresources/Banner/course.jpg" alt=""></div>
      <div class="page-title">    
        <div class="container">
          <h1>courses details</h1>
        </div>
      </div>
    </section>
    <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="<?= site_url('User/HomeC/')?>"><b><i>Home</i></b></a></li>
          <li><a href="<?=site_url('User/MyCourseC/')?>"><b><i>All My Courses</i></b></a></li>
          <li><a><b><i>courses details</i></b></a></li>
        </ul>
      </div>
    </section>
    <div class="course-details">
      <div class="container">
        <h2><?=$coursedata->courseName?></h2>
        <div class="course-details-main">
          <div class="course-img">
            <img src="<?= base_url("upload/course/$coursedata->image")?>" class="img-fluid" style="height:400px;width:1250px;">
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="course-instructorInfo">
                <div class="info-slide" style="font-size: 20px; color: #4682B4;"><i class="fa fa-user-secret"></i><b><i><?=$coursedata->userName;?></i></b>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="info" style="background-color: ">
          <h4>Course Overview</h4>
          <p><b><?=$coursedata->description?></b></p>
        </div>
        <div class="instructors">
          <h4>Rate and Reviews</h4>
          <div class="row">
            <?php
            if($myreview==null)
            {
              ?>
              <form method="post" action="<?=site_url("User/HomeC/addRating/$coursedata->courseID")?>">
                <div class="col-sm-4">
                  <label>Your review will be posted publicly on the web.</label>
                  <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" class="r1" data-course-id="<?=$coursedata->courseID?>"/>
                    <label for="star5" title="5">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" class="r1" data-course-id="<?=$coursedata->courseID?>"/>
                    <label for="star4" title="4">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" class="r1" data-course-id="<?=$coursedata->courseID?>"/>
                    <label for="star3" title="3">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" class="r1" data-course-id="<?=$coursedata->courseID?>"/>
                    <label for="star2" title="2">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" class="r1" data-course-id="<?=$coursedata->courseID?>"/>
                    <label for="star1" title="1">1 star</label>
                  </div>
                  <div>
                    <textarea placeholder="     share details of your own experience on this place" name="txtreview" cols="50" rows="10" style="resize: none;border: solid;border-color:black;border-width:1px;border-radius: 2.5%;"></textarea>

                    <input type="submit" value="submit" class="btn btn-primary">
                  </div>
                </div>
              </form>
              <?php
            }
            else
            {
              ?>
              <div style="margin-left:20px;">
                <?php
                for($i=1;$i<=5;$i++)
                {
                  if($myreview->stars>=$i)
                  {
                    ?>
                    <i class="fill fa fa-star" style="color:orange;margin-left:"></i>
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
              </div>
              <pre style="background-color: white;border-color: white;"></pre>
              <p style="margin-left:20px;"><textarea style="border-radius:5px;border-color:black"><?="  ";?><?=$myreview->review;?></textarea></p>
              <?php
            }
            ?>
          </div>
        </div>
        <div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active" style="padding-right:0px;padding-left:0px;"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="padding:10px;">Syllabus</a></li>
            <li role="presentation" style="padding-right:0px;padding-left: 0px;"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="padding:10px;">Questions</a></li>
            <li role="presentation" style="padding-right:0px;padding-left: 0px;"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" style="padding:10px;">Reviews</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <!-- syllabus -->
              <pre style="background-color: white;border-color: white;"></pre>
              <div class="syllabus">
                <h4>Syllabus</h4>
                <?php
                $cnt = 1;
                foreach ($chapterData as $key) 
                {
                  ?>
                  <div class="syllabus-box">
                    <div class="syllabus-title"></div>
                    <div class="syllabus-view first">
                      <div class="main-point active"><?=$cnt?> : <?=$key->chapterName?></div>
                      <?php
                      foreach ($key->tpID as $key0) 
                      {
                        ?>
                        <div class="point-list">
                          <ul>
                            <li><a class="video-btn" data-toggle="modal" data-src="<?= $key0->videoURL?>" data-target="#myModal"> Video : Click here <span class="hover-text">Watch Video<i class="fa fa-angle-right"></i></span></a></li>
                            <li><a href="course-lessons.html"> <?=$key0->description?> <span class="hover-text">Let's Go<i class="fa fa-angle-right"></i></span></a></li>
                          </ul>
                        </div>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                  <?php
                  $cnt++;
                }
                ?>
              </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
              <!-- question -->
              <pre style="background-color: white;border-color: white;"></pre>

              <div class="question">
                <h4>Ask Question</h4>
                <div>
                  <input type="button" style="background-color: #008CBA;border: none;color: white;padding: 10px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;" value="Ask Question" id="asked">
                </div>
                <div class="ask-question" style="visibility: hidden;display: none;">
                  <div class="row">
                    <div class="info-slide col-md-2">
                      <p><span>Ask Question :</span></p>
                    </div>
                    <div class="input-box col-md-10">
                      <input type="text" style="width:500px;height:150px;" class="form-control" id="txtQuestion">
                    </div>
                  </div>
                  <pre style="background-color: white;border-color: white;"></pre>
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                      <input type="button" style="background-color: #008CBA;border: none;color: white;padding: 10px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;" value="Ask" id="askButton" onclick="myQue(<?=$coursedata->courseID?>)">
                    </div>
                  </div>
                </div>
              </div>
              <pre style="background-color: white;border-color: white;"></pre>

              <div class="questions">
                <div class="questions-view">
                  <h4>Questions List</h4>
                  <div class="questions-slide"></div>
                  <?php
                  $q = 0;
                  foreach ($questions as $key)
                  {
                    ?>
                    <div class="container"> 
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading" style="background-color: white;">
                            <h4 class="row" style="position : static;">
                              <div class="col-md-11">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1<?=$key->questionID?>"><?=$key->question?></a>
                              </div>
                              <div class="col-md-1">
                                <div class="circle popper" data-toggle="popover">
                                  <p><?= substr($key->userName, 0,1)?></p>
                                </div>
                                <div class="popper-content hide"><p><img src="<?=base_url();?>upload/<?=$key->image?>"></p><p>Name : <?=$key->userName?></p></div>
                              </div>  
                            </h4>
                          </div>
                          <div id="collapse1<?=$key->questionID?>" class="panel-collapse collapse">
                            <div class="panel-body">
                              <?php
                              foreach ($key->answer as $key0)
                              {
                                ?>
                                <div><?=$key0->answer?></div>
                                <?php
                              }
                              ?>
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
              <!-- end question -->
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">

              <div class="reviews">
                <div class="reviews-view">
                  <h4>Reviews List</h4>
                  <div class="reviews-slide">
                    <?php
                    foreach ($reviewdata as $key) { 
                      ?>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="img-responsive img-circle" style="text-align:center"><img src="<?= base_url("upload/$key->image")?>" style="width:80px;height:80px;border-radius:50%"></div>
                        </div>
                        <div class="col-md-10">
                          <span style="color:RED"><?=$key->userName?></span><br>
                          <?php 
                          for($i=1;$i<=5;$i++)
                          {
                            if($key->stars>=$i)
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
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Footer Page-->
    <?php include_once("footer.php");?>
    <!--#Footer Page-->
  </div>
<!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->

  <!--Script Page-->
  <?php include_once("script.php");?>
  <!--#Script Page-->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" onclick="videoModalClose()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>        
          <div class="embed-responsive embed-responsive-16by9">
            <video id="videoTag0" width="320" height="240" >
              <source id="videoSrc0"  type="video/mp4">
                <!--  <source src="movie.ogg" type="video/ogg"> -->
                </video>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </body>
    </html>
    <script type="text/javascript">
      function myQue(id)
      {
        var cID = id;
        var queT = $("#txtQuestion").val();
        $.ajax({
          type : "POST",
          data : { question : queT,cid : cID},
          url : "<?=site_url('User/MyCourseC/questionAsk/')?>",
          success : function(result){
            if(result=="1")
            {
              $('.ask-question').css({"visibility":"hidden","display":"none"});
              $("#txtQuestion").val("");

              $.notify({ 
                type : "success",  
                message : "Question is Asked"
              },{
                placement: {
                  from: "top",
                  align: "right"
                },
              });
            }
            else
            {
              $.notify({ 
                type : "success",  
                message : "Question is not submitted"
              },{
                placement: {
                  from: "top",
                  align: "right"
                },
              });
            }
          }
        });        
      }

      function videoModalClose()
      {
        $("#videoTag0").get(0).pause();
      }

      $('#myModal').on('hidden.bs.modal', function () {
        videoModalClose();
      });

      $("#asked").click(function() {
        if($('.ask-question').is(":visible"))
        {
          $('.ask-question').css({"visibility":"hidden","display":"none"});
        }
        else
        {
          $('.ask-question').css({"visibility":"visible","display":"block"});
        }
      });

    </script>
    <script type="text/javascript">
      $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
      })
    </script>
    <script type="text/javascript">
      var id = "<?=$coursedata->courseID?>";
      var htmlText = '';
      $('[data-toggle="popover"]').popover({
        placement : 'bottom',
        trigger : 'hover',
        container : 'body',
        title : 'User Detail',
        html : true,
        content : function(){
          return $(this).next('.popper-content').html();
        }
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
        $("#videoTag0").attr("controls",true);
      });
    </script>
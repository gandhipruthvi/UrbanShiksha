<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    <base href="<?=base_url()?>">
    <!-- Title -->
    <title>UrbanShiksha</title>
    <style>
        * {
          box-sizing: border-box;
      }

      #myInput {
          /*background-image: url('/css/searchicon.png');*/
          background-position: 10px 12px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
      }

      #myUL {
          list-style-type: none;
          padding: 0;
          margin: 0;
          background-color: white;
      }

      #myUL li a {
          border: 1px solid #ddd;
          margin-top: -1px; /* Prevent double borders */
          background-color: white;
          padding: 12px;
          text-decoration: none;
          font-size: 18px;
          color: black;
          display: block;
      }

      #myUL li a:hover:not(.header) {
          background-color: #eee;
      }
  </style>

  <!--Link Page-->
  <?php include_once("link.php");?>
  <!--#Link Page-->

</head>

<body>
    <div class="wapper">
        <!--loader-wrapper-->
        <?php include_once("loaderWrapper.php");?>
        <!--#loader-wrapper-->

        <!--quckNav-->
        <?php include_once("quckNav.php");?>
        <!--#quckNav-->
        
        <!--Header-->
        <?php include_once("header.php");?>
        <!--#Header-->
        
        <section class="banner">
        	<div class="banner-img"><img src="images/bookimg1.jpg" alt=""></div>
            <div class="banner-text">
            	<div class="container">
                 <h1>Education you want Attention you Deserve</h1>
                 <p>Join us today to know how  you can ace your Knowledge  </p>
                 <div class="search-box">  
                  <input type="text" id="myInput" onkeyup="myFunction()" value="" placeholder="Search Course">
                  <input type="submit" value="">
                      <ul id="myUL" style="z-index: 4;position:relative;visibility: hidden;display: none;background-color: white;height: 100%;width: 100%;">
                        <?php
                            foreach ($courseS as $key) 
                            {
                        ?>
                            <li style=""><a href="<?=site_url("User/CourseC/viewCourse/").urlencode(base64_encode($key->courseID))?>" class="row"><img src="<?=base_url("upload/course/").$key->image?>" class="col-sm-9" style="height: 150px;width:250px;float:left;"><h4 class="col-sm-3"><center><?=$key->courseName?></center></h4></a></li>
                        <?php
                            }
                        ?>
                      </ul>                      
              </div>
              <div class="learning-btn">
                 <a href="<?=site_url("User/CourseC")?>" class="btn">Start learning now</a>
             </div>
         </div>
     </div>
 </section>
 <section class="our-course">
     <div class="container">
         <div class="section-title">
             <h2>Our Courses</h2>
         </div>
         <div class="row">
            <?php 
            foreach ($courseData as $key) {
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="course-box">
                        <div class="img">
                            <img src="upload/course/<?= $key->image?>" alt="">
                            <div class="price <?php 
                            if($key->price==0)
                            echo "free";
                            ?>" style="width: 80px"><?php 
                            if($key->price==0)
                                echo "free";
                            else
                                echo "₹ ".$key->price;
                            ?></div>
                        </div>
                        <div class="course-name"><?= $key->courseName?><span><em>By </em><?= $key->userName?></span></div>
                        <div class="comment-row">
                            <div class="rating">
                                <div class="fill" style="width:<?= $key->rates?>%"></div>
                            </div>
                            <div class="box"><i class="fa fa-users"></i><?= $key->enID->count?> Student</div>
                            <div class="enroll-btn">    
                                <a href="<?=site_url("User/CourseC/viewCourse/").urlencode(base64_encode($key->courseID))?>" class="btn">More Info</a>
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
<section class="student-feedback" style="background-color: #f1f1f1;">
   <div class="container">
     <div class="section-title">
       <h2>Popular Instructors</h2>
     </div>
     <div class="feedback-slider">
      <?php 
      foreach ($instructors as $key) {
      ?>
       <div class="item">
         <div class="student-img"><img src="upload/<?= $key->instructorData->image?>" alt="" style="height: 100px"></div>
         <div class="student-name"><?= $key->instructorData->userName?></div>
         <div class="student-designation"><?= $key->instructorData->qualification?></div>
         <p style="font-size:22px;"><i class="fa fa-quote-left"></i><?= $key->instructorData->userName?> has created <?= $key->course?> number of courses on this website<i class="fa fa-quote-right"></i> </p><br><br>
         <p style="font-family: Baskerville Old Face; font-size: 24px">Teach what you love, Learn what you love. UrbanShiksha gives you the tools to create an online course</p>
       </div>
       <?php
        }
       ?>
     </div>
   </div>
 </section>



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

    </body>
    </html>

    <script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
    // alert(txt);
    filter = input.value.toUpperCase();
    if(filter!="")
    {
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        $("#myUL").css({"visibility":"visible","display":"block"});
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
    else
    {
        $("#myUL").css({"visibility":"hidden","display":"none"});
    }
}
</script>
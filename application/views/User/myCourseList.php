<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta information -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
  <base href="<?=base_url();?>">


  <style>
    .panel-heading:after {
      content: "\2212";
      color: #000000;
      font-weight: bold;
      float: right;
      margin-top: -15px;
    }

    .panel-heading.collapsed:after {
      content: "\002B";
      color: #000000;        
    }
    .ml-menu  {
     list-style-type: none;
   }

   #pagination a{
    width: 60px;
    background-color: #f5f5f5;
  }
</style> 
<!-- Title -->
<title>UrbanShiksha</title>

<!-- favicon icon -->
<link rel="shortcut icon" href="resources/images/Favicon.ico">
<!-- <link href="assets/css/main.css" rel="stylesheet"> -->
<!-- CSS Stylesheet -->
<!--Link Page-->
<?php include_once("link.php");?>
<!--#Link Page-->

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
          <h1>My Courses</h1>
        </div>
      </div>
    </section>
    <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="<?= site_url('User/HomeC/')?>"><b><i>Home</i></b></a></li>
          <li><a href="<?= site_url('User/CourseC/')?>"><b><i>All courses</i></b></a></li>
        </ul>
      </div>
    </section>
    <section class="courses-view list-view">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="right-slide left">
              <h3>Category</h3>
              <div class="panel-group catData" id="accordion">
                <?php 
                foreach ($categorydata as $key)
                {
                  ?>
                  <div class="panel panel-default" style="background-color: white;border-color: #f5f5f5;">
                    <div class="panel-heading collapsed"  data-toggle="collapse"  href="#collapse<?= $key->categoryID?>" style="background-color: #f5f5f5;border-color: white;">
                      <h4 class="panel-title">
                        <div><?=$key->categoryName?></div>
                      </h4>
                    </div>
                    <div id="collapse<?= $key->categoryID?>" class="panel-collapse collapse" data-parent="#accordion">
                      <div class="panel-body">
                        <?php 
                        foreach ($key->subCategory as $key1) 
                        {
                          ?>
                          <ul class="ml-menu">
                            <li>
                              <!-- <a href="<?=site_url('User/CourseC/index/'.$key1->subcategoryID);?>"  style="color:black;"><?= $key1->subcategoryName;?></a> -->
                              <a style="color:black;"><?= $key1->subcategoryName;?></a>
                            </li>
                          </ul>
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <?php
                }
                ?>
              </div>
              <div id="showMore">
                <a id="showMoreData" style="margin-left: 8px;"><b><i>Show More</i></b></a>
                <a id="showLessData" style="visibility: hidden;display: none;margin-left: 15px;"><b><i>Show Less</i></b></a>
              </div> 
              <br>
              <h3>Price</h3>
              <form method="post" action="<?=site_url('User/SortC/')?>" enctype="multipart/form-data">
               
                  <div class="filter-blcok">
                     <div class="panel panel-default" style="background-color: #f5f5f5;border-color:white;height: 35px;padding-left: 15px;">
                    <div class="check-slide">
                      <label class="label_check" for="checkbox-01"><input name="sort[]" id="checkbox-01" type="checkbox" value="Free" <?php if(isset($price))
                      {
                        if($price==0 || $price==2)
                          {echo "checked";}  
                      }
                      ?>> Free</label>
                    </div>
                  </div>
                   <div class="panel panel-default" style="background-color: #f5f5f5;border-color:white;height: 35px;padding-left: 15px;">
                    <div class="check-slide">
                      <label class="label_check" for="checkbox-02"><input name="sort[]" id="checkbox-02" type="checkbox" value="Paid" <?php if(isset($price))
                      {
                        if($price==1 || $price==2)
                          {echo "checked";}  
                      }
                      ?>> Paid</label>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-9">
            <div class="filter-row">
              <div class="view-type">
              </div>

              <div class="search">
                <!-- <form method="post" action="<?=site_url('User/CourseC/searchCourse');?>"> -->
                  <input type="text" placeholder="Search" name="txtSearch" id="txtSearch">
                  <input type="submit" value="">
                  <!-- </form> -->
                </div>
              </div>
              <div class="course-post">

              </div>
              <div class="pagination">
                <ul class="tsc_pagination">
                  <li id="pagination"></li>
                </ul>
              </div>
            </div>
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
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight){
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      } 
    });
  }
</script>
<script type="text/javascript">
 loadPagination(0);

 $('#pagination').on('click','a',function(e){
   e.preventDefault(); 
   var pageno = $(this).attr('data-ci-pagination-page');
   loadPagination(pageno);
 });

 $("#txtSearch").keyup(function(){
  loadPagination(0);
});

 $("#checkbox-01").click(function(){
  loadPagination(0);
});

 $("#checkbox-02").click(function(){
  loadPagination(0);
});

 function loadPagination(pagno){
  var bs = "<?=base_url("upload/course/")?>";
  var txtSearch= $("#txtSearch").val();
  var checkPaid = null;
  var checkFree = null;
  if($('#checkbox-01').is(':checked')){
    var checkFree = $("#checkbox-01").val();
  }
  if($('#checkbox-02').is(':checked')){
    var checkPaid = $("#checkbox-02").val();
  }
  var htmlText = '';
  $.ajax({
    type: "POST",
    data : {searcht : txtSearch,checkF : checkFree,checkP : checkPaid},
    url: '<?= site_url('User/MyCourseC/paginate/')?>'+pagno,
    success: function(result){
      var res = JSON.parse(result);
      $('#pagination').html(res.pagination);
      var key = res.courseData;
      $('.course-post').empty();
      for (var data in key)
      {
        htmlText += '<div class="img"><img src="'+bs+key[data].image+'" ';
        htmlText += 'style="height:182px;width:218px;">';
        htmlText += '<div class="icon">';
        htmlText += '<a href="#"><img src="resources/images/book-icon.png" alt=""></a>';
        htmlText += '</div>';
        if(key[data].price==0)
        {
          htmlText += '<div class="price free" style="width:80px;">Free</div>';
        }
        else
        {
          htmlText += '<div class="price" style="width:80px;">₹ '+key[data].price+'</div>';
        }
        htmlText += '</div>';
        htmlText += '<div class="info">';
        htmlText += '<div class="name" id="courseName">'+key[data].courseName+'</div>';
        htmlText += '<div class="expert" id="userName"><span>By </span>'+key[data].userName+'</div>';
        htmlText += '<div class="product-footer">';
        htmlText += '<div class="comment-box">';
        htmlText += '<div class="box" id="count"><i class="fa fa-users"></i>Enrolled:-'+key[data].enID.count+'</div>';
        htmlText += '</div>';
        htmlText += '<div class="rating">';
        htmlText += '<div class="fill" style="width:'+key[data].rates+'%"></div>';
        htmlText += '</div>';
        htmlText += '<p id="description">'+key[data].description+'</p>';
        htmlText += '<div class="view-btn2">';
        htmlText += '<a href="<?=site_url("User/MyCourseC/viewCourse/")?>'+encodeURIComponent(btoa(key[data].courseID))+'" class="btn2">view more</a>';
        htmlText += '</div>';
        htmlText += '</div>';
        htmlText += '</div>';
        htmlText += '<pre style="background-color: white; border: 0"></pre>';
      }
      $(".course-post").append(htmlText);
    }
  });
}
</script>
<script type="text/javascript">
  $("#showMoreData").click(function(){
    var categoryList = '';
    $.ajax({
      url : "<?=site_url('User/CourseC/showMore/')?>",
      success : function(result)
      {
        var res = JSON.parse(result);
        var key = res.categorydata;
        $('.catData').empty();
        for(var data in key)
        {
          categoryList += '<div class="panel panel-default" style="background-color: white;border-color: #f5f5f5;">';
          categoryList += '<div class="panel-heading collapsed"  data-toggle="collapse"  href="#collapse'+key[data].categoryID+'" style="background-color: #f5f5f5;border-color: white;">';
          categoryList += '<h4 class="panel-title">';
          categoryList += '<div>'+key[data].categoryName+'</div>';
          categoryList += '</h4>';
          categoryList += '</div>';
          categoryList += '<div id="collapse'+key[data].categoryID+'" class="panel-collapse collapse" data-parent="#accordion">';
          categoryList += '<div class="panel-body">';
          for(var key1 in key[data].subCategory)
          {
            categoryList += '<ul class="ml-menu">';
            categoryList += '<li>';
            categoryList += '<a class="subcategoryitem" data-id="'+key[data].subCategory[key1].subcategoryID+'" style="color:black;">'+key[data].subCategory[key1].subcategoryName+'</a>';
            categoryList += '</li>';
            categoryList += '</ul>';
          }
          categoryList += '</div>';
          categoryList += '</div>';
          categoryList += '</div>';
        }
        $('#showMoreData').css({"visibility":"hidden","display":"none"});
        $('#showLessData').css({"visibility":"visible","display":"block"});
        $('.catData').append(categoryList);
      }
    });
  });
  $("#showLessData").click(function(){
    var categoryList = '';
    $.ajax({
      url : "<?=site_url('User/CourseC/showLess/')?>",
      success : function(result)
      {
        var res = JSON.parse(result);
        var key = res.categorydata;
        $('.catData').empty();
        for(var data in key)
        {
          categoryList += '<div class="panel panel-default" style="background-color: white;border-color: #f5f5f5;">';
          categoryList += '<div class="panel-heading collapsed"  data-toggle="collapse"  href="#collapse'+key[data].categoryID+'" style="background-color: #f5f5f5;border-color: white;">';
          categoryList += '<h4 class="panel-title">';
          categoryList += '<div>'+key[data].categoryName+'</div>';
          categoryList += '</h4>';
          categoryList += '</div>';
          categoryList += '<div id="collapse'+key[data].categoryID+'" class="panel-collapse collapse" data-parent="#accordion">';
          categoryList += '<div class="panel-body">';
          for(var key1 in key[data].subCategory)
          {
            categoryList += '<ul class="ml-menu">';
            categoryList += '<li>';
            categoryList += '<a class="subcategoryitem" data-id="'+key[data].subCategory[key1].subcategoryID+'" style="color:black;">'+key[data].subCategory[key1].subcategoryName+'</a>';
            categoryList += '</li>';
            categoryList += '</ul>';
          }
          categoryList += '</div>';
          categoryList += '</div>';
          categoryList += '</div>';
        }
        $('#showMoreData').css({"visibility":"visible","display":"block"});
        $('#showLessData').css({"visibility":"hidden","display":"none"});
        $('.catData').append(categoryList);
      }
    });
  });
</script>
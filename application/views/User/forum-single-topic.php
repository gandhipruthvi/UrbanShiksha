<?php

$likedp = array();

foreach ($likedPost as $key) 
{
    $likedp[] = $key->forumPostID;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    <base href="<?=base_url();?>">
    
    <!-- Title -->
    <title>UrbanShiksha</title>
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">
    
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
            <div class="banner-img"><img src="iresources/Banner/forum1.png" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Forum Posts</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb">
        	<div class="container">
            	<ul>
                    <li><a href="<?= site_url('User/HomeC/')?>"><b><i>Home</i></b></a></li>
                    <li><a href="<?=site_url('User/ForumC/')?>"><b><i>Forums</i></b></a></li>
                </ul>
            </div>
        </section>
        <div class="forums-page">
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="row">
                            <div class="col-sm-9">    
                                <h2>Forums Posts</h2>
                            </div>
                            <div class="col-sm-3"> 
                            </div>                          
                        </div>
                        <div class="card" style="border-width:2px;border-style: solid;border-color: #e0e0e0;height: 80px;background-color: #f5f5f5; margin-bottom: 10px;text-align: center;font-size: 24px;padding-top: 20px;color: #424e55">
                            <b><i><?= $forumTopic->forumTopic?></i></b>
                        </div>
                        <div class="forums-single-course">
                            <?php
                                foreach ($forumPost as $key) 
                                {
                            ?>
                            <div class="details-slide" style="border-width: 2px">
                            	<div class="user-info">
                                <?php
                                    foreach ($key->user as $key0) 
                                    {
                                ?>
                                    <a><img src="upload/<?=$key0->image?>" alt="User Image" style="height: 90px;width: 100px;"></a>
                                    <div class="name" style="font-size: 16px"><b><i><?=$key0->userName?></i></b></div>
                                <?php
                                    }
                                ?>
                                </div>
                                <div class="date" style="color: #646363; font-size: 16px"><b><?=$key->postDate?></b></div>
                                <p style="color: #B22222; font-size: 20px"><?=$key->forumPost?></p>
                                <div class="tg-description" style="font-size: 12px;color: green;">
                                    <u><b><a href="javascript:void(0)" style="font-size: 14px;color: green;" class="like" data-post-id="<?=$key->forumPostID?>" id="like-<?=$key->forumPostID?>"><?php if(in_array($key->forumPostID,$likedp)){echo "Unlike";}else echo "Like";?> <?=$key->postLikes?></a></b></u>
                                </div>                     
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="comment-form">
                            <h3>Add Forum Post</h3>
                            <div class="form-group">
                                <input class="form-control" placeholder="Add Forum Post" id="txtForum" type="text" style="width: 1170px;height:80px; font-size: 18px" required>
                            </div>
                            <div class="submit-slide">
                                <button class="btn2" id="addForum" onclick="addForum(<?=$forumID?>)">Submit</button>
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
</body>
</html>

<script type="text/javascript">
function addForum(forumID) 
{
    var forumText = $("#txtForum").val();
    $.ajax({
        type : "POST",
        data : { forumData : forumText},
        url : "<?= site_url("User/ForumC/addForum/")?>"+forumID,
        success : function(result)
        {
            $("#txtForum").val("");
            $(".forums-single-course").empty();            
            $(".forums-single-course").html(result);
        }
    });
}
</script>
<script type="text/javascript">
    $("#searchF").keyup(function(){
        var fID = "<?=$forumID?>";

        var searchPost = $("#searchF").val();
        $.ajax({
            type : "POST",
            data : { searchPost : searchPost },
            url : "<?=site_url("User/ForumC/searchPost/")?>"+fID,
            success : function(result)
            {
                $(".forums-single-course").empty();            
                $(".forums-single-course").html(result);                
            }
        });
    });
</script>
<script type="text/javascript">
    var str1="";
    $(".like").click(function(){
        var postID=$(this).data("post-id");
        var likeAnchor=$(this);
        $.ajax({
            url: '<?=site_url("User/ForumC/addForumPostLike/")?>'+postID, 
            success: function(result){
                str1=result;
                likeAnchor.html(str1);
            }           
          });
    });
</script>
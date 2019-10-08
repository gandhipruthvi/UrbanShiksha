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
                    <h1>Forums Detail</h1>
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
                                <h2>Forums</h2>
                            </div>
                            <div class="col-sm-3">
                                <div class="right-slide">
                                <div class="search-box">
                                    <input type="text" placeholder="Search" id="forumS">
                                    <input type="submit" value=""> 
                                </div>
                                </div>  
                            </div>                          
                        </div>
                        <div class="forum-details" style="border-width: 2px">
                            <?php
                                $i = 1;
                                foreach ($forumData as $key) 
                                {
                                    if($i%2==0)
                                    {
                                        $t = " even";
                                    }
                                    else
                                    {
                                        $t = "";
                                    }
                            ?>
                            	<div class="details-slide<?=$t?>">
                                    <div class="name"><a href="<?=site_url('User/ForumC/singlePost/').$key->forumID?>" style="font-size: 22px;"><b><i><?=$key->forumTopic?></i></b></a></div>
                                    <div class="info" style="padding-top: 15px">
                                        <?php
                                            foreach ($key->user as $key0)
                                            {
                                        ?>
                                        	<div class="block"><i class="fa fa-pencil fa-lg"></i><img class="popper" src="upload/<?=$key0->image?>" alt="User Image" data-toggle="popover" style="height: 50px;width: 50px;margin-left: 25px;margin-right: 20px"><b><span style="font-size: 18px"><?=$key0->userName?></span></b>
                                            <div class="popper-content hide"><p><img src="<?=base_url();?>upload/<?=$key0->image?>"></p><p>Name : <?=$key0->userName?></p></div>
                                        </div>
                                        <?php
                                            }
                                        ?>

                                        <div class="block" style="margin-left: 40px; margin-top:7px"><i class="fa fa-comment fa-lg"></i><b><span style="color: #4682B4; font-size: 20px"><?=$key->forum?></span></b></div>

                                        <div class="block" style="margin-left: 40px; margin-top:7px"><i class="fa fa-clock-o fa-lg"></i><b><span style="color: #646363; font-size: 16px"><?=$key->createdDate?></span></b></div>
                                    </div>
                                </div>
                            <?php
                                $i++;
                                }
                            ?>
                        </div>
                            <form align="center">
                                <textarea class="form-control" placeholder="Share something.." id="postdata" style="align-self: center;margin-top: 20px;height: 100px;resize: none; font-size: 18px" class="col-sm-6 col-md-12"></textarea>
                                <pre style="background-color: white;border-color: white;"></pre>
                                <input type="submit" name="btnpost" id="btnpost" style="height: 50px;width: 150px;" class="btn waves-effect waves-light hor-grd btn-grd-success">
                            </form>

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
<script type="text/javascript">
    $("#forumS").keyup(function(){
        var searchF = $("#forumS").val();
        $.ajax({
            type : "POST",
            data : {searchF : searchF},
            url : "<?=site_url('User/ForumC/searchForum/')?>",
            success : function(result)
            {
                $(".forum-details").empty();            
                $(".forum-details").html(result);
            }
        });
    });

    $("#btnpost").click(function(){
        var data=$("#postdata").val();
        if(data!="")
        {
        $.ajax({
            type:"POST",
            data:{postData : data},
            url: '<?=site_url("User/ForumC/addForumPost/")?>',
            success: function(result){
                location.reload(true);
            }
          });
        }
        else
        {
            alert(1);
        }
    });
</script>
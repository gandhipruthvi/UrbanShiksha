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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

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
          <div class="banner-img"><img src="iresources/Banner/challenge.jpg" alt=""></div>
            <div class="page-title">	
               <div class="container">
                <h1>Courses Progress</h1>
            </div>
        </div>
    </section>
    <section class="breadcrumb">
       <div class="container">
           <ul>
               <li><a href="<?= site_url('User/HomeC/')?>"><b><i>Home</i></b></a></li>
               <li><a href="<?= site_url('User/GlobalChallengeC/')?>"><b><i>GlobalChallenge</i></b></a></li>                    
           </ul>
       </div>
   </section>
   <div class="archived-course" style="background-color: #CDCCCC">
       <div class="container">
           <div class="course-archivedInfo">
               <form method="post" action="<?=site_url('User/GlobalChallengeC/challengeAnswer/').$entryID?>">
                  <div class="input-box">
                    <p style="font-size:20px"><b>Challenge Question :</b> <?=$globalData->question?></p>
                  </div>

                  <div class="input-box">
                    <p style="font-size:20px"><b>Description : </b><?=$globalData->description?></p>
                  </div>
                
                  <div class="input-box">
                    <p style="font-size:18px;color:#4682B4"><b>Submit Answer</b><textarea name="txtAnswer" class="myTextEditor col-sm-12 col-md-12 col-lg-12" style="resize: none;height: 500px;width: 700px" placeholder="Submit Answer"></textarea></p>
                  </div>
                <div class="submit-slide row">
                <div class="col-md-12">
                
                  <input type="submit" value="Submit" class="btn btn-primary" name="btnSubmit">
                
                </div>
              </div>
            </form>
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
        tinyMCE.init({
        // General options
        /*  mode : "textareas",*/
        mode : "specific_textareas",
        editor_selector : "myTextEditor",   
        theme : "advanced",
        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,cleanup,|,preview,|,fullscreen",
        theme_advanced_buttons3 : "",
        theme_advanced_buttons4 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",

        // Style formats
        style_formats : [
        {title : 'Bold text', inline : 'b'},
        {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
        {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
        {title : 'Example 1', inline : 'span', classes : 'example1'},
        {title : 'Example 2', inline : 'span', classes : 'example2'},
        {title : 'Table styles'},
        {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
        ],

        // Replace values for the template plugin
        template_replace_values : {
            username : "Some User",
            staffid : "991234"
        }
    });
</script>
<!-- /TinyMCE -->
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
            <div class="banner-img"><img src="iresources/Banner/challenge.jpg" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>Global Challenge</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="<?=site_url('User/HomeC')?>"><b><i>Home</i></b></a></li>
                    <li><a href="<?=site_url('User/GlobalChallengeC/')?>"><b><i>Global Challenge</i></b></a></li>
                </ul>
            </div>
        </section>
        <section class="our-course">
            <div class="container">
                <div class="col-lg-4">
                    <div class="card" >
                        <div class="header">
                            <h3>Winner of previous challenge</h3>
                            <h3><img src="resources/images/winner.jpg" alt="" height="80px" width="80px"></h3>
                            <hr>
                        </div>
                        <div class="body" style="background-color:#f5f5f5;padding:15px;margin-top: -17px;margin-bottom: -17px;">
                            <div class="header">
                                <span><h4><b><i>Challenge Name : </i></b><?=$globalChallenge->globalChallengeName?></h4></span>
                                <hr>
                                <span><h4><b><i>Challenge Question : </i></b> <?=$globalChallenge->question?></h4></span>
                            </div>
                            <hr>
                            <div class="footer" style="background-color:#f5f5f5">
                                <header><h4><b><i>User Details</i></b></h4></header>
                                <div>
                                    <div>
                                        <img src="<?=base_url("upload/").$globalChallenge->image?>" style="width: 80px;height: 80px;border-radius: 50%;"><br><br>
                                        <p style="font-size:16px;"><b><i>Name : </i></b><?=$globalChallenge->userName?></i></b></p>
                                        <p style="font-size:16px;"><b><i>Qualification : </i></b><?=$globalChallenge->qualification?></p>
                                        <p style="font-size:16px;"><b><i>Email : </i></b><?=$globalChallenge->email?></p>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>

                    <div class="card">
                        <div class="header" style="background-color:#f5f5f5;padding: 10px;">
                            <h3>Participants</h3><br>
                        </div>
                        <div class="body" style="background-color:#f5f5f5;padding-top: 10px;margin-top: 10px;padding-left: 10px;">
                            <ul class="list-unstyled" id="participantsList">

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card" >
                        <div class="body"> 
                            <!-- Nav tabs -->
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="mypost">
                                    <div class="wrap-reset">
                                        <div class="mypost-list">
                                            <div class="post-box">
                                                <center>
                                                    <div class="post-img"><img src="<?=base_url("upload/challenge/").$globalChallengeData->image?>" class="img-fluid" alt="Picture is not available" style="height: 300px;width:600px;border-radius:10%;"></div>
                                                    <br>
                                                </center>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <span>
                                                        <div class="col-md-7" align="right">
                                                            <p style="font-size:22px;"><b><i>Challenge Name :</i></b></p>
                                                        </div>
                                                        <div align="left">
                                                            <p style="font-size:18px;margin-top:5px;"><b><i><?=$globalChallengeData->globalChallengeName?></i></b></p>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <span align="center"><p style="font-size:22px;"><b><i>Challenge Question :</i></b></p><p style="font-size:18px;margin-top:5px;"><b><i><?=$globalChallengeData->question?></i></b></p></span>
                                                </div>

                                                <div class="footer">
                                                    <center>
                                                        
                                                        <?php
                                                            if($globalChallengeEntry==0)
                                                            {
                                                        ?>
                                                        <form method="post" action="<?=site_url('User/GlobalChallengeC/acceptChallenge/').$globalChallengeData->globalChallengeID?>">
                                                            <button type="submit" class="form-control btn-primary" style="font-size:18px;width:200px;">Accept Challenge</button>
                                                        </form>
                                                        <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                        <form method="post" action="<?=site_url('User/GlobalChallengeC/challengeAlreadyAccepted/').$globalChallengeData->globalChallengeID?>">
                                                            <button type="submit" class="form-control btn-primary" style="font-size:18px;width:200px;">Already Accepted</button>
                                                        </form>
                                                        <?php
                                                            }
                                                        ?>
                                                    </center>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
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

<script type="text/javascript">
    function refreshParticipant()
    {
        var participantsList="";
        $.ajax({
            url : "<?=site_url('User/GlobalChallengeC/getChallengeParticipant/')?>"+<?=$globalChallengeData->globalChallengeID?>,
            success : function(result)
            {
                /*alert(result);*/
                var participants=JSON.parse(result);
                for (var i = 0; i < participants.length; i++) {
                    participantsList+='<li>';
                    participantsList+='<div class="row">';
                    participantsList+='<div class="col-md-6">';
                    participantsList+='<img src="<?=base_url("upload/")?>'+participants[i].image+'" class="img-fluid" alt="Picture is not available" style="height: 60px;width:60px;">';
                    participantsList+='</div>';
                    participantsList+='<div class="col-md-6">';
                    participantsList+='<span style="font-size:18px;"><b>'+participants[i].userName+'</b></span>';
                    participantsList+='</div>';
                    participantsList+='</div>';
                    participantsList+='<hr>';
                    participantsList+='<br>';
                    participantsList+='</li>';
                }
                $("#participantsList").html(participantsList);
            }
        });
    }
    refreshParticipant();
    setInterval(refreshParticipant,1000);
</script>
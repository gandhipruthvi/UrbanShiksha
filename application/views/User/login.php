<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta information -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
  <base href="<?= base_url()?>">
  <!-- Title -->
  <title>UrbanShiksha</title>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <style type="text/css">
    .custom-select {
      position: relative;
      font-family: Arial;
      border: 1px solid #DCDCDC;
    }

    .custom-select select {
      display: none; /*hide original SELECT element: */
    }

    .select-selected {
      background-color: white;
    }

    /* Style the arrow inside the select element: */
    .select-selected:after {
      position: absolute;
      content: "";
      top: 14px;
      right: 10px;
      width: 0;
      height: 0;
      border: 6px solid transparent;
      border-color: #000000 transparent transparent transparent;
    }

    /* Point the arrow upwards when the select box is open (active): */
    .select-selected.select-arrow-active:after {
      border-color: transparent transparent #000000 transparent;
      top: 7px;
    }

    /* style the items (options), including the selected item: */
    .select-items div,.select-selected {
      color: #000000;
      padding: 8px 16px;
      border: 1px solid transparent;
      border-color: transparent transparent rgba(1, 1, 1, 0.1) transparent;
      cursor: pointer;
    }

    /* Style items (options): */
    .select-items {
      position: absolute;
      background-color: white;
      top: 100%;
      left: 0;
      right: 0;
      z-index: 99;
      border: 1px solid #DCDCDC;
    }

    /* Hide the items when the select box is closed: */
    .select-hide {
      display: none;
    }

    .select-items div:hover, .same-as-selected {
      background-color: rgba(0, 0, 0, 0.1);
    }
  </style>
  <style type="text/css">
    /* The container */
    .container1 {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 20px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .container1 input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container1:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container1 input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container1 input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .container1 .checkmark:after {
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }

  </style>
  <!--Link Page-->
  <?php include_once("link.php");?>
  <!--#Link Page-->
  <!-- Dropzone Css -->
  <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
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
          <div class="banner-img"><img src="iresources/Banner/120.jpg" alt=""></div>
      <div class="page-title">	
        <div class="container">
          <h1>Login</h1>
        </div>
      </div>
    </section>
    <section class="breadcrumb"> 
      <div class="container">
        <ul>
          <li><a href="<?= site_url('User/HomeC/')?>"><b><i>Home</i></b></a></li>
          <li><a href="<?= site_url('User/LoginC/')?>"><b><i>Login & Register</i></b></a></li>
        </ul>
      </div>
    </section>
    <section class="login-view">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="section-title">
              <h2>Login</h2>
              <p>Login to your account below</p>
            </div>
            <form method="POST" enctype="multipart/form-data" action="<?= site_url('User/LoginC/log')?>">
              <div class="input-box">
                <input type="text" placeholder="Email" name="txtuser" id="txtuser" value="<?php
                if(isset($email))
                {
                  echo $email;
                }
                ?>" required>
              </div>
              <div class="input-box">
                <input type="password" placeholder="Password" name="txtpass" id="txtpass" required>
              </div>
              <div class="check-slide">
                <div class="right-link">
                  <a href="#" data-toggle="modal" data-target="#myModal">Lost Password? </a>
                </div>
              </div>
              <div id="loginDiv" style="color: RED">
                <?php
                if(isset($msg))
                {
                  ?>
                  <script type="text/javascript">
                    alert("<?= $msg?>");
                  </script>
                  <?php
                }
                if(isset($error))
                {
                  echo $error;
                }
                ?>
              </div>
              <pre style="background-color: white;border-color: white"></pre>
              <div class="submit-slide">
                <input type="submit" value="Login" class="btn">
              </div>
            </form>
          </div>
          <div class="col-sm-6">
            <div class="section-title">
              <h2>REGISTER</h2>
              <p>Register now - Completely free</p>
            </div>
            <form class="registerForm" method="POST" action="<?= site_url('User/LoginC/addUser')?>" enctype="multipart/form-data" role="form">
              <div class="input-box">
                <input type="text" placeholder="User Name" id="txtuser2" name="txtuser" required>
              </div>
              <div id="ut"></div>
              <div class="input-box">
                <input type="date" name="date">
              </div>
              <div class="input-box">
                <input type="text" placeholder="Email" id="txtemail1" name="txtemail" required>
              </div>
              <div id="et"></div>
              <div class="input-box">
                <input type="text" placeholder="Enter Contact number" name="txtnum" required>
              </div>
              <div class="input-box">
                <input type="password" placeholder="Password" name="txtpass" id="rpass" required>
              </div>
              <div class="input-box">
                <input type="password" placeholder="Re-Password" name="txtcpass" id="cpass" required>
                <div id="chkPass"></div>
              </div>
              <div class="radio-row">
                <div class="col-md-3">
                  <label class="container1">Female
                    <input value="Female" id="radio-01" name="gender" type="radio" style="-webkit-appearance:radio;" checked>
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="container1">Male
                    <input value="Male" id="radio-02" name="gender" type="radio" style="-webkit-appearance:radio;">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <br>
              <div class="input-box">
                <input type="text" placeholder="Qualification" name="txtquali">
              </div>

              <div class="custom-select" style="width:200px;">
                <select name="dropCity">
                  <?php
                  foreach ($cityData as $key)
                  {
                    ?>
                    <option value="<?=$key->cityID?>"><?=$key->cityName?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <br>
              <div class="dropzone" id="myDropzone" style="height:200px">
                <div class="dz-default dz-message">
                  <span>Upload your Profile Photo</span>
                </div> 
                <input type="hidden" name="img" id="img">         
              </div>
              <br>
              <span class="msg-error error"></span>
              <div id="recaptcha" class="g-recaptcha" data-sitekey="6LfWnacUAAAAAAzhymdnhc0dq9Sb3QTGuazIGpFj"></div>
              <br>
              <div class="submit-slide row">
                <div class="col-md-2">
                  <input type="submit" value="SIGN UP" class="btn" name="btnSubmit" id="btnSubmit">
                </div>
              </div>
              <div class="col-md-2" id="passError" style="color: red"></div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php include_once("footer.php")?>
  </div>
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Recover your Password</h4>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="row form-group">
              <div class="col-md-4">
                <div class="info-slide">
                  <p><span>Enter Username:</span></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-box">
                  <input type="text" id="txtuser1" class="form-control">
                </div>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-4">
                <div class="info-slide">
                  <p><span>Enter Contact Number:</span></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-box">
                  <input type="text" id="txtcno1" class="form-control">
                </div>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-4">
                <div class="info-slide">
                  <p><span>Enter Email:</span></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-box">
                  <input type="text" id="txtmail1" class="form-control">
                </div>
              </div>
              <div id="res1"></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="row">
            <button type="button" class="btn btn-default" id="btnsend" class="form-control">Send</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--Script Page-->
    <?php include_once("script.php");?>
    <!--#Script Page-->
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </body>
  </html>
  <script type="text/javascript">
    $('.registerForm').submit(function(){
    var $captcha = $('#recaptcha'),
    response = grecaptcha.getResponse();
    if (response.length === 0) 
    {
      $( '.msg-error').text( "reCAPTCHA is mandatory" );
      if( !$captcha.hasClass( "error" ) ){
        $captcha.addClass( "error" );
      }
      return false;
    } 
    else 
    {
      $( '.msg-error' ).text('');
      $captcha.removeClass( "error" );
      return true;
    }
  })
    $("#txtuser2").blur(function(){
      var userNm = $("#txtuser2").val();
      // alert(userNm);
      $.ajax({
        url : "<?=site_url('User/CheckC/chkUser/')?>"+userNm,
        success : function(result){
          // alert(result);
          if(result=='* Please enter Unique Username')
          {
            $("#ut").html(result);
            // $("#ut").css({"color" : "red"});
            $("#btnSubmit").hide();
          }
          else
          {
            $("#ut").html(result);
            // $("#ut").css("color","green");
            $("#btnSubmit").show();
          }
        }
      });
    });

    $("#txtemail1").blur(function(){
      var userMail = $("#txtemail1").val();
      // alert(userMail);
      $.ajax({
        type : "POST",
        data : {usMail : userMail},
        url : "<?=site_url('User/CheckC/chkMail/')?>",
        success : function(result){
          // alert(result);
          if(result=='* Please enter Unique Mail')
          {
            $("#et").html(result);
            // $("#ut").css({"color" : "red"});
            $("#btnSubmit").hide();
          }
          else
          {
            $("#et").html(result);
            // $("#ut").css("color","green");
            $("#btnSubmit").show();
          }
        }
      });
    });    
  </script>
  <script type="text/javascript">
     $("#btnSubmit").hide();
    $("#rpass,#cpass").keyup(function(){
      if($("#rpass").val()!="" && $("#cpass").val()!="")
      {
        if($("#cpass").val()!=$("#rpass").val())
        {
          $("#btnSubmit").hide();
          $('#cpass').css('border-color', 'red');
          $('#cpass').css('border-width', '2px');
        }
        else
        {
          $("#btnSubmit").show();
          $('#cpass').css('border-color', '');
          $('#cpass').css('border-width', '1px');
        }
      }
    });

    $("#btnsend").click(function(){
      var x = $("#txtuser1").val();
      var y = $("#txtcno1").val();
      var z = $("#txtmail1").val();
    $.ajax({
      type : "POST",
      data : { textuser : x,textcno : y,textmail : z },
      url: "<?= site_url('User/ForgetPassC/index')?>", 
      success: function(result){
        if(result == 'True')
        {
          $.ajax({
            data : { textuser : x,textmail : z},
            type : "post",
            url: "<?= site_url('User/ForgetPassC/sendMail/')?>", 
            success: function(result){
              if(result == 'Correct')
              {
                $("#myModal").modal("toggle");
                $.notify({ 
                  type : "success",  
                  message : "Password recovery link is successfully sent to your email"
                },{
                  placement: {
                    from: "top",
                    align: "right"
                  },
                  z_index: 500,
                });
              }
              else
              {
                $.notify({
                  type : "erro",
                  message : "Details are invalid, please check again"
                },{ 
                  placement: {
                    from: "top",
                    align: "right"
                  },
                  z_index: 2000,
                });
              }
            }
          });                
        }
        else
        {
          $.notify({
            type : "error",
            message : "Please check your detials"
          },{
            placement: {
              from: "top",
              align: "right"
            },
            z_index: 2000,
          });
        }
      }
    });      
  });
</script>
<script type="text/javascript">
  Dropzone.autoDiscover = false;
  var base64 = '';
  $("#myDropzone").dropzone({
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
</script>
<script type="text/javascript">
  var x, i, j, selElmnt, a, b, c;
  /* Look for any elements with the class "custom-select": */
  x = document.getElementsByClassName("custom-select");
  for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
/* For each option in the original select element,
create a new DIV that will act as an option item: */
c = document.createElement("DIV");
c.innerHTML = selElmnt.options[j].innerHTML;
c.addEventListener("click", function(e) {
/* When an item is clicked, update the original select box,
and the selected item: */
var y, i, k, s, h;
s = this.parentNode.parentNode.getElementsByTagName("select")[0];
h = this.parentNode.previousSibling;
for (i = 0; i < s.length; i++) {
  if (s.options[i].innerHTML == this.innerHTML) {
    s.selectedIndex = i;
    h.innerHTML = this.innerHTML;
    y = this.parentNode.getElementsByClassName("same-as-selected");
    for (k = 0; k < y.length; k++) {
      y[k].removeAttribute("class");
    }
    this.setAttribute("class", "same-as-selected");
    break;
  }
}
h.click();
});
b.appendChild(c);
}
x[i].appendChild(b);
a.addEventListener("click", function(e) {
/* When the select box is clicked, close any other select boxes,
and open/close the current select box: */
e.stopPropagation();
closeAllSelect(this);
this.nextSibling.classList.toggle("select-hide");
this.classList.toggle("select-arrow-active");
});
}

function closeAllSelect(elmnt) {
/* A function that will close all select boxes in the document,
except the current select box: */
var x, y, i, arrNo = [];
x = document.getElementsByClassName("select-items");
y = document.getElementsByClassName("select-selected");
for (i = 0; i < y.length; i++) {
  if (elmnt == y[i]) {
    arrNo.push(i)
  } else {
    y[i].classList.remove("select-arrow-active");
  }
}
for (i = 0; i < x.length; i++) {
  if (arrNo.indexOf(i)) {
    x[i].classList.add("select-hide");
  }
}
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);
</script>
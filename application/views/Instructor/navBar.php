<script type="text/javascript" src="resources/js/jquery-3.4.1.js"></script>
<style type="text/css">
  .popover {background-color: #F0FFFF;}
</style>

<nav class="main-header navbar navbar-expand navbar-light border-bottom" style="background-color: #4f5962;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block" style="margin-top:8px;">
      <img src="iresources/dist/img/AdminLTELogo.png"
      alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text" style="color:white;font-size:20px;"><b>UrbanShiksha</b></span>
    </li>
  </ul>

  <!-- SEARCH FORM -->

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item d-none d-sm-inline-block" style="margin-top:8px;">
      <div class="row">
        <div class="col-md-3">
          <?php
          if($this->session->picture!="")
          {
            $picture = "upload/".$this->session->picture;
          }
          ?>
          <img src="<?=$picture?>" class="img-circle elevation-2 popper" alt="User Image" data-toggle="popover" style="width:45px;height:45px;">
          <div class="popper-content hide"><span style="color:black;"><b><i><?=$this->session->userName?></i></b></span></div>
        </div>
        <div class="nav-item d-none d-sm-inline-block col-md-5">
          <a href="<?= site_url("User/HomeC/")?>" data-toggle="tooltip" data-placement="bottom" title="Switch to Instructor view here" class="nav-link" style="color:white;"><b>Student</b></a>    
        </div>

        <div class="col-md-4" style="margin-top:8px;">
          <a href="<?=site_url('User/LogoutC/');?>" class="d-block" style="color: white;"><b>Logout</b></a>
        </div>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" style="color: white; margin-top: 8px">
        <i class="fa fa-bell-o"></i>
        <span class="badge badge-warning navbar-badge cntNot"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><a onclick="readAllNotification()">Read All</a></span>
        <div class="dropdown-divider"></div>
        <span class="newNotification">
          
          
          
        </span>
      </div>
    </li>

  </ul>
</nav>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
</script>
<script type="text/javascript">
  function notification()
  {
    var htmlNotification = '';
    $.ajax({
      url : "<?=site_url('User/NotificationC/getNotification/')?>",
      success : function(result)
      {
        var res = JSON.parse(result);
        var key = res.notification;
        var key1 = res.count;
        for(data in key)
        {
          htmlNotification += '<a href="'+key[data].link+'" class="dropdown-item notify" data-id="'+key[data].notificationID+'">';
          htmlNotification += '<p><i class="fa fa-envelope mr-2"></i> '+key[data].message+'</p>';
          htmlNotification += '</a>';
        }
        $(".newNotification").html(htmlNotification);
        $(".cntNot").html(key1);
      }
    });
  }

  notification();
  setInterval(notification,1000);
</script>
<script type="text/javascript">
 $(document).on("click",".notify",function(){
  var id = $(this).data("id");
  $.ajax({
    url : "<?=site_url('User/NotificationC/readNotification/')?>"+id,
    success: function(result){
    }      
  });
});
</script>
<script type="text/javascript">
  function readAllNotification() {
    $.ajax({
      url : "<?=site_url('User/NotificationC/readAllNotification/')?>",
      success: function(result){
      }      
    });
  }
</script>
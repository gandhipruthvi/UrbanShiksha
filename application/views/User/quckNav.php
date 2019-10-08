<script type="text/javascript" src="resources/js/jquery-3.4.1.js"></script>
<div class="quck-nav">
  <div class="container">
    <div class="quck-right">
      <?php
      if(isset($this->session->userID))
      {
        ?>
        <div class="right-link">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              <span class="badge badge-warning navbar-badge cntNot" style="background-color: yellow;color: black"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="padding: 10px; width: 300px">
              <span class="dropdown-item dropdown-header" style="text-align: center"><a onclick="readAllNotification()" style="color:black; font-size: 15px;">Read All</a></span><hr style="margin:-3px">
              <div class="dropdown-divider" ></div>
              <span class="newNotification">
              </span>
            </div>
          </li>
        </div>
        <div class="right-link user-profileLink">

          <a href="javascript:void(0);" style="font-size:16px;"><i class="fa fa-user"></i><?=$this->session->userName?></a>
          <ul class="accout-link" style="background-color:#f6f6f6;">
            <li><a href="<?=site_url('User/AccountSettingC/')?>"><b><i>My Account</i></b></a></li>
            <li><a href="<?=site_url('User/MyCourseC/')?>"><b><i>My Courses</i></b></a></li>
            <li><a href="<?=site_url('User/LogoutC/')?>"></i><b><i>Logout</i></b></a></li>
          </ul>
        </div>
        <?php 
      }
      else
      {
        ?>
        <div class="right-link"><a href="<?=site_url('User/LoginC/')?>" style="font-size:14px;"><i class="fa  fa-user"></i>Login \ Register</a></div>                    
        <?php
      }
      ?>
    </div>
  </div>
</div>

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
          htmlNotification += '<a href="'+key[data].link+'" class="dropdown-item notify" style="color:black;" data-id="'+key[data].notificationID+'" >';
          htmlNotification += '<p style="color:black; font-size: 15px; padding-top:7px"><i class="fa fa-envelope mr-2" style="color:black;"></i> '+key[data].message+'</p>';
          htmlNotification += '</a>';
          htmlNotification += '<hr style="margin:-2px">';
        }
        $(".newNotification").html(htmlNotification);
        $(".cntNot").html(key1);
      }
    });
  }

  notification();
  setInterval(notification,5000);
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
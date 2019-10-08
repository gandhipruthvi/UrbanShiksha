<script type="text/javascript" src="resources/js/jquery-3.4.1.js"></script>
<header id="header">
    <div class="container">
        <nav id="nav-main">
            <div class="navbar navbar-inverse">
                <div class="navbar-header" >
                    <a href="index.html" class="navbar-brand"><img id="logo" src="resources/images/urbanshiksha.jpg" style="height:100px;width: 150px;margin-top: -27px" alt=""></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <?php
                if(isset($this->session->userID))
                {
                    ?>
                    <div class="cart-box">
                        <a href="<?=site_url("User/CartC/viewCart/")?>"><i class="fa fa-shopping-basket"></i></a>
                    </div>
                    <?php
                }
                ?>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                        <li>
                            <a href="<?=site_url('User/HomeC')?>">Home </a>
                        </li>
                        <?php
                        if(isset($this->session->userID))
                        {
                            ?>
                            <li class="mega-menu">
                                <a href="<?=site_url("User/CourseC")?>">Courses</a>
                            </li>
                        <?php
                            }
                        ?>
                        <?php
                        if(isset($this->session->userID))
                        {
                            ?>
                            <li>
                                <a href="<?=site_url('User/GlobalChallengeC/')?>">Challenges</a>
                            </li>
                            <li class="mega-menu">
                                <a href="<?=site_url('User/ForumC/')?>">Forums</a>
                            </li>
                            <?php
                        }
                        ?>
                        <li><a href="<?=site_url('User/ContactUsC/')?>">Contact Us</a></li>
                        <?php
                        if(isset($this->session->userID))
                        {
                            ?>
                            <li><a href="<?= site_url("User/ChangeC/instructorView")?>" data-toggle="tooltip" data-placement="bottom" title="Switch to Instructor view here">Instructor</a></li>
                            <li><a href="<?= site_url("User/WishlistC")?>">Wishlist</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image img-responsive">
            <?php
                if($this->session->pictur!="")
                {
                    $picture = "upload/".$this->session->pictur;
                }
            ?>
            <img src="<?=$picture?>" class="img-responsive img-circle" alt="profile image" style="width:80px;height:80px;">
        </div>
        <div class="admin-action-info"> <span>Welcome</span>
                <h3><?=$this->session->adminName?></h3>
                <ul>
<!--                     <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
 -->                    <li><a data-placement="bottom" title="Go to Profile" href="<?=site_url('Admin/ChangeDataC/fetchAdmin/'.$this->session->adminID)?>"><i class="zmdi zmdi-account"></i></a></li>                    
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
                    <li><a data-placement="bottom" title="Log Out" href="<?= site_url("Admin/LogoutC")?>" ><i class="zmdi zmdi-sign-in"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li><a href="<?=site_url("Admin/DashboardC/")?>"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
<!--                 <li><a href="events.html"><i class="zmdi zmdi-calendar-check"></i><span>Event Management</span> </a></li> -->
                <!-- <li class="active open"> --><li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Admin</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?=site_url('Admin/AdminC/')?>">All Admin</a></li>
                        <li><a href="<?=site_url('Admin/AdminC/addData/')?>">Add Admin</a></li>                       
                        <li><a href="<?=site_url('Admin/ChangeDataC/fetchAdmin/'.$this->session->adminID)?>">Manage Profile</a></li>

<!-- <li><a href="<?=site_url('Admin/ChangeDataC/fetchAdmin/'.$this->session->adminID)?>">Manage Profile</a></li> -->
                        
                    </ul>
                </li>                
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Users</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?=site_url('Admin/UserC/')?>">All Users</a></li>
<!--                         <li><a href="add-students.html">Add Students</a></li>                     
                        <li><a href="students-profile.html">Students Profile</a></li>
                        <li><a href="students-invoice.html">Students Invoice</a></li> -->
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-graduation-cap"></i><span>Courses</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?=site_url('Admin/CategoryC/')?>">Category</a></li>
                        <li><a href="<?=site_url('Admin/UnCoursesC/')?>">Unapproved Courses</a></li>
<!--                         <li><a href="courses.html">All Courses</a></li>
                        <li><a href="courses-info.html">Courses Info</a></li> -->
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-comments"></i><span>Questions</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?=site_url('Admin/QuestionC/')?>">All Question</a></li>
                        <!-- <li><a href="add-library.html">Add Library</a></li> -->
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-codepen"></i><span>Global Challenge</span> </a>
                    <ul class="ml-menu">
                        <!-- <li><a href="<?=site_url('Admin/ChallengeC/')?>">All Challenges</a></li> -->
                        <li><a href="<?=site_url('Admin/GlobalChallengeC/')?>">Add Global Challenge</a></li>
                        <li><a href="<?=site_url('Admin/GlobalChallengeC/displayGlobalChallenge')?>">All Global Challenges</a></li>
                        <!-- <li><a href="add-library.html">Add Library</a></li> -->
                    </ul>
                </li>                
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label"></i><span>Offers</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?=site_url('Admin/OffersC/')?>">All Offers</a></li>
                        <!-- <li><a href="add-library.html">Add Library</a></li> -->
                    </ul>
                </li>                
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-comment-text-alt"></i><span>Forums</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?=site_url('Admin/ForumC/')?>">Manage Forums</a></li>
                        <!-- <li><a href="add-library.html">Add Library</a></li> -->
                    </ul>
                </li>                
                <!-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>Departments</span> </a>
                    <ul class="ml-menu">
                        <li><a href="departments.html">All Departments</a></li>
                        <li><a href="add-departments.html">Add Departments</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-mood"></i><span>Staffs</span> </a>
                    <ul class="ml-menu">
                        <li><a href="staffs.html">All Staffs</a></li>
                        <li><a href="add-staffs.html">Add Staffs</a></li>                       
                        <li><a href="staffs-info.html">Staffs Profile</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="centres.html"><i class="zmdi zmdi-pin"></i><span>University Centres</span></a></li>
                <li><a href="reports.html"><i class="zmdi zmdi-file-text"></i><span>Reports</span></a></li>
                <li><a href="widgets.html"><i class="zmdi zmdi-delicious"></i><span>Widgets</span></a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Extra Pages</span> </a>
                    <ul class="ml-menu">
                        <li><a href="sign-in.html">Sign In</a> </li>
                        <li><a href="sign-up.html">Sign Up</a> </li>
                        <li><a href="forgot-password.html">Forgot Password</a> </li>
                        <li><a href="404.html">Page 404</a> </li>
                        <li><a href="500.html">Page 500</a> </li>
                        <li><a href="page-offline.html">Page Offline</a> </li>
                        <li><a href="locked.html">Locked Screen</a> </li>
                        <li><a href="blank.html">Blank Page</a> </li>
                        <li><a href="contact.html">Contact Us</a> </li>
                    </ul>
                </li> -->
                <!-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blogger</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="blog.html">Blog List</a></li>
                        <li> <a href="blog-details.html">Blog Single</a></li>
                    </ul>
                </li> -->
                <!-- <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Forms</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="basic-form-elements.html">Basic Form Elements</a> </li>
                        <li> <a href="advanced-form-elements.html">Advanced Form Elements</a> </li>
                        <li> <a href="form-examples.html">Form Examples</a> </li>
                        <li> <a href="form-validation.html">Form Validation</a> </li>
                        <li> <a href="form-wizard.html">Form Wizard</a> </li>
                        <li> <a href="editors.html">Editors</a> </li>
                    </ul>
                </li> -->
                <!-- <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>User Interface (UI)</span> </a>
                    <ul class="ml-menu">
                        <li><a href="typography.html">Typography</a> </li>
                        <li><a href="helper-classes.html">Helper Classes</a></li>
                        <li><a href="alerts.html">Alerts</a> </li>
                        <li><a href="animations.html">Animations</a> </li>
                        <li><a href="badges.html">Badges</a> </li>
                        <li><a href="breadcrumbs.html">Breadcrumbs</a> </li>
                        <li><a href="buttons.html">Buttons</a> </li>
                        <li><a href="collapse.html">Collapse</a> </li>
                        <li><a href="colors.html">Colors</a> </li>
                        <li><a href="dialogs.html">Dialogs</a> </li>
                        <li><a href="icons.html">Icons</a> </li>
                        <li><a href="labels.html">Labels</a> </li>
                        <li><a href="list-group.html">List Group</a> </li>
                        <li><a href="media-object.html">Media Object</a> </li>
                        <li><a href="modals.html">Modals</a> </li>
                        <li><a href="notifications.html">Notifications</a> </li>
                        <li><a href="pagination.html">Pagination</a> </li>
                        <li><a href="preloaders.html">Preloaders</a> </li>
                        <li><a href="progressbars.html">Progress Bars</a> </li>
                        <li><a href="range-sliders.html">Range Sliders</a> </li>
                        <li><a href="sortable-nestable.html">Sortable & Nestable</a> </li>
                        <li><a href="tabs.html">Tabs</a> </li>
                        <li><a href="waves.html">Waves</a> </li>
                    </ul>
                </li> -->
                <!-- <li class="header">LABELS</li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-red"></i><span>Important</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>Warning</span></a></li>
                <li><a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>Information</span></a></li> -->
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar --> 
    <!-- Right Sidebar -->
   <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red">
                        <div class="red"></div>
                        <span>Red</span> </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span> </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span> </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span> </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span> </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span> </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span> </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span> </li>
                    <li data-theme="blush" class="active">
                        <div class="blush"></div>
                        <span>Blush</span> </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    <base href="<?=base_url()?>">
    <!-- Title -->
    <title>UrbanShiksha</title>
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">
    
    <!-- CSS Stylesheet -->
    <link href="resources/css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="resources/css/owl.carousel.css" rel="stylesheet"><!-- carousel Slider -->
    <link href="resources/css/font-awesome.css" rel="stylesheet"><!-- font awesome -->
    <link href="resources/css/loader.css" rel="stylesheet"><!--  loader css -->
    <link href="resources/css/docs.css" rel="stylesheet"><!--  template structure css -->
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900%7CPT+Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

</head>
    
<body>
    <div class="wapper">
    	<div id="loader-wrapper">
			<div id="loader"></div>
			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div>
        <div class="quck-nav">
        	<div class="container">
            	<div class="contact-no"><a href="#"><i class="fa fa-map-marker"></i>Brooklyn, NY 10036, United States</a></div>
        		<div class="contact-no"><a href="#"><i class="fa fa-phone"></i>+299 97 39 82</a></div>
                <div class="contact-no"><a href="#"><i class="fa fa-globe"></i>academy.com</a></div>
                <div class="quck-right">
                	<div class="right-link"><a href="#"><i class="fa fa-handshake-o"></i>Help Center</a></div>
                    <div class="right-link"><a href="#"><i class="fa fa-headphones"></i>Online Support</a></div>
                    <div class="right-link language-select">
                    	<a href="javascript:void(0);"><i class="fa fa-language"></i>English</a>
                        <ul class="language-list">
                        	<li><a href="#">Guyana</a></li>
                            <li><a href="#">Haiti</a></li>
                            <li><a href="#">Honduras</a></li>
                            <li><a href="#">Andorra</a></li>
                            <li><a href="#">Armenia</a></li>
                            <li><a href="#">Bahrain</a></li>
                        </ul>
                    </div>
                    <div class="right-link"><a href="login-register.html"><i class="fa  fa-user"></i>Login \ Register</a></div>
                </div>
            </div>
        </div>
        <header id="header">
        	<div class="container">
                <nav id="nav-main">
                    <div class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <a href="index.html" class="navbar-brand"><img src="resources/resources/images/logo.png" alt=""></a>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="cart-box">
                        	<a href="cart.html"><i class="fa fa-shopping-basket"></i></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active sub-menu">
                                	<a href="index.html">Home </a>
                                    <ul>
                                    	<li><a href="index.html">Home-1</a></li>
                                        <li><a href="index-2.html">Home-2</a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu sub-menu">
                                	<a href="courses-list.html">Courses</a>
                                    <div class="menu-view">
                                    	<div class="row">
                                        	<div class="col-sm-4">
                                            	<div class="menu-title">Courses Page</div>
                                            	<ul>
                                                	<li><a href="courses-gride.html">Courses Grid</a></li>
                                                    <li><a href="courses-gride-sideBar.html">Courses Grid SideBar</a></li>
                                                    <li><a href="courses-list.html">Courses List</a></li>
                                                    <li><a href="courses-list-sideBar.html">Courses List SideBar</a></li>
                                                    <li><a href="course-details.html">Course Details</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                            	<div class="menu-title">Quiz Page</div>
                                            	<ul>
                                                	<li><a href="quiz-intro.html">Quiz Intro</a></li>
                                                    <li><a href="quiz.html">Quiz</a></li>
                                                    <li><a href="quiz-result.html">Quiz Result</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 menu-courses">
                                            	<div class="menu-title">Popular Courses</div>
                                                <div class="courses-slide">
                                                	<div class="img"><img src="resources/images/blog/post-img1.jpg" alt=""></div>
                                                    <div class="name"><a href="courses-gride.html">Business Management</a></div>
                                                    <div class="price">$500</div>
                                                </div>
                                                <div class="courses-slide">
                                                	<div class="img"><img src="resources/images/blog/post-img2.jpg" alt=""></div>
                                                    <div class="name"><a href="courses-gride.html">Computing Science</a></div>
                                                    <div class="price">$255</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="sub-menu mega-menu"> 
                                	<a href="#">Pages </a>
                                    <div class="menu-view">
                                    	<div class="row">
                                        	<div class="col-sm-4">
                                            	<div class="menu-title">Pages</div>
                                            	<ul>
                                        			<li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="check-out.html">Check Out</a></li>
                                                    <li><a href="instructors.html">Instructors</a></li>
                                        			<li><a href="instructor-profile.html">Instructor Profile</a></li>
                                                    <li><a href="faq.html">Faq</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                            	<div class="menu-title"></div>
                                            	<ul>
                                                	<li><a href="course-details-free.html">Course Details Free</a></li>
                                        			<li><a href="course-lessons.html">Course Lessons</a></li>
                                                    <li><a href="gallery.html">Gallery</a></li>
                                                    <li><a href="thank-you.html">Thank You</a></li>
                                                    <li><a href="coming-soon.html">Comming Soon</a>
                                                    <li><a href="page-404.html">404 Page</a></li>
                                                    <li><a href="certificate.html">Certificate</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                            	<div class="menu-title">After Login</div>
                                            	<ul>
                                                	
                                                    <li><a href="login-register.html">Login Register</a></li>
                                                    <li><a href="account-settings.html">Account Settings</a></li>
                                                    <li><a href="my-courses.html">My Courses</a></li>
                                                    <li><a href="course-progress.html">Course Progress</a></li>
                                                    <li><a href="course-home.html">Course Home</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="sub-menu">
                                	<a href="#">Features</a>
                                    <ul>
                                    	<li><a href="typography.html">Typography</a></li>
                                        <li><a href="price-plan.html">Price Plan</a></li>
                                        <li><a href="testimonial.html">Testimonial</a></li>
                                    </ul>
                                </li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li class="sub-menu">
                                	<a href="event.html">Event</a>
                                    <ul>
                                    	<li><a href="event.html">Event</a></li>
                                        <li><a href="event-details.html">Event Details</a></li>
                                        <li><a href="event-details2.html">Event Details2</a></li>
                                    </ul>
                                </li>
                                <li class="sub-menu mega-menu">
                                	<a href="forums.html">Forums</a>
                                    <div class="menu-view">
                                    	<div class="row">
                                        	<div class="col-sm-4">
                                            	<div class="menu-title">Forums</div>
                                                <ul>
                                                	<li><a href="forums-detail.html">Forums Detail</a></li>
                                                    <li><a href="forums-group.html">Forums Group</a></li>
                                                    <li><a href="forums-group-details.html">Forums Group Details</a></li>
                                                    <li><a href="forums-group-member.html">Forums Group Member</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                            	<div class="menu-title"></div>
                                                <ul>
                                                	<li><a href="forum-single-topic.html">Forum Single Topic</a></li>
                                                    <li><a href="forums-members.html">Forums Members</a></li>
                                                    <li><a href="forums-profile.html">Forums Profile</a></li>
                                                    <li><a href="forums-profile-activity.html">Forums Profile Activity</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                            	<div class="menu-title"></div>
                                                <ul>
                                                	<li><a href="forums-profile-forums.html">Forums Profile Forums</a></li>
                                                    <li><a href="forums-profile-friends.html">Forums Profile Friends</a></li>
                                                    <li><a href="forums-profile-groups.html">Forums Profile Groups</a></li>
                                                    <li><a href="forums-single-profile.html">Forums Single Profile</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="contact-us.html">Contact Us </a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <section class="banner">
        	<div class="banner-img"><img src="resources/images/banner/banner-img1.jpg" alt=""></div>
            <div class="banner-text">
            	<div class="container">
                	<h1>Prepare for exams  the smart way</h1>
                    <p>Join us today to know how  you can ace entrance exams  </p>
                    <div class="search-box">	
                    	<input type="text" placeholder="Search here">
                        <input type="submit" value="">
                    </div>
                    <div class="learning-btn">
                    	<a href="#" class="btn">Start learning now</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="our-course">
        	<div class="container">
            	<div class="section-title">
                	<h2>Our Courses</h2>
                </div>
            	<div class="row">
                	<div class="col-md-4 col-sm-6">
                    	<div class="course-box">
                        	<div class="img">
                            	<img src="resources/images/courses/courses-img1.jpg" alt="">
                                <div class="course-info">
                                	<div class="date"><i class="fa fa-calendar"></i>16-09-2016</div>
                                    <div class="date"><i class="fa fa-clock-o"></i>2 Days </div>
                                    <div class="favorite"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                </div>
                                <div class="price">$100</div>
                           	</div>
                            <div class="course-name">Management<span><em>By </em>Sarah Johnson</span></div>
                            <div class="comment-row">
                            	<div class="rating">
                                    <div class="fill" style="width:45%"></div>
                                </div>
                                <div class="box"><i class="fa fa-users"></i>35 Student</div>
                                <div class="enroll-btn">	
                                	<a href="#" class="btn">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                    	<div class="course-box">
                        	<div class="img">
                            	<img src="resources/images/courses/courses-img2.jpg" alt="">
                                <div class="course-info">
                                	<div class="date"><i class="fa fa-calendar"></i>17-09-2016</div>
                                    <div class="date"><i class="fa fa-clock-o"></i>1 Days </div>
                                    <div class="favorite"><a href="#"><i class="fa fa-heart"></i></a></div>
                                </div>
                                <div class="price free">free</div>
                           	</div>
                            <div class="course-name">Banking<span><em>By </em>Michael Windzor</span></div>
                            <div class="comment-row">
                            	<div class="rating">
                                    <div class="fill" style="width:45%"></div>
                                </div>
                                <div class="box"><i class="fa fa-users"></i>30 Student</div>
                                <div class="enroll-btn">	
                                	<a href="#" class="btn">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                    	<div class="course-box">
                        	<div class="img">
                            	<img src="resources/images/courses/courses-img3.jpg" alt="">
                                <div class="course-info">
                                	<div class="date"><i class="fa fa-calendar"></i>17-09-2016</div>
                                    <div class="date"><i class="fa fa-clock-o"></i>1 Days </div>
                                    <div class="favorite"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                </div>
                                <div class="price">$276</div>
                           	</div>
                            <div class="course-name">Government Recruitment<span><em>By </em>Peter Parker</span></div>
                            <div class="comment-row">
                            	<div class="rating">
                                    <div class="fill" style="width:45%"></div>
                                </div>
                                <div class="box"><i class="fa fa-users"></i>30 Student</div>
                                <div class="enroll-btn">	
                                	<a href="#" class="btn">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="preparation">
        	<div class="container">
            	<div class="section-title white">
                	<h2>Maximize your preparation</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
                <div class="preparation-view">
                	<div class="item">
                    	<div class="icon"><img src="resources/images/preparation-icon1.png" alt=""></div>
                        <div class="course-name">Highest Quality Content by IIM Alumni  <span>CONTENT</span></div>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                    <div class="item">
                    	<div class="icon"><img src="resources/images/preparation-icon2.png" alt=""></div>
                        <div class="course-name">Detailed Analysis with Performance Indicators<span>ANALYSIS</span></div>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                    <div class="item">
                    	<div class="icon"><img src="resources/images/preparation-icon1.png" alt=""></div>
                        <div class="course-name">Highest Quality Content by IIM Alumni  <span>CONTENT</span></div>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                    <div class="item">
                    	<div class="icon"><img src="resources/images/preparation-icon2.png" alt=""></div>
                        <div class="course-name">Detailed Analysis with Performance Indicators<span>ANALYSIS</span></div>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="student-feedback">
        	<div class="container">
            	<div class="section-title">
                	<h2>What our students say</h2>
                </div>
                <div class="feedback-slider">
                	<div class="item">
                    	<div class="student-img"><img src="resources/images/user-img/student-img1.png" alt=""></div>
                        <div class="student-name">Hardik Davaria</div>
                        <div class="student-designation">software engineer</div>
                        <p><i class="fa fa-quote-left"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic. <i class="fa fa-quote-right"></i> </p>
                    </div>
                    <div class="item">
                    	<div class="student-img"><img src="resources/images/user-img/student-img1.png" alt=""></div>
                        <div class="student-name">Hardik Davaria</div>
                        <div class="student-designation">software engineer</div>
                        <p><i class="fa fa-quote-left"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic. <i class="fa fa-quote-right"></i> </p>
                    </div>
                </div>
                <div class="more-stories">
                	<a href="#" class="btn">More Student Stories</a>
                </div>
            </div>
        </section>
        <section class="our-team">
        	<div class="section-title">
            	<h2>Our Team</h2>
            </div>
            <div class="member-slider">	
            	<div class="item">
                	<div class="member-info">
                    	<div class="img"><img src="resources/images/team-member/member-img1.png" alt=""></div>
                        <p>???Lorem Ipsum is simply dummy text of the printing and typesetting industry it has survived not only five centuries, but also the leap into electronic typesetting, unchanged...</p>
                        <p>It was popularised in the 1960s with the release of recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <div class="member-name">-Hardik Chauhan<span>Strategizer</span></div>
                    </div>
                </div>
                <div class="item">
                	<div class="member-info">
                    	<div class="img"><img src="resources/images/team-member/member-img2.png" alt=""></div>
                        <p>???Lorem Ipsum is simply dummy text of the printing and typesetting industry it has survived not only five centuries, but also the leap into electronic typesetting, unchanged...</p>
                        <p>It was popularised in the 1960s with the release of recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <div class="member-name">-Dhruv Patel<span>Geek-in-charge, Coder extraordinaire</span></div>
                    </div>
                </div>
                <div class="item">
                	<div class="member-info">
                    	<div class="img"><img src="resources/images/team-member/member-img3.png" alt=""></div>
                        <p>???Lorem Ipsum is simply dummy text of the printing and typesetting industry it has survived not only five centuries, but also the leap into electronic typesetting, unchanged...</p>
                        <p>It was popularised in the 1960s with the release of recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <div class="member-name">-Ravi Chauhan<span>A.K.A Freshie </span></div>
                    </div>
                </div>
                <div class="item">
                	<div class="member-info">
                    	<div class="img"><img src="resources/images/team-member/member-img1.png" alt=""></div>
                        <p>???Lorem Ipsum is simply dummy text of the printing and typesetting industry it has survived not only five centuries, but also the leap into electronic typesetting, unchanged...</p>
                        <p>It was popularised in the 1960s with the release of recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <div class="member-name">-Hardik Chauhan<span>Strategizer</span></div>
                    </div>
                </div>
                <div class="item">
                	<div class="member-info">
                    	<div class="img"><img src="resources/images/team-member/member-img2.png" alt=""></div>
                        <p>???Lorem Ipsum is simply dummy text of the printing and typesetting industry it has survived not only five centuries, but also the leap into electronic typesetting, unchanged...</p>
                        <p>It was popularised in the 1960s with the release of recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <div class="member-name">-Dhruv Patel<span>Geek-in-charge, Coder extraordinaire</span></div>
                    </div>
                </div>
                <div class="item">
                	<div class="member-info">
                    	<div class="img"><img src="resources/images/team-member/member-img3.png" alt=""></div>
                        <p>???Lorem Ipsum is simply dummy text of the printing and typesetting industry it has survived not only five centuries, but also the leap into electronic typesetting, unchanged...</p>
                        <p>It was popularised in the 1960s with the release of recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <div class="member-name">-Ravi Chauhan<span>A.K.A Freshie </span></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="graph-view">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-5">
                    	<div class="graph-title">climbing the Percentile Ladder</div>
                        <img src="resources/images/graph-img.png" alt="">
                    </div>
                    <div class="col-sm-7">
                    	<div class="point-view">
                            <div class="graph-point">
                                <i class="fa fa-area-chart"></i>
                                <h4>Lorem Ipsum is simply dummy text</h4>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                            </div>
                            <div class="graph-point">
                                <i class="fa fa-users"></i>
                                <h4>Lorem Ipsum is simply dummy text</h4>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="start-learning">
        	<div class="container">
            	<p>I've read enough. Take me to Exam Formula</p>
                <a href="#" class="btn">Start learning now</a>
            </div>
        </section>
        <section class="contact-block">
        	<div class="contact-form">
            	<div class="section-title">
                	<h2>Contact Us</h2>
                </div>
                <div class="form-filde">
                	<form class="has-validation-callback" action="thank-you.html" method="post">
                        <div class="input-box">
                        	<input type="text" placeholder="Name" data-validation="required" name="name" >
                        </div>
                        <div class="input-box">
                        	<input type="text" placeholder="Email" data-validation="required" name="email" >
                        </div>
                        <div class="input-box">
                            <textarea placeholder="Message" data-validation="required" name="message"></textarea>
                        </div>
                        <div class="submit-slide">
                            <input type="submit" value="Submit" class="btn" >
                        </div>
                    </form>
                </div>
            </div>
            <div class="map" id="map">
 	    	</div>
        </section>
        <footer id="footer">
        	<div class="footer-top">
            	<div class="container">
                	<div class="row">
                    	<div class="col-sm-6 col-md-3">
                        	<h5>Popular Courses</h5>
                            <div class="course-slide">
                            	<div class="img"><img src="resources/images/blog/post-img1.jpg" alt=""></div>
                                <p><a href="courses-list.html">when an unknown printer took </a></p>
                                <div class="price">$55</div>
                            </div>
                            <div class="course-slide">
                            	<div class="img"><img src="resources/images/blog/post-img2.jpg" alt=""></div>
                                <p><a href="courses-list-sideBar.html">when an unknown printer took </a></p>
                                <div class="price">$505</div>
                            </div>
                            <div class="course-slide">
                            	<div class="img"><img src="resources/images/blog/post-img3.jpg" alt=""></div>
                                <p><a href="courses-list.html">when an unknown printer took </a></p>
                                <div class="price">$178</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        	<div class="row">
                            	<div class="col-md-offset-1 col-sm-6 col-md-5 col-xs-6">
                                	<h5>Company</h5>
                                    <ul class="footer-link">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="contact-us.html">Contact</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="event.html">Event</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="instructor-profile.html">Instructor Profile</a></li>
                                    </ul>	
                                </div>
                                <div class="col-md-offset-1 col-sm-6 col-md-5 col-xs-6">
                                	<h5>Links</h5>
                                    <ul class="footer-link">
                                    	<li><a href="courses-list.html">Courses List</a></li>
                                        <li><a href="price-plan.html">Pricing Table</a></li>
                                        <li><a href="instructors.html">Instructors</a></li>
                                        <li><a href="forums.html">Forums</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                    </ul>	
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                        	<h5>Contact Us</h5>
                            <div class="contact-view">
                            	<div class="contact-slide">
                                	<p><i class="fa fa-location-arrow"></i>76 Woodland Ave. Sherman Drive  <br>Fort Walton Beach,Harlingen</p>
                                </div>
                                <div class="contact-slide">
                                	<p><i class="fa fa-phone"></i>+299 97 39 82</p>
                                </div>
                                <div class="contact-slide">
                                	<p><i class="fa fa-fax"></i>(08) 8971 7450</p>
                                </div>
                                <div class="contact-slide">
                                	<p><i class="fa fa-envelope"></i><a href="mailTo:academy@info.com">academy@info.com</a></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-8">
            			<div class="copy-right">
                        	<p>Copyright ?? <span class="year">2016</span> Academy.</p>
                            <ul class="footer-link">
                            	<li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 ">	
                    	<div class="social-media">
                        	<ul>
                            	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script type="text/javascript" src="resources/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.js"></script>
    <script type="text/javascript" src="resources/js/owl.carousel.js"></script>
    <script type="text/javascript" src="resources/js/jquery.form-validator.min.js"></script>
    <script type='text/javascript' src='https://maps.google.com/maps/api/js?key=AIzaSyAciPo9R0k3pzmKu6DKhGk6kipPnsTk5NU'></script>
    <script type="text/javascript" src="resources/js/map-styleMain.js"></script>
    <script type="text/javascript" src="resources/js/placeholder.js"></script>
    <script type="text/javascript" src="resources/js/coustem.js"></script>
</body>
</html>


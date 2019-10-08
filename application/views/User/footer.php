        <footer id="footer">
        	<div class="footer-top">
            	<div class="container">
                	<div class="row">
                    	<div class="col-sm-6 col-md-3">
                        <h5>Popular Courses</h5>
                            <div class="popularCourse">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <h5>Developers</h5>
                            <div class="contact-view">
                                <div class="contact-slide">
                                    <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>Saurabh Sali</p>
                                </div>
                                <div class="contact-slide">
                                    <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>Jiya Kelawala</p>
                                </div>
                                <div class="contact-slide">
                                    <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>Pruthvi Gandhi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-1">
                        </div>
                        <div class="col-sm-6 col-md-3">
                        	<h5>Contact Us</h5>
                            <div class="contact-view">
                                <div class="contact-slide">
                                    <p><i class="fa fa-location-arrow"></i>Ashvi Consultancy Services, Royal Square, Uttran, Surat</p>
                                </div>
                                <div class="contact-slide">
                                	<p><i class="fa fa-phone"></i>(+91)8401683983</p>
                                </div>
                                <div class="contact-slide">
                                	<p><i class="fa fa-fax"></i>(+91)8200072309</p>
                                </div>
                                <div class="contact-slide">
                                	<p><i class="fa fa-envelope"></i><a href="mailTo:urbanshiksha2019@gmail.com">urbanshiksha2019@gmail.com</a></p>
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
                        	<p>Copyright © <span class="year">2019</span> Academy.</p>
                            <ul class="footer-link">
                            	<li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 ">	
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
        $(document).ready(function(){
            var courseRandomData = '';
            var bs = "<?=base_url("upload/course/")?>";
            $.ajax({
                url : "<?=site_url('User/HomeC/randomCourse/')?>",
                success : function(result){
                    var res = JSON.parse(result);
                    var key = res.courseData;
                    $('.popularCourse').empty();
                    console.log(key);
                    for(var data in key)
                    {
                        courseRandomData += '<div class="course-slide">';
                        courseRandomData += '<div class="img"><img src="'+bs+key[data].image+'" alt=""></div>';
                        courseRandomData += '<p><a href="<?=site_url("User/CourseC/viewCourse/")?>'+encodeURIComponent(btoa(key[data].courseID))+'">'+key[data].courseName+'</a></p>';


                        if(key[data].price==0)
                        {
                            courseRandomData += '<div class="price free">Free</div>';
                        }
                        else
                        {
                            courseRandomData += '<div class="price">₹ '+key[data].price+'</div>';
                        }
                        courseRandomData += '</div>';
                    }
                    $('.popularCourse').append(courseRandomData);
                }
            });
        });
        </script>
<?php
include('./include/config.php');
ob_start();
session_start();
include('./include/header.php');
include('./include/slider.php');
?>
</header><!--  End header section-->
<section class="login_signup_option">
    <div class="l-modal is-hidden--off-flow js-modal-shopify">
        <div class="l-modal__shadow js-modal-hide"></div>
        <div class="login_popup login_modal_body">
            <div class="Popup_title d-flex justify-content-between">
                <h2 class="hidden">&nbsp;</h2>
                <!-- Nav tabs -->
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-lg-12 login_option_btn">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#login" role="tab">Login</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                        <!-- Tab panels -->
                        <div class="tab-content card">
                            <!--Login-->
                            <div class="tab-pane fade in show active" id="login" role="tabpanel">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $userid = $_POST['userid'];
                                    $password = $_POST['password'];
                                    if (empty($userid) || empty($password)) {
                                        echo ' <div class="alert alert-danger alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                          Some field are empty!!!
		                          </div>';
                                    } else {
                                        $sql = "select * from login where username='$userid'";
                                        $check = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($check) > 0) {
                                            while ($row = mysqli_fetch_array($check)) {
                                                if (password_verify($password, $row["password"])) {
                                                    $page = $row['page'];
                                                    $role = $row['usertype'];
                                                    $_SESSION['userid'] = $userid;
                                                    $_SESSION['role'] = $role;
                                                    header("Location:" . $page);
                                                } else {
                                                    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                          Invalid Username or Password!!!
		                          </div>';
                                                }
                                            }
                                        }
                                    }
                                }

                                ?>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">User ID</label>
                                                <input type="text" class="form-control" name="userid" placeholder="User ID">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12 d-flex justify-content-between login_option">
                                            <a href="forgot-password.php" title="" class="forget_pass">Forget Password ?</a>
                                            <button type="submit" class="btn btn-default login_btn" name="submit">Login</button>
                                        </div>
                                        <p>Don't have an account yet.<a href="signup.php" title="" class="forget_pass">Click here to signup</a></p>
                                        <div class="col-12 col-lg-12 col-md-12 col-lg-12">
                                            <div class="social_login">

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- End Login Signup Option -->





<section class="unlimited_possibilities">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Unlimited Possibilities</h2>

                </div><!-- ends: .section-header -->
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_first">
                    <div class="icon_wrapper">
                        <i class="flaticon-student"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Our Courses</a></h3>
                        <p>We offer the best of all courses.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_center">
                    <div class="icon_wrapper">
                        <i class="flaticon-university"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Our Institution</a></h3>
                        <p>To build the most modern Polytechnic </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="single_item single_item_last">
                    <div class="icon_wrapper">
                        <i class="flaticon-diploma"></i>
                    </div>
                    <div class="blog_title">
                        <h3><a href="#" title="">Education Equip</a></h3>
                        <p>we are practically equip.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Unlimited Possibilities -->
<section class="popular_courses" id="popular_courses_2">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sub_title">
                    <h2>Our Popular Courses</h2>
                    <p>Below are some of our online courses and program</p>
                </div><!-- ends: .section-header -->
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="single-courses">
                    <div class="courses_banner_wrapper">
                        <div class="courses_banner"><a href="#"><img src="images/courses/courses_1.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                    <div class="courses_info_wrapper">
                        <div class="courses_title">
                            <h3><a href="#">Full Stack Web Development</a></h3>
                        </div>
                        <div class="courses_info">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-calendar-alt"></i>180 Days</li>
                                <li><i class="fas fa-user"></i>3000 Students</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- Ends: .single courses -->
            </div><!-- Ends: . -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="single-courses">
                    <div class="courses_banner_wrapper">
                        <div class="courses_banner"><a href="#"><img src="images/courses/courses_2.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                    <div class="courses_info_wrapper">
                        <div class="courses_title">
                            <h3><a href="#">Mobile App Development</a></h3>
                        </div>
                        <div class="courses_info">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-calendar-alt"></i> 120 Days</li>
                                <li><i class="fa fa-user"></i>5000 Students</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- Ends: .single courses -->
            </div><!-- Ends: . -->

            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="single-courses">
                    <div class="courses_banner_wrapper">
                        <div class="courses_banner"><a href="#"><img src="images/courses/courses_3.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                    <div class="courses_info_wrapper">
                        <div class="courses_title">
                            <h3><a href="#">Desktop App Development</a></h3>
                        </div>
                        <div class="courses_info">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-calendar-alt"></i> 140 Days</li>
                                <li><i class="fa fa-user"></i>150 Students</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- Ends: .single courses -->
            </div><!-- Ends: . -->
        </div>
    </div>
</section> <!-- ./ End Courses Area section -->

<?php
include('./include/footer.php');
?>
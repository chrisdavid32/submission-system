<?php
include('./include/layout.php');
?>
</header> <!-- End Header -->
<section class="contact_info_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="contact_info">
                    <h3 class="title">Contact Details</h3>
                    <p>below is our contact information.</p>
                    <div class="event_location_info">
                        <ul class="list-unstyled">
                            <li>
                                <h4 class="info_title">Address : </h4>
                                <ul class="list-unstyled">
                                    <li>fed poly mubi </li>
                                    <li>Adamawa State</li>
                                </ul>
                            </li>
                            <li>
                                <h4 class="info_title">Phone Numbers :</h4>
                                <ul class="list-unstyled">
                                    <li>+23470xx xxx xxxx</li>
                                    <li>+2347035 xxxx xxxxx</li>
                                </ul>
                            </li>
                            <li>
                                <h4 class="info_title">Our E-mails :</h4>
                                <ul class="list-unstyled">
                                    <li>support@submission.com</li>
                                </ul>
                            </li>
                        </ul>
                        <img src="images/banner/map_shape.png" alt="" class="contact__info_shpae">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="contact_form_wrapper">
                    <h3 class="title">Get In Touch</h3>
                    <div class="leave_comment">
                        <div class="contact_form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 form-group">
                                        <input type="email" class="form-control" id="email" placeholder="Your E-mail">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Pick Your Subject">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 form-group">
                                        <textarea class="form-control" id="comment" placeholder="Your Comment Wite Here ..."></textarea>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 submit-btn">
                                        <button type="submit" class="text-center">Send Massage</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- Contact Info Wrappper-->

<?php
include('./include/footer.php');
?>
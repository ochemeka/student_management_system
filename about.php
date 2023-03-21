<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/constant.php"); ?>

<?php 
$pagetitle="About"; 
include("includes/header.php"); ?>
    <!-- End Main Header -->


    <!--Page Title-->
    <section class="page-title centred" style="background-image: url(images/background/page-title.jpg);">
        <div class="container">
            <div class="content-box">
                <h1>About Us</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>About</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- about-section -->
    <section class="about-section style-two">
        <div class="anim-icon">
            <div class="icon icon-1 float-bob-x"></div>
            <div class="icon icon-3"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title style-two">
                            <h5>About Us</h5>
                            <h1>Welcome to Kidko Kindergarten</h1>
                        </div>
                        <div class="bold-text">Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum</div>
                        <div class="text">
                            <p>Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum sed ut perspiciatis unde omnis iste natuserror sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
                        </div>
                        <div class="btn-box"><a href="contact.php" class="theme-btn">Contact us</a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <figure class="image image-1"><img src="images/resource/about-6.jpg" alt=""></figure>
                        <figure class="image image-2"><img src="images/resource/about-5.jpg" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->


    <!-- classes-section -->
    <section class="classes-section style-two sec-pad">
        <div class="parallax-scene parallax-scene-1 parallax-icon">
            <span data-depth="0.40" class="parallax-layer icon icon-1"></span>
            <span data-depth="0.50" class="parallax-layer icon icon-2"></span>
            <span data-depth="0.30" class="parallax-layer icon icon-3"></span>
            <span data-depth="0.40" class="parallax-layer icon icon-4"></span>
            <span data-depth="0.50" class="parallax-layer icon icon-5"></span>
            <span data-depth="0.30" class="parallax-layer icon icon-6"></span>
            <span data-depth="0.40" class="parallax-layer icon icon-7"></span>
        </div>
        <div class="container">
            <div class="sec-title centred">
                <h5>Classess</h5>
                <h1>Education for Your<br />Children</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 block-column">
                    <div class="inner-block wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <figure class="image-box"><a href="class-details.php"><img src="images/resource/class-1.jpg" alt=""></a></figure>
                        <div class="lower-content">
                            <div class="link-btn"><a href="class-details.php"><i class="flaticon-next"></i></a></div>
                            <h3><a href="class-details.php">Music Lessons</a></h3>
                            <div class="price">$480</div>
                            <ul class="info-box">
                                <li>Age: <span>2-4 Years</span></li>
                                <li>Size: <span>12 Seats</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 block-column">
                    <div class="inner-block wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <figure class="image-box"><a href="class-details.php"><img src="images/resource/class-2.jpg" alt=""></a></figure>
                        <div class="lower-content">
                            <div class="link-btn"><a href="class-details.php"><i class="flaticon-next"></i></a></div>
                            <h3><a href="class-details.php">Paper Plates Art</a></h3>
                            <div class="price">$580</div>
                            <ul class="info-box">
                                <li>Age: <span>2-4 Years</span></li>
                                <li>Size: <span>12 Seats</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 block-column">
                    <div class="inner-block wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <figure class="image-box"><a href="class-details.php"><img src="images/resource/class-3.jpg" alt=""></a></figure>
                        <div class="lower-content">
                            <div class="link-btn"><a href="class-details.php"><i class="flaticon-next"></i></a></div>
                            <h3><a href="class-details.php">Education Lessons</a></h3>
                            <div class="price">$550</div>
                            <ul class="info-box">
                                <li>Age: <span>2-4 Years</span></li>
                                <li>Size: <span>12 Seats</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- classes-section end -->


    <!-- our-teachers -->
    <section class="our-teachers style-three about-page sec-pad centred">
        <div class="container">
            <div class="sec-title">
                <h5>Teachers</h5>
                <h1>World Best Teacher<br />Will Teach</h1>
            </div>
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 block-column">
                        <div class="teachers-block-two wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="#"><img src="images/resource/teacher-1.jpg" alt=""></a></figure>
                                <div class="lower-content">
                                    <h3><a href="#">Kevin Spacey</a></h3>
                                    <span class="designation">Teacher</span>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 block-column">
                        <div class="teachers-block-two wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="#"><img src="images/resource/teacher-2.jpg" alt=""></a></figure>
                                <div class="lower-content">
                                    <h3><a href="#">Catherine Jones</a></h3>
                                    <span class="designation">Teacher</span>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 block-column">
                        <div class="teachers-block-two wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="#"><img src="images/resource/teacher-3.jpg" alt=""></a></figure>
                                <div class="lower-content">
                                    <h3><a href="#">John Travolta</a></h3>
                                    <span class="designation">Teacher</span>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-teachers end -->


    <!-- testimonial-video -->
    <section class="testimonial-video">
        <div class="anim-icon">
            <div class="icon icon-1 float-bob-y"></div>
        </div>
        <div class="outer-container clearfix">
            <div class="testimonial-column">
                <div class="testimonial-content">
                    <div class="sec-title style-two">
                        <h5>Testimonials</h5>
                        <h1>Happy Parents Say</h1>
                    </div>
                    <div class="inner-content">
                        <div class="client-testimonial-carousel owl-carousel owl-theme">
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="author">Hattie Bradly <span>/ Kids Fathre</span></div>
                                    <ul class="rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="text">Lorem ipsum dolor sit amet consectetr adipicing elit usmod tempor incidunt enim minim quis nostrud nis exer tation ullamco laboris nis aliquip commodo per</div>
                                </div>
                            </div>
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="author">Jesscia Brown <span>/ Kids Mother</span></div>
                                    <ul class="rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="text">Lorem ipsum dolor sit amet consectetr adipicing elit usmod tempor incidunt enim minim quis nostrud nis exer tation ullamco laboris nis aliquip commodo per</div>
                                </div>
                            </div>
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="author">Christine Eve <span>/ Kids Mother</span></div>
                                    <ul class="rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="text">Lorem ipsum dolor sit amet consectetr adipicing elit usmod tempor incidunt enim minim quis nostrud nis exer tation ullamco laboris nis aliquip commodo per</div>
                                </div>
                            </div>
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="author">Hattie Bradly <span>/ Kids Fathre</span></div>
                                    <ul class="rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="text">Lorem ipsum dolor sit amet consectetr adipicing elit usmod tempor incidunt enim minim quis nostrud nis exer tation ullamco laboris nis aliquip commodo per</div>
                                </div>
                            </div>
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="author">Jesscia Brown <span>/ Kids Mother</span></div>
                                    <ul class="rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="text">Lorem ipsum dolor sit amet consectetr adipicing elit usmod tempor incidunt enim minim quis nostrud nis exer tation ullamco laboris nis aliquip commodo per</div>
                                </div>
                            </div>
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="author">Christine Eve <span>/ Kids Mother</span></div>
                                    <ul class="rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="text">Lorem ipsum dolor sit amet consectetr adipicing elit usmod tempor incidunt enim minim quis nostrud nis exer tation ullamco laboris nis aliquip commodo per</div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!--Client Thumbs Carousel-->
                        <div class="client-thumb-outer">
                            <div class="client-thumbs-carousel owl-carousel owl-theme">
                                <div class="thumb-item">
                                    <figure class="thumb-box"><img src="images/resource/testimonial-1.png" alt=""></figure>
                                </div>
                                <div class="thumb-item">
                                    <figure class="thumb-box"><img src="images/resource/testimonial-2.png" alt=""></figure>
                                </div>
                                <div class="thumb-item">
                                    <figure class="thumb-box"><img src="images/resource/testimonial-3.png" alt=""></figure>
                                </div>
                                <div class="thumb-item">
                                    <figure class="thumb-box"><img src="images/resource/testimonial-1.png" alt=""></figure>
                                </div>
                                <div class="thumb-item">
                                    <figure class="thumb-box"><img src="images/resource/testimonial-2.png" alt=""></figure>
                                </div>
                                <div class="thumb-item">
                                    <figure class="thumb-box"><img src="images/resource/testimonial-3.png" alt=""></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-column">
                <div class="video-inner" style="background-image: url(images/background/video-bg.jpg);">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="overlay-link lightbox-image" data-caption=""><i class="flaticon-play-button"></i></a>
                </div>    
            </div>
        </div>
    </section>
    <!-- testimonial-video end -->


    <!-- fact-counter -->
    <section class="fact-counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="counter-block wow slideInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="icon-box"><i class="flaticon-two-users"></i></div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="200">0</span>
                        </div>
                        <div class="text">Teacher & Staffs</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="counter-block wow slideInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="icon-box"><i class="flaticon-calendar"></i></div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="125">0</span>
                        </div>
                        <div class="text">Total Sessions</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="counter-block wow slideInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="icon-box"><i class="flaticon-boy"></i></div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="750">0</span>
                        </div>
                        <div class="text">Total Students</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="counter-block wow slideInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="icon-box"><i class="flaticon-flask"></i></div>
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="200">0</span>
                        </div>
                        <div class="text">Labs Project</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-counter end -->


    <!-- activities-section -->
    <section class="activities-section style-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box clearfix">
                        <figure class="image"><img src="images/resource/activities-2.jpg" alt=""></figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="title-box">
                            <div class="sec-title style-two">
                                <h5>Activities</h5>
                                <h1>Kids Activities</h1>
                            </div>
                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed eiusmod tempor incid idunt labore dolore magna aliqua enim ad minim veniam.</div>
                        </div>
                        <div class="inner-box">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="single-item wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="icon-box"><i class="flaticon-abc-block"></i></div>
                                        <h3><a href="#">Full Day Session</a></h3>
                                        <div class="text">Lorem ipsum dolor amet consectetur adipisicing elit sed eiusmod tempor </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="single-item wow fadeInRight" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="icon-box"><i class="flaticon-teddy-bear"></i></div>
                                        <h3><a href="#">Table/Floor Toys</a></h3>
                                        <div class="text">Lorem ipsum dolor amet consectetur adipisicing elit sed eiusmod tempor </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="single-item wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="icon-box"><i class="flaticon-championship"></i></div>
                                        <h3><a href="#">Outdoor Games</a></h3>
                                        <div class="text">Lorem ipsum dolor amet consectetur adipisicing elit sed eiusmod tempor </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="single-item wow fadeInRight" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="icon-box"><i class="flaticon-playground"></i></div>
                                        <h3><a href="#">Play Area</a></h3>
                                        <div class="text">Lorem ipsum dolor amet consectetur adipisicing elit sed eiusmod tempor </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- activities-section end -->


    <!-- main-footer -->
    <footer class="main-footer">
        <div class="footer-top">
            <div class="parallax-scene parallax-scene-4 parallax-icon">
                <span data-depth="0.40" class="parallax-layer icon icon-1"></span>
                <span data-depth="0.50" class="parallax-layer icon icon-2"></span>
                <span data-depth="0.30" class="parallax-layer icon icon-3"></span>
                <span data-depth="0.40" class="parallax-layer icon icon-4"></span>
                <span data-depth="0.50" class="parallax-layer icon icon-5"></span>
                <span data-depth="0.30" class="parallax-layer icon icon-6"></span>
                <span data-depth="0.40" class="parallax-layer icon icon-7"></span>
            </div>
            <div class="container">
                <div class="widget-section">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="about-widget footer-widget">
                                <h3 class="widget-title">About Kidko</h3>
                                <div class="widget-content">
                                    <div class="text">
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese runt mollit anim id est laborum. Sed ut perspiciatis unde omnis.</p>
                                        <p>iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="link-widget footer-widget">
                                <h3 class="widget-title">Useful Link</h3>
                                <div class="widget-content">
                                    <ul>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Class Schedule</a></li>
                                        <li><a href="#">Teacher & Staff</a></li>
                                        <li><a href="#">Contact us</a></li>
                                        <li><a href="#">Our Gallery</a></li>
                                        <li><a href="#">Privacy policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="contact-widget footer-widget">
                                <h3 class="widget-title">Get in Touch</h3>
                                <div class="widget-content">
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod.</div>
                                    <ul class="info-list">
                                        <li><i class="fas fa-home"></i>1201 park street, Fifth Avenue, Dhanmondy, Dhaka</li>
                                        <li><i class="fas fa-phone"></i><a href="tel:88657524332">[88] 657 524 332</a></li>
                                        <li><i class="fas fa-envelope"></i><a href="mailto:info@example.com">info@example.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="subscribe-widget footer-widget">
                                <h3 class="widget-title">Subscribe Now</h3>
                                <div class="widget-content">
                                    <div class="text">Lorem ipsum dolor sit amet, consecte- tur adipisicing elit sed do eiusmod.</div>
                                    <div class="subscribe-inner">
                                        <form action="#" method="post" class="subscribe-form">
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Enter Your Email" required="">
                                                <button type="submit" class="theme-btn">Subscribe</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-container clearfix">
                    <div class="left-content pull-left">
                        <div class="copyright">Copyright &copy; <a href="#">tonatheme</a> 2019. All Rights Reserved</div>
                    </div>
                    <div class="right-content pull-right">
                        <figure class="footer-logo"><a href="index.php"><img src="images/footer-logo.png" alt=""></a></figure>
                        <ul class="social-style-one footer-social clearfix">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->



<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="php">
    <i class="fa fa-arrow-up"></i>
</button>



<!-- jequery plugins -->
<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/validation.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/appear.js"></script>
<script src="js/parallax.min.js"></script>

<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src="js/gmaps.js"></script>
<script src="js/map-helper.js"></script>

<!-- main-js -->
<script src="js/script.js"></script>

</body><!-- End of .page_wrapper -->
</php>

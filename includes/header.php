<!DOCTYPE html>
<php lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- <title>Kidko - HTML 5 Template Preview</title> -->
<title><?php  echo $pagetitle; ?></title>

<!-- Stylesheets -->
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<!-- page wrapper -->
<body class="boxed_wrapper">


    <!-- .preloader -->
    <div class="preloader"></div>
    <!-- /.preloader -->


    <!-- search-box-layout -->
    <div class="wraper_flyout_search">
        <div class="table">
            <div class="table-cell">
                <div class="flyout-search-layer"></div>
                <div class="flyout-search-layer"></div>
                <div class="flyout-search-layer"></div>
                <div class="flyout-search-close">
                    <span class="flyout-search-close-line"></span>
                    <span class="flyout-search-close-line"></span>
                </div>
                <!-- <div class="flyout_search">
                    <div class="flyout-search-title">
                        <h4>Search</h4>
                    </div>
                    <div class="flyout-search-bar">
                        <form role="search" method="get" action="#">
                            <div class="form-row">
                                <input type="search" placeholder="Type to search..." value="" name="s" required="">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- search-box-layout end -->


    <!-- Main Header -->
    <header class="main-header">

        <div class="header-top">
            <div class="container">
                <div class="inner-container clearfix">
                    <div class="social-links pull-left">
                        <ul class="social-list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                    <div class="header-info pull-right">
                        <ul class="info-list">
                            <li>
                                <i class="fas fa-phone"></i>
                                <a href="tel:12345615523">123 4561 5523</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:info@example.com">info@example.com</a>
                            </li>
                            <li>
                                <i class="fas fa-user"></i>
                                <a href="login.php">Log</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="clearfix">
                    <div class="logo-box pull-left">
                        <figure class="logo"><a href="index.php"><img src="images/logo.png" alt=""></a></figure>
                    </div>
                    <div class="nav-outer pull-right clearfix">
                        <div class="menu-area">
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="index.php">Home</a></li>
                                        <!-- <li class="current dropdown"><a href="index.php">Home</a>
                                            <ul>
                                                <li><a href="index.php">Home Page 01</a></li>
                                                <li><a href="index-2.php">Home Page 02</a></li>
                                                <li><a href="index-3.php">Home Page 03</a></li>
                                                <li class="dropdown"><a href="#">Header Styles</a>
                                                <ul>
                                                    <li><a href="index.php">Header Style 01</a></li>
                                                    <li><a href="index-2.php">Header Style 02</a></li>
                                                    <li><a href="index-3.php">Header Style 03</a></li>
                                                </ul>
                                            </li>
                                            </ul>
                                        </li> -->
                                        <li class="dropdown"><a href="#">About</a>
                                            <ul>
                                                <li><a href="about.php">About Us</a></li>
                                                <li><a href="faq.php">Faq Page</a></li>
                                                <li><a href="testimonial.php">Testimonials</a></li>
                                                <li><a href="error.php">Error Page</a></li>
                                            </ul>
                                        </li> 
                                        <li class="dropdown"><a href="#">Classes</a>
                                            <ul>
                                                <li><a href="class.php">Our Classes</a></li>
                                                <li><a href="class-details.php">Class Details</a></li>
                                            </ul>
                                        </li> 
                                        <li class="dropdown"><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="gallery.php">Our Gallery</a></li>
                                                <li><a href="teachers.php">Our Teachers</a></li>
                                                <li><a href="pricing.php">Pricing Table</a></li>
                                                <li><a href="event.php">Our Events</a></li>
                                                <li><a href="event-details.php">Event Details</a></li>
                                                <li><a href="shop.php">Shop Page</a></li>
                                                <li><a href="shop-details.php">Shop Details</a></li>
                                                <li><a href="cart.php">Cart Page</a></li>
                                                <li><a href="checkout.php">Checkout Page</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class="dropdown"><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog.php">Blog Page</a></li>
                                                <li><a href="blog-details.php">Blog Details</a></li>
                                            </ul>
                                        </li>                               -->
                                        <li><a href="blog.php">Blog</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="outer-box">
                            <!-- <ul class="outer-content">
                                <li class="header-flyout-searchbar">
                                    <i class="fa fa-search"></i>
                                </li>
                                <li><a href="shop.php"><i class="fas fa-shopping-cart"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container clearfix">
                <figure class="logo-box"><a href="index.php"><img src="images/small-logo.png" alt=""></a></figure>
                <div class="menu-area">
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="index.php">Home</a></li>               
                                <!-- <li class="current dropdown"><a href="#">Home</a>
                                    <ul>
                                        <li><a href="index.php">Home Page 01</a></li>
                                        <li><a href="index-2.php">Home Page 02</a></li>
                                        <li><a href="index-3.php">Home Page 03</a></li>
                                        <li class="dropdown"><a href="#">Header Styles</a>
                                        <ul>
                                            <li><a href="index.php">Header Style 01</a></li>
                                            <li><a href="index-2.php">Header Style 02</a></li>
                                            <li><a href="index-3.php">Header Style 03</a></li>
                                        </ul>
                                    </li>
                                    </ul>
                                </li> -->
                                <li class="dropdown"><a href="#">About</a>
                                    <ul>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="faq.php">Faq Page</a></li>
                                        <li><a href="testimonial.php">Testimonials</a></li>
                                        <li><a href="error.php">Error Page</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Classes</a>
                                    <ul>
                                        <li><a href="class.php">Our Classes</a></li>
                                        <li><a href="class-details.php">Class Details</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="gallery.php">Our Gallery</a></li>
                                        <li><a href="teachers.php">Our Teachers</a></li>
                                        <li><a href="pricing.php">Pricing Table</a></li>
                                        <li><a href="event.php">Our Events</a></li>
                                        <li><a href="event-details.php">Event Details</a></li>
                                        <li><a href="shop.php">Shop Page</a></li>
                                        <li><a href="shop-details.php">Shop Details</a></li>
                                        <li><a href="cart.php">Cart Page</a></li>
                                        <li><a href="checkout.php">Checkout Page</a></li>
                                    </ul>
                                </li>
                                <!-- <li class="dropdown"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog.php">Blog Page</a></li>
                                        <li><a href="blog-details.php">Blog Details</a></li>
                                    </ul>
                                </li>                -->
                             <li><a href="blog.php">Blog</a></li>               
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div><!-- sticky-header end -->
    </header>
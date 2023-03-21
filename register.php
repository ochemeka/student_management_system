<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>

<?php include("includes/header.php"); ?>
<?php 
include("includes/image_upload_functions.php") ?>

<?php
$pagetitle="Register"; ?>


<?php //include("includes/image_upload_functions.php");


//$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('username','email','phone','passc','password');  //passc
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			/*include("includes/image_upload_app.php");
			if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
*/

				// Perform Inssert
				//$passport = $db_images;
				
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($connection,$_POST['username']);
				
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				/*$company = stripslashes($_REQUEST['company']);
				$company = mysqli_real_escape_string($connection,$_POST['company']);
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$bustop = stripslashes($_REQUEST['bustop']);
				$bustop = mysqli_real_escape_string($connection,$_POST['bustop']);
				$country = stripslashes($_REQUEST['country']);
				$country = mysqli_real_escape_string($connection,$_POST['country']);
				$state = stripslashes($_REQUEST['state']);
				$state = mysqli_real_escape_string($connection,$_POST['state']);
				$city = stripslashes($_REQUEST['city']);
				$city = mysqli_real_escape_string($connection,$_POST['city']);*/
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($connection,$_POST['password']);
				$passc = stripslashes($_REQUEST['passc']);
				$passc = mysqli_real_escape_string($connection,$_POST['passc']);
				$hashed_password = md5($password);
				//$time = date("Y-m-d H:i:s");
				//$newsletter = mysqli_real_escape_string($connection,$_POST['newsagree']);
				//$newsletter = stripslashes($_REQUEST['newsagree']);
				//$time = mysqli_real_escape_string($connection,$_POST['time']);
				/*$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$hash = md5( rand(0,1000) );*/
				//$sortcode ="BOACC-".time();
				/*function random_strings($length_of_string) { 
						
					// sha1 the timstamps and returns substring 
					// of specified length 
					return substr(sha1(time()), 0, $length_of_string); 
				} 
				
				// This function will generate 
				// Random string of length 10 
				$memcode = random_strings(15); 
				//$memcode ="SAPSBACVR".time();*/
				
				if ($password != $passc){
				echo "<script type='text/javascript'>alert('Confirm Password Do Not Match!')</script>";
				redirect_to(SITE_PATH."register");
				 }else{
				
				
				
			if (empty($errors)) {

				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM newmember_tbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
			
							// username/password combo was not found in the database
				$errors[] = "Email Already Used";
		
}
	 else {
						
				$query1 = "INSERT INTO newmember_tbl (
						username, email, phone, password, temp_pass
						) VALUES (
							'{$username}', '{$email}', '{$phone}', '{$hashed_password}', '{$password}')";

				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
					
			/*	$last_id= mysqli_insert_id($connection);
				$ewallet=100;
				
			$query2 = "INSERT INTO ewallet (
					eballance, username, user_id
						) VALUES (
							'{$ewallet}', '{$email}', '{$last_id}'
						)";
				$result2 = mysqli_query($connection,$query2);
				if ($result2) {
				}
			else{
			die( mysqli_error($connection) );
			}*/			

				
				
				
 	$to = "{$email}";
	$sitename = SITE_NAME;
	$sitepath = SITE_PATH;
    $subject = $sitename."Bubinod Registration | Account Login Details";
//    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From: $sitename<support@bubinod.com>";
    $message = "Dear $firstname  $lastname,\r\n\r\n
	Thank you for registering with us, we appreciate your registration
	with us.
	Your account has been created, you can login with the following credentials below to enjoy our unlimited services and your registration details would be use during delivery <br>
	
	--------------------------------<br>
	Username: $email\r\n
	Password: $password\r\n<br>
	User Unique Code: $memcode\r\n<br>
	--------------------------------<br>
	

	\r\n
	
	Best Regards,\r\n
	\r\n
	$sitename\r\n
    $sitepath\r\n
    ";

    mail($to, $subject, $message, $headers);
					// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Account created successfully login to enjoy our unlimited services!')</script>";
					redirect_to(SITE_PATH."login?p=success");
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('Account creation failed!')</script>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}
	 }
				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}	

} // end: if (isset($_POST['submit']))
 ?>

  	<!-- header End here -->


  	<!-- Page Header Start here -->
  	<?php /*?><section class="page-header">
  		<div class="overlay">
	  		<div class="container">
	  			<h3>Contact us</h3>
	  			<ul>
	  				<li><a href="index.php">Home</a></li>
	  				<li> - </li>
	  				<li>Contact us</li>
	  			</ul>
	  		</div>
	  	</div><!-- overlay -->
  	</section><?php */?>
  	<!-- Page Header End here -->


  	<!-- Contact Start here -->
    <section class="contact contact-page">
      <div class="contact-details padding-120">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul>
                <li class="contact-item">
                  <span class="icon flaticon-signs"></span>
                  <div class="content">
                    <h4>Our Location</h4>
                    <p>218 Sahera Tropical Center Room#7 <br> New Elephant Road 1205</p>
                  </div>
                </li>
                <li class="contact-item">
                  <span class="icon flaticon-smartphone"></span>
                  <div class="content">
                    <h4>Phone Number</h4>
                    <p>01923-970212, 01776-502993 <br> +2154897369</p>
                  </div>
                </li>
                <li class="contact-item">
                  <span class="icon flaticon-message"></span>
                  <div class="content">
                    <h4>Email Address</h4>
                    <p>hello@labartisan <br> hello@codexcoder.com</p>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
              <form method="post" action="" enctype="multipart/form-data" class="contact-form">
            
			  <?php if (!empty($message)) {
				echo "<p class=\"message\">" . $message. "</p>";
			} ?><?php
			// output a list of the fields that had errors
			if (!empty($errors)) {
				echo "<p class=\"errors\">";
				echo "Please review the following fields:<br />";
				foreach($errors as $error) {
					echo " - " . $error . "<br />";
				}
				echo "</p>";
			}
			?>
              
             <!-- 'username','email','phone','password');-->
                <input style="color:#000;" type="text" name="username" placeholder="Enter Your username eg. MarkSpencer" class="contact-input" required />
                
                 <!--<input style="color:#000;" type="text" name="username" placeholder="Enter Your username  eg. mark0034" class="contact-input" required />-->
                <input style="color:#000;" type="email" name="email" placeholder="Enter Your Email  eg. mark@gmail.com " class="contact-input" required />
                 
                <input style="color:#000;" type="text" name="phone" placeholder="Enter Your Phone eg +2348012345678" class="contact-input" required />
                <input style="color:#000;" type="password" name="password" placeholder="Enter Your password" class="contact-input" required />
				<input style="color:#000;" type="password" name="passc" placeholder="Enter Your confrim password" class="contact-input" required />
                 
                 
             	<?php /*?><label><h6>Select Gender: </h6></label>
                    <select type="text" class="form-control"  placeholder="Select Gender" name="gender" required />
                            <option value="0">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female </option>
                            <option value="Others">Others </option>
                     </select>
                  
                  <label for="exampleInputEmail1"><h6>Select Image: </h6></label>
						 <input name="file_1" type="file" class="form-control" id="file_1" required />
							<input name="file_go" type="hidden" id="file_go" value="go" />
                  
                 
                  <input style="color:#000;" type="password" name="password" placeholder="Your Password" class="contact-input" required />
                   <input style="color:#000;" type="text" name="address" placeholder="Your Address" class="contact-input" required />
                   
				   
				   <input style="color:#000;" type="text" name="city" placeholder="Your City" class="contact-input" required />
                   
                   
                   <input style="color:#000;" type="text" name="state" placeholder="Your State" class="contact-input" required />
                      <?php */?>
                     <?php /*?> <label for="exampleInputEmail1">State:</label>
                    <select type="text" class="form-control"  placeholder="Select Gender" name="state" required />
                    		<option value="0">Select City</option>
                            <option value="ABIA STATE">ABIA STATE</option>
                            <option value="ABUJA FCT">ABUJA FCT</option>
                            <option value="ADAMAWA STATE">ADAMAWA STATE</option>
                            <option value="AKWA IBOM STATE">AKWA IBOM STATE</option>
                            <option value="ANAMBRA STATE">ANAMBRA STATE</option>
                            <option value="BAUCHI STATE">BAUCHI STATE</option>
                            <option value="BAYELSA STATE">BAYELSA STATE</option>
                            <option value="BENUE STATE">BENUE STATE</option>
                            <option value="BORNO STATE">BORNO STATE</option>
                            <option value="CROSS RIVER">CROSS RIVER STATE</option>
                            <option value="DELTA STATE">DELTA STATE</option>
                            <option value="EBONYI STATE">EBONYI STATE</option>
                            <option value="EDO STATE">EDO STATE</option>
                            <option value="EKITI STATE">EKITI STATE</option>
                            <option value="ENUGU STATE">ENUGU STATE</option>
                            <option value="GOMBE STATE">GOMBE STATE</option>
                            <option value="IMO STATE">IMO STATE</option>
                            <option value="JIGAWA STATE">JIGAWA STATE</option>
                            <option value="KADUNA STATE">KADUNA STATE</option>
                            <option value="KANO STATE">KANO STATE</option>
                            <option value="KATSINA STATE">KATSINA STATE</option>
                            <option value="KEBBI STATE">KEBBI STATE</option>
                            <option value="KOGI STATE">KOGI STATE</option>
                            <option value="KWARA STATE">KWARA STATE</option>
                            <option value="LAGOS STATE">LAGOS STATE</option>
                            <option value="NASSARAWA STATE">NASSARAWA STATE</option>
                            <option value="NIGER STATE">NIGER STATE</option>
                            <option value="OGUN STATE">OGUN STATE</option>
                            <option value="ONDO STATE">ONDO STATE</option>
                            <option value="OSUN STATE">OSUN STATE</option>
                            <option value="OYO STATE">OYO STATE</option>
                            <option value="PLATEAU STATE">PLATEAU STATE</option>
                            <option value="RIVERS STATE">RIVERS STATE</option>
                            <option value="SOKOTO STATE">SOKOTO STATE</option>
                            <option value="TARABA STATE">TARABA STATE</option>
                            <option value="YOBE STATE">YOBE STATE</option>
                            <option value="ZAMFARA STATE">ZAMFARA STATE</option>
                         </select>
                         
                	<input style="color:#000;" type="text" name="country" placeholder="Your Country" class="contact-input" required />
                    <?php */?>
                    <!--<input style="color:#000;" type="text" name="country" placeholder="Your Country" class="contact-input">
                    -->
                    
                    
                <input type="submit" name="submit" value="Send Message" class="contact-button">
              <fieldset><legend><i>If Already Registered</i><a href="login.php"></a>       <a href="login.php"><strong>Click </strong>here to Login</a> </legend></legend></h2></fieldset>
             
              </form>
              
              
              
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- contact-details -->
	  <!--<div class="contact-map" id="contact-map"></div>-->
    </section>
    <!-- Contact End here -->


  	<!-- Subscribe Start here -->
  	<section class="subscribe">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-5 col-sm-12 col-xs-12">
  					<h3>Join Our Newsletter</h3>
  				</div>
  				<div class="col-md-7 col-sm-12 col-xs-12">
  					<form action="/">
		  				<input type="text" placeholder="Enter your e-mail here">
		  				<input type="submit" value="Subscribe Now">
		  			</form>
  				</div>
  			</div><!-- row -->
  		</div><!-- container -->
  	</section><!-- subscribe -->
  	<!-- Subscribe End here -->


  	<!-- Footer Start here -->
  	<footer>
  		<div class="footer-top">
  			<div class="container">
  				<div class="row">
  					<div class="col-md-3 col-sm-6 col-xs-12">
  						<div class="footer-item">
  							<div class="title"><a href="index.php"><img src="images/logo_02.png" alt="logo" class="img-responsive"></a></div>
  							<div class="footer-about">
  								<p>Distily enable team driven services through extensive is a relatonships platforms with interactive content. Enthusiastically scale effective.</p>
  								<ul>
  									<li><span><i class="fa fa-home" aria-hidden="true"></i></span> New Chokoya Road, USA.</li>
  									<li><span><i class="fa fa-phone" aria-hidden="true"></i></span> +8801 923 970 212, 0125897</li>
  									<li><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> Contact@admin LabArtisan</li>
  									<li><span><i class="fa fa-globe" aria-hidden="true"></i></span> Email@admin LabArtisan</li>
  								</ul>
  							</div>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6 col-xs-12">
  						<div class="footer-item">
  							<h4 class="title">Latest News</h4>
  							<ul class="footer-post">
  								<li>
  									<div class="image">
  										<a href="single.php"><img src="images/blog/footer_post_01.jpg" alt="post image" class="img-responsive"></a>
  									</div>
  									<div class="content">
  										<p><a href="single.php">Corem psum dolor the amectetuer adipiscing...</a></p>
  										<span>04 February 2017</span>
  									</div>
  								</li>
  								<li>
  									<div class="image">
  										<a href="single.php"><img src="images/blog/footer_post_02.jpg" alt="post image" class="img-responsive"></a>
  									</div>
  									<div class="content">
  										<p><a href="single.php">Corem psum dolor the amectetuer adipiscing...</a></p>
  										<span>28 January 2017</span>
  									</div>
  								</li>
  								<li>
  									<div class="image">
  										<a href="single.php"><img src="images/blog/footer_post_03.jpg" alt="post image" class="img-responsive"></a>
  									</div>
  									<div class="content">
  										<p><a href="single.php">Duis autem iriure dolor in hendrerit esse...</a></p>
  										<span>03 January 2017</span>
  									</div>
  								</li>
  							</ul>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6 col-xs-12">
  						<div class="footer-item">
  							<h4 class="title">Twitter Widget</h4>
  							<ul class="twitter-post">
  								<li>
  									<div class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
  									<div class="content">
  										<p>Raritas etiam processus them dynamicus sequitur mutatem education theme</p>
  										<span>23 seconds ago</span>
  									</div>
  								</li>
  								<li>
  									<div class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
  									<div class="content">
  										<p>Duis autem veleum iriu dolor hendrerit in vulputate velit</p>
  										<span>8 seconds ago</span>
  									</div>
  								</li>
  								<li>
  									<div class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
  									<div class="content">
  										<p>@frankdoe amber tempor cum soluta nobis eleifend</p>
  										<span>2 years ago</span>
  									</div>
  								</li>
  							</ul>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6 col-xs-12">
  						<div class="footer-item">
  							<h4 class="title">Recent Photos</h4>
  							<ul class="photos">
  								<li><a href="#"><img src="images/sidebar/gallery_01.jpg" alt="gallery image" class="img-responsive"></a></li>
  								<li><a href="#"><img src="images/sidebar/gallery_02.jpg" alt="gallery image" class="img-responsive"></a></li>
  								<li><a href="#"><img src="images/sidebar/gallery_03.jpg" alt="gallery image" class="img-responsive"></a></li>
  								<li><a href="#"><img src="images/sidebar/gallery_04.jpg" alt="gallery image" class="img-responsive"></a></li>
  								<li><a href="#"><img src="images/sidebar/gallery_05.jpg" alt="gallery image" class="img-responsive"></a></li>
  								<li><a href="#"><img src="images/sidebar/gallery_06.jpg" alt="gallery image" class="img-responsive"></a></li>
  								<li><a href="#"><img src="images/sidebar/gallery_07.jpg" alt="gallery image" class="img-responsive"></a></li>
  								<li><a href="#"><img src="images/sidebar/gallery_08.jpg" alt="gallery image" class="img-responsive"></a></li>
  								<li><a href="#"><img src="images/sidebar/gallery_09.jpg" alt="gallery image" class="img-responsive"></a></li>
  							</ul>
  						</div>
  					</div>
  				</div><!-- row -->
  			</div><!-- container -->
  		</div><!-- footer top -->
  		<div class="footer-bottom">
  			<div class="container">
  				<div class="row">
	  				<div class="col-md-6 col-sm-6 col-xs-12">
	  					<p>&copy; 2017. Designer By <a href="https://themeforest.net/user/labartisan">LabArtisan</a></p>
	  				</div>
	  				<div class="col-md-6 col-sm-6 col-xs-12">
	  					<ul class="social-default">
			  				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			  				<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
			  				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
			  				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			  				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
			  			</ul>
	  				</div>
	  			</div><!-- row -->
  			</div><!-- container -->
  		</div><!-- footer bottom -->
  	</footer>
    <a class="page-scroll scroll-top" href="#scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
  	<!-- Footer End here -->


    <!-- jquery -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
  
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
  
    <!-- counterup -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
  
    <!-- Isotope -->
    <script src="assets/js/isotope.min.js"></script>
  
    <!-- lightcase -->
    <script src="assets/js/lightcase.js"></script>
  
    <!-- Swiper -->
    <script src="assets/js/swiper.jquery.min.js"></script>

    <!--progress-->
    <script src="assets/js/circle-progress.min.js"></script>

    <!--velocity-->
    <script src="assets/js/velocity.min.js"></script>

    <!--quick-view-->
    <script src="assets/js/quick-view.js"></script>

    <!--nstSlider-->
    <script src="assets/js/jquery.nstSlider.js"></script>

    <!--flexslider-->
    <script src="assets/js/flexslider-min.js"></script>

    <!--easing-->
    <script src="assets/js/jquery.easing.min.js"></script>

    <!-- Google Map -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAQlXnmyNPAeN3c3HNyWoUMqDk6bDF31Cg"></script>
  
    <!-- custom -->
    <script src="assets/js/custom.js"></script>

    <script type="text/javascript">
      
      //Home Page map
        var styleArray = [
          {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [
              {
                "color": "#65ac4c"
              }
            ]
          }
        ];

        var mapOptions = {
          center: new google.maps.LatLng(55.864237,-4.251806),
          zoom: 09,
          styles: styleArray,
          scrollwheel: false,
          backgroundColor: 'transparent',
            mapTypeControl: false,          
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("contact-map"),
          mapOptions);        
        var myLatlng = new google.maps.LatLng(55.864237,-4.251806);      
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          icon: 'images/map-icon.png'
        });

    </script>
  
  
  </body>
    </html>
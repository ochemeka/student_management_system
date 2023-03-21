<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php //require_once("../includes/pagination.php"); ?>
<?php //include_once("../include/formvalidator.php"); ?>
<?php include("includes/header_log.php");  ?>

<?php 
//include("includes/image_upload_functions.php") ?>
<?php //include("includes/image_upload_functions.php");


//$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('username','email','class','phone','passc','password');  //passc
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
				$fname = stripslashes($_REQUEST['fname']);
				$fname = mysqli_real_escape_string($connection,$_POST['fname']);
				$lname = stripslashes($_REQUEST['lname']);
				$lname = mysqli_real_escape_string($connection,$_POST['lname']);
				$classid = stripslashes($_REQUEST['class']);
				$classid = mysqli_real_escape_string($connection,$_POST['class']);

				// if($class > "0 - Primary-6"){
				// 	$classid = "1";
				// }
				// elseif($class > "JSS-1 - SS-3"){
				// 	$classid = "2";
				// }


				
				/*$bustop = stripslashes($_REQUEST['bustop']);
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
				$time = date("Y-m-d H:i:s");
				$newsletter = mysqli_real_escape_string($connection,$_POST['newsagree']);
				$newsletter = stripslashes($_REQUEST['newsagree']);
				//$time = mysqli_real_escape_string($connection,$_POST['time']);
				/*$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$hash = md5( rand(0,1000) );*/
				//$sortcode ="BOACC-".time();
				function random_strings($length_of_string) { 
						
					return substr(sha1(time()), 0, $length_of_string); 
				} 
				
				// This function will generate 
				// Random string of length 10 
				$memcode = random_strings(15); 
				//$memcode ="SAPSBACVR".time();
				
				//$session_of_reg = substr($current_session, 0, 4);
				$school_name = "LEAD";
				$term_code = date("Y");
				$term_code2 = date("s");
				$tcode2 = date("i");
				// $gen_password = "sjs";
				$reg_number = $school_name .$term_code .$term_code2 .$tcode2  ;
				
				if ($password != $passc){
				echo "<script type='text/javascript'>alert('Confirm Password Do Not Match!')</script>";
				redirect_to(SITE_PATH."../../register");
				 }else{
				
				
				
			if (empty($errors)) {

				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM student_tbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
			
							// username/password combo was not found in the database
				$errors[] = "Email Already Used";
		
}
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM student_tbl ";
			$query .= "WHERE username = '{$username}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
			
							// username/password combo was not found in the database
				$errors[] = "username Already Used";
		
}

	 else {
						
				$query1 = "INSERT INTO student_tbl (
						fname, lname, username, mem_id, email, phone, password, temp_pass, 	class_id, time,newsletter
						) VALUES (
							'{$fname}', '{$lname}','{$username}', '{$reg_number}', '{$email}', '{$phone}', '{$hashed_password}', '{$password}', '{$classid}', '{$time}', '{$newsletter}')";

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
    $subject = $sitename."School Management Portal | Account Login Details";
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
					redirect_to(SITE_PATH."../../login?p=success");
					
					
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

<body style="background-color:#272e48;" class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <!-- <a href="index.php"><b>Admin</b>LTE</a> -->
    <a href="index.php" class="h5"><strong style="color:#FFF;">STUDENT REGISTRATION PORTAL</strong> </a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <!-- <p class="login-box-msg">Register a new membership</p> -->

      <form method="post" action="" enctype="multipart/form-data" >
        
	  <div class="input-group mb-4">
          <input type="text" name="fname" class="form-control" placeholder="First Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" name="lname" class="form-control" placeholder="Last Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-4">
          <input type="text" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-4">
          <input type="text" name="phone" class="form-control" placeholder="Phone No.">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-4">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-4">
		<!-- <select type="text" class="form-control"  placeholder="Enter Name" name="class">
                  <option value="0">Select Class</option>
				<?php  													
				// $query = "SELECT * from class_tbl WHERE  	class_status = 1 order by class_id";
				// $result = mysqli_query($connection,$query);
				// while($cat_set=mysqli_fetch_array($result)) {
				// echo "<option value=$cat_set[class_title]>$cat_set[class_title]</option>";
				// }
				?>
                  </select> -->
		
		<select type="text" class="form-control"  placeholder="Select Subject Type" name="class">
			<option value="0">Select Class</option>
			<option value="1">Primary</option>
			<option value="2">Secondary</option>
			<option value="3 &nbsp; Term">Adult</option>
		 </select>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <input type="password" name="passc" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="newsagree" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <!-- <p>- OR -</p> -->
        <!-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a> -->
        <!-- <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a> -->
      </div>

      <a href="login.php"  class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->


  
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

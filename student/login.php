<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
$pagetitle="Members Secure Logins";
?>
<?php include("includes/header_log.php"); 

?>

<?php
	
	if (logged_in()) {
		redirect_to("dashboard.php");
	}

	
	// START FORM PROCESSING
	if (isset($_POST['login'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('email','password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		//$fields_with_lengths = array('username' => 30, 'password' => 30);
		//$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($connection,$_POST['email']);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_password = md5($password);
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT stud_id, email, password, status ";
			$query .= "FROM student_tbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "AND password = '{$hashed_password}' AND status=1 ";
			$query .= " LIMIT 1";
			//$query = ("SELECT adm_id, adm_username,adm_password, adm_status FROM admintbl WHERE adm_username='".$username."' AND adm_password='".$password."' AND adm_status='1', LIMIT 1");
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
				$found_user = mysqli_fetch_array($result_set);
				$_SESSION['user_id'] = $found_user['stud_id'];
				$_SESSION['username'] = $found_user['email'];
				$_SESSION['status'] = $found_user['status'];
		
/*$url = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=6b027df977fc335a3916ae8d085154364545229133d40073e05e60070310357a&ip=".$_SERVER['REMOTE_ADDR']."&format=json"));		
		
		$last_id = $found_user['email'];
				$country = $url->countryName;
				$city = $url->cityName;
				$region = $url->regionName;
				$ipaddress = $url->ipAddress;
				$ccode = $url->countryCode;
				$latitude = $url->latitude;
				$longitude = $url->longitude;
				$timezone = $url->timeZone;
				
			$query2 = "INSERT INTO loginhistory (
					email, country, city, region, ipaddress, countrycode, latitude, longitude, timezone
						) VALUES (
							'{$last_id}', '{$country}', '{$city}', '{$region}', '{$ipaddress}', '{$ccode}', '{$latitude}', '{$longitude}', '{$timezone}'
						)";
				$result2 = mysqli_query($connection,$query2);
				if ($result2) {
				}
			else{
			die( mysqli_error($connection) );
			}*/		
		
		
				//http://localhost/school/student/dashboard.php
				 //header("Location: dashboard");
				 //C:\wamp64\www\school\student\login.php
				 echo "<script type='text/javascript'>alert('Login Successful!')</script>";
				redirect_to("dashboard.php");
			} else {
				// username/password combo was not found in the database
				$message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}
		} else {
			if (count($errors) == 1) {
			} else {
			}
		}
		
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		} 
		$username = "";
		$password = "";
	}
?>

<body style="background-color:#272e48;" class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1">STUDENT LOGIN</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" action="" enctype="multipart/form-data" id="ajax-contact-form">
      <?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="../index.php" class="btn btn-block btn-primary">
          <!-- <i class="fab fa-facebook mr-2"></i>  -->
		  Go To Main Page
        </a>
        <!-- <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a> -->
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</php>

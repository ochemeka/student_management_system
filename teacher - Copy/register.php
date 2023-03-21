<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php //require_once("../includes/pagination.php"); ?>
<?php include_once("../includes/formvalidator.php"); ?>
<?php 
//include("includes/image_upload_functions.php") ?>
<?php //include("includes/header2.php"); ?>
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
						
					// sha1 the timstamps and returns substring 
					// of specified length 
					return substr(sha1(time()), 0, $length_of_string); 
				} 
				
				// This function will generate 
				// Random string of length 10 
				$memcode = random_strings(15); 
				//$memcode ="SAPSBACVR".time();
				
				if ($password != $passc){
				echo "<script type='text/javascript'>alert('Confirm Password Do Not Match!')</script>";
				redirect_to(SITE_PATH."../../register");
				 }else{
				
				
				
			if (empty($errors)) {

				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
// 			$query = "SELECT * ";
// 			$query .= "FROM teacher_tbl ";
// 			$query .= "WHERE email = '{$email}' ";
// 			$query .= "LIMIT 1";
// 			$result_set = mysqli_query($connection,$query);
// 			confirm_query($result_set);
// 			if (mysqli_num_rows($result_set) == 1) {
			
// 							// username/password combo was not found in the database
// 				$errors[] = "Email Already Used";
		
// }
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM teacher_tbl ";
			$query .= "WHERE username = '{$username}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
			
							// username/password combo was not found in the database
				$errors[] = "username Already Used";
		
}

	 else {
						
				$query1 = "INSERT INTO teacher_tbl (
						username, t_code, email, phone, password, temp_pass, time
						) VALUES (
							'{$username}', '{$memcode}', '{$email}', '{$phone}', '{$hashed_password}', '{$password}', '{$time}')";

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



<!DOCTYPE html>
<php lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <!--<ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>-->

    <!-- Right navbar links -->
 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../login.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span>Back To HomePage</span>
    </a>

    <!-- Sidebar -->
    
      <!-- Sidebar user panel (optional) -->
     <div class="p-5" align="center" style="color:#FFFFFF;">
        <div class="p-5">
          <img height="50" width="50" src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        </div>
        <div class="pt-5">
		Already Have<br /> an Account? <br /> <a href="login.php"> <b style="font-weight:bolder;"> Click Here To Login</b></a>
        </div>
    </div>

      <!-- SidebarSearch Form -->
      <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
  
         
        
         
         
              
            
         
  </aside>

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
          
		  <div align="center">
		  
            <h1 style="font-weight:bolder;"  class="m-0">REGISTRATION PORTAL</h1>
          </div><!-- /.col -->
		  </div>
          <div class="col-md-12">
           
			<?php /*?><input name="time" type="hidden" value="<?php //echo date(); ?>" /><?php */?>
			<form method="post" action="" enctype="multipart/form-data" >
							
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
							
                <div class="card-body">
                  <!--<div class="form-group">
                    <label for="exampleInputEmail1">Fullname</label>
                    <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Enter full eg name Mac Brown">
                  </div>
				  'username','email','phone','passc','password')-->
				  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username eg macbrown23" required />
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email eg, abc@gamil.com" required />
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
              <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Phone eg +2348012345678" required />
                  </div>
				  
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="passc" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="newsagree" value="Yes"  class="custom-control-input" id="exampleCheck1" required>
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                
                  <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>  &nbsp; &nbsp; <span  style="font-weight:bolder;"  class="m-0">Already Have an Account Please Click <a class="btn btn-primary" href="login.php">Here To Login</a></span>
                </div>
				
				
			  <div style="font-weight:bolder;"  class="m-0">
			 
			  
			  </div>
				
              </form>
			
             <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>-->
        <div class="col-md-6">
		
		</div>
         
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
           
          <!-- /.col -->

          
              <!-- /.card-body -->
             <?php /*?> <div class="card-footer bg-light p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      United States of America
                      <span class="float-right text-danger">
                        <i class="fas fa-arrow-down text-sm"></i>
                        12%</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      India
                      <span class="float-right text-success">
                        <i class="fas fa-arrow-up text-sm"></i> 4%
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      China
                      <span class="float-right text-warning">
                        <i class="fas fa-arrow-left text-sm"></i> 0%
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.footer -->
            </div><?php */?>
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <?php /*?><div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">

                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Samsung TV
                        <span class="badge badge-warning float-right">$1800</span></a>
                      <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Bicycle
                        <span class="badge badge-info float-right">$700</span></a>
                      <span class="product-description">
                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">
                        Xbox One <span class="badge badge-danger float-right">
                        $350
                      </span>
                      </a>
                      <span class="product-description">
                        Xbox One Console Bundle with Halo Master Chief Collection.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">PlayStation 4
                        <span class="badge badge-success float-right">$399</span></a>
                      <span class="product-description">
                        PlayStation 4 500GB Console (PS4)
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div><?php */?>
        <!-- /.row -->
		
		
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


  
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
<div align="center" style="color:#FFFFFF;">
    <strong >Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
</div>	
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>

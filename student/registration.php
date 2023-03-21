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
<?php


$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('username','email','phone','password');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("includes/image_upload_app.php");
			//if(strlen($db_images) < 3){ $errors[] = "No image upload"; }


				// Perform Inssert
				//$passport = $db_images;
				/*
				$username = mysql_prep($_POST['username']);
				$email = mysql_prep($_POST['email']);
				$address = mysql_prep($_POST['address']);
				$phone = mysql_prep($_POST['phone']);
				//$kids = mysql_prep($_POST['kids']);
				$pass = md5(mysql_prep($_POST['password']));
				$temp_pass = mysql_prep($_POST['password']);
				//$pass = mysql_prep($_POST['password']);
				//$desc = mysql_prep($_POST['desc']);
                $passport = $db_images;
				*/
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($connection,$_POST['username']);
				//$gender = stripslashes($_REQUEST['gender']);
				//$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				//$address = stripslashes($_REQUEST['address']);
				//$address = mysqli_real_escape_string($connection,$_POST['address']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$temp_pass = stripslashes($_REQUEST['password']);
				$temp_pass = mysqli_real_escape_string($connection,$_POST['password']);
				$pass = md5($password);
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);
				
				
				
				//$hash = md5( rand(0,1000) );
				// $passport = $db_images;
				/*$country = stripslashes($_REQUEST['country']);
				$country = mysqli_real_escape_string($connection,$_POST['country']);
				$state = stripslashes($_REQUEST['state']);
				$state = mysqli_real_escape_string($connection,$_POST['state']);
				$city = stripslashes($_REQUEST['city']);
				$city = mysqli_real_escape_string($connection,$_POST['city']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);*/
				/*$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$hash = md5( rand(0,1000) );*/
				//$sortcode ="BOACC-".time();
				//$securecode ="USHSBACVR-".time();
				
				//Checking the password field against error.
				$validator->addValidation("password","req","Enter a valid password");
				$validator->addValidation("password","minlen=6","Invalid length of password. Length must be above 6 characters");
				$validator->addValidation("password","maxlen=30","Maximum length of password is 30 characters");
				//Checking user full name input field against error.
				$validator->addValidation("email","req","Enter your email");
				$validator->addValidation("email","alnum_s","Enter a valid email");
				$validator->addValidation("email","minlen=6","Invalid email. Length must be above 6 characters");
				$validator->addValidation("email","maxlen=30","Maximum length for name is 30 characters");
				//Checking user full name input field against error.
				$validator->addValidation("phone","req","Enter your phone number");
				$validator->addValidation("phone","alnum_s","Enter a valid phone number");
				$validator->addValidation("phone","minlen=5","Invalid full name. Length must be above 5 characters");
				$validator->addValidation("phone","maxlen=30","Maximum length for phone is 30 characters");
				
			if ($validator->ValidateForm() && empty($errors)) {
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
						'{$username}', '{$email}', '{$phone}',,'{$pass}','{$temp_pass}'";

				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
					
				
 /*	$to = "{$email}";
	$sitename = SITE_NAME;
	$sitepath = SITE_PATH;
    $subject = $sitename."Signup | Email Confirmation";
//    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From: $sitename<support@lucianoluxuryhotel.com>";
    $message = "Dear $fullname,\r\n\r\n
	Thank you for registering with us, we appreciate your registration
	with us.
	Your account has been created, you can login with the following credentials 
	
	--------------------------------
	Username: $email\r\n
	Password: $passmail\r\n<br>
	Security Question: $sec_qst\r\n<br>
	Security Answer: $sec_ans\r\n<br>
	--------------------------------

	\r\n
	
	Best Regards,\r\n
	\r\n
	$sitename\r\n
    $sitepath\r\n
    ";

    mail($to, $subject, $message, $headers);*/
					// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Account created successfully Login!')</script>";
					redirect_to(SITE_PATH."login?p=success");
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('Account creation failed!')</script>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}
	  }
			}else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
		
} // end: if (isset($_POST['submit']))
 ?>





<!DOCTYPE html>
<php lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Register</title>

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
    <a href="../index.php" class="brand-link">
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
        <a href="register.php"> <b style="font-weight:bolder;">REGISTRATION  PORTAL</b></a>
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
           
			
			<form method="post" action="" enctype="multipart/form-data" >
							<?php /*?><input name="time" type="hidden" value="<?php //echo date(); ?>" /><?php */?>
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter full eg name Mac Brown">
                  </div>
				  
				 <?php /*?> <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username eg macbrown23">
                  </div>
				  'username','email','address','phone','gender','password
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter email eg, abc@gamil.com">
                  </div><?php */?>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email eg, abc@gamil.com">
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter email eg, 08067543211">
                  </div>
				 <?php /*?> <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <input type="text" name="gender" class="form-control" id="exampleInputEmail1" placeholder="Enter full eg name Mac Brown">
                  </div><?php */?>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
				  <!--<div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="passc" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>-->
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>  &nbsp; &nbsp; <span  style="font-weight:bolder;"  class="m-0">Already Have an Account Please Click <a class="btn btn-primary" href="index.php">Here To Login</a></span>
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

<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
$pagetitle="teacher login";
?>
<?php include("includes/header.php"); 

?>

<?php
	
  if (teacher_logged_in()) {
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
			$query = "SELECT t_id, email, password, t_status ";
			$query .= "FROM teacher_tbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "AND password = '{$hashed_password}' AND t_status=1 ";
			$query .= " LIMIT 1";
			//$query = ("SELECT adm_id, adm_username,adm_password, adm_status FROM admintbl WHERE adm_username='".$username."' AND adm_password='".$password."' AND adm_status='1', LIMIT 1");
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
				$found_user = mysqli_fetch_array($result_set);
				$_SESSION['t_id'] = $found_user['t_id'];
				$_SESSION['t_username'] = $found_user['email'];
				$_SESSION['t_status'] = $found_user['t_status'];
		
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
		
		
				
				 //header("Location: dashboard");
				 echo "<script type='text/javascript'>alert('Login Successful!')</script>";
				redirect_to(SITE_PATH."/teacher/dashboard");
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
	 Back to home  <br /><a href="../index.php"><b style="font-weight:bolder;">  Click Here
          </b></a>
        </div>
    </div>
    <!-- Sidebar -->
    
      <!-- Sidebar user panel (optional) -->
     <?php /*?> <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div><?php */?>

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
        <div class="row mb-2">
          <div class="col-sm-12">
		  <div align="center">
		   <img height="50" width="50" src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <h1 style="font-weight:bolder;"  class="m-0">TEACHER/TUTOR LOGIN</h1>
          </div><!-- /.col -->
		  </div>
          <div class="col-sm-12">
           
			
			<form method="post" action="" enctype="multipart/form-data" id="ajax-contact-form">
							<?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>
							
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
             <br /><br /><br />
			  <div style="font-weight:bolder;"  class="m-0">
			  Don't Have an Account Please Click <a href="register.php">Here To Register</a>
			  
			  </div>
			 
			  </form>
			  
			 
			
             <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>-->
            
          </div><!-- /.col -->
        </div><!-- /.row -->
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

<footer class="main-footer">
<div align="center" style="color:#FFFFFF;">
    <strong >Copyright &copy; 2014-2021 <a href="https://www.bslonline360.com">BSL360media</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
</div>	
  </footer>
  
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
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

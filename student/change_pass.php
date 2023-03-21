<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php //require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Change password";
?>
<?php
confirm_logged_in(); 


?>
<?php 

$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);
?>


<?php




// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.
$errors = array();

		$required_fields = array('password','pass_nw','pass_nw2');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			
		$temp_pass = stripslashes($_REQUEST['password']);
		$temp_pass = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_pass1 = md5($password);
		
		
		$pass1 = stripslashes($_REQUEST['password']);
		$pass1 = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_pass1 = md5($pass1);
		$pass2 = stripslashes($_REQUEST['pass_nw']);
		$pass2 = mysqli_real_escape_string($connection,$_POST['pass_nw']);
		$hashed_pass2 = md5($pass2);
		$pass3 = stripslashes($_REQUEST['pass_nw2']);
		$pass3 = mysqli_real_escape_string($connection,$_POST['pass_nw2']);
		$hashed_pass3 = md5($pass3);
		$passmail = mysqli_real_escape_string($connection,$_POST['pass_nw2']);
		if ($pass2 != $pass3){
			echo "<script type='text/javascript'>alert('Confirm Password Do Not Match!')</script>";
			redirect_to(SITE_PATH."../../change_pass");
			 }else{

		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM student_tbl ";
			$query .= "WHERE password = '{$hashed_pass1}' ";
			$query .= "AND stud_id = '{$_SESSION['user_id']}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
							$query = 	"UPDATE student_tbl SET 
							password = '{$hashed_pass3}', 
							temp_pass = '{$passmail}' 
						WHERE stud_id = {$_SESSION['user_id']}";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {
					// Success!
					echo "<script type='text/javascript'>alert('Password Change Successfully!')</script>";
					
					redirect_to(SITE_PATH."../../change_pass");
				} else {
					// Display error message.
					echo "<p>Error.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}


			} else {
				// username/password combo was not found in the database
				echo "<script type='text/javascript'>alert('Incorrect Old Password!')</script>";
			}			
		}
}
	}
?> 
 <!-- Main Sidebar Container -->
  <?php include("includes/header_side.php");  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data">
              <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			echo $msg="Update Successful";
			}
			?>


                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><strong>Old Password:   </strong><?php echo $stud_part['temp_pass'];?></label>
                    <input name="password" type="password" value="" placeholder="Enter Old Password" class="form-control" />
                      <br />
                    <input name="pass_nw" type="password" placeholder="Enter New Password" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="pass_nw2" type="password" placeholder="Enter New Password" class="form-control"/>   
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                
                  <button type="submit" class="btn btn-primary" name="submit">Change Password</button>      
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            
            <!-- /.card -->

            <!-- Input addon -->
            
            <!-- /.card -->

            <!-- general form elements disabled -->
            
                  
                 

                  

                  
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>

<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php //require_once("../includes/pagination.php"); ?>
<?php include_once("../includes/formvalidator.php"); ?>
<?php 
//$member = get_stud($_SESSION['username']);
//$stud_part = mysqli_fetch_array($member);
$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);

?>

<?php
$pagetitle="Register"; 

confirm_logged_in(); 


$user = get_user2($_GET['pid']);
$user_part = mysqli_fetch_array($user);

//$showstudent = get_userid($_GET["pid"]);
//$get_student = mysql_fetch_array($showstudent);

?>

<?php include('includes/sidebar.php'); ?>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                
								
<?php 
if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			/*    <!-- /.card-body   fullname,username,gender,phone,dob,email
    father_name, address, fname, focc, fphone, mname, mocc,mphone, lga, state, nation, class, add_date,
    -->  */
			$required_fields = array('fullname','username','gender','phone','dob',
                'email','address','fname','focc','fphone','mname','mocc',
                'lga','state','nation','class','add_date');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("../includes/image_upload_app1.php");
			//if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				//$passport = $db_images;
        /*    <!-- /.card-body   fullname,username,gender,phone,dob,email,
     address, fname, focc, fphone, mname, mocc,mphone, lga, state, nation, class, add_date,
    -->  */
				$fullname = stripslashes($_REQUEST['fullname']);
				$fullname = mysqli_real_escape_string($connection,$_POST['fullname']);
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($connection,$_POST['username']);
				$gender= stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
        $dob = stripslashes($_REQUEST['dob']);
				$dob = mysqli_real_escape_string($connection,$_POST['dob']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$address= stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$fname = stripslashes($_REQUEST['fname']);
				$fname = mysqli_real_escape_string($connection,$_POST['fname']);
        $focc = stripslashes($_REQUEST['focc']);
				$focc = mysqli_real_escape_string($connection,$_POST['focc']);
				$fphone = stripslashes($_REQUEST['fphone']);
				$fphone = mysqli_real_escape_string($connection,$_POST['fphone']);
				$mname= stripslashes($_REQUEST['mname']);
				$mname = mysqli_real_escape_string($connection,$_POST['mname']);
				$mocc = stripslashes($_REQUEST['mocc']);
				$mocc = mysqli_real_escape_string($connection,$_POST['mocc']);
        $mphone = stripslashes($_REQUEST['mphone']);
				$mphone = mysqli_real_escape_string($connection,$_POST['mphone']);
        $lga = stripslashes($_REQUEST['lga']);
				$lga = mysqli_real_escape_string($connection,$_POST['lga']);
        $state = stripslashes($_REQUEST['state']);
				$state = mysqli_real_escape_string($connection,$_POST['state']);
        $nation = stripslashes($_REQUEST['nation']);
				$nation = mysqli_real_escape_string($connection,$_POST['nation']);
        $class = stripslashes($_REQUEST['class']);
				$class = mysqli_real_escape_string($connection,$_POST['class']);
        $add_date = stripslashes($_REQUEST['add_date']);
				$add_date = mysqli_real_escape_string($connection,$_POST['add_date']);
        /*    <!-- /.card-body   fullname,username,gender,phone,dob,email,
     address, fname, focc, fphone, mname, mocc,mphone, lga, state, nation, class, add_date,
    -->  */
				/*$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$dob = stripslashes($_REQUEST['dob']);
				$dob = mysqli_real_escape_string($connection,$_POST['dob']);
				$password = stripslashes($_REQUEST['password']);
				$password = md5(mysqli_real_escape_string($connection,$_POST['password']));
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);*/
				//$stid = mysql_prep($_GET['pid']);
						$stid = $_GET['pid'];


				/*    <!-- /.card-body   fullname,username,gender,phone,dob,email,
     address, fname, focc, fphone, mname, mocc,mphone, lga, state, nation, class, add_date,
    -->  */
				$query = 	"UPDATE student_tbl SET 
						 fullname = '{$fullname}',
             username = '{$username}',
             gender = '{$gender}',
             phone = '{$phone}',
             dob = '{$dob}',
             email = '{$email}',
             address = '{$address}',
             father_name = '{$fname}',
             father_occ = '{$focc}',
             father_phone = '{$fphone}',
             mother_name = '{$mname}',
             mother_occ = '{$mocc}',
             mother_phone = '{$mphone}',
             lga = '{$lga}',
             state = '{$state}',
             nationality = '{$nation}',
             class = '{$class}',
             addmission_date = '{$add_date}'
							
						WHERE stud_id = '{$stid}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Student data Successfully Updated !')</script>";
				redirect_to('profiles');
					
				} else {
					// Display error message.
					echo "<p>Subject creation failed.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?>
<?php /*?><?php 
$member = get_user_id($_SESSION['username']);
	$member_part = mysql_fetch_array($member);
	

	// make sure the subject id sent is an integer
	if (intval($_GET['pid']) == 0) {
		redirect_to('dashboard.php');
	}
	
if (isset($_POST['submit'])) {
$errors = array();
$rand1 = time();														
$required_fields = array('username','email','phone','address');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }
			
			if (empty($errors)) {

				// Perform Update
				$stid = mysql_prep($_GET['pid']);
				$passport = $db_images;
				$username = mysql_prep($_POST['username']);
                $email = mysql_prep($_POST['email']);
				$phone = mysql_prep($_POST['phone']);
				$address = mysql_prep($_POST['address']);
				
			$query = 	"UPDATE newmember_tbl SET 
							username = '{$username}',
							email = '{$email}',
							phone = '{$phone}',
							address = '{$address}',
							image = '{$passport}'
						WHERE id = {$stid}";
						
						
						
			$result = mysql_query($query);
			if (mysql_affected_rows() == 1) {
					// Success!
			echo "<script type='text/javascript'>alert('Member data Successfully Updated !')</script>";
					redirect_to("manage_members.php");
				} else {
					// Display error message.
										echo  "<p>" . mysql_error() . "</p>";

				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?><?php */?>


  <!-- /.navbar -->

  <!-- /.card-body   mphone,mocc,mname,fphone,focc,fname-->
  <?php include("includes/header3.php");  ?>
  <?php //include("includes/sidebar2.php");  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <!--   <h1>Validation</h1>-->
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>-->
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
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Parents Bio <small></small></h3>
              </div>
              <!-- /.card-header -->
  <?php 
$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);
?>              <!-- form start 
              <form id="quickForm">-->
              <form method="post" action="" enctype="multipart/form-data">
              <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			echo $msg="Update Successful";
			}
			?>

                <div class="card-body">

                <div class="form-group">
                <label for="exampleInputEmail1">Fullname</label>
                <input type="text" value="<?php echo $stud_part['fullname']; ?>" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Enter Fullname" required >
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" value="<?php echo $stud_part['username']; ?>" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" required >
                </div>              
                
                <div class="form-group">
                <label for="exampleInputEmail1">Select Gender <?php echo $stud_part['gender']; ?></label>
                <select class="form-control" name="gender">
										<option value="None"> --- Please Select Gender --- </option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
                    <option value="Others">Others</option>
									</select>    
              </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Phone No.</label>
                <input type="text" value="<?php echo $stud_part['phone']; ?>" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone No." required >
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Date Of Birth</label>
                <input type="date" value="<?php echo $stud_part['dob']; ?>" name="dob" class="form-control" id="exampleInputEmail1" placeholder="Enter DOB" required >
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" value="<?php echo $stud_part['email']; ?>" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required >
                </div>



                <div class="form-group">
                <label for="exampleInputEmail1">Permanent Address</label>
                <input type="text" value="<?php echo $stud_part['address']; ?>" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" required >
                </div>


                <div class="form-group">
                <label for="exampleInputEmail1">Fathers Name</label>
                <input type="text" value="<?php echo $stud_part['father_name']; ?>" name="fname" class="form-control" id="exampleInputEmail1" placeholder="Enter Fathers Name" required >
                </div>
              
    <!-- /.card-body   fullname,username,gender,phone,dob,email
    father_name, address, fname, focc, fphone, mname, mocc,
    -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fathers Occupation</label>
                    <input type="text" value="<?php echo $stud_part['father_occ']; ?>" name="focc" class="form-control" id="exampleInputEmail1" placeholder="Enter Fathers Occupation" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Fathers Phone No.</label>
                    <input type="text" value="<?php echo $stud_part['father_phone']; ?>" name="fphone" class="form-control" id="exampleInputEmail1" placeholder="Enter Fathers Phone" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mothers Name</label>
                    <input type="text" value="<?php echo $stud_part['mother_name']; ?>" name="mname" class="form-control" id="exampleInputEmail1" placeholder="Enter Mothers Name" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mothers Occupation</label>
                    <input type="text" value="<?php echo $stud_part['mother_occ']; ?>" name="mocc" class="form-control" id="exampleInputEmail1" placeholder="Enter Mothers Occupation" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mother Phone No.</label>
                    <input type="text" value="<?php echo $stud_part['mother_phone']; ?>" name="mphone" class="form-control" id="exampleInputEmail1" placeholder="Enter Mothers Phone" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">LGA</label>
                    <input type="text" value="<?php echo $stud_part['lga']; ?>" name="lga" class="form-control" id="exampleInputEmail1" placeholder="Enter LGA" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">State</label>
                    <input type="text" value="<?php echo $stud_part['state']; ?>" name="state" class="form-control" id="exampleInputEmail1" placeholder="Enter State" required >
                  </div>
    <!-- /.card-body   fullname,username,gender,phone,dob,email
    father_name, address, fname, focc, fphone, mname, mocc,mphone, lga, state, nation, class, add_date,
    -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Country</label>
                    <input type="text" value="<?php echo $stud_part['nationality']; ?>" name="nation" class="form-control" id="exampleInputEmail1" placeholder="Enter Country" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Class </label>
                    <input type="text" value="<?php echo $stud_part['class']; ?>" name="class" class="form-control" id="exampleInputEmail1" placeholder="Enter Class" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> Date of Admission</label>
                    <input type="date" value="<?php echo $stud_part['addmission_date']; ?>" name="add_date" class="form-control" id="exampleInputEmail1" placeholder="Enter Date of Admission" required >
                  </div>

                 
                 
                 

                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                     <!--  <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1"> -->
                      <label class="custom-control-label" for="exampleCheck1">I agree to the that the information that i gave  are correct
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
         
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
    <strong>Copyright &copy; <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>

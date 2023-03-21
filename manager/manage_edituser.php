<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
//include('../includes/image_upload_functions.php');
$pagetitle = "edituser";
?><?php include('includes/header.php'); ?>
 <?php admin_logged_in(); 
 
$user = get_user_i($_GET['pid']);
$user_part = mysqli_fetch_array($user);

 ?>


<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			
								  //$required_fields = array('memcode','firstname','lastname','email','temp_pass','phone','gender','address','city','state','bustop','country','sec_qst','sec_ans','payment_mtd','last_update','newsletter','time');
								 
			$required_fields = array('memcode','firstname','lastname','email','temp_pass','phone','gender','address','city','state','bustop','country','sec_qst','sec_ans','payment_mtd','last_update','newsletter','time');
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
				$memcode = stripslashes($_REQUEST['memcode']);
				$memcode = mysqli_real_escape_string($connection,$_POST['memcode']);
				$firstname = stripslashes($_REQUEST['firstname']);
				$firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
				$lastname= stripslashes($_REQUEST['lastname']);
				$lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$password = stripslashes($_REQUEST['temp_pass']);
				$password = mysqli_real_escape_string($connection,$_POST['temp_pass']);
				$phone= stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$city= stripslashes($_REQUEST['city']);
				$city = mysqli_real_escape_string($connection,$_POST['city']);
				$state = stripslashes($_REQUEST['state']);
				$state = mysqli_real_escape_string($connection,$_POST['state']);
				$bustop = stripslashes($_REQUEST['bustop']);
				$bustop = mysqli_real_escape_string($connection,$_POST['bustop']);
				$country= stripslashes($_REQUEST['country']);
				$country = mysqli_real_escape_string($connection,$_POST['country']);
				$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$payment_mtd = stripslashes($_REQUEST['payment_mtd']);
				$payment_mtd = mysqli_real_escape_string($connection,$_POST['payment_mtd']);
				$last_update= stripslashes($_REQUEST['last_update']);
				$last_update = mysqli_real_escape_string($connection,$_POST['last_update']);
				$newsletter = stripslashes($_REQUEST['newsletter']);
				$newsletter = mysqli_real_escape_string($connection,$_POST['newsletter']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);
				
				/*$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$dob = stripslashes($_REQUEST['dob']);
				$dob = mysqli_real_escape_string($connection,$_POST['dob']);
				$password = stripslashes($_REQUEST['password']);
				$password = md5(mysqli_real_escape_string($connection,$_POST['password']));
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);*/
				//$stid = mysql_prep($_GET['pid']);
						$stid = $_GET['pid'];


					/*"UPDATE newmember_tbl SET 
							username = '{$username}',
							email = '{$email}',
							phone = '{$phone}',
							address = '{$address}',
							image = '{$passport}'
						WHERE id = {$stid}";
						
				$required_fields = array('memcode','firstname','lastname','email','temp_pass','phone','gender','address','city','state','bustop','country','sec_qst','sec_ans','payment_mtd','last_update','newsletter','time');		
						*/
				$query = 	"UPDATE newmember_tbl SET 
						 memcode = '{$memcode}',
							firstname = '{$firstname}',
							lastname = '{$lastname}',
							email = '{$email}',
							temp_pass = '{$password}',
							phone = '{$phone}',
							gender = '{$gender}',
							address = '{$address}',
							city = '{$city}',
							state = '{$state}',
							bustop = '{$bustop}',
							country = '{$country}',
							sec_qst = '{$sec_qst}',
							sec_ans = '{$sec_ans}',
							payment_mtd = '{$payment_mtd}',
							last_update = '{$last_update}',
							newsletter = '{$newsletter}',
													
						 time = '{$time}'
						WHERE id = '{$stid}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Member data Successfully Updated !')</script>";
				redirect_to('manage_members');
					
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
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include ("includes/sidebar.php") ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Edit Users Info</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Users Info</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
               <!-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Full Form Repeater</h4>
                                <div class="repeater-default m-t-30">
                                    <div data-repeater-list="">
                                        <div data-repeater-item="">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="pwd">Password</label>
                                                        <input type="password" class="form-control" id="pwd" placeholder="Password">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="msg">Message</label>
                                                        <textarea class="form-control" id="msg" rows="1" placeholder="Message"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit">Submit
                                                        </button>
                                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light m-l-10" type="button">Delete Form
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                        </div>
                                    </div>
                                    <button data-repeater-create="" class="btn btn-info waves-effect waves-light">Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Users Info</h4>
								
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
                                <!--<form class="m-t-20" method="post" enctype="multipart/form-data">-->
						<form class="m-t-20" method="post" action="manage_edituser.php?pid=<?php echo $_GET["pid"]; ?>" enctype="multipart/form-data">		
								 <!-- <input type="hidden" class="form-control"  value="<?php //echo time(); ?>" name="time">-->
								 
                                    <div class="">
                                        <div class="form-group">
										<span>Memcode <em style="color:#FF0000;"><?php echo $user_part['memcode']; ?></em></span>
                                            <input type="text" class="form-control" name="memcode" value="<?php echo $user_part['memcode']; ?>" name="memcode" placeholder="Memcode">
                                        </div>
										
										 <div class="form-group">
										<span>First Name <em style="color:#FF0000;"><?php echo $user_part['firstname']; ?></em></span>
                                            <input type="text" class="form-control" name="firstname" value="<?php echo $user_part['firstname']; ?>" name="firstname" placeholder="First Name">
                                        </div>
										
                                        <?php /*?><div class="email-repeater form-group">
                                            <div data-repeater-list="repeater-group">
                                                <div data-repeater-item class="row m-b-15">
                                                    <div class="col-md-12">
                                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">Add Email
                                            </button>
                                        </div><?php */?>
										
                                        <div class="form-group">
										<span>Last Name <em style="color:#FF0000;"><?php echo $user_part['lastname']; ?></em></span>
                                            <input type="text" class="form-control" name="lastname" value="<?php echo $user_part['lastname']; ?>" placeholder="Last Name">
                                        </div>
										<div class="form-group">
										<span>Email <em style="color:#FF0000;"><?php echo $user_part['email']; ?></em></span>
                                            <input type="text" class="form-control" name="email" value="<?php echo $user_part['email']; ?>" placeholder="Email">
                                        </div>
										<div class="form-group">
										<span>Password <em style="color:#FF0000;"><?php echo $user_part['temp_pass']; ?></em></span>
                                            <input type="text" class="form-control" name="temp_pass" value="<?php echo $user_part['temp_pass']; ?>" placeholder="Password">
                                        </div>
										
										<div class="form-group">
										<span>phone  <em style="color:#FF0000;"><?php echo $user_part['phone']; ?></em></span>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $user_part['phone']; ?>" placeholder="phone">
                                        </div>
										<div class="form-group">
										<span>gender <em style="color:#FF0000;"><?php echo $user_part['gender']; ?></em></span>
                                            <input type="text" class="form-control" name="gender" value="<?php echo $user_part['gender']; ?>" placeholder="gender">
                                        </div>
										 
										<div class="form-group">
										<span>address  <em style="color:#FF0000;"><?php echo $user_part['address']; ?></em></span>
                                            <input type="text" class="form-control" name="address" value="<?php echo $user_part['address']; ?>" placeholder="address">
                                        </div>
										
										<div class="form-group">
										<span>city <em style="color:#FF0000;"><?php echo $user_part['city']; ?></em></span>
                                            <input type="text" class="form-control" name="city" value="<?php echo $user_part['city']; ?>" placeholder="city">
                                        </div>
                                       <div class="form-group">
										<span>state <em style="color:#FF0000;"><?php echo $user_part['state']; ?></em></span>
                                            <input type="text" class="form-control" name="state" value="<?php echo $user_part['state']; ?>" placeholder="state">
                                        </div>
										<div class="form-group">
										<span>bustop <em style="color:#FF0000;"><?php echo $user_part['bustop']; ?></em></span>
                                            <input type="text" class="form-control" name="bustop" value="<?php echo $user_part['bustop']; ?>" placeholder="bustop">
                                        </div>
										
										<div class="form-group">
										<span>city <em style="color:#FF0000;"><?php echo $user_part['country']; ?></em></span>
                                            <input type="text" class="form-control" name="country" value="<?php echo $user_part['country']; ?>" placeholder="city">
                                        </div>
										<div class="form-group">
										<span>sec_qst <em style="color:#FF0000;"><?php echo $user_part['sec_qst']; ?></em></span>
                                            <input type="text" class="form-control" name="sec_qst" value="<?php echo $user_part['sec_qst']; ?>" placeholder="sec_qst">
                                        </div>
										<div class="form-group">
										<span>sec_ans <em style="color:#FF0000;"><?php echo $user_part['sec_ans']; ?></em></span>
                                            <input type="text" class="form-control" name="sec_ans" value="<?php echo $user_part['sec_ans']; ?>" placeholder="sec_ans">
                                        </div>
										<div class="form-group">
										<span>payment_mtd <em style="color:#FF0000;"><?php echo $user_part['payment_mtd']; ?></em></span>
                                            <input type="text" class="form-control" name="payment_mtd" value="<?php echo $user_part['payment_mtd']; ?>" placeholder="payment_mtd">
                                        </div>
										<?php /*?>
								  //$required_fields = array('memcode','firstname','lastname','email','temp_pass','phone','gender','address','city','state','bustop','country','sec_qst','sec_ans','payment_mtd','last_update','newsletter','time');
								  <?php */?>
										<div class="form-group">
										<span>last_update <em style="color:#FF0000;"><?php echo $user_part['last_update']; ?></em></span>
                                            <input type="text" class="form-control" name="last_update" value="<?php echo $user_part['last_update']; ?>" placeholder="last_update">
                                        </div>
										<div class="form-group">
										<span>newsletter <em style="color:#FF0000;"><?php echo $user_part['newsletter']; ?></em></span>
                                            <input type="text" class="form-control" name="newsletter" value="<?php echo $user_part['newsletter']; ?>" placeholder="newsletter">
                                        </div>
										<div class="form-group">
										<span>time <em style="color:#FF0000;"><?php echo $user_part['time']; ?></em></span>
                                            <input type="text" class="form-control" name="time" value="<?php echo $user_part['time']; ?>" placeholder="time">
                                        </div>
										
										
                                        <div class="form-group">
                                            <!--<button class="btn btn-success waves-effect waves-light" type="submit">Submit
                                            </button>-->
											 <button type="submit" class="btn btn-success waves-effect waves-light" name="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   <?php /*?> <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Control Repeater</h4>
                                <form class="m-t-20">
                                    <div class="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                        <div class="email-repeater form-group">
                                            <div data-repeater-list="repeater-group">
                                                <div data-repeater-item class="row m-b-15">
                                                    <div class="col-md-10">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">Add More File
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="msg" rows="3" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success waves-effect waves-light" type="submit">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><?php */?>
                    <!--<div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dynamic Form Fields</h4>
                                <div id="education_fields" class=" m-t-20"></div>
                                <form class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Schoolname" name="Schoolname" placeholder="School Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Age" name="Age" placeholder="Age">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Degree" name="Degree" placeholder="Degree">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control" id="educationDate" name="educationDate">
                                                <option>Date</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="button" onClick="education_fields();"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by AdminBite admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="mdi mdi-star-circle font-20"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Dark Theme</label>
                        </div>
                        
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="sidebar-position" id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="header-position" id="header-position">
                            <label class="custom-control-label" for="header-position">Fixed Header</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a></li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="mailbox list-style-none m-t-20">
                        <li>
                            <div class="message-center chat-scroll">
                                <a href="javascript:void(0)" class="message-item" id='chat_user_1' data-user-id='1'>
                                    <span class="user-img"> <img src=" assets/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                    <span class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </span>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_2' data-user-id='2'>
                                    <span class="user-img"> <img src=" assets/images/users/2.jpg" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                    <span class="mail-contnet">
                                        <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </span>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_3' data-user-id='3'>
                                    <span class="user-img"> <img src=" assets/images/users/3.jpg" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
                                    <span class="mail-contnet">
                                        <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </span>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_4' data-user-id='4'>
                                    <span class="user-img"> <img src=" assets/images/users/4.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <span class="mail-contnet">
                                        <h5 class="message-title">Nirav Joshi</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </span>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_5' data-user-id='5'>
                                    <span class="user-img"> <img src=" assets/images/users/5.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <span class="mail-contnet">
                                        <h5 class="message-title">Sunil Joshi</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </span>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_6' data-user-id='6'>
                                    <span class="user-img"> <img src=" assets/images/users/6.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <span class="mail-contnet">
                                        <h5 class="message-title">Akshay Kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </span>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_7' data-user-id='7'>
                                    <span class="user-img"> <img src=" assets/images/users/7.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <span class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </span>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id='chat_user_8' data-user-id='8'>
                                    <span class="user-img"> <img src=" assets/images/users/8.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <span class="mail-contnet">
                                        <h5 class="message-title">Varun Dhavan</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </span>
                                </a>
                                <!-- Message -->
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Tab 2 -->
                <!-- Tab 3 -->
                <div class="tab-pane fade p-15" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h6 class="m-t-20 m-b-20">Activity Timeline</h6>
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src=" assets/images/users/2.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src=" assets/images/users/1.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src=" assets/images/users/4.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src=" assets/images/users/6.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src=" assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src=" assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src=" assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src=" dist/js/app.min.js"></script>
    <script src=" dist/js/app.init.horizontal-fullwidth.js"></script>
    <script src=" dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src=" assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src=" assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src=" dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src=" dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src=" dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src=" assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <script src=" assets/extra-libs/jquery.repeater/repeater-init.js"></script>
    <script src=" assets/extra-libs/jquery.repeater/dff.js"></script>
</body>

</html>
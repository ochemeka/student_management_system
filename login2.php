<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>

<?php 
include("includes/image_upload_functions.php") ?>

<?php
$pagetitle="Register"; ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}


?>
<?php
	
	if (logged_in()) {
		redirect_to(SITE_PATH."dashboard");
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
		$pass = stripslashes($_REQUEST['password']);
		$pass = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_password = md5($password);
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT id, email, password, status ";
			$query .= "FROM student_tbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "AND password = '{$hashed_password}' AND status=1 ";
			$query .= " LIMIT 1";
			//$query = ("SELECT adm_id, adm_username,adm_password, adm_status FROM admintbl WHERE adm_username='".$username."' AND adm_password='".$password."' AND adm_status='1', LIMIT 1");
			$result_set = mysqli_query($connection,$query);
			//confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
				$found_user = mysqli_fetch_array($result_set);
				$_SESSION['user_id'] = $found_user['id'];
				$_SESSION['username'] = $found_user['email'];
				$_SESSION['status'] = $found_user['status'];
				
				
				 //header("Location: dashboard");
				redirect_to(SITE_PATH."dashboard");
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

<?php


$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('username','email','address','phone','gender','password');
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
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
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
			$query .= "FROM student_tbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
			
							// username/password combo was not found in the database
				$errors[] = "Email Already Used";
		
}
	 else {
						
				$query1 = "INSERT INTO student_tbl (
						username, email, address, phone, gender, password, temp_pass, image
						) VALUES (
						'{$username}', '{$email}', '{$address}','{$phone}','{$gender}','{$pass}','{$temp_pass}','{$passport}')";

				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
					
				
 	$to = "{$email}";
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
	Your account has been created, you can login with the following credentials tp place your reservation
	
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

    mail($to, $subject, $message, $headers);
					// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Account created successfully Login to Place Reservation!')</script>";
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration and login Form</title>
    <!-- For google icons  -->
    <script src="https://kit.fontawesome.com/667417c7ec.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: rgb(99, 140, 187);
            background: radial-gradient(circle, rgb(10, 51, 98) 54%, rgba(10, 3, 60, 0.97) 100%);
            background-repeat: no-repeat;
            background-size: cover;
            padding: 0;
            margin: 0;
            height: 100vh;
            width: 100vw;
            font-family: Arial, Helvetica, sans-serif
        }
        
        .container {
            background-color: white;
            width: 380px;
            margin: auto;
            height: 500px;
            position: relative;
            top: 12.5vh;
            border-radius: 25px;
            box-shadow: 0 0 10px black;
        }
        
        #account {
            position: relative;
            top: -60px;
            margin: auto;
            left: calc(50% - 74px);
            border-radius: 18px;
            border-bottom-right-radius: 100px;
            border-bottom-left-radius: 100px;
            background: rgb(99, 140, 187);
            background: radial-gradient(circle, rgb(10, 51, 98) 54%, rgba(10, 3, 60, 0.97) 100%);
            background-repeat: no-repeat;
            color: #e1cfcf;
            font-size: 90px;
            padding: 19px;
            box-shadow: 0 0 5px black;
        }
        
        .tabs {
            display: flex;
            position: relative;
            top: -25px;
            justify-content: center;
            color: rgb(73, 71, 71);
            height: 25px;
        }
        
        .reg-tab,
        .login-tab {
            width: 50%;
            text-align: center;
            padding-bottom: 10px;
            margin: auto 25px;
            cursor: pointer;
        }
        
        .reg-tab:hover,
        .login-tab:hover {
            color: rgb(10, 51, 98);
            border-bottom: 4px solid rgb(10, 51, 98);
        }
        
        .active {
            color: rgb(10, 51, 98);
            border-bottom: 4px solid rgb(10, 51, 98);
        }
        
        #login-form {
            display: block;
            padding-top: 25px;
        }
        
        #registration-form {
            display: none;
        }
        
        .msg {
            visibility: hidden;
            margin: 1px;
            text-align: center;
            color: red;
        }
        
        form {
            width: 90%;
            margin: 15px auto;
            display: flex;
            flex-direction: column;
        }
        
        input {
            height: 27px;
            margin: 5px;
            border-radius: 15px;
            border: none;
            outline: none;
            padding: 5px;
            font-size: 17px;
            text-align: center;
            background-color: rgb(209, 209, 209);
            color: rgb(73, 73, 73);
        }
        
        .tnc {
            display: flex;
            align-items: center;
            margin: auto;
            color: rgb(54, 52, 52);
        }
        
        p {
            margin: 0;
            padding: 0;
        }
        
        .options {
            display: flex;
            align-items: center;
            font-style: italic;
            margin-top: 25px;
        }
        
        .remember {
            display: flex;
            align-items: center;
            width: 50%;
            text-align: center;
        }
        
        .options a {
            width: 50%;
            text-align: center;
            text-decoration: none;
        }
        
        button {
            margin: 20px auto;
            font-size: 20px;
            color: white;
            background-color: rgb(10, 51, 98);
            border: none;
            padding: 10px 45px;
            text-align: center;
            border-radius: 18px;
            cursor: pointer;
            box-shadow: 0 0 2px rgb(117, 113, 113);
        }
        
        button:hover {
            background-color: rgba(0, 81, 255, 0.781);
        }

        /* making design responsive */
        @media screen and (max-width:600px) {
            .container{
                width: 90%;
            }
        }
        @media screen and (max-width:350px) {
            .container{
                width: 320px;
            }
        }
    </style>

</head>

<body>
    <div class="container">

        <i id='account' class="fas fa-users"></i>
        <div class="tabs">
            <h2 class='reg-tab' id="reg-tab">Register</h2>
            <h2 class='login-tab active' id="login-tab">Login</h2>
        </div>

        <div id="login-form">
           <form method="post" action="" enctype="multipart/form-data" class="contact-form">
             <?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>
             
                <input type="text" name="username" id="username" placeholder="username" required />
                <input type="password" name="pass" id="pass" placeholder="password" required />
                <div class="options">
                    <div class="remember">
                        <input type="checkbox" name="submit" id="rem">
                        <p>Remember Me</p>
                    </div>
                    <a href="#">Forget Password ?</a>
                </div>
                <button name="login" type="submit">Login</button>
            </form>
        </div>

        <div id="registration-form">
           
           <form method="post" action="" enctype="multipart/form-data" class="contact-form">
             <?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>
             
                <input type="text" name="username" id="username" placeholder="username" required />
                <input type="password" name="pass" id="pass" placeholder="password" required />
                <div class="options">
                    <div class="remember">
                        <input type="checkbox" name="submit" id="rem">
                        <p>Remember Me</p>
                    </div>
                    <a href="#">Forget Password ?</a>
                </div>
                <button name="submit" type="submit">Login</button>
            </form>
            
           <?php /*?><form method="post" action="" enctype="multipart/form-data" class="contact-form">
             <?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>
           
                <p class="msg">Password didnot match !!!</p>
                <input type="text" name="fullname" id="fullname" placeholder="fullname" required />
                <input type="text" name="username" id="username" placeholder="username" required />
                <input type="email" name="email" id="email" placeholder="email" required />
                <input type="text" name="phone" id="phone" placeholder="phone" required />
                <input type="password" name="pass" id="pass" placeholder="password" required />
                <input type="password" name="confirm-pass" id="confirm-pass" placeholder=" confirm password" required />
                <div class="tnc">
                    <input type="checkbox" name="accept" id="accept">
                    <p>I accept the <a href="#">Terms & Conditions</a></p>
                </div>
                <button id="create" type="submit">Register</button>
            </form><?php */?>
        </div>

    </div>
    <script>
        const reg_form = document.querySelector("#registration-form")
        const login_form = document.querySelector("#login-form")

        const reg_tab = document.querySelector("#reg-tab")
        const login_tab = document.querySelector("#login-tab")

        const pass = document.querySelector('#pass')
        const confirm_pass = document.querySelector('#confirm-pass')
        const msg = document.querySelector('p')
        const btn = document.querySelector('#create')

        reg_tab.addEventListener('click', (e) => {
            login_form.style.display = 'none';
            reg_form.style.display = 'block';
            reg_tab.classList.add('active')
            login_tab.classList.remove('active')
        })
        login_tab.addEventListener('click', (e) => {
            login_form.style.display = 'block';
            reg_form.style.display = 'none';
            reg_tab.classList.remove('active')
            login_tab.classList.add('active')
        })



        btn.addEventListener('click', (e) => {
            if (pass.value != confirm_pass.value) {
                e.preventDefault();
                msg.style.visibility = "visible"
            } else {
               // alert('user registered sucessfully')
            }

        })
    </script>
</body>

</html>
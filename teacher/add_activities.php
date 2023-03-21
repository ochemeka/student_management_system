<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php teacher_logged_in(); ?>
<?php
$pagetitle="Add Activities"; 

$score = get_scores11('$score');
$scorepart = mysqli_fetch_array($score);


// $member = get_teacher_id($_SESSION['username']);
// $teachpart = mysqli_fetch_array($member);

//get_scores11($score){



?>
<?php 
if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			//test1, test2,  exams,student,subject,average,grade // present,absent,classno,schopen,comment,gender  
			$required_fields = array('test1','test2','exams','student','class','session','subject',
                'present','absent','classno','schopen','comment','gender','term');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
						
			if (empty($errors)) {
				// Perform Inssert
				//$passport = $db_images;
            //    $userid = $_SESSION['t_name'];
				$test1 = stripslashes($_REQUEST['test1']);
				$test1 = mysqli_real_escape_string($connection,$_POST['test1']);        
        $test2 = stripslashes($_REQUEST['test2']);
				$test2 = mysqli_real_escape_string($connection,$_POST['test2']);        
        $exams = stripslashes($_REQUEST['exams']);
				$exams = mysqli_real_escape_string($connection,$_POST['exams']);				
       	$student = stripslashes($_REQUEST['student']);
				$student = mysqli_real_escape_string($connection,$_POST['student']);        
        $class = stripslashes($_REQUEST['class']);
				$class = mysqli_real_escape_string($connection,$_POST['class']);				
        $subject = stripslashes($_REQUEST['subject']);
				$subject = mysqli_real_escape_string($connection,$_POST['subject']);
       
       // present,absent,classno,schopen,comment,gender  
        $present = stripslashes($_REQUEST['present']);
				$present = mysqli_real_escape_string($connection,$_POST['present']);				
        $absent = stripslashes($_REQUEST['absent']);
				$absent = mysqli_real_escape_string($connection,$_POST['absent']);
        $classno = stripslashes($_REQUEST['classno']);
				$classno = mysqli_real_escape_string($connection,$_POST['classno']);				
        $schopen = stripslashes($_REQUEST['schopen']);
				$schopen = mysqli_real_escape_string($connection,$_POST['schopen']);
        $comment = stripslashes($_REQUEST['comment']);
				$comment = mysqli_real_escape_string($connection,$_POST['comment']);				
        $gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);



        $term = stripslashes($_REQUEST['term']);
				$term = mysqli_real_escape_string($connection,$_POST['term']);
        $sec = stripslashes($_REQUEST['session']);
				$sec = mysqli_real_escape_string($connection,$_POST['session']);
        
        $grade = stripslashes($_REQUEST['grade']);
	    $grade = mysqli_real_escape_string($connection,$_POST['grade']);
       $total = stripslashes($_REQUEST['total']);
		$total = mysqli_real_escape_string($connection,$_POST['total']);
    

      //$studemail = $studpart['email'];
      //$studname = $studpart['fname'];
      
      
    //     $total = $test1 + $test2 + $exams ; 
        
    //     $average =  $total/3 ;
        
    //    if($total > "69-100"){
	// 			$grade = "A";
	// 		}
	// 		elseif($total > "60-68"){
	// 			$grade = "B";
	// 		}
	// 		elseif($total > "55-59"){
	// 			$grade = "C";
	// 		}
    //   elseif($total > "45-54"){
	// 			$grade = "D";
	// 		}
    //   elseif($total > "30-44"){
	// 			$grade = "E";
	// 		}
    //   elseif($total > "0-29"){
	// 			$grade = "F";
	// 		}



                //UPDATE roomtbl SET 
				$query = "UPDATE scores SET (
			 class,	 stud_email, test1, test2, exams, total, subject, average, grade, term, session, 
       time_present, time_absent, class_num, time_sch_open, teacher_comm, stud_gender
						) VALUES (
           '{$class}', '{$student}', '{$test1}', '{$test2}', '{$exams}', '{$total}','{$subject}',  '{$average}',
         '{$grade}',  '{$term}', '{$sec}', '{$present}', '{$absent}', '{$classno}', '{$schopen}', '{$comment}',
          '{$gender}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Successfully !')</script>";
					redirect_to('manage_scores.php');
					
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

<?php include("includes/head_2.php");  ?>
  <!-- Main Sidebar Container -->
  <?php include("includes/sidebar.php");  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Add Score</span>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
               <!-- Summary Note -->
              </h3>
            </div>
            <!-- /.card-header -->

            <form method="post" action="" enctype="multipart/form-data">
              <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			echo $msg="Update Successful";
			}
			?>
<div class="card-body">
   <div class="form-group">
   <div class="d-flex">
   <div class="col-6">

        <label for="exampleInputEmail1">First Test Score:</label><?php echo $scorepart['test1'];?>
        <input name="test1" type="text" value="<?php echo $scorepart['test1'];?>" placeholder=" Enter First Test Score" class="form-control" />
        
        <label for="exampleInputEmail1">Second Test Score:</label>
         <input name="test2" type="text" value="0" placeholder=" Enter Second Test Score" class="form-control" />
        
        <label for="exampleInputEmail1">Exams Score:</label>
         <input name="exams" type="text" value="0" placeholder=" Enter Exams Score" class="form-control" />

    
       
              
              <label style="color:#000;"><span>Select Academic Session </span></label>
              <select type="text" class="form-control"  placeholder="Enter Name" name="session">
                  <!-- <option value="0">Select Academic Session</option> -->
                  <?php  													
											$query = "SELECT * from session WHERE status = 1 order by id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";
											}
											?>
                  </select>
                  



                  <div class="form-group">
                    
                  <label style="color:#000;"><span>Select Student </span></label>&nbsp;(Primary Section)
              <select type="text" class="form-control"  placeholder="Enter Name" name="student">
                  <option value="0">Select Student</option>
                  <?php  													
											$query = "SELECT * from student_tbl WHERE class_id = 1 order by stud_id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[email]>$cat_set[fname]&nbsp;$cat_set[lname]</option>";
											}
                      
											?>
                  </select>
                  
                  
                </div>

                <label style="color:#000;"><span>Select Term </span></label>
                    <select type="text" class="form-control"  placeholder="Enter Name" name="term">
                  <option value="0">Select Term</option>
                  <?php  													
											$query = "SELECT * from current_term WHERE status = 1 order by id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[c_term]>$cat_set[c_term]</option>";
											}
											?>
                  </select>



                <div class="form-group">
                    
                    <label style="color:#000;"><span>Select Class </span></label>
                    <select type="text" class="form-control"  placeholder="Enter Name" name="class">
                  <option value="0">Select Class</option>
                  <?php  													
											$query = "SELECT * from class_tbl WHERE class_status = 1  order by class_id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[class_title]>$cat_set[class_title]</option>";
											}
											?>
                  </select>
                  </div>
  


</div>
                <!-- <label for="exampleInputEmail1">Student Name:</label>
        <p>  <input name="student" type="text" value="" placeholder=" Enter of student" class="form-control" /> </p> -->


                <!-- <label style="color:#000;"><span>Select Term </span></label>
                  <select type="text" class="form-control"  placeholder="Select Subject Type" name="term">
                      <option value="0">Select Term</option>
                      <option value="First &nbsp; Term">First Term</option>
                            <option value="Second &nbsp; Term">Second Term</option>
                            <option value="third &nbsp; Term">Third Term</option>
                         </select> -->
<div class="col-6">
                             <div class="form-group">
                    
                    <label style="color:#000;"><span>Select Subjects </span></label>
                    <select type="text" class="form-control"  placeholder="Enter Name" name="subject">
                  <option value="0">Select Subject</option>
                  <?php  													
											$query = "SELECT * from allsubject order by sub_id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[sub_name]>$cat_set[sub_name]</option>";
											}
											?>
                  </select>
                  </div>

              
                   <label for="exampleInputEmail1">No. of Times Student is Present:</label>
        <input name="present" type="text" value="" placeholder="No. of Times Present For Term" class="form-control" />
        
                   <label for="exampleInputEmail1">No. of Times Student Is Absent:</label>
          <input name="absent" type="text" value="" placeholder="No. of Times Absent For Term" class="form-control" />    
       
          
          <label for="exampleInputEmail1">No. of pupils in class</label>     
          <input name="classno" type="text" value="" placeholder="No. in class" class="form-control" />    
                
          <label for="exampleInputEmail1">No. of times school opened</label>     
          <input name="schopen" type="text" value="00" placeholder="No. of Times School Opened" class="form-control" />    

          <label for="exampleInputEmail1">Techers Comment</label>     
          <input name="comment" type="text" value="" placeholder="No. of Times Present For Term" class="form-control" />    

          <label for="exampleInputEmail1">Student Gender</label> 
          <select type="text" class="form-control"  placeholder="Student Gender" name="gender">
              <option value="0">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              
          </select>
     
          
             
</div>
  </div>                      <!-- <div class="card-body">
  
  <textarea name="descr" placeholder="Type your Text here" id="summernote">
<em>  Type your text here</em> 
  Type <em>some</em> <u>text</u> <strong>here</strong>
  </textarea>
</div>     -->
                  <!-- <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div> -->
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" value="submit" class="btn btn-primary col-12" name="submit">Submit</button>
                </div>
              </form>

            <?php /*?>       
            <form method="post" action="" enctype="multipart/form-data">
              <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			echo $msg="Update Successful";
			}
			?>


                <div class="card-body">
                  <div class="form-group">
                     <!-- <input name="t_name" type="text" value="" placeholder="Name of Teacher" class="form-control" /> -->
                     
                 <label>Subject Name</label>
                    <input name="tit" type="text" value="" placeholder=" Enter Subject name" class="form-control" />
                  <br />
                  
                  
                    <label style="color:#000;"><span>Select Subject Type </span></label>
                  	<select type="text" class="form-control"  placeholder="Select Subject Type" name="s_type">
                      <option value="0">Select Subject Type</option>
                            <option value="Pratical">Pratical</option>
                            <option value="Theory">Theory</option>
                            <option value="Others">Others</option>
                           
                         </select>
                        </div>

<!--  -->
<!-- <div class="card-body">
  
              <textarea name="descr" placeholder="Type your Text here" id="summernote">
            <em>  Type your text here</em> 
              Type <em>some</em> <u>text</u> <strong>here</strong>
              </textarea>
            </div>  -->
<!--  -->
                  
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Enter Text</label>
               <input name="pass_nw2" type="text" placeholder="Enter New Password" class="form-control"/>   
                  </div> -->
                  
    
                 
</form>
                </div>
                  
                </div>
                <!-- /.card-body -->

             <div class="card-footer">
                <button type="submit" value="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form><?php */?>

            <!-- <div class="card-footer">
              Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
      <?php /*?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                CodeMirror
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <textarea id="codeMirrorDemo" class="p-3">
<div class="info-box bg-gradient-info">
  <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Bookmarks</span>
    <span class="info-box-number">41,410</span>
    <div class="progress">
      <div class="progress-bar" style="width: 70%"></div>
    </div>
    <span class="progress-description">
      70% Increase in 30 Days
    </span>
  </div>
</div>
              </textarea>
            </div>
            <div class="card-footer">
              Visit <a href="https://codemirror.net/">CodeMirror</a> documentation for more examples and information about the plugin.
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
<?php */?>
      <!-- ./row -->
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>

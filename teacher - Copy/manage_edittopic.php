<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php include('../includes/image_upload_functions.php');?>
<?php
teacher_logged_in();
$pagetitle="Add Topic"; 

$syl = get_syllabus($_GET['syllabus']);
$syl_part = mysqli_fetch_array($syl);

// $member = get_teacher_id($_SESSION['username']);
// $teachpart = mysqli_fetch_array($member);



?>

<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('topic','class','subject','term','teacher','week','descr');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
                $passport = $db_images;
                //          //topic,class,subject,term,descr,    
                $title = stripslashes($_REQUEST['topic']);
                $title = mysqli_real_escape_string($connection,$_POST['topic']);

                $class = stripslashes($_REQUEST['class']);
                $class = mysqli_real_escape_string($connection,$_POST['class']);

                $teacher = stripslashes($_REQUEST['teacher']);
                $teacher = mysqli_real_escape_string($connection,$_POST['teacher']);

                $subject = stripslashes($_REQUEST['subject']);
                $subject = mysqli_real_escape_string($connection,$_POST['subject']);

                $term = stripslashes($_REQUEST['term']);
                $term = mysqli_real_escape_string($connection,$_POST['term']);

                $week = stripslashes($_REQUEST['week']);
                $week = mysqli_real_escape_string($connection,$_POST['week']);

                $description = stripslashes($_REQUEST['descr']);
                $description = mysqli_real_escape_string($connection,$_POST['descr']);
				$id = $_GET['syllabus'];
				
				
				//'{$class}', '{$subject}', '{$teacher}', '{$title}',
                // '{$passport}', '{$week}', '{$term}', '{$description}')";
				$query = 	"UPDATE school_syllabus SET 
						 class  = '{$class}',
                         sub_name  = '{$subject}',
						 sub_teacher  = '{$teacher}',
                         title  = '{$title}',
						 files  = '{$passport}',
                         week  = '{$week}',
						 term  = '{$term}',
						 sub_desc  = '{$description}'
						WHERE id = '{$id}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
                    echo "<script type='text/javascript'>alert('Topic  successfully Updated!')</script>";
				redirect_to('manage_topic.php');
					
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
<?php 
// if (isset($_POST['submit'])) {
// $errors = array();
// $db_images = "";

// 			//topic,class,subject,term,descr,
// 			$required_fields = array('topic','class','subject','term','teacher','week','descr');
// 			foreach($required_fields as $fieldname) {
// 				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
// 					$errors[] = $fieldname; 
// 				}
// 			}
// 			include("../includes/image_upload_app1.php");
// 			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }
      
						
// 			if (empty($errors)) {
// 				// Perform Inssert
// 				$passport = $db_images;
//          //topic,class,subject,term,descr,    
// 				$title = stripslashes($_REQUEST['topic']);
// 				$title = mysqli_real_escape_string($connection,$_POST['topic']);
        
//         $class = stripslashes($_REQUEST['class']);
// 				$class = mysqli_real_escape_string($connection,$_POST['class']);
        
//         $teacher = stripslashes($_REQUEST['teacher']);
// 				$teacher = mysqli_real_escape_string($connection,$_POST['teacher']);
				
//             $subject = stripslashes($_REQUEST['subject']);
// 				$subject = mysqli_real_escape_string($connection,$_POST['subject']);

//         $term = stripslashes($_REQUEST['term']);
// 				$term = mysqli_real_escape_string($connection,$_POST['term']);

//         $week = stripslashes($_REQUEST['week']);
// 				$week = mysqli_real_escape_string($connection,$_POST['week']);

// 				$description = stripslashes($_REQUEST['descr']);
// 				$description = mysqli_real_escape_string($connection,$_POST['descr']);
				
       
			
				
		/*		$query = "INSERT INTO school_syllabus ( 
				      	class, sub_name, sub_teacher,title, files, week, term, sub_desc
						) VALUES (
          '{$class}', '{$subject}', '{$teacher}', '{$title}', '{$passport}', '{$week}', '{$term}', '{$description}')"; */
         
// 				$result = mysqli_query($connection,$query);
// 				if ($result) {
// 				echo "<script type='text/javascript'>alert('Topic  successfully added!')</script>";
// 					redirect_to('manage_topic.php');
					
// 				} else {
// 					// Display error message.
// 					echo "<p>Subject creation failed.</p>";
// 					echo "<p>" . mysqli_error($connection) . "</p>";
// 				}

// 				} 
// 			else {
// 				// Errors occurred
// 				$message = "There were " . count($errors) . " errors in the form.";
// 			}
			
			


// } // end: if (isset($_POST['submit']))
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
            <span>Add Topics</span>
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
            <!-- /.card-header --> <!-- <a href="manage_edittopic.php?topic=<?php //echo $row['id']; ?>">Edit</a> -->

            <form method="post" action="manage_edittopic.php?syllabus=<?php echo $_GET["syllabus"]; ?>" enctype="multipart/form-data">
            

              <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			echo $msg="Update Successful";
			}
			?>
<div class="card-body">

<div class="d-flex">
   <div class="col-6">

<div class="form-group">
        <label for="exampleInputEmail1">Topic:&nbsp;<span style="color:#F00;"><?php echo $syl_part['title'];?></span></label>
        <input name="topic" type="text" value="<?php echo $syl_part['title'];?>" placeholder=" Enter Topic Name" class="form-control" required />

        <label for="exampleInputEmail1">Teacher's Name:</label>
        <input name="teacher" type="text" readonly value="<?php echo $syl_part['sub_teacher'];?>" placeholder=" Enter Topic name" class="form-control" required />

        <label style="color:#000;">Select Class:<span style="color:#F00;">&nbsp;<?php echo $syl_part['class'];?> </span></label>
                      <select type="text" class="form-control" value="<?php echo $syl_part['class'];?>"  placeholder="Enter Name" name="class">
                    <option value="0">Select Class</option>
                    <?php  													
                        $query = "SELECT * from class_tbl WHERE class_status = 1  order by class_id";
                        $result = mysqli_query($connection,$query);
                        while($cat_set=mysqli_fetch_array($result)) {
                        echo "<option value=$cat_set[class_title]>$cat_set[class_title]</option>";
                        }
                        ?>
                    </select>

                    <!-- <input name="subject" type="text" value="<?php //echo $syl_part['sub_name'];?>" placeholder=" Enter Subject name" class="form-control" required /> -->
        <label style="color:#000;">Select Subjects;&nbsp; <span style="color:#F00;"><?php echo $syl_part['sub_name'];?></span></label>
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
 </div>  
 <div class="col-6">
                <div class="form-group">

                <label style="color:#000;"><span>Select Term; &nbsp; <span style="color:#F00;"><?php echo $syl_part['term'];?> </span></label>
                      <select type="text" class="form-control"  placeholder="Enter Name" name="term">
                    <option value="0">Select Term</option>
                    <?php  													
                        $query = "SELECT * from current_term WHERE status != 7 order by id";
                        $result = mysqli_query($connection,$query);
                        while($cat_set=mysqli_fetch_array($result)) {
                        echo "<option value=$cat_set[c_term]>$cat_set[c_term]</option>";
                        }
                        ?>
                    </select>
 <label style="color:#000;">Select week ; &nbsp; <span style="color:#F00;"><?php echo $syl_part['week'];?></label>
                      <select type="text" class="form-control"  placeholder="Enter Name" name="week">
                    <option value="0">Select Term</option>
                    <?php  													
                        $query = "SELECT * from weektbl WHERE status = 1 order by weekid";
                        $result = mysqli_query($connection,$query);
                        while($cat_set=mysqli_fetch_array($result)) {
                        echo "<option value=$cat_set[title]>$cat_set[title]</option>";
                        }
                        ?>
                      </select>


                <label for="exampleInputEmail1"> Decription: &nbsp; <span style="color:#F00;"><?php echo $syl_part['sub_desc'];?></label>
                <input name="descr" type="text" value="<?php echo $syl_part['sub_desc'];?>" placeholder="Enter Description" class="form-control" required />  
               
               
               
                <label for="exampleInputEmail1">Upload File:</label>
                <input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
                   
                  </div>
    
                  <!-- <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div> -->
</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex">
                <button type="reset"  class="btn btn-primary col-6" name="reset">Reset</button>&nbsp;&nbsp;&nbsp;
                <button type="submit" value="submit" class="btn btn-primary col-6" name="submit">Submit</button>
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

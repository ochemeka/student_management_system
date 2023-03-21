<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); 
include('../includes/image_upload_functions.php');?>
<?php
teacher_logged_in();
$pagetitle="Add Class"; 
$member = get_teacher_id($_SESSION['t_username']);
$teachpart = mysqli_fetch_array($member);

?>
<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('tit','description');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			// include("../includes/image_upload_app1.php");
			// if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				
        //$userid = $_SESSION['t_name'];
        //$passport = $db_images;
				$title = stripslashes($_REQUEST['tit']);
				$title = mysqli_real_escape_string($connection,$_POST['tit']);
        
				$description = stripslashes($_REQUEST['description']);
				$description = mysqli_real_escape_string($connection,$_POST['description']);
				
				// $s_type = stripslashes($_REQUEST['s_type']);
				// $s_type = mysqli_real_escape_string($connection,$_POST['s_type']);

				// $memcode = stripslashes($_REQUEST['mcode']);
				// $memcode = mysqli_real_escape_string($connection,$_POST['mcode']);

        //         $stu_class = stripslashes($_REQUEST['class']);
				// $stu_class = mysqli_real_escape_string($connection,$_POST['class']);

                //function random_strings($length_of_string) { 
						
					// sha1 the timstamps and returns substring 
				// 	// of specified length 
				// 	return substr(sha1(time()), 0, $length_of_string); 
				// } 
				
				// // This function will generate 
				// // Random string of length 10 
				// $memcode = random_strings(5); 

					/*"
					*/
				$query = "INSERT INTO class_tbl (
						class_title, class_desc, class_image
						) VALUES (
             '{$title}', '{$description}', '{$passport}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Class added successfully !')</script>";
					redirect_to('manage_class.php');
					
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
            <span>Add Subject</span>
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
   <label for="exampleInputEmail1">No. of Times Student is Present:</label>
        <input name="tit" type="text" value="" placeholder="No. of Times Present For Term" class="form-control" />
        
       
        <div class="form-group">
        <label for="exampleInputEmail1">No. of Times Student Is Absent:</label>
          <input name="tit" type="text" value="" placeholder="No. of Times Absent For Term" class="form-control" />    
       
          
          <label for="exampleInputEmail1">No. of pupils in class</label>     
          <input name="tit" type="text" value="" placeholder="No. of Times Present For Term" class="form-control" />    
                
          <label for="exampleInputEmail1">No. of times school opened</label>     
          <input name="tit" type="text" value="00" placeholder="No. of Times Present For Term" class="form-control" />    

          <label for="exampleInputEmail1">Techers Comment</label>     
          <input name="tit" type="text" value="" placeholder="No. of Times Present For Term" class="form-control" />    


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" value="submit" class="btn btn-primary" name="submit">Submit</button>
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

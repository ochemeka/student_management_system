<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
teacher_logged_in();
$pagetitle="Edit Subject"; 
//$member = get_teacher_id($_SESSION['t_username']);
//$teachpart = mysqli_fetch_array($member);

$sub = get_subjectad($_GET["sub"]);
$sub_part = mysqli_fetch_array($sub);

// $catid = get_category();
// $cat_part = mysqli_fetch_array($catid);
?>
<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
      $required_fields = array('title','subcat_id','sub_code','cat_id','descr','week');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
		//	include("../includes/image_upload_app1.php");
		//	if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				//$userid = $_SESSION['t_name'];
				$title = stripslashes($_REQUEST['title']);
				$title = mysqli_real_escape_string($connection,$_POST['title']);
        
				$subcat_id = stripslashes($_REQUEST['subcat_id']);
				$subcat_id = mysqli_real_escape_string($connection,$_POST['subcat_id']);

        $description = stripslashes($_REQUEST['descr']);
				$description = mysqli_real_escape_string($connection,$_POST['descr']);
				
				$cat_id = stripslashes($_REQUEST['cat_id']);
				$cat_id = mysqli_real_escape_string($connection,$_POST['cat_id']);
        

				$memcode = stripslashes($_REQUEST['sub_code']);
				$memcode = mysqli_real_escape_string($connection,$_POST['sub_code']);

          $week = stripslashes($_REQUEST['week']);
				  $week = mysqli_real_escape_string($connection,$_POST['week']);
				
				$id = $_GET["sub"];
				
			//	 '{$userid}', '{$title}', '{$memcode}', '{$description}','{$stu_class}','{$s_type}')";
				$query = 	"UPDATE subjects SET 
						 cat_id  = '{$cat_id }',
             subcat_id = '{$subcat_id}',
             subject_title  = '{$title }',
             sub_code = '{$memcode}',
             description = '{$description}',
             week = '{$week}'
						WHERE subject_id = '{$id}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Updating Editcategory Successfull !')</script>";			
				redirect_to('manage_subject.php');
					
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
           Currently Editing: &nbsp; <strong><span  style="color:#000099;"><?php echo $sub_part['subject_title'];?></span></strong>  
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

            <form method="post" action="manage_editsubject.php?sub=<?php echo $_GET["sub"]; ?>" enctype="multipart/form-data">

              <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			echo $msg="Update Successful";
			}
			?>
<div class="card-body">
   <div class="form-group">
   <div class="form-group">
     
                   <label ><span style="color:#f30;">Category: <?php //echo $sub_part['cat_id'];?> </span></label>
                   <br /> 
                   
                   <input name="cat_id" type="text" value="<?php echo $sub_part['cat_id'];?>" placeholder=" Enter Subject Code eg MAT 101" class="form-control" readonly />
   
          <label ><span style="color:#f30;">Sub Category: <?php //echo $sub_part['cat_id'];?> </span></label>
          <input name="subcat_id" type="text" value="<?php echo $sub_part['subcat_id'];?>" placeholder=" Enter Subject Code eg MAT 101" class="form-control" readonly />
      
      
      
        <label for="exampleInputEmail1">Title:</label>
        <input name="title" type="text" readonly value="<?php echo $sub_part['subject_title'];?>" placeholder=" Enter Subject name" class="form-control" />
        
               
        <div class="form-group">
                
            <label for="exampleInputEmail1">Subject code:</label>    
            <input name="sub_code" readonly  type="text" value="<?php echo $sub_part['sub_code'];?>" placeholder=" Enter Subject Code eg MAT 101" class="form-control" />
            </div>

            <input name="week" readonly  type="text" value="<?php echo $sub_part['week'];?>" placeholder=" Enter Subject Code eg MAT 101" class="form-control" />        
                   
                    <div class="form-group">
                

                
            
                   <br />
                  
              </div>
  


  <!-- <div class="card-body">
  
                        <label for="exampleInputEmail1">Subject code:</label>    
            <input name="descr"   type="text" value="<?php //echo $sub_part['description'];?>" placeholder=" Enter Subject Code eg MAT 101" class="form-control" />
            
</div>     -->
<div class="card-body">
  
              <textarea name="descr" placeholder="Type your Text here" id="summernote">
<?php echo $sub_part['description'];?>
              <!-- Type <em>some</em> <u>text</u> <strong>here</strong> -->
              </textarea>
            </div> 

                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                     <!-- <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label> -->
                    </div>
                  </div>
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

<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
teacher_logged_in();
//$pagetitle="edituser"; 
$member = get_teacher_id($_SESSION['t_username']);
$teachpart = mysqli_fetch_array($member);

?>
<?php 
if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('t_name','mcode','category','subcategory','descr','week');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
						
			if (empty($errors)) {
				// Perform Inssert
				//$passport = $db_images;
            //    $userid = $_SESSION['t_name'];
				$title = stripslashes($_REQUEST['t_name']);
				$title = mysqli_real_escape_string($connection,$_POST['t_name']);
        
        $memcode = stripslashes($_REQUEST['mcode']);
				$memcode = mysqli_real_escape_string($connection,$_POST['mcode']);
        
        $category = stripslashes($_REQUEST['category']);
				$category = mysqli_real_escape_string($connection,$_POST['category']);
				
       	$subcategory = stripslashes($_REQUEST['subcategory']);
				$subcategory = mysqli_real_escape_string($connection,$_POST['subcategory']);
        
        $description = stripslashes($_REQUEST['descr']);
				$description = mysqli_real_escape_string($connection,$_POST['descr']);
				
        $week = stripslashes($_REQUEST['week']);
				$week = mysqli_real_escape_string($connection,$_POST['week']);

               
				$query = "INSERT INTO subjects (
					cat_id, subcat_id, subject_title, sub_code, description, week
						) VALUES (
                            '{$category}', '{$subcategory}', '{$title}', '{$memcode}', '{$description}','{$week}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Subject added successfully !')</script>";
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
        <label for="exampleInputEmail1">Title:</label>
        <input name="t_name" type="text" value="" placeholder=" Enter Subject name" class="form-control" />
        
        <!-- <input name="t_name" value="" readonly  type="hidden" class="form-control" /> -->
        
        <div class="form-group">
                
              <label for="exampleInputEmail1">Subject code:</label>    
              <input name="mcode" type="text" value="" placeholder=" Enter Subject Code eg MAT 101" class="form-control" />
              </div>

                  <div class="form-group">
                    
                  <label style="color:#000;"><span>Select category </span></label>
              <select type="text" class="form-control"  placeholder="Enter Name" name="category">
                  <option value="0">Select your Class</option>
                  <?php  													
											$query = "SELECT * from category order by cat_id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[cat_id]>$cat_set[cat_name]</option>";
											}
											?>
                  </select>
                  
                  
                  <!-- <select type="text" class="form-control"  placeholder="Select Subject Type" name="class">
                      <option value="0">Select Class</option>
                      <option value="Reception 1">Reception 1</option>
                            <option value="Reception 2">Reception 2</option>
                            <option value="Nursery 1">Nursery 1</option>
                            <option value="Nursery 2">Nursery 2</option>
                            <option value="Nursery 3">Nursery 3</option>
                            <option value="Primary 1">Primary 1</option>
                            <option value="Primary 2">Primary 2</option>
                            <option value="Primary 3">Primary 3</option>
                            <option value="Primary 4">Primary 4</option>
                            <option value="Primary 5">Primary 5</option>
                            <option value="Primary 6">Primary 6</option>
                            <option value="J.S.S 1">J.S.S 1</option>
                            <option value="J.S.S 2">J.S.S 2</option>
                            <option value="J.S.S 3">J.S.S 3</option>
                            <option value="S.S 1">S.S 1</option>
                            <option value="S.S 2">S.S 2</option>
                            <option value="S.S 3">S.S 3</option>
                            <!-- <option value="Theory">Theory</option>
                            <option value="Others">Others</option> 
                         </select> -->
                </div>
                <div class="form-group">
                    
                    <label style="color:#000;"><span>Select Sub Category </span></label>
                    <select type="text" class="form-control"  placeholder="Enter Name" name="subcategory">
                  <option value="0">Select your Class</option>
                  <?php  													
											$query = "SELECT * from sub_category order by id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[id]>$cat_set[title]</option>";
											}
											?>
                  </select>
                  </div>
  
                  <label style="color:#000;"><span>Select Week</span></label>
                    <select type="text" class="form-control" name="week">
           
                  <option value="0">Select Week</option>
                  <?php  													
											$query = "SELECT * from weektbl order by weekid";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[title]>$cat_set[title]</option>";
											}
											?>
                  </select>

                        <div class="card-body">
  
  <textarea name="descr" placeholder="Type your Text here" id="summernote">
<em>  Type your text here</em> 
  Type <em>some</em> <u>text</u> <strong>here</strong>
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

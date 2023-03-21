<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); 
include('../includes/image_upload_functions.php');?>
<?php
teacher_logged_in();
//$pagetitle="edituser"; 
$member = get_teacher_id($_SESSION['username']);
$teachpart = mysqli_fetch_array($member);

?>
<?php 
if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('tit', 'cat_id','description');
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

        $cat_id = stripslashes($_REQUEST['cat_id']);
				$cat_id = mysqli_real_escape_string($connection,$_POST['cat_id']);
        
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
				$query = "INSERT INTO sub_category (
					title, category, description
						) VALUES (
             '{$title}', '{$cat_id}','{$description}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Sub Category added successfully !')</script>";
					redirect_to('manage_subcategory.php');
					
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
            <span>Add Sub Category</span>
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
        <label for="exampleInputEmail1">Sub Category Title:</label>
        <input name="tit" type="text" value="" placeholder=" Enter Sub Title" class="form-control" />
        
        <!-- <input name="t_name" value="<?php  													
						// $query = "SELECT * from teacher_tbl order by t_id";
						// $result = mysqli_query($connection,$query);
						// while($cat_set=mysqli_fetch_array($result)) {
						// echo "$cat_set[t_name]";
						// }
						?>" readonly  type="hidden" class="form-control" />
         -->
        <div class="form-group">
                
              <label for="exampleInputEmail1">Class details:</label>    
              <input name="description" type="text" value="" placeholder=" Enter class details" class="form-control" />
              </div>
              
             
              <label for="exampleInputEmail1">Select Category</label>  
                                           <select type="text" class="form-control"  placeholder="Enter Name" name="cat_id">
											<option value="0">Select your category</option>
											<?php  													
											$query = "SELECT * from category order by cat_id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[cat_id]>$cat_set[cat_name]</option>";
											}
											?>
										  </select>
                  
                     
                      


                            

              <!-- <label for="exampleInputEmail1">Profile Image:</label>
							<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" /> -->
                  <!-- <div class="form-group">
                    
                  <label style="color:#000;"><span>Select Class </span></label>
                  	<select type="text" class="form-control"  placeholder="Select Subject Type" name="class">
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
                            <option value="Theory">Theory</option>
                            <option value="Others">Others</option> 
                         </select>
                </div> -->
                <!-- <div class="form-group">
                    
                    <label style="color:#000;"><span>Select Week </span></label>
                        <select type="text" class="form-control"  placeholder="Select Subject Type" name="s_type">
                        <option value="0">Select Subject Week</option>
                              <option value="Week 1">Week 1</option>
                              <option value="Week 2">Week 2</option>
                              <option value="Week 3">Week 3</option>
                              <option value="Week 4">Week 4</option>
                              <option value="Week 5">Week 5</option>
                              <option value="Week 6">Week 6</option>
                              <option value="Week 7">Week 7</option>
                              <option value="Week 8">Week 8</option>
                              <option value="Week 9">Week 9</option>
                              <option value="Week 10">Week 10</option>
                              <option value="Week 11">Week 11</option>
                              <option value="Week 12">Week 12</option>
                              <option value="Week 13">Week 13</option>
                           </select>
                  </div> -->
  


                        <!-- <div class="card-body">
  
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
                  </div> -->
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

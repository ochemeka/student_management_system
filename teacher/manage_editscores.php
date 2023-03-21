<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
teacher_logged_in();
$pagetitle="Edit Scores"; 
//$member = get_teacher_id($_SESSION['t_username']);
//$teachpart = mysqli_fetch_array($member);

$score = get_scoread($_GET["scores"]);
$score_part = mysqli_fetch_array($score);

// $catid = get_category();   
// $cat_part = mysqli_fetch_array($catid);

//session,t_average,term,class,grade,average,total,exams,test2,test1,name
?>
<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//session,t_average,term,class,grade,average,total,exams,test2,test1,name,subject
      $required_fields = array('test1','test2','exams','name','class','session','subject',
              'total','average','grade','t_average','term');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
								
			if (empty($errors)) {
				// Perform Inssert
				//$userid = $_SESSION['t_name'];
				$test1 = stripslashes($_REQUEST['test1']);
				$test1 = mysqli_real_escape_string($connection,$_POST['test1']);        
        $test2 = stripslashes($_REQUEST['test2']);
				$test2 = mysqli_real_escape_string($connection,$_POST['test2']);        
        $exams = stripslashes($_REQUEST['exams']);
				$exams = mysqli_real_escape_string($connection,$_POST['exams']);				
       	$student = stripslashes($_REQUEST['name']);
				$student = mysqli_real_escape_string($connection,$_POST['name']);        
        $class = stripslashes($_REQUEST['class']);
				$class = mysqli_real_escape_string($connection,$_POST['class']);				
        $subject = stripslashes($_REQUEST['subject']);
				$subject = mysqli_real_escape_string($connection,$_POST['subject']);
        $term = stripslashes($_REQUEST['term']);
				$term = mysqli_real_escape_string($connection,$_POST['term']);
        $sec = stripslashes($_REQUEST['session']);
				$sec = mysqli_real_escape_string($connection,$_POST['session']);
        //   'total','average','grade','t_average',
        $total = stripslashes($_REQUEST['total']);
				$total = mysqli_real_escape_string($connection,$_POST['total']);				
        $average = stripslashes($_REQUEST['average']);
				$average = mysqli_real_escape_string($connection,$_POST['average']);
        $grade = stripslashes($_REQUEST['grade']);
				$grade = mysqli_real_escape_string($connection,$_POST['grade']);
        $t_average = stripslashes($_REQUEST['t_average']);
				$t_average = mysqli_real_escape_string($connection,$_POST['t_average']);
        
        
        
        $time = date("Y-m-d H:i:s");


				$id = $_GET["scores"];
				
			//	 '{$userid}', '{$title}', '{$memcode}', '{$description}','{$stu_class}','{$s_type}')";
				$query = 	"UPDATE scores SET 
						              
             class = '{$class}',
             test1 = '{$test1}',
             test2 = '{$test2}',
             exams = '{$exams}',
             total = '{$total}',
             average = '{$average}',
             grade = '{$grade}',
             t_average = '{$t_average}',
             term  = '{$term}',
             session = '{$sec}',
             subject = '{$subject}',
             
             updated_at = '{$time}'
						WHERE  	id = '{$id}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Updating Editcategory Successfull !')</script>";			
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
           Currently Editing: &nbsp; <strong><span  style="color:#000099;"><?php //echo $sub_part['sub_name'];?></span></strong>  
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
           <!-- manage_editscores.php?scores=<?php //echo $row['id']; ?> -->

           <form method="post" action="manage_editscores.php?scores=<?php echo $_GET["scores"]; ?>" enctype="multipart/form-data">
            

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

<?php  
	 $item_per_page      = 1; //item to display per page
	 $page_url           = "<?php echo ADMIN_PATH ; ?>category";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM scores "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM scores  WHERE status != 7 ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM categorytbl     
				ORDER BY subject_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?> <?php
   $stud = get_stud11_id($row['stud_email']);
   $studpart = mysqli_fetch_array($stud);
   ?>

<?php } ?>    <label style="color:#000;">Student:&nbsp; <span style="color:#F00;"><?php echo $score_part['stud_email'];?> </span></label>
              <input name="name" readonly type="text" value="<?php echo $studpart['fname']; ?>  <?php echo $studpart['lname']; ?> " placeholder=" Enter Subject name" class="form-control" />

              <label style="color:#000;">Select Subject;&nbsp;<span style="color:#F00;"> <?php echo $score_part['subject'];?></span></label>
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
          
                  
                  <label style="color:#000;">First Test;&nbsp;<span style="color:#F00;"> <?php echo $score_part['test1'];?></span></label>
                  <input name="test1" type="text" value="<?php echo $score_part['test1'];?>" placeholder=" Enter First Test" class="form-control" />                  

                  <label style="color:#000;">Second Test;&nbsp;<span style="color:#F00;"> <?php echo $score_part['test2'];?></span></label>
              <input name="test2" type="text" value="<?php echo $score_part['test2'];?>" placeholder=" Enter Second Test" class="form-control" />                

        
             
<label style="color:#000;">Exams;&nbsp;<span style="color:#F00;"> <?php echo $score_part['exams'];?></span></label>
              <input name="exams" type="text" value="<?php echo $score_part['exams'];?>" placeholder=" Enter First Test" class="form-control" />                  

<label style="color:#000;">Total ;&nbsp;<span style="color:#F00;"> <?php echo $score_part['total'];?></span></label>
              <input name="total" type="text" value="<?php echo $score_part['total'];?>" placeholder=" Enter Total" class="form-control" />                              

        </div>  
</div>  
<div class="col-6">
              <div class="form-group">

             




        

             
             
  <label style="color:#000;">Subject Average;&nbsp;<span style="color:#F00;"> <?php echo $score_part['average'];?></span></label>
              <input name="average" type="text" value="<?php echo $score_part['average'];?>" placeholder=" Enter Average" class="form-control" />                  
              
              
              <label style="color:#000;">Grade;&nbsp;<span style="color:#F00;"> <?php echo $score_part['grade'];?></span></label>
              <input name="grade" type="text" value="<?php echo $score_part['grade'];?>" placeholder=" Enter Grade" class="form-control" />                  
              
              <label style="color:#000;">Class;&nbsp;<span style="color:#F00;"> <?php echo $score_part['class'];?></span></label>
              <input name="class" type="text" value="<?php echo $score_part['class'];?>" placeholder=" Enter Class" class="form-control" />                  
              
              <label style="color:#000;">Term;&nbsp;<span style="color:#F00;"> <?php echo $score_part['term'];?></span></label>
              <input name="term" type="text" value="<?php echo $score_part['grade'];?>" placeholder=" Enter Grade" class="form-control" />                  
              
              <label class style="color:#000;">Total Average Scores;&nbsp;<span style="color:#F00;"> <?php echo $score_part['t_average'];?></span></label>
              <input name="t_average" type="text" value="<?php 
                      
                      $query = "SELECT * FROM scores";
                      $query_run = mysqli_query($connection,$query);
                      //$subt = 0;
                      $qty= 0;
                      while ($num = mysqli_fetch_assoc ($query_run)) {
                          $qty += $num['total'];

                           $qty / $num['total']; 

                          
                      }
                     echo  $qty
                  
                      
                      ?>" placeholder=" Enter Position" class="form-control" />                  
                    
                    
                    <label style="color:#000;">Session;&nbsp;<span style="color:#F00;"> <?php echo $score_part['session'];?></span></label>
              <input name="session" type="text" value="<?php echo $score_part['session'];?>" placeholder=" Enter Session" class="form-control" />                  
       
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

<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
teacher_logged_in();
$pagetitle="Session"; 
$member = get_teacher_id($_SESSION['t_username']);
$teachpart = mysqli_fetch_array($member);

?>
<?php 
if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			//test1, test2,  exams,student,subject, title,session
			$required_fields = array('session','title');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
						
			if (empty($errors)) {
				// Perform Inssert
				//$passport = $db_images;
            //    $userid = $_SESSION['t_name'];
				$session = stripslashes($_REQUEST['session']);
				$session = mysqli_real_escape_string($connection,$_POST['session']);
        
        
				
                $title = stripslashes($_REQUEST['title']);
				$title = mysqli_real_escape_string($connection,$_POST['title']);

               
				$query = "INSERT INTO session (
					 t_session, descp
						) VALUES (
                            '{$session}', '{$title}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Successfully !')</script>";
					redirect_to('session.php');
					
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

<?php include("includes/head_2.php"); 

if (isset($_GET['active'])) {
	// Success!
					$userid =  $_GET['active'];
					$query1 = 	"UPDATE session SET 
						    status = 1    
						WHERE id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("session.php?status=asuccess");
}
}

if (isset($_GET['deactive'])) {
	// Success!
					$userid =  $_GET['deactive'];
					$query1 = 	"UPDATE session SET 
						    status = 2    
						WHERE id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("session.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE session SET 
						    status = 7    
						WHERE id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("session.php?status=asuccess");
}
}

// if (isset($_GET['set'])) {
// 	// Success!
// 					$userid =  $_GET['delete'];
// 					$query1 = 	"UPDATE session SET 
// 						current_status = 1    
// 						WHERE id 	 = '$userid'";
// 			$result2 = mysqli_query($connection,$query1);
// 			//$result2 = mysql_query($query1);
			
// 			if($result2)
// 			{ 

// redirect_to("session.php?status=asuccess");
// }
// }

// if (isset($_GET['unset'])) {
// 	// Success!
// 					$userid =  $_GET['delete'];
// 					$query1 = 	"UPDATE session SET 
// 					 current_status = 2    
// 						WHERE id 	 = '$userid'";
// 			$result2 = mysqli_query($connection,$query1);
// 			//$result2 = mysql_query($query1);
			
// 			if($result2)
// 			{ 

// redirect_to("session.php?status=asuccess");
// }
// }

if (isset($_GET['set'])) {
	// Success!
					$userid =  $_GET['set'];
					$query0 = 	"UPDATE session SET 
						 	current_status = 2  
						WHERE id 	 = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("session.php?status=asuccess");
}
}
if (isset($_GET['unset'])) {
	// Success!
					$userid =  $_GET['unset'];
					$query0 = 	"UPDATE session SET 
						 	current_status = 1 
						WHERE id 	 = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("session.php?status=asuccess");
}
}

?>
  <!-- Main Sidebar Container -->
  <?php include("includes/sidebar.php");  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Add Sesstion</span>
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
			//echo $msg="Update Successful";
			}
			?>
<div class="card-body">
   <div class="form-group">
   <h3 style="color:#007bff;;"> Please Enter Session</h3>
     <span class="d-flex">   
   <div class="col-5">
        <!-- <label for="exampleInputEmail1">Title:</label> -->
        <p>  <input name="title" type="text" value="" placeholder=" Enter session title eg  this is session1" class="form-control" /> </p>
        </div> 
        <div class="col-5 d-flex">
        <!-- <label for="exampleInputEmail1">Academic Session:</label> -->
         <input name="session" type="text" value="" placeholder="Enter Academic Session e.g 2021/2022" class="form-control" />
         
      
        <div class="col-2">
        <!-- <label for="exampleInputEmail1">Action:</label> -->
        <button type="submit" value="submit"  class="btn btn-primary" name="submit">Add </button> 
        </div>   
        <!-- <input name="t_name" value="" readonly  type="hidden" class="form-control" /> -->
    </span> 
    
               
             
    </div>    
        <!-- <div class="form-group">
                
              <label for="exampleInputEmail1">Subject:</label>    
              <input name="subject" type="text" value="" placeholder=" Enter Subject Code eg MAT 101" class="form-control" />
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
                  </div>
                </div> -->
                <!-- /.card-body -->
                
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


<div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  <th>S/N</th>
                  <!-- <th>Category</th> -->
                  <th>Session</th>
                  <th>Title</th>
                  
                
                  <th>Status</th>
                  <th>Action</th>
                  <th>Current Status</th>
                
                


                  </tr>
                  </thead>
                  <tbody>
    <?php  
	 $item_per_page      = 100; //item to display per page
	 $page_url           = "<?php echo ADMIN_PATH ; ?>category";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM session "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM session   ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM categorytbl     
				ORDER BY id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?>  
                  <tr>
                  
                      <td><?php echo $row['id']; ?></td>
                      <!-- <td><?php //echo $row['id']; ?> -->
                      
                      <!-- <td><?php //echo substr($row['description'],0,5); ?> </td> -->
                      <td><?php echo $row['t_session']; ?> </td>
                      <td><?php echo $row['descp']; ?> </td>
                      <!-- <td><?php //echo $row['status']; ?> </td> -->
                      <td>   <?php $confirm = $row['status']; ?>
                      <?php if ($confirm == 2){ ?>       
                     <p style="color:#F00;">Not Active</p>
                       <?php }  elseif ($confirm == 1)  {  ?>   
                          <p style="color: #3C0;">Active</p>   
                              <?php }
                        elseif ($confirm == 7)  {  ?>   
                          <p style="color: #F30;">Deleted</p>   
                              <?php }      
                              ?></td> 
                      <!-- <td><a href="subject.php?sub=<?php //echo $row['id']; ?>">  View </a></td> -->
                      
                    
                      <td>(<?php if($row['status']==1){ ?><a href="session.php?deactive=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure?');">De-activate</a><?php }else{ ?><a href="session.php?active=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure?');">Activate</a><?php } ?> )&nbsp;
                      (<a href="session.php?delete=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)&nbsp;
                      </td>
                      <td>   
                      (<?php if($row['current_status']== 2){ ?><a href="session.php?unset=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure?');"> <p style="color: #F30;">UnSet Current Session</p>    </a><?php }else{ ?><a href="session.php?set=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure?');">Set Current Session</a><?php } ?> )&nbsp;&nbsp; &nbsp;                    
                    </td>
                    </td>
                    
                   
                    
                  </tr>
                  <?php

}

?>    
                  </tbody>
                                
                  <tfoot>
                  <tr>
                  <th>S/N</th>
                  <!-- <th>Category</th> -->
                  <th>Session</th>
                  <th>Title</th>
                  
                
                  <th>Status</th>
                  <th>Action</th>
                  <th>Current Status</th>

                  
                  </tr>
                  </tfoot>
                </table>
              </div>


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

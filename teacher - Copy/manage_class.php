<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); 
include('../includes/image_upload_functions.php');?>
<?php
teacher_logged_in();
$pagetitle="Manage Class"; 
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
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				
        //$userid = $_SESSION['t_name'];
        $passport = $db_images;
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

<?php  
if (isset($_GET['active'])) {
	// Success!
					$userid =  $_GET['active'];
					$query1 = 	"UPDATE class_tbl SET 
						    class_status = 1    
						WHERE class_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_class.php?class_status=asuccess");
}
}

if (isset($_GET['deactive'])) {
	// Success!
					$userid =  $_GET['deactive'];
					$query1 = 	"UPDATE class_tbl SET 
						    class_status = 2    
						WHERE class_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_class.php?class_status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE class_tbl SET 
						    class_status = 7    
						WHERE class_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_class.php?class_status=asuccess");
}
}



if (isset($_GET['set'])) {
	// Success!
					$userid =  $_GET['set'];
					$query0 = 	"UPDATE class_tbl SET 
						 	class_status = 2  
						WHERE class_id 	 = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_class.php?class_status=asuccess");
}
}
if (isset($_GET['unset'])) {
	// Success!
					$userid =  $_GET['unset'];
					$query0 = 	"UPDATE class_tbl SET 
						 	class_status = 1 
						WHERE class_id 	 = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_class.php?class_status=asuccess");
}
}

?>

<?php 
include("includes/head_2.php");  ?>
  <!-- Main Sidebar Container -->
  <?php include("includes/sidebar.php");  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>User: <span>  <span style="color:#f30;"> <?php echo $teachpart['username'];?></span></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">manage class</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <form method="post" action="" enctype="multipart/form-data">
              <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			//echo $msg="Update Successful";
			}
			?>
<div class="card-body">
   <div class="form-group">
   <h4 style="color:#007bff;"> Please Add Class</h4>
     <span class="d-flex">   
   <div class="col-4">
        <!-- <label for="exampleInputEmail1">Title:</label> -->
        <!-- <p>  <label for="exampleInputEmail1">Class details:</label>     -->
        <input name="tit" type="text" value="" placeholder=" Enter Class Name" class="form-control" />
 
        </div> 
        <div class="col-3">
        <!-- <label for="exampleInputEmail1">Title:</label> -->
        <!-- <p>  <label for="exampleInputEmail1">Class details:</label>     -->
        <input name="description" type="text" value="" placeholder=" Enter class details" class="form-control" />
 
        </div> 
        <div class="col-4 d-flex">
        <!-- <label for="exampleInputEmail1">Academic Session:</label> -->
        <label for="exampleInputEmail1"> Image:</label>
							<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
         
      
        <div class="col-4">
        <!-- <label for="exampleInputEmail1">Action:</label> -->
        <button type="submit" value="submit"  class="btn btn-primary" name="submit">Add </button> 
        </div>   
        <!-- <input name="t_name" value="" readonly  type="hidden" class="form-control" /> -->
    </span> 
    </form>
    </div>
    </div>

<hr /><br>
              </div>
              


            <div class="card">
            <!--  <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
               /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  <th>S/N</th>
                    <th>Title</th>
                    <th>Images </th>
                  
                    <th> Decription</th>
                  <th> Status</th>
                <th> Action</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php  
	 $item_per_page      = 100; //item to display per page
	 $page_url           = "manage_class";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM class_tbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM class_tbl ORDER BY class_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM class_tbl     
				ORDER BY cat_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?> 
                  <tr>
                  <th><?php echo $row['class_id']; ?></th>
                    <td><?php echo $row['class_title']; ?></td>
                    
                    <td align="center"> <?php 
														$img_url = $row["class_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['class_title']; ?>" height="60" width="60" />
<?php } } ?>   
        <br />
                   
                          </td>
                    <td><?php echo $row['class_desc']; ?></td>

                    <td>   <?php $confirm = $row['class_status']; ?>
                      <?php if ($confirm == 2){ ?>       
                     <p style="color:#F00;">Not Active</p>
                       <?php }  elseif ($confirm == 1)  {  ?>   
                          <p style="color: #3C0;">Active</p>   
                              <?php }
                        elseif ($confirm == 7)  {  ?>   
                          <p style="color: #F30;">Deleted</p>   
                              <?php }  
                        elseif ($confirm < 1)  {  ?>   
                          <p style="color: #F30;">Please Set Status</p>   
                              <?php }      
                              ?></td> 
                      <!-- <td><a href="subject.php?sub=<?php //echo $row['id']; ?>">  View </a></td> -->
                      
                    
                      <td>(<?php if($row['class_status']==1){ ?><a href="manage_class.php?deactive=<?php echo $row['class_id']; ?>" >De-activate</a><?php }else{ ?><a href="manage_class.php?active=<?php echo $row['class_id']; ?>">Activate</a><?php } ?> )&nbsp;
                      (<a href="manage_class.php?delete=<?php echo $row['class_id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)&nbsp;
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
                  <th>Title</th>
                    <th>Images </th>
                  
                    <th> Decription</th>
                    <th> Status</th>
                    <th> Action</th>
                  </tr>

        

                  </tfoot>  
  <!-- <?php // echo '<div align="center">';
// We call the pagination function here.
//echo paginate($item_per_page, $page_number, $get_total_rows[0], $total_pages, $page_url);
//echo '</div>';
	   ?>                                  -->
     
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!--  <b>Version</b> 3.1.0-->  
      
    </div>
    <strong>Copyright &copy;  <?php echo  date("Y") ; ?> <!-- 2014-2021 --> <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

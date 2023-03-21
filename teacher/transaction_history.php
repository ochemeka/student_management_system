<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php");
include('../includes/image_upload_functions.php');?>

<?php
$member = get_teacher_id($_SESSION['t_username']);
$teachpart = mysqli_fetch_array($member);

teacher_logged_in(); ?>

<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//p_date,description,name
			$required_fields = array('name','p_date','description');
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
				$title = stripslashes($_REQUEST['name']);
				$title = mysqli_real_escape_string($connection,$_POST['name']);
        
				$p_date = stripslashes($_REQUEST['p_date']);
				$p_date = mysqli_real_escape_string($connection,$_POST['p_date']);
				
				$description = stripslashes($_REQUEST['description']);
				$description = mysqli_real_escape_string($connection,$_POST['description']);

                $time = date("Y-m-d H:i:s");

                $school_name = "2000";
				$term_code = date("Y");
				$term_code2 = date("s");
				$tcode2 = date("i");
				// $gen_password = "sjs";
				$reference = $school_name .$term_code .$term_code2 .$tcode2  ;


                // $school_fee = "28000";

				
				$query = "INSERT INTO transactions_tbl (
					title, description,reference_no, credit, debit, time, image,updated_at
						) VALUES (
             '{$title}', '{$description}',{$reference}', '{$description}',{$title}', '{$description}', '{$passport}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Class added successfully !')</script>";
					redirect_to('manage_category.php');
					
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
if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query0 = 	"UPDATE category SET 
						cat_status = 1  
						WHERE cat_id 	 = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_category.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE category SET 
						cat_status = 0   
						WHERE cat_id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			//$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_category.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE category SET 
						cat_status = 7    
						WHERE cat_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_category.php?status=asuccess");
}
}
if (isset($_GET['setsecondary'])) {
	// Success!
					$userid =  $_GET['setsecondary'];
					$query0 = 	"UPDATE category SET 
						set_status = 2  
						WHERE cat_id 	 = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_category.php?status=asuccess");
}
}
if (isset($_GET['unsetsecondary'])) {
	// Success!
					$userid =  $_GET['unsetsecondary'];
					$query0 = 	"UPDATE category SET 
						set_status = 1 
						WHERE cat_id 	 = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_category.php?status=asuccess");
}
}


 ?>
<?php include("includes/head_2.php"); 
$pagetitle="Manage category"; ?>
  <!-- Main Sidebar Container -->
  <?php include("includes/sidebar.php");  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User: <span>  <span style="color:#f30;"> <?php echo $teachpart['username'];?></span>&nbsp;&nbsp;&nbsp;&nbsp; </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage History</li>
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
            <!--   <div class="card-header">
                <h3 class="card-title">Student Profile</h3>
              </div>-->
              

              <form method="post" action="" enctype="multipart/form-data">
              <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			//echo $msg="Update Successful";
			}
			?>
<div class="card-body">
   <div class="form-group">
   <h3 style="color:#007bff;"> Transaction History</h3><br>
     <span class="d-flex">   
   <div class="col-3">
        <!-- <label for="exampleInputEmail1">Title:</label> -->
         <label for="exampleInputEmail1">Name of Student:</label>    
              <input name="name" type="text" value="" placeholder="Name of Student eg Mark Spencer" class="form-control" />
              
        </div> 
        <div class="col-3">
        <!-- <label for="exampleInputEmail1">Title:</label> -->
         <label for="exampleInputEmail1">Description</label>    
        <input name="description" type="text" value="" placeholder=" Payment Purpose eg. First term fees" class="form-control" />
         </div> 
         <div class="col-3">
  <label for="exampleInputEmail1">Payment date</label>    
        <input name="p_date" type="date" value="" placeholder="Date of payment" class="form-control" />


        </div> 
        <div class="col-3">
        <!-- <label for="exampleInputEmail1">Academic Session:</label> -->
        <label for="exampleInputEmail1">Upload Image:</label>
        <div class="d-flex">
							<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
         
      
       
        <!-- <label for="exampleInputEmail1">Action:</label> -->
        <button type="submit" value="submit"  class="btn btn-primary" name="submit">Add </button> 
        </div>   
        <!-- <input name="t_name" value="" readonly  type="hidden" class="form-control" /> -->
    </span> 
    </form>
               
               </div>
    </div>

<hr /><br>
            <div class="card">
            <!--  <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
               /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Title</th>
                    <th>Description</th>
                    <th>Credit </th>
                    <th>Debit</th>
                    <th>Image<br> Score</th>
                    <th>Date of Payment</th>
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


$results = $connection->query("SELECT COUNT(*) FROM transactions_tbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
// $ssn = $_GET['section'];
// $trm = $_GET['cnt'];
// $uID = $_SESSION['username'];

// $query = "SELECT * from session WHERE status = 1 order by id";
// $result = mysqli_query($connection,$query);
// while($cat_set=mysqli_fetch_array($result)) {
  //echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";



// $tm = $cat_set['t_session']; }
// //$tm = '2021/2022';

// $uID = $_SESSION['username'];
//$tm = $_GET['$term'];
//$results = $connection->query("SELECT * FROM roomtbl WHERE cat_id = '$cd' ORDER BY room_id ASC LIMIT $page_position, $item_per_page");
$results = $connection->query("SELECT * FROM transactions_tbl  WHERE status != 7  ORDER BY id ASC LIMIT $page_position, $item_per_page");


//Display records fetched from database.


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?>
                  <tr>
                  <td><?php echo $row['title']; ?> </td>
                        <td><?php echo $row['description']; ?> </td>
                        <td><?php echo $row['credit']; ?> </td>
                        <td><?php echo $row['debit']; ?> </td>
                        <td><?php echo $row['image']; ?> </td>
                       
                    
                    <td align="center"> <?php 
														$img_url = $row["cat_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php //echo $row['email']; ?>" height="60" width="60" />
<?php } } ?>   
        <br />
                    <!-- <a href="imagesetting.php?pid=<?php //echo $classpart['stud_id']; ?>"><button class="btn btn-primary">Edit Photo</button></a> 
                    <br /> -->
               <!---     <a href="StudentProfile.php" download>Download </a> --->
                          </td>
                    
                     <td><?php echo $row['time']; ?> </td>
                   
                    <td>(<?php if($row['status']==1){ ?><a href="manage_category.php?disapprove=<?php echo $row['cat_id']; ?>" onClick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manage_category.php?approve=<?php echo $row['cat_id']; ?>" onClick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="manage_category.php?delete=<?php echo $row['cat_id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)&nbsp;<a href="manage_editcategory.php?catid=<?php echo $row['cat_id']; ?>">Edit</a>  &nbsp; 
                   
                  </td>
                  </tr>
                  <?php

}

?>    
                  </tbody>
                                
                  <tfoot>
                  <!-- <tr>
                 
                  <th>Title</th>
                    <th>Description</th>
                    <th>Credit </th>
                    <th>Debit</th>
                    <th>Image<br> Score</th>
                    <th>Date of Payment</th>
                  </tr> -->
                  </tfoot>
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
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

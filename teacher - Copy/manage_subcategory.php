<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
teacher_logged_in();
 
$member = get_teacher_id($_SESSION['t_username']);
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
					title, cat_id, description
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
            <h1>User: <span>  <span style="color:#f30;"> <?php echo $teachpart['username'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Sub Category</li>
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
   <h3 style="color:#007bff;"> Manage Sub Category</h3>
     <span class="d-flex">   
   <div class="col-4">
        <!-- <label for="exampleInputEmail1">Title:</label> -->
        <!-- <p>  <label for="exampleInputEmail1">Class details:</label>     -->
        <input name="tit" type="text" value="" placeholder=" Enter Sub Title" class="form-control" />
        
 
        </div> 
        <div class="col-3">
        <!-- <label for="exampleInputEmail1">Title:</label> -->
        <!-- <p>  <label for="exampleInputEmail1">Class details:</label>     -->
        <input name="description" type="text" value="" placeholder=" Enter class Description" class="form-control" />
 
        </div> 
        <div class="col-4 d-flex">
        <!-- <label for="exampleInputEmail1">Academic Session:</label> -->
        
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
                  <th>Cat ID</th> 
                  <th>Title </th>
                    
                   
                  
                    <th> Decription</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php  
	 $item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo ADMIN_PATH ; ?>sub_category";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM sub_category "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM sub_category ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM category     
				ORDER BY cat_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?> 
                  <tr>
                  <th><?php echo $row['id']; ?></th>
                  <td><?php echo $row['cat_id']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                   
                    
                    
                    <td><?php echo $row['description']; ?></td>
                    
                   
                    
                  </tr>
                  <?php

}

?>    
                  </tbody>
                                
                  <tfoot>
                  <tr>
                  <th>S/N</th>
                  <th>Cat ID</th>
                  <th>Title </th>
                
                  
                  
                    <th> Decription</th>
                  
                  </tr>
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


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
confirm_logged_in();
// if (isset($_GET['disapprove'])) {
// 	// Success!
// 					$userid =  $_GET['disapprove'];
// 					$query1 = 	"UPDATE categorytbl SET 
// 						cat_status = 0   
// 						WHERE subject_id 	 = '$userid'";
// 			$result1 = mysqli_query($connection,$query1);
// 			//$result1 = mysql_query($query1);
			
// 			if($result1)
// 			{ 

// redirect_to("manage_subject.php?status=asuccess");
// }
//}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE subjects SET 
						    status = 7    
						WHERE subject_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_subject.php?status=asuccess");
}
}

//$pagetitle="edituser"; 
$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);
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
            <h1>Manage Subject&nbsp;&nbsp;&nbsp; <a href="addsubject.php">Add Subject</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Subject</li>
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
              


           <!--  <div class="card">
             <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
               /.card-header -->
              <!-- <div class="card-body">
                <table id="example1" class="table table-bordered table-striped"> -->
                <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  <th>S/N</th>
                  <!-- <th>Category</th> -->
                  <th>Description</th>
                  <th>Title</th>
                  
                
                  <th>Week</th>
                  <th>View</th>
                
                  <th>status</th>


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


$results = $connection->query("SELECT COUNT(*) FROM subjects "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM subjects  WHERE status != 7 ORDER BY subject_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM categorytbl     
				ORDER BY subject_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?>  
                  <tr>
                  
                      <td><?php echo $row['subject_id']; ?></td>
                      <!-- <td><?php //echo $row['cat_id']; ?> -->
                      
                      <td><?php echo substr($row['description'],0,5); ?> </td>
                      <td><?php echo $row['subject_title']; ?> </td>
                      <td><?php echo $row['week']; ?> </td>
                      <td><a href="subject.php?sub=<?php echo $row['subject_id']; ?>">  View </a></td>
                      <td> &nbsp;(<a href="manage_subject.php?delete=<?php echo $row['subject_id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)&nbsp;<a href="manage_editsubject.php?sub=<?php echo $row['subject_id']; ?>">Edit</a></td>
                    
                   
                    
                  </tr>
                  <?php

}

?>    
                  </tbody>
                                
                  <tfoot>
                  <tr>
                  <th>S/N</th>
                  <!-- <th>Category</th> -->
                  <th>Description</th>
                  <th>Title</th>
                  
                 
                  <th>Week</th>
                  <th>View</th>
                  <th>status</th>

                  
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          

             
             </div>
              <!-- /.card-body -->
            <!-- </div>
            /.card -->
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

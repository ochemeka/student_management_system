<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
confirm_logged_in();
$pagetitle="Check Result"; 

include("includes/head_add.php"); 

// $sub = get_subject01($_GET['sub']);
// $sub_part = mysqli_fetch_array($sub);

$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);
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
            <h1>User: <span>  <span style="color:#f30;"> <?php echo $stud_part['username'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../student/dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Check Student Result</li>
              
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
              


              <div class="row">
                <div class="col-12 table-responsive">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <strong> Current Session      <span style="color:#F00;">&nbsp;
            <?php $query = "SELECT * from session WHERE status = 1 order by id";
$result = mysqli_query($connection,$query);
while($cat_set=mysqli_fetch_array($result)) {
  //echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";



echo $cat_set['t_session']; }
              
                  ?></span> </strong> 
                  <tr>
                  
                  
                  <!-- <th>Category</th> -->
                  <!-- <th>Student Name</th> -->
                  <th>Subject</th>
                  <th>1st<br>  Test</th>
                  <th>2nd<br>  Test</th>
                  <th>Exams<br> Score</th>
                  <th>Total<br> Score</th>
                
                
                
                  <th>Average</th>
                  <th>Grade</th>
                  <th>Position</th>
                  <th>Term</th>
                  <th>Session</th>
                  <!-- <th>Action</th> -->
                
                  


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


$results = $connection->query("SELECT COUNT(*) FROM scores "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
// $ssn = $_GET['section'];
// $trm = $_GET['cnt'];
// $uID = $_SESSION['username'];

$query = "SELECT * from session WHERE status = 1 order by id";
$result = mysqli_query($connection,$query);
while($cat_set=mysqli_fetch_array($result)) {
  //echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";



$tm = $cat_set['t_session']; }
//$tm = '2021/2022';

$uID = $_SESSION['username'];
//$tm = $_GET['$term'];
//$results = $connection->query("SELECT * FROM roomtbl WHERE cat_id = '$cd' ORDER BY room_id ASC LIMIT $page_position, $item_per_page");
$results = $connection->query("SELECT * FROM scores  WHERE  stud_email = '$uID' AND session = '$tm'  AND status != 7  ORDER BY id ASC LIMIT $page_position, $item_per_page");


//Display records fetched from database.


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?>   
                  <tr>
                  
                      
                  <!-- <td>
                      <?php
                      //  $stud = get_stud11_id($row['stud_email']);
                      // $studpart = mysqli_fetch_array($stud);
                      ?>    
                    <?php //echo $studpart['fname']; ?> &nbsp; <?php //echo $studpart['lname']; ?> </td> -->
                      <td><?php echo $row['subject']; ?> </td>
                      <td><?php echo $row['test1']; ?> </td>
                      <td><?php echo $row['test2']; ?> </td>
                      <td><?php echo $row['exams']; ?> </td>
                      
                      <td><?php echo $row['total']; ?> </td>
                      <td><?php echo substr($row['average'],0,5) ; ?> </td>
                      <td><?php echo $row['grade']; ?> </td>
                      <td> <?php 
                      
                      $query = "SELECT * FROM scores";
                      $query_run = mysqli_query($connection,$query);
                      
                      $qty= 0;
                      while ($num = mysqli_fetch_assoc ($query_run)) {
                          $qty += $num['total'];
                      }
                      echo $qty; ?>
                      </td>

                    
                    </td>
                      <td><?php echo $row['term']; ?> </td>
                      <td><?php echo $row['session']; ?> </td>
                     
                      
                      <!-- <td> &nbsp;(<a href="manage_subject.php?delete=<?php //echo $row['id']; ?>" 
                      onClick="return confirm('Are you sure?');">
                      Delete</a>)&nbsp;<a href="manage_editsubject.php?sub=<?php //echo $row['id']; ?>">Edit</a></td> -->
                    
                   
                    
                  </tr>
                  <?php

}

?>    
                  </tbody>
                                
                  <tfoot>
                  <tr>
                  <!-- <th>S/N</th> -->
                  <!-- <th>Category</th> -->
                  <!-- <th>Student Name</th> -->
                  <th>Subject</th>
                  <th>1st<br>  Sest</th>
                  <th>2nd<br>  Test</th>
                  <th>Exams<br> Score</th>
                  <th>Total<br> Score</th>
                
                
                  <th>Average</th>
                  <th>Grade</th>
                  <th>Position</th>
                  <th>Term</th>
                  <th>Session</th>
                  <!-- <th>Action</th> -->

                  
                  </tr>
                  </tfoot>




                  <div class="row no-print">
                <div class="col-12">
                  <a  class="btn btn-primary" href="studentresult.php" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>  <i class="fas fa-download"></i>Print</a>
                 
                </div>
              </div>


                </table>
              </div>
              
              
                <!-- /.col -->
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
      "buttons": []
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

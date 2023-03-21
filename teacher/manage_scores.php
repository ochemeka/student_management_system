
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
teacher_logged_in();
$pagetitle="Manage scores"; 
$member = get_teacher_id($_SESSION['t_username']);
$teachpart = mysqli_fetch_array($member);

?>


<?php 

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
					$query1 = 	"UPDATE scores SET 
						    status = 7    
						WHERE id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_scores.php?status=asuccess");
}
}


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
           
            <h1>Manage Subject&nbsp;&nbsp;&nbsp;</h1><br>
                <span class="d-flex">&nbsp;
           <p>   <a class="btn btn-danger" href="addscores_primary.php">Add Primary Scores</a>&nbsp;&nbsp;
              <a class="btn btn-danger" href="addscores_secondary.php">Add Secondary Scores</a></p>
</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Scores</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> -->
            
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
                <strong> Current Session      <span style="color:#F00;">&nbsp;
            <?php $query = "SELECT * from session WHERE status = 1 order by id";
$result = mysqli_query($connection,$query);
while($cat_set=mysqli_fetch_array($result)) {
  //echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";



echo $cat_set['t_session']; }
              
                  ?></span> </strong> 
                
                <thead>
                  <tr>
                  
                  <!-- <th>S/N</th> -->
                  <th>Student Name</th>
                  <th>Subject</th>
                  <th>1st <br> Sest</th>
                  <th>2nd <br> Test</th>
                  <th>Exams <br> Score</th>
                  <th>Total <br> Score</th>
                
                
                  <th>Average</th>
                  <th>Grade</th>
                  <th>Class</th>
                  <th>Term</th>
                
                  <th>Action</th>

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
$results = $connection->query("SELECT * FROM scores  WHERE status != 7 ORDER BY id ASC LIMIT $page_position, $item_per_page");

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
                 
                  <?php
      $stud = get_stud11_id($row['stud_email']);
      $studpart = mysqli_fetch_array($stud);
      ?>
                    <td><?php echo $studpart['fname']; ?> &nbsp; <?php echo $studpart['lname']; ?> </td>
                      <td><?php echo $row['subject']; ?> </td>
                      <td><?php echo $row['test1']; ?> </td>
                      <td><?php echo $row['test2']; ?> </td>
                      <td><?php echo $row['exams']; ?> </td>
                      
                      <td><?php echo $row['total']; ?> </td>
                      <td><?php echo substr($row['average'],0,5) ; ?> </td>
                      <td><?php echo $row['grade']; ?> </td>
                      <td><?php echo $row['class']; ?> </td>
                      <td><?php echo $row['term']; ?> </td>
                     
                     
                      
                      <td> &nbsp;<a href="manage_scores.php?delete=<?php echo $row['id']; ?>" 
                      onClick="return confirm('Are you sure?');">
                      Delete</a>&nbsp;&nbsp;<a href="manage_editscores.php?scores=<?php echo $row['id']; ?>">Edit</a></td>
                    
                   
                 
                  </tr>
                  <?php

}

?> 
   <?php  echo '<div align="center">';
// We call the pagination function here.
echo paginate($item_per_page, $page_number, $get_total_rows[0], $total_pages, $page_url);
echo '</div>';
	   ?>
                  </tbody>
                                
                  <tfoot>
                  <tr>
                   <!-- <th>S/N</th> -->
                   <th>Student Name</th>
                  <th>Subject</th>
                  <th>1st <br> Sest</th>
                  <th>2nd <br> Test</th>
                  <th>Exams <br> Score</th>
                  <th>Total <br> Score</th>
                
                
                  <th>Average</th>
                  <th>Grade</th>
                  <th>Class</th>
                  <th>Term</th>
                
                  <th>Action</th>
                  
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
          <!-- </div> -->
          <!-- /.col -->
       
        <!-- /.row -->
      <!-- </div> -->
      <!-- /.container-fluid -->
    <!-- </section> -->
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



<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Success.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: 'dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
</script>
</body>
</html>

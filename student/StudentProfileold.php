<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php 
include('../includes/image_upload_functions.php');

//$pagetitle="Student Bio-data Form"; ?>
<?php include("includes/head_add.php"); 
confirm_logged_in();

$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);
?>


  <?php include("includes/sidebar2.php");  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Profile</li>
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
              


            <div class="card">
            <!--  <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
               /.card-header -->
              <div class="card-body">


              <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" style="border:hidden;"  class="">
                  <thead>
                  <tr>
                  <th>  </th>  
                    <th>Subject</th>
                    <th>  </th> 
                    <th>  </th>
                    <th>&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  Details</th>
                   <th>passport  </th> 
                   
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <th>  </th>  
                    <td>Fullname</td>
                    <th>  </th>
                    <th>  </th> 
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $stud_part['fullname']; ?> </td>
                    <th><?php 
														$img_url = $stud_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img  src="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php //echo $row['email']; ?>" height="100" width="100" />
<?php } } ?>     </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Username</td>
                    <th>  </th>
                    <th>  </th> 
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['username']; ?> </td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Gender</td>
                    <th>  </th>
                    <th>  </th> 
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $stud_part['gender']; ?> </td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Phone Number</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['phone']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>DOB</td>
                    <th>  </th>
                    <th>  </th> 
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['dob']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Email</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['email']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Permanent Address</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['address']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Fathers Name</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['father_name']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Fathers Occupation</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['father_occ']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Fathers Tel.</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['father_phone']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Mothers Name</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['mother_name']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Mothers Occupation</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['mother_occ']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Mothers Tel.</td>
                    <th>  </th> 
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['mother_phone']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>LGA</td>
                     <th>  </th> 
                     <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['lga']; ?> </td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Current State</td>
                    <th>  </th>
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['state']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Nationality</td>
                    <th>  </th>
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['nationality']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Class to be Admitted</td>
                    <th>  </th>
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['class']; ?></td>
                    <th>  </th> 
                  </tr>
                  <tr>
                  <th>  </th>  
                    <td>Date Admitted</td>
                    <th>  </th>
                    <th>  </th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_part['addmission_date']; ?></td>
                    <th>  </th> 
                    
                  </tr>
                  
                  </tbody>
                  <tfoot>
                  <tr>
               
                  <th>  </th>  
                  <th>Subject</th>
                  <th>  </th>
                  <th>  </th>
                   <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Details</th>
                   <th>  </th> 
                  </tr>
                  </tfoot>
                </table>

              <?php /*?>     <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Reg No. </th>
                    <th>Fullname</th>
                    
                    <th> Photo </th>
                    <th>phone </th>
                    <th>dob</th>
                    <th>email</th>
                    
                    <th>LGA </th>
                    <th>State </th>
                    <th>Country </th>
                    <th>Class </th>
                    <th>DOA </th>
                    <th>Edit Profile  </th>
                    
                    <th> address</th>
                    <th>Father's Name </th>
                    <th>father Occ</th>
                    <th>Father Add</th>
                    <th> Father Tel.</th>
                    <th>Mothers Name </th>
                    <th>Mother's Occ</th>
                    <th>Mother Tel.</th>
                    <th> Mother Add</th>

                  </tr>
                  </thead>
                  <tbody>
 
                  <tr>
                    <td><?php echo $stud_part['stud_id']; ?></td>
                    <td><?php echo $stud_part['fullname']; ?></td>
                    
                    <td> <?php 
														$img_url = $stud_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php //echo $row['email']; ?>" height="100" width="100" />
<?php } } ?>   
        <br />
                    <a href="imagesetting.php?pid=<?php echo $stud_part['stud_id']; ?>">Edit</a> 
                          </td>
                    <td><?php echo $stud_part['phone']; ?></td>
                    <td><?php echo $stud_part['dob']; ?></td>
                    <td><?php echo $stud_part['email']; ?></td>
                   
                    <td><?php echo $stud_part['lga']; ?></td>
                    <td><?php echo $stud_part['state']; ?></td>
                    <td><?php echo $stud_part['nationality']; ?></td>
                    <td><?php echo $stud_part['class']; ?></td>
                    <td><?php echo $stud_part['addmission_date']; ?></td>
                    <td> <a href="parentbio.php?pid=<?php echo $stud_part['stud_id']; ?>">Edit</a> 
                  
                  </td>

                    <td><?php echo $stud_part['address']; ?></td>
                    <td><?php echo $stud_part['father_name']; ?></td>
                    <td><?php echo $stud_part['father_occ']; ?></td>
                    <td><?php echo $stud_part['father_add']; ?></td>
                    <td><?php echo $stud_part['father_phone']; ?></td>
                    <td><?php echo $stud_part['mother_name']; ?></td>
                    <td><?php echo $stud_part['mother_occ']; ?></td>
                    <td><?php echo $stud_part['mother_phone']; ?></td>
                    <td><?php echo $stud_part['mother_add']; ?></td>
                    
                  </tr>
              
                  </tbody>
                                
                  <tfoot>
                  <tr>
                  <th>Reg No. </th>
                    <th>Fullname</th>
                    
                    <th> Photo </th>
                    <th>phone </th>
                    <th>dob</th>
                    <th>email</th>
                    
                    <th>LGA </th>
                    <th>State </th>
                    <th>Country </th>
                    <th>Class </th>
                    <th>DOA </th>
                    <th>Edit Profile  </th>
                    
                    <th> address</th>
                    <th>Father's Name </th>
                    <th>father Occ</th>
                    <th>Father Add</th>
                    <th> Father Tel.</th>
                    <th>Mothers Name </th>
                    <th>Mother's Occ</th>
                    <th>Mother Tel.</th>
                    <th> Mother Add</th>
                  </tr>
                  </tfoot>
                </table> <?php */?>
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

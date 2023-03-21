<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php 
//include('../include/image_upload_functions.php');

$pagetitle="check scores"; ?>
<?php include("includes/head_add.php"); 
confirm_logged_in();

$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);
?>


  <?php include("includes/sidebar2.php");  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Profile of  <?php echo $stud_part['fname']; ?>_<?php echo $stud_part['lname']; ?></h4>
         
       
        </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contineous Assessment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


            <!-- Main content -->
            <!-- <div class="invoice p-3 mb-3"> -->
              <!-- title row -->
              <!-- <div class="row">
                <div class="col-12">
                <div align="center">
                <h6> <strong> Leadership Academy Montesorri Nur./ Pri. & Secondary School</strong></h> 
                <h6>    <strong>   Contineous Assessment</strong></h4>
                </div>
                        <strong>   <h4>  <i class="fas fa-user"></i>&nbsp;&nbsp; <?php //echo $stud_part['fname']; ?>_<?php //echo $stud_part['lname']; ?> </strong>  
                    <small class="float-right"> <?php //echo date("Y:h:i:sa");
?> </small>
                  </h4>
                </div> -->
                <!-- /.col -->
              <!-- </div> -->
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
               
                
                  <!-- From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address> -->
                </div>
                <!-- /.col -->
                <!-- <div class="col-sm-4 invoice-col"> -->
                  <!-- To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address> -->
                <!-- </div> -->
                <!-- /.col -->
                <!-- <div class="col-sm-4 invoice-col">

                School Logo -->
                  <!-- <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 -->
                <!-- </div> -->
                <hr />
                <!-- /.col -->
              </div>
              <hr />
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
               <a class="btn btn-primary" href="check_scores.php"> Refresh Search</a> 

                      <!-- <form action="" method="GET" enctype="multipart/form-data">
                      
                              <div class="input-group mb-3">
                              
                              <select type="text" class="form-control"  placeholder="Enter Name" name="session">
                  <option value="0">Select Session</option>
                  <?php  													
											// $query = "SELECT * from session order by id";
											// $result = mysqli_query($connection,$query);
											// while($cat_set=mysqli_fetch_array($result)) {
											// echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";
											// }
											?>
                  </select>
                  &nbsp;&nbsp;
                  
                  <select type="text" class="form-control"  placeholder="Select Subject Type" name="term">
                      <option value="0">Select Term</option>
                      <option value="First &nbsp; Term">First Term</option>
                            <option value="Second &nbsp; Term">Second Term</option>
                            <option value="third &nbsp; Term">Third Term</option>
                         </select>
                         
                            <input type="text" class="form-control" name="search" value="<?php //if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search Username" > 

                              <div class="input-group-append">
                              <button type="submit" class="btn btn-primary" >Search</button>
                              </div> 
                                <!-- <div class="col-12 col-xs-12 col-sm-12 table-responsive pb-5"> -->
                                <!-- </div> -->
                                <!-- <div class=d-flex>
                                    <input type="text" class="form-control" name="search" value="<?php //if(isset($_GET['search'])){echo $_GET['search']; } ?>"  id="exampleInputEmail1" placeholder="search" required>
                                    <button type="submit" class="btn btn-primary" >Search</button>
                                  </div> 
                      </div>

                    </form> -->


         </div>

  

         <div class="col-12 table-responsive">
           <div class="card mt-4">
           <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  <th>S/N</th>
                  <!-- <th>Category</th> -->
                  <th>Student Name</th>
                  <th>Subject</th>
                  <th>1st Sest</th>
                  <th>2nd Test</th>
                  <th>Exams Score</th>
                  <th>Total Score</th>
                
                
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
$ssn = $_GET['section'];
$trm = $_GET['cnt'];
$uID = $_SESSION['username'];
//$results = $connection->query("SELECT * FROM roomtbl WHERE cat_id = '$cd' ORDER BY room_id ASC LIMIT $page_position, $item_per_page");
$results = $connection->query("SELECT * FROM scores  WHERE term = '$trm' AND session = '$ssn' AND  stud_email = '$uID'  AND status != 7  ORDER BY id ASC LIMIT $page_position, $item_per_page");

if(mysqli_num_rows($results) > 0)
{ 
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
                  
                      <td><?php echo $row['id']; ?></td>
                    
                      <td>
                        <?php
                        $stud = get_stud11_id($row['stud_email']);
                        $studpart = mysqli_fetch_array($stud);
                        ?>    
                      <?php echo $studpart['fname']; ?> &nbsp; <?php echo $studpart['lname']; ?> </td>
                      <td><?php echo $row['subject']; ?> </td>
                      <td><?php echo $row['test1']; ?> </td>
                      <td><?php echo $row['test2']; ?> </td>
                      <td><?php echo $row['exams']; ?> </td>
                      
                      <td><?php echo $row['total']; ?> </td>
                      <td><?php echo $row['average']; ?> </td>
                      <td><?php echo $row['grade']; ?> </td>
                      <td><?php echo $row['position']; ?> </td>
                      <td><?php echo $row['term']; ?> </td>
                      <td><?php echo $row['session']; ?> </td>
                     
                      
                      <!-- <td> </td> -->
                    
                   
                    
                  </tr>
<?php } ?>     
                  </tbody>
                                
                  <tfoot>
                  <tr>
                  <th>S/N</th>
                  <!-- <th>Category</th> -->
                  <th>Student Name</th>
                  <th>Subject</th>
                  <th>1st Sest</th>
                  <th>2nd Test</th>
                  <th>Exams Score</th>
                  <th>Total Score</th>
                
                
                  <th>Average</th>
                  <th>Grade</th>
                  <th>Position</th>
                  <th>Term</th>
                  <th>Session</th>
                  <!-- <th>Action</th> -->

                  
                  </tr>
                  </tfoot>
                  <?php   

}else{
?>
     <tr>
     <th>No record found!</th>  
    
    </tr>
<?php 	


}
?>   
                </table>
                  
              </div>
                  
           </div>
          
            </div>



                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <!-- <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="dist/img/credit/visa.png" alt="Visa">
                  <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="dist/img/credit/american-express.png" alt="American Express">
                  <img src="dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div> -->
                <!-- /.col -->
                <!-- <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div> -->
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!-- <a  class="btn btn-primary" href="personal_data_slip.php" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>  <i class="fas fa-download"></i>Print</a> -->
                  <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> -->
                  <!-- <button type="button"  class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2010-<?php echo date("Y")?> <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->
</body>
</html>

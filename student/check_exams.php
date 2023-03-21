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
  

                      <form action="" method="GET" enctype="multipart/form-data">
                      
                              <div class="input-group mb-3">
                              <input type="text" class="form-control" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search Username" >
                              <div class="input-group-append">
                              <button type="submit" class="btn btn-primary" >Search</button>
                              </div> 
                                <!-- <div class="col-12 col-xs-12 col-sm-12 table-responsive pb-5"> -->
                                <!-- </div> -->
                                <!-- <div class=d-flex>
                                    <input type="text" class="form-control" name="search" value="<?php //if(isset($_GET['search'])){echo $_GET['search']; } ?>"  id="exampleInputEmail1" placeholder="search" required>
                                    <button type="submit" class="btn btn-primary" >Search</button>
                                  </div> -->
                      </div>

                    </form>


         </div>

         <?php  
		//$con = mysqli_connect("localhost","root","emeka1109", "school_management_system");
		//mysqli_select_db("$mysqli_connect, $school_management_system") or die ("db not found") ;
		 
		 
		 
		 
		 						
         //collect 
		// $output = '';
		 
		 
		 
        // if (isset($_POST['search'])) {
//			$searchq = $_POST['search'];
//			$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
//			
//				 $query = "SELECT * from student_tbl WHERE fname LIKE '%$searchq%' OR lname LIKE '%$searchq%' ";
//				 $result = mysqli_query($connection,$query);
//				 $count = mysqli_num_rows($query);
//				 if ($count == 0) {
//					$output = 'No result found!';
//				} else{
//					while($row = mysqli_fetch_array($query)) {
//						$fname = $row['fname'];
//						$lname = $row['lname'];
//						$id = $row['stud_id'];
//						
//						$output .= '<div>'.$fname.' '.$lname.'</div>';
//						
//						}
//					}
				 
				 //while($cat_set=mysqli_fetch_array($result)) {
//				 echo "<option value=$cat_set[username]&nbsp;$cat_set[mem_id]>$cat_set[fname]&nbsp;$cat_set[lname]</option>";
//											 }

        // }
											?>


         <div class="col-12 table-responsive">
           <div class="card mt-4">
              <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> ID</th>
                        <th>First Name </th>
                        <th> Last Name</th>
                        <th> Email</th>
                      </tr>
                    </thead>
                  <?php /*?>  <?php 
   
		$con = mysqli_connect("localhost","root","emeka1109", "school_management_system");
		//mysqli_select_db("$mysqli_connect, $school_management_system") or die ("db not found") ;
		 
		 
		 
		 
		 						
         //collect 
		 $output = '';
		 
		 
		 
         if (isset($_POST['search'])) {
			$searchq = $_POST['search'];
			$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
			
				 $query = "SELECT * from scores WHERE student_name LIKE '%$searchq%'";
				 $result = mysqli_query($con,$query);
				 $count = mysqli_num_rows($result);
				 if ($count == 0) {
					$output = 'No result found!';
				} else{
					while($row = mysqli_fetch_array($result)) {
						$student_name = $row['student_name'];
						$subject = $row['subject'];
						$test1 = $row['test1'];
						$test2 = $row['test2'];
						$exams = $row['exams'];
						
						$id = $row['id'];
						
						$output .= '<div>'.$student_name.' '.$subject.''.$test1.''.$test2.''.$exams.'</div>';
						
						}
					}
				 
		 }
                    

                    ?><?php */?>
                      <tbody>
             <?php         
			 $con = mysqli_connect("localhost","root","emeka1109", "school_management_system");
			 
			  if (isset($_GET['search'])) {
			  
			  		$filevalue = $_GET['search'];
					$query = "SELECT * from student_tbl WHERE class = 1 AND CONCAT(fname,lname,email) LIKE '%$filevalue%' ORDER BY stud_id ASC";
					 $query_run = mysqli_query($con,$query);
					// $count = mysqli_num_rows($query_run);
					 
					  if(mysqli_num_rows($query_run) > 0)
						{ 
						foreach($query_run as $items)
							{
											
								?>
                             <tr>     
                             <td><?= $items['stud_id']; ?></td>    
                             		<td><?= $items['fname']; ?> </td>  
									<td><?= $items['lname']; ?></td>  
									<td><?= $items['email']; ?></td>  
									
                               </tr>
                                <?php   
                         	}
					 	}
                        }else{
							?>
							 <tr colspan="4"> 
			                      <td>No record found!</td>  </tr>
						<?php 	
						
						
						}
                 ?>       
                      </tbody>
                      


                  </table>
 <?php// print("$output"); ?>
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
                  <a  class="btn btn-primary" href="personal_data_slip.php" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>  <i class="fas fa-download"></i>Print</a>
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
</body>
</html>

<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>

<?php //require_once("include/pagination.php");
include('../includes/image_upload_functions.php');

$pagetitle="Student Profile"; ?>
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
            <h1>Profile of  <?php echo $stud_part['fname']; ?> <?php echo $stud_part['lname']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../student/dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Student Profile</li>
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
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                <div align="center">
                <h4> <strong> Leadership Academy Montesorri Nur./ Pri. & Secondary School</strong></h4> 
                <h4>    <strong>   Personal Data Slip</strong></h4>
                </div>
                        <strong>   <h4>  <i class="fas fa-user mb-3"></i>&nbsp;&nbsp; <?php echo $stud_part['fname']; ?> &nbsp; <?php echo $stud_part['lname']; ?> <br> <a class="btn btn-primary"  href="editprofile.php">Edit Profile</a>  </strong>  
                    <small class="float-right"> <?php
echo date("Y:h:i:sa");
?> </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
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
                <div class="col-sm-4 invoice-col">
                  <!-- To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address> -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                School Logo
                  <!-- <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 -->
                </div>
                <hr />
                <!-- /.col -->
              </div>
              <hr />
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
              <strong>    <table class="table ">
                    <thead>
                    <tr>
                    <?php 
														$img_url = $stud_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img  src="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php //echo $row['email']; ?>" height="100" width="100" />
<?php } } ?> </td>
                      <!-- <th>Qty</th> -->
                      <!-- <th>Passport</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Fullname</td>
                      <td> <?php echo $stud_part['fname']; ?> &nbsp; <?php echo $stud_part['lname']; ?></td>
                      <!-- <td>$50.00</td> -->
                    </tr>

                   
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Username</td>
                      <td><?php echo $stud_part['username']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>

                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Gender</td>
                      <td><?php echo $stud_part['gender']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Phone</td>
                      <td><?php echo $stud_part['phone']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Date Of Birth </td>
                      <td><?php echo $stud_part['dob']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Email </td>
                      <td><?php echo $stud_part['email']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Address </td>
                      <td><?php echo $stud_part['address']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> LGA </td>
                      <td><?php echo $stud_part['lga']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> State </td>
                      <td><?php echo $stud_part['state']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Nationality </td>
                      <td><?php echo $stud_part['nationality']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Addmission date </td>
                      <td><?php echo $stud_part['addmission_date']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>

                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Current Class: </td>
                      <td><?php echo $stud_part['class']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Father's name : </td>
                      <td><?php echo $stud_part['father_name']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr> <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Father's Occupation: </td>
                      <td><?php echo $stud_part['father_occ']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr> <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Father's Phone No.: </td>
                      <td><?php echo $stud_part['father_phone']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Mother's name : </td>
                      <td><?php echo $stud_part['mother_name']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr> <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Mother's Occupation: </td>
                      <td><?php echo $stud_part['mother_occ']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr> <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Mother's Phone No.: </td>
                      <td><?php echo $stud_part['mother_phone']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>

                    <!-- <tr>
                      <td>1</td>
                      <td>Monsters DVD</td>
                      <td>735-845-642</td>
                      <td>Terry Richardson helvetica tousled street art master</td>
                      <td>$10.70</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Grown Ups Blue Ray</td>
                      <td>422-568-642</td>
                      <td>Tousled lomo letterpress</td>
                      <td>$25.99</td>
                    </tr> -->
                    </tbody>
                  </table></strong>
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
      <!-- <b>Version</b> 3.1.0 -->
    </div>
    <strong>Copyright &copy; 2021-<?php echo date("Y")?> <a href="https://bslonline360.com">BSL-School-Management-System</a>.</strong> All rights reserved.
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

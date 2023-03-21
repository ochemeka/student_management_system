<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>

<?php //require_once("../includes/pagination.php"); ?>
<?php
confirm_logged_in();
//$pagetitle="edituser"; 
$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);
?>


<?php //include("includes/header1.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Leadership_Academy_Montesorri_Nur_Pri_&_Secondary_School::::_Personal_Data_Slip_<?php echo $stud_part['fname']; ?>&nbsp;<?php echo $stud_part['lname']; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section style=" font-size:24px;" class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
      <div align="center">
      <img src="../logo.png"  height="150px" width="150px"/>
                <h4 style=" font-size:50px;"> <strong> Leadership Academy </br> Montesorri Nur./ Pri. & Secondary School</strong></h4> 
                <h4>    <strong>   Personal Data Slip</strong></h4>
                </div>
                <strong>     <h4 style="padding-left:200px;">  <i class="fas fa-user"></i>&nbsp;&nbsp; <?php echo $stud_part['fname']; ?> &nbsp; <?php echo $stud_part['lname']; ?></strong>  
                    <small class="float-right"> <?php
echo date("Y:h:i:sa");
?> </small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    
    <!-- info row -->
    <!-- <div class="row invoice-info"> -->
       <!--<div class="col-sm-4 invoice-col">
       
        From -->
        <!--  <address>
        
         <strong>Admin, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address> 
      </div>-->
      <!-- /.col -->
      <!-- <div class="col-sm-4 invoice-col">
        To -->    
     <!--    <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address> 
      </div>-->
      <!-- /.col -->
    <!--    <div class="col-sm-4 invoice-col">
      
     <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567 
     </div> </div>-->
      <hr /><hr />
      <!-- /.col -->
    
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div align="center" class="col-12 table-responsive">
        <!-- <table  class="table table-striped"> -->
          <div align="center"   class="d-flex">
         

        <strong style="padding-left:150px;">      <table  id="example1" width="100%" border="0" cellpadding="0"  class="form-table">
          
        <thead>
                    <tr>
                   
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
                      <td>Fullname</td>&nbsp;&nbsp;
                      <td>&nbsp; &nbsp; <?php echo $stud_part['fname']; ?> &nbsp; <?php echo $stud_part['lname']; ?></td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Username</td>&nbsp;&nbsp;
                      <td>&nbsp; &nbsp; <?php echo $stud_part['username']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                     <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Gender</td>&nbsp;&nbsp;
                      <td>&nbsp; &nbsp; <?php echo $stud_part['gender']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Phone</td>&nbsp;&nbsp;
                      <td>&nbsp; &nbsp; <?php echo $stud_part['phone']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td>Date Of Birth </td>&nbsp;&nbsp;
                      <td>&nbsp; &nbsp; <?php echo $stud_part['dob']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Email </td>&nbsp;&nbsp;
                      <td>&nbsp; &nbsp; <?php echo $stud_part['email']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Address </td>&nbsp;
                      <td>&nbsp; &nbsp; <?php echo $stud_part['address']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> LGA </td>&nbsp;&nbsp;
                      <td>&nbsp; &nbsp;  <?php echo $stud_part['lga']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> State </td>&nbsp;&nbsp;
                      <td>&nbsp; &nbsp; <?php echo $stud_part['state']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Nationality </td>&nbsp;&nbsp;
                      <td> &nbsp; &nbsp; <?php echo $stud_part['nationality']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Addmission date </td>&nbsp;&nbsp;
                      <td> &nbsp; &nbsp; <?php echo $stud_part['addmission_date']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>

                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Current Class: </td>&nbsp;&nbsp;
                      <td> &nbsp; &nbsp; <?php echo $stud_part['class']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Father's name : </td>&nbsp;&nbsp;
                      <td > &nbsp; &nbsp; <?php echo $stud_part['father_name']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr> <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Father's Occupation: </td>&nbsp;&nbsp;
                      <td> &nbsp; &nbsp; <?php echo $stud_part['father_occ']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr> <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Father's Phone No.: </td>&nbsp;&nbsp;
                      <td> &nbsp; &nbsp; <?php echo $stud_part['father_phone']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr>
                    <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Mother's name : </td>&nbsp;&nbsp;
                      <td> &nbsp; &nbsp; <?php echo $stud_part['mother_name']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr> <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Mother's Occupation: </td>&nbsp;&nbsp;
                      <td> &nbsp; &nbsp; <?php echo $stud_part['mother_occ']; ?> </td>
                      <!-- <td>$50.00</td> -->
                    </tr> <tr>
                      <!-- <td>1</td> -->
                      <!-- <td>Need for Speed IV</td> -->
                      <td> Mother's Phone No.: </td>&nbsp;&nbsp;
                      <td> &nbsp; &nbsp; <?php echo $stud_part['mother_phone']; ?> </td>
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
        <!-- <thead>
          <tr>
            <th>Qty</th>
            <th>Product</th>
            <th>Serial #</th>
            <th>Description</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td>Call of Duty</td>
            <td>455-981-221</td>
            <td>El snort testosterone trophy driving gloves handsome</td>
            <td>$64.50</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Need for Speed IV</td>
            <td>247-925-726</td>
            <td>Wes Anderson umami biodiesel</td>
            <td>$50.00</td>
          </tr>
          <tr>
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
          </tr>
          </tbody> -->
        </table> </strong>
    <div>     <table><p class="mt-5" style="padding-left:100px;">
  
 <?php 
														$img_url = $stud_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img  src="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="Passport" height="150" width="150" />
<?php } } ?> </p>
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
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div> -->
      <!-- /.col -->
      <div class="col-6">
        <!-- <p class="lead">Amount Due 2/22/2014</p> -->

        <!-- <div class="table-responsive">
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
        </div> -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<br /><br /><br /><br /><br /><br />

<span>Leadership Academy Montesorri Nur./ Pri. & Secondary School:::: Personal Data Slip &nbsp; <?php echo $stud_part['fname']; ?> &nbsp; <?php echo $stud_part['lname']; ?> &nbsp; &nbsp;<?php echo $time = date("Y-m-d H:i:s"); ?> </span>
<strong>Copyright &copy; 2010-<?php echo date("Y") ;?>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>

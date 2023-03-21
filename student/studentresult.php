<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php 
include('../includes/image_upload_functions.php');

//$pagetitle="Student Bio-data Form"; ?>
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
                
                </div>
                <div align="center"> 
                <strong align="center">     <h4 style="padding-left:200px;">  
                <i class="fas fa-user"></i>&nbsp;&nbsp; <?php echo $stud_part['fname']; ?> 
                &nbsp; <?php echo $stud_part['lname']; ?></strong>  
                    <small class="float-right"> <?php
echo date("Y:h:i:sa");
?> </small>
        </h4></div>
        <!-- <h4>    <strong>   Personal Data Slip</strong></h4> -->
    <!-- <div align="center">     
        <table><p class="mt-5" style="padding-left:100px;">
  
 <?php 
// 														$img_url = $stud_part["image"];
// 														$img_arr = explode(',', $img_url);
// 													foreach($img_arr as $img_url1)		
// 						{
// 						 ?>

// <?php  //if(strlen($img_url1)>4){  ?>
// <img  src="<?php //echo IMAGE_PATH; ?>uploads/<?php //echo $img_url1;  ?>" alt="Passport" height="50" width="50" />
<?php //} } ?> </p>
</table>
</div> -->


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
                <div class="col-12 table-responsive">
          <strong>  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  
                  <!-- <th>Category</th>
                  <th>Student Name</th> -->
                  <th>Subject</th>
                  <th>1st <br> Test</th>
                  <th>2nd  <br> Test</th>
                  <th>Exams <br>  Score</th>
                  <th>Total <br>  Score</th>
                 <th>Grade</th>
                
                  <th>Average</th>
                 
                  <!-- <th>Position</th> -->
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
                    <td><?php echo $row['grade']; ?> </td>
                      <td><?php echo substr($row['average'],0,5) ; ?> </td>
                      
                      <!-- <td><?php //echo $row['position']; ?>  -->
                    
               


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
                  <!-- <th>Category</th> 
                  <th>Student <br>  Name</th>-->
                  <th>Subject</th>
                  <th>1st <br> Test</th>
                  <th>2nd  <br> Test</th>
                  <th>Exams <br>  Score</th>
                  <th>Total <br>  Score</th>
                
                
                  <th>Average</th>
                  <th>Grade</th>
                  <!-- <th>Position</th> -->
                  <th>Term</th>
                  <th>Session</th>
                  <!-- <th>Action</th> -->

                  
                  </tr>
                  </tfoot>
                </table>       </strong>
    <div>     
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

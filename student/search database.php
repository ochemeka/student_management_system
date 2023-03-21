<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php");
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
                              
                              <select type="text" class="form-control"  placeholder="Enter Name" name="session">
                  <option value="0">Select Session</option>
                  <?php  													
											$query = "SELECT * from session order by id";
											$result = mysqli_query($connection,$query);
											while($cat_set=mysqli_fetch_array($result)) {
											echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";
											}
											?>
                  </select>
                  &nbsp;&nbsp;
                  
                  <select type="text" class="form-control"  placeholder="Select Subject Type" name="term">
                      <option value="0">Select Term</option>
                      <option value="First &nbsp; Term">First Term</option>
                            <option value="Second &nbsp; Term">Second Term</option>
                            <option value="third &nbsp; Term">Third Term</option>
                         </select>
                         
                              <!-- <input type="text" class="form-control" name="search" value="<?php //if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search Username" > -->

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
                  
                      <td><?php echo $row['id']; ?></td>
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
                      <td><?php echo $row['average']; ?> </td>
                      <td><?php echo $row['grade']; ?> </td>
                      <td><?php echo $row['position']; ?> </td>
                      <td><?php echo $row['term']; ?> </td>
                      <td><?php echo $row['session']; ?> </td>
                     
                      
                      <td> &nbsp;(<a href="manage_subject.php?delete=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)&nbsp;<a href="manage_editsubject.php?sub=<?php echo $row['id']; ?>">Edit</a></td>
                    
                   
                    
                  </tr>
                  <?php

}

?>    
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
                  <th>Action</th>

                  
                  </tr>
                  </tfoot>
                </table>
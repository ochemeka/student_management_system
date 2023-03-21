<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
//teacher_logged_in();
$member = get_teacher_id($_SESSION['t_username']);
$teachpart = mysqli_fetch_array($member);

//$teachpart = "Profiles"
//$pagetitle=   $teachpart['username'];


?>
<title>Profile of &nbsp;<?php echo $teachpart['username']; ?></title>
<?php include("includes/header1.php");  ?>


  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include("includes/sidebar.php");  ?> 
 
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile of <?php echo $teachpart['username']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-3">
           
          <?php  
	 $item_per_page      = 100; //item to display per page
	 $page_url           = "<?php echo ADMIN_PATH ; ?>category";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM allsubject "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM allsubject  WHERE status != 7 ORDER BY sub_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM categorytbl     
				ORDER BY subject_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?>      
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

 
                  <!-- <img class="profile-user-img img-fluid img-circle"
                       src="dist/img/user4-128x128.jpg"
                       alt="User profile picture"> -->
                       <?php 
              

              $img_url = $teachpart["image"];
              $img_arr = explode(',', $img_url);
              foreach($img_arr as $img_url1)		
              {
              ?>
              
              <?php  if(strlen($img_url1)>4){  ?>
              <img class="img-circle elevation-2" src="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $teachpart['img_alt']; ?>" height="150" width="150" />
              <?php } } ?>   

                </div>
                <br>
                <h3 class="profile-username text-center"><?php echo $teachpart['username']; ?></h3>

                
   <a href="editprofile" class="btn btn-primary btn-block"><b><?php echo $teachpart['t_subject']; ?></b></a>
      
           </div>
             
            </div>
            
            </div>
        <?php  } ?> 
            
         <!-- /.col -->
 
 
          <!-- /.col -->
        </div>  <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <div style="padding-top:inherit;"></div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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

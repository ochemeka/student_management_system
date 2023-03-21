<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
confirm_logged_in();
//$pagetitle="edituser"; 

$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);
?>

  <!-- Main Sidebar Container -->
  <?php include("includes/head_3.php");  ?>
  <!-- Main Sidebar Container -->
  <?php include("includes/sidebar.php");  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Subjects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Subjects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <!-- <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Color Palette
            </h3>
          </div> -->
          <div class="card-body">
            <!-- <div class="col-12">
              <h5>Theme Colors</h5>
            </div> -->
            <!-- /.col-12 -->
            <div class="row">
            <?php  
	 $item_per_page      = 20; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM weektbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM weektbl  WHERE status != 7 ORDER BY weekid ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
            <div class="col-sm-4 col-md-2">
                <h4 class="text-center">Primary</h4>

                <div class="color-palette-set">
                  <div class="bg-primary color-palette"></div>
                  <div class="bg-primary disabled color-palette"><span>Disabled</span></div>
                </div>
              </div>
              <?php  }  ?>  
              <!-- /.col -->
              <!-- <div class="col-sm-4 col-md-2">
                <h4 class="text-center">Secondary</h4>

                <div class="color-palette-set">
                  <div class="bg-secondary color-palette"><span>#6c757d</span></div>
                  <div class="bg-secondary disabled color-palette"><span>Disabled</span></div>
                </div>
              </div> -->
              <!-- /.col -->
              <!-- <div class="col-sm-4 col-md-2">
                <h4 class="text-center">Info</h4>

                <div class="color-palette-set">
                  <div class="bg-info color-palette"><span>#17a2b8</span></div>
                  <div class="bg-info disabled color-palette"><span>Disabled</span></div>
                </div>
              </div> -->
              <!-- /.col -->
              <!-- <div class="col-sm-4 col-md-2">
                <h4 class="text-center">Success</h4>

                <div class="color-palette-set">
                  <div class="bg-success color-palette"><span>#28a745</span></div>
                  <div class="bg-success disabled color-palette"><span>Disabled</span></div>
                </div>
              </div> -->
              <!-- /.col -->
              <!-- <div class="col-sm-4 col-md-2">
                <h4 class="text-center bg-warning">Warning</h4>

                <div class="color-palette-set">
                  <div class="bg-warning color-palette"><span>#ffc107</span></div>
                  <div class="bg-warning disabled color-palette"><span>Disabled</span></div>
                </div>
              </div> -->
              <!-- /.col -->
              <!-- <div class="col-sm-4 col-md-2">
                <h4 class="text-center">Danger</h4>

                <div class="color-palette-set">
                  <div class="bg-danger color-palette"><span>#dc3545</span></div>
                  <div class="bg-danger disabled color-palette"><span>Disabled</span></div>
                </div>
              </div> -->
              <!-- /.col -->
            </div>
      
            <!-- /.row -->
           
            <!-- /.col-12 -->
            
            <!-- /.row -->
            <!-- <div class="col-12">
              <h5 class="mt-3">Colors</h5>
            </div> -->
            <!-- /.col-12 -->
           
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
        <!-- <h5 class="mt-4 mb-2">Alerts and Callouts</h5> -->

        
        <!-- /.row -->
        <!-- END ALERTS AND CALLOUTS -->
        <!-- <h5 class="mt-4 mb-2">Tabs in Cards</h5> -->

       
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
        <!-- START PROGRESS BARS -->
        <!-- <h5 class="mt-4 mb-2">Progress Bars</h5> -->

        
        <!-- /.row -->
        
        <!-- /.row -->
        <!-- END PROGRESS BARS -->

        <!-- START ACCORDION & CAROUSEL-->
        <!-- <h5 class="mt-4 mb-2">Bootstrap Accordion & Carousel</h5> -->

        
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->

        <!-- START TYPOGRAPHY -->
        

      
        <!-- /.row -->

        
        <!-- /.row -->

      

      
        <!-- /.row -->
       
        <!-- /.row -->
        <!-- END TYPOGRAPHY -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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

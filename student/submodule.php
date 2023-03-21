<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
confirm_logged_in();
$pagetitle="Modules"; 
$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);

?>
<?php include("includes/head_modules.php");  ?>
<?php include("includes/sidebar_modules.php");  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject Modules </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subject Modules</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subject Modules </h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body p-0">
                <table class="table table-hover">
                  <tbody>
                   
                    <tr data-widget="expandable-table" aria-expanded="true">
                      <td>
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                       All Subjects
                      </td>
                    </tr>
                    <tr class="expandable-body">
                      <td>
                        <div class="p-0">
                          <table class="table table-hover">
                            <tbody>
                            <?php  
	 $item_per_page      = 1000; //item to display per page
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
$results = $connection->query("SELECT * FROM allsubject WHERE status = 1 ORDER BY sub_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM class_tbl     
				ORDER BY cat_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?>    
     
                              <tr data-widget="expandable-table" aria-expanded="false">
                                <td>
                                  <button type="button" class="btn btn-primary p-0">
                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                  </button>
                                  <?php echo $row['sub_name']; ?>
                                </td>
                              </tr>
                              <tr class="expandable-body">
                                <td>
                                  <div class="p-0">
                                    <table class="table table-hover">
                                      <tbody>
                                                                     
                                        <tr>
                                          <td>219-2-1</td>
                                        </tr>
                                        <tr>
                                          <td>219-2-2</td>
                                        </tr>
                                        <tr>
                                          <td>219-2-3</td>
                                        </tr>
                                        
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>
<?php }   ?> 

                              <!-- <tr data-widget="expandable-table" aria-expanded="false">
                                <td>
                                  <button type="button" class="btn btn-primary p-0">
                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                  </button>
                                  Sample 33
                                </td>
                              </tr>
                              <tr class="expandable-body">
                                <td>
                                  <div class="p-0">
                                    <table class="table table-hover">
                                      <tbody>
                                        <tr>
                                          <td>219-2-1</td>
                                        </tr>
                                        <tr>
                                          <td>219-2-2</td>
                                        </tr>
                                        <tr>
                                          <td>219-2-3</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr> -->

                              <!-- <tr data-widget="expandable-table" aria-expanded="false">
                                <td>
                                  <button type="button" class="btn btn-primary p-0">
                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                  </button>
                                  Sample 44
                                </td>
                              </tr>
                              <tr class="expandable-body">
                                <td>
                                  <div class="p-0">
                                    <table class="table table-hover">
                                      <tbody>
                                        <tr>
                                          <td>219-2-1</td>
                                        </tr>
                                        <tr>
                                          <td>219-2-2</td>
                                        </tr>
                                        <tr>
                                          <td>219-2-3</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr> -->
                             
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                    <!-- <tr>
                      <td>657</td>
                    </tr>
                    <tr>
                      <td>175</td>
                    </tr>
                    <tr>
                      <td>134</td>
                    </tr>
                    <tr>
                      <td>494</td>
                    </tr>
                    <tr>
                      <td>832</td>
                    </tr>
                    <tr>
                      <td>982</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
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

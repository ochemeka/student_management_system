<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
confirm_logged_in();
$pagetitle="modules"; 
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
            <h1>Study Materials</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Study Materials</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
       
       
       


        
      
        <!-- /.row -->
        <!-- END PROGRESS BARS -->

        <!-- START ACCORDION & CAROUSEL-->
        <!-- <h5 class="mt-4 mb-2">Bootstrap Accordion & Carousel</h5> -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Modules</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                          First Term
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body table-responsive p-0">
                       
                      
                   
                       <table class="table table-hover text-nowrap">
                         <thead>
                           <tr>
                           <!-- <th>S/N</th> -->
                           <th>Week</th>
                           <th>Subject</th>
                           <th>Topic </th>
                           
                           <!-- <th>Description</th> -->
                           <th>Action </th> 
                           
                          <!-- <th>Description</th>
                           <th>Action </th>  
                            -->
                           </tr>
                         </thead>
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


$results = $connection->query("SELECT COUNT(*) FROM school_syllabus "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records

// $query = "SELECT * from school_syllabus WHERE status = 1 order by id";
// $result = mysqli_query($connection,$query);
// while($cat_set=mysqli_fetch_array($result)) {
//   //echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";

// //$wk = $cat_set['week'];
// //$cat_set = 
// $tm = $cat_set['term']; }
$tm = 'First-Term';

$class = 'Primary-4';
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM school_syllabus  WHERE  term = '$tm'  AND class = '$class' AND status != 7  ORDER BY week ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
            FROM class_tbl     
            ORDER BY cat_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {

?>                        
                           <tr>
                           <th><?php echo $row['week']; ?></th>
                           <td><?php echo $row['sub_name']; ?></td>
                           <td><?php echo $row['title']; ?></td>
                           <!-- <td><?php //echo $row['week']; ?></td> -->
                           <!-- <td><?php //echo $row['sub_desc']; ?></td> -->
       
                           <td>
                           
                           <button oncontextmenu="return false" type="button" class="btn btn-success toastrDefaultSuccess">
                        
                      
                             <?php 
                                   $img_url = $row["files"];
                                   $img_arr = explode(',', $img_url);
                                   foreach($img_arr as $img_url1)		
                                   {
                                   ?>
                                   
                                   <?php  if(strlen($img_url1)>4){  ?>
                                     <a  download="<?php echo $row['sub_name']; ?>&nbsp;<?php echo $row['week']; ?> " href="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>">
                                     <img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" 
                                      height="2" width="1" /> <i  style="color:#FFF;" class="fas fa-download"> Download</i> </a>
                 
                                        <?php } } ?></button>
                
       
                             <?php //echo $row['files']; ?>   
                         </td>
                           
                           
       
                           </tr>
                          
       <?php  }   ?>                   
                         </tbody>
                       </table>
                     
       
                             
                    
                   <!-- /.card -->
                             
                             
                             <!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                               3
                               wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                               laborum
                               eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                               nulla
                               assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                               nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                               beer
                               farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                               labore sustainable VHS. -->
                             </div>
                    </div>
                  </div>
                  <div class="card card-danger">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                         Second Term
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body table-responsive p-0">
                       
                      
                   
                       <table class="table table-hover text-nowrap">
                         <thead>
                           <tr>
                           <!-- <th>S/N</th> -->
                           <th>Week</th>
                           <th>Subject</th>
                           <th>Topic </th>
                           
                           <!-- <th>Description</th> -->
                           <th>Action </th>  
                           
                           </tr>
                         </thead>
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


$results = $connection->query("SELECT COUNT(*) FROM school_syllabus "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records

// $query = "SELECT * from school_syllabus WHERE status = 1 order by id";
// $result = mysqli_query($connection,$query);
// while($cat_set=mysqli_fetch_array($result)) {
//   //echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";

// //$wk = $cat_set['week'];
// //$cat_set = 
// $tm = $cat_set['term']; }
$tm = 'Second-Term';

$class = 'Primary-4';
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM school_syllabus  WHERE  term = '$tm'  AND class = '$class'  AND status != 7  ORDER BY week ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
            FROM class_tbl     
            ORDER BY cat_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {

?>                       
                           <tr>
                           <th><?php echo $row['week']; ?></th>
                           <td><?php echo $row['sub_name']; ?></td>
                           <td><?php echo $row['title']; ?></td>
                           <!-- <td><?php //echo $row['week']; ?></td> 
                           <td><?php //echo $row['sub_desc']; ?></td>-->
       
                           <td>
                           
                           <button oncontextmenu="return false" type="button" class="btn btn-success toastrDefaultSuccess">
                        
                      
                             <?php 
                                   $img_url = $row["files"];
                                   $img_arr = explode(',', $img_url);
                                   foreach($img_arr as $img_url1)		
                                   {
                                   ?>
                                   
                                   <?php  if(strlen($img_url1)>4){  ?>
                                     <a  download="<?php echo $row['sub_name']; ?>&nbsp;<?php echo $row['week']; ?> " href="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>">
                                     <img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" 
                                      height="2" width="1" /> <i  style="color:#FFF;" class="fas fa-download"> Download</i> </a>
                 
                                        <?php } } ?></button>
                
       
                             <?php //echo $row['files']; ?>   
                         </td>
                           </tr>
                          
       <?php  }   ?>                   
                         </tbody>
                       </table>
                     
       
                             
                    
                   <!-- /.card -->
                             
                             
                             <!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                               3
                               wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                               laborum
                               eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                               nulla
                               assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                               nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                               beer
                               farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                               labore sustainable VHS. -->
                             </div>
                    </div>
                  </div>
                  <div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                        Third Term
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                      <div class="card-body table-responsive p-0">
                       
                      
                   
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <!-- <th>S/N</th> -->
                    <th>Week</th>
                    <th>Subject</th>
                    <th>Topic </th>
                    
                    <!-- <th>Description</th> -->
                    <th>Action </th>  
                    
                    </tr>
                  </thead>
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


$results = $connection->query("SELECT COUNT(*) FROM school_syllabus "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records

// $query = "SELECT * from school_syllabus WHERE status = 1 order by id";
// $result = mysqli_query($connection,$query);
// while($cat_set=mysqli_fetch_array($result)) {
//   //echo "<option value=$cat_set[t_session]>$cat_set[t_session] </option>";

// //$wk = $cat_set['week'];
// //$cat_set = 
// $tm = $cat_set['term']; }


$tm = 'Third-Term';

$class = 'Primary-4';
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM school_syllabus  WHERE  term = '$tm'  AND class = '$class'  AND status != 7  ORDER BY week ASC LIMIT $page_position, $item_per_page");
//Display records fetched from database.
/*
"SELECT * 
            FROM class_tbl     
            ORDER BY cat_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {

?>                         
                    <tr>
                    <th><?php echo $row['week']; ?></th>
                    <td><?php echo $row['sub_name']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <!-- <td><?php //echo $row['week']; ?></td> 
                    <td><?php //echo $row['sub_desc']; ?></td>-->

                    <td>
                    
                    <button oncontextmenu="return false" type="button" class="btn btn-success toastrDefaultSuccess">
                 
               
                      <?php 
                            $img_url = $row["files"];
                            $img_arr = explode(',', $img_url);
                            foreach($img_arr as $img_url1)		
                            {
                            ?>
                            
                            <?php  if(strlen($img_url1)>4){  ?>
                              <a  download="<?php echo $row['sub_name']; ?>&nbsp;<?php echo $row['week']; ?> " href="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>">
                              <img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" 
                               height="2" width="1" /> <i  style="color:#FFF;" class="fas fa-download"> Download</i> </a>
          
                                 <?php } } ?></button>
         

                      <?php //echo $row['files']; ?>   
                  </td>
                    </tr>
                   
<?php  }   ?>                   
                  </tbody>
                </table>
              

                      
             
            <!-- /.card -->
                      
                      
                      <!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                        nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                        beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS. -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->


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
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
          
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <!-- <div class="small-box btn-primary"> -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>First Term</h3>

                <a href="submodule_first.php"><p style="color:#FFF;">Primary 1</p></a>&nbsp;
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="submodule_first.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!--  -->


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Second Term</h3>

                <a href="submodule_first.php"><p style="color:#FFF;">Primary 2</p></a>&nbsp;
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="submodule_second.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->



          <div class="col-lg-4 col-6">
            <!-- small box -->
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Third Term</h3>

                <a href="submodule_first.php"><p style="color:#FFF;">Primary 2</p></a>&nbsp;
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="submodule_third.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->
          
          



         
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
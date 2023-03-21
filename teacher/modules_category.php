<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php
teacher_logged_in();
$pagetitle="modules"; 
$pagetitle="Manage All Subjects"; 
$member = get_teacher_id($_SESSION['t_username']);
$teachpart = mysqli_fetch_array($member);

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
            <li class="breadcrumb-item"><a href="../student/dashboard.php">Home</a></li>
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
                <h3>Primary 1</h3>

               <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp; </p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_1.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!--  -->


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Primary 2</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp; </p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_2.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->



          <div class="col-lg-4 col-6">
            <!-- small box -->
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Primary 3</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp; </p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_3.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <!-- <div class="small-box btn-primary"> -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Primary 4</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects &nbsp; </p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_4.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!--  -->


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Primary 5</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp;</p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_5.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->



          <div class="col-lg-4 col-6">
            <!-- small box -->
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Primary 6</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp;</p> &nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_6.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <!-- <div class="small-box btn-primary"> -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>JSS 1</h3>

               <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp; </p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_J1.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!--  -->


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>JSS 2</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp; </p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_J2.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->



          <div class="col-lg-4 col-6">
            <!-- small box -->
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>JSS 3</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp; </p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_J3.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <!-- <div class="small-box btn-primary"> -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>SS 1</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects &nbsp; </p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_SS1.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!--  -->


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>SS 2</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp;</p>&nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_SS2.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->



          <div class="col-lg-4 col-6">
            <!-- small box -->
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>SS 3</h3>

                <!-- <p style="color:#FFF;"> Third Term Subjects  &nbsp;</p> &nbsp; -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="modules_SS3.php" class="small-box-footer">View Subject <i class="fas fa-arrow-circle-right"></i></a>
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
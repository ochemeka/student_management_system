<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/pagination.php"); ?>
<?php 
//include('include/image_upload_functions.php');

//$pagetitle="Student Bio-data Form"; ?>
<?php
confirm_logged_in();
//$pagetitle="edituser"; 
$member = get_stud_id($_SESSION['username']);
$stud_part = mysqli_fetch_array($member);

?>

<?php
$pagetitle="All Subject";
?>
<?php include("includes/header1.php");  ?>



  <!-- Main Sidebar Container -->
  <?php include("includes/sidebar.php");  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Classes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../student/dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">All Classes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All Classes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                 
                <!-- <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="dist/img/photo1.png" alt="Photo 1" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">
                          Ribbon
                        </div>
                      </div>
                    </div>
                  </div> -->
                 
            <div align="center" class="col-sm-4">
                  <div class="position-relative">
                    
                            <!-- <a href="psection.php.php?catid=<?php //echo $row["cat_id"]; ?>"> -->
               
            <img src="dist/img/photo2.png" alt="Photo 2" class="img-fluid">
                     
                    </div>
                    &nbsp;
                    <div class="col-sm-4" align="center"><a href="psection.php"> <span class="btn btn-primary">Primary </a></span></div>  </a>
                  </div>
      
   <div align="center" class="col-sm-4">
                  <div class="position-relative">
                    
                            <!-- <a href="psection.php.php?catid=<?php //echo $row["cat_id"]; ?>"> -->
               
            <img src="dist/img/photo2.png" alt="Photo 2" class="img-fluid">
                     
                    </div>
                    &nbsp;
                    <div class="col-sm-4" align="center"><a href="jsection.php"> <span class="btn btn-primary">Secondary </a></span></div>  </a>
                  </div>

                  <!-- <div class="col-sm-4">
                    <div class="position-relative" style="min-height: 180px;">
                      <img src="dist/img/photo3.jpg" alt="Photo 3" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger text-xl">
                          Ribbon
                        </div>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
<!-- Ion Slider -->
<script src="plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').bootstrapSlider()

    /* ION SLIDER */
    $('#range_1').ionRangeSlider({
      min     : 0,
      max     : 5000,
      from    : 1000,
      to      : 4000,
      type    : 'double',
      step    : 1,
      prefix  : '$',
      prettify: false,
      hasGrid : true
    })
    $('#range_2').ionRangeSlider()

    $('#range_5').ionRangeSlider({
      min     : 0,
      max     : 10,
      type    : 'single',
      step    : 0.1,
      postfix : ' mm',
      prettify: false,
      hasGrid : true
    })
    $('#range_6').ionRangeSlider({
      min     : -50,
      max     : 50,
      from    : 0,
      type    : 'single',
      step    : 1,
      postfix : '°',
      prettify: false,
      hasGrid : true
    })

    $('#range_4').ionRangeSlider({
      type      : 'single',
      step      : 100,
      postfix   : ' light years',
      from      : 55000,
      hideMinMax: true,
      hideFromTo: false
    })
    $('#range_3').ionRangeSlider({
      type    : 'double',
      postfix : ' miles',
      step    : 10000,
      from    : 25000000,
      to      : 35000000,
      onChange: function (obj) {
        var t = ''
        for (var prop in obj) {
          t += prop + ': ' + obj[prop] + '\r\n'
        }
        $('#result').html(t)
      },
      onLoad  : function (obj) {
        //
      }
    })
  })
</script>
</body>
</html>

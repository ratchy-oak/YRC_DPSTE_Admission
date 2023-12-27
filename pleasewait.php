<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit();
}
date_default_timezone_set('Asia/Bangkok');

$sql2 = "SELECT * FROM `users` WHERE `u_id` = '$_SESSION[id]' LIMIT 1";
$query2 = mysqli_query($conn, $sql2);
$fet2 = mysqli_fetch_array($query2);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่" />
  <meta name="author" content="โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่" />

  <title>
    :: ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่ ::
  </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;500&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("includes/sidebar.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <?php include("includes/top_bar.php"); ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Content Row -->
            <?php //if ($_SESSION['permission'] != '2') { 
            ?>
            <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-12 mt-2"">
                <div class=" card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters">
                    <img src="img/410636985_2105887873097109_7182037831636745447_n.png" style="max-width: 100%;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php //} 
          ?>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; 2024 Yupparaj Wittayalai School</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>